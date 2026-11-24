<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];

    $query = mysqli_prepare(
        $conn,
        "INSERT INTO siswa (nama_siswa, kelas, alamat)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param($query, "sss", $nama, $kelas, $alamat);

    if (mysqli_stmt_execute($query)) {
        echo "<script>
            alert('Data siswa berhasil ditambahkan!');
            window.location='data_siswa.php';
        </script>";
        exit;
    } else {
        echo "Gagal menyimpan data!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Siswa</title>

    <style>
        body {
            font-family: Arial;
            background: #eef2f7;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            margin-top: 7px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #1764d8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #1764d8;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Data Siswa</h2>

    <form method="POST">

        <label>Nama Siswa</label>
        <input type="text" name="nama_siswa"
               placeholder="Masukkan nama siswa" required>

        <label>Kelas</label>
        <input type="text" name="kelas"
               placeholder="Kelas siswa" required>

        <label>Alamat</label>
        <textarea name="alamat"
                  placeholder="Masukkan alamat siswa"
                  required></textarea>

        <button type="submit" name="simpan">
            Simpan Data
        </button>

    </form>

    <a href="data_siswa.php">Kembali ke Data Siswa</a>

</div>

</body>
</html>