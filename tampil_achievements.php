<?php 	
include('koneksi.php'); // Menyertakan file koneksi.php untuk akses ke kelas dan koneksi database
$data = new Achievements(); // Membuat objek dari kelas Achievements
$tampil = $data->tampil_data_achievements(); // Mengambil data achievements menggunakan metode kelas Achievements
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Achievements</title>
</head>
<body>
<style>
    /* CSS untuk tata letak halaman dan tabel */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 80%; /* Menentukan lebar tabel */
            max-width: 1200px; /* Menentukan lebar maksimum tabel */
            margin-top: 20px;  /* Menambahkan jarak atas tabel */
        }
        th, td {
            border: 1px solid #ddd; /* Menambahkan border pada sel tabel */
            padding: 10px; /* Menambahkan padding pada sel tabel */
            text-align: left; /* Menyelaraskan teks ke kiri */
        }
        th {
            background-color: #f4f4f4;  /* Menambahkan warna latar belakang pada header tabel */
            font-weight: bold; /* Membuat teks header tabel tebal */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Menambahkan warna latar belakang bergantian pada baris tabel */
        }
        h1 {
            margin: 0;
            padding: 0;
        }
    </style>
    <h1>Data Achievements</h1>
    <table>
        <tr>
            <th>No</th>
            <th>ID Student</th>
            <th>Achievement Type</th>
            <th>Level</th>
        </tr>
        <?php
        $no = 1; // Inisialisasi nomor urut
        foreach($tampil as $row) {
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['id_student']); ?></td>
                <td><?php echo htmlspecialchars($row['achievement_type']); ?></td>
                <td><?php echo htmlspecialchars($row['level']); ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</body>
</html>
