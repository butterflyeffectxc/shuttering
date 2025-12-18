# 📸 Shuttering

Shuttering is a photographer booking platform that connects users with professional photographers for various photography needs, ranging from personal photoshoots to special events.
The platform is designed with a strong focus on easy discovery, transparent booking, and efficient schedule management.

---

## 🚀 Key Feature

### 👤 User

- Registration & Login (including Google Login)
- Search photographers by:
  - Photographer name
  - Location
  - Photography type (Photo Types)
- Real-time filter & search (no need to press Enter)
- View photographer details
- Book photographers
- Submit ratings & reviews

### 📷 Photographer

- Photographer profile separated from user account
- Booking management (Confirm / Cancel)
- Security validation (only the assigned photographer can update booking status)

### 🛠 Admin

- Photographer verification
- Photographer management

### System

- Auto-cancel booking if not confirmed 3 days before the session date while still in `pending` status
- Booking cancellation restriction (cannot cancel on H-1)

---

## ⚙️ Technology Stack

- **Framework** : Laravel ^10.10
- **Language** : PHP ^8.1
- **Database** : MySQL
- **Frontend** : Blade Template, Bootstrap, JavaScript
- **Authentication** : Laravel Auth
- **Scheduler** : Laravel Task Scheduling

---

## 🗂 Database Structure

# Main Tables

- `users`
- `photographers` (relasi ke users)
- `photo_types`
- `bookings`
- `reviews`
- `catalogues`
- `photo_results`

# Supporting Tables

- `photographer_photo_type`
- `photo_results`

Core Relationship:

- User ➜ Photographer : One to One
  A user can have one photographer profile.
- Photographer ➜ Photo Types : Many to Many
  A photographer can have multiple photography specializations.
- User ➜ Booking ➜ Photographer : Many to One
  A user can create multiple bookings with different photographers.
- Booking ➜ Reviews : One to One
  Each booking can have only one review.
- Photographer ➜ Catalogues : One to Many
  A photographer can have multiple portfolio items.
- Booking ➜ Photo Results : One to Many
  A single booking can generate multiple final photo results.

---

## 🔎 Search & Filter Logic

- Search uses query string: ?search=
- Photo Type filter uses: ?type=
- Search and filter can be applied simultaneously
- Real-time search implemented using JavaScript + debounce

---

## ⭐ Rating System

- Rating uses star icons (1–5)
- Star state is automatically filled based on existing rating
- Ratings are stored in the `reviews` table

---

## ⏰ Auto Cancel Booking

A booking will automatically be marked as `canceled` if:

- Status is still `pending`
- The session date reaches 3 days before the booking date
- The photographer has not confirmed the booking

Implemented using a Laravel Command:

```
php artisan app:auto-cancel-pending-bookings
```

Executed automatically via Laravel Scheduler.

---

## 🖥 Running Scheduler (Windows)

Since this project runs on Windows, the scheduler is executed using Windows **Task Scheduler** with the following command:

```
php path/to/artisan schedule:run
```

---

## 🧪 Validasi & Keamanan

- Photographers can only modify their own bookings
- Booking cancellation is restricted (cannot cancel on H-1)
- Request validation handled using Laravel Validator

---

## 📦 Project Installation

1. Clone the repository

```
git clone https://github.com/butterflyeffectxc/shuttering.git
```

2. Install dependency

```
composer install
```

3. Copy environment

```
cp .env.example .env
```

4. Generate key

```
php artisan key:generate
```

5. Migrasi database

```
php artisan migrate
```

6. Jalankan server

```
php artisan serve
```

---

## 📝 Development Notes

This project was developed as:
- A photographer booking platform
- A case study for database relationships & Laravel business logic
- An implementation of real-time UX (search, filter, wishlist)

---

## 👩‍💻 Author

**Shuttering**
Developed by _Munaa Raudhatul Jannah_

---

✨ Feel. Frame. Repeat.

<!-- Indonesia -->

# 📸 Shuttering

Shuttering adalah platform pemesanan fotografer yang menghubungkan **user** dengan **photographer profesional** untuk berbagai kebutuhan fotografi, mulai dari personal photoshoot hingga event khusus. Platform ini dirancang dengan fokus pada kemudahan pencarian, transparansi booking, dan manajemen jadwal yang efisien.

---

## 🚀 Fitur Utama

### 👤 User

- Registrasi & Login (termasuk Google Login)
- Pencarian fotografer berdasarkan:
  - Nama fotografer
  - Lokasi
  - Jenis fotografi (Photo Types)
- Filter & Search realtime (tanpa harus tekan Enter)
- Melihat detail fotografer
- Booking fotografer
- Memberi rating & review

