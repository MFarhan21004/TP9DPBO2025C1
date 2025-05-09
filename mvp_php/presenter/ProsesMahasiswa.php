<?php

include("KontrakPresenter.php");

// Kelas ProsesMahasiswa mengimplementasikan kontrak KontrakPresenter
class ProsesMahasiswa implements KontrakPresenter
{
    private $tabelmahasiswa; // Instansi TabelMahasiswa
    private $data = [];      // Daftar data mahasiswa

    // Konstruktor untuk inisialisasi koneksi database
    function __construct()
    {
        try {
            // Menyiapkan koneksi database
            $db_host = "localhost"; // host 
            $db_user = "root";      // user
            $db_password = "";      // password
            $db_name = "mvp_10";    // nama basis data
            $this->tabelmahasiswa = new TabelMahasiswa($db_host, $db_user, $db_password, $db_name); // Instansi TabelMahasiswa
            $this->data = array();  // Menyiapkan array kosong untuk data mahasiswa
        } catch (Exception $e) {
            // Menangani error koneksi database
            echo "Yah, terjadi kesalahan: " . $e->getMessage();
        }
    }

    // Fungsi untuk memproses dan mengambil data mahasiswa
    function prosesDataMahasiswa()
    {
        try {
            // Mengambil data mahasiswa dari tabel
            $this->tabelmahasiswa->open();
            $this->tabelmahasiswa->getMahasiswa();

            // Loop untuk mengisi data mahasiswa ke dalam objek
            while ($row = $this->tabelmahasiswa->getResult()) {
                $mahasiswa = new Mahasiswa(); // Instansiasi objek mahasiswa baru
                // Mengisi atribut mahasiswa berdasarkan data dari query
                $mahasiswa->setId($row['id']);
                $mahasiswa->setNim($row['nim']);
                $mahasiswa->setNama($row['nama']);
                $mahasiswa->setTempat($row['tempat']);
                $mahasiswa->setTl($row['tl']);
                $mahasiswa->setGender($row['gender']);
                $mahasiswa->setTelepon($row['telp']);
                $mahasiswa->setEmail($row['email']);

                // Menambahkan objek mahasiswa ke dalam array data
                $this->data[] = $mahasiswa;
            }

            // Menutup koneksi database setelah pengambilan data selesai
            $this->tabelmahasiswa->close();
        } catch (Exception $e) {
            // Menangani error pengambilan data
            echo "Yah, terjadi kesalahan saat mengambil data: " . $e->getMessage();
        }
    }

    // Fungsi untuk menambahkan data mahasiswa ke dalam database
    function addtoDB($data)
    {
        // Menambahkan data mahasiswa melalui metode addMahasiswa
        $this->tabelmahasiswa->open();
        $this->tabelmahasiswa->addMahasiswa($data);
        $this->tabelmahasiswa->close();
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan ID
    function deletetoDB($id)
    {
        $this->tabelmahasiswa->open();
        $this->tabelmahasiswa->deleteMahasiswa($id);
        $this->tabelmahasiswa->close();
    }

    // Fungsi untuk memperbarui data mahasiswa di database
    function updateDB($data)
    {
        // Memperbarui data mahasiswa melalui metode updateMahasiswa
        $this->tabelmahasiswa->open();
        $this->tabelmahasiswa->updateMahasiswa($data);
        $this->tabelmahasiswa->close();
    }

    // Fungsi untuk mencari mahasiswa berdasarkan ID
    function getById($id)
    {
        // Mencari mahasiswa di array data berdasarkan ID
        foreach ($this->data as $mahasiswa) {
            if ($mahasiswa->id == $id) {
                return $mahasiswa;
            }
        }
        return null; // Mengembalikan null jika mahasiswa tidak ditemukan
    }

    // Fungsi untuk mendapatkan ID mahasiswa berdasarkan indeks
    function getId($i)
    {
        return $this->data[$i]->id;
    }

    // Fungsi untuk mendapatkan NIM mahasiswa berdasarkan indeks
    function getNim($i)
    {
        return $this->data[$i]->nim;
    }

    // Fungsi untuk mendapatkan nama mahasiswa berdasarkan indeks
    function getNama($i)
    {
        return $this->data[$i]->nama;
    }

    // Fungsi untuk mendapatkan tempat lahir mahasiswa berdasarkan indeks
    function getTempat($i)
    {
        return $this->data[$i]->tempat;
    }

    // Fungsi untuk mendapatkan tanggal lahir mahasiswa berdasarkan indeks
    function getTl($i)
    {
        return $this->data[$i]->tl;
    }

    // Fungsi untuk mendapatkan gender mahasiswa berdasarkan indeks
    function getGender($i)
    {
        return $this->data[$i]->gender;
    }

    // Fungsi untuk mendapatkan jumlah data mahasiswa
    function getSize()
    {
        return sizeof($this->data); // Mengembalikan jumlah elemen di array data
    }

    // Fungsi untuk mendapatkan nomor telepon mahasiswa berdasarkan indeks
    function getTelepon($i)
    {
        return $this->data[$i]->telepon;
    }

    // Fungsi untuk mendapatkan email mahasiswa berdasarkan indeks
    function getEmail($i)
    {
        return $this->data[$i]->email;
    }
}
