@extends('layouts.base-app')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pt-6 pb-0 text-center">
                        <h1>Jadwal Sholat Hari Ini</h1>
                        <h5 id="time-display">{{ $timeNow->translatedFormat('d F Y H:i:s') }}</h5>
                    </div>
                    <div class="card-body px-6 mx-lg-4 mb-3">
                        <div class="table-responsive p-0">
                            @if (isset($error))
                                <p>{{ $error }}</p>
                            @else
                                <table id="prayer-times" class="table align-items-center mb-0 ">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xl font-weight-bolder opacity-7">
                                                Sholat</th>
                                            <th
                                                class="text-uppercase text-secondary text-xl font-weight-bolder opacity-7 ps-2">
                                                Jam</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Subuh</td>
                                            <td>{{ $prayerTimes['items'][0]['fajr'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Zuhur</td>
                                            <td>{{ $prayerTimes['items'][0]['dhuhr'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ashar</td>
                                            <td>{{ $prayerTimes['items'][0]['asr'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Maghrib</td>
                                            <td>{{ $prayerTimes['items'][0]['maghrib'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Isya</td>
                                            <td>{{ $prayerTimes['items'][0]['isha'] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function updateTime() {
        // Buat objek date baru
        var now = new Date();

        // Format waktu sesuai keinginan Anda
        var options = { 
            year: 'numeric', month: 'long', day: 'numeric', 
            hour: '2-digit', minute: '2-digit', second: '2-digit', 
            hour12: false 
        };
        var formattedTime = now.toLocaleDateString('id-ID', options);

        // Update elemen dengan id "time-display"
        document.getElementById('time-display').innerHTML = formattedTime;
    }

    // Update waktu setiap detik
    setInterval(updateTime, 1000);

    // Inisialisasi waktu saat halaman pertama kali dimuat
    updateTime();
</script>
@endsection