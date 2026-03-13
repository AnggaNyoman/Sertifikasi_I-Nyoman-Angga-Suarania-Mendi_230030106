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

### Penjelasan Struktur Folder

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

Untuk menggunakan aplikasi **SIMAKO**, pengguna harus melakukan login terlebih dahulu dengan menggunakan **username** dan **password** yang telah dikonfigurasi pada sistem.

### 🪜 Langkah Login

1. 🌐 Buka halaman **Login** pada aplikasi
2. 👤 Masukkan **username** dan **password**
3. 🖱 Klik tombol **Login**
4. 🔎 Sistem melakukan proses **verifikasi data pengguna**
<img width="780" height="385" alt="image" src="https://github.com/user-attachments/assets/0a6775b9-d2b8-444c-9956-ec8a8da89056" />

Jika data login benar, maka pengguna akan diarahkan ke **🏠 halaman utama sistem**.
<img width="758" height="364" alt="image" src="https://github.com/user-attachments/assets/32ed4e45-3b5f-476f-8a66-b1cfaa730fbe" />

---

## ⚙️ Aktivitas Setelah Login

Setelah berhasil login, pengguna dapat melakukan beberapa aktivitas berikut:

* ➕ **Menambah data anggota**
* ✏️ **Mengedit data anggota**
* ❌ **Menghapus data anggota**
* 📋 **Melihat daftar data anggota**
* 📤 **Mengekspor data anggota ke Excel**

---

## ➕ Menambah Data Anggota

1. Admin memilih menu **Tambah Anggota**
2. Mengisi data anggota pada form
3. Klik tombol **Simpan**
4. Data anggota tersimpan dalam database
<img width="773" height="385" alt="image" src="https://github.com/user-attachments/assets/f51a211b-6b87-4142-9075-dcfaf36ac232" />
<img width="780" height="377" alt="image" src="https://github.com/user-attachments/assets/31175928-b95e-47cf-88dd-9d2a505c133a" />
<img width="780" height="377" alt="image" src="https://github.com/user-attachments/assets/da8597dc-b7c9-4dfe-84f3-7fd74fb720e8" />
<img width="758" height="364" alt="image" src="https://github.com/user-attachments/assets/d74b9a92-a30b-4463-a4c2-c21d8a3d2f3a" />

---

## ✏️ Mengedit Data Anggota

1. Admin memilih data anggota
2. Klik tombol **Edit**
3. Mengubah data yang diperlukan
4. Menyimpan perubahan
<img width="780" height="386" alt="image" src="https://github.com/user-attachments/assets/430f4c28-8752-4dfe-b3d2-b74eab5c5b03" />
<img width="780" height="376" alt="image" src="https://github.com/user-attachments/assets/6c5336b2-5bb7-405d-baa3-9f7ac00373a1" />
<img width="64" height="48" alt="image" src="https://github.com/user-attachments/assets/be53cbe9-c29a-4b54-9c98-92c484e51396" />

---

## ❌ Menghapus Data Anggota

1. Admin memilih data anggota
2. Klik tombol **Hapus**
3. Sistem menghapus data dari database
<img width="758" height="364" alt="image" src="https://github.com/user-attachments/assets/5a5f026b-11db-48a8-a95b-87eb4de7b9e6" />
<img width="156" height="63" alt="image" src="https://github.com/user-attachments/assets/7f5b4c62-45ed-47af-8af0-8c9a932ebc3f" />

---

## 📤 Export Data Anggota

1. Admin membuka halaman utama data anggota
2. Klik tombol **Export Excel**
3. Sistem mengambil data anggota dari database
4. Sistem membuat file laporan dalam format **Excel (.xls)**
5. File laporan otomatis diunduh oleh pengguna
<img width="1919" height="1020" alt="image" src="https://github.com/user-attachments/assets/dfd6375a-21ed-4279-bc5b-63cbfe415544" />
![Uploading image.png…]()

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
* Struktur folder modular
* Dokumentasi kode program

---

# 👨‍💻 Author

Nama : **I Nyoman Angga Suarania Mendi**
NIM : **230030106**
Program Studi : **Sistem Informasi**
Institusi : **ITB STIKOM Bali**

---

# 📜 License

Project ini dibuat untuk **tujuan pembelajaran dan tugas akademik**.
