<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Clock\now;
use Carbon\Carbon;

class JadwalsholatController extends Controller
{
    public function index()
    {
        $timeNow = now();
        $apiKey = 'd7aa593a543ff48f1b175dd057531fde'; // Ganti dengan API Key Anda
        $city = 'bogor'; // Ganti dengan kota yang Anda inginkan
        $url = "https://muslimsalat.com/{$city}/daily.json?key={$apiKey}";

        // Ambil data dari API
        $response = Http::get($url);

        if ($response->successful()) {
            $prayerTimes = $response->json();
            return view('user.jadwal-sholat', compact('prayerTimes', 'timeNow'));
        } else {
            return view('user.jadwal-sholat')->with('error', 'Gagal mengambil jadwal sholat.');
        }
    }
}
