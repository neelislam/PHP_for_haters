// main.js - dark/light toggle
document.addEventListener('DOMContentLoaded', function(){
  const body = document.body;
  const toggle = document.getElementById('toggleTheme');
  const current = localStorage.getItem('theme') || 'light';
  if (current === 'dark') body.classList.add('dark-mode');

  if (toggle) toggle.addEventListener('click', function(){
    body.classList.toggle('dark-mode');
    localStorage.setItem('theme', body.classList.contains('dark-mode') ? 'dark' : 'light');
  });
});
