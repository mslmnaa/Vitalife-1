<section class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden">
    <!-- Header with gradient background -->
    <div class="bg-gradient-to-r from-[#355385] to-[#1a1f5c] px-6 py-4">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-semibold text-white">
                    <?php echo e(__('Profile Image')); ?>

                </h2>
                <p class="text-blue-100 text-sm mt-1">
                    <?php echo e(__('Update your profile picture.')); ?>

                </p>
            </div>
        </div>
    </div>

    <!-- Form content -->
    <div class="p-6">
        <form method="post" action="<?php echo e(route('profile.update.image')); ?>" class="space-y-6" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('post'); ?>

            <!-- Profile Image Display -->
            <div class="flex flex-col items-center space-y-4">
                <div class="relative">
                    <div class="w-32 h-32 rounded-full overflow-hidden bg-gray-100 border-4 border-white shadow-lg">
                        <?php if(Auth::check() && Auth::user()->image): ?>
                            <img src="<?php echo e(asset('storage/' . Auth::user()->image)); ?>" alt="<?php echo e(Auth::user()->name); ?>" 
                                class="w-full h-full object-cover" id="profile-image-preview">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-purple-500" id="default-avatar">
                                <svg class="h-16 w-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Hover Overlay -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 hover:opacity-100 transition-opacity duration-200 flex items-center justify-center rounded-full cursor-pointer" onclick="document.getElementById('image').click()">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Camera Button -->
                    <div class="absolute bottom-0 right-0">
                        <label for="image" class="flex items-center justify-center w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 rounded-full cursor-pointer shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </label>
                        <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(event)">
                    </div>
                </div>
                
                <!-- Instructions -->
                <div class="text-center">
                    <p class="text-sm text-gray-600">
                        <?php echo e(__('Click the camera icon to change your profile picture')); ?>

                    </p>
                    <p class="text-xs text-gray-500 mt-1">
                        <?php echo e(__('Supports JPG, PNG, GIF up to 10MB')); ?>

                    </p>
                </div>
            </div>

            <!-- Drag & Drop Area -->
            <div id="drop-area" class="border-2 border-dashed border-gray-300 rounded-lg p-8 text-center transition-all duration-200 hover:border-blue-500 hover:bg-blue-50 cursor-pointer" onclick="document.getElementById('image').click()">
                <svg class="h-12 w-12 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                </svg>
                <p class="text-sm text-gray-600"><?php echo e(__('Drag and drop your image here')); ?></p>
                <p class="text-xs text-gray-500 mt-1"><?php echo e(__('or click to browse')); ?></p>
            </div>

            <!-- Action buttons with improved styling -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex items-center space-x-4">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#0E1036] to-[#1a1f5c] hover:from-[#0a0c2b] hover:to-[#151a4f] text-white font-medium rounded-lg shadow-md hover:shadow-lg transform hover:scale-105 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-[#0E1036] focus:ring-offset-2">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <?php echo e(__('Save Image')); ?>

                    </button>
                    
                    <button type="button" onclick="removeImage()" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        <?php echo e(__('Remove')); ?>

                    </button>
                </div>

                <!-- Success message with enhanced styling -->
                <?php if(session('status') === 'image-updated'): ?>
                <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-init="setTimeout(() => show = false, 3000)" class="flex items-center space-x-2 bg-green-50 text-green-700 px-4 py-2 rounded-lg border border-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm font-medium"><?php echo e(__('Image updated successfully!')); ?></span>
                </div>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                // Validate file type
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                if (!allowedTypes.includes(file.type)) {
                    alert('Please select a valid image file (JPG, PNG, or GIF)');
                    return;
                }
                
                // Validate file size (10MB)
                if (file.size > 10 * 1024 * 1024) {
                    alert('File size must be less than 10MB');
                    return;
                }
                
                const reader = new FileReader();
                let imagePreview = document.getElementById('profile-image-preview');
                const defaultAvatar = document.getElementById('default-avatar');
                
                reader.onload = function(e) {
                    // If no image preview exists yet, create one
                    if (!imagePreview) {
                        const previewContainer = document.querySelector('.w-32.h-32.rounded-full');
                        previewContainer.innerHTML = `<img src="${e.target.result}" alt="Profile Preview" class="w-full h-full object-cover" id="profile-image-preview">`;
                        imagePreview = document.getElementById('profile-image-preview');
                    } else {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }
                    
                    if (defaultAvatar) {
                        defaultAvatar.classList.add('hidden');
                    }
                };
                
                reader.readAsDataURL(file);
            }
        }
        
        function removeImage() {
            const imagePreview = document.getElementById('profile-image-preview');
            const defaultAvatar = document.getElementById('default-avatar');
            const fileInput = document.getElementById('image');
            
            if (imagePreview) {
                imagePreview.classList.add('hidden');
            }
            if (defaultAvatar) {
                defaultAvatar.classList.remove('hidden');
            }
            fileInput.value = '';
        }
        
        // Drag and drop functionality
        const dropArea = document.getElementById('drop-area');
        const fileInput = document.getElementById('image');
        
        dropArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropArea.classList.add('border-blue-500', 'bg-blue-50');
        });
        
        dropArea.addEventListener('dragleave', (e) => {
            e.preventDefault();
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
        });
        
        dropArea.addEventListener('drop', (e) => {
            e.preventDefault();
            dropArea.classList.remove('border-blue-500', 'bg-blue-50');
            
            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;
                previewImage({ target: { files: files } });
            }
        });
    </script>
</section><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/profile/partials/update-profile-image.blade.php ENDPATH**/ ?>