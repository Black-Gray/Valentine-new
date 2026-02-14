<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Secret Letter - Valentine's Day</title>
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#e6194c",
                        "background-light": "#f8f6f6",
                        "background-dark": "#211115",
                        "paper": "#fffefc",
                        "wax": "#d48c96",
                    },
                    fontFamily: {
                        "display": ["Noto Serif", "serif"]
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'bounce-gentle': 'bounce-gentle 2s ease-in-out infinite',
                        'seal-glow': 'seal-glow 2s ease-in-out infinite',
                        'envelope-open': 'envelope-open 1s ease-out forwards',
                        'letter-rise': 'letter-rise 1.2s ease-out 0.5s forwards',
                        'petal-fall': 'petal-fall 3s ease-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-15px)' },
                        },
                        'bounce-gentle': {
                            '0%, 100%': { transform: 'translateY(0) scale(1)' },
                            '50%': { transform: 'translateY(-10px) scale(1.05)' },
                        },
                        'seal-glow': {
                            '0%, 100%': { boxShadow: '0 0 20px rgba(230, 25, 76, 0.3)' },
                            '50%': { boxShadow: '0 0 35px rgba(230, 25, 76, 0.6)' },
                        },
                        'envelope-open': {
                            '0%': { transform: 'rotateX(0deg)' },
                            '100%': { transform: 'rotateX(-180deg)' },
                        },
                        'letter-rise': {
                            '0%': { transform: 'translateY(100px) scale(0.8)', opacity: '0' },
                            '100%': { transform: 'translateY(0) scale(1)', opacity: '1' },
                        },
                        'petal-fall': {
                            '0%': { transform: 'translateY(-100vh) rotate(0deg)', opacity: '0.8' },
                            '100%': { transform: 'translateY(100vh) rotate(360deg)', opacity: '0' },
                        }
                    }
                },
            },
        }
    </script>
    
    <style>
        .texture-paper {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.8' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100' height='100' filter='url(%23noise)' opacity='0.08'/%3E%3C/svg%3E");
        }
        
        .wax-seal-gradient {
            background: radial-gradient(circle at 30% 30%, #e8aeb7, #d48c96, #b06a74);
            box-shadow: 
                inset 2px 2px 8px rgba(255,255,255,0.4),
                inset -3px -3px 8px rgba(0,0,0,0.3),
                0 8px 25px rgba(0,0,0,0.4);
        }

        .envelope-flap {
            clip-path: polygon(0 0, 50% 60%, 100% 0);
            transform-origin: top;
        }
        
        .envelope-body {
            clip-path: polygon(0 0, 50% 45%, 100% 0, 100% 100%, 0 100%);
        }

        .petal {
            position: absolute;
            color: #f472b6;
            opacity: 0.7;
            animation: petal-fall linear infinite;
            pointer-events: none;
        }

        .perspective-1000 {
            perspective: 1000px;
        }

        .preserve-3d {
            transform-style: preserve-3d;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .envelope-shadow {
            filter: drop-shadow(0 25px 50px rgba(0,0,0,0.15));
        }

        @media (max-width: 768px) {
            .envelope-container {
                transform: scale(0.9);
            }
        }

        @media (max-width: 480px) {
            .envelope-container {
                transform: scale(0.8);
            }
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-100 min-h-screen flex items-center justify-center p-4 relative">
    
    <!-- Animated Background Petals -->
    <div class="fixed inset-0 pointer-events-none z-0" id="petals-container"></div>
    
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-0 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2 animate-pulse-slow"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-primary/8 rounded-full blur-3xl translate-x-1/3 translate-y-1/3 animate-float"></div>
        
        <!-- Decorative corner elements -->
        <div class="absolute top-8 left-8 w-32 h-32 opacity-20">
            <svg viewBox="0 0 100 100" class="w-full h-full text-primary">
                <path d="M20,20 Q30,10 40,20 T60,20 T80,20" stroke="currentColor" stroke-width="1" fill="none" opacity="0.5"/>
                <circle cx="20" cy="20" r="2" fill="currentColor"/>
                <circle cx="40" cy="15" r="1.5" fill="currentColor"/>
                <circle cx="60" cy="22" r="1" fill="currentColor"/>
                <circle cx="80" cy="18" r="2" fill="currentColor"/>
            </svg>
        </div>
        
        <div class="absolute bottom-8 right-8 w-24 h-24 opacity-15 rotate-45">
            <svg viewBox="0 0 100 100" class="w-full h-full text-primary">
                <heart fill="currentColor">
                    <path d="M50 85 C20 55, 5 35, 5 20 C5 10, 15 5, 25 5 C35 5, 45 15, 50 25 C55 15, 65 5, 75 5 C85 5, 95 10, 95 20 C95 35, 80 55, 50 85 Z"/>
                </heart>
            </svg>
        </div>
    </div>
    
    <!-- Main Content Container -->
    <div class="relative z-10 w-full max-w-lg mx-auto flex flex-col items-center justify-center min-h-screen py-8">
        
        <!-- Header Instructions -->
        <div class="mb-16 text-center relative z-20 animate-fade-in">
            <div class="mb-4">
                <span class="inline-block w-16 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></span>
                <span class="mx-4 text-primary font-medium tracking-wider uppercase text-sm">For You</span>
                <span class="inline-block w-16 h-px bg-gradient-to-r from-transparent via-primary/50 to-transparent"></span>
            </div>
            <h1 class="text-3xl md:text-4xl italic font-display text-primary/90 drop-shadow-sm mb-4">
                A Secret Letter
            </h1>
            <p class="text-lg text-gray-500 dark:text-gray-400 font-light tracking-wide animate-bounce-gentle">
                💕 Tap the wax seal to reveal your surprise
            </p>
        </div>
        
        <!-- The 3D Envelope Composition -->
        <div class="relative envelope-container perspective-1000 group cursor-pointer" id="envelope-container">
            
            <!-- Envelope Shadow -->
            <div class="absolute -bottom-12 left-1/2 -translate-x-1/2 w-[85%] h-12 bg-black/20 blur-2xl rounded-[100%] transition-all duration-700 group-hover:w-[75%] group-hover:bg-black/10"></div>
            
            <!-- Main Envelope Body -->
            <div class="relative w-80 h-56 md:w-96 md:h-64 envelope-shadow preserve-3d animate-float">
                
                <!-- Envelope Back Layer -->
                <div class="absolute inset-0 bg-paper dark:bg-gray-100 rounded-lg shadow-2xl flex items-center justify-center overflow-hidden border border-gray-200/50 texture-paper">
                    <div class="w-[92%] h-[92%] border border-dashed border-gray-300/60 rounded opacity-40"></div>
                    
                    <!-- Subtle address lines -->
                    <div class="absolute inset-0 flex flex-col justify-center items-center space-y-2 opacity-20">
                        <div class="w-32 h-px bg-gray-400"></div>
                        <div class="w-40 h-px bg-gray-400"></div>
                        <div class="w-28 h-px bg-gray-400"></div>
                    </div>
                </div>
                
                <!-- Envelope Side Flaps -->
                <div class="absolute top-0 left-0 w-1/2 h-full bg-gray-50 dark:bg-gray-200 texture-paper opacity-90 shadow-lg" 
                     style="clip-path: polygon(0% 100%, 100% 50%, 0% 0%); background: linear-gradient(45deg, #fdfbf7, #f5f1eb);">
                </div>
                <div class="absolute top-0 right-0 w-1/2 h-full bg-gray-50 dark:bg-gray-200 texture-paper opacity-90 shadow-lg" 
                     style="clip-path: polygon(100% 100%, 0% 50%, 100% 0%); background: linear-gradient(-45deg, #fdfbf7, #f5f1eb);">
                </div>
                
                <!-- Bottom Flap -->
                <div class="absolute bottom-0 left-0 w-full h-full bg-paper dark:bg-gray-100 shadow-inner texture-paper" 
                     style="clip-path: polygon(0% 100%, 100% 100%, 100% 45%, 50% 65%, 0% 45%); background: linear-gradient(to bottom, #fdfbf7, #f2ece4);">
                </div>
                
                <!-- Top Flap (Opens on click) -->
                <div class="absolute top-0 left-0 w-full h-full envelope-flap transition-all duration-700 ease-out transform-gpu preserve-3d" 
                     style="background: linear-gradient(to bottom, #fffefc, #f2ece4);" id="envelope-flap">
                    <div class="w-full h-full texture-paper shadow-xl envelope-flap"></div>
                </div>
                
                <!-- Interactive Wax Seal -->
                <div class="absolute top-[55%] left-1/2 -translate-x-1/2 -translate-y-1/2 z-30 transition-all duration-300 hover:scale-110 active:scale-95 group-hover:animate-seal-glow" 
                     id="wax-seal">
                    <button class="relative w-20 h-20 md:w-24 md:h-24 rounded-full flex items-center justify-center wax-seal-gradient border-4 border-white/20 transition-all duration-300 hover:border-white/40">
                        
                        <!-- Wax texture overlay -->
                        <svg class="absolute inset-0 w-full h-full text-wax opacity-30 animate-pulse-slow" fill="currentColor" viewBox="0 0 100 100">
                            <path d="M50 0 C62 3 68 -1 78 7 C88 13 98 8 98 25 C102 35 97 45 100 55 C102 70 97 80 92 90 C82 98 72 95 62 100 C47 102 37 97 27 97 C17 94 7 97 4 82 C0 67 7 57 4 42 C0 27 7 17 17 10 C27 4 37 7 50 0 Z" opacity="0.6" transform="scale(1.15) translate(-6, -6)"></path>
                        </svg>
                        
                        <!-- Inner Seal -->
                        <div class="relative w-14 h-14 md:w-16 md:h-16 rounded-full border border-primary/30 shadow-inner flex items-center justify-center bg-gradient-to-br from-transparent to-black/10">
                            <span class="material-icons text-primary text-2xl md:text-3xl opacity-90 drop-shadow-sm transform transition-all duration-300 group-hover:scale-110">
                                favorite
                            </span>
                        </div>
                        
                        <!-- Glow effect -->
                        <div class="absolute inset-0 rounded-full bg-primary/20 blur-xl opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
                    </button>
                    
                    <!-- Click indicator -->
                    <div class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-xs text-gray-400 opacity-60 animate-bounce-gentle">
                        ✨ Tap me
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Decorative Element -->
        <div class="mt-20 flex flex-col items-center opacity-50">
            <div class="w-px h-16 bg-gradient-to-b from-transparent via-primary/30 to-transparent"></div>
            <div class="w-2 h-2 bg-primary/30 rounded-full animate-pulse-slow"></div>
        </div>
    </div>
    
    <!-- Loading overlay for transition -->
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center hidden transition-opacity duration-500" id="loading-overlay">
        <div class="text-center text-white">
            <div class="w-8 h-8 border-2 border-white/30 border-t-white rounded-full animate-spin mx-auto mb-4"></div>
            <p class="text-lg font-light">Opening your letter...</p>
        </div>
    </div>

    <script>
        // Setup CSRF token for AJAX requests
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
        
        // Create falling petals
        function createPetal() {
            const petalsContainer = document.getElementById('petals-container');
            const petal = document.createElement('div');
            petal.className = 'petal';
            petal.innerHTML = ['🌸', '💖', '🌺', '💕', '🌹'][Math.floor(Math.random() * 5)];
            petal.style.left = Math.random() * 100 + 'vw';
            petal.style.fontSize = (Math.random() * 15 + 10) + 'px';
            petal.style.animationDuration = (Math.random() * 4 + 6) + 's';
            petal.style.animationDelay = Math.random() * 2 + 's';
            
            petalsContainer.appendChild(petal);
            
            setTimeout(() => {
                petal.remove();
            }, 10000);
        }

        // Create petals periodically
        setInterval(createPetal, 1500);
        
        // Wax seal click handler
        document.getElementById('wax-seal').addEventListener('click', function() {
            const loadingOverlay = document.getElementById('loading-overlay');
            const envelopeFlap = document.getElementById('envelope-flap');
            
            // Show loading overlay
            loadingOverlay.classList.remove('hidden');
            
            // Animate envelope opening
            envelopeFlap.style.transform = 'rotateX(-180deg)';
            envelopeFlap.style.transformOrigin = 'top';
            
            // Create heart explosion effect
            createHeartExplosion();
            
            // Navigate to letter page after animation
            setTimeout(() => {
                window.location.href = "{{ route('letter') }}";
            }, 1500);
        });
        
        // Heart explosion effect
        function createHeartExplosion() {
            const sealRect = document.getElementById('wax-seal').getBoundingClientRect();
            const centerX = sealRect.left + sealRect.width / 2;
            const centerY = sealRect.top + sealRect.height / 2;
            
            for (let i = 0; i < 12; i++) {
                const heart = document.createElement('div');
                heart.innerHTML = '💖';
                heart.style.position = 'fixed';
                heart.style.left = centerX + 'px';
                heart.style.top = centerY + 'px';
                heart.style.fontSize = '24px';
                heart.style.pointerEvents = 'none';
                heart.style.zIndex = '1000';
                
                const angle = (i / 12) * 2 * Math.PI;
                const distance = 150;
                const x = Math.cos(angle) * distance;
                const y = Math.sin(angle) * distance;
                
                heart.style.animation = `explode-${i} 1.5s ease-out forwards`;
                
                // Add explosion keyframe
                const style = document.createElement('style');
                style.innerHTML = `
                    @keyframes explode-${i} {
                        0% { transform: translate(0, 0) scale(1); opacity: 1; }
                        100% { transform: translate(${x}px, ${y}px) scale(0); opacity: 0; }
                    }
                `;
                document.head.appendChild(style);
                
                document.body.appendChild(heart);
                
                setTimeout(() => {
                    heart.remove();
                    style.remove();
                }, 1500);
            }
        }
        
        // Add some initial petals
        setTimeout(() => {
            for (let i = 0; i < 5; i++) {
                setTimeout(createPetal, i * 300);
            }
        }, 1000);
        
        // Mobile responsiveness
        function handleResize() {
            const container = document.querySelector('.envelope-container');
            if (window.innerWidth < 480) {
                container.style.transform = 'scale(0.75)';
            } else if (window.innerWidth < 768) {
                container.style.transform = 'scale(0.85)';
            } else {
                container.style.transform = 'scale(1)';
            }
        }
        
        window.addEventListener('resize', handleResize);
        handleResize();
        
        // Add keyboard support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                document.getElementById('wax-seal').click();
            }
        });

        console.log('💌 Your secret letter awaits... 💌');
    </script>
</body>
</html>