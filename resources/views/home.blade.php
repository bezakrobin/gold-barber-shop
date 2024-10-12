<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goldbarber Shop</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --color-background: #fcf8f3;
            --color-primary: #e6b12e; /* Gold color */
            --color-border: #333; /* Dark gray for borders */
            --color-white: #ffffff; /* White */
            --color-black: #000000; /* Black */
        }

        body {
            background-color: var(--color-background);
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling during preloader */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            position: relative; /* For absolute positioning of elements */
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
            background: var(--color-white);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            font-family: 'Lobster', cursive;
            color: var(--color-border);
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .nav-link:hover {
            background-color: var(--color-primary);
            color: var(--color-black); /* Change text color to black on hover */
        }

        h1, p {
            font-family: 'Roboto', sans-serif;
        }

        /* Hide mobile menu initially */
        .mobile-menu {
            display: none;
        }

        /* Mobile styles */
        @media (max-width: 768px) {
            .mobile-menu {
                display: none; /* Hide menu by default */
            }

            .mobile-menu.active {
                display: block; /* Show menu when active */
            }
        }
    </style>
</head>
<body>
    <div class="barber-pole" id="preloader">
        <div class="barber-pole-top"></div>
        <div class="barber-pole-bottom"></div>
    </div>

    <!-- Your main content goes here -->
    <div id="main-content" style="display: none;">
        <nav class="flex items-center justify-between p-4 absolute w-full top-0 left-0 z-10">
            <img src="<?php echo '/images/logo.png'; ?>" alt="Gold Barbershop Logo" class="h-10 mr-4" />
            <div class="flex items-center">
                <!-- Hamburger Icon -->
                <button id="hamburger" class="block lg:hidden focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <!-- Navigation Links -->
                <ul class="flex space-x-8 mobile-menu lg:flex lg:space-x-8">
                    <li><a href="/" class="nav-link">Domů</a></li>
                    <li><a href="/sluzby" class="nav-link">Služby</a></li>
                    <li><a href="/o-nas" class="nav-link">O nás</a></li>
                    <li><a href="/kontakt" class="nav-link">Kontakt</a></li>
                </ul>
            </div>
        </nav>
        <h1 class="text-3xl font-semibold mt-16 text-center">Vítejte v Gold Barbershopu!</h1>
        <p class="mt-4 text-center">Vaše obsah zde.</p>
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
            mobileMenu.classList.toggle("active");
        });
    </script>
</body>
</html>
