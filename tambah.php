<!DOCTYPE html>
<html>

<head>
    <title>Form Tambah Data Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4faff;
            margin: 0;
            padding: 0;
        }

        h3 {
            text-align: center;
            color: #003366;
            margin-top: 30px;
        }

        p {
            text-align: center;
            color: #333;
        }

        form {
            width: 400px;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 123, 255, 0.2);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h3>Entry Data Mahasiswa</h3>
    <p>Silakan masukkan data mahasiswa berdasarkan formulir berikut:</p>

    <form action="" method="post">
        <table>
            <tr>
                <td><label for="npm">NPM:</label></td>
                <td><input type="text" name="npm" id="npm" maxlength="12" required></td>
            </tr>
            <tr>
                <td><label for="nama">Nama:</label></td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Program Studi:</label></td>
                <td>
                    <select name="prodi" id="prodi" required>
                        <option value="">--Pilih Prodi--</option>
                        <option value="Pendidikan Informatika">Pendidikan Informatika</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat:</label></td>
                <td><textarea name="alamat" id="alamat" rows="3"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Simpan Data"></td>
            </tr>
        </table>
    </form>

    <p style="text-align: center; margin-top: 10px;">
        <a href="index.php" style="display: inline-block; padding: 8px 16px; background-color: #007BFF; color: white; text-decoration: none; border-radius: 6px; transition: background-color 0.3s ease;">
            ← Kembali ke Daftar Mahasiswa
        </a>
    </p>

    <?php
    // cek apakah tombol submit sudah ditekan
    if (isset($_POST['submit'])) {
        // ambil data dari form
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $prodi = $_POST['prodi'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];

        // koneksi ke database
        include "koneksi.php";

        // query insert data
        $hasil = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa (npm, nama, prodi, email, alamat) 
                                         VALUES ('$npm', '$nama', '$prodi', '$email', '$alamat')");

        if ($hasil) {
            echo "<script>alert('Data berhasil disimpan'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan: " . mysqli_error($koneksi) . "');</script>";
        }
    }
    ?>
</body>

</html>

