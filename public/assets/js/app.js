// Simple UI helpers for mockup: toggle sidebar, set active nav, fake search
document.addEventListener('DOMContentLoaded', ()=>{
  // sidebar toggle
  const toggle = document.querySelectorAll('.toggle-btn');
  toggle.forEach(btn=>{
    btn.addEventListener('click', ()=>{
      const app = document.querySelector('.app');
      const sb = app.querySelector('.sidebar');
      sb.classList.toggle('collapsed');
    });
  });

  // set active nav from data-active attribute
  document.querySelectorAll('.nav a').forEach(a=>{
    a.addEventListener('click', (e)=>{
      document.querySelectorAll('.nav a').forEach(x=>x.classList.remove('active'));
      a.classList.add('active');
      // Only prevent navigation for mock anchors (href '#' or empty) or when explicitly marked
      const href = a.getAttribute('href') || '';
      if (href.trim() === '' || href.trim() === '#' || a.dataset.mock === 'true') {
        e.preventDefault();
      }
    });
  });

  // time tick if present
  const clocks = document.querySelectorAll('.now-time');
  if(clocks.length){
    setInterval(()=>{
      const now = new Date();
      clocks.forEach(c=> c.textContent = now.toLocaleString('id-ID'));
    },1000);
  }

  // Initialize chart placeholders (if chart canvas present and Chart available)
  if(window.Chart){
    document.querySelectorAll('.chart-canvas').forEach(c=>{
      const labels = c.dataset.labels ? JSON.parse(c.dataset.labels) : ['A','B','C','D','E'];
      const values = c.dataset.values ? JSON.parse(c.dataset.values) : [10,20,30,40,50];
      new Chart(c, {
        type: 'bar',
        data: { labels, datasets:[{label:'Jumlah', data: values, backgroundColor:'rgba(70,167,154,0.9)'}]},
        options:{responsive:true, maintainAspectRatio:false}
      });
    });
  }

  // attempt to start webcam for preview elements
  const cam = document.getElementById('camPreview');
  if(cam && navigator.mediaDevices && navigator.mediaDevices.getUserMedia){
    navigator.mediaDevices.getUserMedia({video:{facingMode:'user'}})
      .then(stream=> cam.srcObject = stream)
      .catch(()=>{ /* ignore in mockup if denied */ });
  }
});
