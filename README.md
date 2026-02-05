# Fastprint – Junior Programmer Test

## 📌 Deskripsi Project

Project ini dibuat untuk memenuhi **Tes Junior Programmer Fastprint**. Aplikasi dibangun menggunakan **CodeIgniter 3** dengan database **MySQL**, serta menggunakan **Bulma CSS** untuk tampilan UI yang sederhana dan responsive.

Fokus utama project ini adalah:

* Mengambil data produk dari API Fastprint
* Menyimpan data ke database lokal
* Menampilkan data produk dengan filter status **"bisa dijual"**
* Menyediakan fitur CRUD (Create, Read, Update, Delete)
* Menyediakan dokumentasi yang jelas dan mudah dipahami

---

## 🛠️ Teknologi yang Digunakan

* PHP 7.x
* CodeIgniter 3
* MySQL
* Bulma CSS
* cURL (API request)
* Apache (XAMPP)


## 🔄 Alur Aplikasi

1. User menekan tombol **Import Produk dari API**
2. Aplikasi melakukan request ke API Fastprint
3. Data disimpan ke database (categories, statuses, products)
4. Halaman list menampilkan produk dengan status **bisa dijual**
5. User dapat melakukan tambah, edit, dan hapus produk

---

## 📋 Fitur Aplikasi

### 1. Import Produk dari API

* Import menggunakan **form POST**
* Terdapat konfirmasi sebelum import
* Setelah import, user diarahkan kembali ke halaman list

### 2. List Produk

* Menampilkan data produk dari database
* Filter status **bisa dijual**
* Tabel responsive

### 3. Tambah Produk

* Form responsive (Bulma columns)
* Validasi:

  * Nama produk wajib diisi
  * Harga harus berupa angka

### 4. Edit Produk

* Tampilan sama dengan form tambah
* Data lama otomatis terisi

### 5. Hapus Produk

* Dilengkapi konfirmasi (confirm alert)

---

## ✅ Validasi Form

Validasi dilakukan di Controller menggunakan `form_validation` CodeIgniter:

* `required` untuk nama produk
* `numeric` untuk harga

Pesan error ditampilkan menggunakan Bulma class `help is-danger`.

---

## 📱 UI & Responsive

* Menggunakan Bulma CSS
* Layout form menggunakan columns
* Mobile: 1 kolom
* Desktop: 2 kolom

---

## ▶️ Cara Menjalankan Project

1. Clone repository ini
2. Pindahkan ke folder `htdocs`
3. Buat database MySQL
4. Import struktur tabel
5. Konfigurasi database di `application/config/database.php`
6. Jalankan Apache & MySQL
7. Akses aplikasi melalui browser:

```
http://localhost/fastprint-test/
```
