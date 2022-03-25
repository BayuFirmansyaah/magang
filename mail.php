<?php

$to = "bayufirmansyah2800@gmail.com";
$subject = "kode otp 699193";
$headers = "FROM: STACTAL";

ini_set("SMTP", "localhost");
ini_set("smtp_port", "25");
ini_set("sendmail_from", "magang.siswa.otp@gmail.com");
ini_set("sendmail_path", "C:\xampp\senmail\sendmail.exe -t");

mail($to, "kode otp 190603", $headers);
