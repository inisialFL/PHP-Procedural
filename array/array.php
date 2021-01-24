<?php
//array
//Variabel yang dapat memiliki banyak nilai
//Elemen pada Array boleh memiliki tipe data yang berbeda
//Pasangan antara Key dan Value
//Key-nya adalah Index, yang dimulai dari 0

//Membuat Array
//Cara lama
$hari =array("Senin","Selasa","Rabu","Kamis");

//Cara baru
$bulan =["Januari","Februari","Maret","April"];

//Elemen pada Array boleh memiliki tipe data yang berbeda
$array1 =[123, "Mangga", false];

//Menampilkan Array
//var_dump() //print_r()
//echo $hari; (salah)
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

//Menampilkan 1 elemen pada Array
//Echo khusus untuk satu elemen
//echo $array1[0];
//echo "<br>";
//echo $bulan[1];

//Menambahkan elemen baru pada array
//var_dump($hari);
//$hari[] ="Jum'at";
//$hari[] ="Sabtu";
//echo "<br>";
//var_dump($hari);
?>

