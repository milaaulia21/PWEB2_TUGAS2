# PRAKTIKUM PEMROGRAMAN WEB II - TUGAS 2 (Implemented CRUD using PHP OOP)

## Introduction
JKB Academic Advising Information System (SIWALI JKB) is a comprehensive
academic advising management system designed to streamline the process of
managing student performance, counseling, and other academic data for higher
education institutions.

## ERD

## Case Study
- NPM 5,6: students & achievements 

## Task
1. Create an OOP-based View, by retrieving data from the MySQL database
2. Use the _construct as a link to the database 
3. Apply encapsulation according to the logic of the case study
4. Create a derived class using the concept of inheritance
5. Apply polymorphism for at least 2 roles according to the case study 

## Hasil 

### 1. Koneksi Database dan Kelas Dasar

#### Code (koneksi.php)
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


### 2. Kelas Turunan 

#### Code (koneksi.php)
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







