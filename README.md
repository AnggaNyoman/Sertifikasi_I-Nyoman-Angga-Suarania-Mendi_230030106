# 🏢 SIMAKO — Sistem Manajemen Anggota Koperasi

**SIMAKO (Sistem Manajemen Anggota Koperasi)** adalah aplikasi berbasis web yang digunakan untuk mengelola data anggota koperasi secara digital. Sistem ini menyediakan fitur pengolahan data anggota seperti menambah, menampilkan, mengubah, menghapus, serta mengekspor data anggota menjadi laporan.

Aplikasi ini dibangun menggunakan **PHP**, **MySQL**, **HTML**, **CSS**, dan **JavaScript** untuk mempermudah pengelolaan data anggota koperasi secara **terstruktur, cepat, dan efisien**.

---

# 📋 Daftar Isi

* 📖 Tentang Aplikasi
* 🚀 Fitur Utama
* 🛠 Teknologi yang Digunakan
* ⚙ Cara Menjalankan
* 📂 Struktur Folder
* 🔄 Alur Penggunaan
* 📜 Aturan Sistem
* 📊 Konsep Pemrograman
* 👨‍💻 Author

---

# 📖 Tentang Aplikasi

**SIMAKO** merupakan sistem informasi sederhana yang dirancang untuk membantu pengelolaan **data anggota koperasi secara digital**.

Dengan adanya sistem ini, pengolahan data anggota tidak lagi dilakukan secara manual sehingga:

* 📁 Data lebih **rapi dan terstruktur**
* 🔎 Proses pencarian data menjadi **lebih cepat**
* 🛡 Risiko kehilangan data dapat **dikurangi**
* 📊 Laporan anggota dapat dibuat **lebih mudah**

Aplikasi ini cocok digunakan sebagai:

* Sistem pengelolaan anggota koperasi skala kecil
* Media pembelajaran **CRUD menggunakan PHP dan MySQL**
* Contoh project **sistem informasi berbasis web**

---

# 🚀 Fitur Utama

## 🔐 Login Admin

Sistem dilengkapi dengan fitur login untuk memastikan hanya pengguna yang memiliki akses yang dapat menggunakan sistem.

## 📋 Manajemen Data Anggota

Menampilkan daftar seluruh anggota koperasi yang tersimpan dalam database.

## ➕ Tambah Data Anggota

Admin dapat menambahkan data anggota baru melalui form input.

## ✏️ Edit Data Anggota

Admin dapat memperbarui data anggota yang sudah tersimpan.

## ❌ Hapus Data Anggota

Admin dapat menghapus data anggota dari sistem.

## 🔍 Pencarian Data

Sistem menyediakan fitur pencarian untuk mempermudah menemukan data anggota.

## 📁 Export Data

Data anggota dapat diekspor menjadi file **Excel (.xls)** sehingga memudahkan proses pembuatan laporan atau arsip data anggota koperasi.

---

# 🛠 Teknologi yang Digunakan

| Komponen              | Teknologi      |
| --------------------- | -------------- |
| 💻 Bahasa Pemrograman | PHP            |
| 🗄 Database           | MySQL          |
| 🌐 Frontend           | HTML5, CSS     |
| ⚡ Interaksi Web       | JavaScript     |
| 🎨 Icon Library       | Font Awesome   |
| 🖥 Web Server         | Apache (XAMPP) |

---

# ⚙ Cara Menjalankan

Ikuti langkah berikut untuk menjalankan aplikasi **SIMAKO**:

### 1️⃣ Install Web Server

Install aplikasi berikut:

* **XAMPP**

---

### 2️⃣ Copy Project

Salin folder project ke dalam folder:

```
htdocs
```

Contoh:

```
C:\xampp\htdocs\crud_anggota
```

---

### 3️⃣ Jalankan Server

Aktifkan layanan pada **XAMPP Control Panel**:

* Apache
* MySQL

---

### 4️⃣ Import Database

Buka browser dan akses:

```
http://localhost/phpmyadmin
```

Buat database baru dengan nama:

```
db_koperasi
```

Kemudian **import file database (.sql)** yang tersedia pada project.

---

### 5️⃣ Jalankan Aplikasi

Buka browser dan akses:

```
http://localhost/crud_anggota
```

Website **SIMAKO** akan tampil di browser.

---

# 📂 Struktur Folder

Berikut struktur folder utama pada project:

```
crud_anggota
│
├── assets
│   ├── css
│   ├── js
│   └── images
│
├── includes
│   ├── auth.php
│   └── config.php
│
├── index.php
├── login.php
├── tambah.php
├── edit.php
├── hapus.php
├── export.php
├── koneksi.php
└── README.md
```

Penjelasan:

