<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section
        class="ezy__contact11 light bg-white dark:bg-[#0b1727] text-zinc-900 dark:text-white overflow-hidden reveal">
        <div class="bg-no-repeat bg-left-bottom bg-cover py-14"
            style="background-image: url(https://cdn.easyfrontend.com/pictures/contact/contact_11.png)">
            <div class="container px-14">
                <div class="grid grid-cols-12 py-14">
                    <div class="col-span-12 lg:col-span-4 mb-12 lg:mb-0">
                        <h2 class="text-2xl leading-none font-bold md:text-[40px] mb-6 text-white">Get in Touch</h2>
                        <p class="text-lg text-white">
                            It's easier to reach your savings goals when you have the right savings account. Take a look
                            and find the right one for you!
                        </p>
                    </div>
                    <div class="col-span-12 lg:col-span-5 lg:col-start-8">
                        <div
                            class="bg-white text-black  rounded-2xl border-[25px] dark:border-blue-200 border-[#F4F7FD] p-6 md:p-12">
                            <h2 class="text-2xl md:text-[45px] leading-none font-bold mb-4">Contact Us</h2>
                            <p class="text-lg mb-12">We list your menu online, help you process orders.</p>

                            <form action="<?php echo e(route('feedback.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-4">
                                    <label class="block font-medium text-sm text-indigo-900 dark:text-indigo-600">
                                        Nama
                                    </label>
                                    <input type="text" name="name"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-white dark:text-indigo-600 text-indigo-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-full shadow-sm w-full"
                                        placeholder="Masukkan Nama" required />
                                </div>
                                <div class="mb-4">
                                    <label class="block font-medium text-sm text-indigo-900 dark:text-indigo-600">
                                        Email
                                    </label>
                                    <input type="email" name="email"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-white dark:text-indigo-600 text-indigo-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-full shadow-sm w-full"
                                        placeholder="Masukkan Email" required />
                                </div>
                                <div class="mb-4">
                                    <label class="block font-medium text-sm text-indigo-900 dark:text-indigo-600">
                                        Pesan
                                    </label>
                                    <textarea name="message"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-white dark:text-indigo-600 text-indigo-900 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-lg shadow-sm w-full"
                                        placeholder="Masukkan Pesan" rows="4" required></textarea>
                                </div>
                                <div class="text-start">
                                    <button type="submit"
                                        class="bg-blue-600 hover:bg-opacity-90 text-white px-8 py-3 rounded mb-4">
                                        Kirim
                                    </button>
                                </div>
                            </form>

                            <?php if(session('success')): ?>
                                <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                                    role="alert">
                                    <strong class="font-bold">Berhasil!</strong>
                                    <span class="block sm:inline"><?php echo e(session('success')); ?></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ezy__contact11-blank-card"></div>
    </section>

    <section class="ezy__copyright10 light py-12 bg-gray-800 dark:bg-gray-900 text-white dark:text-white">
        <div class="container px-4">
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-8 md:col-start-3">
                    <div class="flex flex-col justify-center items-center text-center">
                        <div class="flex items-center justify-center mb-4">
                            <div>
                                <img src="../image/LOGO_1.png" alt="" class="max-w-full h-auto w-24">
                            </div>
                            <div>
                                <p class="ml-3">&copy; Copyright <?php echo e(date('Y')); ?></p>
                            </div>
                        </div>
                        <div class="flex space-x-4 mt-2 mb-6">
                            <a href="<?php echo e(route('contact')); ?>"
                                class="text-white hover:text-blue-600 hover:scale-110 transition duration-300">Contact</a>
                            <a href="<?php echo e(route('aboutus')); ?>"
                                class="text-white hover:text-blue-600 hover:scale-110 transition duration-300">About
                                Us</a>
                        </div>
                        <p class="opacity-50 mb-6">Isheaven male their dry doesn't without him set saw two him man
                            itself second fifth light over fish over which creepeth void don't. Image darkness
                            gathering. All hath don't it, abundantly darkness can't forth appear, in.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views\user\contact.blade.php ENDPATH**/ ?>