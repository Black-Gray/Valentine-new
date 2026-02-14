<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Happy Valentine's Day - My Love</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#e64c7f",
                        "background-light": "#f8f6f6",
                        "background-dark": "#211116",
                        "paper": "#fdfbf7",
                    },
                    fontFamily: {
                        "display": ["Newsreader", "serif"]
                    },
                    backgroundImage: {
                        'paper-texture': "url('https://www.transparenttextures.com/patterns/cream-paper.png')",
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(230, 76, 127, 0.25)',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'heart-beat': 'heart-beat 1.5s ease-in-out infinite',
                        'fade-in': 'fadeIn 2s ease-in-out',
                        'slide-up': 'slideUp 1.5s ease-out',
                        'sparkle': 'sparkle 2s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        'heart-beat': {
                            '0%, 100%': { transform: 'scale(1)' },
                            '50%': { transform: 'scale(1.1)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(50px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        sparkle: {
                            '0%, 100%': { opacity: '0', transform: 'scale(0)' },
                            '50%': { opacity: '1', transform: 'scale(1)' },
                        }
                    }
                },
            },
        }
    </script>

    <style>
        .text-shadow-sm {
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .bg-glass {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .hearts {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            pointer-events: none;
            z-index: 5;
        }
        .heart {
            position: absolute;
            color: #e64c7f;
            opacity: 0.7;
            animation: fall 8s linear infinite;
        }
        @keyframes fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }
        .sparkle-effect {
            position: absolute;
            width: 4px;
            height: 4px;
            background: #e64c7f;
            border-radius: 50%;
            animation: sparkle 2s ease-in-out infinite;
        }
        .modal-overlay {
            backdrop-filter: blur(10px);
            animation: fadeIn 0.3s ease-out;
        }
        .modal-content {
            animation: slideUp 0.5s ease-out;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display min-h-screen p-4 sm:p-8 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">

    <div class="flex items-center justify-center min-h-screen py-8">

    <!-- Floating Hearts Background -->
    <div class="hearts" id="hearts-container"></div>

    <!-- Desktop Background Decorative Elements -->
    <div class="fixed inset-0 overflow-hidden pointer-events-none z-0">
        <div class="absolute -top-[20%] -left-[10%] w-[50vw] h-[50vw] bg-primary/10 rounded-full blur-[100px] animate-pulse-slow"></div>
        <div class="absolute top-[40%] -right-[10%] w-[40vw] h-[40vw] bg-primary/5 rounded-full blur-[80px] animate-float"></div>
    </div>

    <!-- Main Mobile Card Container -->
    <main class="relative z-10 w-full max-w-[420px] min-h-[800px] bg-paper shadow-2xl rounded-xl flex flex-col items-center justify-between border border-primary/10 animate-fade-in">

        <!-- Paper Texture Overlay -->
        <div class="absolute inset-0 bg-paper-texture opacity-50 pointer-events-none z-0"></div>

        <!-- Decorative Border Frame -->
        <div class="absolute inset-4 border border-primary/20 rounded-lg pointer-events-none z-0"></div>
        <div class="absolute inset-[18px] border border-primary/10 rounded-[6px] pointer-events-none z-0"></div>

        <!-- Sparkle Effects -->
        <div class="sparkle-effect top-20 left-16" style="animation-delay: 0s;"></div>
        <div class="sparkle-effect top-32 right-20" style="animation-delay: 1s;"></div>
        <div class="sparkle-effect bottom-32 left-12" style="animation-delay: 0.5s;"></div>
        <div class="sparkle-effect bottom-20 right-16" style="animation-delay: 1.5s;"></div>

        <!-- Top Content: Date/Tag -->
        <div class="relative z-10 w-full pt-12 px-8 text-center opacity-70 animate-slide-up">
            <span class="text-sm tracking-[0.2em] text-primary/80 uppercase font-semibold">{{ now()->format('F jS') }}</span>
        </div>

        <!-- Center Content: Botanical Art & Greeting -->
        <div class="relative z-10 flex-1 flex flex-col items-center justify-center w-full px-6 py-4">

            <!-- Botanical Illustration Top -->
            <div class="w-full h-48 mb-2 relative flex justify-center items-end animate-float">
                <img alt="Vintage pink roses botanical watercolor painting"
                     class="object-cover w-48 h-48 rounded-full opacity-90 mix-blend-multiply transition-transform duration-500 hover:scale-105 cursor-pointer"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuB3cwxatCSw4gRf8bRTFEqtsvKoEKpt192S4NdRArcymaKbyZFBeKC72Ru5reA9AmCMO31jEOSSizMcT4p4OUzbJrvEAu1clQgglKk8VI8PCw6NOPVyN5iN3pA7_HE8cpzzM9HpEdocIpPGdebh5bMOMCXxrZrhemNni1N9K88ZSI8Ak3e1zdJeKk8RA0EeF7Mq7OyiZVXPhyXbtMOUIX4vKcW7wDy_kgRv1ylMygwtDyQnfYeph-wnv1y7JEG96722YbDrfvdC2g2N"
                     style="mask-image: linear-gradient(to bottom, black 50%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 50%, transparent 100%);"
                     onclick="createHeartExplosion(event)"/>
            </div>

            <!-- Main Typography -->
            <div class="text-center space-y-2 relative animate-slide-up" style="animation-delay: 0.3s;">
                <h1 class="text-5xl md:text-6xl text-primary font-medium italic tracking-tight leading-[1.1] drop-shadow-sm hover:animate-heart-beat transition-all duration-300 cursor-pointer" onclick="toggleTextGlow(this)">
                    Happy<br/>
                    <span class="not-italic font-normal text-4xl md:text-5xl text-gray-800 dark:text-gray-700">Valentine's</span><br/>
                    Day
                </h1>
                <div class="w-16 h-[1px] bg-primary/40 mx-auto mt-6 mb-4"></div>
                <p class="text-lg text-gray-600 dark:text-gray-400 italic font-light animate-pulse-slow">
                    To my dearest love
                </p>
            </div>

            <!-- Botanical Illustration Bottom -->
            <div class="w-full h-32 mt-4 relative flex justify-center items-start transform rotate-180 animate-float" style="animation-delay: 1s;">
                <img alt="Soft vintage floral bouquet drawing"
                     class="object-cover w-40 h-32 rounded-full opacity-80 mix-blend-multiply transition-transform duration-500 hover:scale-105 cursor-pointer"
                     src="https://lh3.googleusercontent.com/aida-public/AB6AXuCa3v3InBzKUZD2VmkKWl6kLnlFQTzLUWm6fACB9givkZ04dZo6niZYdDFNu3RuV-LvoBDgLmX3kHrG_mKFYKc2InW0dUMpX2uzhTuHnE8DYbV_lbKrmUmmBUqNgaQcxoXHenHnhlyxyIbB52diP5spKc_-vfvjQf9gahgoYJPPi7beDu6EzcKfKO9dTB4pfJ3pWCuZiLvFwLJwb0vG2znIeksC3JeUQZIfPaS2ZT6YFGLe5r8VijX05BsAr6vS45iX5WwGKt-bBllR"
                     style="mask-image: linear-gradient(to bottom, black 30%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, black 30%, transparent 100%);"
                     onclick="createHeartExplosion(event)"/>
            </div>
        </div>

        <!-- Bottom Content: CTA & Footer -->
        <div class="relative z-10 w-full pb-12 px-8 flex flex-col items-center space-y-6 animate-slide-up" style="animation-delay: 0.6s;">

            <!-- Glassmorphic Button -->
            <button id="surprise-btn" class="group relative w-full max-w-[280px] h-14 rounded-full bg-glass border border-white/40 shadow-glass flex items-center justify-center transition-all duration-300 hover:scale-[1.02] active:scale-[0.98] hover:shadow-lg hover:bg-white/80 overflow-hidden">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-primary/5 via-primary/10 to-primary/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>
                <span class="relative flex items-center space-x-2 text-primary font-medium text-lg tracking-wide">
                    <span>Open Your Surprise</span>
                    <span class="material-icons text-lg group-hover:translate-x-1 transition-transform duration-300 animate-heart-beat">favorite</span>
                </span>
            </button>

            <!-- Subtle Footer Text -->
            <p class="text-xs text-gray-400 font-light tracking-wide uppercase animate-pulse-slow">
                Created with Love
            </p>
        </div>
    </main>



    <script>
        // Setup CSRF token for AJAX requests
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};

        // Create floating hearts
        function createFloatingHeart() {
            const heartsContainer = document.getElementById('hearts-container');
            const heart = document.createElement('div');
            heart.className = 'heart';
            heart.innerHTML = Math.random() > 0.5 ? '💖' : '💕';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.fontSize = (Math.random() * 20 + 10) + 'px';
            heart.style.animationDelay = Math.random() * 2 + 's';
            heart.style.animationDuration = (Math.random() * 3 + 5) + 's';

            heartsContainer.appendChild(heart);

            setTimeout(() => {
                heart.remove();
            }, 8000);
        }

        // Create hearts periodically
        setInterval(createFloatingHeart, 800);

        // Heart explosion effect on image click
        function createHeartExplosion(event) {
            const rect = event.target.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;

            for (let i = 0; i < 8; i++) {
                const heart = document.createElement('div');
                heart.innerHTML = '💖';
                heart.style.position = 'fixed';
                heart.style.left = centerX + 'px';
                heart.style.top = centerY + 'px';
                heart.style.fontSize = '20px';
                heart.style.pointerEvents = 'none';
                heart.style.zIndex = '100';
                heart.style.animation = `explode-${i} 1s ease-out forwards`;

                document.body.appendChild(heart);

                setTimeout(() => heart.remove(), 1000);
            }
        }

        // Add explosion keyframes dynamically
        const style = document.createElement('style');
        let keyframes = '';
        for (let i = 0; i < 8; i++) {
            const angle = (i / 8) * 2 * Math.PI;
            const distance = 100;
            const x = Math.cos(angle) * distance;
            const y = Math.sin(angle) * distance;
            keyframes += `
                @keyframes explode-${i} {
                    0% { transform: translate(0, 0) scale(1); opacity: 1; }
                    100% { transform: translate(${x}px, ${y}px) scale(0); opacity: 0; }
                }
            `;
        }
        style.innerHTML = keyframes;
        document.head.appendChild(style);

        // Text glow effect
        function toggleTextGlow(element) {
            element.style.textShadow = element.style.textShadow ? '' : '0 0 20px #e64c7f, 0 0 30px #e64c7f, 0 0 40px #e64c7f';
            setTimeout(() => {
                element.style.textShadow = '';
            }, 1000);
        }

        // Button functionality
        const surpriseBtn = document.getElementById('surprise-btn');

        surpriseBtn.addEventListener('click', () => {
            // Create heart explosion at button
            const rect = surpriseBtn.getBoundingClientRect();
            const centerX = rect.left + rect.width / 2;
            const centerY = rect.top + rect.height / 2;
            createHeartExplosionAt(centerX, centerY);

            // Show loading effect
            surpriseBtn.innerHTML = '<span class="flex items-center justify-center gap-2">Opening... <div class="w-4 h-4 border-2 border-white/30 border-t-white rounded-full animate-spin"></div></span>';

            // Navigate directly to letter page
            setTimeout(() => {
                window.location.href = "{{ route('letter') }}";
            }, 1500);
        });



        function createHeartExplosionAt(x, y) {
            for (let i = 0; i < 12; i++) {
                const heart = document.createElement('div');
                heart.innerHTML = '💖';
                heart.style.position = 'fixed';
                heart.style.left = x + 'px';
                heart.style.top = y + 'px';
                heart.style.fontSize = '24px';
                heart.style.pointerEvents = 'none';
                heart.style.zIndex = '100';
                heart.style.animation = `explode-${i % 8} 1.5s ease-out forwards`;

                document.body.appendChild(heart);

                setTimeout(() => heart.remove(), 1500);
            }
        }

        // Add touch interactions for mobile
        document.addEventListener('touchstart', function(e) {
            if (e.target.tagName === 'IMG') {
                createHeartExplosion(e);
            }
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                surpriseBtn.click();
            }

        });

        // Add some initial hearts
        setTimeout(() => {
            for (let i = 0; i < 3; i++) {
                setTimeout(createFloatingHeart, i * 200);
            }
        }, 1000);

        // Responsive animations based on screen size
        function handleResize() {
            const isMobile = window.innerWidth < 768;
            const hearts = document.querySelectorAll('.heart');
            hearts.forEach(heart => {
                if (isMobile) {
                    heart.style.fontSize = '12px';
                } else {
                    heart.style.fontSize = (Math.random() * 20 + 10) + 'px';
                }
            });
        }

        window.addEventListener('resize', handleResize);
        handleResize();

        console.log('💖 Happy Valentine\'s Day! 💖');
    </script>

    </div>
</body>
</html>
