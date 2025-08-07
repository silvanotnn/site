<?php $__env->startSection('title', 'Início'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<section class="hero-section">
    <div class="container mx-auto px-4">
        <div class="hero-content text-center" data-aos="fade-up">
            <h1 class="hero-title">Bem-vindo à Escola Vista Alegre</h1>
            <p class="hero-subtitle">Educação de qualidade para formar cidadãos do futuro</p>
            <div class="flex flex-col md:flex-row justify-center gap-4 mt-8">
                <a href="<?php echo e(route('about')); ?>" class="btn-primary">Conheça nossa escola</a>
                <a href="<?php echo e(route('contact')); ?>" class="btn-secondary">Entre em contato</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section bg-light-color">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center text-3xl mb-12" data-aos="fade-up">Por que escolher a Escola Vista Alegre?</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="feature-box" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="feature-title text-xl text-center">Excelência Acadêmica</h3>
                <p class="text-center">Nosso currículo é desenvolvido para estimular o pensamento crítico e preparar os alunos para os desafios do futuro.</p>
            </div>

            <div class="feature-box" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title text-xl text-center">Professores Qualificados</h3>
                <p class="text-center">Nossa equipe é formada por profissionais dedicados e especializados em suas áreas de atuação.</p>
            </div>

            <div class="feature-box" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon mx-auto">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h3 class="feature-title text-xl text-center">Infraestrutura Moderna</h3>
                <p class="text-center">Oferecemos espaços de aprendizagem equipados com tecnologia de ponta e ambientes acolhedores.</p>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="section">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-3xl mb-12" data-aos="fade-up">Últimas Notícias</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if(isset($posts) && count($posts) > 0): ?>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card" data-aos="fade-up" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                    <div class="h-48 bg-gray-300 flex items-center justify-center">
                        <?php if($post->image_path): ?>
                            <img src="<?php echo e(asset('storage/' . $post->image_path)); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full bg-blue-100 flex items-center justify-center">
                                <i class="fas fa-newspaper text-4xl text-blue-500"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <h3 class="card-title text-xl"><?php echo e($post->title); ?></h3>
                        <p class="text-gray-500 text-sm mb-3"><?php echo e($post->created_at->format('d/m/Y')); ?></p>
                        <p class="card-text mb-4"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($post->content), 100)); ?></p>
                        <a href="<?php echo e(route('posts.show', $post->id)); ?>" class="btn-primary inline-block">Leia mais</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-8" data-aos="fade-up">
                    <i class="fas fa-newspaper text-5xl text-gray-300 mb-4"></i>
                    <p class="text-xl text-gray-500">Nenhuma notícia disponível no momento.</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-8" data-aos="fade-up">
            <a href="<?php echo e(route('posts')); ?>" class="btn-primary">Ver todas as notícias</a>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="section bg-light-color">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center text-3xl mb-12" data-aos="fade-up">Galeria de Fotos</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php if(isset($albums) && count($albums) > 0 && isset($albums[0]->images) && count($albums[0]->images) > 0): ?>
                <?php $__currentLoopData = $albums[0]->images->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="<?php echo e($loop->iteration * 100); ?>">
                    <img src="<?php echo e(asset('storage/' . $image->path)); ?>" alt="<?php echo e($image->caption ?? 'Imagem da galeria'); ?>" class="gallery-img">
                    <div class="gallery-overlay">
                        <a href="<?php echo e(route('albums.show', $albums[0]->id)); ?>" class="text-white hover:text-yellow-300">
                            <i class="fas fa-search-plus text-3xl"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <?php for($i = 1; $i <= 4; $i++): ?>
                <div class="gallery-item" data-aos="zoom-in" data-aos-delay="<?php echo e($i * 100); ?>">
                    <div class="w-full h-64 bg-blue-100 flex items-center justify-center">
                        <i class="fas fa-image text-4xl text-blue-500"></i>
                    </div>
                </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

        <div class="text-center mt-8" data-aos="fade-up">
            <a href="<?php echo e(route('albums')); ?>" class="btn-primary">Ver todos os álbuns</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section">
    <div class="container mx-auto px-4">
        <h2 class="section-title text-center text-3xl mb-12" data-aos="fade-up">O que dizem sobre nós</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="testimonial" data-aos="fade-up" data-aos-delay="100">
                <p class="testimonial-text">"A Escola Vista Alegre transformou a vida do meu filho. Os professores são atenciosos e o ambiente é acolhedor. Recomendo a todos!"</p>
                <div class="testimonial-author">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-blue-500"></i>
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Ana Silva</h4>
                        <p class="testimonial-author-title">Mãe de aluno</p>
                    </div>
                </div>
            </div>

            <div class="testimonial" data-aos="fade-up" data-aos-delay="200">
                <p class="testimonial-text">"Como professor, posso afirmar que a Escola Vista Alegre valoriza tanto os profissionais quanto os alunos. Um ambiente incrível para ensinar e aprender."</p>
                <div class="testimonial-author">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-blue-500"></i>
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Carlos Oliveira</h4>
                        <p class="testimonial-author-title">Professor</p>
                    </div>
                </div>
            </div>

            <div class="testimonial" data-aos="fade-up" data-aos-delay="300">
                <p class="testimonial-text">"Estudar na Escola Vista Alegre me preparou para a universidade e para a vida. Sou muito grato por todos os anos que passei aqui."</p>
                <div class="testimonial-author">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-user text-blue-500"></i>
                    </div>
                    <div>
                        <h4 class="testimonial-author-name">Pedro Santos</h4>
                        <p class="testimonial-author-title">Ex-aluno</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-primary-color text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6" data-aos="fade-up">Faça parte da nossa comunidade</h2>
        <p class="text-xl mb-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">Venha conhecer nossa escola e descubra como podemos contribuir para o futuro do seu filho.</p>
        <a href="<?php echo e(route('contact')); ?>" class="inline-block bg-white text-primary-color font-bold py-3 px-8 rounded-lg hover:bg-yellow-300 hover:text-primary-dark transition transform hover:-translate-y-1" data-aos="fade-up" data-aos-delay="200">Agende uma visita</a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ubuntu/escolavistaalegre/backend/resources/views/public/home.blade.php ENDPATH**/ ?>