<?php
/******************************************
 CRUD Mahasiswa Universitas Pendidikan Indonesia
******************************************/

include_once("view/TampilMahasiswa.php");

$view = new TampilMahasiswa();

// Tambah mahasiswa
if (isset($_POST['add'])) {
    $data = [
        'nim'    => $_POST['nim'],
        'nama'   => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl'     => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email'  => $_POST['email'],
        'telp'   => $_POST['telp']
    ];
    $view->add($data);
    header("Location: index.php");
    exit();
}

// Update mahasiswa
elseif (isset($_POST['update'])) {
    $data = [
        'id'     => $_POST['id'],
        'nim'    => $_POST['nim'],
        'nama'   => $_POST['nama'],
        'tempat' => $_POST['tempat'],
        'tl'     => $_POST['tl'],
        'gender' => $_POST['gender'],
        'email'  => $_POST['email'],
        'telp'   => $_POST['telp']
    ];
    $view->update($data);
    header("Location: index.php");
    exit();
}

// Hapus mahasiswa
if (isset($_GET['menu']) && $_GET['menu'] == 'delete' && !empty($_GET['id'])) {
    $view->delete($_GET['id']);
    header("Location: index.php");
    exit();
}

// Edit mahasiswa
if (isset($_GET['menu']) && $_GET['menu'] == 'edit' && isset($_GET['id'])) {
    $view->form_edit($_GET['id']);
}

// Tampilkan form tambah dan daftar mahasiswa
else {
    $view->tampil();
}
?>
