<?php
    if($_GET['proses']=='insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $kode_mk = $_POST['kode_mk'];
            $nama_mk = $_POST['nama_mk'];
            $sks = (int)$_POST['sks'];
            $prodi_id = (int)$_POST['prodi'];
            $semester = (int)$_POST['semester'];


            $insert = mysqli_query($db,"INSERT INTO mata_kuliah VALUES ('$kode_mk','$nama_mk',$sks, $prodi_id, $semester)");
            if($insert){
                echo("<script>window.location='index.php?p=mk'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }

    if($_GET['proses']=='delete'){

        include('../koneksi.php');
        $hapus = mysqli_query($db, 'DELETE FROM mata_kuliah WHERE kode_mk = "'.$_GET['kode_mk'].'"');
        if($hapus){
            header("location:index.php?p=mk");
        }
    }

    if($_GET['proses']=='update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $kode_mk = $_POST['kode_mk'];
            $nama_mk = $_POST['nama_mk'];
            $sks = (int)$_POST['sks'];
            $prodi_id = (int)$_POST['prodi'];
            $semester = (int)$_POST['semester'];


            $update = mysqli_query($db,"UPDATE mata_kuliah SET 
                kode_mk ='$kode_mk',
                nama_mk ='$nama_mk',
                sks = $sks,
                prodi_id = $prodi_id,
                semester = $semester
                WHERE kode_mk = '$kode_mk'");
            if($update){
                echo("<script>window.location='index.php?p=mk'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
?>