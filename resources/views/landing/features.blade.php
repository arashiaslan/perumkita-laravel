@extends('auth.base-auth')
@section('content')
    <main class="main-content mt-0 ">
        <div class="page-header min-vh-100" style="background-image: url('{{asset('argon/assets/img/landing/landing-bg.jpg')}}'); background-attachment: fixed;">
            <div class="container my-7 animate__animated animate__fadeIn">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body">
                                <h2 class="card-title">App Features</h2>
                                <p class="card-text">
                                    PerumKita adalah solusi digital inovatif untuk mempermudah interaksi dan akses informasi bagi warga perumahan. Dengan fitur-fitur lengkap dan dirancang untuk kebutuhan komunitas, PerumKita memastikan pengalaman pengguna yang nyaman dan terstruktur. Berikut adalah rangkaian fitur unggulan kami:
                                </p>
                                <h4>1. Data Penduduk Perum</h4>
                                <img src="{{asset('images/user.png')}}" alt="edit user data" class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan admin untuk mengelola data penghuni perumahan, termasuk menambah, mengedit, dan menghapus data penghuni, serta melihat informasi pribadi setiap penghuni.
                                </p>
                                <ul>
                                    <li><strong>Tambah, edit, hapus data penghuni (Admin):</strong> Admin dapat menambahkan, mengedit, dan menghapus informasi data penghuni.</li>
                                    <li><strong>Lihat informasi pribadi setiap penghuni (Admin):</strong> Admin dapat mengakses dan meninjau informasi pribadi setiap penghuni perumahan.</li>
                                    <li><strong>Lihat profil pribadi (User):</strong> Penghuni dapat melihat profil pribadi mereka.</li>
                                </ul>
                                <h4>2. Jadwal Sholat</h4>
                                <img src="{{asset('images/solat.png')}}" alt="..." class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan admin untuk mengelola data penghuni perumahan, termasuk menambah, mengedit, dan menghapus data penghuni, serta melihat informasi pribadi setiap penghuni.
                                </p>
                                <ul>
                                    <li><strong>Tambah, edit, hapus data penghuni (Admin):</strong> Admin dapat menambahkan, mengedit, dan menghapus informasi data penghuni.</li>
                                    <li><strong>Lihat informasi pribadi setiap penghuni (Admin):</strong> Admin dapat mengakses dan meninjau informasi pribadi setiap penghuni perumahan.</li>
                                    <li><strong>Lihat anggota keluarga dan profil pribadi (User, opsional):</strong> Penghuni dapat melihat profil pribadi mereka dan anggota keluarganya (opsional).</li>
                                </ul>
                                <h4>3. Kantin Perum</h4>
                                <img src="{{asset('images/kantin.png')}}" alt="Kantin" class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan admin untuk mengelola data menu kantin perumahan, termasuk menambah, mengedit, dan menghapus data menu, serta memproses pesanan yang dibuat oleh warga.
                                </p>
                                <ul>
                                    <li><strong>Tambah, edit, hapus data menu (Admin):</strong> Admin dapat menambahkan, mengedit, dan menghapus menu.</li>
                                    <li><strong>Memproses pesanan (Admin):</strong> Admin dapat memproses pesanan yang dibuat oleh warga.</li>
                                    <li><strong>Lihat menu dan pesan sesuai jumlah dan harga(User):</strong> Penghuni dapat melihat menu dan memesan menu yang diinginkan berdasarkan jumlah dan harga.</li>
                                </ul>
                                <h4>4. Galeri Perum</h4>
                                <img src="{{asset('images/galeri.png')}}" alt="..." class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan admin untuk mengelola foto galeri perumahan, termasuk menambah, mengedit, dan menghapus foto galeri.
                                </p>
                                <ul>
                                    <li><strong>Tambah, edit, hapus Foto (Admin):</strong> Admin dapat menambahkan, mengedit, dan menghapus Foto.</li>
                                    <li><strong>Lihat foto yang dipost oleh admin di halaman Galeri (User):</strong> Penghuni dapat melihat foto yang dipost oleh admin di halaman Galeri.</li>
                                </ul>
                                <h4>5. Pengaduan Warga</h4>
                                <img src="{{asset('images/adu.png')}}" alt="..." class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan user untuk mengirim Pengaduan yang akan diproses oleh admin.
                                </p>
                                <ul>
                                    <li><strong>Lihat dan proses Pengaduan (Admin):</strong> Admin dapat melihat dan memproses Pengaduan yang dikirim oleh user.</li>
                                    <li><strong>Mengirim Pengaduan (User):</strong> Warga / User dapat mengirim Pengaduan kepada admin</li>
                                </ul>
                                <h4>6. Artikel dan Berita</h4>
                                <img src="{{asset('images/artikel.png')}}" alt="..." class="img-fluid shadow border-radius-lg my-3 w-50">
                                <p class="card-text">
                                    Fitur ini memungkinkan admin untuk mempost artikel yang dibuat oleh warga maupun admin.
                                </p>
                                <ul>
                                    <li><strong>Tambah, edit, hapus artikel (Admin):</strong> Admin dapat menambahkan, mengedit, dan menghapus artikel yang dibuat oleh warga maupun admin.</li>
                                    <li><strong>Baca artikel yang dipost oleh admin di halaman Artikel (User, opsional):</strong> Penghuni dapat membaca artikel yang dipost oleh admin di halaman Artikel.</li>
                                </ul>

                                <h4 class="mt-6 text-center">Insight Data Pengguna Perumahan</h4>
                                <p class="card-text text-center mb-4">
                                    Gambaran visual data statistik para pengguna aplikasi, termasuk status pesanan kantin, pengaduan, dan jumlah istri pengguna.
                                </p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div id="order-chart" style="width: 100%; height: 400px;"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="complaint-chart" style="width: 100%; height: 400px;"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div id="user-chart" style="width: 100%; height: 400px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>

