# resepin.id – Platform Resep Masakan Online
**Deskripsi Aplikasi**	: Resepin.id adalah aplikasi berbasis web yang membantu pengguna dalam mencari dan mengelola resep masakan dengan cara yang sederhana. Melalui aplikasi ini, pengguna dapat menemukan resep berdasarkan bahan yang mudah diperoleh atau jenis makanan yang diinginkan. Selain itu, terdapat pula fitur panduan langkah demi langkah agar proses memasak lebih terarah, dilengkapi dengan deskripsi waktu memasak dan informasi nilai gizi per porsi. Tujuan utama aplikasi ini adalah untuk memudahkan pengguna dalam menemukan inspirasi memasak secara praktis dan efisien.

**Target User**		: 
- Mahasiswa / anak kos yang ingin masak cepat dan irit bahan.
- IRT yang butuh ide menu harian.
- Pemasak Pemula yang butuh panduan step-by-step agar tidak salah langkah memasak.
- Food Enthusiast yang suka berbagi resep dan terhubung sama komunitas masak.

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=flat\&logo=laravel\&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat\&logo=php\&logoColor=white)
![PostgreSQL](https://img.shields.io/badge/PostgreSQL-Supabase-316192?style=flat\&logo=postgresql\&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4.x-7952B3?style=flat\&logo=bootstrap\&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green.svg)

*resepin.id* adalah aplikasi web untuk menampilkan dan mengelola *resep makanan* – mulai dari masakan rumahan sederhana sampai hidangan khas Nusantara.
Website ini dirancang sebagai katalog resep yang rapi, interaktif, dan mudah diakses, dengan fitur:

* Like ❤
* Komentar 💬
* Pemberian rating ⭐
* Kritik & saran 📝
* Authentication (login/register) 🔐
* CRUD resep & data pendukung lewat dashboard admin 🛠

---

## Daftar Isi

* [Fitur Utama](#fitur-utama)
* [Tech Stack](#tech-stack)
* [Persyaratan Sistem](#persyaratan-sistem)
* [Instalasi](#instalasi)
* [Konfigurasi](#konfigurasi)
* [Role & Permissions](#role--permissions)
* [Fitur Berdasarkan Role](#fitur-berdasarkan-role)
* [Screenshot](#screenshot)
* [Struktur Database](#struktur-database)
* [User Flow](#user-flow)
* [Penggunaan](#penggunaan)
* [Deployment](#deployment)
* [Lisensi](#lisensi)
* [Status](#status)

---

## Fitur Utama

### 1. Manajemen Resep

* ✅ *Unggah Resep*
  Pengguna dapat mengunggah resep lengkap: judul, deskripsi, kategori, bahan, langkah memasak, waktu memasak, tingkat kesulitan, dan foto/thumbnail.

* ✅ *Draft & Publikasi*
  Resep dapat:

  * Disimpan sebagai draft untuk diperbaiki nanti
  * Dipublikasikan agar tampil di halaman utama (Admin / Author)

* ✅ *Verifikasi Resep*
  Resep dari user tertentu (misalnya pengunjung atau kontributor) dapat di-review dan diverifikasi oleh *Admin* sebelum tayang, untuk menjaga kualitas konten.

* ✅ *Detail Resep Lengkap*
  Setiap resep berisi:

  * Judul, slug URL
  * Thumbnail
  * Deskripsi singkat
  * Bahan-bahan
  * Langkah memasak
  * Waktu memasak & porsi
  * Kategori & tag
  * Rating rata-rata
  * Jumlah like dan views
  * Nama & profil pembuat resep

* ✅ *Soft Delete*
  Resep tidak langsung hilang saat dihapus. Data dipindahkan ke trash sehingga bisa di-restore sewaktu-waktu.

---

### 2. Sistem Interaksi Pengguna

* ✅ *Like Resep*
  Pengguna terautentikasi bisa memberikan like pada resep sebagai bentuk apresiasi.
  Setiap user hanya bisa like sekali per resep (tidak bisa spam).

* ✅ *Komentar & Diskusi*
  Pengunjung dapat memberikan komentar:

  * Tanya jawab teknik memasak
  * Berbagi tips tambahan
  * Review hasil memasak dari resep tersebut

* ✅ *Pemberian Rating (⭐)*
  Pengguna bisa memberikan rating (misalnya skala 1–5 bintang) untuk setiap resep.
  Rating yang masuk akan dihitung menjadi rating rata-rata dan ditampilkan di halaman detail resep.

* ✅ *Kritik & Saran*
  Tersedia halaman/form *kritik & saran*:

  * Masukan terkait fitur website
  * Saran perbaikan konten
  * Laporan bug/masalah tampilan

* ✅ *Moderasi Komentar*
  Admin dapat:

  * Menyembunyikan komentar yang tidak pantas
  * Menghapus komentar yang melanggar etika

* ✅ *Enable/Disable Comments*
  Creator/Author atau Admin dapat:

  * Mengaktifkan/menonaktifkan komentar pada resep tertentu

---

### 3. Manajemen Konten

* ✅ *CRUD Resep (Posts)*

  * Create, Read, Update, Delete resep
  * Set resep sebagai featured (misalnya: “Resep Pilihan” atau “Rekomendasi Minggu Ini”)

* ✅ *CRUD Categories*
  Contoh kategori:

  * Makanan Nusantara, Dessert, Minuman, Camilan, Sarapan, dll.
    Admin dapat:
  * Menambah, mengedit, menghapus kategori
  * Mengatur status kategori (active/inactive)

* ✅ *CRUD Tags*
  Tag bisa digunakan untuk tema seperti:

  * #pedas, #manis, #sehat, #diet, #rumahan, dll.

* ✅ *CRUD Comments*
  Admin dapat:

  * Menghapus komentar (soft delete)
  * Restore komentar yang pernah dihapus

* ✅ *CRUD Users (Admin Only)*

  * Membuat akun baru dengan role tertentu
  * Mengubah data user
  * Menonaktifkan user yang melanggar aturan

---

### 4. Dashboard & Analytics

* ✅ *Dashboard Admin*
  Menampilkan statistik ringkas:

  * Total resep
  * Total komentar
  * Total users
  * Total kategori
  * Total feedback/kritik-saran

* ✅ *Dashboard Author (jika digunakan)*
  Menampilkan:

  * Jumlah resep yang sudah dibuat
  * Total komentar di resep pribadi
  * Statistik views & like per resep

* ✅ *Real-time/Updated Statistics*

  * Penghitungan views resep
  * Total like
  * Rata-rata rating

---

### 5. Fitur Modern

* ✅ *Responsive Design*
  Tampilan nyaman di HP, tablet, dan desktop.

* ✅ *Clean UI/UX*
  Fokus pada keterbacaan:

  * Bahan & langkah memasak mudah di-scan
  * Tombol aksi (like, rating, komentar) jelas terlihat

* ✅ *Search & Filter*
  Pengguna bisa mencari resep berdasarkan:

  * Judul
  * Kategori
  * Tag

* ✅ *SEO Friendly*

  * URL menggunakan slug: /recipes/nasi-goreng-rumahan
  * Meta title & description bisa dikustomisasi

* ✅ *Profile Management*
  User bisa mengatur:

  * Nama
  * Foto profil
  * Bio singkat (misal: “Suka masak makanan pedas”)

* ✅ *Authentication & Password Security*

  * Register, login, logout
  * Validasi password
  * Ganti password via halaman Settings

---

## Tech Stack

### Backend

* *Laravel 10.x* – Framework PHP modern
* *PHP 8.2+*
* *PostgreSQL (via Supabase) / MySQL* – Database utama
* *RESTful Controller* pattern untuk routing & logic
* (Opsional) Token-based auth / session-based auth

### Frontend

* *HTML5, CSS3*
* *Bootstrap 4.x* – Layout & komponen UI
* *jQuery / Vanilla JS* – Interaksi dasar
* *Axios / fetch* – AJAX untuk like, rating, komentar (jika dibuat dinamis)

### Tools Pengembangan

* Composer – PHP dependency manager
* NPM – Mengelola paket frontend
* Laravel Artisan – CLI untuk migration, seeder, dsb.
* PhpUnit – Testing dasar

---

## Persyaratan Sistem

* PHP >= 8.2
* PostgreSQL >= 12 atau MySQL >= 8.0
* Composer
* Node.js >= 18 & NPM
* Web server (Apache/Nginx)
* Ekstensi PHP:

  * pdo_pgsql / pdo_mysql
  * mbstring
  * openssl
  * xml
  * ctype
  * json
  * bcmath
  * fileinfo
  * hash
  * session

---

## Instalasi

### 1. Clone Repository

bash
git clone https://github.com/username/resepinid.git
cd resepinid


### 2. Install Dependencies

bash
# PHP dependencies
composer install

# Frontend dependencies
npm install


### 3. Setup Environment

bash
cp .env.example .env
php artisan key:generate


### 4. Konfigurasi Database

Di file .env:

env
DB_CONNECTION=pgsql
DB_HOST=aws-1-ap-southeast-2.pooler.supabase.com
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres.xxxxx
DB_PASSWORD="password_resepin"
PGSQL_ATTR_SSLMODE=require


(Sesuaikan dengan kredensial Supabase / DB yang digunakan.)

### 5. Migrasi & Seeder

bash
php artisan migrate --seed
# atau
php artisan migrate:fresh --seed


### 6. Storage Link

bash
php artisan storage:link


### 7. Build Assets

bash
# mode development
npm run dev

# mode production
npm run build


### 8. Jalankan Aplikasi

bash
php artisan serve


Akses melalui: http://localhost:8000

---

## Konfigurasi

### Konfigurasi Aplikasi

env
APP_NAME=resepin.id
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000


### Session

env
SESSION_DRIVER=file
SESSION_LIFETIME=120
SESSION_PATH=/
SESSION_DOMAIN=null


### Cache

env
CACHE_STORE=file
CACHE_DRIVER=file


### Konfigurasi Email (Opsional)

Untuk fitur kritik & saran atau notifikasi tertentu:

env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@resepin.id
MAIL_FROM_NAME="resepin.id"


---

## Role & Permissions

Minimal terdapat 2 role:

| Role              | Deskripsi                                  |
| ----------------- | ------------------------------------------ |
| *Admin*         | Pengelola penuh sistem & konten            |
| *User* / Author | Pengguna yang bisa mengelola resep pribadi |

(Opens untuk ditambah: Visitor tanpa login hanya bisa lihat & baca.)

---

## Fitur Berdasarkan Role

### Admin

*Dashboard*

* 📊 Ringkasan:

  * Total resep
  * Total komentar
  * Total users
  * Total kategori
  * Feedback masuk

*Manajemen Resep*

* View semua resep
* Create resep baru
* Edit resep (semua user)
* Delete (soft delete)
* Restore dari trash
* Set featured
* Mengatur status (draft/published)

*Manajemen Komentar*

* Lihat semua komentar
* Hapus komentar yang melanggar
* Restore komentar

*Manajemen Kategori & Tag*

* Tambah, edit, hapus kategori
* Tambah, edit, hapus tag
* Lihat jumlah resep per kategori/tag

*Manajemen Users*

* Tambah user baru
* Ubah role user
* Nonaktifkan akun tertentu

*Settings*

* Ubah profile admin
* Ganti password

---

### User / Author
**UserFlow Diagram**

![User Flow](/doc/UserFlow/CreateResep.png)
![User Flow](/doc/UserFlow/DeleteResep.png)
![User Flow](/doc/UserFlow/UpdateResep.png)
![User Flow](/doc/UserFlow/LoginAdmin.png)
![User Flow](/doc/UserFlow/LoginUser.png)

*Dashboard*

* Lihat ringkasan resep pribadi
* Cek jumlah views, like, dan rating

*Manajemen Resep*

* Buat resep baru
* Edit resep pribadi
* Hapus resep pribadi (soft delete)
* Restore resep pribadi

*Interaksi*

* Memberi like pada resep
* Memberi rating resep
* Berkomentar pada resep

*Settings*

* Ubah profil
* Ganti password

---
✅ Wireframe / Mockup 

**Home Page**
![Wireframe](/doc/Wireframe/Home.png)
Halaman ini menunjukkan tampilan awal yang diliat pengguna. Pengguna bisa mencari resep, melihat bahan - bahan masakan dan makanan yang sedang populer. 

**Fitur Save Resep**
![Wireframe](/doc/Wireframe/Save.png)
Halaman ini menunjukkan tampilan pengguna yang bisa menyimpan resep

**Fitur Like dan Komen**
![Wireframe](/doc/Wireframe/LikeKomen.png)
Halaman ini menunjukkan tampilan pengguna yang bisa melihat jumlah like dan komen di postingan resep lain

**Fitur Home Page Admin**
![Wireframe](/doc/Wireframe/DashboardAdmin.png)
Halaman ini menunjukkan tampilan awal halaman admin. Admin bisa menambahkan dan mengelola resep yang nantinya akan dilihat oleh pengguna. 

## Screenshot
SCREENSHOT
![Wireframe](/doc/homepage.png)
![Wireframe](/doc/homepage1.png)
![Wireframe](/doc/homepage2.png)
![Wireframe](/doc/kontak.png)
![Wireframe](/doc/kontak1.png)
![Wireframe](/doc/kritiksaran.png)
![Wireframe](/doc/resep.png)
![Wireframe](/doc/resep1.png)
![Wireframe](/doc/resepdetail.png)
![Wireframe](/doc/tentang.png)
![Wireframe](/doc/tentang1.png)

---

## Struktur Database


### Entity Relationship Diagram

✅ Database Schema Design 
![Schema DB](/doc/database/erd_resep_makanan.png)

> ERD menampilkan relasi utama antara: users, recipes, categories, tags, comments, likes, ratings, feedback.

### Tabel Utama

#### 1. users

| Field      | Type         | Keterangan           |
| ---------- | ------------ | -------------------- |
| id         | BIGINT (PK)  | Primary key          |
| name       | VARCHAR(100) | Nama pengguna        |
| email      | VARCHAR(100) | Email unik           |
| username   | VARCHAR(30)  | Username unik        |
| password   | VARCHAR(255) | Password terenkripsi |
| role       | ENUM         | admin, user          |
| status     | ENUM         | active, inactive     |
| created_at | TIMESTAMP    | Waktu dibuat         |
| updated_at | TIMESTAMP    | Waktu diperbarui     |

#### 2. recipes

| Field          | Type         | Keterangan                |
| -------------- | ------------ | ------------------------- |
| id             | BIGINT (PK)  | Primary key               |
| user_id        | BIGINT (FK)  | Relasi ke users           |
| category_id    | BIGINT (FK)  | Relasi ke categories      |
| title          | VARCHAR(255) | Judul resep               |
| slug           | VARCHAR(255) | URL-friendly slug         |
| description    | TEXT         | Deskripsi singkat         |
| ingredients    | TEXT         | Daftar bahan              |
| steps          | TEXT         | Langkah memasak           |
| cook_time      | INTEGER      | Waktu memasak (menit)     |
| servings       | INTEGER      | Jumlah porsi              |
| thumbnail      | VARCHAR(255) | Path gambar               |
| status         | ENUM         | draft, published          |
| views          | INTEGER      | Total views               |
| featured       | BOOLEAN      | Resep unggulan atau tidak |
| enable_comment | BOOLEAN      | Izinkan komentar          |
| deleted_at     | TIMESTAMP    | Soft delete               |
| created_at     | TIMESTAMP    | Waktu dibuat              |
| updated_at     | TIMESTAMP    | Waktu update              |

#### 3. categories

Mirip seperti KaryaSI tetapi konteks makanan (Makanan Berat, Dessert, Minuman, dll).

#### 4. tags

Untuk memberi label fleksibel: #pedas, #diet, dll.

#### 5. comments

Komentar terkait resep.

#### 6. likes

| Field      | Type        | Keterangan             |
| ---------- | ----------- | ---------------------- |
| id         | BIGINT (PK) | Primary key            |
| user_id    | BIGINT (FK) | User yang memberi like |
| recipe_id  | BIGINT (FK) | Resep yang di-like     |
| created_at | TIMESTAMP   | Waktu like             |

#### 7. ratings

| Field      | Type        | Keterangan               |
| ---------- | ----------- | ------------------------ |
| id         | BIGINT (PK) | Primary key              |
| user_id    | BIGINT (FK) | User yang memberi rating |
| recipe_id  | BIGINT (FK) | Resep yang dinilai       |
| rating     | INTEGER     | Nilai rating (1–5)       |
| created_at | TIMESTAMP   | Waktu rating             |

#### 8. feedback (kritik_saran)

| Field      | Type         | Keterangan                |
| ---------- | ------------ | ------------------------- |
| id         | BIGINT (PK)  | Primary key               |
| name       | VARCHAR(255) | Nama pengirim (opsional)  |
| email      | VARCHAR(255) | Email pengirim (opsional) |
| subject    | VARCHAR(255) | Judul/kategori feedback   |
| message    | TEXT         | Isi kritik & saran        |
| created_at | TIMESTAMP    | Waktu kirim               |

---

## User Flow

### Alur User Biasa

1. Buka website resepin.id
2. Jelajah daftar resep (berdasarkan kategori/tag)
3. Klik detail resep
4. Baca bahan & langkah
5. Jika login:

   * Like resep
   * Beri rating
   * Tulis komentar
6. Kirim kritik & saran melalui form khusus jika perlu

### Alur Admin

1. Login sebagai Admin
2. Cek statistik di dashboard
3. Kelola resep:

   * Tambah, edit, hapus, restore
   * Set featured
4. Moderasi komentar
5. Kelola kategori & tag
6. Kelola users
7. Cek feedback yang masuk

---

## Penggunaan

### Login Pertama

Setelah migrate --seed, login pakai akun default di seeder:

* *Admin*

  * Email & password lihat di database/seeders/DatabaseSeeder.php

* *User / Author*

  * Juga tersedia di seeder (untuk testing)

---

## Deployment

Aplikasi dapat dideploy pada:

* Shared hosting (cPanel)
* VPS
* Layanan seperti Biznet Gio / lainnya

Langkah umum:

1. Upload project ke server / pakai Git (deploy otomatis).
2. Jalankan composer install di server.
3. Jalankan php artisan migrate --force.
4. Set .env server (DB, APP_URL, dll).
5. Point domain ke folder public.

---

## Lisensi

Proyek ini menggunakan lisensi *MIT*.

---

## Status

* Pengembangan & deployment resepin.id berjalan
* Fitur utama: like, komentar, rating, kritik saran, auth, dan CRUD admin sudah menjadi fondasi konsep aplikasi

---

Developed with ❤ untuk para pecinta masak dan untuk orang yang kelaparan beneran.








