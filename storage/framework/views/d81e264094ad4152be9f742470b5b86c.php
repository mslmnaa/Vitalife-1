<?php if (isset($component)) { $__componentOriginal69dc84650370d1d4dc1b42d016d7226b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b = $attributes; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\GuestLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <style>
        html, body {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #0E1036, #355385);
            overflow-x: hidden;
        }
        
        .main-wrapper {
            min-height: 100vh;
            width: 100vw;
            background: linear-gradient(to right, #0E1036, #355385);
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
    
    <div class="main-wrapper"></div>
    
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-lg shadow-lg border-0 overflow-hidden" style="box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                <!-- Header -->
                <div class="px-8 py-6">
                    <h2 class="text-2xl font-semibold text-center mb-2" style="color: #0E1036; border-bottom: 2px solid #355385; padding-bottom: 10px;">
                        <?php echo e(__('Reset Password')); ?>

                    </h2>
                    <p class="text-center text-sm mt-4" style="color: #555;">
                        <?php echo e(__('Enter your new password below to reset your account password.')); ?>

                    </p>
                </div>

                <!-- Form content -->
                <div class="px-8 pb-8">
                    <form method="POST" action="<?php echo e(route('password.store')); ?>" class="space-y-5">
                        <?php echo csrf_field(); ?>

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

                        <!-- Email Address -->
                        <div>
                            <label for="email" class="block mb-2 font-semibold" style="color: #0E1036;">
                                <?php echo e(__('Email')); ?>

                            </label>
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'email','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'email','name' => 'email','value' => old('email', $request->email),'required' => true,'autofocus' => true,'autocomplete' => 'username','placeholder' => ''.e(__('Enter your email address')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'email','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email', $request->email)),'required' => true,'autofocus' => true,'autocomplete' => 'username','placeholder' => ''.e(__('Enter your email address')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 font-semibold" style="color: #0E1036;">
                                <?php echo e(__('New Password')); ?>

                            </label>
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'password','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'new-password','placeholder' => ''.e(__('Enter your new password')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'new-password','placeholder' => ''.e(__('Enter your new password')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 font-semibold" style="color: #0E1036;">
                                <?php echo e(__('Confirm Password')); ?>

                            </label>
                            <?php if (isset($component)) { $__componentOriginal18c21970322f9e5c938bc954620c12bb = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal18c21970322f9e5c938bc954620c12bb = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.text-input','data' => ['id' => 'password_confirmation','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'password','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password','placeholder' => ''.e(__('Confirm your new password')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'password_confirmation','class' => 'w-full px-3 py-2 border-2 rounded focus:outline-none transition-all duration-200','style' => 'border-color: #355385; font-size: 16px; box-sizing: border-box;','type' => 'password','name' => 'password_confirmation','required' => true,'autocomplete' => 'new-password','placeholder' => ''.e(__('Confirm your new password')).'','onfocus' => 'this.style.borderColor=\'#0E1036\'; this.style.boxShadow=\'0 0 5px rgba(53, 83, 133, 0.5)\'','onblur' => 'this.style.borderColor=\'#355385\'; this.style.boxShadow=\'none\'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $attributes = $__attributesOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__attributesOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal18c21970322f9e5c938bc954620c12bb)): ?>
<?php $component = $__componentOriginal18c21970322f9e5c938bc954620c12bb; ?>
<?php unset($__componentOriginal18c21970322f9e5c938bc954620c12bb); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password_confirmation'),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')),'class' => 'mt-2','style' => 'color: red; font-size: 12px;']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" 
                                class="w-full px-5 py-3 text-white font-semibold rounded cursor-pointer border-0 transition-all duration-300"
                                style="background-color: #355385; font-size: 16px;"
                                onmouseover="this.style.backgroundColor='#0E1036'"
                                onmouseout="this.style.backgroundColor='#355385'">
                                <?php echo e(__('Reset Password')); ?>

                            </button>
                        </div>

                        <!-- Additional info -->
                        <div class="text-center pt-4 mt-4" style="border-top: 1px solid #e5e7eb;">
                            <p class="text-sm" style="color: #555;">
                                <?php echo e(__('Make sure to use a strong password to keep your account secure.')); ?>

                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="fixed bottom-5 w-full text-center text-white text-xs">
        &copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Vitalife')); ?>. All rights reserved.
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $attributes = $__attributesOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__attributesOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b)): ?>
<?php $component = $__componentOriginal69dc84650370d1d4dc1b42d016d7226b; ?>
<?php unset($__componentOriginal69dc84650370d1d4dc1b42d016d7226b); ?>
<?php endif; ?><?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/auth/reset-password.blade.php ENDPATH**/ ?>