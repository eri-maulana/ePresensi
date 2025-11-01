// Mockup helpers migrated from public/assets/js/app.js
// Purpose: UI helpers for mockup (collapse sidebar, active nav, clocks, chart placeholders, webcam preview)

document.addEventListener('DOMContentLoaded', () => {
  // sidebar collapse (desktop compact toggle buttons with class .toggle-btn)
  const toggles = document.querySelectorAll('.toggle-btn');
  toggles.forEach(btn => {
    btn.addEventListener('click', () => {
      const app = document.querySelector('.app');
      if (!app) return;
      const sb = app.querySelector('.sidebar');
      if (!sb) return;
      sb.classList.toggle('collapsed');
    });
  });

  // set active nav and allow real links to navigate
  document.querySelectorAll('.nav a').forEach(a => {
    a.addEventListener('click', (e) => {
      document.querySelectorAll('.nav a').forEach(x => x.classList.remove('active'));
      a.classList.add('active');

      const href = a.getAttribute('href') || '';
      if (href.trim() === '' || href.trim() === '#' || a.dataset.mock === 'true') {
        e.preventDefault();
      }
    });
  });

  // time tick if present
  const clocks = document.querySelectorAll('.now-time, .now-time');
  if (clocks.length) {
    setInterval(() => {
      const now = new Date();
      clocks.forEach(c => c.textContent = now.toLocaleString('id-ID'));
    }, 1000);
  }

  // Initialize simple chart placeholders only if Chart is available globally
  try {
    const Chart = window.Chart;
    if (Chart) {
      document.querySelectorAll('.chart-canvas').forEach(c => {
        const labels = c.dataset.labels ? JSON.parse(c.dataset.labels) : ['A','B','C','D','E'];
        const values = c.dataset.values ? JSON.parse(c.dataset.values) : [10,20,30,40,50];
        new Chart(c, {
          type: 'bar',
          data: { labels, datasets:[{label:'Jumlah', data: values, backgroundColor:'rgba(70,167,154,0.9)'}] },
          options:{responsive:true, maintainAspectRatio:false}
        });
      });
    }
  } catch (err) {
    // ignore if Chart parsing fails
    console.debug('Mockup chart init skipped', err);
  }

  // attempt to start webcam for preview elements (non-blocking)
  const cam = document.getElementById('camPreview');
  if (cam && navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: { facingMode: 'user' } })
      .then(stream => { cam.srcObject = stream; })
      .catch(() => { /* ignore in mockup if denied */ });
  }
});
