# Panduan Deployment Docker - Penerimaan Karyawan (Fix)

Dokumen ini berisi panduan untuk mendeploy dan menjalankan aplikasi **Penerimaan Karyawan** menggunakan Docker, dengan konfigurasi hot-reload menggunakan Vite yang disesuaikan berdasarkan referensi project `greenhouse_fresh`.

---

## 1. Struktur File Docker & Vite

Project ini telah ditambahkan file-file berikut untuk deployment:
*   **`Dockerfile`**: Image PHP 8.5.6 Apache dengan extension yang dibutuhkan Laravel dan Node.js/npm.
*   **`docker-compose.yml`**: Orkestrasi container untuk web server (`penerimaan-karyawan-app`) dan database server (`penerimaan-karyawan-db` menggunakan MySQL 8.0).
*   **`vite.config.js`**: Konfigurasi Vite yang mendukung mode lokal maupun Tunnel/Domain HTTPS (HMR).

---

## 2. Persiapan Sebelum Menjalankan

### Konfigurasi `.env`
Salin `.env.example` ke `.env` jika belum ada, lalu sesuaikan konfigurasi database agar terhubung ke container database Docker:

```env
DB_CONNECTION=mysql
DB_HOST=penerimaan-karyawan-db
DB_PORT=3306
DB_DATABASE=db_penerimaan_karyawan
DB_USERNAME=root
DB_PASSWORD=root
```

---

## 3. Langkah-Langkah Menjalankan Aplikasi

### Langkah A: Build dan Jalankan Container
Jalankan perintah berikut pada terminal di folder root project (`Penerimaan_karyawan_fix`):

```bash
docker-compose up -d --build
```
*   `penerimaan-karyawan-app` akan berjalan di port **8001** (dapat diakses di `http://localhost:8001`).
*   `penerimaan-karyawan-db` akan berjalan di port internal `3306` dan diexpose ke host di port **3307**.

### Langkah B: Instalasi Dependensi di dalam Container
Setelah container berjalan, masuk ke dalam container app untuk melakukan instalasi composer dan key generator:

```bash
# Masuk ke terminal container
docker-compose exec app bash

# Di dalam container, jalankan:
composer install
php artisan key:generate
php artisan storage:link
```

### Langkah C: Migrasi Database & Import SQL
Jika Anda ingin menggunakan database default dari file `db_penerimaan_karyawan.sql` yang sudah tersedia:

```bash
# Jalankan perintah mysql import dari host ke database container
docker exec -i penerimaan-karyawan-db mysql -u root -proot db_penerimaan_karyawan < db_penerimaan_karyawan.sql
```

Atau jika ingin menjalankan migrasi Laravel dari awal:
```bash
docker-compose exec app php artisan migrate
```

---

## 4. Menjalankan Vite (Frontend Assets)

Untuk compile assets dan mendukung hot-reloading (HMR):

### Mode Pengembangan (Development)
```bash
# Menjalankan Vite server secara hot-reload
docker-compose exec app npm run dev
```

### Mode Produksi (Production Build)
```bash
# Melakukan build aset frontend untuk produksi
docker-compose exec app npm run build
```

---

## 5. Konfigurasi Tunnel / Domain Mode (HMR)

`vite.config.js` secara dinamis mendeteksi jika aplikasi berjalan di bawah domain tunnel `muu.my.id`. Jika dideploy ke domain tunnel tersebut, HMR akan berjalan di bawah:
*   **Host**: `penerimaan-karyawan-vite.muu.my.id`
*   **Protocol**: `wss` (WebSocket Secure / port 443)

Jika berjalan di lokal (`localhost`), Vite akan menggunakan protocol standar `ws` pada port `5175`.
