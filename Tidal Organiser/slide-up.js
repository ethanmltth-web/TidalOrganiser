(function () {
  var els = document.querySelectorAll('.slide-up');
  if (!els.length) return;

  var observer = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    },
    { rootMargin: '0px 0px -8% 0px', threshold: 0 }
  );

  els.forEach(function (el) {
    observer.observe(el);
  });
})();
