<?php
// Kelas ini menangani koneksi ke database
class Database {
// Atribut private untuk menyimpan informasi koneksi database
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pweb2_tugas2";
    protected $koneksi = "";
// Constructor untuk membuat koneksi ke database
    function __construct() 
    {
	// Membuat koneksi ke database menggunakan mysqli_connect
       $this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  	// Mengecek apakah koneksi berhasil atau gagal
	if (mysqli_connect_errno()) {
	// Menampilkan pesan kesalahan jika koneksi gagal
        echo "Koneksi database gagal : " . mysqli_connect_error();
       }
    }
} 
// Metode Menampilkan data Students
function tampil_data_students()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM student");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

// Metode Menampilkan data Achievements
    function tampil_data_achievements()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM achievements");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
// Method untuk mengambil data dari tabel student
class Students extends Database {

    function tampil_data_students(){
        $query = "SELECT * FROM student"; // Query SQL untuk memilih semua data dari tabel student
        $data = mysqli_query($this->koneksi, $query); // Eksekusi query
        while($row = mysqli_fetch_array($data)){ // Mengambil hasil query dalam bentuk array
			$hasil[] = $row; // Menyimpan setiap baris data ke array hasil
		}
		return $hasil;  // Mengembalikan array hasil

    }
}

class Achievements extends Database {
    // Method untuk mengambil data dari tabel achievements
    function tampil_data_achievements(){
        $query = "SELECT * FROM achievements"; // Query SQL untuk memilih semua data dari tabel achievements
        $data = mysqli_query($this->koneksi, $query); // Eksekusi query
        while($row = mysqli_fetch_array($data)){ // Mengambil hasil query dalam bentuk array
			$hasil[] = $row; // Menyimpan setiap baris data ke array hasil
		}
		return $hasil; // Mengembalikan array hasil


    }
}
?>
