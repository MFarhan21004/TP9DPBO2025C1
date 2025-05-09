<?php

// Kelas TabelMahasiswa yang menangani interaksi dengan tabel mahasiswa di database
class TabelMahasiswa extends DB
{
    // Fungsi untuk mengambil data mahasiswa dari database
    function getMahasiswa()
    {
        // Query untuk memilih semua data mahasiswa
        $query = "SELECT * FROM mahasiswa";
        
        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menambahkan data mahasiswa ke dalam database
    function addMahasiswa($data)
    {
        // Mendapatkan nilai dari array data
        $nim = $data['nim'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        // Query untuk menambahkan data mahasiswa ke dalam tabel
        $query = "INSERT INTO mahasiswa (nim, nama, tempat, tl, gender, email, telp) 
                  VALUES ('$nim', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";
        
        // Menjalankan query dan mengembalikan hasil eksekusinya
        return $this->execute($query);
    }

    // Fungsi untuk menghapus data mahasiswa berdasarkan ID
    function deleteMahasiswa($id)
    {
        // Query untuk menghapus data mahasiswa berdasarkan ID
        $query = "DELETE FROM mahasiswa WHERE id = $id";
        
        // Menjalankan query untuk menghapus data
        $this->execute($query);
    }

    // Fungsi untuk memperbarui data mahasiswa
    public function updateMahasiswa($data)
    {
        // Mendapatkan nilai dari array data
        $id = $data['id'];
        $nim = $data['nim'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];

        // Query untuk memperbarui data mahasiswa di tabel
        $query = "UPDATE mahasiswa SET 
                    nim='$nim', nama='$nama', tempat='$tempat', tl='$tl',
                    gender='$gender', email='$email', telp='$telp'
                  WHERE id='$id'";
        
        // Menjalankan query untuk memperbarui data
        $this->execute($query);
    }
}
