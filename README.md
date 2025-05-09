# Janji

Saya Muhammad Farhan dengan NIM 2309323 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Sistem Manajemen Data Mahasiswa


## Deskripsi

Aplikasi ini adalah sistem manajemen data mahasiswa yang dibangun menggunakan pola arsitektur MVP (Model-View-Presenter) dengan PHP. Sistem ini memungkinkan pengguna untuk menambah, mengedit, dan menghapus data mahasiswa.

## Struktur Folder

MVP_PHP/

├── model/ # Menangani logika bisnis dan akses database

│ ├── DB.class.php # Kelas untuk koneksi dan operasi database

│ ├── Mahasiswa.class.php # Model untuk entitas mahasiswa

│ ├── TabelMahasiswa.class.php # Model untuk tabel mahasiswa

│ └── Template.class.php # Kelas untuk mengelola template

├── presenter/ # Mediator antara model dan view

│ ├── KontrakPresenter.php # Interface untuk presenter

│ └── ProsesMahasiswa.php # Implementasi presenter untuk operasi mahasiswa

├── templates/ # Template untuk layout halaman

│ ├── edit.html # Template untuk form edit mahasiswa

│ └── skin.html # Template untuk layout umum

├── view/ # Menangani tampilan UI

│ ├── KontrakView.php # Interface untuk view

│ ├── TampilMahasiswa.php # View untuk menampilkan data mahasiswa

│ └── index.php # Halaman utama aplikasi

└── mvp_php.sql # File SQL untuk inisialisasi database

Aplikasi ini menggunakan pola arsitektur **MVP (Model-View-Presenter)** dengan PHP. Berikut adalah penjelasan mengenai struktur folder dan fungsinya:

### 1.1 **model/**
Folder ini berisi kelas-kelas yang menangani logika bisnis dan operasi database.

