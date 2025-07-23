<footer>
  <!-- FAQ Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-6 lg:px-16">
      <div class="text-center mb-12">
        <p class="text-sm text-blue-500 font-semibold uppercase">Get Your Answer</p>
        <h2 class="text-4xl font-bold text-blue-900 leading-tight">Frequently Asked Questions</h2>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
        <!-- Image -->
        <div class="relative">
          <img src="../image/gabungan.png" alt="Doctor with patient" class="rounded-xl shadow-lg w-full max-w-md mx-auto">
          <div class="absolute bottom-4 left-4 bg-white px-4 py-2 rounded-full shadow-md flex items-center space-x-2">
            <span class="text-2xl">😊</span>
            <p class="text-sm font-medium">84k+ <span class="text-gray-500 font-normal">Happy Patients</span></p>
          </div>
        </div>

        <!-- Accordion -->
        <div x-data="{ openItem: null }" class="space-y-6">
          <div class="border-b pb-4" x-data="{ id: 1 }">
            <button @click="openItem = openItem === 1 ? null : 1" class="flex justify-between w-full text-left items-center">
              <span class="text-blue-900 font-semibold pr-4">What is this  platfrom and who can use it?</span>
              <svg class="w-5 h-5 text-blue-500 transform transition-transform duration-300" :class="{ 'rotate-45': openItem === 1 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
              </svg>
            </button>
            <div x-show="openItem === 1" x-transition class="mt-2 text-sm text-gray-700">
              This is a health and wellness platform that provides online medical consultations, medicine purchases, health event information, and more. It is available to the public, but some features require user registration and login.
            </div>
          </div>

          <div class="border-b pb-4" x-data="{ id: 2 }">
            <button @click="openItem = openItem === 2 ? null : 2" class="flex justify-between w-full text-left items-center">
              <span class="text-blue-900 font-semibold pr-4">How do I register on this website?</span>
              <svg class="w-5 h-5 text-blue-500 transform transition-transform duration-300" :class="{ 'rotate-45': openItem === 2 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
              </svg>
            </button>
            <div x-show="openItem === 2" x-transition class="mt-2 text-sm text-gray-700">
              To register, simply go to the homepage and you will be redirected to the registration page. You can sign up using your email address or through social login options like Google. 
            </div>
          </div>

          <div class="border-b pb-4" x-data="{ id: 3 }">
            <button @click="openItem = openItem === 3 ? null : 3" class="flex justify-between w-full text-left items-center">
              <span class="text-blue-900 font-semibold pr-4">What services are available on this platform?</span>
              <svg class="w-5 h-5 text-blue-500 transform transition-transform duration-300" :class="{ 'rotate-45': openItem === 3 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
              </svg>
            </button>
            <div x-show="openItem === 3" x-transition class="mt-2 text-sm text-gray-700">
              This platform offers a variety of services, including:

                Online Medical Consultations - Users can consult with medical specialists.
                Medicine Purchases - Users can browse and buy medicines online.
                Health Event Information - Users can explore health-related events.
                Real-Time Chat System - Integrated messaging for communication between users and specialists.
                Payment and Voucher Support - Users can make payments and apply vouchers for discounts.


                If you have more specific questions about any of these services, feel free to ask!  
            </div>
          </div>

          <div class="border-b pb-4" x-data="{ id: 4 }">
            <button @click="openItem = openItem === 4 ? null : 4" class="flex justify-between w-full text-left items-center">
              <span class="text-blue-900 font-semibold pr-4">How can I contact the support team or send feedback?</span>
              <svg class="w-5 h-5 text-blue-500 transform transition-transform duration-300" :class="{ 'rotate-45': openItem === 4 }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"></path>
              </svg>
            </button>
            <div x-show="openItem === 4" x-transition class="mt-2 text-sm text-gray-700">
              I do not have direct access to connect you with an admin, but if you click the button below you can open the chat with our admin team, or alternatively you can just leave us a message.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

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
          <!-- <p class="text-gray-400">&copy; <?php echo e(date('Y')); ?> All Rights Reserved</p> -->
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
            <!-- <li><a href="<?php echo e(route('contact')); ?>" class="hover:text-blue-400">Contact</a></li> -->
            <li><a href="<?php echo e(route('aboutus')); ?>" class="hover:text-blue-400">About Us</a></li>
            <!-- <li><a href="#" class="hover:text-blue-400">Services</a></li> -->
            <!-- <li><a href="#" class="hover:text-blue-400">FAQ</a></li> -->
          </ul>
        </div>

        <!-- About -->
        <div>
          <h3 class="text-xl font-semibold mb-4">About Vitalife</h3>
          <p class="text-gray-400 text-sm leading-relaxed">
Vitalife is an innovative health consultation app that connects users with specialist doctors across Yogyakarta. Key features include consultation recommendations, nearby pharmacy locations, easy online reservations, complete facility info, and an AI-powered interactive chatbot for an enhanced user experience.          <!-- <a href="#" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 transition px-4 py-2 rounded-lg text-sm font-semibold">Join as a Partner</a> -->
        </div>
      </div>
      <div class="mt-12 pt-6 border-t border-gray-700 flex flex-col md:flex-row justify-between items-center text-sm text-gray-500">
        <!-- <p>Made with <span class="text-red-500">❤</span> by the Vitalife Team</p> -->
        <p class="mt-2 md:mt-0">&copy; <?php echo e(date('Y')); ?> All rights reserved</p>
      </div>
    </div>
  </section>
</footer>
<?php /**PATH D:\Coding\Project 4 matklul\Vitalife-1\resources\views/layouts/footer.blade.php ENDPATH**/ ?>