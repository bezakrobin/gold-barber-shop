<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goldbarber Shop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --color-background: #fcf8f3;
            --color-primary: rgb(234 179 8); /* Gold color */
            --color-border: #333; /* Dark gray for borders */
            --color-white: #ffffff; /* White */
            --color-black: #000000; /* Black */
            --color-transparent: rgba(0, 0, 0, 0);
        }

        body {
            background-color: var(--color-background);
            margin: 0;
            padding: 0;
            width: 100vw;
            max-width: 100%;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* For absolute positioning of elements */
        }

        .no-scroll {
            overflow: hidden;
        }

        /* Barber pole styling */
        .barber-pole {
            width: 40px;
            height: 100px;
            border: 6px solid var(--color-border);
            background: linear-gradient(
                -45deg,
                var(--color-white),
                var(--color-white) 25%,
                var(--color-primary) 25%,
                var(--color-primary) 50%,
                var(--color-white) 50%,
                var(--color-white) 75%,
                var(--color-primary) 75%, 
                var(--color-primary) 100%
            );
            background-size: 40px 40px;
            animation: scrolling-gradient 1s linear infinite;
            position: absolute;
            top: calc(50% - 60px); /* Centering the barber pole vertically */
            left: calc(50% - 20px); /* Centering the barber pole horizontally */
        }

        .barber-pole-top,
        .barber-pole-bottom {
            position: absolute;
            width: 54px;
            height: 20px;
            border-radius: 99px;
            background-color: var(--color-white);
            border: 6px solid var(--color-border);
        }

        .barber-pole-top::before,
        .barber-pole-bottom::before {
            position: absolute;
            content: "";
            width: 40px;
            height: 40px;
            z-index: -1;
            border-radius: 16px;
            background-color: var(--color-white);
            border: 6px solid var(--color-border);
            left: 50%;
            transform: translateX(-50%);
        }

        .barber-pole-top {
            top: -20px;
            left: -13px;
        }

        .barber-pole-top::before {
            top: -24px;
        }

        .barber-pole-bottom {
            bottom: -20px;
            left: -13px;
        }

        .barber-pole-bottom::before {
            bottom: -24px;
        }

        @keyframes scrolling-gradient {
            0% {
                background-position: 0;
            }

            100% {
                background-position: 40px;
            }
        }

        nav {
            background: var(--color-transparent);
        }

        .nav-link {
            font-family: 'Roboto', sans-serif;
            color: var(--color-white);
            padding: 10px 30px; /* Increase padding for better spacing */
            border-radius: 5px;
            text-align: center; /* Center the text inside the link */
            width: 100%; /* Make links take full width in mobile menu */
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link-button {
            color: var(--color-white);
            background-color: #eab308 !important;
        }

        .nav-link-button:hover {
            color: var(--color-white) !important;
            background-color: #ca8a04 !important;
        }

        .nav-link:hover {
            background-color: rgb(202 138 4) !important;
        }

        h1, p {
            font-family: 'Roboto', sans-serif;
        }

        .mobile-menu {
            display: none; 
            flex-direction: column; 
            align-items: center; 
            justify-content: center; /* Center items vertically */
            background-color: rgba(0, 0, 0, 0.9);
            position: fixed; 
            top: 0; 
            left: 0; 
            right: 0; 
            bottom: 0;
            z-index: 20;
            padding: 20px 0; 
        }

        .close-button {
            position: absolute; /* Position it in the top right */
            top: 20px; 
            right: 20px; 
            background: transparent; 
            border: none; 
            color: var(--color-white); 
            font-size: 24px; 
            cursor: pointer; 
        }

        .mobile-menu li {
            margin: 10px 0; /* Add vertical spacing between menu items */
        }

        .mobile-menu.active {
            display: flex; /* Show mobile menu when active */
        }

        @media (max-width: 768px) {
            .desktop-menu {
                display: none; /* Hide desktop menu on mobile */
            }
        }

        @media (min-width: 769px) {
            .mobile-menu {
                display: none; /* Hide mobile menu on desktop */
            }
        }

        /* Animation for slide-down effect */
        @keyframes slideDown {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }

        .mobile-menu.active {
            animation: slideDown 0.3s ease-in-out; /* Slide down the mobile menu */
        }
    </style>
</head>
<body>
    <div class="barber-pole" id="preloader">
        <div class="barber-pole-top"></div>
        <div class="barber-pole-bottom"></div>
    </div>

    <!-- Main content -->
    <div id="main-content" style="display: none;">
        <nav class="flex items-center justify-between p-4 absolute w-full top-0 left-0 z-10">
            <a href="/" class="flex items-center">
                <img src="<?php echo '/images/logo.png'; ?>" alt="Gold Barbershop Logo" class="h-10 mr-4" />
            </a>

            <!-- Desktop Menu -->
            <ul class="desktop-menu flex space-x-8">
                <li><a href="/" class="nav-link">Domů</a></li>
                <li><a href="/sluzby" class="nav-link">Služby</a></li>
                <li><a href="/o-nas" class="nav-link">O nás</a></li>
                <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
                <li><a href="/order" class="nav-link nav-link-button">Objednat</a></li>
            </ul>

            <!-- Hamburger Icon for Mobile -->
            <button id="hamburger" class="block lg:hidden focus:outline-none pr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <ul class="mobile-menu lg:hidden">
            <button class="close-button" id="close-button">&times;</button> <!-- Close button -->
            <li><a href="/" class="nav-link">Domů</a></li>
            <li><a href="/sluzby" class="nav-link">Služby</a></li>
            <li><a href="/o-nas" class="nav-link">O nás</a></li>
            <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
            <li><a href="/order" class="nav-link nav-link-button">Objednat</a></li>
        </ul>

        <!-- Includes -->
        @include('components.hero')
        @include('components.services-offered')
        @include('components.meet-our-barbers')
        @include('components.testimonials')
        @include('components.gallery')
        @include('components.booking-section')
        @include('components.footer')
    </div>

    <script>
        // Function to fade out the preloader
        function fadeOutPreloader() {
            gsap.to("#preloader", {
                opacity: 0,
                duration: 1,
                onComplete: function() {
                    document.getElementById("preloader").style.display = "none"; 
                    document.getElementById("main-content").style.display = "block"; 
                }
            });
        }

        // Set a timeout to trigger the fade-out after 3 seconds
        setTimeout(fadeOutPreloader, 3000);

        // Mobile menu toggle
        const hamburger = document.getElementById("hamburger");
        const mobileMenu = document.querySelector(".mobile-menu");

        hamburger.addEventListener("click", () => {
            mobileMenu.classList.toggle("active"); // Toggle active class to show/hide menu
            document.body.classList.toggle("no-scroll"); // Disable/enable scroll
        });

        const closeButton = document.getElementById("close-button");

        closeButton.addEventListener("click", () => {
            mobileMenu.classList.remove("active"); // Hide mobile menu
            document.body.classList.remove("no-scroll"); // Enable scroll
        });
    </script>
</body>
</html>
