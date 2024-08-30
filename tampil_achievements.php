<?php 	
include('koneksi.php');
$data = new Achievements();
$tampil = $data->tampil_data_achievements();
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
            width: 80%; /* Adjust width as needed */
            max-width: 1200px; /* Optional: set a maximum width */
            margin-top: 20px; /* Space between title and table */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
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
        $no = 1;
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