<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klinik dayat Ralinish Cikarang Bekasi - Layanan Kesehatan Ibu dan Anak</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mint': {
                             50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .floating-btn {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <div class="bg-mint-500 text-white p-2 rounded-lg mr-3">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2C5.58 2 2 5.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.707 8.293l-3-3a1 1 0 00-1.414 1.414L11.586 11H7a1 1 0 100 2h4.586l-2.293 2.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-mint-800">KLINIK RALINISH</h1>
                        <p class="text-sm text-gray-600">Cikarang Bekasi</p>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-mint-600 transition duration-300">Beranda</a>
                    <a href="#layanan" class="text-gray-700 hover:text-mint-600 transition duration-300">Layanan</a>
                    <a href="#edukasi" class="text-gray-700 hover:text-mint-600 transition duration-300">Edukasi</a>
                    <a href="#testimoni" class="text-gray-700 hover:text-mint-600 transition duration-300">Testimoni</a>
                    <a href="#faq" class="text-gray-700 hover:text-mint-600 transition duration-300">FAQ</a>
                    <a href="#kontak" class="text-gray-700 hover:text-mint-600 transition duration-300">Kontak</a>
                </div>
                <button id="mobile-menu-btn" class="md:hidden text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <div id="mobile-menu" class="hidden md:hidden pb-4">
                <a href="#beranda" class="block py-2 text-gray-700 hover:text-mint-600">Beranda</a>
                <a href="#layanan" class="block py-2 text-gray-700 hover:text-mint-600">Layanan</a>
                <a href="#edukasi" class="block py-2 text-gray-700 hover:text-mint-600">Edukasi</a>
                <a href="#testimoni" class="block py-2 text-gray-700 hover:text-mint-600">Testimoni</a>
                <a href="#faq" class="block py-2 text-gray-700 hover:text-mint-600">FAQ</a>
                <a href="#kontak" class="block py-2 text-gray-700 hover:text-mint-600">Kontak</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="beranda" class="bg-gradient-to-br from-mint-50 to-mint-100 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="fade-in">
                    <h1 class="text-4xl md:text-6xl font-bold text-mint-800 mb-6">
                        Layanan Kesehatan 
                        <span class="text-mint-600">Ibu & Anak</span> 
                        Terpercaya
                    </h1>
                    <p class="text-xl text-gray-700 mb-8 leading-relaxed">
                        Klinik Ralinish hadir untuk memberikan pelayanan kesehatan terbaik bagi ibu hamil dan anak-anak di Cikarang Bekasi dengan tenaga medis berpengalaman.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="floating-btn bg-mint-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-mint-700 transition duration-300 shadow-lg">
                            Reservasi Sekarang
                        </button>
                        <a href="#layanan" class="border-2 border-mint-600 text-mint-600 px-8 py-4 rounded-full text-lg font-semibold hover:bg-mint-600 hover:text-white transition duration-300 text-center">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-mint-200 rounded-3xl p-8 shadow-2xl">
                        <div class="bg-white rounded-2xl p-6 text-center">
                            <div class="w-full h-64 bg-gradient-to-br from-mint-100 to-mint-200 rounded-xl flex items-center justify-center mb-4">
                                <div class="text-mint-600">
                                    <svg class="w-24 h-24 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-mint-800 mb-2">Klinik Modern & Bersih</h3>
                            <p class="text-gray-600">Fasilitas lengkap untuk kenyamanan Anda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="layanan" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-mint-800 mb-4">Layanan Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami menyediakan berbagai layanan kesehatan berkualitas tinggi untuk ibu hamil dan anak-anak
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- ANC Service -->
                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-mint-600 text-white p-4 rounded-2xl w-16 h-16 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mint-800 mb-4">Antenatal Care (ANC)</h3>
                    <p class="text-gray-700 mb-6">
                        Pemeriksaan kehamilan rutin meliputi cek kesehatan ibu dan janin, USG, dan konsultasi gizi.
                    </p>
                    <div class="bg-white rounded-xl p-4 mb-6">
                        <h4 class="font-bold text-mint-700 mb-2">Jadwal Layanan:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Senin - Jumat: 08.00 - 16.00</li>
                            <li>• Sabtu: 08.00 - 12.00</li>
                            <li>• Minggu: Tutup</li>
                        </ul>
                    </div>
                    <button class="w-full bg-mint-600 text-white py-3 rounded-xl hover:bg-mint-700 transition duration-300">
                        Reservasi ANC
                    </button>
                </div>

                <!-- Konsultasi -->
                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-mint-600 text-white p-4 rounded-2xl w-16 h-16 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mint-800 mb-4">Konsultasi Dokter</h3>
                    <p class="text-gray-700 mb-6">
                        Konsultasi dengan dokter spesialis kandungan dan anak berpengalaman.
                    </p>
                    <div class="bg-white rounded-xl p-4 mb-6">
                        <h4 class="font-bold text-mint-700 mb-2">Jadwal Layanan:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Senin - Jumat: 09.00 - 15.00</li>
                            <li>• Sabtu: 09.00 - 11.00</li>
                            <li>• Konsultasi online tersedia</li>
                        </ul>
                    </div>
                    <button class="w-full bg-mint-600 text-white py-3 rounded-xl hover:bg-mint-700 transition duration-300">
                        Jadwalkan Konsultasi
                    </button>
                </div>

                <!-- Pemeriksaan Anak -->
                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg hover:shadow-xl transition duration-300">
                    <div class="bg-mint-600 text-white p-4 rounded-2xl w-16 h-16 flex items-center justify-center mb-6">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-mint-800 mb-4">Pemeriksaan Anak</h3>
                    <p class="text-gray-700 mb-6">
                        Cek kesehatan rutin anak, imunisasi, dan konsultasi tumbuh kembang.
                    </p>
                    <div class="bg-white rounded-xl p-4 mb-6">
                        <h4 class="font-bold text-mint-700 mb-2">Jadwal Layanan:</h4>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Senin - Jumat: 08.00 - 16.00</li>
                            <li>• Sabtu: 08.00 - 12.00</li>
                            <li>• Imunisasi: Selasa & Kamis</li>
                        </ul>
                    </div>
                    <button class="w-full bg-mint-600 text-white py-3 rounded-xl hover:bg-mint-700 transition duration-300">
                        Reservasi Pemeriksaan
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Edukasi Section -->
    <section id="edukasi" class="py-20 bg-mint-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-mint-800 mb-4">Edukasi Ibu Hamil</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Artikel dan tips kesehatan untuk mendampingi perjalanan kehamilan Anda
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Nutrisi Seimbang Selama Kehamilan</h3>
                        <p class="text-gray-600 mb-4">
                            Panduan lengkap asupan gizi yang tepat untuk mendukung kesehatan ibu dan perkembangan janin yang optimal.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Olahraga Aman untuk Ibu Hamil</h3>
                        <p class="text-gray-600 mb-4">
                            Jenis-jenis olahraga yang aman dilakukan selama kehamilan untuk menjaga kebugaran dan mempersiapkan persalinan.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Persiapan Menyusui</h3>
                        <p class="text-gray-600 mb-4">
                            Tips dan panduan untuk mempersiapkan proses menyusui yang sukses sejak masa kehamilan.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Tanda-Tanda Persalinan</h3>
                        <p class="text-gray-600 mb-4">
                            Mengenali tanda-tanda awal persalinan dan kapan waktu yang tepat untuk ke rumah sakit.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Perawatan Bayi Baru Lahir</h3>
                        <p class="text-gray-600 mb-4">
                            Panduan merawat bayi baru lahir, mulai dari cara memandikan hingga mengenali kebutuhan bayi.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>

                <article class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                    <div class="h-48 bg-gradient-to-br from-mint-200 to-mint-300 flex items-center justify-center">
                        <svg class="w-16 h-16 text-mint-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-mint-800 mb-3">Kesehatan Mental Ibu Hamil</h3>
                        <p class="text-gray-600 mb-4">
                            Menjaga kesehatan mental selama kehamilan dan mengatasi kecemasan yang umum dialami ibu hamil.
                        </p>
                        <span class="text-mint-600 font-semibold hover:text-mint-700 cursor-pointer">Baca Selengkapnya →</span>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section id="testimoni" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-mint-800 mb-4">Testimoni Pasien</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kepercayaan dan kepuasan pasien adalah prioritas utama kami
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-mint-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-mint-800 font-bold text-xl">S</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-mint-800">Sari Dewi</h4>
                            <p class="text-gray-600 text-sm">Ibu dari Kirana</p>
                        </div>
                    </div>
                    <div class="text-mint-600 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-700 italic">
                        "Pelayanan di Klinik Ralinish sangat memuaskan. Dokternya ramah dan selalu menjelaskan kondisi kehamilan saya dengan detail. Fasilitas kliniknya juga bersih dan nyaman."
                    </p>
                </div>

                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-mint-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-mint-800 font-bold text-xl">M</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-mint-800">Maya Sari</h4>
                            <p class="text-gray-600 text-sm">Ibu dari Arya</p>
                        </div>
                    </div>
                    <div class="text-mint-600 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-700 italic">
                        "Dari hamil sampai melahirkan, saya selalu kontrol di sini. Dokternya sabar dan telaten menjelaskan. Anakku juga selalu imunisasi di sini karena pelayanannya bagus."
                    </p>
                </div>

                <div class="bg-mint-50 rounded-3xl p-8 shadow-lg">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-mint-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-mint-800 font-bold text-xl">R</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-mint-800">Rina Handayani</h4>
                            <p class="text-gray-600 text-sm">Ibu dari Zahra</p>
                        </div>
                    </div>
                    <div class="text-mint-600 mb-4">
                        ★★★★★
                    </div>
                    <p class="text-gray-700 italic">
                        "Klinik yang sangat direkomendasikan! Tidak perlu antri lama, pelayanan cepat, dan harga terjangkau. Dokternya juga memberikan edukasi yang sangat membantu."
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-mint-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-mint-800 mb-4">Pertanyaan yang Sering Diajukan</h2>
                <p class="text-xl text-gray-600">
                    Temukan jawaban atas pertanyaan umum tentang layanan kami
                </p>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Berapa biaya pemeriksaan ANC?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Biaya pemeriksaan ANC di Klinik Ralinish mulai dari Rp 150.000 - Rp 300.000 tergantung jenis pemeriksaan yang dilakukan. Pemeriksaan dasar termasuk cek tekanan darah, berat badan, dan konsultasi dokter.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Apakah perlu membuat janji temu terlebih dahulu?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Kami sangat menyarankan untuk membuat janji temu terlebih dahulu agar tidak perlu menunggu lama. Anda bisa menghubungi kami melalui telepon atau WhatsApp. Namun, kami juga melayani pasien walk-in dengan sistem antrian.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Dokter apa saja yang tersedia di klinik?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Klinik Ralinish memiliki dokter spesialis kandungan dan kebidanan (SpOG) serta dokter spesialis anak (SpA). Semua dokter kami berpengalaman dan berlisensi resmi.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Apakah klinik menerima BPJS?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Ya, Klinik Ralinish bekerjasama dengan BPJS Kesehatan. Pastikan Anda membawa kartu BPJS yang masih aktif dan rujukan dari faskes tingkat 1 jika diperlukan.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Apa saja yang perlu dibawa saat pemeriksaan kehamilan?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Bawa KTP, kartu BPJS (jika ada), buku kontrol kehamilan, hasil pemeriksaan sebelumnya, dan daftar obat yang sedang dikonsumsi. Untuk pemeriksaan USG, disarankan kandung kemih penuh.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">
                    <button class="faq-toggle w-full p-6 text-left flex justify-between items-center hover:bg-mint-50 transition duration-300">
                        <h3 class="text-lg font-bold text-mint-800">Bagaimana cara menghubungi klinik dalam keadaan darurat?</h3>
                        <svg class="w-6 h-6 text-mint-600 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="faq-content hidden px-6 pb-6">
                        <p class="text-gray-700">
                            Untuk keadaan darurat, Anda bisa menghubungi hotline emergency kami di 0812-3456-7890 (24 jam). Untuk konsultasi non-emergency, hubungi (021) 8765-4321 pada jam operasional.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-mint-800 mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Kami siap membantu Anda. Hubungi kami untuk konsultasi atau membuat janji temu
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="bg-mint-50 rounded-3xl p-8">
                    <h3 class="text-2xl font-bold text-mint-800 mb-6">Kirim Pesan</h3>
                    <form class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-mint-700 mb-2">Nama Lengkap</label>
                            <input type="text" class="w-full p-4 border border-mint-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-mint-500 focus:border-transparent" placeholder="Masukkan nama lengkap Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-mint-700 mb-2">Email</label>
                            <input type="email" class="w-full p-4 border border-mint-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-mint-500 focus:border-transparent" placeholder="Masukkan alamat email Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-mint-700 mb-2">Nomor Telepon</label>
                            <input type="tel" class="w-full p-4 border border-mint-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-mint-500 focus:border-transparent" placeholder="Masukkan nomor telepon Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-mint-700 mb-2">Jenis Layanan</label>
                            <select class="w-full p-4 border border-mint-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-mint-500 focus:border-transparent">
                                <option>Pilih jenis layanan</option>
                                <option>Antenatal Care (ANC)</option>
                                <option>Konsultasi Dokter</option>
                                <option>Pemeriksaan Anak</option>
                                <option>Imunisasi</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-mint-700 mb-2">Pesan</label>
                            <textarea rows="4" class="w-full p-4 border border-mint-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-mint-500 focus:border-transparent" placeholder="Tulis pesan atau pertanyaan Anda di sini"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-mint-600 text-white py-4 rounded-xl hover:bg-mint-700 transition duration-300 font-semibold">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Contact Info & Map -->
                <div class="space-y-8">
                    <div class="bg-mint-50 rounded-3xl p-8">
                        <h3 class="text-2xl font-bold text-mint-800 mb-6">Informasi Kontak</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <div class="bg-mint-600 text-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-mint-800">Alamat</h4>
                                    <p class="text-gray-700">Jl. Raya Cikarang No. 123<br>Cikarang Utara, Bekasi 17530<br>Jawa Barat</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-mint-600 text-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-mint-800">Telepon</h4>
                                    <p class="text-gray-700">(021) 8765-4321</p>
                                    <p class="text-gray-700">Emergency: 0812-3456-7890</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-mint-600 text-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-mint-800">Email</h4>
                                    <p class="text-gray-700">info@klinikralinish.com</p>
                                    <p class="text-gray-700">emergency@klinikralinish.com</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="bg-mint-600 text-white p-3 rounded-lg mr-4">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-bold text-mint-800">Jam Operasional</h4>
                                    <p class="text-gray-700">Senin - Jumat: 08.00 - 16.00</p>
                                    <p class="text-gray-700">Sabtu: 08.00 - 12.00</p>
                                    <p class="text-gray-700">Minggu: Tutup</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Google Maps Embed -->
                    <div class="bg-mint-50 rounded-3xl p-8">
                        <h3 class="text-2xl font-bold text-mint-800 mb-6">Lokasi Kami</h3>
                        <div class="w-full h-64 bg-gradient-to-br from-mint-200 to-mint-300 rounded-xl flex items-center justify-center">
                            <div class="text-center text-mint-700">
                                <svg class="w-16 h-16 mx-auto mb-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                <p class="font-semibold">Google Maps</p>
                                <p class="text-sm">Klik untuk melihat lokasi</p>
                            </div>
                        </div>
                        <!-- Replace the div above with actual Google Maps embed -->
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="256" class="rounded-xl" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-mint-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-3 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="bg-mint-600 text-white p-2 rounded-lg mr-3">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 2C5.58 2 2 5.58 2 10s3.58 8 8 8 8-3.58 8-8-3.58-8-8-8zm3.707 8.293l-3-3a1 1 0 00-1.414 1.414L11.586 11H7a1 1 0 100 2h4.586l-2.293 2.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold">KLINIK RALINISH</h3>
                            <p class="text-mint-200">Cikarang Bekasi</p>
                        </div>
                    </div>
                    <p class="text-mint-100 mb-4">
                        Memberikan pelayanan kesehatan terbaik untuk ibu hamil dan anak-anak dengan dedikasi dan profesionalisme tinggi.
                    </p>
                    <div class="flex space-x-4">
                        <div class="bg-mint-700 p-2 rounded-lg hover:bg-mint-600 transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                        </div>
                        <div class="bg-mint-700 p-2 rounded-lg hover:bg-mint-600 transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                            </svg>
                        </div>
                        <div class="bg-mint-700 p-2 rounded-lg hover:bg-mint-600 transition duration-300 cursor-pointer">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Layanan Kami</h4>
                    <ul class="space-y-2 text-mint-100">
                        <li><a href="#layanan" class="hover:text-white transition duration-300">Antenatal Care (ANC)</a></li>
                        <li><a href="#layanan" class="hover:text-white transition duration-300">Konsultasi Dokter</a></li>
                        <li><a href="#layanan" class="hover:text-white transition duration-300">Pemeriksaan Anak</a></li>
                        <li><a href="#layanan" class="hover:text-white transition duration-300">Imunisasi</a></li>
                        <li><a href="#edukasi" class="hover:text-white transition duration-300">Edukasi Kesehatan</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Kontak Cepat</h4>
                    <div class="space-y-2 text-mint-100">
                        <p>📞 (021) 8765-4321</p>
                        <p>🚨 0812-3456-7890 (Emergency)</p>
                        <p>✉️ info@klinikralinish.com</p>
                        <p>📍 Jl. Raya Cikarang No. 123, Bekasi</p>
                    </div>
                </div>
            </div>
            <div class="border-t border-mint-700 mt-8 pt-8 text-center text-mint-200">
                <p>&copy; 2024 Klinik Ralinish Cikarang Bekasi. Seluruh hak cipta dilindungi undang-undang.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // FAQ toggle
        const faqToggles = document.querySelectorAll('.faq-toggle');
        
        faqToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const content = toggle.nextElementSibling;
                const icon = toggle.querySelector('svg');
                
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.style.transform = 'rotate(180deg)';
                } else {
                    content.classList.add('hidden');
                    icon.style.transform = 'rotate(0deg)';
                }
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                    // Close mobile menu if open
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Form submission (dummy)
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Terima kasih! Pesan Anda telah dikirim. Kami akan segera menghubungi Anda.');
            this.reset();
        });

        // Reservation buttons (dummy)
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Reservasi') || button.textContent.includes('Jadwalkan')) {
                button.addEventListener('click', function() {
                    alert('Fitur reservasi akan segera tersedia. Sementara ini, silakan hubungi kami melalui telepon (021) 8765-4321 atau WhatsApp 0812-3456-7890.');
                });
            }
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe sections for animation
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>