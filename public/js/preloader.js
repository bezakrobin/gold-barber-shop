window.addEventListener('load', function() {
    const preloader = document.getElementById('preloader');
    const barberPole = document.querySelector('.barber-pole');

    // Move barber pole after 1 second
    setTimeout(() => {
        barberPole.classList.add('move');
    }, 1000);

    // Fade out preloader after animation
    setTimeout(() => {
        preloader.style.opacity = '0';
        setTimeout(() => {
            preloader.style.display = 'none';
        }, 2000);
    }, 2000);
});
