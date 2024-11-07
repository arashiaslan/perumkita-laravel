@extends('auth.base-auth')

@section('content')
    <main class="main-content mt-0">
        <div class="page-header min-vh-100" style="background-image: url('{{ asset('argon/assets/img/landing/landing-bg.jpg') }}')">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">About App</h2>
                                <p class="card-text">
                                    PerumKita adalah aplikasi web inovatif yang dirancang untuk mempermudah warga perumahan
                                    dalam mengakses berbagai informasi dan layanan penting. Dengan PerumKita, seluruh
                                    kebutuhan komunitas perumahan dapat diakses dengan mudah dalam satu platform terpadu.
                                    Aplikasi ini bertujuan untuk meningkatkan keterhubungan dan kenyamanan di lingkungan
                                    perumahan Anda.
                                </p>
                                <p class="card-text">
                                    <strong>Sejarah:</strong>
                                    Aplikasi ini dikembangkan pada tahun 2024 sebagai bagian dari proyek akhir yang dibuat
                                    oleh Imad Aqil, seorang mahasiswa Politeknik IDN Bogor. Aplikasi web ini dibuat
                                    menggunakan framework Laravel, yang memungkinkan pengembangan web yang cepat dan efisien
                                    dengan arsitektur MVC (Model-View-Controller) yang kuat. Laravel dipilih karena
                                    kemampuannya untuk mengelola data dengan mudah dan menawarkan keamanan yang tinggi,
                                    menjadikannya platform ideal untuk mengembangkan aplikasi komunitas.
                                </p>
                                <p class="card-text">
                                    <strong>Teknologi yang Digunakan:</strong>
                                <ul>
                                    <li><strong>Laravel:</strong> Framework PHP yang kuat dan fleksibel, digunakan untuk
                                        mengembangkan backend aplikasi.</li>
                                    <li><strong>Bootstrap:</strong> Digunakan untuk styling dan tata letak responsif,
                                        memastikan aplikasi tampak bagus di berbagai perangkat.</li>
                                    <li><strong>Argon Dashboard:</strong> Template yang menyediakan elemen UI yang modern
                                        dan interaktif, memudahkan dalam pembuatan antarmuka pengguna yang menarik.</li>
                                </ul>
                                </p>
                                <p class="card-text">
                                    <strong>Tujuan:</strong>
                                    PerumKita hadir untuk menjadi solusi digital yang efisien dalam meningkatkan
                                    keterhubungan dan kenyamanan hidup di lingkungan perumahan. Melalui aplikasi ini, kami
                                    berharap dapat memperkuat komunikasi antarwarga dan mempermudah akses informasi serta
                                    layanan penting.
                                </p>
                                <p class="card-text">
                                    <strong>Tentang Pengembang:</strong>
                                    Imad Aqil adalah mahasiswa Politeknik IDN Bogor yang memiliki ketertarikan khusus dalam
                                    pengembangan web dan aplikasi. Proyek akhir ini merupakan manifestasi dari dedikasi dan
                                    keterampilan yang telah Ia kembangkan selama masa studi. Anda bisa berkenalan lebih
                                    lanjut dengan Imad melalui akun Instagram, GitHub, atau LinkedIn-nya untuk mengetahui
                                    lebih banyak tentang karya dan kontribusinya di dunia teknologi.
                                </p>
                                <div class="social-icons d-flex justify-content-center gap-4 mt-4"> 
                                    <a href="https://github.com/arashiaslan" target="_blank" class="text-dark hover:text-gray-600 transition-colors"> 
                                        <i class="fab fa-github text-4xl"></i>
                                    </a> 
                                    <a href="https://instagram.com/vnochlea" target="_blank" class="text-dark hover:text-gray-600 transition-colors"> 
                                        <i class="fab fa-instagram text-4xl"></i>
                                    </a> 
                                    <a href="https://linkedin.com/in/imadaqilmj" target="_blank" class="text-dark hover:text-gray-600 transition-colors"> 
                                        <i class="fab fa-linkedin text-4xl"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
