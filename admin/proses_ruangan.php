<?php
    if($_GET['proses']=='insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $kode_ruangan = $_POST['kode_ruangan'];
            $nama_ruangan = $_POST['nama_ruangan'];
            $gedung = $_POST['gedung'];
            $lantai = (int)$_POST['lantai'];
            $kapasitas = (int)$_POST['kapasitas'];
            $keterangan = $_POST['keterangan'];

            $insert = mysqli_query($db,"INSERT INTO ruangan (kode_ruangan,nama_ruangan, gedung, lantai, kapasitas ,keterangan) VALUES ('$kode_ruangan','$nama_ruangan','$gedung',$lantai, $kapasitas,'$keterangan')");
            if($insert){
                echo("<script>window.location='index.php?p=ruangan'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }

    if($_GET['proses']=='delete'){

        include('../koneksi.php');
        $hapus = mysqli_query($db, "DELETE FROM ruangan WHERE id = '".$_GET['id']."'");
    
        if($hapus){
            header("location:index.php?p=ruangan");
        }
    }

    if($_GET['proses']=='update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');

            $id = (int)$_GET['id'];
            $kode_ruangan = $_POST['kode_ruangan'];
            $nama_ruangan = $_POST['nama_ruangan'];
            $gedung = $_POST['gedung'];
            $lantai = (int)$_POST['lantai'];
            $kapasitas = (int)$_POST['kapasitas'];
            $keterangan = $_POST['keterangan'];


            $update = mysqli_query($db,"UPDATE ruangan SET 
                kode_ruangan = '$kode_ruangan',
                nama_ruangan = '$nama_ruangan',
                gedung = '$gedung',
                lantai = $lantai,
                kapasitas = $kapasitas,
                keterangan = '$keterangan'
                WHERE id = $id");
            if($update){
                echo("<script>window.location='index.php?p=ruangan'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
?>