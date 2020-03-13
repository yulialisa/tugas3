<?php

if($_SERVER['REQUEST METHOD']=='POST'){
	$response = array();

	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$sesi = $_POST['sesi'];

	require_once('dbConnect.php');

	$sql = "SELECT * FROM mahasiswa WHERE nim = '$nim'";
	$check = mysqli_fetch_array(mysqli_query($con,$sql));
	if(isset($check)){
		$response["value"] = 0;
		$response["message"] = "oops! NIM sudah terdaftar!";
		echo json_encode($response);
	}else {
		$sql = "INSERT INTO mahasiswa (nim,nama,kelas,sesi) VALUES('$nim','$nama','kelas','sesi')";
		if(mysqli_query($con,$sql)){
			$response["value"] = 1;
			$response["message"] = "suskses mendaftar";
			echo json_encode($response);
		}else {
			$response["value"] = 0;
			$response["message"] = oops! coba lagi!;
			echo json_encode($response);
		}
	}

	mysqli_close($con);
} else {
	$response["value"] = 0;
	$response["message"] = "oops! vcoba lagi!";
	echo json_encode($response);
}