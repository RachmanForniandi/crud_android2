<?php 
require_once('config.php');
if($_SERVER['REQUEST_METHOD']=='GET'){
	$sql = "SELECT * FROM mahasiswa ORDER BY nama ASC";
	$res = mysqli_query($koneksi,$sql);
	$result = array();
	while ($row = mysqli_fetch_array($res)) {
		array_push($result, array('nim'=>$row[0],'nama'=>$row[1],'jurusan'=>$row[2],'jenis_kelamin'=>$row[3]));
	}
	echo json_encode(array('value' =>1 ,'result'=>$result));
	mysqli_close($koneksi);
}
?>