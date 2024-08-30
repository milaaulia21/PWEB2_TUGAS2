<?php
include('koneksi.php');
$data = new Students();
$tampil = $data->tampil_data_students();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Students</title>
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
        $no = 1;
        foreach($tampil as $row) {
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
