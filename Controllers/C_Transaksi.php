<?php

include_once '../Models/M_Transaksi.php';

$tran = new M_Transaksi(); //buat objek

$trans = $tran->SHOW_TRANSAKSI(); // panggil fungsi tampil data dari class M_Transaksi()