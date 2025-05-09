<?php

// Kelas Mahasiswa yang menggambarkan detail mahasiswa dengan atribut-atributnya
class Mahasiswa
{
    // Deklarasi atribut
    var $id = '';        // ID mahasiswa
    var $nim = '';       // Nomor Induk Mahasiswa
    var $nama = '';      // Nama mahasiswa
    var $tempat = '';    // Tempat lahir
    var $tl = '';        // Tanggal lahir
    var $gender = '';    // Jenis kelamin
    var $telepon = '';   // Nomor telepon
    var $email = '';     // Email

    // Konstruktor untuk menginisialisasi nilai atribut
    function __construct($id = '', $nim = '', $nama = '', $tempat = '', $tl = '', $gender = '', $telepon = '', $email = '')
    {
        $this->id = $id;
        $this->nim = $nim;
        $this->nama = $nama;
        $this->tempat = $tempat;
        $this->tl = $tl;
        $this->gender = $gender;
        $this->telepon = $telepon;
        $this->email = $email;
    }

    // Setter (untuk mengubah nilai atribut)
    function setId($id)
    {
        $this->id = $id;
    }

    function setNim($nim)
    {
        $this->nim = $nim;
    }

    function setNama($nama)
    {
        $this->nama = $nama;
    }

    function setTempat($tempat)
    {
        $this->tempat = $tempat;
    }

    function setTl($tl)
    {
        $this->tl = $tl;
    }

    function setGender($gender)
    {
        $this->gender = $gender;
    }

    function setTelepon($telepon)
    {
        $this->telepon = $telepon;
    }

    function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter (untuk mengambil nilai atribut)
    function getId()
    {
        return $this->id;
    }

    function getNim()
    {
        return $this->nim;
    }

    function getNama()
    {
        return $this->nama;
    }

    function getTempat()
    {
        return $this->tempat;
    }

    function getTl()
    {
        return $this->tl;
    }

    function getGender()
    {
        return $this->gender;
    }

    function getTelepon()
    {
        return $this->telepon;
    }

    function getEmail()
    {
        return $this->email;
    }
}
