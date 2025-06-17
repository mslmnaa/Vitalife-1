<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-dark-100">
            <?php echo e(__('Profile Image')); ?>

        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            <?php echo e(__('Update your profile picture.')); ?>

        </p>
    </header>

    <form method="post" action="<?php echo e(route('profile.update.image')); ?>" class="mt-6 space-y-6" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('post'); ?>

        <div class="flex flex-col items-center">
            <div class="relative mb-4">
                <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                    <?php if(Auth::check() && Auth::user()->image): ?>
                        <img src="<?php echo e(asset('storage/' . Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>" 
                            class="w-full h-full object-cover" id="profile-image-preview">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-gray-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    <?php endif; ?>

                </div>
                
                <div class="absolute bottom-0 right-0">
                    <label for="image" class="flex items-center justify-center w-8 h-8 bg-blue-600 hover:bg-blue-700 transition rounded-full cursor-pointer shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                </div>
            </div>
            
            <div class="text-sm text-gray-500 mb-4">
                <?php echo e(__('Click the camera icon to change your profile picture')); ?>

            </div>
        </div>

        <div class="flex items-center gap-4">
            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?><?php echo e(__('Save Image')); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>

            <?php if(session('status') === 'image-updated'): ?>
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600 dark:text-gray-400"><?php echo e(__('Image updated.')); ?></p>
            <?php endif; ?>
        </div>
    </form>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                const imagePreview = document.getElementById('profile-image-preview');
                
                reader.onload = function(e) {
                    // If no image preview exists yet, create one
                    if (!imagePreview) {
                        const previewContainer = document.querySelector('.w-32.h-32.rounded-full');
                        previewContainer.innerHTML = `<img src="${e.target.result}" alt="Profile Preview" class="w-full h-full object-cover" id="profile-image-preview">`;
                    } else {
                        imagePreview.src = e.target.result;
                    }
                };
                
                reader.readAsDataURL(file);
            }
        }
    </script>
</section><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\profile\partials\update-profile-image.blade.php ENDPATH**/ ?>