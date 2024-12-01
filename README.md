# PerumKita (Portal Perumahan Warga)

PerumKita adalah aplikasi web berbasis Laravel yang dirancang untuk memfasilitasi komunikasi dan pengelolaan perumahan warga. Aplikasi ini menyediakan fitur-fitur seperti pengaduan warga, pemesanan layanan, informasi acara, dan portal berita komunitas.

## Fitur Utama

- **Pengaduan Warga:** Fitur untuk warga melaporkan masalah atau keluhan yang dialami di lingkungan perumahan.
- **Layanan Warga:** Fitur untuk mengakses berbagai layanan seperti kantin, galeri, dan jadwal sholat.
- **Portal Berita Komunitas:** Berita dan artikel yang berkaitan dengan komunitas perumahan.

## Instalasi

1. Clone repositori ini:

    ```bash
    git clone https://github.com/username/perumkita.git
    cd perumkita
    ```

2. Instal dependensi menggunakan Composer:

    ```bash
    composer install
    ```

3. Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi:

    ```bash
    cp .env.example .env
    ```

4. Generate key aplikasi:

    ```bash
    php artisan key:generate
    ```

5. Atur konfigurasi database di file `.env`:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=perumkita
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Jalankan migrasi database:

    ```bash
    php artisan migrate
    ```

7. Jalankan seeder untuk data awal (opsional):

    ```bash
    php artisan db:seed
    ```

8. Jalankan server pengembangan:

    ```bash
    php artisan serve
    ```

## Penggunaan

- Akses aplikasi di `http://localhost:8000`
- Daftar sebagai pengguna dan masuk untuk menggunakan fitur-fitur aplikasi.

## Kontribusi

Kami menyambut kontribusi dari semua pihak. Silakan buat pull request atau ajukan isu untuk meningkatkan aplikasi ini.

## Kontak

Untuk pertanyaan atau dukungan, silakan hubungi kami di [imaqil.mj@gmail.com](mailto:imaqil.mj@gmail.com).

