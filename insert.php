<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$response = array();
	//utk mendapatkan data mahasiswa
	$nrp = $_POST['nrp'];
	$nama = $_POST['nama'];
	$jurusan= $_POST['jurusan'];
	$jenis_kelamin = $_POST['jenis_kelamin'];

	require_once('config.php');
	$sql = "SELECT * FROM mahasiswa WHERE nrp ='$nrp'";
	$check = mysqli_fetch_array(mysqli_query($koneksi,$sql));
	if (isset($check)) {
		$response["value"] = 0;
		$response["message"] ="oops! nrp sudah terdaftar. Harap periksa kembali";
		echo json_encode($response);
	}else{
		$sql ="INSERT INTO mahasiswa(nrp,nama,jurusan,jenis_kelamin)VALUES('$nrp','$nama','$jurusan','$jenis_kelamin')";
		if (mysqli_query($koneksi,$sql)) {
		$response["value"] = 1;
		$response["message"] ="Sukses terdaftar !";
		echo json_encode($response);
	}else{
		$response["value"] = 0;
		$response["message"] ="oops! coba lagi!";
		echo json_encode($response);
		}
	}
	//tutup database
	mysqli_close($koneksi);
}else{
	$response["value"] = 0;
	$response["message"] ="oops! coba lagi!";
		echo json_encode($response);
}
?>