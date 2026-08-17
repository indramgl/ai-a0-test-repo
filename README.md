# 🏫 Website Sekolah

Aplikasi **Sistem Informasi Website Sekolah** berbasis web yang dibangun dengan **Laravel**, **PostgreSQL**, **Tailwind CSS**, dan **FrankenPHP**. Aplikasi ini menyediakan halaman publik (beranda, berita, statistik), modul **PPDB** (Penerimaan Peserta Didik Baru), sistem autentikasi, serta **Dashboard Admin**.

---

## ✨ Fitur Utama

### Halaman Publik
- **Beranda (`/`)**
  - Hero banner statis dengan teks selamat datang
  - Sambutan Kepala Sekolah
  - Grid 3 kolom **Berita Terbaru** (diambil dari tabel `posts`)
  - Bagian **Statistik** (jumlah siswa, guru, dan pendaftar PPDB)
  - Footer berisi alamat, navigasi cepat, dan hak cipta
- **Navbar responsif** — logo kiri, menu kanan, tombol **Login**, dan *hamburger menu* untuk mobile

### Modul PPDB (`/ppdb`)
- Form pendaftaran dengan input:
  - Nama Lengkap
  - NISN
  - Asal Sekolah
  - Nama Orang Tua
  - Nomor Telepon / WhatsApp
- Validasi otomatis Laravel dengan tampilan error bawaan
- Nomor pendaftaran otomatis dibuat (format `PPDB-YYYYMMDD-XXXXXX`)
- Status awal pendaftaran: `pending`

### Autentikasi
- Halaman **Login** (`/login`) dengan email & password
- Middleware `auth` untuk melindungi halaman admin
- Logout (`POST /logout`)
- Role pengguna: `admin`, `guru`, `siswa`

### Dashboard Admin (`/admin/dashboard`)
- Kartu statistik:
  - Total Pendaftar PPDB
  - Total Berita
  - Total Guru
  - Total Siswa
- Tabel **Pendaftar Terbaru** (5 data terakhir dengan status)

---

## 🧱 Tech Stack

| Komponen | Teknologi |
| --- | --- |
| Backend | Laravel (PHP 8.4+ / 8.2+) |
| Database | PostgreSQL (default konfigurasi) |
| Frontend | Blade + Tailwind CSS + Vite |
| Web Server | FrankenPHP (Caddy) — opsional via Docker |
| Container | Docker + docker-compose |

---

## 📁 Struktur Proyek

```
website_sekolah/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php        # Halaman beranda
│   │   ├── RegistrationController.php # Modul PPDB (create & store)
│   │   ├── AdminController.php       # Dashboard admin
│   │   └── LoginController.php       # Autentikasi (show, store, logout)
│   └── Models/
│       ├── User.php                  # + relasi teacher(), helper role
│       ├── Post.php
│       ├── Teacher.php               # + relasi user()
│       └── Registration.php
├── database/migrations/
│   ├── 0001_01_01_000000_create_users_table.php   # + kolom role
│   ├── 0001_01_01_000001_create_cache_table.php
│   ├── 0001_01_01_000002_create_jobs_table.php
│   ├── 2026_08_16_204700_create_posts_table.php
│   ├── 2026_08_16_204800_create_teachers_table.php
│   └── 2026_08_16_204900_create_registrations_table.php
├── resources/views/
│   ├── layouts/app.blade.php         # Layout utama (navbar, footer)
│   ├── home.blade.php                # Beranda
│   ├── login.blade.php               # Halaman login
│   ├── ppdb/register.blade.php       # Form PPDB
│   └── admin/dashboard.blade.php     # Dashboard admin
├── routes/web.php                    # Semua route
├── tailwind.config.js
├── vite.config.js
├── Caddyfile                         # Config FrankenPHP
├── Dockerfile                        # Image FrankenPHP + PHP extensions
└── docker-compose.yml                # Orchestrasi app + PostgreSQL
```

---

## 🗄️ Skema Database

### Tabel `users`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| id | bigint PK | |
| name | string | |
| email | string UNIQUE | |
| password | string | (ter-hash otomatis) |
| role | string | `admin` / `guru` / `siswa` (default `siswa`) |
| timestamps | | |

