<?php
require_once('config.php'); 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$respon = array();
	//utk mendapatkan data mahasiswa
	$nrp = $_POST['nrp'];
	$nama = $_POST['nama'];
	$jurusan= $_POST['jurusan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];

	
	$sql = "UPDATE mahasiswa SET nama='$nama', jurusan='$jurusan', jenis_kelamin ='$jenis_kelamin' WHERE nrp ='$nrp'";
	$check = mysqli_fetch_array(mysqli_query($koneksi,$sql));
	
		if (mysqli_query($koneksi,$sql)) {
			$response["value"] = 1;
		$response["message"] ="Data Berhasil diperbarui !";
		echo json_encode($response);
	}else{
			$response["value"] = 0;
		$response["message"] ="oops! Data gagal diperbarui. Silahkan dicoba lagi!";
		echo json_encode($response);
		}
	}
	//tutup database
	mysqli_close($koneksi);
}
?>