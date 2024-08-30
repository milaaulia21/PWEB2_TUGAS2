# PRAKTIKUM PEMROGRAMAN WEB II - TUGAS 2 (Implemented CRUD using PHP OOP)

## Introduction
JKB Academic Advising Information System (SIWALI JKB) is a comprehensive
academic advising management system designed to streamline the process of
managing student performance, counseling, and other academic data for higher
education institutions.

## ERD
![alt text](https://github.com/milaaulia21/PWEB2_TUGAS2/blob/main/Output/ERD.png?raw=true)

## Case Study
- NPM 5,6: students & achievements 

## Task
1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database 
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study 

## Hasil 

### Code (koneksi.php)
    <?php
    class Database {
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "pweb2_tugas2";
        protected $koneksi = "";
    
        function __construct() 
        {
           $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
           if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
           }
        }
    }
    ?>

#### Penjelasan 
- *Kelas Database*: Kelas ini bertanggung jawab untuk mengatur koneksi ke database.
- **Enkapsulasi**: Atribut `$host`, `$username`, `$password`, dan `$database` dideklarasikan sebagai `private` untuk melindungi akses langsung dari luar kelas. Atribut `$koneksi` dideklarasikan sebagai `protected` agar dapat diakses oleh kelas turunan.
- **Constructor**: Metode `__construct()` secara otomatis dipanggil saat objek dibuat. Metode ini menginisialisasi koneksi database menggunakan `mysqli_connect()`. Jika koneksi gagal, pesan kesalahan ditampilkan.


### Code (koneksi.php)
    <?php
    class Students extends Database {
    
        function tampil_data_students(){
            $query = "SELECT * FROM student";
            $data = mysqli_query($this->koneksi, $query);
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    
    class Achievements extends Database {
        
        function tampil_data_achievements(){
            $query = "SELECT * FROM achievements";
            $data = mysqli_query($this->koneksi, $query);
            while($row = mysqli_fetch_array($data)){
                $hasil[] = $row;
            }
            return $hasil;
        }
    }
    ?>

#### Penjelasan
- *Pewarisan (Inheritance)*: 
  - Kelas `Students` dan `Achievements` mewarisi dari kelas `Database`. Ini memungkinkan mereka untuk menggunakan koneksi database tanpa harus membuat koneksi baru di setiap kelas.
- *Metode*: 
  - **`tampil_data_students()`** dan **`tampil_data_achievements()`** adalah metode yang meng-query tabel `student` dan `achievements` dari database, masing-masing. Mereka mengembalikan data sebagai array hasil query.
- *Polimorfisme*:
  - Meskipun tidak secara eksplisit digunakan dalam kode ini, jika ada metode dengan nama yang sama di kelas yang berbeda yang memiliki perilaku berbeda, ini akan menjadi contoh polimorfisme.

### Code (tampl_students.php)
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
                width: 80%;
                max-width: 1200px;
                margin-top: 20px;
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

#### Penjelasan
- *Instansiasi Kelas*: Objek `Students` dibuat dan metode `tampil_data_students()` dipanggil untuk mendapatkan data.
- *Tampilan*: Data yang diperoleh ditampilkan dalam tabel HTML. CSS digunakan untuk memastikan tabel dan konten ditata dengan baik.
- *Enkapsulasi dan Abstraksi*: Detail implementasi koneksi database dan pengambilan data disembunyikan dalam kelas `Students` dan `Achievements`. Pengguna hanya berinteraksi dengan metode `tampil_data_students()` dan `tampil_data_achievements()`.


### Code (tampil_achievements.php)
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
                width: 80%;
                max-width: 1200px;
                margin-top: 20px;
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

#### Penjelasan 
- *Instansiasi Kelas*: Objek `Achievements` dibuat dan metode `tampil_data_achievements()` dipanggil untuk mendapatkan data.
- *Tampilan*: Data yang diperoleh ditampilkan dalam tabel HTML. CSS memastikan bahwa tabel ditata dengan baik dan responsif.


### Output (tampil_data_students.php)
![alt text](https://github.com/milaaulia21/PWEB2_TUGAS2/blob/main/Output/tampil_data_students.PNG?raw=true)

### Output (tampil_data_achievements.php)
![alt text](https://github.com/milaaulia21/PWEB2_TUGAS2/blob/main/Output/tampil_data_achievements.PNG?raw=true)




