// Sélectionnez le bouton de basculement de thème
const themeToggleBtn = document.getElementById('theme-toggle');

// Ajoutez un écouteur d'événement pour détecter le clic de l'utilisateur
themeToggleBtn.addEventListener('click', toggleTheme);

// Fonction pour basculer entre les thèmes
function toggleTheme() {
    // Sélectionnez l'élément racine de votre application (par exemple, la balise <body>)
    const appRoot = document.querySelector('body');

    // Vérifiez si le thème actuel est le thème clair
    if (appRoot.classList.contains('theme-light')) {
        // Si c'est le cas, supprimez la classe du thème clair et ajoutez la classe du thème sombre
        appRoot.classList.remove('theme-light');
        appRoot.classList.add('theme-dark');
        localStorage.setItem('theme', 'dark');

    } else {
        // Sinon, supprimez la classe du thème sombre et ajoutez la classe du thème clair
        appRoot.classList.remove('theme-dark');
        appRoot.classList.add('theme-light');
        localStorage.setItem('theme', 'light');

    }
}

document.addEventListener('DOMContentLoaded', function() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
        // Appliquez le thème sombre si le thème sombre est enregistré
        document.querySelector('body').classList.add('theme-dark');
    }
});


document.addEventListener('DOMContentLoaded', () => {

    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });

  });

//   $(document).ready(function() {

//     // Check for click events on the navbar burger icon
//     $(".navbar-burger").click(function() {

//         // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
//         $(".navbar-burger").toggleClass("is-active");
//         $(".navbar-menu").toggleClass("is-active");

//     });
//   });
