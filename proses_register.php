<?php

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    $level = "customer";
    $status = "on";
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    // $re_password = $_POST['re_password'];

    unset($_POST['password']);
    
    $dataForm = http_build_query($_POST);

    $query = mysqli_query($koneksi, "SELECT * FROM USER WHERE email=$email");

    if(empty($nama_lengkap) OR empty($email) OR empty($phone) OR empty($alamat) OR empty($password)){
        direct(BASE_URL."index.php?page=register&notif=require&$dataForm");
    }elseif(mysqli_num_rows($query) == 1){
        direct(BASE_URL."index.php?page=register&notif=email&$dataForm");
    }else {
        $password=md5($password);
    mysqli_query($koneksi, "INSERT INTO USER (level, nama, email, alamat, phone, password, status) VALUES ('$level', '$nama_lengkap', '$email', '$alamat', '$phone', '$password', '$status')");
    direct(BASE_URL."index.php?page=login");

    }

?>
