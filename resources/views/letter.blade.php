<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Will You Be My Valentine? - Love Letter</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Great+Vibes&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ef3976",
                        "background-light": "#f8f6f6",
                        "background-dark": "#221016",
                        "paper": "#fffdf7",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "handwriting": ["Great Vibes", "cursive"],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-glow': 'pulse-glow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-gentle': 'bounce-gentle 3s ease-in-out infinite',
                        'heart-beat': 'heart-beat 1.5s ease-in-out infinite',
                        'shake': 'shake 0.5s ease-in-out',
                        'confetti-fall': 'confetti-fall 3s ease-out infinite',
                        'slide-up': 'slide-up 0.8s ease-out',
                        'typewriter': 'typewriter 3s steps(40) 1s forwards',
                        'blink': 'blink 1s step-end infinite',
                        'evasive-move': 'evasive-move 0.3s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        'pulse-glow': {
                            '0%, 100%': {
                                opacity: '1',
                                boxShadow: '0 0 30px rgba(239, 57, 118, 0.6), 0 0 60px rgba(239, 57, 118, 0.3)'
                            },
                            '50%': {
                                opacity: '0.9',
                                boxShadow: '0 0 20px rgba(239, 57, 118, 0.8), 0 0 40px rgba(239, 57, 118, 0.4)'
                            },
                        },
                        'bounce-gentle': {
                            '0%, 100%': {
                                transform: 'translateY(0) scale(1)'
                            },
                            '50%': {
                                transform: 'translateY(-8px) scale(1.02)'
                            },
                        },
                        'heart-beat': {
                            '0%, 100%': {
                                transform: 'scale(1)'
                            },
                            '50%': {
                                transform: 'scale(1.1)'
                            },
                        },
                        shake: {
                            '0%, 100%': {
                                transform: 'translateX(0)'
                            },
                            '10%, 30%, 50%, 70%, 90%': {
                                transform: 'translateX(-4px)'
                            },
                            '20%, 40%, 60%, 80%': {
                                transform: 'translateX(4px)'
                            },
                        },
                        'confetti-fall': {
                            '0%': {
                                transform: 'translateY(-100vh) rotate(0deg)',
                                opacity: '1'
                            },
                            '100%': {
                                transform: 'translateY(100vh) rotate(720deg)',
                                opacity: '0'
                            },
                        },
                        'slide-up': {
                            '0%': {
                                transform: 'translateY(100px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        typewriter: {
                            '0%': {
                                width: '0'
                            },
                            '100%': {
                                width: '100%'
                            },
                        },
                        blink: {
                            '0%, 50%': {
                                opacity: '1'
                            },
                            '51%, 100%': {
                                opacity: '0'
                            },
                        },
                        'evasive-move': {
                            '0%': {
                                transform: 'translate(0, 0)'
                            },
                            '100%': {
                                transform: 'translate(var(--random-x), var(--random-y))'
                            },
                        }
                    }
                },
            },
        }
    </script>

    <style>
        .paper-texture {
            background-color: #fffdf7;
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
        }

        .torn-edge {
            mask-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M0,20 L0,10 Q20,0 40,10 T80,10 T120,10 T160,10 T200,10 T240,10 T280,10 T320,10 T360,10 T400,10 L400,20 Z' fill='black'/%3E%3C/svg%3E");
            mask-repeat: repeat-x;
            mask-size: 40px 10px;
        }

        .handwriting-shadow {
            text-shadow: 2px 2px 4px rgba(239, 57, 118, 0.1);
        }

        .confetti {
            position: absolute;
            width: 8px;
            height: 8px;
            animation: confetti-fall linear infinite;
            pointer-events: none;
        }

        .typewriter-text {
            overflow: hidden;
            border-right: 2px solid #ef3976;
            white-space: nowrap;
            animation: typewriter 3s steps(40) 1s forwards, blink 1s step-end infinite 4s;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .no-button {
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .mobile-optimized {
                padding: 0;
                height: 100vh;
                display: flex;
                align-items: stretch;
                justify-content: center;
                overflow-y: auto;
            }

            .letter-container {
                max-height: none;
                min-height: 100vh;
                overflow-y: visible;
                border-radius: 0;
                width: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
                border: none !important;
                box-shadow: none !important;
            }

            .mobile-status-bar {
                background: linear-gradient(to right, rgba(239, 57, 118, 0.05), rgba(239, 57, 118, 0.1)) !important;
                border-radius: 0 !important;
                height: 50px !important;
                display: flex !important;
                position: sticky !important;
                top: 0 !important;
                z-index: 100 !important;
            }

            .letter-paper-mobile {
                margin: 1rem 0;
                transform: rotate(0deg) !important;
            }

            .mobile-text-sm {
                font-size: 0.875rem;
            }

            .mobile-heart {
                width: 2.5rem;
                height: 2.5rem;
            }
        }

        /* Fix scrolling on all devices */
        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        .scroll-container {
            height: 100vh;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display relative selection:bg-primary selection:text-white scroll-container">

    <!-- Confetti Container -->
    <div class="fixed inset-0 pointer-events-none z-50" id="confetti-container"></div>

    <!-- Ambient Background Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-primary/15 rounded-full blur-3xl animate-float"
            style="animation-delay: 2s;"></div>

        <!-- Floating hearts -->
        <div class="absolute top-[15%] left-[20%] text-primary/20 text-4xl animate-bounce-gentle"
            style="animation-duration: 8s;">💖</div>
        <div class="absolute top-[60%] right-[15%] text-primary/15 text-5xl animate-float"
            style="animation-duration: 10s; animation-delay: 1s;">💕</div>
        <div class="absolute bottom-[15%] left-[15%] text-primary/25 text-3xl animate-heart-beat"
            style="animation-duration: 7s; animation-delay: 3s;">💗</div>
        <div class="absolute top-[25%] right-[25%] text-primary/10 text-6xl animate-bounce-gentle"
            style="animation-duration: 9s; animation-delay: 4s;">💘</div>
    </div>

    <!-- Main Content Container -->
    <main class="relative z-10 w-full max-w-md mx-auto mobile-optimized min-h-screen flex items-center justify-center md:items-center">
        <div
            class="letter-container bg-background-light dark:bg-background-dark rounded-3xl overflow-hidden flex flex-col border border-gray-200 dark:border-gray-800 shadow-2xl md:max-h-none">

            <!-- Status Bar -->
            <div
                class="h-14 w-full flex justify-between items-center px-4 md:px-6 pt-4 pb-2 bg-gradient-to-r from-primary/5 to-primary/10 mobile-status-bar">
                <span
                    class="text-xs font-bold text-gray-500 dark:text-gray-400">{{ now()->setTimezone('Asia/Ho_Chi_Minh')->format('H:i') }}</span>
                <div class="flex space-x-2">
                    <div class="w-4 h-4 bg-primary/30 rounded-full animate-pulse-slow"></div>
                    <div class="w-4 h-4 bg-primary/20 rounded-full animate-pulse-slow" style="animation-delay: 0.5s;">
                    </div>
                </div>
            </div>

            <!-- Envelope Background Hint -->
            <div
                class="absolute inset-0 bg-gradient-to-b from-primary/5 to-primary/10 dark:from-background-dark dark:to-background-dark">
                <div
                    class="absolute bottom-0 w-full h-1/4 bg-primary/15 dark:bg-primary/10 rounded-t-3xl backdrop-blur-sm border-t border-white/20">
                </div>
            </div>

            <!-- Letter Content -->
            <div class="relative z-10 flex-1 flex flex-col items-center justify-center p-4 md:p-6 w-full">

                <!-- Letter Paper -->
                <div class="relative w-full bg-paper paper-texture shadow-2xl transform transition-all duration-700 hover:rotate-0 flex flex-col items-center p-4 md:p-6 pb-6 md:pb-8 rounded-lg border border-gray-200/50 animate-slide-up letter-paper-mobile"
                    style="transform: rotate(1deg);">

                    <!-- Decorative tape at top -->
                    <div
                        class="absolute -top-3 left-1/2 -translate-x-1/2 w-32 h-6 bg-yellow-100/60 backdrop-blur-sm rotate-1 shadow-md border border-white/60 rounded-sm">
                    </div>

                    <!-- Air mail stamp -->
                    <div
                        class="absolute top-4 right-4 w-14 h-14 border-2 border-primary/30 rounded-full flex items-center justify-center rotate-12 opacity-60 glass-morphism">
                        <span
                            class="text-[8px] uppercase font-bold text-primary/60 tracking-widest text-center leading-3">
                            Air<br />Mail
                        </span>
                    </div>

                    <!-- Heart Header -->
                    <div class="mb-4 md:mb-6 mt-4 md:mt-6 text-primary animate-heart-beat">
                        <svg class="w-8 h-8 md:w-12 md:h-12 mobile-heart drop-shadow-lg" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                        </svg>
                    </div>

                    <!-- Main Content -->
                    <div class="text-center space-y-3 md:space-y-4 mb-6 md:mb-8 w-full">
                        <p class="text-gray-500 font-display text-xs md:text-sm tracking-widest uppercase mb-2 md:mb-3 opacity-70 mobile-text-sm">My
                            Dearest,</p>

                        <!-- Animated question -->
                        <div class="relative">
                            <h1
                                class="font-handwriting text-2xl md:text-4xl lg:text-5xl text-primary handwriting-shadow leading-tight py-2 typewriter-text">
                                Will you be my Valentine?
                            </h1>
                        </div>

                        <p class="text-gray-400 font-display text-xs mt-3 md:mt-4 italic opacity-80">
                            I've been waiting for the perfect moment to ask... 💕
                        </p>

                        <!-- Cute message -->
                        <div class="mt-4 md:mt-6 p-3 md:p-4 bg-primary/5 rounded-lg border border-primary/10">
                            <p class="text-xs md:text-sm text-gray-600 italic leading-relaxed">
                                "Every moment with you feels magical, and I can't imagine celebrating love with anyone
                                else. You make my heart skip a beat! 🥰"
                            </p>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="w-3/4 h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent mb-8"></div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col items-center w-full space-y-4 relative min-h-[140px]">

                        <!-- YES Button -->
                        <button id="yes-button"
                            class="group relative w-full max-w-[240px] bg-gradient-to-r from-primary to-pink-500 hover:from-pink-500 hover:to-primary text-white font-bold text-lg py-4 px-8 rounded-full shadow-lg hover:shadow-primary/50 transition-all duration-300 transform hover:-translate-y-1 active:scale-95 animate-pulse-glow">
                            <span class="flex items-center justify-center gap-3">
                                YES! 💖
                                <svg class="w-5 h-5 group-hover:animate-heart-beat transition-transform duration-300"
                                    fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                    <path
                                        d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>

                            <!-- Sparkle effects -->
                            <div
                                class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <div class="absolute top-1 left-4 w-1 h-1 bg-white rounded-full animate-ping"></div>
                                <div class="absolute top-3 right-6 w-1 h-1 bg-white rounded-full animate-ping"
                                    style="animation-delay: 0.5s;"></div>
                                <div class="absolute bottom-2 left-1/2 w-1 h-1 bg-white rounded-full animate-ping"
                                    style="animation-delay: 1s;"></div>
                            </div>
                        </button>

                        <!-- NO Button (The Evasive One) -->
                        <div class="relative w-full h-12 flex justify-center items-center">
                            <button id="no-button"
                                class="no-button text-sm font-medium text-gray-400 hover:text-primary transition-colors py-2 px-6 rounded-full border border-gray-200 hover:border-primary/30 hover:bg-primary/5">
                                No, thanks 😔
                            </button>
                        </div>
                    </div>

                    <!-- Signature -->
                    <div class="mt-8 text-center">
                        <p class="text-xs text-gray-400 font-light italic">
                            With all my love,<br />
                            <span class="text-primary font-handwriting text-lg">Your Dudu</span> 💕
                        </p>
                    </div>
                </div>

                <!-- Paper shadow -->
                <div class="w-[85%] h-3 bg-black/10 blur-xl rounded-full mt-2"></div>
            </div>
        </div>
    </main>

    <!-- Success Modal -->
    <div id="success-modal"
        class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden">
        <div
            class="bg-paper rounded-2xl p-8 max-w-sm w-full mx-4 relative shadow-2xl border border-primary/20 animate-slide-up">
            <div class="text-center space-y-6">
                <div class="text-7xl animate-heart-beat">💖</div>
                <h2 class="text-3xl font-handwriting text-primary">Yay!</h2>
                <p class="text-gray-600 text-lg leading-relaxed">
                    You just made me the happiest person in the world!
                </p>
                <p class="text-primary font-semibold">
                    Happy Valentine's Day, my love! 🌹
                </p>

                <div class="flex justify-center space-x-2 text-3xl animate-bounce-gentle">
                    <span>💝</span>
                    <span>🌹</span>
                    <span>💖</span>
                    <span>🌹</span>
                    <span>💝</span>
                </div>

                <button onclick="closeModal()"
                    class="mt-6 bg-primary text-white px-6 py-2 rounded-full hover:bg-pink-500 transition-colors">
                    Close 💕
                </button>
            </div>
        </div>
    </div>

    <script>
        // Setup CSRF token
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

        let noButtonClickCount = 0;
        const noButton = document.getElementById('no-button');
        const yesButton = document.getElementById('yes-button');

        // Messages that change as user keeps clicking "No"
        const noButtonMessages = [
            "No, thanks 😔",
            "Are you sure? 🥺",
            "Please reconsider? 💔",
            "Think about it... 😢",
            "Really? 😭",
            "You're breaking my heart... 💔",
            "Last chance! 🙏",
            "I'm not giving up! 💪",
            "Pretty please? 🥺✨",
            "Fine... YES it is! 💖"
        ];

        // Create confetti
        function createConfetti() {
            const colors = ['#ef3976', '#f472b6', '#fb7185', '#fbbf24', '#34d399'];
            const confettiContainer = document.getElementById('confetti-container');

            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 3 + 's';
                confetti.style.animationDuration = (Math.random() * 3 + 2) + 's';

                confettiContainer.appendChild(confetti);

                setTimeout(() => confetti.remove(), 5000);
            }
        }

        // YES button handler
        yesButton.addEventListener('click', function() {
            createConfetti();

            // Heart explosion effect
            const rect = yesButton.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;

            for (let i = 0; i < 15; i++) {
                const heart = document.createElement('div');
                heart.innerHTML = ['💖', '💕', '💗', '💘', '💝'][Math.floor(Math.random() * 5)];
                heart.style.position = 'fixed';
                heart.style.left = centerX + 'px';
                heart.style.top = centerY + 'px';
                heart.style.fontSize = '20px';
                heart.style.pointerEvents = 'none';
                heart.style.zIndex = '1000';

                const angle = (i / 15) * 2 * Math.PI;
                const distance = 100 + Math.random() * 50;
                const x = Math.cos(angle) * distance;
                const y = Math.sin(angle) * distance;

                heart.style.animation = `heart-explode-${i} 2s ease-out forwards`;

                const style = document.createElement('style');
                style.innerHTML = `
                    @keyframes heart-explode-${i} {
                        0% { transform: translate(0, 0) scale(1); opacity: 1; }
                        100% { transform: translate(${x}px, ${y}px) scale(0); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);

                document.body.appendChild(heart);

                setTimeout(() => {
                    heart.remove();
                    style.remove();
                }, 2000);
            }

            // Show success modal
            setTimeout(() => {
                document.getElementById('success-modal').classList.remove('hidden');
            }, 1000);
        });

        // NO button evasive behavior
        noButton.addEventListener('click', function(e) {
            e.preventDefault();
            noButtonClickCount++;

            if (noButtonClickCount >= noButtonMessages.length) {
                // Force YES
                yesButton.click();
                return;
            }

            // Update button text
            noButton.textContent = noButtonMessages[noButtonClickCount];

            // Make button shake
            noButton.style.animation = 'shake 0.5s ease-in-out';
            setTimeout(() => {
                noButton.style.animation = '';
            }, 500);

            // Move button to random position (mobile-friendly)
            if (noButtonClickCount > 2) {
                const container = noButton.parentElement;
                const containerRect = container.getBoundingClientRect();
                const buttonRect = noButton.getBoundingClientRect();

                const maxX = Math.min(100, containerRect.width - buttonRect.width - 20);
                const maxY = Math.min(30, containerRect.height - buttonRect.height - 10);

                const randomX = (Math.random() - 0.5) * maxX;
                const randomY = (Math.random() - 0.5) * maxY;

                noButton.style.setProperty('--random-x', randomX + 'px');
                noButton.style.setProperty('--random-y', randomY + 'px');
                noButton.style.animation = 'evasive-move 0.3s ease-out forwards';

                // Reset position after animation
                setTimeout(() => {
                    noButton.style.transform = '';
                    noButton.style.animation = '';
                }, 2000);
            }

            // Change YES button to be more appealing
            if (noButtonClickCount > 3) {
                yesButton.innerHTML = `
                    <span class="flex items-center justify-center gap-3">
                        YES PLEASE! 💖💖💖
                        <svg class="w-5 h-5 animate-heart-beat" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                `;
                yesButton.style.transform = 'scale(1.1)';
            }
        });

        // Close modal function
        function closeModal() {
            document.getElementById('success-modal').classList.add('hidden');

            // Optional: redirect back to valentine page or show new content
            setTimeout(() => {
                // Could redirect to a thank you page or back to valentine page
                // window.location.href = "{{ route('valentine') }}";
            }, 1000);
        }

        // Keyboard support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                yesButton.click();
            }
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Create floating hearts periodically
        function createFloatingHeart() {
            const heart = document.createElement('div');
            heart.innerHTML = ['💖', '💕', '💗', '💘'][Math.floor(Math.random() * 4)];
            heart.style.position = 'fixed';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.top = '-50px';
            heart.style.fontSize = (Math.random() * 20 + 15) + 'px';
            heart.style.pointerEvents = 'none';
            heart.style.zIndex = '10';
            heart.style.animation = 'confetti-fall ' + (Math.random() * 3 + 4) + 's linear forwards';

            document.body.appendChild(heart);

            setTimeout(() => heart.remove(), 8000);
        }

        // Create hearts periodically
        setInterval(createFloatingHeart, 2000);

        // Initial hearts
        setTimeout(() => {
            for (let i = 0; i < 3; i++) {
                setTimeout(createFloatingHeart, i * 500);
            }
        }, 1000);

        console.log('💕 Will you say yes? 💕');
    </script>
</body>

</html>
