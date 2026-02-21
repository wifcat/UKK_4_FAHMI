<?php
if($_SESSION['role'] != 'admin'){
    die("<h1>Akses ditolak!</h1><p>Oops! sepertinya Anda tidak memiliki akses ke halaman ini.</p>");
}