### 📷 Photographer

- Profil fotografer terpisah dari user
- Manajemen booking (Confirm / Cancel)
- Validasi keamanan (hanya fotografer terkait yang bisa mengubah status booking)

### 🛠 Admin

- Verifikasi fotografer
- Manajemen fotografer

### System

- Auto-cancel booking jika tidak dikonfirmasi h-3 sebelum hari booking jika masih berstatus `pending`
- Pembatasan cancel booking (tidak bisa H-1)

---

## ⚙️ Teknologi yang Digunakan

- **Framework** : Laravel ^10.10
- **Language** : PHP ^8.1
- **Database** : MySQL
- **Frontend** : Blade Template, Bootstrap, JavaScript
- **Authentication** : Laravel Auth
- **Scheduler** : Laravel Task Scheduling

---

## 🗂 Struktur Database

# Tabel Utama

- `users`
- `photographers` (relasi ke users)
- `photo_types`
- `bookings`
- `reviews`
- `catalogues`
- `photo_results`

# Tabel Pendukung

- `photographer_photo_type`
- `photo_results`

Relasi utama:

- User ➜ Photographer : One to One
  Satu user dapat memiliki satu profil photographer.
- Photographer ➜ Photo Types : Many to Many
  Photographer dapat memiliki lebih dari satu spesialisasi fotografi.
- User ➜ Booking ➜ Photographer : Many to One
  User dapat membuat banyak booking ke photographer yang berbeda.
- Booking ➜ Reviews : One to One
  Satu booking hanya dapat memiliki satu review.
- Photographer ➜ Catalogues : One to Many
  Photographer dapat memiliki banyak item portofolio.
- Booking ➜ Photo Results : One to Many
  Satu booking dapat menghasilkan beberapa file foto hasil akhir

---

## 🔎 Search & Filter Logic

- Search menggunakan query string `?search=`
- Filter Photo Type menggunakan `?type=`
- Search & Filter dapat berjalan **bersamaan**
- Realtime search menggunakan JavaScript + debounce

---

## ⭐ Rating System

- Rating menggunakan icon bintang (1–5)
- State bintang otomatis terisi sesuai rating sebelumnya
- Disimpan dalam tabel `reviews`

---

## ⏰ Auto Cancel Booking

Booking akan otomatis berubah menjadi `canceled` jika:

- Status masih `pending`
- Tanggal sesi sudah memasuki **H-3**
- Photographer belum melakukan konfirmasi

Menggunakan Laravel Command:
```
php artisan app:auto-cancel-pending-bookings
```
Dijalankan otomatis melalui Laravel Scheduler.

---

## 🖥 Menjalankan Scheduler (Windows)

Karena project berjalan di Windows, scheduler dijalankan menggunakan **Task Scheduler** dengan command:
```
php path/to/artisan schedule:run
```
---

## 🧪 Validasi & Keamanan

- Photographer hanya bisa mengubah booking miliknya
- Cancel booking dibatasi (tidak bisa H-1)
- Validasi request menggunakan Laravel Validator

---

## 📦 Instalasi Project

1. Clone repository

```
git clone https://github.com/butterflyeffectxc/shuttering.git
```

2. Install dependency

```
composer install
```

3. Copy environment

```
cp .env.example .env
```

4. Generate key

```
php artisan key:generate
```

5. Migrasi database

```
php artisan migrate
```

6. Jalankan server

```
php artisan serve
```

---

## 📝 Catatan Pengembangan

Project ini dikembangkan sebagai:

- Platform booking fotografer
- Studi kasus relasi database & business logic Laravel
- Implementasi real-time UX (search, filter, wishlist)

---

## 👩‍💻 Author

**Shuttering**
Developed by _Munaa Raudhatul Jannah_

---

✨ Feel. Frame. Repeat.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Perkembangan ke Depannya
[  ] auto alert informasi tanda conrfirm pass ga matching (js)
[  ] kolom password, buat checklist semua udh terpenuhi (js)
[  ] saat upload foto, progress uploading (js)
[  ] info sizenya kurang dan penting, maksimumnya ga keliatan, yg udh masuk brp belom ada (admin hrus tau) - 8 mb per foto - bisa dibikin monetisasi 
[  ] email already taken hrusnya sebelum pencet register.
[  ] kenapa tagging yg kategori fotografer *tanya aja* (select option)
[  ] kenapa ga kalender aja, user nya hrusnya tau juga biar tau availability fotografernya. dashboard kalender.
[  ] role admin gabole gitu, terpisah dari login page public, harusnya ditambahain dsb, superadmin + admin, databasenya dikasi flag first user
[  ] admin bisa kelola photo type