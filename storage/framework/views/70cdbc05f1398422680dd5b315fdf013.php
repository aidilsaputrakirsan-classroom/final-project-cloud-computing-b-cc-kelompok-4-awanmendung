<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - <?php echo e(config('app.name')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts dan Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-sm border-r border-gray-200 fixed h-full">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gradient">
                    Dashboard Resepin.id 
                </h1>
            </div>
            
            <nav class="mt-6">
                <div class="px-6 py-2">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                        Content Management
                    </h3>
                </div>
                
                <a href="<?php echo e(route('posts.index')); ?>" 
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition <?php echo e(request()->routeIs('posts.*') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Posts
                </a>
                
                <a href="<?php echo e(route('categories.index')); ?>" 
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition <?php echo e(request()->routeIs('categories.*') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Categories
                </a>
                
                <a href="<?php echo e(route('tags.index')); ?>" 
                   class="flex items-center px-6 py-3 text-gray-700 hover:bg-gray-50 hover:text-primary-600 transition <?php echo e(request()->routeIs('tags.*') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : ''); ?>">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.99 1.99 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    Tags
                </a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900"><?php echo $__env->yieldContent('page-title'); ?></h1>
                            <?php if (! empty(trim($__env->yieldContent('page-description')))): ?>
                                <p class="text-gray-600 mt-1"><?php echo $__env->yieldContent('page-description'); ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <a href="<?php echo e(route('blog.index')); ?>" 
                               class="btn-secondary">
                                View Site
                            </a>
                            <div class="h-8 w-8 bg-gray-300 rounded-full"></div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="p-6">
                <!-- Alert Messages -->
                <?php if(session('success')): ?>
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center" role="alert">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg flex items-center" role="alert">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>
</body>
</html><?php /**PATH C:\Users\USER\Documents\GitHub\final-project-cloud-computing-b-cc-kelompok-4-awanmendung\resources\views/layouts/dashboard.blade.php ENDPATH**/ ?>