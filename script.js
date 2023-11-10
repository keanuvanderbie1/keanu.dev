// JavaScript code for the mobile navigation
document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar');
    const menuIcon = document.querySelector('.menu-icon');

    menuIcon.addEventListener('click', function () {
        navbar.classList.toggle('show');
    });

    // Smooth scrolling when clicking on navigation links
    document.querySelectorAll('.navbar a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            navbar.classList.remove('show'); // Close the navbar
            const targetId = this.getAttribute('href').substring(1);
            const target = document.getElementById(targetId);
            if (target) {
                const targetPosition = target.getBoundingClientRect().top + window.scrollY;
                window.scrollTo({
                    top: targetPosition - 50, // Adjust scroll position as needed
                    behavior: 'smooth'
                });
            }
        });
    });
});
