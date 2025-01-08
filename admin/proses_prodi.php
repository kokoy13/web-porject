<?php
    if($_GET['proses']=='insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $nama_prodi = $_POST['nama_prodi'];
            $jenjang = $_POST['jenjang'];
            $ket = $_POST['ket'];


            $insert = mysqli_query($db,"INSERT INTO prodi(nama_prodi,jenjang_studi,keterangan) VALUES ('$nama_prodi','$jenjang','$ket')");
            if($insert){
                echo("<script>window.location='index.php?p=prodi'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }

    if($_GET['proses']=='delete'){

        include('../koneksi.php');
        $hapus = mysqli_query($db, "DELETE FROM prodi WHERE id = '".$_GET['id']."'");
    
        if($hapus){
            header("location:index.php?p=prodi");
        }
    }

    if($_GET['proses']=='update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $id = $_POST['id'];
            $nama_prodi = $_POST['nama_prodi'];
            $jenjang = $_POST['jenjang'];
            $ket = $_POST['ket'];


            $update = mysqli_query($db,"UPDATE prodi SET 
                nama_prodi='$nama_prodi',
                jenjang_studi='$jenjang',
                keterangan='$ket'
                WHERE id='$id'");
            if($update){
                echo("<script>window.location='index.php?p=prodi'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
?>