- **DB.class.php**: Kelas untuk mengelola koneksi ke database dan operasi dasar (CRUD) yang digunakan oleh model-model lainnya.
- **Mahasiswa.class.php**: Menyediakan model entitas mahasiswa, yang mencakup atribut seperti `id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `gender`, `email`, dan `telp`.
- **TabelMahasiswa.class.php**: Kelas yang menyediakan fungsi untuk operasi CRUD khusus untuk data mahasiswa, seperti menambah, mengedit, dan menghapus data mahasiswa di database.
- **Template.class.php**: Kelas untuk menangani dan menghasilkan template HTML yang digunakan oleh view.

### 1.2 **presenter/**
Folder ini berisi kelas-kelas presenter yang berfungsi sebagai mediator antara model dan view.

- **KontrakPresenter.php**: Interface untuk presenter, mendefinisikan operasi yang dapat dilakukan oleh presenter.
- **ProsesMahasiswa.php**: Implementasi presenter untuk operasi terkait mahasiswa, seperti menambahkan mahasiswa baru, mengedit data mahasiswa, atau menghapus data mahasiswa.

### 1.3 **templates/**
Folder ini berisi file template yang digunakan untuk layout halaman-halaman aplikasi.

- **edit.html**: Template untuk form edit mahasiswa, yang berisi input untuk mengedit data mahasiswa yang sudah ada.
- **skin.html**: Template untuk layout umum yang digunakan di seluruh halaman aplikasi.

### 1.4 **view/**
Folder ini berisi file yang menangani tampilan UI (User Interface) aplikasi.

- **KontrakView.php**: Interface untuk view, mendefinisikan operasi yang dapat dilakukan oleh view.
- **TampilMahasiswa.php**: Menampilkan daftar mahasiswa dan menyediakan form untuk menambah data mahasiswa serta tombol untuk mengedit atau menghapus data mahasiswa.
- **index.php**: Halaman utama yang akan menampilkan form untuk menambah data mahasiswa dan tabel untuk menampilkan daftar mahasiswa. Juga mengelola alur aplikasi.

### 1.5 **mvp_php.sql**
File SQL untuk mengatur struktur database dan menyediakan data awal.

---

## 2. **Alur Program di index.php**

### 2.1 **Poin Masuk (index.php)**
`index.php` adalah halaman utama yang berfungsi sebagai titik masuk (entry point) untuk aplikasi. Berikut adalah alur kerja di file `index.php`:

#### 2.1.1 **Menginisialisasi Koneksi Database**
- `index.php` pertama-tama mengimpor file-file yang diperlukan dari model, presenter, dan view. Ini termasuk file koneksi database (`DB.class.php`), model mahasiswa (`Mahasiswa.class.php` dan `TabelMahasiswa.class.php`), presenter (`ProsesMahasiswa.php`), dan view (`TampilMahasiswa.php`).
- Koneksi ke database diatur dan operasi CRUD dapat dilakukan oleh model-model lainnya.

#### 2.1.2 **Membuat Instance dari Presenter dan View**
- `index.php` membuat instance dari kelas presenter dan view yang sesuai.
- Presenter bertanggung jawab untuk menghubungkan model dengan tampilan. View akan menangani bagaimana data ditampilkan kepada pengguna.
- Misalnya, presenter `ProsesMahasiswa` akan menangani aksi yang dilakukan oleh pengguna (seperti menambah, mengedit, atau menghapus data mahasiswa).

#### 2.1.3 **Menampilkan Form dan Tabel Mahasiswa**
- Setelah presenter diinisialisasi, halaman utama akan memuat tampilan yang berisi:
  - Form untuk menambah data mahasiswa baru.
  - Tabel daftar mahasiswa yang menampilkan data yang ada, lengkap dengan tombol "Edit" dan "Delete" untuk setiap baris data mahasiswa.
  - Tabel ini dihasilkan oleh view `TampilMahasiswa.php`.

---

### 2.2 **Menambah Data Mahasiswa**
- Pengguna mengisi form untuk menambah data mahasiswa baru pada halaman utama (`index.php`).
- Setelah form diisi, data dikirim ke presenter melalui **POST request**.
- Presenter (`ProsesMahasiswa.php`) akan memvalidasi data yang dikirim.
- Presenter kemudian memanggil model `TabelMahasiswa.class.php` untuk menyimpan data ke dalam database.
- Setelah data disimpan, halaman utama akan dimuat ulang (redirect) untuk menampilkan data mahasiswa terbaru.

---

### 2.3 **Mengedit Data Mahasiswa**
- Jika pengguna ingin mengedit data mahasiswa, mereka akan mengklik tombol **Edit** pada baris yang sesuai di tabel.
- Tombol "Edit" ini mengarahkan pengguna ke halaman form edit (`edit.html`), yang berisi form untuk mengubah data mahasiswa yang sudah ada.
- Presenter akan mengambil data mahasiswa yang ingin diedit berdasarkan ID dan mengirimkan data tersebut ke form edit.
- Pengguna dapat mengubah data pada form dan menyimpan perubahan.
- Ketika perubahan disubmit, presenter akan memvalidasi dan memperbarui data di database menggunakan model `TabelMahasiswa.class.php`.
- Setelah itu, pengguna akan diarahkan kembali ke halaman utama untuk melihat data yang telah diperbarui.

---

### 2.4 **Menghapus Data Mahasiswa**
- Untuk menghapus data mahasiswa, pengguna mengklik tombol **Delete** pada baris yang sesuai di tabel.
- Presenter akan meminta konfirmasi untuk menghapus data tersebut.
- Jika pengguna mengonfirmasi penghapusan, presenter akan meminta model `TabelMahasiswa.class.php` untuk menghapus data dari database.
- Halaman utama kemudian dimuat ulang, dan data mahasiswa yang dihapus tidak lagi ditampilkan di tabel.

---
Dokumentasi Foto&Video

![Image](https://github.com/user-attachments/assets/1e83db47-c03e-4903-bf85-fc5606a6c29a)

![Image](https://github.com/user-attachments/assets/32377702-245f-4522-89b1-8b1f2d02dd6f)

https://github.com/user-attachments/assets/c0c040f2-a74f-4930-b9d4-02e86a335479