### Tabel `posts`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| id | bigint PK | |
| title | string | |
| slug | string UNIQUE | |
| content | text | |
| image | string nullable | |
| category | string nullable | |
| status | string | default `published` |
| timestamps | | |

### Tabel `teachers`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| id | bigint PK | |
| user_id | FK → users.id | cascade on delete |
| nip | string UNIQUE | |
| name | string | |
| subject | string | |
| photo | string nullable | |
| timestamps | | |

### Tabel `registrations`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| id | bigint PK | |
| registration_number | string UNIQUE | nomor otomatis |
| full_name | string | |
| nisn | string | |
| previous_school | string | |
| parent_name | string | |
| phone | string | |
| status | string | `pending` / `accepted` / `rejected` (default `pending`) |
| timestamps | | |

### Relasi Eloquent
- `User` **hasOne** `Teacher` (a: `User::teacher()`)
- `Teacher` **belongsTo** `User` (a: `Teacher::user()`)
- Helper role di `User`: `isAdmin()`, `isGuru()`, `isSiswa()`

---

## 🚀 Instalasi

### Prasyarat
- PHP 8.2+ (disarankan 8.4) dengan ekstensi: `mbstring`, `xml`, `curl`, `pgsql` (atau `sqlite`), `zip`, `gd`
- Composer
- Node.js + npm
- PostgreSQL (opsional; bisa pakai Docker)

### Langkah Instalasi (Lokal)

```bash
# 1. Masuk direktori proyek
cd website_sekolah

# 2. Install dependensi PHP
composer install

# 3. Salin konfigurasi environment
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Sesuaikan .env untuk database (contoh PostgreSQL)
#    DB_CONNECTION=pgsql
#    DB_HOST=127.0.0.1
#    DB_PORT=5432
#    DB_DATABASE=school_website
#    DB_USERNAME=postgres
#    DB_PASSWORD=postgres

# 6. Jalankan migrasi database
php artisan migrate

# 7. Install & build frontend assets (Tailwind CSS)
npm install
npm run build
#    Saat pengembangan: npm run dev

# 8. Jalankan server lokal
php artisan serve
```

Akses aplikasi di **http://127.0.0.1:8000**.

---

## 🐳 Menjalankan dengan Docker (FrankenPHP + PostgreSQL)

Proyek sudah menyertakan `Dockerfile`, `Caddyfile`, dan `docker-compose.yml`.

```bash
docker compose up -d --build
```

- **Aplikasi web**: http://localhost (port 80/443)
- **PostgreSQL**: port `5432`, database `school_website`, user/password `postgres`/`postgres`
- Volume `pgdata` untuk persistensi data

> Catatan: Di dalam komposisi, `DB_HOST` mengarah ke service `db`, bukan `127.0.0.1`.

---

## 🧪 Pengujian

```bash
# Jalankan seluruh test suite (PHPUnit)
php artisan test
# atau
vendor/bin/phpunit
```

Smoke test manual:
- `GET /` → beranda (200)
- `GET /ppdb` → form PPDB (200)
- `GET /login` → halaman login (200)
- `GET /admin/dashboard` → redirect ke login (302) jika belum autentikasi
- `POST /ppdb` → menyimpan data & redirect (302)

---

## 🧭 Daftar Route (`routes/web.php`)

| Method | URI | Nama | Controller@Method | Auth |
| --- | --- | --- | --- | --- |
| GET | `/` | `home` | `HomeController@index` | |
| GET | `/login` | `login` | `LoginController@show` | |
| POST | `/login` | `login.store` | `LoginController@store` | |
| POST | `/logout` | `logout` | `LoginController@logout` | auth |
| GET | `/ppdb` | `ppdb.create` | `RegistrationController@create` | |
| POST | `/ppdb` | `ppdb.store` | `RegistrationController@store` | |
| GET | `/admin/dashboard` | `admin.dashboard` | `AdminController@index` | auth |

---

## 🔐 Keamanan
- Password di-hash otomatis oleh Laravel (`password` cast `hashed`)
- `@csrf` dipakai pada semua form POST
- Middleware `auth` melindungi area admin
- File `.env` dan `.a0proj/` tidak diikutkan pada version control (`.gitignore`)

---

## 📄 Lisensi
Proyek ini dibangun sebagai aplikasi open-source dengan lisensi **MIT**.
