<?php
session_start();

if (empty($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['user'];
$emailRaw = isset($user['email']) ? (string)$user['email'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Whiteboard – TIDAL ORGANISER</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body class="whiteboard-page">
  <div class="wave-bg" aria-hidden="true"></div>

  <header class="whiteboard-page-header">
    <a href="app.php" class="whiteboard-back" id="whiteboard-back-link">← Back to app</a>
    <h1 class="whiteboard-title">Whiteboard</h1>
    <div class="whiteboard-toolbar">
      <div class="whiteboard-tool-group">
        <button type="button" class="whiteboard-mode-btn is-active" id="wb-mode-pen" title="Pen">Pen</button>
        <button type="button" class="whiteboard-mode-btn" id="wb-mode-eraser" title="Eraser">Eraser</button>
      </div>
      <label class="whiteboard-tool">
        <span>Color</span>
        <input type="color" id="wb-pen-color" value="#1e293b" class="whiteboard-color" title="Pen color">
      </label>
      <label class="whiteboard-tool">
        <span>Thickness (1–255)</span>
        <input type="number" id="wb-pen-thickness" class="whiteboard-thickness" min="1" max="255" value="4" title="Pen thickness">
      </label>
      <button type="button" class="whiteboard-mode-btn" id="wb-undo" title="Undo">Undo</button>
      <button type="button" class="whiteboard-mode-btn" id="wb-redo" title="Redo">Redo</button>
      <button type="button" class="whiteboard-mode-btn" id="wb-add-text" title="Add text">Add text</button>
      <button type="button" class="whiteboard-mode-btn" id="wb-add-line" title="Drag from one point to another">Add line</button>
    </div>
  </header>

  <div class="whiteboard-canvas-wrap">
    <div class="whiteboard-board" id="whiteboard-board">
      <canvas id="whiteboard-canvas" width="1200" height="700"></canvas>
      <div class="wb-text-layer" id="wb-text-layer"></div>
    </div>
  </div>

  <div class="page-transition" id="page-transition" aria-hidden="true">
    <div class="page-transition-shape"></div>
  </div>

  <script>
    (function () {
      var wbCanvas = document.getElementById('whiteboard-canvas');
      var wbColor = document.getElementById('wb-pen-color');
      var wbThickness = document.getElementById('wb-pen-thickness');
      var undoBtn = document.getElementById('wb-undo');
      var redoBtn = document.getElementById('wb-redo');
      var lineBtn = document.getElementById('wb-add-line');
      var penBtn = document.getElementById('wb-mode-pen');
      var eraserBtn = document.getElementById('wb-mode-eraser');
      var addTextBtn = document.getElementById('wb-add-text');
      var textLayer = document.getElementById('wb-text-layer');
      var pageTransitionEl = document.getElementById('page-transition');
      var backLink = document.getElementById('whiteboard-back-link');
      var THEME_STORAGE_KEY = 'tidal_organiser_theme:' + (<?php echo json_encode($emailRaw); ?> || 'guest');

      if (!wbCanvas) return;

      var ctx = wbCanvas.getContext('2d');
      var drawing = false;
      var currentTool = 'pen'; // pen | eraser | line
      var lineStart = null;
      var lineBaseState = null;
      var lastPos = null;
      var undoStack = [];
      var redoStack = [];

      function setTool(tool) {
        currentTool = tool;
        if (penBtn) penBtn.classList.toggle('is-active', tool === 'pen');
        if (eraserBtn) eraserBtn.classList.toggle('is-active', tool === 'eraser');
        if (lineBtn) lineBtn.classList.toggle('is-active', tool === 'line');
      }

      function updateHistoryButtons() {
        if (undoBtn) undoBtn.disabled = undoStack.length <= 1;
        if (redoBtn) redoBtn.disabled = redoStack.length === 0;
      }

      function saveState() {
        undoStack.push(wbCanvas.toDataURL('image/png'));
        if (undoStack.length > 80) undoStack.shift();
        redoStack = [];
        updateHistoryButtons();
      }

      function restoreState(dataUrl) {
        var img = new Image();
        img.onload = function () {
          ctx.globalCompositeOperation = 'source-over';
          ctx.clearRect(0, 0, wbCanvas.width, wbCanvas.height);
          ctx.drawImage(img, 0, 0);
        };
        img.src = dataUrl;
      }

      function getThickness() {
        var v = wbThickness ? parseInt(wbThickness.value, 10) : 4;
        if (isNaN(v) || v < 1) return 1;
        if (v > 255) return 255;
        return v;
      }

      function getPos(e) {
        var rect = wbCanvas.getBoundingClientRect();
        var scaleX = wbCanvas.width / rect.width;
        var scaleY = wbCanvas.height / rect.height;
        var point = null;
        if (e.touches && e.touches[0]) point = e.touches[0];
        else if (e.changedTouches && e.changedTouches[0]) point = e.changedTouches[0];
        if (point) {
          return {
            x: (point.clientX - rect.left) * scaleX,
            y: (point.clientY - rect.top) * scaleY
          };
        }
        return {
          x: (e.clientX - rect.left) * scaleX,
          y: (e.clientY - rect.top) * scaleY
        };
      }

      function drawSegment(from, to) {
        ctx.lineWidth = getThickness();
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';
        if (currentTool === 'eraser') {
          ctx.globalCompositeOperation = 'destination-out';
          ctx.strokeStyle = 'rgba(0,0,0,1)';
        } else {
          ctx.globalCompositeOperation = 'source-over';
          ctx.strokeStyle = wbColor ? wbColor.value : '#1e293b';
        }
        ctx.beginPath();
        ctx.moveTo(from.x, from.y);
        ctx.lineTo(to.x, to.y);
        ctx.stroke();
      }

      function startDraw(e) {
        e.preventDefault();
        drawing = true;
        var p = getPos(e);
        lastPos = p;
        if (currentTool === 'line') {
          lineStart = p;
          lineBaseState = ctx.getImageData(0, 0, wbCanvas.width, wbCanvas.height);
          return;
        }
        ctx.beginPath();
        ctx.moveTo(p.x, p.y);
      }

      function moveDraw(e) {
        e.preventDefault();
        if (!drawing) return;
        var p = getPos(e);
        if (currentTool === 'line') {
          if (!lineBaseState || !lineStart) return;
          ctx.putImageData(lineBaseState, 0, 0);
          drawSegment(lineStart, p);
          lastPos = p;
          return;
        }
        drawSegment(lastPos, p);
        lastPos = p;
        ctx.beginPath();
        ctx.moveTo(p.x, p.y);
      }

      function endDraw(e) {
        if (e) e.preventDefault();
        if (!drawing) return;
        if (currentTool === 'line' && lineBaseState && lineStart) {
          var endPos = getPos(e || { clientX: 0, clientY: 0 });
          ctx.putImageData(lineBaseState, 0, 0);
          drawSegment(lineStart, endPos);
        }
        drawing = false;
        lineStart = null;
        lineBaseState = null;
        ctx.beginPath();
        saveState();
      }

      wbCanvas.addEventListener('mousedown', startDraw);
      wbCanvas.addEventListener('mousemove', moveDraw);
      wbCanvas.addEventListener('mouseup', endDraw);
      wbCanvas.addEventListener('mouseleave', endDraw);
      wbCanvas.addEventListener('touchstart', startDraw, { passive: false });
      wbCanvas.addEventListener('touchmove', moveDraw, { passive: false });
      wbCanvas.addEventListener('touchend', endDraw, { passive: false });

      if (wbThickness) {
        wbThickness.addEventListener('input', function () {
          var v = parseInt(this.value, 10);
          if (!isNaN(v) && v > 255) this.value = 255;
          if (!isNaN(v) && v < 1) this.value = 1;
        });
      }

      if (penBtn) penBtn.addEventListener('click', function () { setTool('pen'); });
      if (eraserBtn) eraserBtn.addEventListener('click', function () { setTool('eraser'); });
      if (lineBtn) {
        lineBtn.addEventListener('click', function () {
          setTool(currentTool === 'line' ? 'pen' : 'line');
        });
      }
      if (undoBtn) {
        undoBtn.addEventListener('click', function () {
          if (undoStack.length <= 1) return;
          var current = undoStack.pop();
          redoStack.push(current);
          restoreState(undoStack[undoStack.length - 1]);
          updateHistoryButtons();
        });
      }
      if (redoBtn) {
        redoBtn.addEventListener('click', function () {
          if (!redoStack.length) return;
          var state = redoStack.pop();
          undoStack.push(state);
          restoreState(state);
          updateHistoryButtons();
        });
      }

      // Add text: movable, editable text blocks
      function createTextBlock(x, y) {
        var block = document.createElement('div');
        block.className = 'wb-text-block';
        block.innerHTML = '<div class="wb-text-drag-handle" title="Drag to move"></div><div class="wb-text-content" contenteditable="true" data-placeholder="Type here…"></div>';
        block.style.left = (x - 80) + 'px';
        block.style.top = (y - 18) + 'px';
        var handle = block.querySelector('.wb-text-drag-handle');
        var content = block.querySelector('.wb-text-content');

        content.addEventListener('blur', function () {
          if (content.textContent.trim() === '') {
            content.innerHTML = '';
          }
        });

        var drag = { active: false, startX: 0, startY: 0, left: 0, top: 0 };
        function startDrag(e) {
          e.preventDefault();
          drag.active = true;
          var clientX = e.touches ? e.touches[0].clientX : e.clientX;
          var clientY = e.touches ? e.touches[0].clientY : e.clientY;
          drag.startX = clientX;
          drag.startY = clientY;
          drag.left = block.offsetLeft;
          drag.top = block.offsetTop;
        }
        function moveDrag(e) {
          if (!drag.active) return;
          var clientX = e.touches ? e.touches[0].clientX : e.clientX;
          var clientY = e.touches ? e.touches[0].clientY : e.clientY;
          block.style.left = (drag.left + (clientX - drag.startX)) + 'px';
          block.style.top = (drag.top + (clientY - drag.startY)) + 'px';
        }
        function endDrag() {
          drag.active = false;
        }
        handle.addEventListener('mousedown', startDrag);
        handle.addEventListener('touchstart', startDrag, { passive: false });
        document.addEventListener('mousemove', moveDrag);
        document.addEventListener('touchmove', moveDrag, { passive: false });
        document.addEventListener('mouseup', endDrag);
        document.addEventListener('touchend', endDrag);
        document.addEventListener('touchcancel', endDrag);

        return block;
      }

      function addTextBlock() {
        if (!textLayer || !wbCanvas) return;
        var rect = wbCanvas.getBoundingClientRect();
        var layerRect = textLayer.getBoundingClientRect();
        var x = layerRect.width / 2;
        var y = layerRect.height / 2;
        var block = createTextBlock(x, y);
        textLayer.appendChild(block);
        block.querySelector('.wb-text-content').focus();
      }

      if (addTextBtn) addTextBtn.addEventListener('click', addTextBlock);
      var savedTheme = localStorage.getItem(THEME_STORAGE_KEY) || 'ocean';
      document.body.classList.toggle('theme-dark', savedTheme === 'dark');
      if (backLink) {
        backLink.addEventListener('click', function (e) {
          if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
          if (e.button !== 0) return;
          e.preventDefault();
          if (pageTransitionEl) {
            pageTransitionEl.classList.add('is-active');
            setTimeout(function () {
              window.location.href = 'app.php';
            }, 620);
          } else {
            window.location.href = 'app.php';
          }
        });
      }
      // Seed canvas background and history for Undo/Redo.
      ctx.fillStyle = '#ffffff';
      ctx.fillRect(0, 0, wbCanvas.width, wbCanvas.height);
      saveState();
      setTool('pen');
    })();
  </script>
</body>
</html>
