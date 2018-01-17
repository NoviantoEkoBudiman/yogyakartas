<?php
$link = mysqli_connect("127.0.0.1", "root", "", "yogyakartas");

if(!$link){
	echo "Koneksi Error". PHP_EOL;
	echo "Error dikarenakan: ".mysqli_connect_error() . PHP_EOL;
	exit;
}
	echo "Sukses besar dab!" .PHP_EOL;

	mysqli_close($link);