<script>
    // Data dari backend
    const orderCounts = @json($orderCounts); // [pending, dibuat, dikirim, diterima, selesai]
    const complaintCounts = @json($complaintCounts); // [pending, proses, selesai]
    const userCounts = @json($userCounts); // [jumlah istri: 1, 2, 3]

    // 1. Chart Pesanan
    var orderChart = echarts.init(document.getElementById('order-chart'));
    var orderOption = {
        title: { text: 'Status Pesanan', left: 'center' },
        tooltip: { trigger: 'item' },
        legend: { bottom: 10 },
        series: [{
            name: 'Pesanan',
            type: 'pie',
            radius: '50%',
            data: [
                { value: orderCounts[0], name: 'Pending' },
                { value: orderCounts[1], name: 'Dibuat' },
                { value: orderCounts[2], name: 'Dikirim' },
                { value: orderCounts[3], name: 'Diterima' },
                { value: orderCounts[4], name: 'Selesai' }
            ]
        }]
    };
    orderChart.setOption(orderOption);

    // 2. Chart Pengaduan
    var complaintChart = echarts.init(document.getElementById('complaint-chart'));
    var complaintOption = {
        title: { text: 'Status Pengaduan', left: 'center' },
        tooltip: { trigger: 'item' },
        legend: { bottom: 10 },
        series: [{
            name: 'Pengaduan',
            type: 'pie',
            radius: '50%',
            data: [
                { value: complaintCounts[0], name: 'Pending' },
                { value: complaintCounts[1], name: 'Proses' },
                { value: complaintCounts[2], name: 'Selesai' }
            ]
        }]
    };
    complaintChart.setOption(complaintOption);

    // 3. Chart Statistik User
    var userChart = echarts.init(document.getElementById('user-chart'));
    var userOption = {
        title: { text: 'Statistik User (Jumlah Istri)', left: 'center' },
        tooltip: { trigger: 'item' },
        legend: { bottom: 10 },
        series: [{
            name: 'User',
            type: 'pie',
            radius: '50%',
            data: [
                { value: userCounts[0], name: '1 Istri' },
                { value: userCounts[1], name: '2 Istri' },
                { value: userCounts[2], name: '3 Istri' }
            ]
        }]
    };
    userChart.setOption(userOption);
</script>

@endsection