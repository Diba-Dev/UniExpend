document.getElementById('filter-form').addEventListener('submit', function (e) {
    e.preventDefault();
  
    const keyword = document.getElementById('keyword').value.toLowerCase();
    const country = document.getElementById('country').value;
    const level = document.getElementById('level').value;
    const language = document.getElementById('language').value;
    const scholarship = document.querySelector('input[type="checkbox"]').checked;
  
    const cards = document.querySelectorAll('.program-card');
  
    cards.forEach(card => {
      const title = card.querySelector('h3').textContent.toLowerCase();s
      const uni = card.querySelector('p:nth-of-type(1)').textContent.toLowerCase();
      const location = card.querySelector('p:nth-of-type(2)').textContent.toLowerCase();
      const lang = card.querySelector('p:nth-of-type(3)').textContent.toLowerCase();
      const scholar = card.querySelector('p:nth-of-type(5)').textContent.toLowerCase();
  
      let match = true;
  
      if (keyword && !title.includes(keyword) && !uni.includes(keyword)) match = false;
      if (country && !location.includes(country)) match = false;
      if (level && !title.toLowerCase().includes(level)) match = false;
      if (language && !lang.includes(language)) match = false;
      if (scholarship && !scholar.includes('available')) match = false;
  
      card.style.display = match ? 'block' : 'none';
    });
  });
  