<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>The Growing Love Tree - Be My Valentine</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#D14D59", // Deep warm red/pink for hearts and primary accents
                        "background-light": "#F7EFE5", // Vintage parchment off-white
                        "background-dark": "#2C2420", // Deep warm brown/charcoal for dark mode
                        "trunk": "#8B5A2B",
                        "trunk-dark": "#6B4226",
                        // Letter Modal Colors
                        "letter-primary": "#a64d59",
                        "letter-wax": "#8b2635",
                        "letter-parchment": "#f4ede0",
                        "letter-paper": "#fdfbf7",
                    },
                    fontFamily: {
                        display: ["Playfair Display", "serif"],
                        body: ["Lato", "sans-serif"],
                        // Letter Modal Fonts
                        "serif-antique": ["EB Garamond", "serif"],
                        "handwriting": ["Pinyon Script", "cursive"],
                        "signature": ["Mrs+Saint+Delafield", "cursive"]
                    },
                    borderRadius: {
                        DEFAULT: "1rem",
                    },
                    animation: {
                        'grow-trunk': 'growTrunk 2s ease-out forwards',
                        'float-heart': 'floatHeart 3s ease-in-out infinite',
                        'appear': 'fadeIn 1s ease-out forwards 2s',
                    },
                    keyframes: {
                        growTrunk: {
                            '0%': {
                                height: '0%'
                            },
                            '100%': {
                                height: '60%'
                            },
                        },
                        floatHeart: {
                            '0%, 100%': {
                                transform: 'translateY(0) scale(1)',
                                opacity: '0.8'
                            },
                            '50%': {
                                transform: 'translateY(-10px) scale(1.1)',
                                opacity: '1'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        }
                    }
                },
            },
        };
    </script>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&amp;family=Lato:wght@300;400;700&amp;family=Pinyon+Script&amp;family=Mrs+Saint+Delafield&amp;family=EB+Garamond:ital,wght@0,400;0,500;1,400&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <style>
        .tree-trunk {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            background: linear-gradient(90deg, #6d4c41 0%, #8d6e63 50%, #5d4037 100%);
            border-radius: 5px 5px 0 0;
            z-index: 10;
        }

        .branch {
            position: absolute;
            background: linear-gradient(90deg, #6d4c41 0%, #8d6e63 100%);
            border-radius: 50px;
            transform-origin: left bottom;
            width: 0;
            transition: width 1s ease-out;
        }

        /* CSS Heart Leaf (Fallback/Unused if JS replaces content) */
        .heart-leaf {
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #ef4444;
            transform: rotate(-45deg);
            opacity: 0;
            /* animation will be set by JS or here */
        }

        .heart-leaf:before,
        .heart-leaf:after {
            content: "";
            width: 20px;
            height: 20px;
            background-color: #ef4444;
            border-radius: 50%;
            position: absolute;
        }

        .heart-leaf:before {
            top: -10px;
            left: 0;
        }

        .heart-leaf:after {
            top: 0;
            left: 10px;
        }

        @keyframes popIn {
            0% {
                transform: scale(0) rotate(-45deg);
                opacity: 0;
            }

            100% {
                transform: scale(1) rotate(-45deg);
                opacity: 0.9;
            }
        }

        .tree-path {
            stroke-dasharray: 1000;
            stroke-dashoffset: 1000;
            animation: drawTree 3s ease-out forwards;
        }

        @keyframes drawTree {
            to {
                stroke-dashoffset: 0;
            }
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark min-h-screen flex items-center justify-center p-2 md:p-4 transition-colors duration-500 overflow-x-hidden font-body">

    <!-- Dark Mode Toggle -->
    <button
        class="fixed top-4 right-4 z-50 p-2 rounded-full bg-white/20 backdrop-blur-sm border border-stone-300 dark:border-stone-700 hover:bg-white/40 dark:hover:bg-black/40 transition-all text-stone-600 dark:text-stone-300 shadow-sm"
        onclick="document.documentElement.classList.toggle('dark')">
        <span class="material-icons text-xl">brightness_4</span>
    </button>

    <main
        class="relative w-full max-w-5xl h-[95vh] md:h-[85vh] bg-stone-100 dark:bg-[#3E3430] rounded-3xl shadow-2xl overflow-hidden border-[6px] md:border-[12px] border-[#FAEBD7] dark:border-[#52443E] transition-colors duration-500">
        <!-- Background texture/lighting -->
        <div
            class="absolute inset-0 pointer-events-none rounded-2xl shadow-[inset_0_0_150px_rgba(0,0,0,0.1)] dark:shadow-[inset_0_0_150px_rgba(0,0,0,0.4)] z-20">
        </div>

        <div
            class="relative z-30 flex flex-col items-center h-full overflow-y-auto overflow-x-hidden md:overflow-hidden pb-20 md:pb-0">
            <!-- Header Text -->
            <header class="mt-8 md:mt-12 text-center opacity-0 animate-appear px-4 shrink-0">
                <h1
                    class="font-display text-3xl md:text-5xl text-stone-700 dark:text-stone-200 mb-2 tracking-wide drop-shadow-sm">
                    Happy Valentine's Day
                </h1>
                <p class="text-stone-500 dark:text-stone-400 font-light italic text-base md:text-lg tracking-wider">
                    Our love keeps growing
                </p>
            </header>

            <!-- Main Content Grid/Flex -->
            <div class="flex flex-col md:flex-row items-center justify-around w-full flex-grow px-8 md:px-16 gap-8">

                <!-- Love Letter / Content Area -->
                <div
                    class="w-full md:max-w-xs text-stone-600 dark:text-stone-300 opacity-0 animate-[fadeIn_1s_ease-out_forwards_3s] z-40 text-center md:text-left">
                    <p class="font-display text-lg md:text-xl mb-2 md:mb-4 font-bold text-primary dark:text-rose-400">
                        To the love of my life:
                    </p>
                    <p class="mb-4 md:mb-6 leading-relaxed italic text-sm md:text-base">
                        "If I could choose a safe place, it would be by your side."
                    </p>

                    <!-- Counter -->
                    <div
                        class="mt-4 md:mt-12 pt-4 md:pt-6 border-t border-stone-300 dark:border-stone-600 inline-block md:block">
                        <p class="text-xs md:text-sm font-bold text-stone-500 dark:text-stone-400 mb-1">My love for you
                            began...</p>
                        <div class="font-display text-xl md:text-2xl text-stone-800 dark:text-stone-100 tabular-nums">
                            <span id="counter">0</span> days <span class="text-base md:text-lg">17h 08m</span>
                        </div>
                    </div>
                </div>

                <!-- The Tree Container -->
                <div
                    class="relative w-[280px] h-[350px] md:w-[450px] md:h-[550px] flex justify-center items-end shrink-0 transform scale-90 md:scale-100">
                    <!-- SVG Tree Trunk -->
                    <svg class="w-full h-full overflow-visible" viewBox="0 0 400 500">
                        <defs>
                            <linearGradient id="trunkGradient" x1="0%" x2="100%" y1="0%"
                                y2="0%">
                                <stop offset="0%" style="stop-color:#5d4037;stop-opacity:1"></stop>
                                <stop offset="50%" style="stop-color:#8d6e63;stop-opacity:1"></stop>
                                <stop offset="100%" style="stop-color:#5d4037;stop-opacity:1"></stop>
                            </linearGradient>
                        </defs>
                        <!-- Main Trunk -->
                        <path class="tree-path"
                            d="M185,500 C185,500 190,400 195,350 C200,300 200,250 195,200 C190,150 160,100 160,100"
                            fill="none" stroke="url(#trunkGradient)" stroke-linecap="round" stroke-width="20"
                            style="animation-delay: 0s; animation-duration: 2.5s;"></path>

                        <!-- Branches -->
                        <path class="tree-path" d="M195,300 C195,300 220,280 230,250" fill="none"
                            stroke="url(#trunkGradient)" stroke-linecap="round" stroke-width="12"
                            style="animation-delay: 1.2s; animation-duration: 2s;"></path>

                        <path class="tree-path" d="M195,280 C195,280 160,260 150,230" fill="none"
                            stroke="url(#trunkGradient)" stroke-linecap="round" stroke-width="10"
                            style="animation-delay: 1.3s; animation-duration: 2s;"></path>

                        <path class="tree-path" d="M195,200 C195,200 205,150 200,100" fill="none"
                            stroke="url(#trunkGradient)" stroke-linecap="round" stroke-width="10"
                            style="animation-delay: 1.8s; animation-duration: 2s;"></path>

                        <!-- Base/Ground -->
                        <path d="M160,500 L230,500" stroke="url(#trunkGradient)" stroke-width="25"></path>
                    </svg>

                    <!-- Hearts Container -->
                    <div class="absolute inset-0 pointer-events-none" id="heart-container"></div>
                </div>
            </div>

            <!-- Floating Decoration Hearts -->
            <div class="hidden md:block absolute top-20 left-20 text-rose-300 dark:text-rose-700 opacity-0 animate-float-heart"
                style="animation-delay: 4s;">
                <span class="material-icons text-4xl">favorite</span>
            </div>
            <div class="hidden md:block absolute bottom-40 right-40 text-rose-400 dark:text-rose-600 opacity-0 animate-float-heart"
                style="animation-delay: 5s;">
                <span class="material-icons text-2xl">favorite</span>
            </div>

            <!-- Open Letter Button -->
            <div
                class="mt-auto mb-8 md:mb-10 z-50 opacity-0 animate-[fadeIn_1s_ease-out_forwards_7s] px-4 w-full flex justify-center">
                <a href="{{ route('letter') }}"
                    class="w-full max-w-[280px] md:max-w-none md:w-auto px-6 md:px-8 py-3 bg-white/80 dark:bg-stone-800/80 backdrop-blur-md border border-primary/40 text-primary dark:text-rose-300 font-display text-base md:text-lg tracking-widest hover:bg-primary hover:text-white transition-all duration-500 rounded-full shadow-lg flex items-center justify-center gap-3 group">
                    <span class="material-icons animate-pulse group-hover:animate-none">mail_outline</span>
                    Read My Love Letter
                </a>
            </div>

        </div>
    </main>

    <!-- Letter Modal -->


    <script>
        // Simple script to generate hearts on the tree after the trunk grows
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('heart-container');
            const colors = ['#ef4444', '#f43f5e', '#e11d48', '#be123c', '#fb7185']; // Tailwind red/rose shades

            // Heart Shape Generation Logic
            const totalHearts = 900; // High density
            const canopyCenter = {
                x: 200,
                y: 190
            }; // Lowered slightly to cover new branch positions
            const scale = 145; // Good size for shape
            const minDistance = 6; // Dense packing

            // Function to check if a point (x,y) is inside a heart shape
            // Using inequality: (x^2 + y^2 - 1)^3 - x^2 * y^3 <= 0
            // Coordinates need to be normalized to approx -1.5 to 1.5 range
            function isInsideHeart(x, y) {
                // Normalize coordinates relative to center
                // Notice the Y inversion because screen Y is down, but math Y is up
                const nx = (x - canopyCenter.x) / (scale * 0.95); // Slightly wider heart
                const ny = -(y - canopyCenter.y) / scale;

                // Formula check
                const a = nx * nx + ny * ny - 1;
                return (a * a * a - nx * nx * ny * ny * ny) <= 0;
            }

            // Generate positions with collision detection
            const heartPositions = [];
            let attempts = 0;
            while (heartPositions.length < totalHearts && attempts < 30000) {
                // Random point in bounding box (0-400 for x, 0-500 for y)
                const rx = Math.random() * 400;
                const ry = Math.random() * 400;

                if (isInsideHeart(rx, ry)) {
                    // Check for overlap with existing hearts
                    let tooClose = false;
                    for (const pos of heartPositions) {
                        const dx = rx - pos.x;
                        const dy = ry - pos.y;
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < minDistance) {
                            tooClose = true;
                            break;
                        }
                    }

                    if (!tooClose) {
                        heartPositions.push({
                            x: rx,
                            y: ry
                        });
                    }
                }
                attempts++;
            }

            setTimeout(() => {
                heartPositions.forEach((pos) => {
                    // Stagger the appearance randomly but somewhat quickly to fill the shape
                    const delay = Math.random() * 3000;
                    setTimeout(() => {
                        createHeart(pos.x, pos.y);
                    }, delay);
                });
            }, 3500); // Start as trunk finishes

            function createHeart(baseX, baseY) {
                const heart = document.createElement('div');

                // Convert to percentage for responsiveness within container (assuming 400x500 viewBox approx)
                const left = (baseX / 400) * 100;
                const top = (baseY / 500) * 100;

                const color = colors[Math.floor(Math.random() * colors.length)];

                heart.style.position = 'absolute';
                heart.style.left = `${left}%`;
                heart.style.top = `${top}%`;
                // Vary size for texture, some small some large
                heart.style.width = `${Math.random() * 14 + 10}px`;
                heart.style.opacity = '0';
                // Random rotation for natural leaf look
                heart.style.transform = `rotate(${Math.random() * 60 - 30}deg)`;
                heart.style.transition = 'all 0.5s ease-out';
                // Inline animation to pop in
                heart.style.animation = `popIn 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards`;

                // SVG Heart
                heart.innerHTML = `<svg viewBox="0 0 24 24" fill="${color}" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%; display: block;">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>`;

                container.appendChild(heart);
            }

            // Counter animation
            const counterEl = document.getElementById('counter');
            if (counterEl) {
                let count = 0;
                const target = 355; // Days
                const duration = 2000;
                const steps = 60;
                const increment = target / steps;
                const delay = duration / steps;

                setTimeout(() => {
                    const timer = setInterval(() => {
                        count += increment;
                        if (count >= target) {
                            count = target;
                            clearInterval(timer);
                        }
                        counterEl.textContent = Math.floor(count);
                    }, delay);
                }, 3000); // Start after some initial animations
            }
        });
    </script>
</body>

</html>
