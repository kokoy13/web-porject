<?php
    if($_GET['proses']=='insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $nama_kategori = $_POST['nama_kategori'];


            $insert = mysqli_query($db,"INSERT INTO kategori(nama_kategori) VALUES ('$nama_kategori')");
            if($insert){
                echo("<script>window.location='index.php?p=kategori'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }

    if($_GET['proses']=='delete'){

        include('../koneksi.php');
        $hapus = mysqli_query($db, "DELETE FROM kategori WHERE id = $_GET[id]");
    
        if($hapus){
            header("location:index.php?p=kategori");
        }
    }

    if($_GET['proses']=='update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $id = $_POST['id'];
            $nama_kategori = $_POST['nama_kategori'];


            $update = mysqli_query($db,"UPDATE kategori SET 
                nama_kategori='$nama_kategori'
                WHERE id='$id'");
            if($update){
                echo("<script>window.location='index.php?p=kategori'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
?>