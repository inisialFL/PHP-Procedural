<?php

	//Date/Time//

	//date//
		//echo date("l, d-M-Y");

	//time//
		//echo time();

	//Menentukan hari, dua hari dari sekarang
		//echo date("l", time()+172800);
		//echo date("l, d M Y", time()+60*60*24*2);

	//mkTime//
	//membuat detik sendiri
	//jam, menit, detik, bulan, tanggal, tahun
		//mktime(0,0,0,0,0,0,)
	//Mengecek hari lahir sesuai tanggal
		//echo date("l", mktime(0,0,0,02,02,1997));

	//strtotime//
		echo date("l", strtotime("02 Feb 1997"));
