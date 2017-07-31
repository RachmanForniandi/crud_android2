<?php
require_once('config.php'); 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$response = array();
	//utk mendapatkan data mahasiswa
	$nrp = $_POST['nrp'];

	$sql = "DELETE FROM mahasiswa WHERE nrp ='$nrp'";
	$check = mysqli_fetch_array(mysqli_query($koneksi,$sql));
	
		if (mysqli_query($koneksi,$sql)) {
		$response["value"] = 1;
		$response["message"] ="Data Berhasil dihapus !";
		echo json_encode($response);
	}else{
		$response["value"] = 0;
		$response["message"] ="oops! Data gagal dihapus.";
		echo json_encode($response);
		}
	}
	//tutup database
	mysqli_close($koneksi);
}
?>