<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Clinic IoT 4.0</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Swiper JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Header/Navbar -->
    <nav class="bg-blue-600 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold">Smart Clinic IoT 4.0</h1>
                <div class="hidden md:flex space-x-6">
                    <a href="#" class="hover:text-blue-200">Beranda</a>
                    <a href="#" class="hover:text-blue-200">Panel</a>
                    <a href="#" class="hover:text-blue-200">Agenda</a>
                    <a href="#" class="hover:text-blue-200">Kontak</a>
                    <a href="{{ route('sensor') }}" class="hover:text-blue-200">IoT</a>
                </div>
            </div>
        </div>
    </nav>
    

    <!-- Hero Slider -->
    <div class="swiper hero-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide h-[200px]">
                <img src="{{ asset('img/slide1.png') }}" alt="Slide 1" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide h-[200px]">
                <img src="{{ asset('img/slide2.png') }}" alt="Slide 2" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide h-[200px]">
                <img src="{{ asset('img/slide3.png') }}" alt="Slide 3" class="w-full h-full object-cover">
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>

    <!-- Konten Utama -->
    <div class="container mx-auto px-4 py-8">
        <!-- Berita Terbaru -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-blue-800">Berita Terbaru</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kartu Berita -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-blue-100">
                    <img src="{{ asset('img/foto1.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2 text-blue-700">Monitoring Ruang Kamar Inap</h3>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-blue-100">
                    <img src="{{ asset('img/foto2.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2 text-blue-700">Integritas IOT</h3>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-blue-100">
                    <img src="{{ asset('img/gambar4.jpg') }}" alt="Berita 1" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-xl mb-2 text-blue-700">Aplikasi berbasis Web Desktop Dan MObiles Apps</h3>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a href="#" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">Baca Selengkapnya</a>
                    </div>
                </div>
               
                <!-- Ulangi untuk berita lainnya -->
            </div>
        </section>

        <!-- Galeri Foto -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-blue-800">Galeri Foto</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="relative group">
                    <img src="{{ asset('img/foto3.jpeg') }}" alt="Galeri 1" class="w-full h-64 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-blue-600 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg font-bold">Lihat Foto</span>
                    </div>
                </div>
                <!-- Ulangi untuk foto lainnya -->
                <div class="relative group">
                    <img src="{{ asset('img/gambar4.jpg') }}" alt="Galeri 1" class="w-full h-64 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-blue-600 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg font-bold">Lihat Foto</span>
                    </div>
                </div>
                <div class="relative group">
                    <img src="{{ asset('img/foto4.jpg') }}" alt="Galeri 1" class="w-full h-64 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-blue-600 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg font-bold">Lihat Foto</span>
                    </div>
                </div>
                <div class="relative group">
                    <img src="{{ asset('img/foto5.jpeg') }}" alt="Galeri 1" class="w-full h-64 object-cover rounded-lg">
                    <div class="absolute inset-0 bg-blue-600 bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg flex items-center justify-center">
                        <span class="text-white text-lg font-bold">Lihat Foto</span>
                    </div>
                </div>
               
            </div>
        </section>

        <!-- Status & Monitoring Sensor IoT -->
<section class="mb-12">
    <h2 class="text-3xl font-bold mb-6 text-blue-800">
        Status & Monitoring Sensor IoT
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Sensor Suhu -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-600">
            <h3 class="text-xl font-bold text-blue-700 mb-2">Sensor Suhu</h3>
            <p class="text-gray-600">Lokasi: Ruang Rawat Inap</p>
            <p class="text-gray-600">Suhu: <span class="font-bold text-green-600">26°C</span></p>
            <span class="inline-block mt-3 px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                Status Normal
            </span>
        </div>

        <!-- Sensor Asap -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
            <h3 class="text-xl font-bold text-yellow-600 mb-2">Sensor Asap</h3>
            <p class="text-gray-600">Lokasi: Ruang Farmasi</p>
            <p class="text-gray-600">Kondisi: <span class="font-bold text-green-600">Aman</span></p>
            <span class="inline-block mt-3 px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                Tidak Terdeteksi
            </span>
        </div>

        <!-- Sensor Api -->
        <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-red-600">
            <h3 class="text-xl font-bold text-red-600 mb-2">Sensor Api</h3>
            <p class="text-gray-600">Area: Seluruh Klinik</p>
            <p class="text-gray-600">Status: <span class="font-bold text-green-600">Aman</span></p>
            <span class="inline-block mt-3 px-3 py-1 text-sm bg-green-100 text-green-700 rounded-full">
                Tidak Ada Api
            </span>
        </div>
    </div>