* **assets/** → berisi file CSS, JavaScript, dan gambar
* **includes/** → berisi file autentikasi dan konfigurasi
* **index.php** → halaman utama menampilkan data anggota
* **login.php** → halaman login admin
* **tambah.php** → halaman menambah data anggota
* **edit.php** → halaman mengubah data anggota
* **hapus.php** → file untuk menghapus data anggota
* **export.php** → file export data anggota ke Excel
* **koneksi.php** → file koneksi database

---

# 🔄 Alur Penggunaan Sistem

## 🔐 Login ke Sistem

Untuk menggunakan aplikasi **SIMAKO**, pengguna harus melakukan login terlebih dahulu dengan menggunakan **username** dan **password** yang sudah tersimpan di dalam database.

### 🪜 Langkah Login

1. 🌐 Buka halaman **Login** pada aplikasi
2. 👤 Masukkan **username** dan **password**
3. 🖱 Klik tombol **Login**
4. 🔎 Sistem melakukan proses **verifikasi data pengguna**

Jika data login benar, maka pengguna akan diarahkan ke **🏠 halaman utama sistem**.
<img width="780" height="385" alt="image" src="https://github.com/user-attachments/assets/2b785d9c-f8c6-47af-8563-b37316de5605" />

---

### ⚙️ Aktivitas Setelah Login

Setelah berhasil login, pengguna dapat melakukan beberapa aktivitas berikut:

* ➕ **Menambah data anggota** koperasi
* ✏️ **Mengedit data anggota** yang sudah tersimpan
* ❌ **Menghapus data anggota** yang tidak diperlukan
* 📋 **Melihat daftar data anggota** dalam database
* 📤 **Mengekspor data anggota ke Excel**
<img width="758" height="364" alt="image" src="https://github.com/user-attachments/assets/ac64627b-03cc-48cb-844e-15bd6ec3bda5" />

---

## ➕ Menambah Data Anggota

1. Admin memilih menu **Tambah Anggota**
2. Mengisi data anggota pada form
3. Klik tombol **Simpan**
4. Data anggota tersimpan dalam database
<img width="244" height="57" alt="image" src="https://github.com/user-attachments/assets/fc968db5-e29e-4212-a229-9482e4ab30cb" />
<img width="773" height="385" alt="image" src="https://github.com/user-attachments/assets/08c15179-55fb-444b-8b70-d37d9469869f" />
<img width="780" height="377" alt="image" src="https://github.com/user-attachments/assets/121ffe8e-22be-4fa2-ac6c-037882ce1745" />
<img width="780" height="377" alt="image" src="https://github.com/user-attachments/assets/4443f289-9515-4b72-af41-896c3ca9fbad" />

---

## ✏️ Mengedit Data Anggota

1. Admin memilih data anggota
2. Klik tombol **Edit**
3. Mengubah data yang diperlukan
4. Menyimpan perubahan
<img width="61" height="39" alt="image" src="https://github.com/user-attachments/assets/61af88af-21d1-4c79-ab3e-37b56d6c1415" />
<img width="780" height="386" alt="image" src="https://github.com/user-attachments/assets/e252cf3f-4207-4ad0-babd-d9daea9a9e7e" />
<img width="780" height="376" alt="image" src="https://github.com/user-attachments/assets/51ae770d-2ec0-4cb8-91e1-4dc8d14328d1" />

---

## ❌ Menghapus Data Anggota

1. Admin memilih data anggota
2. Klik tombol **Hapus**
3. Sistem menghapus data dari database
<img width="58" height="44" alt="image" src="https://github.com/user-attachments/assets/be8a3681-f04b-4a11-9df6-5ce1e1e4d987" />
<img width="1861" height="917" alt="image" src="https://github.com/user-attachments/assets/00a7a768-0c97-4837-ab6e-6c55eacb6dbd" />
<img width="758" height="364" alt="image" src="https://github.com/user-attachments/assets/fe0c3c70-bafb-488a-8e3e-a965ab59d9a8" />

---

## 📤 Export Data Anggota

1. Admin membuka halaman utama data anggota
2. Klik tombol **Export Excel**
3. Sistem mengambil data anggota dari database
4. Sistem membuat file laporan dalam format **Excel (.xls)**
5. File laporan otomatis diunduh oleh pengguna
<img width="139" height="55" alt="image" src="https://github.com/user-attachments/assets/0b49d855-82a5-4cbc-9143-f2808403c0d0" />
<img width="1919" height="1018" alt="image" src="https://github.com/user-attachments/assets/c081b16c-292f-4c1f-a04e-950c710fd97f" />

---

# 📜 Aturan Sistem

Beberapa aturan yang digunakan dalam sistem:

* 🔐 Sistem **WAJIB login terlebih dahulu**
* 🗄 Data anggota disimpan dalam **database MySQL**
* 🆔 Setiap anggota memiliki **ID unik**
* ✏️ Admin dapat **menambah, mengedit, menghapus, dan mengekspor data**
* 📋 Data anggota ditampilkan dalam bentuk **tabel**

---

# 📊 Konsep Pemrograman yang Digunakan

Program ini menggunakan beberapa konsep pemrograman, yaitu:

* CRUD (**Create, Read, Update, Delete**)
* Database **MySQL**
* Percabangan **if else**
* Perulangan **while**
* Penggunaan **fungsi**
* Penggunaan **array**
* **Namespace dalam PHP**
* Dokumentasi kode program

---

# 👨‍💻 Author

Nama          : **I Nyoman Angga Suarania Mendi**
NIM           : **230030106**
Program Studi : **Sistem Informasi**
Institusi     : **ITB STIKOM Bali**

---

# 📜 License

Project ini dibuat untuk **tujuan pembelajaran dan tugas akademik**.
