


<script>
    (function() {
      const themeToggle = document.getElementById('themeToggle');
      // Les trois modes disponibles
      const themes = ['auto', 'dark', 'light'];
      // Essayer de récupérer le thème sauvegardé (sinon, auto par défaut)
      let currentIndex = themes.indexOf(localStorage.getItem('theme')) !== -1 
                         ? themes.indexOf(localStorage.getItem('theme')) 
                         : 0;

      function setTheme(theme) {
        document.body.className = theme; // Appliquer la classe du thème sur le body
        localStorage.setItem('theme', theme);
      }

      // Initialise le thème
      setTheme(themes[currentIndex]);
      // Met à jour l'icône en fonction du thème
      function updateIcon(theme) {
        switch (theme) {
          case 'auto':
            themeToggle.innerHTML = '<i class="fas fa-adjust"></i>';
            break;
          case 'dark':
            themeToggle.innerHTML = '<i class="fas fa-moon"></i>';
            break;
          case 'light':
            themeToggle.innerHTML = '<i class="fas fa-sun"></i>';
            break;
        }
      }
      updateIcon(themes[currentIndex]);

      // Au clic, passer au thème suivant
      themeToggle.addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % themes.length;
        setTheme(themes[currentIndex]);
        updateIcon(themes[currentIndex]);
      });
    })();
  </script>





<script>
    // Sélectionner les éléments
    const openSidebarBtn = document.getElementById('openSidebar');
    const closeSidebarBtn = document.getElementById('closeSidebar');
    const sidebar = document.getElementById('sidebar');
    
    // Ouvrir la sidebar au clic
    openSidebarBtn.addEventListener('click', () => {
      sidebar.classList.add('active');
    });
    
    // Fermer la sidebar au clic sur le bouton de fermeture
    closeSidebarBtn.addEventListener('click', () => {
      sidebar.classList.remove('active');
    });
  </script>