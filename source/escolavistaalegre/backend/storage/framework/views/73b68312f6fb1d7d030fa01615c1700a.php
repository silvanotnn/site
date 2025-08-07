<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Escola Vista Alegre'); ?> - Escola Vista Alegre</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" type="image/x-icon">

    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>
<body>
    <!-- Header -->
    <header class="navbar fixed-top w-full z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0 flex items-center">
                    <a href="<?php echo e(route('home')); ?>" class="text-2xl font-bold text-white flex items-center">
                        <span class="bg-white text-blue-600 rounded-full w-10 h-10 flex items-center justify-center mr-2">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        Escola Vista Alegre
                    </a>
                </div>
                <nav class="hidden md:block">
                    <ul class="flex space-x-6">
                        <li><a href="<?php echo e(route('home')); ?>" class="text-white hover:text-yellow-300 transition font-semibold">Início</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="text-white hover:text-yellow-300 transition font-semibold">Sobre</a></li>
                        <li><a href="<?php echo e(route('posts')); ?>" class="text-white hover:text-yellow-300 transition font-semibold">Notícias</a></li>
                        <li><a href="<?php echo e(route('albums')); ?>" class="text-white hover:text-yellow-300 transition font-semibold">Álbuns</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>" class="text-white hover:text-yellow-300 transition font-semibold">Contato</a></li>
                    </ul>
                </nav>
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-white">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden bg-blue-800 w-full">
            <div class="container mx-auto px-4 py-3">
                <ul class="space-y-3">
                    <li><a href="<?php echo e(route('home')); ?>" class="text-white hover:text-yellow-300 transition block py-2">Início</a></li>
                    <li><a href="<?php echo e(route('about')); ?>" class="text-white hover:text-yellow-300 transition block py-2">Sobre</a></li>
                    <li><a href="<?php echo e(route('posts')); ?>" class="text-white hover:text-yellow-300 transition block py-2">Notícias</a></li>
                    <li><a href="<?php echo e(route('albums')); ?>" class="text-white hover:text-yellow-300 transition block py-2">Álbuns</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>" class="text-white hover:text-yellow-300 transition block py-2">Contato</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div data-aos="fade-up" data-aos-delay="100">
                    <h3 class="footer-title text-xl">Escola Vista Alegre</h3>
                    <p class="mb-4">Educação de qualidade para um futuro brilhante.</p>
                    <div class="footer-social">
                        <a href="#" class="footer-social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="footer-social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200">
                    <h3 class="footer-title text-xl">Contato</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3 text-primary-light"></i>
                            <span>Rua das Flores, 123<br>Vista Alegre - SP<br>CEP: 00000-000</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3 text-primary-light"></i>
                            <span>(11) 1234-5678</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3 text-primary-light"></i>
                            <span>contato@escolavistaalegre.com.br</span>
                        </li>
                    </ul>
                </div>
                <div data-aos="fade-up" data-aos-delay="300">
                    <h3 class="footer-title text-xl">Links Rápidos</h3>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>" class="footer-link">Início</a></li>
                        <li><a href="<?php echo e(route('about')); ?>" class="footer-link">Sobre</a></li>
                        <li><a href="<?php echo e(route('posts')); ?>" class="footer-link">Notícias</a></li>
                        <li><a href="<?php echo e(route('albums')); ?>" class="footer-link">Álbuns</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>" class="footer-link">Contato</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo e(date('Y')); ?> Escola Vista Alegre. Todos os direitos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true
        });

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-blue-800');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-blue-800');
                navbar.classList.add('bg-transparent');
            }
        });
    </script>
</body>
</html>
<?php /**PATH /home/ubuntu/escolavistaalegre/backend/resources/views/layouts/public.blade.php ENDPATH**/ ?>