@extends('layouts.base-app')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h2>Jadwal Sholat Hari Ini</h2>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table id="prayer-times" class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xl font-weight-bolder opacity-7">Sholat</th>
                    <th class="text-uppercase text-secondary text-xl font-weight-bolder opacity-7 ps-2">Jam</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Data jadwal sholat akan dimasukkan di sini oleh JavaScript -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // API key untuk MuslimSalat
    const API_KEY = '';
    
    $.getJSON(`https://muslimsalat.com/london/daily.json?key=${API_KEY}&jsoncallback=?`, function (times) {
        console.log('Data API:', times); // Debug untuk memastikan data ter-load

        if (times && times.items) {
            $('#prayer-times tbody')
                .append('<tr><td>Fajr</td><td>' + times.items[0].fajr + '</td></tr>')
                .append('<tr><td>Dhuhr</td><td>' + times.items[0].dhuhr + '</td></tr>')
                .append('<tr><td>Asr</td><td>' + times.items[0].asr + '</td></tr>')
                .append('<tr><td>Maghrib</td><td>' + times.items[0].maghrib + '</td></tr>')
                .append('<tr><td>Isha</td><td>' + times.items[0].isha + '</td></tr>');

            $('h2').text('Jadwal Sholat Hari Ini di ' + times.title);
        } else {
            console.error('Data API tidak ditemukan atau format salah.');
        }
    }).fail(function(jqxhr, textStatus, error) {
        console.error("Request Failed: " + textStatus + ", " + error);
    });
</script>
@endpush
