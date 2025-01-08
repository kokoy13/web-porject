<?php
    if($_GET['proses']=='insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');

            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $level = $_POST['level'];

            $insert = mysqli_query($db,"INSERT INTO user(full_name, email, password, level) VALUES ('$nama','$email','$password', '$level')");
            if($insert){
                echo("<script>window.location='index.php?p=user'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }

    if($_GET['proses']=='delete'){

        include('../koneksi.php');
        $hapus = mysqli_query($db, "DELETE FROM user WHERE id = '".$_GET['id']."'");
    
        if($hapus){
            header("location:index.php?p=user");
        }
    }

    if($_GET['proses']=='update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');

            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $level = $_POST['level'];

            $update = mysqli_query($db,"UPDATE user SET 
                id = $id,
                full_name = '$nama',
                email = '$email',
                password = '$password',
                level = '$level' 
                WHERE id = $id");
            if($update){
                echo("<script>window.location='index.php?p=user'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
?>