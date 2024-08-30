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

function tampil_data_students()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM student");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

    function tampil_data_achievements()
	{
		$data = mysqli_query($this->koneksi,"SELECT * FROM achievements");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

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