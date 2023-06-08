<?php 

// koneksi database

$koneksi = mysqli_connect("localhost","root","","db");

$password_lama = md5($_POST['pass_lama']);

//panggil username

$email = $_POST['email'];
$full_name = $_POST['full_name'];

//uji jika password lama sesuai

$tampil = mysqli_query($koneksi, "SELECT * FROM users WHERE full_name = '$full_name' and password = '$password_lama' ");

$data = mysqli_fetch_array($tampil);

if($data){
    $password_baru = $_POST['pass_baru'];
    $konfirmasi_password = $_POST['konfirmasi_pass'];

    if($password_baru == $konfirmasi_password){
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "update users set password ='$pass_ok' where id = '$data[id]'");
        
        if($ubah){
            echo "<script>alert('password anda berhasil di ubah silahkan login ulang !');document.location='profile.php'</script>";
        }
    }else{
        echo "<script>alert('maaf Password baru & konfirmasi tidak sama !');document.location='profile.php'</script>";

    }
}else{
    echo "<script>alert('maaf Password lama anda tidak sesuai !');document.location='profile.php'</script>";
}