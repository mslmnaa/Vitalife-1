<footer>
  <!-- FAQ Section -->
  
  <!-- Footer Section -->
  <section class="bg-gray-900 text-white py-16">
    <div class="container mx-auto px-6 lg:px-16">
      <div class="grid md:grid-cols-3 gap-12">
        <!-- Logo Column -->
        <div>
          <div class="flex items-center mb-4">
            <img src="../image/LOGO_1.png" alt="Vitalife Logo" class="h-12 w-auto">
            <span class="ml-3 text-2xl font-bold bg-gradient-to-r from-blue-400 to-teal-300 text-transparent bg-clip-text">Vitalife</span>
          </div>
          <p class="text-gray-400">&copy; <?php echo e(date('Y')); ?> All Rights Reserved</p>
          <div class="flex mt-4 space-x-4">
            <!-- Social icons -->
            <a href="#" class="hover:text-blue-400">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="hover:text-blue-400">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="hover:text-blue-400">
              <i class="fab fa-twitter"></i>
            </a>
          </div>
        </div>

        <!-- Navigation -->
        <div>
          <h3 class="text-xl font-semibold mb-4">Navigation</h3>
          <ul class="space-y-3 text-gray-400">
            <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-blue-400">Contact</a></li>
            <li><a href="<?php echo e(route('aboutus')); ?>" class="hover:text-blue-400">About Us</a></li>
            <li><a href="#" class="hover:text-blue-400">Services</a></li>
            <li><a href="#" class="hover:text-blue-400">FAQ</a></li>
          </ul>
        </div>

        <!-- About -->
        <div>
          <h3 class="text-xl font-semibold mb-4">About Vitalife</h3>
          <p class="text-gray-400 text-sm leading-relaxed">
            Vitalife is a health tourism app for discovering yoga & spa centers, sports, events, doctor consultations, and health tracking.
          </p>
          <a href="#" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-lg text-sm font-semibold">Join as a Partner</a>
        </div>
      </div>
      <div class="mt-12 pt-6 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <p>Made with <span class="text-red-500">❤</span> by the Vitalife Team</p>
        <p class="mt-2 md:mt-0">&copy; <?php echo e(date('Y')); ?> All rights reserved</p>
      </div>
    </div>
  </section>
</footer>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/layouts/footer2.blade.php ENDPATH**/ ?>