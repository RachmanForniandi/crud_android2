<?php 
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
	$search = $_POST['search'];
	$sql = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' ORDER BY nama ASC";
	$res = mysqli_query($koneksi,$sql);
	$result = array();
	while ($row = mysqli_fetch_array($res)) {
		array_push($result, array('nrp'=>$row[0],'nama'=>$row[1],'jurusan'=>$row[2],'jenis_kelamin'=>$row[3]));
	}
	echo json_encode(array('value' =>1 ,'result'=>$result));
	mysqli_close($koneksi);
}

?>