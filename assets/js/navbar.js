const currentPage = window.location.search;

const navLinks = document.querySelectorAll('ul li a');

navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPage || (currentPage === '' && link.getAttribute('href') === 'index.php')) {
        link.classList.add('active');
    }
});