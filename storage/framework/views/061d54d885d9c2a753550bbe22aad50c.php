<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- ScrollReveal Library -->
    <script src="https://unpkg.com/scrollreveal@4.0.9/dist/scrollreveal.min.js"></script>
    <?php echo $__env->yieldContent('css'); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        .slider-image {
            transition: order 0.3s ease-in-out;
        }
        /* Menghilangkan scrollbar untuk semua elemen */
        * {
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }
        
        *::-webkit-scrollbar {
            display: none !important;
        }

        /* Memastikan scroll masih berfungsi */
        html, body {
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Tambahan untuk memastikan konten tidak terpotong */
        .overflow-container {
            overflow-y: auto;
            height: 100vh;
        }
    </style>
</head>

<body class="font-sans antialiased overflow-container">
    <div class="min-h-screen"> <!--ganti warna-->
        <?php echo $__env->make('layouts.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <!-- Page Content -->
        <main class="bg-blue-100">
            <?php echo e($slot); ?>

        </main>
    </div>

    <!-- Include the chatbot component -->
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/681b1012c905ab190eadae80/1iqkrdivk';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>



    <!-- ScrollReveal Initialization -->
    <script>
        
        document.addEventListener('DOMContentLoaded', (event) => {
            ScrollReveal().reveal('.reveal', {
                delay: 200,
                distance: '50px',
                duration: 1000,
                easing: 'cubic-bezier(0.5, 0, 0, 1)',
                interval: 0,
                opacity: 0,
                origin: 'bottom',
                scale: 1,
                cleanup: false,
                container: document.documentElement,
                desktop: true,
                mobile: true,
                reset: false,
                useDelay: 'always',
                viewFactor: 0.0,
                viewOffset: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0,
                }
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const counters = [{
                    id: 'counter1',
                    target: 5000
                },
                {
                    id: 'counter2',
                    target: 200
                },
                {
                    id: 'counter3',
                    target: 1000
                },
                {
                    id: 'counter4',
                    target: 700
                }
            ];

            const animateCounter = (counter) => {
                const element = document.getElementById(counter.id);
                if (element) {
                    let animated = false;

                    const observer = new IntersectionObserver((entries) => {
                        if (entries[0].isIntersecting && !animated) {
                            anime({
                                targets: element,
                                innerHTML: [0, counter.target],
                                easing: 'linear',
                                round: 1,
                                duration: 3000,
                                begin: () => {
                                    animated = true;
                                }
                            });
                            observer.unobserve(element);
                        }
                    }, {
                        threshold: 0.5
                    });

                    observer.observe(element);
                }
            };

            counters.forEach(animateCounter);
        });

        function handleResize() {
            const width = window.innerWidth;
            const elements = document.querySelectorAll('.responsive-element');

            elements.forEach(el => {
                if (width < 640) {
                    el.classList.add('sm-screen');
                } else if (width < 768) {
                    el.classList.add('md-screen');
                } else {
                    el.classList.add('lg-screen');
                }
            });

            // Sesuaikan ukuran font untuk #typed-text
            const typedText = document.getElementById('typed-text');
            if (typedText) {
                if (width < 640) {
                    typedText.style.fontSize = '1rem';
                } else if (width < 768) {
                    typedText.style.fontSize = '1.25rem';
                } else {
                    typedText.style.fontSize = '1.5rem';
                }
            }
        }

        // Panggil fungsi saat halaman dimuat dan saat ukuran browser berubah
        window.addEventListener('load', handleResize);
        window.addEventListener('resize', handleResize);

        // Kode Typed.js
        document.addEventListener('DOMContentLoaded', function() {
            var typedElement = document.getElementById('typed-text');
            if (typedElement) {
                var text = "We are the solution for travelling in a healthy condition and we provide health specialists...";

                function startTyping() {
                    var typed = new Typed('#typed-text', {
                        strings: [text],
                        typeSpeed: 65,
                        startDelay: 1000,
                        showCursor: false,
                        cursorChar: '|',
                        onComplete: function(self) {
                            setTimeout(function() {
                                self.destroy();
                                setTimeout(startTyping, 500);
                            }, 1000);
                        }
                    });
                }

                startTyping();
            }
        });

        // Bahasa
        document.addEventListener('DOMContentLoaded', function() {
            const changeLanguageBtn = document.getElementById('changeLanguageBtn');
            if (changeLanguageBtn) {
                changeLanguageBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    console.log('Change language button clicked');
                    const currentLang = this.getAttribute('data-lang');
                    const newLang = currentLang === 'en' ? 'id' : 'en';

                    fetch('/api/change-language', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                                'Accept': 'application/json'
                            },
                            body: JSON.stringify({
                                lang: newLang
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.message === 'Language changed successfully') {
                                console.log('Language changed successfully. Reloading page...');
                                window.location.reload();
                            } else {
                                console.error('Failed to change language:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            }
        });

        // Kode untuk mencegah scroll default
        document.body.addEventListener('wheel', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, { passive: false });
         document.addEventListener('keydown', function (event) {
        if (event.key === 'r' || event.key === 'R') {
            // Hapus cookie Tawk.to (hanya sebagian browser yang izinkan ini via JS)
            document.cookie.split(";").forEach(function(c) {
                document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/");
            });

            // Reload page (fresh session)
            location.reload(true);
        }
    });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/layouts/app.blade.php ENDPATH**/ ?>