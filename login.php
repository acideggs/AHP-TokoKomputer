<?php  
session_start();
include "connection.php";

$user = $_POST['username'];
$psw = $_POST['password'];
$op = $_GET['op'];

if ($op=="in") {
	$sql = "SELECT * FROM tabel_user WHERE username='".$user."' AND password = '".md5($psw)."'";
	$query = $koneksi-> query($sql);
	if (mysqli_num_rows($query)==1) {
		$data = $query -> fetch_array();
		$_SESSION['username'] = $data['username'];
		$_SESSION['otoritas'] = $data['otoritas'];
		if ($data['otoritas']=="admin") {
			echo "berhasil ";
			header("location: admin/home.php");
		} else if ($data['otoritas'] == "user") {
			header("location: user/home.php");
		} else {
			die("Login Gagal <a href = \"javascript:history.back()\">kembali</a>");
		}
	}else {
		die("Login Gagal <a href = \"javascript:history.back()\">kembali</a>");
	}
} else if ($op=="out") {
	unset($_SESSION['username']);
	unset($_SESSION['level']);
	header("location:login.php");
}
?>