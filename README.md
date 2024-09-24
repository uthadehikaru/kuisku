# KuisKu Online

KuisKu Online adalah aplikasi web berbasis Laravel untuk platform kuis online interaktif.

## Deskripsi

KuisKu Online adalah platform kuis interaktif yang memungkinkan pengguna untuk:

- Mengikuti berbagai kuis dari beragam topik
- Membuat dan mengelola kuis sendiri
- Melihat peringkat dan pencapaian
- Berinteraksi dengan pengguna lain melalui fitur sosial

Aplikasi ini dibangun menggunakan framework Laravel dan memanfaatkan fitur-fitur seperti:

- Livewire untuk interaksi real-time
- Eloquent ORM untuk manajemen database
- Blade templating engine
- Sistem autentikasi bawaan Laravel
- RESTful API

## Spesifikasi Kebutuhan

- PHP 8.1 atau lebih tinggi
- Composer
- MySQL 5.7 atau lebih tinggi
- Node.js dan NPM
- Web server (Apache atau Nginx)

## Instruksi Instalasi
1. Clone repositori:
   ```
   git clone https://github.com/uthadehikaru/kuisku.git
   ```

2. Masuk ke direktori proyek:
   ```
   cd kuisku
   ```

3. Instal dependensi PHP:
   ```
   composer install
   ```

4. Salin file .env.example menjadi .env:
   ```
   cp .env.example .env
   ```

5. Generate kunci aplikasi:
   ```
   php artisan key:generate
   ```

6. Konfigurasi database di file .env:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=kuisku_online
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. Jalankan migrasi database:
   ```
   php artisan migrate --seed
   ```

8. Buat symlink untuk penyimpanan:
   ```
   php artisan storage:link
   ```

9. Jalankan server development:
   ```
   php artisan serve
   ```

11. Buka `http://localhost:8000` di browser Anda untuk mengakses aplikasi.

## Demo

Silahkan cek demo aplikasi kami di [https://kuisku.zuhriutama.com](https://kuisku.zuhriutama.com)

email : admin@laravel.test
password : secret

## Konfigurasi Tambahan

Untuk konfigurasi lebih lanjut, silakan merujuk ke [dokumentasi Laravel](https://laravel.com/docs).

## Lisensi

Proyek ini adalah perangkat lunak open-source yang dilisensikan di bawah [lisensi MIT](https://opensource.org/licenses/MIT).
