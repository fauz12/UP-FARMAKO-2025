<?php
session_start();
session_destroy();
header('location:landing.php');
// ini kode jika admin atau user klik logout maka akan diarahkan ke halaman landing.page