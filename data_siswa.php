<?php
include 'koneksi.php';

// Proses hapus data
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];

    mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

    header("Location: data_siswa.php");
    exit;
}

// Mengambil data siswa
$query = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
$total = mysqli_num_rows($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - Absensi Sekolah</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, sans-serif;
            background: #eef2f7;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        .content {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.08);
        }

        h2 {
            margin-top: 0;
            color: #222;
        }

        .deskripsi {
            color: #666;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th {
            background: #1764d8;
            color: white;
            padding: 15px;
            text-align: center;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #f5f8ff;
        }

        .total {
            margin-top: 25px;
            font-size: 15px;
        }

        .hapus {
            background: #dc3545;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 13px;
        }

        .hapus:hover {
            background: #b02a37;
        }

        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            .content {
                padding: 12px;
                overflow-x: auto;
            }

            table {
                min-width: 600px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="content">

        <h2>Data Siswa</h2>
        <a href="tambah_siswa.php"
style="
display:inline-block;
background:#1764d8;
color:white;
padding:10px 15px;
text-decoration:none;
border-radius:5px;
margin-bottom:15px;
">
+ Tambah Siswa
</a>

        <p class="deskripsi">
            Daftar seluruh siswa yang tersimpan di database.
        </p>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>

            <?php
            if ($total > 0) {
                $no = 1;

                while ($data = mysqli_fetch_assoc($query)) {
            ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['nama_siswa']); ?></td>
                <td><?= htmlspecialchars($data['kelas']); ?></td>
                <td><?= htmlspecialchars($data['alamat']); ?></td>
                <td>
                    <a class="hapus"
                       href="data_siswa.php?hapus=<?= $data['id']; ?>"
                       onclick="return confirm('Yakin ingin menghapus siswa ini?')">
                       Hapus
                    </a>
                </td>
            </tr>

            <?php
                }
            } else {
            ?>

            <tr>
                <td colspan="5">Belum ada data siswa</td>
            </tr>

            <?php } ?>

        </table>

        <div class="total">
            Total Data: <b><?= $total; ?> Siswa</b>
        </div>

    </div>
</div>

</body>
</html>