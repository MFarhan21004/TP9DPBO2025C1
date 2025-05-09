<?php


include("KontrakView.php");
include("presenter/ProsesMahasiswa.php");

class TampilMahasiswa implements KontrakView
{
    private $prosesmahasiswa; // Presenter yang dapat berinteraksi langsung dengan view
    private $tpl;

    function __construct()
    {
        // Konstruktor
        $this->prosesmahasiswa = new ProsesMahasiswa();
    }

    function tampil()
    {
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $data = null;

        // Semua terkait tampilan adalah tanggung jawab view
        for ($i = 0; $i < $this->prosesmahasiswa->getSize(); $i++) {
            $no = $i + 1;
            $data .= "<tr>
                <td>" . $no . "</td>
                <td>" . $this->prosesmahasiswa->getNim($i) . "</td>
                <td>" . $this->prosesmahasiswa->getNama($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTempat($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTl($i) . "</td>
                <td>" . $this->prosesmahasiswa->getGender($i) . "</td>
                <td>" . $this->prosesmahasiswa->getTelepon($i) . "</td>
                <td>" . $this->prosesmahasiswa->getEmail($i) . "</td> 
                <td>
                    <a href='index.php?menu=edit&id=" . $this->prosesmahasiswa->getId($i) . "'>Edit</a> |
                    <a href='index.php?menu=delete&id=" . $this->prosesmahasiswa->getId($i) . "' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Delete</a>
                </td>
            </tr>";
        }

        // Membaca template skin.html
        $this->tpl = new Template("templates/skin.html");

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl->replace("DATA_TABEL", $data);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function form_edit($id)
    {
        // Pastikan data sudah diproses jika perlu
        $this->prosesmahasiswa->prosesDataMahasiswa();
        $form = null;

        // Ambil data mahasiswa berdasarkan ID
        $data = $this->prosesmahasiswa->getById($id);

        if (!$data) {
            echo "Data mahasiswa tidak ditemukan!";
            return;
        }

		// Membuat form edit mahasiswa
        $form = "
        <form method='post' action='index.php'>
            <input type='hidden' name='id' value='" . $data->id . "'>
            <table class='table'>
                <tr>
                    <td><label for='nim'>NIM</label></td>
                    <td><input type='text' id='nim' name='nim' value='" . htmlspecialchars($data->nim) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='nama'>Nama</label></td>
                    <td><input type='text' id='nama' name='nama' value='" . htmlspecialchars($data->nama) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='tempat'>Tempat Lahir</label></td>
                    <td><input type='text' id='tempat' name='tempat' value='" . htmlspecialchars($data->tempat) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='tl'>Tanggal Lahir</label></td>
                    <td><input type='date' id='tl' name='tl' value='" . htmlspecialchars($data->tl) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='telp'>Telepon</label></td>
                    <td><input type='text' id='telp' name='telp' value='" . htmlspecialchars($data->telepon) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='email'>Email</label></td>
                    <td><input type='email' id='email' name='email' value='" . htmlspecialchars($data->email) . "' class='form-control' required></td>
                </tr>
                <tr>
                    <td><label for='gender'>Jenis Kelamin</label></td>
                    <td>
                        <select id='gender' name='gender' class='form-control' required>
                            <option value='Laki-laki' " . ($data->gender == 'Laki-laki' ? 'selected' : '') . ">Laki-laki</option>
                            <option value='Perempuan' " . ($data->gender == 'Perempuan' ? 'selected' : '') . ">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input type='submit' name='update' value='Update' class='btn btn-primary'>
                        <input type='button' name='cancel' value='Cancel' class='btn btn-secondary' onclick=\"location.href='index.php'\">
                    </td>
                </tr>
            </table>
        </form>";

        // Mengganti kode Data_Tabel dengan data yang sudah diproses
        $this->tpl = new Template("templates/edit.html");
        $this->tpl->replace("FORM_EDIT_MHS", $form);

        // Menampilkan ke layar
        $this->tpl->write();
    }

    function add($data)
    {
        // Menambahkan mahasiswa baru ke database
        $this->prosesmahasiswa->addtoDB($data);
    }

    function delete($id)
    {
		// Menghapus mahasiswa berdasarkan ID
        $this->prosesmahasiswa->deletetoDB($id);
    }

    function update($data)
    {
        // Memperbarui data mahasiswa di database
        $this->prosesmahasiswa->updateDB($data);
    }
}
