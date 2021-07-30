<?php

include 'config.php';

session_start();

error_reporting(0);

if(isset($_POST['submit'])) {
    $cek = mysqli_query($koneksi, "SELECT * FROM databaru WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
    $hasil = mysqli_fetch_array($cek);
    $count = mysqli_num_rows($cek);
    $nama_user = $hasil['nama'];
    if($count > 0){
        session_start();
        $_SESSION['nama'] = $nama_user;
        header("location:index2.php");
    }else{
        echo "<script>alert('Woops! ID or Password is Wrong.')</script>";
    }
}
?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="loginstyle.css">
        <title>Login</title>        
    </head>

    <body>
        <div class="container">
            <form action="" method="POST" class="login-id">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
                <div class="input-group">
				    <input type="username" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			    </div>
			    <div class="input-group">
				    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			    </div>
			    <div class="input-group">
				    <button name="submit" class="btn">Login</button>
			    </div>

            </form>
        </div>    

    </body>
</html>