</section>

        <!-- Agenda -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-blue-800">Agenda Mendatang</h2>
            <div class="space-y-4">
                <div class="bg-white rounded-lg shadow-md p-4 border border-blue-100">
                    <div class="flex items-center">
                        <div class="bg-blue-600 text-white rounded-lg p-3 text-center min-w-[80px]">
                            <span class="block text-2xl font-bold">15</span>
                            <span class="block text-sm">Nov</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-xl text-blue-700">Mediasi Kesehatan Dengan Masyarakat</h3>
                            <p class="text-gray-600">Lokasi: JL. Kartama</p>
                            <p class="text-gray-600">Waktu: 09.00 - 12.00 WIB</p>
                        </div>

                        <div class="bg-blue-600 text-white rounded-lg p-3 text-center min-w-[80px]">
                            <span class="block text-2xl font-bold">15</span>
                            <span class="block text-sm">Nov</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-xl text-blue-700">Melakukan Pemantaun Ruangan Rawat Inap</h3>
                            <p class="text-gray-600">Lokasi: Gedung Serbaguna</p>
                            <p class="text-gray-600">Waktu: 09.00 - 12.00 WIB</p>
                        </div>

                        <div class="bg-blue-600 text-white rounded-lg p-3 text-center min-w-[80px]">
                            <span class="block text-2xl font-bold">15</span>
                            <span class="block text-sm">Nov</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-xl text-blue-700">Sosialisasi Klinik 4.0</h3>
                            <p class="text-gray-600">Lokasi: Gedung Serbaguna</p>
                            <p class="text-gray-600">Waktu: 09.00 - 12.00 WIB</p>
                        </div>

                        <div class="bg-blue-600 text-white rounded-lg p-3 text-center min-w-[80px]">
                            <span class="block text-2xl font-bold">15</span>
                            <span class="block text-sm">Nov</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-xl text-blue-700">Judul Agenda</h3>
                            <p class="text-gray-600">Lokasi: Gedung Serbaguna</p>
                            <p class="text-gray-600">Waktu: 09.00 - 12.00 WIB</p>
                        </div>

                        <div class="bg-blue-600 text-white rounded-lg p-3 text-center min-w-[80px]">
                            <span class="block text-2xl font-bold">15</span>
                            <span class="block text-sm">Nov</span>
                        </div>
                        <div class="ml-4">
                            <h3 class="font-bold text-xl text-blue-700">Judul Agenda</h3>
                            <p class="text-gray-600">Lokasi: Gedung Serbaguna</p>
                            <p class="text-gray-600">Waktu: 09.00 - 12.00 WIB</p>
                        </div>
                        
                    </div>
                </div>
                <!-- Ulangi untuk agenda lainnya -->
            </div>
        </section>

        <!-- Link Penting -->
        <section class="mb-12">
            <h2 class="text-3xl font-bold mb-6 text-blue-800">Link Penting</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <a href="#" class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border border-blue-100">
                    <span class="text-lg font-semibold text-blue-600">Website 1</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border border-blue-100">
                    <span class="text-lg font-semibold text-blue-600">Website 1</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border border-blue-100">
                    <span class="text-lg font-semibold text-blue-600">Website 1</span>
                </a>
                <a href="#" class="flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow border border-blue-100">
                    <span class="text-lg font-semibold text-blue-600">Website 1</span>
                </a>
                <!-- Ulangi untuk link lainnya -->
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">Tentang Kami</h3>
                    <p class="text-blue-200">SMKN 1 Kemuning adalah institusi pendidikan menengah yang berfokus pada pembekalan keterampilan praktis sesuai kebutuhan industri. Dengan berbagai program keahlian, SMK mempersiapkan siswa untuk langsung bekerja setelah lulus atau melanjutkan ke pendidikan tinggi. Lulusan SMK memiliki kompetensi profesional dalam bidang teknis, bisnis, dan layanan sesuai keahlian yang dipilih.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak</h3>
                    <p class="text-blue-200">Email: info@smartklinik.who.id</p>
                    <p class="text-blue-200">Telepon: (021) 1234-5678</p>
                    <p class="text-blue-200">Alamat: Jalan Lintas Timur Km. 293 Selensen Kec. Kemuning.</p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">Facebook</a>
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">Twitter</a>
                        <a href="#" class="text-blue-200 hover:text-white transition-colors">Instagram</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Inisialisasi Swiper untuk hero slider
        new Swiper('.hero-slider', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>