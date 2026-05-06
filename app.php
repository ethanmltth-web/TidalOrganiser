<?php
// Auth removed: local name only (stored in localStorage)
$emailRaw = 'guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>App – TIDAL ORGANISER</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="wave-bg" aria-hidden="true"></div>

  <div class="app-shell">
    <aside class="app-sidebar">
      <div class="app-sidebar-title">Tidal</div>
      <nav class="app-sidebar-nav">
        <button type="button" class="app-sidebar-item is-active" id="sidebar-main-btn">Main Menu</button>
        <button type="button" class="app-sidebar-item" id="sidebar-schedule-btn">Schedule</button>
        <button type="button" class="app-sidebar-item" id="sidebar-whiteboard-btn">Whiteboard</button>
        <button type="button" class="app-sidebar-item" id="sidebar-customisation-btn">Customisation</button>
      </nav>
    </aside>

    <div class="app-content">
      <header class="app-header">
        <div class="app-logo">TIDAL ORGANISER</div>
        <nav class="app-nav" aria-label="Tidal Organiser actions">
          <div class="app-points" id="app-points-display">Points: 0</div>
          <div class="app-shards" id="app-shards-display">Shards: 0</div>
          <div class="app-streak" id="app-streak-display">🔥 Streak: 0</div>
          <button type="button" class="app-name-btn" id="app-name-btn" title="Change name">Set name</button>
        </nav>
      </header>

      <main class="app-main">
    <section id="apps-panel"
             class="app-panel app-panel-active"
             role="region"
             aria-label="Main menu panel">
      <h2 class="section-title">Main Menu</h2>
      <div class="apps-toolbar">
        <button type="button" class="add-link-btn" id="add-link-btn">Add link</button>
        <button type="button" class="add-link-btn" id="make-folder-btn">Make folder</button>
        <button type="button" class="add-link-btn" id="edit-apps-btn">Edit apps</button>
      </div>
      <section class="upcoming-panel" id="upcoming-panel" aria-labelledby="upcoming-title">
        <div class="upcoming-header">
          <h3 class="upcoming-title" id="upcoming-title">Upcoming schedules</h3>
          <span class="upcoming-subtitle">From your calendar</span>
        </div>
        <ul class="upcoming-list" id="upcoming-list"></ul>
        <button type="button" class="upcoming-view-all-btn" id="upcoming-view-all-btn">View all upcoming schedules</button>
      </section>
      <div class="add-link-panel" id="add-link-panel">
        <form class="add-link-form" id="add-link-form">
          <label class="add-link-field">
            <span class="add-link-label">Link URL</span>
            <input type="url" id="link-url-input" class="add-link-input" placeholder="https://example.com" required>
          </label>
          <label class="add-link-field">
            <span class="add-link-label">Name (optional)</span>
            <input type="text" id="link-name-input" class="add-link-input" placeholder="Example">
          </label>
          <div class="add-link-actions">
            <button type="submit" class="add-link-save">Save link</button>
            <button type="button" class="add-link-cancel" id="add-link-cancel">Cancel</button>
          </div>
        </form>
      </div>
      <div class="main-menu-lower">
        <div class="app-links-grid" id="app-links-grid"></div>
        <section class="daily-motivation-panel" id="daily-motivation-panel" aria-labelledby="daily-motivation-title">
          <h3 class="daily-motivation-title" id="daily-motivation-title">Daily Motivation</h3>
          <p class="daily-motivation-text" id="daily-motivation-text">Stay focused and keep going.</p>
          <div class="daily-quests" id="daily-quests">
            <h4 class="daily-quests-title">Daily Quests</h4>
            <ul class="daily-quests-list" id="daily-quests-list"></ul>
          </div>
        </section>
      </div>
    </section>

    <section id="schedule-panel"
             class="app-panel"
             role="region"
             aria-label="Schedule panel" hidden>
      <h2 class="section-title">Schedule</h2>
      <div class="schedule-controls">
        <div class="schedule-today" id="schedule-today"></div>
      </div>
      <div class="schedule-calendar" id="schedule-calendar"></div>
      <div class="schedule-day-panel" id="schedule-day-panel">
        <div class="schedule-day-panel-header">
          <h3 class="schedule-day-panel-title" id="schedule-day-panel-title">Select a date</h3>
        </div>
        <div class="schedule-day-content">
          <section class="schedule-day-column-card">
            <h4 class="schedule-column-title">Scheduled activities</h4>
            <ul class="schedule-day-activities" id="schedule-day-activities"></ul>
          </section>
          <section class="schedule-day-column-card">
            <h4 class="schedule-column-title">Create activity</h4>
            <form class="schedule-day-add-form" id="schedule-day-add-form">
              <div class="schedule-day-form-row">
                <label class="schedule-day-field">
                  <span>Activity name</span>
                  <input type="text" id="activity-name" class="add-link-input" placeholder="e.g. Meeting" required>
                </label>
                <label class="schedule-day-field schedule-day-color-wrap">
                  <span>Color</span>
                  <input type="color" id="activity-color" value="#38bdf8" class="schedule-day-color" title="Activity color">
                </label>
              </div>
              <div class="schedule-day-form-row schedule-day-times">
                <label class="schedule-day-field">
                  <span>Start</span>
                  <div class="schedule-day-time">
                    <input type="text" id="activity-start-time" class="schedule-day-time-input" placeholder="9:30" inputmode="numeric" maxlength="5" autocomplete="off">
                    <select id="activity-start-ampm" class="schedule-day-select schedule-day-ampm">
                      <option value="AM">AM</option>
                      <option value="PM">PM</option>
                    </select>
                  </div>
                </label>
                <label class="schedule-day-field">
                  <span>Priority (optional)</span>
                  <select id="activity-priority" class="schedule-day-select">
                    <option value="none">None</option>
                    <option value="high">High</option>
                    <option value="medium">Medium</option>
                    <option value="low">Low</option>
                  </select>
                </label>
              </div>
              <button type="submit" class="add-link-save">Add activity</button>
            </form>
          </section>
        </div>
      </div>
    </section>
    <section id="all-schedules-panel"
             class="app-panel"
             role="tabpanel"
             aria-label="All schedules panel" hidden>
      <h2 class="section-title">All upcoming schedules</h2>
      <div class="all-schedules-panel-card">
        <button type="button" class="plinko-back-btn" id="all-schedules-back-btn">← Back to Apps</button>
        <div class="all-schedules-controls">
          <select id="all-schedules-date-filter" class="schedule-day-select">
            <option value="all">All days</option>
          </select>
          <select id="all-schedules-sort-mode" class="schedule-day-select">
            <option value="smart">Smart sort</option>
            <option value="priority">Priority first</option>
            <option value="time">Time first</option>
          </select>
          <button type="button" class="plinko-back-btn" id="all-schedules-apply-filter-btn">Filter</button>
        </div>
        <ul class="upcoming-list all-schedules-list" id="all-schedules-list"></ul>
      </div>
    </section>
    <section id="tidal-store-panel"
             class="app-panel"
             role="tabpanel"
             aria-label="Tidal store panel" hidden>
      <h2 class="section-title">Tidal Store</h2>
      <div class="all-schedules-panel-card">
        <button type="button" class="plinko-back-btn" id="tidal-store-back-btn">← Back to Apps</button>
        <div class="tidal-store-header">
          <h3 class="games-panel-title">Apps</h3>
          <div class="tidal-store-search-row">
            <input type="text" id="tidal-store-search" class="add-link-input tidal-store-search" placeholder="Search apps...">
            <button type="button" class="plinko-back-btn" id="tidal-store-all-apps-btn">All apps</button>
          </div>
        </div>
        <section class="tidal-store-section" id="tidal-store-useful-section">
          <h4 class="schedule-column-title">Useful Tools</h4>
          <div class="tidal-store-grid" id="tidal-store-useful-grid"></div>
        </section>
        <section class="tidal-store-section" id="tidal-store-discover-section">
          <h4 class="schedule-column-title">Discover more</h4>
          <div class="tidal-store-grid" id="tidal-store-discover-grid"></div>
        </section>
        <section class="tidal-store-section" id="tidal-store-all-section" hidden>
          <h4 class="schedule-column-title">All apps</h4>
          <div class="tidal-store-grid" id="tidal-store-all-grid"></div>
        </section>
      </div>
    </section>
    <section id="whiteboard-panel"
             class="app-panel"
             role="tabpanel"
             aria-label="Whiteboard panel" hidden>
      <h2 class="section-title">Whiteboard</h2>
      <div class="whiteboard-embed-wrap">
        <iframe src="whiteboard.php" class="whiteboard-embed-frame" title="Whiteboard"></iframe>
      </div>
    </section>
    <section id="customisation-panel"
             class="app-panel"
             role="tabpanel"
             aria-label="Customisation panel" hidden>
      <h2 class="section-title">Customisation</h2>
      <div class="customisation-card">
        <h3 class="customisation-title">Styles</h3>
        <div class="customisation-style-list">
          <button type="button" class="custom-style-btn is-active" data-theme="ocean">Ocean Blue</button>
          <button type="button" class="custom-style-btn" data-theme="dark">Dark Mode</button>
          <button type="button" class="custom-style-btn" data-theme="space">Space</button>
          <button type="button" class="custom-style-btn" data-theme="volcano">Volcano</button>
          <button type="button" class="custom-style-btn" data-theme="forest">Forest</button>
          <button type="button" class="custom-style-btn" data-theme="sunset">Sunset</button>
          <button type="button" class="custom-style-btn" data-theme="lavender">Lavender</button>
          <button type="button" class="custom-style-btn" data-theme="neon">Neon Grid</button>
          <button type="button" class="custom-style-btn" data-theme="sand">Sand Dunes</button>
          <button type="button" class="custom-style-btn" data-theme="midnight">Midnight Blue</button>
        </div>
        <div class="unlockable-styles-panel" aria-labelledby="unlockable-styles-title">
          <h4 class="unlockable-styles-title" id="unlockable-styles-title">Unlockable Styles</h4>
          <div class="unlockable-style-card" id="unlockable-steph-card">
            <div class="unlockable-style-meta">
              <p class="unlockable-style-name">Steph Curry</p>
              <p class="unlockable-style-desc">Black + glowing gold court lights theme.</p>
            </div>
            <div class="unlockable-style-actions">
              <button type="button" class="custom-style-btn unlockable-style-action" id="unlock-steph-btn">Unlock</button>
              <span class="unlockable-style-status" id="unlock-steph-status"></span>
            </div>
          </div>
          <div class="unlockable-style-card" id="unlockable-waterpokemon-card">
            <div class="unlockable-style-meta">
              <p class="unlockable-style-name">Water Pokemon</p>
              <p class="unlockable-style-desc">Blue-pink gradient with your Pokemon background.</p>
            </div>
            <div class="unlockable-style-actions">
              <button type="button" class="custom-style-btn unlockable-style-action" id="unlock-water-pokemon-btn">Unlock</button>
              <span class="unlockable-style-status" id="unlock-water-pokemon-status"></span>
            </div>
          </div>
        </div>
        <div class="unlockable-styles-panel" aria-labelledby="redeem-code-title">
          <h4 class="unlockable-styles-title" id="redeem-code-title">Enter code</h4>
          <form class="add-link-form" id="redeem-code-form" autocomplete="off">
            <label class="add-link-field">
              <span class="add-link-label">Reward code</span>
              <input type="text" class="add-link-input" id="redeem-code-input" placeholder="Type code (e.g. DEV)">
            </label>
            <div class="add-link-actions">
              <button type="submit" class="add-link-save">Redeem</button>
            </div>
            <p class="unlockable-style-status" id="redeem-code-status"></p>
          </form>
        </div>
      </div>
    </section>
  </main>
    </div>
  </div>

  <div class="page-transition" id="page-transition" aria-hidden="true">
    <div class="page-transition-panel page-transition-panel-left" aria-hidden="true"></div>
    <div class="page-transition-panel page-transition-panel-right" aria-hidden="true"></div>
  </div>

  <div class="name-prompt-overlay" id="name-prompt-overlay" aria-hidden="true">
    <div class="name-prompt-card">
      <h3 class="name-prompt-title">What’s your name?</h3>
      <p class="name-prompt-subtitle">We’ll remember it on this device.</p>
      <form class="name-prompt-form" id="name-prompt-form">
        <input type="text" class="add-link-input" id="name-prompt-input" placeholder="Enter your name" maxlength="30" autocomplete="name">
        <div class="name-prompt-actions">
          <button type="submit" class="add-link-btn">Save</button>
          <button type="button" class="plinko-back-btn" id="name-prompt-skip-btn">Skip</button>
        </div>
      </form>
    </div>
  </div>

  <div class="schedule-complete-overlay" id="schedule-complete-overlay" aria-hidden="true">
    <div class="schedule-complete-card">
      <h3>Well done!</h3>
      <p id="schedule-complete-text">You completed one of your schedules.</p>
    </div>
  </div>

  <div class="streak-login-overlay" id="streak-login-overlay" aria-hidden="true">
    <div class="streak-login-card">
      <h3 id="streak-login-title">🔥 Your 1 day streak! Well done!</h3>
    </div>
  </div>

  <div class="focus-mode-overlay" id="focus-mode-overlay" aria-hidden="true">
    <div class="focus-mode-card">
      <p class="focus-mode-kicker">Focus Mode</p>
      <h3 class="focus-mode-title" id="focus-mode-title">No task selected</h3>
      <p class="focus-mode-time" id="focus-mode-time">00:00:00</p>
      <div class="focus-mode-actions">
        <button type="button" class="add-link-btn" id="focus-mode-toggle-btn">Pause</button>
        <button type="button" class="upcoming-status-btn" id="focus-mode-done-btn">Mark done</button>
        <button type="button" class="upcoming-delete-btn" id="focus-mode-exit-btn">Exit focus</button>
      </div>
    </div>
  </div>

  <div class="app-edit-overlay" id="app-edit-overlay" aria-hidden="true">
    <div class="app-edit-card">
      <h3 class="app-edit-title" id="app-edit-title">Edit app</h3>
      <p class="app-edit-subtitle" id="app-edit-subtitle"></p>
      <div class="app-edit-actions">
        <button type="button" class="add-link-btn" id="app-edit-rename-btn">Rename app</button>
        <button type="button" class="add-link-btn add-link-btn-danger" id="app-edit-delete-btn">Delete app</button>
        <button type="button" class="plinko-back-btn" id="app-edit-cancel-btn">Cancel</button>
      </div>
      <div class="app-edit-rename-row" id="app-edit-rename-row" hidden>
        <input type="text" class="add-link-input" id="app-edit-rename-input" placeholder="New name">
        <button type="button" class="add-link-btn" id="app-edit-save-rename-btn">Save name</button>
      </div>
    </div>
  </div>

  <div class="folder-view-overlay" id="folder-view-overlay" aria-hidden="true">
    <div class="folder-view-card">
      <div class="folder-view-header">
        <h3 class="folder-view-title" id="folder-view-title">Folder</h3>
        <button type="button" class="plinko-back-btn" id="folder-view-close-btn">Close</button>
      </div>
      <ul class="folder-view-list" id="folder-view-list"></ul>
    </div>
  </div>

  <div class="store-app-overlay" id="store-app-overlay" aria-hidden="true">
    <div class="store-app-card">
      <button type="button" class="plinko-back-btn store-app-close-btn" id="store-app-close-btn">Close</button>
      <div class="store-app-main">
        <div class="store-app-content">
          <h3 class="store-app-title" id="store-app-title">App</h3>
          <p class="store-app-description" id="store-app-description"></p>
          <button type="button" class="add-link-btn" id="store-app-add-btn">Add to Menu</button>
        </div>
        <img class="store-app-logo" id="store-app-logo" alt="">
      </div>
    </div>
  </div>

  <script>
    (function () {
      var panels = document.querySelectorAll('.app-panel');
      var transitionEl = document.getElementById('page-transition');
      var transitionLock = false;
      var DISPLAY_NAME_KEY = 'tidal_organiser_display_name';
      var nameOverlay = document.getElementById('name-prompt-overlay');
      var nameForm = document.getElementById('name-prompt-form');
      var nameInput = document.getElementById('name-prompt-input');
      var nameSkipBtn = document.getElementById('name-prompt-skip-btn');
      var nameBtn = document.getElementById('app-name-btn');

      function playPageTransition(onDone) {
        if (!transitionEl || transitionLock) {
          if (typeof onDone === 'function') onDone();
          return;
        }
        transitionLock = true;
        transitionEl.classList.add('is-active');
        setTimeout(function () {
          if (typeof onDone === 'function') onDone();
        }, 620);
        setTimeout(function () {
          transitionEl.classList.remove('is-active');
          transitionLock = false;
        }, 1600);
      }

      function setActivePanel(target) {
        var panelId = target === 'apps'
          ? 'apps-panel'
          : (target === 'schedule'
            ? 'schedule-panel'
            : (target === 'all_schedules'
              ? 'all-schedules-panel'
              : (target === 'tidal_store'
                ? 'tidal-store-panel'
                : (target === 'whiteboard' ? 'whiteboard-panel' : 'customisation-panel'))));
        var activePanel = document.querySelector('.app-panel.app-panel-active');
        panels.forEach(function (p) {
          if (p !== activePanel && p.id !== panelId) {
            p.classList.remove('app-panel-active', 'app-panel-fade-in', 'app-panel-fade-out');
            p.hidden = true;
          }
        });
        if (activePanel && activePanel.id !== panelId) {
          activePanel.classList.remove('app-panel-fade-in');
          activePanel.classList.add('app-panel-fade-out');
          setTimeout(function () {
            activePanel.classList.remove('app-panel-active', 'app-panel-fade-out');
            activePanel.hidden = true;
          }, 180);
        }
        var panelEl = document.getElementById(panelId);
        if (panelEl) {
          panelEl.classList.remove('app-panel-fade-out');
          panelEl.hidden = false;
          panelEl.classList.add('app-panel-active');
          panelEl.classList.add('app-panel-fade-in');
          setTimeout(function () {
            panelEl.classList.remove('app-panel-fade-in');
          }, 260);
        }
        if (target === 'schedule') renderScheduleCalendar();
        if (target === 'apps') renderUpcomingSchedules();
        if (target === 'all_schedules') renderAllSchedules();
        if (target === 'tidal_store') renderTidalStore();
        var mainBtn = document.getElementById('sidebar-main-btn');
        if (mainBtn) mainBtn.classList.toggle('is-active', target === 'apps' || target === 'tidal_store');
        var scheduleBtn = document.getElementById('sidebar-schedule-btn');
        if (scheduleBtn) scheduleBtn.classList.toggle('is-active', target === 'schedule');
        var whiteboardBtn = document.getElementById('sidebar-whiteboard-btn');
        if (whiteboardBtn) whiteboardBtn.classList.toggle('is-active', target === 'whiteboard');
        var customisationBtn = document.getElementById('sidebar-customisation-btn');
        if (customisationBtn) customisationBtn.classList.toggle('is-active', target === 'customisation');
      }

      // Apps: link storage and UI
      var USER_STORAGE_SUFFIX = <?php echo json_encode($emailRaw); ?> || 'guest';
      var STORAGE_KEY = 'tidal_organiser_app_links:' + USER_STORAGE_SUFFIX;
      var LEGACY_APPS_STORAGE_KEY = 'tidal_organiser_app_links';
      var LEGACY_POINTS_STORAGE_KEY = 'tidal_organiser_points';
      var LEGACY_OWNER_STORAGE_KEY = 'tidal_organiser_legacy_owner';
      var LEGACY_MIGRATED_STORAGE_KEY = 'tidal_organiser_legacy_migrated:' + USER_STORAGE_SUFFIX;
      var appEditMode = false;
      var draggedLinkId = null;
      var appEditTargetId = null;
      var currentFolderViewId = null;

      function generateLibraryItemId() {
        return 'item_' + Date.now().toString(36) + '_' + Math.random().toString(36).slice(2, 8);
      }

      function getFolderCount(links) {
        return (links || []).filter(function (item) { return item.type === 'folder'; }).length;
      }

      function normalizeComparableUrl(url) {
        if (!url || typeof url !== 'string') return '';
        var cleaned = url.trim().toLowerCase();
        while (cleaned.length > 1 && cleaned.endsWith('/')) cleaned = cleaned.slice(0, -1);
        return cleaned;
      }

      function isTidalStoreLink(item) {
        return !!(item && item.type === 'link' && normalizeComparableUrl(item.url) === normalizeComparableUrl('tidal://store'));
      }

      function normalizeLinkItem(item) {
        var obj = item && typeof item === 'object' ? Object.assign({}, item) : {};
        if (!obj.id) obj.id = generateLibraryItemId();
        obj.type = obj.type === 'folder' ? 'folder' : 'link';
        obj.folderId = typeof obj.folderId === 'string' && obj.folderId ? obj.folderId : null;
        if (obj.type === 'folder') {
          obj.url = null;
          if (!obj.name || typeof obj.name !== 'string') obj.name = 'Folder';
        } else {
          if (!obj.url || typeof obj.url !== 'string') obj.url = 'https://example.com';
          if (!obj.name || typeof obj.name !== 'string') obj.name = getDomain(obj.url);
          if (isTidalStoreLink(obj)) {
            obj.folderId = null;
            obj.name = 'Tidal Store';
          }
        }
        return obj;
      }

      function getLinks() {
        try {
          var raw = localStorage.getItem(STORAGE_KEY);
          var parsed = raw ? JSON.parse(raw) : [];
          if (!Array.isArray(parsed)) return [];
          var changed = false;
          var normalized = parsed.map(function (item) {
            var n = normalizeLinkItem(item);
            if (!item || !item.id || !item.type || typeof item.folderId === 'undefined') changed = true;
            if (isTidalStoreLink(n) && item && (item.folderId !== n.folderId || item.name !== n.name)) changed = true;
            return n;
          });
          if (changed) localStorage.setItem(STORAGE_KEY, JSON.stringify(normalized));
          return normalized;
        } catch (e) {
          return [];
        }
      }

      function saveLinks(links) {
        var normalized = (Array.isArray(links) ? links : []).map(normalizeLinkItem);
        localStorage.setItem(STORAGE_KEY, JSON.stringify(normalized));
      }

      function getPresetUrlMap() {
        var map = {};
        PRESET_APPS.forEach(function (preset) {
          map[normalizeComparableUrl(preset.url)] = true;
        });
        return map;
      }

      function getCustomAppCount(links) {
        var presetMap = getPresetUrlMap();
        return (links || []).reduce(function (count, item) {
          if (!item) return count;
          if (item.type === 'folder') return count + 1;
          if (item.type === 'link' && !presetMap[normalizeComparableUrl(item.url)]) return count + 1;
          return count;
        }, 0);
      }

      function maybeMigrateLegacyAccountData() {
        try {
          if (localStorage.getItem(LEGACY_MIGRATED_STORAGE_KEY) === '1') return;
          var owner = localStorage.getItem(LEGACY_OWNER_STORAGE_KEY);
          var legacyRaw = localStorage.getItem(LEGACY_APPS_STORAGE_KEY);
          var legacyParsed = legacyRaw ? JSON.parse(legacyRaw) : [];
          var legacyLinks = Array.isArray(legacyParsed) ? legacyParsed.map(normalizeLinkItem) : [];
          if (!legacyLinks.length) return;

          var currentLinks = getLinks();
          var shouldAutoClaim = !owner &&
            getCustomAppCount(currentLinks) === 0 &&
            getCustomAppCount(legacyLinks) > 0;
          var canMigrate = owner === USER_STORAGE_SUFFIX || shouldAutoClaim;
          if (!canMigrate) return;
          if (!owner) localStorage.setItem(LEGACY_OWNER_STORAGE_KEY, USER_STORAGE_SUFFIX);

          var seenUrls = {};
          var seenIds = {};
          currentLinks.forEach(function (item) {
            seenIds[item.id] = true;
            if (item.type !== 'link') return;
            seenUrls[normalizeComparableUrl(item.url)] = true;
          });
          var merged = currentLinks.slice();
          legacyLinks.forEach(function (item) {
            if (seenIds[item.id]) return;
            if (item.type === 'link') {
              var key = normalizeComparableUrl(item.url);
              if (key && seenUrls[key]) return;
              seenUrls[key] = true;
            }
            item.folderId = null;
            seenIds[item.id] = true;
            merged.push(item);
          });
          saveLinks(merged);

          var currentPointsRaw = localStorage.getItem(POINTS_STORAGE_KEY);
          var legacyPointsRaw = localStorage.getItem(LEGACY_POINTS_STORAGE_KEY);
          var legacyPoints = legacyPointsRaw !== null ? parseInt(legacyPointsRaw, 10) : NaN;
          if ((currentPointsRaw === null || currentPointsRaw === '') && !isNaN(legacyPoints)) {
            localStorage.setItem(POINTS_STORAGE_KEY, String(Math.max(0, legacyPoints)));
          }
          localStorage.setItem(LEGACY_MIGRATED_STORAGE_KEY, '1');
        } catch (e) {}
      }

      function ensurePresetApps() {
        try {
          var links = getLinks();
          var existingMap = {};
          var addedCount = 0;
          links.forEach(function (item) {
            if (item.type !== 'link') return;
            existingMap[normalizeComparableUrl(item.url)] = true;
          });
          PRESET_APPS.forEach(function (preset) {
            var key = normalizeComparableUrl(preset.url);
            if (!key || existingMap[key]) return;
            links.push({
              id: generateLibraryItemId(),
              type: 'link',
              url: preset.url,
              name: preset.name,
              folderId: null
            });
            existingMap[key] = true;
            addedCount += 1;
          });
          if (addedCount > 0) saveLinks(links);
          localStorage.setItem(PRESET_APPS_SEEDED_KEY, '1');
        } catch (e) {}
      }
      var ACTIVITIES_STORAGE_KEY = 'tidal_organiser_schedule_activities';
      var POINTS_STORAGE_KEY = 'tidal_organiser_points:' + USER_STORAGE_SUFFIX;
      var PRESET_APPS_SEEDED_KEY = 'tidal_organiser_preset_apps_seeded:' + USER_STORAGE_SUFFIX;
      var STREAK_STORAGE_KEY = 'tidal_organiser_daily_streak:' + USER_STORAGE_SUFFIX;
      var STREAK_LAST_LOGIN_STORAGE_KEY = 'tidal_organiser_daily_streak_last:' + USER_STORAGE_SUFFIX;
      var THEME_STORAGE_KEY = 'tidal_organiser_theme:' + USER_STORAGE_SUFFIX;
      var SHARDS_STORAGE_KEY = 'tidal_organiser_shards:' + USER_STORAGE_SUFFIX;
      var QUESTS_STORAGE_KEY = 'tidal_organiser_daily_quests:' + USER_STORAGE_SUFFIX;
      var UNLOCKABLES_STORAGE_KEY = 'tidal_organiser_unlockables:' + USER_STORAGE_SUFFIX;
      var STEPH_THEME_UNLOCK_COST = 120;
      var WATER_POKEMON_THEME_SHARD_COST = 2;
      var allSchedulesDateFilter = 'all';
      var allSchedulesSortMode = 'smart';
      var MOTIVATION_DATE_STORAGE_KEY = 'tidal_organiser_motivation_day:' + USER_STORAGE_SUFFIX;
      var MOTIVATION_INDEX_STORAGE_KEY = 'tidal_organiser_motivation_idx:' + USER_STORAGE_SUFFIX;
      var QUEST_COMPLETE_THREE_REWARD = 15;
      var QUEST_NO_OVERDUE_REWARD = 15;
      var QUEST_COMPLETE_THREE_SHARD_REWARD = 1;
      var QUEST_NO_OVERDUE_SHARD_REWARD = 1;
      var REDEEM_DEV_CODE = 'DEV';
      var REDEEM_DEV_POINTS_REWARD = 100;
      var REDEEM_DEV_SHARDS_REWARD = 100;
      var scheduleCompleteOverlay = document.getElementById('schedule-complete-overlay');
      var scheduleCompleteText = document.getElementById('schedule-complete-text');
      var scheduleCompleteHideTimer = null;
      var streakLoginOverlay = document.getElementById('streak-login-overlay');
      var streakLoginTitle = document.getElementById('streak-login-title');
      var streakLoginHideTimer = null;
      var focusModeOverlay = document.getElementById('focus-mode-overlay');
      var focusModeTitle = document.getElementById('focus-mode-title');
      var focusModeTime = document.getElementById('focus-mode-time');
      var focusModeToggleBtn = document.getElementById('focus-mode-toggle-btn');
      var focusModeDoneBtn = document.getElementById('focus-mode-done-btn');
      var focusModeExitBtn = document.getElementById('focus-mode-exit-btn');
      var focusTimerId = null;
      var focusContext = null;
      var clickAudioContext = null;

      function getDisplayName() {
        try {
          var raw = localStorage.getItem(DISPLAY_NAME_KEY) || '';
          return (raw || '').trim();
        } catch (e) {
          return '';
        }
      }

      function setDisplayName(nextName) {
        try {
          localStorage.setItem(DISPLAY_NAME_KEY, (nextName || '').trim());
        } catch (e) {}
        renderDisplayName();
      }

      function renderDisplayName() {
        if (!nameBtn) return;
        var n = getDisplayName();
        nameBtn.textContent = n ? n : 'Set name';
      }

      function openNamePrompt(force) {
        if (!nameOverlay) return;
        if (!force && getDisplayName()) return;
        nameOverlay.classList.add('is-open');
        nameOverlay.setAttribute('aria-hidden', 'false');
        if (nameInput) {
          nameInput.value = getDisplayName();
          setTimeout(function () { nameInput.focus(); nameInput.select(); }, 0);
        }
      }

      function closeNamePrompt() {
        if (!nameOverlay) return;
        nameOverlay.classList.remove('is-open');
        nameOverlay.setAttribute('aria-hidden', 'true');
      }

      if (nameBtn) nameBtn.addEventListener('click', function () { openNamePrompt(true); });
      if (nameOverlay) {
        nameOverlay.addEventListener('click', function (e) {
          if (e.target === nameOverlay) closeNamePrompt();
        });
      }
      if (nameSkipBtn) nameSkipBtn.addEventListener('click', closeNamePrompt);
      if (nameForm && nameInput) {
        nameForm.addEventListener('submit', function (e) {
          e.preventDefault();
          var next = (nameInput.value || '').trim();
          if (next) setDisplayName(next);
          closeNamePrompt();
        });
      }

      var THEME_OPTIONS = ['ocean', 'dark', 'space', 'volcano', 'forest', 'sunset', 'lavender', 'neon', 'sand', 'midnight', 'steph', 'waterpokemon'];
      var THEME_SOUND_PROFILES = {
        ocean:   { wave: 'sine',     base: 520, accent: 780, type: 'lowpass',  q: 0.75 },
        dark:    { wave: 'triangle', base: 240, accent: 380, type: 'lowpass',  q: 0.95 },
        space:   { wave: 'triangle', base: 680, accent: 1020, type: 'highpass', q: 1.25 },
        volcano: { wave: 'sawtooth', base: 170, accent: 260, type: 'bandpass', q: 1.8 },
        forest:  { wave: 'sine',     base: 340, accent: 520, type: 'bandpass', q: 0.7 },
        sunset:  { wave: 'triangle', base: 430, accent: 640, type: 'lowpass',  q: 0.8 },
        lavender:{ wave: 'sine',     base: 460, accent: 720, type: 'bandpass', q: 1.1 },
        neon:    { wave: 'square',   base: 900, accent: 1400, type: 'highpass', q: 2.1 },
        sand:    { wave: 'triangle', base: 300, accent: 470, type: 'lowpass',  q: 0.6 },
        midnight:{ wave: 'sine',     base: 280, accent: 460, type: 'bandpass', q: 1.05 },
        steph:   { wave: 'triangle', base: 360, accent: 600, type: 'bandpass', q: 1.4 },
        waterpokemon: { wave: 'sine', base: 560, accent: 860, type: 'bandpass', q: 1.2 }
      };
      var PRESET_APPS = [
        { name: 'Google Docs', url: 'https://docs.google.com/' },
        { name: 'Google Slides', url: 'https://docs.google.com/presentation' },
        { name: 'Gmail', url: 'https://mail.google.com/' },
        { name: 'Tidal Store', url: 'tidal://store' }
      ];
      var TIDAL_STORE_APPS = [
        { name: 'Google Classroom', url: 'https://classroom.google.com/', section: 'useful', description: 'Manage classes, assignments, and announcements in one place.' },
        { name: 'Google Sheets', url: 'https://docs.google.com/spreadsheets', section: 'useful', description: 'Create and collaborate on spreadsheets with formulas and charts.' },
        { name: 'ChatGPT', url: 'https://chatgpt.com/', section: 'useful', description: 'AI assistant for writing, brainstorming, coding, and research.' },
        { name: 'Claude', url: 'https://claude.ai/', section: 'useful', description: 'AI workspace for analysis, writing, and long-context tasks.' },
        { name: 'Canva', url: 'https://www.canva.com/', section: 'useful', description: 'Design presentations, posters, and social media visuals quickly.' },
        { name: 'Wikipedia', url: 'https://www.wikipedia.org/', section: 'useful', description: 'Free encyclopedia for quick learning and reliable references.' },
        { name: 'MuseScore', url: 'https://musescore.org/', section: 'useful', description: 'Compose and edit music notation with powerful free tools.' },
        { name: 'Google Earth', url: 'https://earth.google.com/', section: 'discover', description: 'Explore the world with 3D maps, satellite imagery, and tours.' },
        { name: 'Pinterest', url: 'https://www.pinterest.com/', section: 'discover', description: 'Discover visual ideas for projects, design, and inspiration.' },
        { name: 'YouTube', url: 'https://www.youtube.com/', section: 'discover', description: 'Watch and discover videos, tutorials, and creator content.' }
      ];
      var GOOGLE_DOCS_ICON_PATH = 'assets/google-docs-logo.png';
      var GOOGLE_SLIDES_ICON_PATH = 'assets/google-slides-logo.png';
      var GMAIL_ICON_PATH = 'assets/gmail-logo.png';
      var TIDAL_STORE_ICON_SVG = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 64 64'%3E%3Cdefs%3E%3ClinearGradient id='g' x1='0' x2='1' y1='0' y2='1'%3E%3Cstop stop-color='%230ea5e9'/%3E%3Cstop offset='1' stop-color='%2322d3ee'/%3E%3C/linearGradient%3E%3C/defs%3E%3Crect x='8' y='18' width='48' height='38' rx='10' fill='url(%23g)'/%3E%3Cpath d='M20 23c0-7 5-11 12-11s12 4 12 11' fill='none' stroke='%23fff' stroke-width='4' stroke-linecap='round'/%3E%3Cpath d='M17 31h30M17 38h30' stroke='%23fff' stroke-opacity='.8' stroke-width='2'/%3E%3C/svg%3E";
      var tidalStoreShowAll = false;
      var activeStoreApp = null;

      function getPoints() {
        try {
          var raw = localStorage.getItem(POINTS_STORAGE_KEY);
          if (raw === null) return 0;
          var points = parseInt(raw, 10);
          return isNaN(points) ? 0 : points;
        } catch (e) {
          return 0;
        }
      }

      function getShards() {
        try {
          var raw = localStorage.getItem(SHARDS_STORAGE_KEY);
          if (raw === null) return 0;
          var shards = parseInt(raw, 10);
          return isNaN(shards) ? 0 : Math.max(0, shards);
        } catch (e) {
          return 0;
        }
      }

      function getActiveThemeName() {
        for (var i = 0; i < THEME_OPTIONS.length; i++) {
          if (document.body.classList.contains('theme-' + THEME_OPTIONS[i])) return THEME_OPTIONS[i];
        }
        return 'ocean';
      }

      function getClickAudioContext() {
        var Ctx = window.AudioContext || window.webkitAudioContext;
        if (!Ctx) return null;
        if (!clickAudioContext) clickAudioContext = new Ctx();
        return clickAudioContext;
      }

      function getButtonSoundVariant(buttonEl) {
        if (!buttonEl) return 'default';
        var id = (buttonEl.id || '').toLowerCase();
        var cls = (buttonEl.className || '').toLowerCase();
        if (cls.indexOf('upcoming-delete-btn') >= 0 || cls.indexOf('add-link-btn-danger') >= 0 || id.indexOf('delete') >= 0) return 'danger';
        if (id.indexOf('focus-mode-done') >= 0 || cls.indexOf('is-active') >= 0) return 'confirm';
        if (id.indexOf('focus-mode-exit') >= 0 || id.indexOf('back') >= 0 || id.indexOf('cancel') >= 0) return 'soft';
        if (cls.indexOf('custom-style-btn') >= 0 || id.indexOf('style-') >= 0) return 'theme';
        if (cls.indexOf('upcoming-status-btn') >= 0) return 'toggle';
        if (id.indexOf('unlock') >= 0) return 'unlock';
        return 'default';
      }

      function playButtonClickSound(buttonEl) {
        try {
          var ctx = getClickAudioContext();
          if (!ctx) return;
          if (ctx.state === 'suspended') {
            ctx.resume().catch(function () {});
          }
          var theme = getActiveThemeName();
          var profile = THEME_SOUND_PROFILES[theme] || THEME_SOUND_PROFILES.ocean;
          var variant = getButtonSoundVariant(buttonEl);
          var offsetByVariant = {
            default: 0,
            soft: -40,
            toggle: 20,
            theme: 55,
            confirm: 90,
            danger: -70,
            unlock: 120
          };
          var start = ctx.currentTime + 0.005;
          var duration = variant === 'theme' ? 0.13 : (variant === 'unlock' ? 0.16 : 0.1);
          var baseFreq = Math.max(120, profile.base + (offsetByVariant[variant] || 0));
          var accentFreq = Math.max(180, profile.accent + (offsetByVariant[variant] || 0) * 1.2);

          var oscA = ctx.createOscillator();
          var oscB = ctx.createOscillator();
          var gain = ctx.createGain();
          var filter = ctx.createBiquadFilter();

          oscA.type = profile.wave;
          oscB.type = (profile.wave === 'sine') ? 'triangle' : 'sine';
          oscA.frequency.setValueAtTime(baseFreq, start);
          oscB.frequency.setValueAtTime(accentFreq, start);
          oscA.frequency.exponentialRampToValueAtTime(Math.max(80, baseFreq * 0.86), start + duration);
          oscB.frequency.exponentialRampToValueAtTime(Math.max(100, accentFreq * 0.82), start + duration);

          filter.type = profile.type;
          filter.Q.value = profile.q;
          filter.frequency.setValueAtTime(Math.max(280, accentFreq * 1.35), start);

          gain.gain.setValueAtTime(0.0001, start);
          gain.gain.exponentialRampToValueAtTime(variant === 'danger' ? 0.05 : 0.038, start + 0.015);
          gain.gain.exponentialRampToValueAtTime(0.0001, start + duration);

          oscA.connect(filter);
          oscB.connect(filter);
          filter.connect(gain);
          gain.connect(ctx.destination);

          oscA.start(start);
          oscB.start(start);
          oscA.stop(start + duration + 0.01);
          oscB.stop(start + duration + 0.01);
        } catch (e) {}
      }

      function renderPoints() {
        var pointsEl = document.getElementById('app-points-display');
        var shardsEl = document.getElementById('app-shards-display');
        if (!pointsEl) return;
        pointsEl.textContent = 'Points: ' + getPoints();
        if (shardsEl) shardsEl.textContent = 'Shards: ' + getShards();
        renderUnlockableStyles();
      }

      function setPoints(points) {
        var safePoints = parseInt(points, 10);
        if (isNaN(safePoints)) safePoints = 0;
        localStorage.setItem(POINTS_STORAGE_KEY, String(safePoints));
        renderPoints();
      }

      function setShards(shards) {
        var safeShards = parseInt(shards, 10);
        if (isNaN(safeShards) || safeShards < 0) safeShards = 0;
        localStorage.setItem(SHARDS_STORAGE_KEY, String(safeShards));
        renderPoints();
      }

      function getLocalDateKey(offsetDays) {
        var d = new Date();
        if (offsetDays) d.setDate(d.getDate() + offsetDays);
        var y = d.getFullYear();
        var m = d.getMonth() + 1;
        var day = d.getDate();
        var pad = function (n) { return (n < 10 ? '0' : '') + n; };
        return y + '-' + pad(m) + '-' + pad(day);
      }

      function getStreak() {
        try {
          var raw = localStorage.getItem(STREAK_STORAGE_KEY);
          if (raw === null) return 0;
          var value = parseInt(raw, 10);
          return isNaN(value) ? 0 : value;
        } catch (e) {
          return 0;
        }
      }

      function setStreak(value) {
        var safe = parseInt(value, 10);
        if (isNaN(safe) || safe < 0) safe = 0;
        localStorage.setItem(STREAK_STORAGE_KEY, String(safe));
        renderStreak();
      }

      function renderStreak() {
        var streakEl = document.getElementById('app-streak-display');
        if (!streakEl) return;
        streakEl.textContent = '🔥 Streak: ' + getStreak();
      }

      function updateDailyStreakOnLogin() {
        var todayKey = getLocalDateKey(0);
        var yesterdayKey = getLocalDateKey(-1);
        var lastLogin = localStorage.getItem(STREAK_LAST_LOGIN_STORAGE_KEY);
        var streak = getStreak();

        if (lastLogin === todayKey) {
          renderStreak();
          return;
        }
        if (lastLogin === yesterdayKey) {
          streak += 1;
        } else {
          streak = 1;
        }
        localStorage.setItem(STREAK_LAST_LOGIN_STORAGE_KEY, todayKey);
        setStreak(streak);
        showStreakLoginOverlay(streak);
      }

      function getUnlockableState() {
        try {
          var raw = localStorage.getItem(UNLOCKABLES_STORAGE_KEY);
          var state = raw ? JSON.parse(raw) : {};
          return state && typeof state === 'object' ? state : {};
        } catch (e) {
          return {};
        }
      }

      function saveUnlockableState(state) {
        try {
          localStorage.setItem(UNLOCKABLES_STORAGE_KEY, JSON.stringify(state || {}));
        } catch (e) {}
      }

      function isThemeUnlocked(themeName) {
        if (themeName !== 'steph' && themeName !== 'waterpokemon') return true;
        var state = getUnlockableState();
        if (themeName === 'steph') return !!state.stephUnlocked;
        return !!state.waterPokemonUnlocked;
      }

      function applyTheme(themeName) {
        var allowedThemes = THEME_OPTIONS;
        var theme = allowedThemes.indexOf(themeName) >= 0 ? themeName : 'ocean';
        if (!isThemeUnlocked(theme)) theme = 'ocean';
        allowedThemes.forEach(function (name) {
          document.body.classList.toggle('theme-' + name, name === theme);
        });
        document.querySelectorAll('.custom-style-btn[data-theme]').forEach(function (btn) {
          btn.classList.toggle('is-active', btn.getAttribute('data-theme') === theme);
        });
      }

      function saveTheme(themeName) {
        var allowedThemes = THEME_OPTIONS;
        var safeTheme = allowedThemes.indexOf(themeName) >= 0 ? themeName : 'ocean';
        if (!isThemeUnlocked(safeTheme)) safeTheme = 'ocean';
        localStorage.setItem(THEME_STORAGE_KEY, safeTheme);
      }

      function renderUnlockableStyles() {
        var unlockBtn = document.getElementById('unlock-steph-btn');
        var statusEl = document.getElementById('unlock-steph-status');
        var waterBtn = document.getElementById('unlock-water-pokemon-btn');
        var waterStatusEl = document.getElementById('unlock-water-pokemon-status');
        if (!unlockBtn || !statusEl) return;
        var unlocked = isThemeUnlocked('steph');
        var points = getPoints();
        var canUnlock = points >= STEPH_THEME_UNLOCK_COST;
        if (unlocked) {
          unlockBtn.disabled = false;
          unlockBtn.textContent = 'Apply Steph Curry';
          statusEl.textContent = 'Unlocked';
        } else {
          unlockBtn.disabled = !canUnlock;
          unlockBtn.textContent = 'Unlock (' + STEPH_THEME_UNLOCK_COST + ' pts)';
          statusEl.textContent = canUnlock ? 'Ready to unlock' : 'Need ' + (STEPH_THEME_UNLOCK_COST - points) + ' more points';
        }

        if (waterBtn && waterStatusEl) {
          var waterUnlocked = isThemeUnlocked('waterpokemon');
          var shards = getShards();
          var canUnlockWater = shards >= WATER_POKEMON_THEME_SHARD_COST;
          if (waterUnlocked) {
            waterBtn.disabled = false;
            waterBtn.textContent = 'Apply Water Pokemon';
            waterStatusEl.textContent = 'Unlocked';
          } else {
            waterBtn.disabled = !canUnlockWater;
            waterBtn.textContent = 'Unlock (' + WATER_POKEMON_THEME_SHARD_COST + ' shards)';
            waterStatusEl.textContent = canUnlockWater ? 'Ready to unlock' : 'Need ' + (WATER_POKEMON_THEME_SHARD_COST - shards) + ' more shards';
          }
        }
      }

      function initThemeControls() {
        var saved = localStorage.getItem(THEME_STORAGE_KEY) || 'ocean';
        applyTheme(saved);
        document.querySelectorAll('.custom-style-btn[data-theme]').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var theme = btn.getAttribute('data-theme') || 'ocean';
            saveTheme(theme);
            applyTheme(theme);
          });
        });
        var unlockBtn = document.getElementById('unlock-steph-btn');
        if (unlockBtn) {
          unlockBtn.addEventListener('click', function () {
            var unlocked = isThemeUnlocked('steph');
            if (!unlocked) {
              var points = getPoints();
              if (points < STEPH_THEME_UNLOCK_COST) return;
              setPoints(points - STEPH_THEME_UNLOCK_COST);
              var state = getUnlockableState();
              state.stephUnlocked = true;
              saveUnlockableState(state);
            }
            saveTheme('steph');
            applyTheme('steph');
            renderUnlockableStyles();
          });
        }
        var waterBtn = document.getElementById('unlock-water-pokemon-btn');
        if (waterBtn) {
          waterBtn.addEventListener('click', function () {
            var unlocked = isThemeUnlocked('waterpokemon');
            if (!unlocked) {
              var shards = getShards();
              if (shards < WATER_POKEMON_THEME_SHARD_COST) return;
              setShards(shards - WATER_POKEMON_THEME_SHARD_COST);
              var state = getUnlockableState();
              state.waterPokemonUnlocked = true;
              saveUnlockableState(state);
            }
            saveTheme('waterpokemon');
            applyTheme('waterpokemon');
            renderUnlockableStyles();
          });
        }
        var redeemForm = document.getElementById('redeem-code-form');
        var redeemInput = document.getElementById('redeem-code-input');
        var redeemStatus = document.getElementById('redeem-code-status');
        if (redeemForm && redeemInput && redeemStatus) {
          redeemForm.addEventListener('submit', function (e) {
            e.preventDefault();
            var code = (redeemInput.value || '').trim().toUpperCase();
            if (!code) {
              redeemStatus.textContent = 'Enter a code first.';
              return;
            }
            if (code === REDEEM_DEV_CODE) {
              setPoints(getPoints() + REDEEM_DEV_POINTS_REWARD);
              setShards(getShards() + REDEEM_DEV_SHARDS_REWARD);
              redeemStatus.textContent = 'Code accepted: +' + REDEEM_DEV_POINTS_REWARD + ' points, +' + REDEEM_DEV_SHARDS_REWARD + ' shards.';
              redeemInput.value = '';
              return;
            }
            redeemStatus.textContent = 'Invalid code.';
          });
        }
        renderUnlockableStyles();
      }

      function showStreakLoginOverlay(streak) {
        if (!streakLoginOverlay || !streakLoginTitle) return;
        if (streakLoginHideTimer) clearTimeout(streakLoginHideTimer);
        streakLoginTitle.textContent = '🔥 Your ' + streak + ' day streak! Well done!';
        streakLoginOverlay.classList.add('is-open');
        streakLoginOverlay.setAttribute('aria-hidden', 'false');
        streakLoginHideTimer = setTimeout(function () {
          streakLoginOverlay.classList.remove('is-open');
          streakLoginOverlay.setAttribute('aria-hidden', 'true');
        }, 2200);
      }

      function renderDailyMotivation() {
        var motivationEl = document.getElementById('daily-motivation-text');
        if (!motivationEl) return;
        var messages = [
          'The 24-Hour Equalizer: Every billionaire and every beginner gets the same 1,440 minutes. The difference is not talent; it is the calendar. Respect the block you built for yourself.',
          'Discipline Over Desire: Motivation gets you to write the schedule. Discipline gets you to pick up the pen when the alarm goes off. Do not wait for a feeling; follow the plan.',
          'The Cost of "Later": Procrastination is a debt you pay with interest. When you skip a task today, you steal from your peace tomorrow. Pay the price now.',
          'Brick by Brick: You do not build a wall in a day. You lay one brick as perfectly as a brick can be laid. Your schedule is just a series of bricks. Lay this one.',
          'The Silent Promise: A schedule is a contract with your future self. If you would not break a promise to a friend, why are you comfortable breaking one to yourself?',
          'Win the Morning: How you handle the first hour dictates the next fifteen. If you win the battle against the snooze button, you have already started a victory streak.',
          'Focus is a Muscle: The world wants your attention. Your schedule protects it. Stay in the lane you chose before the noise started.',
          'The Power of No: Your schedule is not a cage; it is a shield. It gives you the power to say no to the unimportant so you can say yes to your legacy.',
          'The Beautiful Struggle: Comfort is the graveyard of growth. If it feels heavy, it is because you are leveling up. Embrace the friction.',
          'Write Your Own Script: If you do not decide who you are, the world will decide for you. Be the author, not the reader, of your own life.',
          'Failure is Data: A mistake is not a stop sign; it is a rerouting signal. Analyze the why, adjust the how, and go again.',
          'The Comparison Trap: Comparison is the thief of joy. The only person you should try to beat is the person you were yesterday.',
          'Resilience is Quiet: Strength is not always a loud roar. Sometimes it is the quiet voice at the end of the day saying, "I will try again tomorrow."',
          'Your Circle Matters: You are the average of the five people you spend the most time with. Choose giants, and you will learn to walk tall.',
          'Gratitude as Fuel: You cannot build a great future if you hate your present. Find one thing that works, and use that energy to fix what does not.',
          'The Long Game: We overestimate what we can do in a month and underestimate what we can do in a decade. Stay patient. Stay hungry.'
        ];
        if (!messages.length) return;

        var todayKey = getLocalDateKey(0);
        var savedDate = localStorage.getItem(MOTIVATION_DATE_STORAGE_KEY);
        var savedIndexRaw = localStorage.getItem(MOTIVATION_INDEX_STORAGE_KEY);
        var index = savedIndexRaw !== null ? parseInt(savedIndexRaw, 10) : -1;

        if (savedDate !== todayKey || isNaN(index) || index < 0 || index >= messages.length) {
          index = Math.floor(Math.random() * messages.length);
          localStorage.setItem(MOTIVATION_DATE_STORAGE_KEY, todayKey);
          localStorage.setItem(MOTIVATION_INDEX_STORAGE_KEY, String(index));
        }
        motivationEl.textContent = messages[index];
      }

      function generateActivityId() {
        return 'act_' + Date.now().toString(36) + '_' + Math.random().toString(36).slice(2, 8);
      }

      function normalizePriority(priority) {
        if (priority === 'high' || priority === 'medium' || priority === 'low') return priority;
        return 'none';
      }

      function getPriorityRank(priority) {
        var normalized = normalizePriority(priority);
        if (normalized === 'high') return 0;
        if (normalized === 'medium') return 1;
        if (normalized === 'low') return 2;
        return 3;
      }

      function getPriorityLabel(priority) {
        var normalized = normalizePriority(priority);
        if (normalized === 'high') return 'High';
        if (normalized === 'medium') return 'Medium';
        if (normalized === 'low') return 'Low';
        return 'None';
      }

      function buildPrioritySelectHtml(dateKey, id, selectedPriority, className) {
        var normalized = normalizePriority(selectedPriority);
        var selectClass = className || 'schedule-priority-select';
        return '<select class="' + selectClass + '" data-date="' + dateKey + '" data-id="' + id + '">' +
          '<option value="none"' + (normalized === 'none' ? ' selected' : '') + '>None</option>' +
          '<option value="high"' + (normalized === 'high' ? ' selected' : '') + '>High</option>' +
          '<option value="medium"' + (normalized === 'medium' ? ' selected' : '') + '>Medium</option>' +
          '<option value="low"' + (normalized === 'low' ? ' selected' : '') + '>Low</option>' +
          '</select>';
      }

      function normalizeActivity(act) {
        var item = act && typeof act === 'object' ? act : {};
        if (!item.id) item.id = generateActivityId();
        if (item.status !== 'in_progress' && item.status !== 'done') item.status = 'pending';
        if (!item.start) item.start = '00:00';
        if (!item.name) item.name = 'Activity';
        if (!item.color) item.color = '#38bdf8';
        item.priority = normalizePriority(item.priority);
        if (typeof item.elapsedMs !== 'number' || isNaN(item.elapsedMs)) item.elapsedMs = 0;
        if (typeof item.progressStartedAt !== 'number' || isNaN(item.progressStartedAt)) item.progressStartedAt = null;
        return item;
      }

      function formatDuration(ms) {
        var totalSeconds = Math.max(0, Math.floor(ms / 1000));
        var h = Math.floor(totalSeconds / 3600);
        var m = Math.floor((totalSeconds % 3600) / 60);
        var s = totalSeconds % 60;
        var pad = function (v) { return (v < 10 ? '0' : '') + v; };
        return pad(h) + ':' + pad(m) + ':' + pad(s);
      }

      function getActivityElapsedMs(act, nowMs) {
        var base = act && typeof act.elapsedMs === 'number' ? act.elapsedMs : 0;
        if (act && act.status === 'in_progress' && act.progressStartedAt) {
          return base + Math.max(0, (nowMs || Date.now()) - act.progressStartedAt);
        }
        return base;
      }

      function showCompletionOverlay(name, elapsedMs) {
        if (!scheduleCompleteOverlay || !scheduleCompleteText) return;
        if (scheduleCompleteHideTimer) clearTimeout(scheduleCompleteHideTimer);
        scheduleCompleteText.textContent = 'You completed "' + (name || 'Activity') + '" in ' + formatDuration(elapsedMs) + '.';
        scheduleCompleteOverlay.classList.add('is-open');
        scheduleCompleteOverlay.setAttribute('aria-hidden', 'false');
        scheduleCompleteHideTimer = setTimeout(function () {
          scheduleCompleteOverlay.classList.remove('is-open');
          scheduleCompleteOverlay.setAttribute('aria-hidden', 'true');
        }, 1900);
      }

      function initPlinkoGame() {
        // Games removed
        return;
      }

      function getDomain(urlStr) {
        try {
          var u = new URL(urlStr);
          return u.hostname.replace(/^www\./, '');
        } catch (e) {
          return urlStr;
        }
      }

      function getFaviconUrl(urlStr) {
        var domain = getDomain(urlStr);
        return 'https://www.google.com/s2/favicons?domain=' + encodeURIComponent(domain) + '&sz=64';
      }

      function getAppIconUrl(item) {
        if (!item || item.type !== 'link') return '';
        if (normalizeComparableUrl(item.url) === normalizeComparableUrl('tidal://store')) {
          return TIDAL_STORE_ICON_SVG;
        }
        if (normalizeComparableUrl(item.url) === normalizeComparableUrl('https://docs.google.com/')) {
          return GOOGLE_DOCS_ICON_PATH;
        }
        if (normalizeComparableUrl(item.url) === normalizeComparableUrl('https://docs.google.com/presentation')) {
          return GOOGLE_SLIDES_ICON_PATH;
        }
        if (normalizeComparableUrl(item.url) === normalizeComparableUrl('https://mail.google.com/')) {
          return GMAIL_ICON_PATH;
        }
        return getFaviconUrl(item.url);
      }

      function isGoogleSlidesItem(item) {
        if (!item || item.type !== 'link') return false;
        return normalizeComparableUrl(item.url) === normalizeComparableUrl('https://docs.google.com/presentation');
      }

      function hasAppInMenu(url) {
        if (!url) return false;
        var target = normalizeComparableUrl(url);
        return getLinks().some(function (item) {
          return item.type === 'link' && normalizeComparableUrl(item.url) === target;
        });
      }

      function closeStoreAppOverlay() {
        var overlay = document.getElementById('store-app-overlay');
        if (!overlay) return;
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        activeStoreApp = null;
      }

      function openStoreAppOverlay(app) {
        if (!app) return;
        var overlay = document.getElementById('store-app-overlay');
        var titleEl = document.getElementById('store-app-title');
        var descEl = document.getElementById('store-app-description');
        var logoEl = document.getElementById('store-app-logo');
        var addBtn = document.getElementById('store-app-add-btn');
        if (!overlay || !titleEl || !descEl || !logoEl || !addBtn) return;
        activeStoreApp = app;
        titleEl.textContent = app.name || 'App';
        descEl.textContent = app.description || 'Add this app to your menu.';
        logoEl.src = getFaviconUrl(app.url);
        logoEl.alt = app.name || 'App logo';
        var exists = hasAppInMenu(app.url);
        addBtn.disabled = exists;
        addBtn.textContent = exists ? 'Already in Menu' : 'Add to Menu';
        overlay.classList.add('is-open');
        overlay.setAttribute('aria-hidden', 'false');
      }

      function renderTidalStore() {
        var usefulSection = document.getElementById('tidal-store-useful-section');
        var discoverSection = document.getElementById('tidal-store-discover-section');
        var allSection = document.getElementById('tidal-store-all-section');
        var usefulGrid = document.getElementById('tidal-store-useful-grid');
        var discoverGrid = document.getElementById('tidal-store-discover-grid');
        var allGrid = document.getElementById('tidal-store-all-grid');
        var searchEl = document.getElementById('tidal-store-search');
        var allAppsBtn = document.getElementById('tidal-store-all-apps-btn');
        if (!usefulSection || !discoverSection || !allSection || !usefulGrid || !discoverGrid || !allGrid || !allAppsBtn) return;

        var query = searchEl ? (searchEl.value || '').trim().toLowerCase() : '';
        var filtered = TIDAL_STORE_APPS.filter(function (app) {
          if (!query) return true;
          return app.name.toLowerCase().indexOf(query) >= 0 || app.url.toLowerCase().indexOf(query) >= 0;
        });

        function makeCard(app) {
          var btn = document.createElement('button');
          btn.type = 'button';
          btn.className = 'folder-view-app-btn tidal-store-app-btn';
          btn.innerHTML = '<img class="folder-view-app-icon" src="' + getFaviconUrl(app.url) + '" alt="">' +
            '<span class="folder-view-app-name">' + app.name + '</span>';
          btn.addEventListener('click', function () {
            openStoreAppOverlay(app);
          });
          return btn;
        }

        usefulGrid.innerHTML = '';
        discoverGrid.innerHTML = '';
        allGrid.innerHTML = '';
        filtered.forEach(function (app) {
          if (app.section === 'useful') usefulGrid.appendChild(makeCard(app));
          else discoverGrid.appendChild(makeCard(app));
          allGrid.appendChild(makeCard(app));
        });

        if (!usefulGrid.children.length) usefulGrid.innerHTML = '<p class="upcoming-empty">No apps found.</p>';
        if (!discoverGrid.children.length) discoverGrid.innerHTML = '<p class="upcoming-empty">No apps found.</p>';
        if (!allGrid.children.length) allGrid.innerHTML = '<p class="upcoming-empty">No apps found.</p>';

        usefulSection.hidden = tidalStoreShowAll;
        discoverSection.hidden = tidalStoreShowAll;
        allSection.hidden = !tidalStoreShowAll;
        allAppsBtn.classList.toggle('is-active', tidalStoreShowAll);
        allAppsBtn.textContent = tidalStoreShowAll ? 'Section view' : 'All apps';
      }

      function getItemById(itemId) {
        if (!itemId) return null;
        var links = getLinks();
        for (var i = 0; i < links.length; i++) {
          if (links[i].id === itemId) return links[i];
        }
        return null;
      }

      function deleteLibraryItem(itemId) {
        if (!itemId) return;
        var links = getLinks();
        var target = links.find(function (item) { return item.id === itemId; });
        if (!target || isTidalStoreLink(target)) return;
        var next = links
          .filter(function (item) { return item.id !== itemId; })
          .map(function (item) {
            if (target.type === 'folder' && item.folderId === itemId) {
              item.folderId = null;
            }
            return item;
          });
        saveLinks(next);
      }

      function setItemFolder(itemId, folderId) {
        if (!itemId) return false;
        var links = getLinks();
        var moving = links.find(function (i) { return i.id === itemId; });
        if (folderId && moving && isTidalStoreLink(moving)) return false;
        var folder = folderId ? links.find(function (i) { return i.id === folderId && i.type === 'folder'; }) : null;
        var changed = false;
        links = links.map(function (item) {
          if (item.id !== itemId) return item;
          if (item.type !== 'link') return item;
          if (isTidalStoreLink(item) && folderId) return item;
          if (folderId && !folder) return item;
          changed = true;
          item.folderId = folderId || null;
          return item;
        });
        if (!changed) return false;
        saveLinks(links);
        return true;
      }

      function swapRootItems(firstId, secondId) {
        if (!firstId || !secondId || firstId === secondId) return false;
        var links = getLinks();
        var roots = links.filter(function (item) { return !item.folderId; });
        var children = links.filter(function (item) { return !!item.folderId; });
        var firstIndex = roots.findIndex(function (item) { return item.id === firstId; });
        var secondIndex = roots.findIndex(function (item) { return item.id === secondId; });
        if (firstIndex < 0 || secondIndex < 0) return false;
        var tmp = roots[firstIndex];
        roots[firstIndex] = roots[secondIndex];
        roots[secondIndex] = tmp;
        saveLinks(roots.concat(children));
        return true;
      }

      function captureGridPositions(grid) {
        var map = {};
        if (!grid) return map;
        grid.querySelectorAll('.app-link-card[data-id]').forEach(function (card) {
          var id = card.getAttribute('data-id');
          if (!id) return;
          map[id] = card.getBoundingClientRect();
        });
        return map;
      }

      function animateGridReorder(grid, previousPositions) {
        if (!grid) return;
        requestAnimationFrame(function () {
          grid.querySelectorAll('.app-link-card[data-id]').forEach(function (card) {
            var id = card.getAttribute('data-id');
            var prev = previousPositions[id];
            if (!prev) return;
            var now = card.getBoundingClientRect();
            var dx = prev.left - now.left;
            var dy = prev.top - now.top;
            if (Math.abs(dx) < 1 && Math.abs(dy) < 1) return;
            card.style.transition = 'none';
            card.style.transform = 'translate(' + dx + 'px, ' + dy + 'px)';
            requestAnimationFrame(function () {
              card.style.transition = 'transform 220ms cubic-bezier(0.22, 1, 0.36, 1)';
              card.style.transform = '';
              setTimeout(function () {
                card.style.transition = '';
              }, 240);
            });
          });
        });
      }

      function closeFolderViewOverlay() {
        var overlay = document.getElementById('folder-view-overlay');
        if (!overlay) return;
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        currentFolderViewId = null;
      }

      function renderFolderViewOverlay(folderId) {
        var overlay = document.getElementById('folder-view-overlay');
        var titleEl = document.getElementById('folder-view-title');
        var listEl = document.getElementById('folder-view-list');
        if (!overlay || !titleEl || !listEl) return;
        var links = getLinks();
        var folder = links.find(function (item) { return item.id === folderId && item.type === 'folder'; });
        if (!folder) return;
        currentFolderViewId = folderId;
        titleEl.textContent = folder.name || 'Folder';
        listEl.innerHTML = '';
        var children = links.filter(function (item) { return item.type === 'link' && item.folderId === folderId; });
        if (!children.length) {
          listEl.innerHTML = '<li class="folder-view-empty">No apps in this folder yet.</li>';
        } else {
          children.forEach(function (item) {
            var li = document.createElement('li');
            li.className = 'folder-view-item';
            var appBtn = document.createElement('button');
            appBtn.type = 'button';
            appBtn.className = 'folder-view-app-btn';
            appBtn.innerHTML =
              '<img class="folder-view-app-icon' + (isGoogleSlidesItem(item) ? ' folder-view-app-icon-large' : '') + '" src="' + getAppIconUrl(item) + '" alt="">' +
              '<span class="folder-view-app-name">' + (item.name || getDomain(item.url)) + '</span>';
            appBtn.addEventListener('click', function () {
              if (appEditMode) {
                openAppEditOverlay(item.id);
                return;
              }
              if (normalizeComparableUrl(item.url) === normalizeComparableUrl('tidal://store')) {
                closeFolderViewOverlay();
                playPageTransition(function () {
                  setActivePanel('tidal_store');
                });
                return;
              }
              window.open(item.url, '_blank', 'noopener,noreferrer');
            });
            li.appendChild(appBtn);

            var takeOutBtn = document.createElement('button');
            takeOutBtn.type = 'button';
            takeOutBtn.className = 'folder-view-remove-btn';
            takeOutBtn.textContent = 'Take out';
            takeOutBtn.addEventListener('click', function (e) {
              e.preventDefault();
              e.stopPropagation();
              if (!setItemFolder(item.id, null)) return;
              renderLinks();
              renderFolderViewOverlay(folderId);
            });
            li.appendChild(takeOutBtn);
            listEl.appendChild(li);
          });
        }
        overlay.classList.add('is-open');
        overlay.setAttribute('aria-hidden', 'false');
      }

      function closeAppEditOverlay() {
        var overlay = document.getElementById('app-edit-overlay');
        var renameRow = document.getElementById('app-edit-rename-row');
        var renameBtn = document.getElementById('app-edit-rename-btn');
        var deleteBtn = document.getElementById('app-edit-delete-btn');
        if (!overlay) return;
        if (renameRow) renameRow.hidden = true;
        if (renameBtn) renameBtn.hidden = false;
        if (deleteBtn) deleteBtn.hidden = false;
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        appEditTargetId = null;
      }

      function openAppEditOverlay(itemId) {
        if (!appEditMode) return;
        var item = getItemById(itemId);
        var overlay = document.getElementById('app-edit-overlay');
        var titleEl = document.getElementById('app-edit-title');
        var subtitleEl = document.getElementById('app-edit-subtitle');
        var renameInput = document.getElementById('app-edit-rename-input');
        var renameRow = document.getElementById('app-edit-rename-row');
        var renameBtn = document.getElementById('app-edit-rename-btn');
        var deleteBtn = document.getElementById('app-edit-delete-btn');
        if (!item || !overlay || !titleEl || !subtitleEl || !renameInput || !renameRow || !renameBtn) return;
        appEditTargetId = itemId;
        var storeLocked = isTidalStoreLink(item);
        if (deleteBtn) deleteBtn.hidden = storeLocked;
        renameBtn.hidden = storeLocked;
        titleEl.textContent = storeLocked ? 'Tidal Store' : item.type === 'folder' ? 'Edit folder' : 'Edit app';
        subtitleEl.textContent = storeLocked
          ? 'Built-in — you can reorder it on the grid, but it can’t be renamed, deleted, or moved into a folder.'
          : item.name || (item.type === 'folder' ? 'Folder' : getDomain(item.url));
        renameInput.value = item.name || '';
        renameRow.hidden = true;
        renameBtn.textContent = item.type === 'folder' ? 'Rename folder' : 'Rename app';
        overlay.classList.add('is-open');
        overlay.setAttribute('aria-hidden', 'false');
      }

      function setEditMode(on) {
        appEditMode = !!on;
        var editBtn = document.getElementById('edit-apps-btn');
        var grid = document.getElementById('app-links-grid');
        if (editBtn) {
          editBtn.classList.toggle('is-active', appEditMode);
          editBtn.textContent = appEditMode ? 'Done editing' : 'Edit apps';
        }
        if (grid) {
          grid.classList.toggle('is-editing', appEditMode);
        }
        if (!appEditMode) {
          var grid = document.getElementById('app-links-grid');
          if (grid) grid.classList.remove('is-drag-active');
          closeAppEditOverlay();
        }
        renderLinks();
      }

      function renderLinks() {
        var grid = document.getElementById('app-links-grid');
        var links = getLinks();
        var rootItems = links.filter(function (item) { return !item.folderId; });
        if (!grid) return;
        var previousPositions = captureGridPositions(grid);
        grid.classList.toggle('is-editing', appEditMode);
        grid.innerHTML = '';
        rootItems.forEach(function (item) {
          var card = document.createElement('button');
          card.type = 'button';
          card.className = 'app-link-card';
          card.setAttribute('data-id', item.id);
          card.setAttribute('data-type', item.type);
          card.setAttribute('title', item.type === 'folder' ? (item.name || 'Folder') : item.url);
          if (item.type === 'folder') card.classList.add('app-link-folder');
          if (appEditMode) card.classList.add('app-link-card-editing');

          if (item.type === 'folder') {
            var folderIcon = document.createElement('span');
            folderIcon.className = 'app-link-folder-icon';
            folderIcon.textContent = '📁';
            card.appendChild(folderIcon);
          } else {
            var img = document.createElement('img');
            img.src = getAppIconUrl(item);
            img.alt = '';
            img.className = 'app-link-icon';
            if (isGoogleSlidesItem(item)) img.classList.add('app-link-icon-large');
            card.appendChild(img);
          }

          var nameEl = document.createElement('span');
          nameEl.className = 'app-link-name';
          nameEl.textContent = item.name || (item.type === 'folder' ? 'Folder' : getDomain(item.url));
          card.appendChild(nameEl);

          if (item.type === 'folder') {
            var folderCount = links.filter(function (child) { return child.folderId === item.id; }).length;
            var countEl = document.createElement('span');
            countEl.className = 'app-link-folder-count';
            countEl.textContent = folderCount + ' app' + (folderCount === 1 ? '' : 's');
            card.appendChild(countEl);
          }

          if (appEditMode) {
            var editBadge = document.createElement('span');
            editBadge.className = 'app-link-edit-badge';
            editBadge.textContent = 'Edit';
            card.appendChild(editBadge);
          }

          if (appEditMode) {
            card.draggable = true;
            card.addEventListener('dragstart', function () {
              draggedLinkId = item.id;
              grid.classList.add('is-drag-active');
              card.classList.add('is-dragging');
            });
            card.addEventListener('dragend', function () {
              draggedLinkId = null;
              grid.classList.remove('is-drag-active');
              card.classList.remove('is-dragging');
              grid.querySelectorAll('.app-link-folder.is-drop-target, .app-link-card.is-swap-target').forEach(function (el) {
                el.classList.remove('is-drop-target');
                el.classList.remove('is-swap-target');
              });
            });
            card.addEventListener('dragover', function (e) {
              if (!draggedLinkId) return;
              if (draggedLinkId === item.id) return;
              e.preventDefault();
              var draggedItem = getItemById(draggedLinkId);
              if (item.type === 'folder' && draggedItem && draggedItem.type === 'link' && !isTidalStoreLink(draggedItem)) {
                card.classList.add('is-drop-target');
              } else {
                card.classList.add('is-swap-target');
              }
            });
            card.addEventListener('dragleave', function () {
              card.classList.remove('is-drop-target');
              card.classList.remove('is-swap-target');
            });
            card.addEventListener('drop', function (e) {
              if (!draggedLinkId) return;
              if (draggedLinkId === item.id) return;
              e.preventDefault();
              var draggedItem = getItemById(draggedLinkId);
              card.classList.remove('is-drop-target');
              card.classList.remove('is-swap-target');
              var changed = false;
              if (item.type === 'folder' && draggedItem && draggedItem.type === 'link' && !isTidalStoreLink(draggedItem)) {
                changed = setItemFolder(draggedLinkId, item.id);
              } else {
                changed = swapRootItems(draggedLinkId, item.id);
              }
              if (changed) {
                grid.classList.remove('is-drag-active');
                renderLinks();
                if (currentFolderViewId === item.id) renderFolderViewOverlay(item.id);
              }
              draggedLinkId = null;
            });
          }

          card.addEventListener('click', function () {
            if (appEditMode) {
              openAppEditOverlay(item.id);
              return;
            }
            if (item.type === 'folder') {
              renderFolderViewOverlay(item.id);
              return;
            }
            if (normalizeComparableUrl(item.url) === normalizeComparableUrl('tidal://store')) {
              playPageTransition(function () {
                setActivePanel('tidal_store');
              });
              return;
            }
            window.open(item.url, '_blank', 'noopener,noreferrer');
          });

          grid.appendChild(card);
        });
        animateGridReorder(grid, previousPositions);
      }

      function getAllActivitiesByDate() {
        try {
          var raw = localStorage.getItem(ACTIVITIES_STORAGE_KEY);
          var all = raw ? JSON.parse(raw) : {};
          var changed = false;
          Object.keys(all).forEach(function (dateKey) {
            var list = Array.isArray(all[dateKey]) ? all[dateKey] : [];
            all[dateKey] = list.map(function (act) {
              var normalized = normalizeActivity(act);
              if (!act || !act.id || !act.status) changed = true;
              return normalized;
            });
          });
          if (changed) {
            localStorage.setItem(ACTIVITIES_STORAGE_KEY, JSON.stringify(all));
          }
          return all;
        } catch (e) {
          return {};
        }
      }

      function toDateTimeMs(dateKey, time24) {
        if (!dateKey || !time24) return NaN;
        var dParts = dateKey.split('-');
        var tParts = time24.split(':');
        if (dParts.length !== 3 || tParts.length < 2) return NaN;
        var y = parseInt(dParts[0], 10);
        var m = parseInt(dParts[1], 10) - 1;
        var d = parseInt(dParts[2], 10);
        var h = parseInt(tParts[0], 10);
        var min = parseInt(tParts[1], 10);
        if ([y, m, d, h, min].some(function (v) { return isNaN(v); })) return NaN;
        return new Date(y, m, d, h, min, 0, 0).getTime();
      }

      function getScheduleItems() {
        var all = getAllActivitiesByDate();
        var nowMs = Date.now();
        var items = [];
        Object.keys(all).forEach(function (dateKey) {
          var dayItems = all[dateKey] || [];
          dayItems.forEach(function (act) {
            var startMs = toDateTimeMs(dateKey, act.start);
            var endMs = toDateTimeMs(dateKey, act.end || act.start || '00:00');
            if (isNaN(startMs)) return;
            var status = act.status || 'pending';
            items.push({
              id: act.id,
              dateKey: dateKey,
              start: act.start,
              end: act.end,
              name: act.name || 'Activity',
              color: act.color || '#38bdf8',
              priority: normalizePriority(act.priority),
              status: status,
              elapsedMs: getActivityElapsedMs(act, nowMs),
              startMs: startMs,
              endMs: endMs,
              isOverdue: startMs < nowMs && status !== 'done',
              score: Math.abs(startMs - nowMs)
            });
          });
        });
        items.sort(function (a, b) {
          if (a.status === 'done' && b.status !== 'done') return 1;
          if (b.status === 'done' && a.status !== 'done') return -1;
          if (a.isOverdue && !b.isOverdue) return -1;
          if (b.isOverdue && !a.isOverdue) return 1;
          if (allSchedulesSortMode === 'priority') {
            if (getPriorityRank(a.priority) !== getPriorityRank(b.priority)) {
              return getPriorityRank(a.priority) - getPriorityRank(b.priority);
            }
            return a.startMs - b.startMs;
          }
          if (allSchedulesSortMode === 'time') {
            if (a.startMs !== b.startMs) return a.startMs - b.startMs;
            return getPriorityRank(a.priority) - getPriorityRank(b.priority);
          }
          if (a.score !== b.score) return a.score - b.score;
          if (getPriorityRank(a.priority) !== getPriorityRank(b.priority)) {
            return getPriorityRank(a.priority) - getPriorityRank(b.priority);
          }
          return a.startMs - b.startMs;
        });
        return items;
      }

      function formatDateLabel(dateKey) {
        var parts = dateKey.split('-');
        if (parts.length !== 3) return dateKey;
        var d = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
        return d.toLocaleDateString(undefined, { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });
      }

      function setActivityStatus(dateKey, id, status) {
        if (!dateKey || !id) return false;
        var list = getActivities(dateKey);
        var idx = list.findIndex(function (a) { return a.id === id; });
        if (idx < 0) return false;
        var nowMs = Date.now();
        var act = list[idx];
        if (status === 'in_progress') {
          act.status = 'in_progress';
          if (!act.progressStartedAt) act.progressStartedAt = nowMs;
          if (typeof act.elapsedMs !== 'number' || isNaN(act.elapsedMs)) act.elapsedMs = 0;
        } else if (status === 'done') {
          act.elapsedMs = getActivityElapsedMs(act, nowMs);
          act.progressStartedAt = null;
          act.status = 'done';
          act.completedAt = nowMs;
          showCompletionOverlay(act.name, act.elapsedMs);
        } else {
          act.elapsedMs = getActivityElapsedMs(act, nowMs);
          act.status = 'pending';
          act.progressStartedAt = null;
        }
        list[idx] = normalizeActivity(act);
        saveActivities(dateKey, list);
        return true;
      }

      function setActivityPriority(dateKey, id, priority) {
        if (!dateKey || !id) return false;
        var list = getActivities(dateKey);
        var idx = list.findIndex(function (a) { return a.id === id; });
        if (idx < 0) return false;
        list[idx].priority = normalizePriority(priority);
        saveActivities(dateKey, list);
        return true;
      }

      function shiftDateKey(dateKey, dayDelta) {
        var parts = dateKey ? dateKey.split('-') : [];
        if (parts.length !== 3) return dateKey;
        var y = parseInt(parts[0], 10);
        var m = parseInt(parts[1], 10) - 1;
        var d = parseInt(parts[2], 10);
        if ([y, m, d].some(function (v) { return isNaN(v); })) return dateKey;
        var dt = new Date(y, m, d);
        dt.setDate(dt.getDate() + dayDelta);
        var pad = function (n) { return (n < 10 ? '0' : '') + n; };
        return dt.getFullYear() + '-' + pad(dt.getMonth() + 1) + '-' + pad(dt.getDate());
      }

      function moveActivityToTomorrow(dateKey, id) {
        if (!dateKey || !id) return false;
        var source = getActivities(dateKey);
        var idx = source.findIndex(function (a) { return a.id === id; });
        if (idx < 0) return false;
        var act = normalizeActivity(source[idx]);
        source.splice(idx, 1);
        saveActivities(dateKey, source);
        var targetDate = shiftDateKey(dateKey, 1);
        var target = getActivities(targetDate);
        act.status = 'pending';
        act.progressStartedAt = null;
        act.id = generateActivityId();
        target.push(act);
        saveActivities(targetDate, target);
        return true;
      }

      function snoozeOverdueActivity(dateKey, id) {
        if (!dateKey || !id) return false;
        var list = getActivities(dateKey);
        var idx = list.findIndex(function (a) { return a.id === id; });
        if (idx < 0) return false;
        var act = normalizeActivity(list[idx]);
        var now = new Date();
        now.setSeconds(0, 0);
        now.setMinutes(now.getMinutes() + 30);
        var targetDate = now.getFullYear() + '-' +
          ((now.getMonth() + 1 < 10 ? '0' : '') + (now.getMonth() + 1)) + '-' +
          ((now.getDate() < 10 ? '0' : '') + now.getDate());
        var targetTime = (now.getHours() < 10 ? '0' : '') + now.getHours() + ':' +
          (now.getMinutes() < 10 ? '0' : '') + now.getMinutes();

        if (targetDate === dateKey) {
          act.start = targetTime;
          act.status = 'pending';
          act.progressStartedAt = null;
          list[idx] = act;
          saveActivities(dateKey, list);
        } else {
          list.splice(idx, 1);
          saveActivities(dateKey, list);
          var targetList = getActivities(targetDate);
          act.start = targetTime;
          act.status = 'pending';
          act.progressStartedAt = null;
          act.id = generateActivityId();
          targetList.push(act);
          saveActivities(targetDate, targetList);
        }
        return true;
      }

      function deleteActivity(dateKey, id) {
        if (!dateKey || !id) return;
        var list = getActivities(dateKey);
        var next = list.filter(function (a) { return a.id !== id; });
        saveActivities(dateKey, next);
      }

      function wireScheduleItemActions(scopeEl, options) {
        options = options || {};
        scopeEl.querySelectorAll('.upcoming-status-btn').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var dateKey = btn.getAttribute('data-date');
            var id = btn.getAttribute('data-id');
            var status = btn.getAttribute('data-status');
            var card = btn.closest('.upcoming-item');
            if (!dateKey || !id || !status) return;
            if (status === 'done' && options.autoHideDone && card) {
              card.classList.add('is-fading-out');
              setTimeout(function () {
                setActivityStatus(dateKey, id, status);
                renderUpcomingSchedules();
                renderAllSchedules();
                if (currentScheduleDate === dateKey) renderDayActivities();
                renderDailyQuests();
              }, 260);
            } else {
              if (!setActivityStatus(dateKey, id, status)) return;
              renderUpcomingSchedules();
              renderAllSchedules();
              if (currentScheduleDate === dateKey) renderDayActivities();
              renderDailyQuests();
            }
          });
        });
        scopeEl.querySelectorAll('.upcoming-delete-btn').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var dateKey = btn.getAttribute('data-date');
            var id = btn.getAttribute('data-id');
            if (!dateKey || !id) return;
            deleteActivity(dateKey, id);
            renderUpcomingSchedules();
            renderAllSchedules();
            if (currentScheduleDate === dateKey) renderDayActivities();
            renderDailyQuests();
          });
        });
        scopeEl.querySelectorAll('.schedule-priority-select').forEach(function (selectEl) {
          selectEl.addEventListener('change', function () {
            var dateKey = selectEl.getAttribute('data-date');
            var id = selectEl.getAttribute('data-id');
            if (!dateKey || !id) return;
            if (!setActivityPriority(dateKey, id, selectEl.value)) return;
            renderUpcomingSchedules();
            renderAllSchedules();
            if (currentScheduleDate === dateKey) renderDayActivities();
          });
        });
        scopeEl.querySelectorAll('.schedule-overdue-action').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var dateKey = btn.getAttribute('data-date');
            var id = btn.getAttribute('data-id');
            var action = btn.getAttribute('data-overdue-action');
            if (!dateKey || !id || !action) return;
            var changed = action === 'snooze'
              ? snoozeOverdueActivity(dateKey, id)
              : moveActivityToTomorrow(dateKey, id);
            if (!changed) return;
            renderUpcomingSchedules();
            renderAllSchedules();
            renderDayActivities();
            renderDailyQuests();
          });
        });
        scopeEl.querySelectorAll('.focus-mode-btn').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var dateKey = btn.getAttribute('data-date');
            var id = btn.getAttribute('data-id');
            if (!dateKey || !id) return;
            openFocusMode(dateKey, id);
          });
        });
      }

      function renderScheduleCards(listEl, items, options) {
        options = options || {};
        var nowMs = Date.now();
        listEl.innerHTML = '';
        if (!items.length) {
          listEl.innerHTML = '<li class="upcoming-empty">No schedules found.</li>';
          return;
        }
        var currentDateSection = null;
        items.forEach(function (act) {
          if (options.hideDone && act.status === 'done') return;
          if (options.dateFilter && options.dateFilter !== 'all' && act.dateKey !== options.dateFilter) return;
          if (options.groupByDate && currentDateSection !== act.dateKey) {
            currentDateSection = act.dateKey;
            var headerLi = document.createElement('li');
            headerLi.className = 'all-schedules-date-header';
            headerLi.textContent = formatDateLabel(act.dateKey);
            listEl.appendChild(headerLi);
          }
          var parts = act.dateKey.split('-');
          var d = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
          var li = document.createElement('li');
          li.className = 'upcoming-item status-' + (act.status || 'pending');
          li.innerHTML =
            '<span class="upcoming-item-color" style="background:' + act.color + '"></span>' +
            '<span class="upcoming-item-main">' +
              '<span class="upcoming-item-name">' + act.name + ' <span class="schedule-priority-badge priority-' + act.priority + '">' + getPriorityLabel(act.priority) + '</span>' +
                (act.isOverdue ? ' <span class="upcoming-overdue-warning">Not Completed! Due past schedule time!</span>' : '') +
              '</span>' +
              '<span class="upcoming-item-time">' +
                (act.startMs < nowMs && (!isNaN(act.endMs) && act.endMs >= nowMs) ? 'Now · ' : '') +
                (act.isOverdue ? 'Overdue · ' : '') +
                d.toLocaleDateString(undefined, { month: 'short', day: 'numeric' }) +
                ' · ' + formatTime24ToAmPm(act.start) +
                (act.end ? ' - ' + formatTime24ToAmPm(act.end) : '') +
              '</span>' +
              '<span class="upcoming-priority-edit">Priority: ' + buildPrioritySelectHtml(act.dateKey, act.id, act.priority, 'schedule-priority-select inline-priority-select') + '</span>' +
              (act.status === 'in_progress'
                ? '<span class="upcoming-timer">Timer: ' + formatDuration(act.elapsedMs) + '</span>'
                : (act.status === 'done'
                  ? '<span class="upcoming-timer done-time">Completed in: ' + formatDuration(act.elapsedMs) + '</span>'
                  : '')) +
            '</span>' +
            '<span class="upcoming-item-actions">' +
              '<button type="button" class="upcoming-status-btn' + (act.status === 'in_progress' ? ' is-active' : '') + '" data-date="' + act.dateKey + '" data-id="' + act.id + '" data-status="in_progress">In progress</button>' +
              '<button type="button" class="upcoming-status-btn' + (act.status === 'done' ? ' is-active' : '') + '" data-date="' + act.dateKey + '" data-id="' + act.id + '" data-status="done">Done</button>' +
              (act.status !== 'done' ? '<button type="button" class="upcoming-status-btn focus-mode-btn" data-date="' + act.dateKey + '" data-id="' + act.id + '">Focus</button>' : '') +
              (act.isOverdue ? '<button type="button" class="upcoming-status-btn schedule-overdue-action" data-date="' + act.dateKey + '" data-id="' + act.id + '" data-overdue-action="snooze">Snooze</button>' : '') +
              (act.isOverdue ? '<button type="button" class="upcoming-status-btn schedule-overdue-action" data-date="' + act.dateKey + '" data-id="' + act.id + '" data-overdue-action="tomorrow">Move tomorrow</button>' : '') +
              (options.showDelete ? '<button type="button" class="upcoming-delete-btn" data-date="' + act.dateKey + '" data-id="' + act.id + '">Delete</button>' : '') +
            '</span>';
          listEl.appendChild(li);
        });
        if (!listEl.children.length) {
          listEl.innerHTML = '<li class="upcoming-empty">No schedules found.</li>';
          return;
        }
        wireScheduleItemActions(listEl, options);
      }

      function renderUpcomingSchedules() {
        var listEl = document.getElementById('upcoming-list');
        var viewAllBtn = document.getElementById('upcoming-view-all-btn');
        if (!listEl) return;
        var items = getScheduleItems();
        var shown = items.filter(function (it) { return it.status !== 'done'; }).slice(0, 1);
        renderScheduleCards(listEl, shown, { hideDone: true, autoHideDone: true });
        if (viewAllBtn) viewAllBtn.hidden = false;
        renderDailyQuests();
      }

      function populateAllSchedulesFilter(items) {
        var filterEl = document.getElementById('all-schedules-date-filter');
        if (!filterEl) return;
        var existing = allSchedulesDateFilter;
        var dates = [];
        items.forEach(function (it) {
          if (dates.indexOf(it.dateKey) === -1) dates.push(it.dateKey);
        });
        dates.sort();
        filterEl.innerHTML = '<option value="all">All days</option>';
        dates.forEach(function (dateKey) {
          var opt = document.createElement('option');
          opt.value = dateKey;
          opt.textContent = formatDateLabel(dateKey);
          filterEl.appendChild(opt);
        });
        if (existing !== 'all' && dates.indexOf(existing) === -1) existing = 'all';
        filterEl.value = existing;
      }

      function renderAllSchedules() {
        var listEl = document.getElementById('all-schedules-list');
        if (!listEl) return;
        var items = getScheduleItems();
        populateAllSchedulesFilter(items);
        renderScheduleCards(listEl, items, {
          groupByDate: true,
          dateFilter: allSchedulesDateFilter,
          showDelete: true,
          hideDone: true,
          autoHideDone: true
        });
      }

      function getDailyQuestState() {
        var todayKey = getLocalDateKey(0);
        try {
          var raw = localStorage.getItem(QUESTS_STORAGE_KEY);
          var all = raw ? JSON.parse(raw) : {};
          var state = all[todayKey] && typeof all[todayKey] === 'object' ? all[todayKey] : {};
          state.completeThreeClaimed = !!state.completeThreeClaimed;
          state.noOverdueClaimed = !!state.noOverdueClaimed;
          state.completeThreeShardClaimed = !!state.completeThreeShardClaimed;
          state.noOverdueShardClaimed = !!state.noOverdueShardClaimed;
          return state;
        } catch (e) {
          return { completeThreeClaimed: false, noOverdueClaimed: false, completeThreeShardClaimed: false, noOverdueShardClaimed: false };
        }
      }

      function saveDailyQuestState(state) {
        var todayKey = getLocalDateKey(0);
        try {
          var raw = localStorage.getItem(QUESTS_STORAGE_KEY);
          var all = raw ? JSON.parse(raw) : {};
          all[todayKey] = {
            completeThreeClaimed: !!state.completeThreeClaimed,
            noOverdueClaimed: !!state.noOverdueClaimed,
            completeThreeShardClaimed: !!state.completeThreeShardClaimed,
            noOverdueShardClaimed: !!state.noOverdueShardClaimed
          };
          localStorage.setItem(QUESTS_STORAGE_KEY, JSON.stringify(all));
        } catch (e) {}
      }

      function getDailyQuestProgress() {
        var all = getAllActivitiesByDate();
        var todayKey = getLocalDateKey(0);
        var doneToday = 0;
        var totalToday = 0;
        var overdueToday = false;
        Object.keys(all).forEach(function (dateKey) {
          var list = all[dateKey] || [];
          list.forEach(function (act) {
            if (dateKey !== todayKey) return;
            totalToday += 1;
            if (act.status === 'done') doneToday += 1;
          });
        });
        var scheduleItems = getScheduleItems();
        overdueToday = scheduleItems.some(function (item) {
          return item.dateKey === todayKey && item.isOverdue;
        });
        return {
          doneToday: doneToday,
          completeThreeDone: doneToday >= 3,
          noOverdueDone: totalToday > 0 && !overdueToday
        };
      }

      function applyQuestRewards(progress, state) {
        var changed = false;
        if (progress.completeThreeDone && !state.completeThreeClaimed) {
          setPoints(getPoints() + QUEST_COMPLETE_THREE_REWARD);
          state.completeThreeClaimed = true;
          changed = true;
        }
        if (progress.completeThreeDone && !state.completeThreeShardClaimed) {
          setShards(getShards() + QUEST_COMPLETE_THREE_SHARD_REWARD);
          state.completeThreeShardClaimed = true;
          changed = true;
        }
        if (progress.noOverdueDone && !state.noOverdueClaimed) {
          setPoints(getPoints() + QUEST_NO_OVERDUE_REWARD);
          state.noOverdueClaimed = true;
          changed = true;
        }
        if (progress.noOverdueDone && !state.noOverdueShardClaimed) {
          setShards(getShards() + QUEST_NO_OVERDUE_SHARD_REWARD);
          state.noOverdueShardClaimed = true;
          changed = true;
        }
        if (changed) saveDailyQuestState(state);
        return changed;
      }

      function renderDailyQuests() {
        var questsEl = document.getElementById('daily-quests-list');
        if (!questsEl) return;
        var progress = getDailyQuestProgress();
        var state = getDailyQuestState();
        var changed = applyQuestRewards(progress, state);
        if (changed) {
          state = getDailyQuestState();
        }
        questsEl.innerHTML = '';
        var completeThreeLine = document.createElement('li');
        completeThreeLine.className = 'daily-quests-item' + (state.completeThreeClaimed ? ' is-complete' : '');
        completeThreeLine.innerHTML =
          '<span>Complete 3 tasks (' + progress.doneToday + '/3)</span>' +
          '<span class="daily-quests-points">+' + QUEST_COMPLETE_THREE_REWARD + ' pts, +' + QUEST_COMPLETE_THREE_SHARD_REWARD + ' shard</span>';
        questsEl.appendChild(completeThreeLine);
        var noOverdueLine = document.createElement('li');
        noOverdueLine.className = 'daily-quests-item' + (state.noOverdueClaimed ? ' is-complete' : '');
        noOverdueLine.innerHTML =
          '<span>No overdue tasks today</span>' +
          '<span class="daily-quests-points">+' + QUEST_NO_OVERDUE_REWARD + ' pts, +' + QUEST_NO_OVERDUE_SHARD_REWARD + ' shard</span>';
        questsEl.appendChild(noOverdueLine);
      }

      function getActivityById(dateKey, id) {
        var list = getActivities(dateKey);
        var idx = list.findIndex(function (a) { return a.id === id; });
        if (idx < 0) return null;
        return normalizeActivity(list[idx]);
      }

      function updateFocusView() {
        if (!focusContext || !focusModeOverlay) return;
        var act = getActivityById(focusContext.dateKey, focusContext.id);
        if (!act) {
          closeFocusMode();
          return;
        }
        focusModeTitle.textContent = act.name || 'Activity';
        focusModeTime.textContent = formatDuration(getActivityElapsedMs(act, Date.now()));
        var isPaused = act.status !== 'in_progress';
        focusModeToggleBtn.textContent = isPaused ? 'Resume' : 'Pause';
      }

      function closeFocusMode() {
        if (focusTimerId) {
          clearInterval(focusTimerId);
          focusTimerId = null;
        }
        focusContext = null;
        document.body.classList.remove('focus-mode-active');
        if (!focusModeOverlay) return;
        focusModeOverlay.classList.remove('is-open');
        focusModeOverlay.setAttribute('aria-hidden', 'true');
        if (document.fullscreenElement && document.exitFullscreen) {
          document.exitFullscreen().catch(function () {});
        }
      }

      function openFocusMode(dateKey, id) {
        if (!focusModeOverlay || !focusModeTitle || !focusModeTime) return;
        var act = getActivityById(dateKey, id);
        if (!act) return;
        focusContext = { dateKey: dateKey, id: id };
        if (act.status !== 'done') setActivityStatus(dateKey, id, 'in_progress');
        document.body.classList.add('focus-mode-active');
        focusModeOverlay.classList.add('is-open');
        focusModeOverlay.setAttribute('aria-hidden', 'false');
        updateFocusView();
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen().catch(function () {});
        }
        if (focusTimerId) clearInterval(focusTimerId);
        focusTimerId = setInterval(updateFocusView, 1000);
        renderUpcomingSchedules();
        renderAllSchedules();
        if (currentScheduleDate === dateKey) renderDayActivities();
      }

      function hasInProgressSchedules() {
        var items = getScheduleItems();
        return items.some(function (it) { return it.status === 'in_progress'; });
      }

      var addBtn = document.getElementById('add-link-btn');
      var makeFolderBtn = document.getElementById('make-folder-btn');
      var editAppsBtn = document.getElementById('edit-apps-btn');
      var panel = document.getElementById('add-link-panel');
      var form = document.getElementById('add-link-form');
      var urlInput = document.getElementById('link-url-input');
      var nameInput = document.getElementById('link-name-input');
      var cancelBtn = document.getElementById('add-link-cancel');

      function openAddPanel() {
        panel.classList.add('is-open');
        urlInput.value = '';
        nameInput.value = '';
        setTimeout(function () {
          urlInput.focus();
        }, 10);
      }

      function closeAddPanel() {
        panel.classList.remove('is-open');
      }

      addBtn.addEventListener('click', function () {
        setEditMode(false);
        openAddPanel();
      });
      if (makeFolderBtn) {
        makeFolderBtn.addEventListener('click', function () {
          var links = getLinks();
          var folderName = 'Folder ' + (getFolderCount(links) + 1);
          links.push({
            id: generateLibraryItemId(),
            type: 'folder',
            name: folderName,
            folderId: null
          });
          saveLinks(links);
          closeAddPanel();
          renderLinks();
        });
      }
      if (editAppsBtn) {
        editAppsBtn.addEventListener('click', function () {
          closeAddPanel();
          setEditMode(!appEditMode);
        });
      }

      cancelBtn.addEventListener('click', function () {
        closeAddPanel();
      });

      form.addEventListener('submit', function (e) {
        e.preventDefault();
        var url = urlInput.value.trim();
        if (!url) {
          urlInput.focus();
          return;
        }
        if (url.indexOf('http') !== 0) url = 'https://' + url;
        try {
          new URL(url);
        } catch (e) {
          alert('Please enter a valid URL.');
          urlInput.focus();
          return;
        }
        var name = nameInput.value.trim();
        var links = getLinks();
        links.push({
          id: generateLibraryItemId(),
          type: 'link',
          url: url,
          folderId: null,
          name: name ? name : getDomain(url)
        });
        saveLinks(links);
        renderLinks();
        closeAddPanel();
      });

      var appEditOverlay = document.getElementById('app-edit-overlay');
      var appEditRenameBtn = document.getElementById('app-edit-rename-btn');
      var appEditDeleteBtn = document.getElementById('app-edit-delete-btn');
      var appEditCancelBtn = document.getElementById('app-edit-cancel-btn');
      var appEditSaveRenameBtn = document.getElementById('app-edit-save-rename-btn');
      var appEditRenameRow = document.getElementById('app-edit-rename-row');
      var appEditRenameInput = document.getElementById('app-edit-rename-input');

      if (appEditRenameBtn && appEditRenameRow && appEditRenameInput) {
        appEditRenameBtn.addEventListener('click', function () {
          if (!appEditTargetId) return;
          var t = getItemById(appEditTargetId);
          if (t && isTidalStoreLink(t)) return;
          appEditRenameRow.hidden = false;
          setTimeout(function () { appEditRenameInput.focus(); appEditRenameInput.select(); }, 0);
        });
      }
      if (appEditSaveRenameBtn) {
        appEditSaveRenameBtn.addEventListener('click', function () {
          if (!appEditTargetId) return;
          var t = getItemById(appEditTargetId);
          if (t && isTidalStoreLink(t)) return;
          var nextName = (appEditRenameInput && appEditRenameInput.value ? appEditRenameInput.value : '').trim();
          if (!nextName) return;
          var links = getLinks();
          links = links.map(function (item) {
            if (item.id !== appEditTargetId) return item;
            item.name = nextName;
            return item;
          });
          saveLinks(links);
          renderLinks();
          if (currentFolderViewId) renderFolderViewOverlay(currentFolderViewId);
          closeAppEditOverlay();
        });
      }
      if (appEditRenameInput && appEditSaveRenameBtn) {
        appEditRenameInput.addEventListener('keydown', function (e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            appEditSaveRenameBtn.click();
          }
        });
      }
      if (appEditDeleteBtn) {
        appEditDeleteBtn.addEventListener('click', function () {
          if (!appEditTargetId) return;
          var t = getItemById(appEditTargetId);
          if (t && isTidalStoreLink(t)) return;
          deleteLibraryItem(appEditTargetId);
          renderLinks();
          if (currentFolderViewId) {
            var folderStillExists = !!getItemById(currentFolderViewId);
            if (folderStillExists) renderFolderViewOverlay(currentFolderViewId);
            else closeFolderViewOverlay();
          }
          closeAppEditOverlay();
        });
      }
      if (appEditCancelBtn) {
        appEditCancelBtn.addEventListener('click', closeAppEditOverlay);
      }
      if (appEditOverlay) {
        appEditOverlay.addEventListener('click', function (e) {
          if (e.target === appEditOverlay) closeAppEditOverlay();
        });
      }

      var folderOverlay = document.getElementById('folder-view-overlay');
      var folderCloseBtn = document.getElementById('folder-view-close-btn');
      if (folderCloseBtn) folderCloseBtn.addEventListener('click', closeFolderViewOverlay);
      if (folderOverlay) {
        folderOverlay.addEventListener('click', function (e) {
          if (e.target === folderOverlay) closeFolderViewOverlay();
        });
      }

      maybeMigrateLegacyAccountData();
      ensurePresetApps();
      renderLinks();
      renderUpcomingSchedules();
      renderAllSchedules();
      renderDailyMotivation();
      renderDailyQuests();
      renderPoints();
      updateDailyStreakOnLogin();
      initThemeControls();
      renderDisplayName();
      openNamePrompt(false);
      // Games removed

      // Schedule: local date/time calendar
      var SCHEDULE_TZ = (Intl.DateTimeFormat().resolvedOptions().timeZone) || 'UTC';
      var scheduleViewYear = null;
      var scheduleViewMonth = null; // 0-11

      function getNowInScheduleZone() {
        var now = new Date();
        return new Date(now.toLocaleString('en-US', { timeZone: SCHEDULE_TZ }));
      }

      function renderScheduleCalendar() {
        var todayEl = document.getElementById('schedule-today');
        var calEl = document.getElementById('schedule-calendar');
        if (!todayEl || !calEl) return;

        var nowTz = getNowInScheduleZone();
        if (scheduleViewYear === null || scheduleViewMonth === null) {
          scheduleViewYear = nowTz.getFullYear();
          scheduleViewMonth = nowTz.getMonth();
        }
        var year = scheduleViewYear;
        var month = scheduleViewMonth;
        var todayDate = nowTz.getDate();
        var isCurrentMonth = (year === nowTz.getFullYear() && month === nowTz.getMonth());

        todayEl.textContent =
          nowTz.toLocaleString(undefined, {
            weekday: 'long',
            day: 'numeric',
            month: 'long',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
          });

        var firstDay = new Date(year, month, 1).getDay(); // 0=Sun
        var daysInMonth = new Date(year, month + 1, 0).getDate();
        var weekdayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
          'September', 'October', 'November', 'December'];
        var yearMin = nowTz.getFullYear() - 50;
        var yearMax = nowTz.getFullYear() + 50;

        var html = '<div class="cal-toolbar">' +
          '<button type="button" class="cal-nav-btn" id="schedule-prev-month" aria-label="Previous month">‹</button>' +
          '<div class="cal-nav-selects">' +
          '<select class="cal-nav-select" id="schedule-month-select" aria-label="Select month">';
        monthNames.forEach(function (m, idx) {
          html += '<option value="' + idx + '"' + (idx === month ? ' selected' : '') + '>' + m + '</option>';
        });
        html += '</select><select class="cal-nav-select" id="schedule-year-select" aria-label="Select year">';
        for (var y = yearMin; y <= yearMax; y++) {
          html += '<option value="' + y + '"' + (y === year ? ' selected' : '') + '>' + y + '</option>';
        }
        html += '</select></div>' +
          '<button type="button" class="cal-nav-btn" id="schedule-next-month" aria-label="Next month">›</button>' +
          '</div>';
        html += '<div class=\"cal-grid cal-grid-header\">';
        weekdayLabels.forEach(function (d) {
          html += '<div class=\"cal-cell cal-head\">' + d + '</div>';
        });
        html += '</div><div class=\"cal-grid\">';

        for (var i = 0; i < firstDay; i++) {
          html += '<div class=\"cal-cell cal-empty\"></div>';
        }

        var pad = function (n) { return (n < 10 ? '0' : '') + n; };
        for (var day = 1; day <= daysInMonth; day++) {
          var isToday = isCurrentMonth && day === todayDate;
          var dateKey = year + '-' + pad(month + 1) + '-' + pad(day);
          var isSelected = currentScheduleDate === dateKey;
          html += '<div class=\"cal-cell cal-day' +
            (isSelected ? ' cal-selected' : '') +
            (isToday ? ' cal-today' : '') +
            '\" data-date=\"' + dateKey + '\" role=\"button\" tabindex=\"0\">' + day + '</div>';
        }

        html += '</div>';
        calEl.innerHTML = html;

        var prevBtn = document.getElementById('schedule-prev-month');
        var nextBtn = document.getElementById('schedule-next-month');
        var monthSelect = document.getElementById('schedule-month-select');
        var yearSelect = document.getElementById('schedule-year-select');

        if (prevBtn) {
          prevBtn.addEventListener('click', function () {
            scheduleViewMonth -= 1;
            if (scheduleViewMonth < 0) {
              scheduleViewMonth = 11;
              scheduleViewYear -= 1;
            }
            renderScheduleCalendar();
          });
        }
        if (nextBtn) {
          nextBtn.addEventListener('click', function () {
            scheduleViewMonth += 1;
            if (scheduleViewMonth > 11) {
              scheduleViewMonth = 0;
              scheduleViewYear += 1;
            }
            renderScheduleCalendar();
          });
        }
        if (monthSelect) {
          monthSelect.addEventListener('change', function () {
            scheduleViewMonth = parseInt(this.value, 10);
            renderScheduleCalendar();
          });
        }
        if (yearSelect) {
          yearSelect.addEventListener('change', function () {
            scheduleViewYear = parseInt(this.value, 10);
            renderScheduleCalendar();
          });
        }

        calEl.querySelectorAll('.cal-day').forEach(function (cell) {
          cell.addEventListener('click', function () {
            var key = this.getAttribute('data-date');
            if (key) openDayPanel(key);
          });
          cell.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
              e.preventDefault();
              var key = this.getAttribute('data-date');
              if (key) openDayPanel(key);
            }
          });
        });
      }

      var currentScheduleDate = null;

      function getActivities(dateKey) {
        try {
          var raw = localStorage.getItem(ACTIVITIES_STORAGE_KEY);
          var all = raw ? JSON.parse(raw) : {};
          var list = Array.isArray(all[dateKey]) ? all[dateKey] : [];
          var changed = false;
          list = list.map(function (act) {
            var normalized = normalizeActivity(act);
            if (!act || !act.id || !act.status) changed = true;
            return normalized;
          });
          if (changed) {
            all[dateKey] = list;
            localStorage.setItem(ACTIVITIES_STORAGE_KEY, JSON.stringify(all));
          }
          return list;
        } catch (e) { return []; }
      }

      function saveActivities(dateKey, list) {
        try {
          var raw = localStorage.getItem(ACTIVITIES_STORAGE_KEY);
          var all = raw ? JSON.parse(raw) : {};
          all[dateKey] = (Array.isArray(list) ? list : []).map(normalizeActivity);
          localStorage.setItem(ACTIVITIES_STORAGE_KEY, JSON.stringify(all));
        } catch (e) {}
      }

      function ampmTo24(hour, min, ampm) {
        var h = parseInt(hour, 10);
        if (ampm === 'PM') h = h === 12 ? 12 : h + 12;
        else h = h === 12 ? 0 : h;
        var m = (min === '' || min === null) ? 0 : parseInt(min, 10);
        return (h < 10 ? '0' : '') + h + ':' + (m < 10 ? '0' : '') + m;
      }

      function formatTime24ToAmPm(t) {
        var parts = t.split(':');
        var h = parseInt(parts[0], 10);
        var m = parts[1] || '00';
        var ampm = h >= 12 ? 'PM' : 'AM';
        h = h % 12;
        if (h === 0) h = 12;
        return h + ':' + m + ' ' + ampm;
      }

      function openDayPanel(dateKey) {
        currentScheduleDate = dateKey;
        renderScheduleCalendar();
        var parts = dateKey.split('-');
        var d = new Date(parseInt(parts[0], 10), parseInt(parts[1], 10) - 1, parseInt(parts[2], 10));
        var titleEl = document.getElementById('schedule-day-panel-title');
        if (titleEl) {
          titleEl.textContent = 'Schedule for ' + d.toLocaleDateString(undefined, { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });
        }
        renderDayActivities();
        var panel = document.getElementById('schedule-day-panel');
        if (panel) panel.classList.add('is-open');
      }

      function renderDayActivities() {
        var listEl = document.getElementById('schedule-day-activities');
        if (!listEl || !currentScheduleDate) return;
        var activities = getActivities(currentScheduleDate);
        activities.sort(function (a, b) {
          if (getPriorityRank(a.priority) !== getPriorityRank(b.priority)) {
            return getPriorityRank(a.priority) - getPriorityRank(b.priority);
          }
          return (a.start || '').localeCompare(b.start || '');
        });
        listEl.innerHTML = '';
        activities.forEach(function (act) {
          var li = document.createElement('li');
          li.className = 'schedule-day-activity-item';
          var timeLabel = formatTime24ToAmPm(act.start || '00:00');
          if (act.end) timeLabel += ' – ' + formatTime24ToAmPm(act.end);
          li.innerHTML =
            '<span class="schedule-day-activity-color" style="background:' + (act.color || '#38bdf8') + '"></span>' +
            '<span class="schedule-day-activity-time">' + timeLabel + '</span>' +
            '<span class="schedule-day-activity-name">' + (act.name || 'Activity') + ' <span class="schedule-priority-badge priority-' + normalizePriority(act.priority) + '">' + getPriorityLabel(act.priority) + '</span></span>' +
            buildPrioritySelectHtml(currentScheduleDate, act.id, act.priority, 'schedule-priority-select schedule-day-priority-select') +
            (act.status !== 'done' ? '<button type="button" class="upcoming-status-btn focus-mode-btn" data-date="' + currentScheduleDate + '" data-id="' + act.id + '">Focus</button>' : '') +
            '<button type="button" class="schedule-day-activity-remove" data-id="' + act.id + '" aria-label="Remove">×</button>';
          listEl.appendChild(li);
        });
        listEl.querySelectorAll('.schedule-day-activity-remove').forEach(function (btn) {
          btn.addEventListener('click', function () {
            var activityId = this.getAttribute('data-id');
            var list = getActivities(currentScheduleDate);
            var next = list.filter(function (act) { return act.id !== activityId; });
            saveActivities(currentScheduleDate, next);
            renderDayActivities();
            renderUpcomingSchedules();
            renderAllSchedules();
            renderDailyQuests();
          });
        });
        wireScheduleItemActions(listEl, { showDelete: false });
      }

      /** Parse typed time "9:30", "9:3", "12" -> { hour: 1-12, min: 0-59 } or null */
      function parseTimeInput(str) {
        if (!str || typeof str !== 'string') return null;
        str = str.trim().replace(/\s/g, '');
        var parts = str.split(':');
        var h = parseInt(parts[0], 10);
        var m = parts.length > 1 ? parseInt(parts[1], 10) : 0;
        if (isNaN(h) || h < 1 || h > 12) return null;
        if (isNaN(m) || m < 0 || m > 59) m = 0;
        return { hour: h, min: m };
      }

      function setupTimeInput(el) {
        if (!el) return;
        el.addEventListener('input', function () {
          var v = this.value.replace(/[^\d:]/g, '');
          if (v.length >= 2 && v.indexOf(':') === -1) {
            v = v.slice(0, 2) + ':' + v.slice(2);
          }
          this.value = v.slice(0, 5);
        });
      }
      setupTimeInput(document.getElementById('activity-start-time'));

      var dayForm = document.getElementById('schedule-day-add-form');
      if (dayForm) {
        dayForm.addEventListener('submit', function (e) {
          e.preventDefault();
          if (!currentScheduleDate) return;
          var nameEl = document.getElementById('activity-name');
          var colorEl = document.getElementById('activity-color');
          var startTimeStr = (document.getElementById('activity-start-time') && document.getElementById('activity-start-time').value) || '';
          var startAmpm = (document.getElementById('activity-start-ampm') && document.getElementById('activity-start-ampm').value) || 'AM';
          var startParsed = parseTimeInput(startTimeStr);
          if (!startParsed) {
            alert('Please enter a start time (e.g. 9:30).');
            return;
          }
          var start = ampmTo24(String(startParsed.hour), startParsed.min, startAmpm);
          var list = getActivities(currentScheduleDate);
          var priorityEl = document.getElementById('activity-priority');
          list.push({
            id: generateActivityId(),
            start: start,
            status: 'pending',
            name: (nameEl && nameEl.value) ? nameEl.value.trim() : 'Activity',
            color: (colorEl && colorEl.value) ? colorEl.value : '#38bdf8',
            priority: priorityEl ? normalizePriority(priorityEl.value) : 'none'
          });
          saveActivities(currentScheduleDate, list);
          renderDayActivities();
          renderUpcomingSchedules();
          renderAllSchedules();
          renderDailyQuests();
          if (nameEl) nameEl.value = '';
          var startInput = document.getElementById('activity-start-time');
          if (startInput) startInput.value = '';
          if (priorityEl) priorityEl.value = 'none';
        });
      }

      // If user lands on schedule directly (e.g. future deep link)
      if (document.getElementById('schedule-panel') &&
          !document.getElementById('schedule-panel').hidden) {
        renderScheduleCalendar();
      }
      renderUpcomingSchedules();
      renderAllSchedules();

      var sidebarMainBtn = document.getElementById('sidebar-main-btn');
      if (sidebarMainBtn) {
        sidebarMainBtn.addEventListener('click', function () {
          if (sidebarMainBtn.classList.contains('is-active')) return;
          playPageTransition(function () {
            setActivePanel('apps');
          });
        });
      }
      var sidebarScheduleBtn = document.getElementById('sidebar-schedule-btn');
      if (sidebarScheduleBtn) {
        sidebarScheduleBtn.addEventListener('click', function () {
          if (sidebarScheduleBtn.classList.contains('is-active')) return;
          playPageTransition(function () {
            setActivePanel('schedule');
          });
        });
      }
      var sidebarWhiteboardBtn = document.getElementById('sidebar-whiteboard-btn');
      if (sidebarWhiteboardBtn) {
        sidebarWhiteboardBtn.addEventListener('click', function () {
          if (sidebarWhiteboardBtn.classList.contains('is-active')) return;
          playPageTransition(function () {
            setActivePanel('whiteboard');
          });
        });
      }
      var sidebarCustomisationBtn = document.getElementById('sidebar-customisation-btn');
      if (sidebarCustomisationBtn) {
        sidebarCustomisationBtn.addEventListener('click', function () {
          if (sidebarCustomisationBtn.classList.contains('is-active')) return;
          playPageTransition(function () {
            setActivePanel('customisation');
          });
        });
      }

      var viewAllSchedulesBtn = document.getElementById('upcoming-view-all-btn');
      if (viewAllSchedulesBtn) {
        viewAllSchedulesBtn.addEventListener('click', function () {
          playPageTransition(function () {
            setActivePanel('all_schedules');
          });
        });
      }
      var allSchedulesBackBtn = document.getElementById('all-schedules-back-btn');
      if (allSchedulesBackBtn) {
        allSchedulesBackBtn.addEventListener('click', function () {
          playPageTransition(function () {
            setActivePanel('apps');
          });
        });
      }
      var tidalStoreBackBtn = document.getElementById('tidal-store-back-btn');
      if (tidalStoreBackBtn) {
        tidalStoreBackBtn.addEventListener('click', function () {
          playPageTransition(function () {
            setActivePanel('apps');
          });
        });
      }
      var tidalStoreSearchEl = document.getElementById('tidal-store-search');
      if (tidalStoreSearchEl) {
        tidalStoreSearchEl.addEventListener('input', renderTidalStore);
      }
      var tidalStoreAllAppsBtn = document.getElementById('tidal-store-all-apps-btn');
      if (tidalStoreAllAppsBtn) {
        tidalStoreAllAppsBtn.addEventListener('click', function () {
          tidalStoreShowAll = !tidalStoreShowAll;
          renderTidalStore();
        });
      }
      var storeAppOverlay = document.getElementById('store-app-overlay');
      var storeAppCloseBtn = document.getElementById('store-app-close-btn');
      var storeAppAddBtn = document.getElementById('store-app-add-btn');
      if (storeAppCloseBtn) storeAppCloseBtn.addEventListener('click', closeStoreAppOverlay);
      if (storeAppOverlay) {
        storeAppOverlay.addEventListener('click', function (e) {
          if (e.target === storeAppOverlay) closeStoreAppOverlay();
        });
      }
      if (storeAppAddBtn) {
        storeAppAddBtn.addEventListener('click', function () {
          if (!activeStoreApp || hasAppInMenu(activeStoreApp.url)) return;
          var links = getLinks();
          links.push({
            id: generateLibraryItemId(),
            type: 'link',
            url: activeStoreApp.url,
            name: activeStoreApp.name,
            folderId: null
          });
          saveLinks(links);
          renderLinks();
          renderTidalStore();
          openStoreAppOverlay(activeStoreApp);
        });
      }
      var allSchedulesApplyFilterBtn = document.getElementById('all-schedules-apply-filter-btn');
      if (allSchedulesApplyFilterBtn) {
        allSchedulesApplyFilterBtn.addEventListener('click', function () {
          var filterEl = document.getElementById('all-schedules-date-filter');
          allSchedulesDateFilter = filterEl ? filterEl.value : 'all';
          var sortEl = document.getElementById('all-schedules-sort-mode');
          allSchedulesSortMode = sortEl ? sortEl.value : 'smart';
          renderAllSchedules();
        });
      }
      var allSchedulesDateFilterEl = document.getElementById('all-schedules-date-filter');
      if (allSchedulesDateFilterEl) {
        allSchedulesDateFilterEl.addEventListener('change', function () {
          allSchedulesDateFilter = allSchedulesDateFilterEl.value || 'all';
          renderAllSchedules();
        });
      }
      var allSchedulesSortModeEl = document.getElementById('all-schedules-sort-mode');
      if (allSchedulesSortModeEl) {
        allSchedulesSortModeEl.addEventListener('change', function () {
          allSchedulesSortMode = allSchedulesSortModeEl.value || 'smart';
          renderAllSchedules();
        });
      }

      if (focusModeToggleBtn) {
        focusModeToggleBtn.addEventListener('click', function () {
          if (!focusContext) return;
          var act = getActivityById(focusContext.dateKey, focusContext.id);
          if (!act) return;
          setActivityStatus(focusContext.dateKey, focusContext.id, act.status === 'in_progress' ? 'pending' : 'in_progress');
          updateFocusView();
          renderUpcomingSchedules();
          renderAllSchedules();
          if (currentScheduleDate === focusContext.dateKey) renderDayActivities();
        });
      }
      if (focusModeDoneBtn) {
        focusModeDoneBtn.addEventListener('click', function () {
          if (!focusContext) return;
          setActivityStatus(focusContext.dateKey, focusContext.id, 'done');
          renderUpcomingSchedules();
          renderAllSchedules();
          if (currentScheduleDate === focusContext.dateKey) renderDayActivities();
          renderDailyQuests();
          closeFocusMode();
        });
      }
      if (focusModeExitBtn) {
        focusModeExitBtn.addEventListener('click', closeFocusMode);
      }
      if (focusModeOverlay) {
        focusModeOverlay.addEventListener('click', function (e) {
          if (e.target === focusModeOverlay) closeFocusMode();
        });
      }

      document.addEventListener('click', function (e) {
        var target = e.target;
        if (!target || !target.closest) return;
        var btn = target.closest('button');
        if (!btn || btn.disabled) return;
        playButtonClickSound(btn);
      }, true);

      setInterval(function () {
        if (!hasInProgressSchedules()) return;
        var appsPanel = document.getElementById('apps-panel');
        var allPanel = document.getElementById('all-schedules-panel');
        if (appsPanel && appsPanel.classList.contains('app-panel-active')) renderUpcomingSchedules();
        if (allPanel && allPanel.classList.contains('app-panel-active')) renderAllSchedules();
        if (focusContext) updateFocusView();
      }, 1000);

      document.querySelectorAll('.app-sidebar-item[href], .app-logout').forEach(function (link) {
        link.addEventListener('click', function (e) {
          if (e.defaultPrevented) return;
          if (e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
          if (e.button !== 0) return;
          e.preventDefault();
          var href = link.getAttribute('href');
          if (!href) return;
          playPageTransition(function () {
            window.location.href = href;
          });
        });
      });
    })();
  </script>
</body>
</html>
