<?php

    include_once("function/koneksi.php");
    include_once("function/helper.php");

    //inisiasi variabel 
    $email = $_POST['email'];
    $password = md5($_POST['password']);


    $query = mysqli_query($koneksi, "SELECT * FROM USER WHERE email='$email' AND password='$password' AND status='on'" );


    if(mysqli_num_rows($query) == 0){ //kondisi apabila tidak ditemukan baris dengan data yg sama
        	
        direct(BASE_URL."index.php?page=login&notif=true");
    }else {
        $row=mysqli_fetch_assoc($query);
        session_start();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['level'] = $row['level'];

        direct(BASE_URL."index.php?page=my_profile&module=pesanan&action=list");

    }

?>
