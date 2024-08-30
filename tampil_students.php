<?php
include('koneksi.php'); // Menyertakan file koneksi.php untuk akses ke kelas dan koneksi database
$data = new Students();  // Membuat objek dari kelas Students
$tampil = $data->tampil_data_students(); // Mengambil data student menggunakan metode kelas Students
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Students</title>
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
            margin-top: 20px; /* Menambahkan jarak atas tabel */
        }
        th, td {
            border: 1px solid #ddd; /* Menambahkan border pada sel tabel */
            padding: 10px; /* Menambahkan padding pada sel tabel */
            text-align: left; /* Menyelaraskan teks ke kiri */
        }
        th {
            background-color: #f4f4f4; /* Menambahkan warna latar belakang pada header tabel */
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
</head>
<body>
    <h1>Data Students</h1>
    <table>
        <tr>
            <th>No</th>
            <th>ID Class</th>
            <th>Student Number</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>ID User</th>
            <th>Signature</th>
        </tr>
        <?php 
        $no = 1; // Inisialisasi nomor urut
        foreach($tampil as $row) { // Mengiterasi array data student
            ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo htmlspecialchars($row['id_class']); ?></td>
                <td><?php echo htmlspecialchars($row['student_number']); ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                <td><?php echo htmlspecialchars($row['address']); ?></td>
                <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                <td><?php echo htmlspecialchars($row['signature']); ?></td>
            </tr>
            <?php 
        }
        ?>
    </table>
</body>
</html>
