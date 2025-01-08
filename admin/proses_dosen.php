<?php

if($_GET['proses']=='insert'){
    

    if (isset($_POST['submit'])) {
        include '../koneksi.php';

        $nip = (int)$_POST['nip'];
        $dosen = $_POST['nama_dosen'];
        $email = $_POST['email'];
        $prodi = (int)$_POST['prodi'];
        $telp = $_POST['notelp'];
        $alamat = $_POST['alamat'];

        $sql = mysqli_query($db, "INSERT INTO dosen (nip, nama_dosen, email, prodi_id, telp, alamat) VALUES($nip, '$dosen', '$email', $prodi, '$telp', '$alamat')");
        if ($sql) {
            echo "<script> alert ('Data Sudah Di Input');window.location='index.php?p=dosen';</script>";
            //echo "<script>window.location"
        }else{
            echo "Query Error";
        }

    }

    

}

    

if($_GET['proses']=='delete'){
    
    include '../koneksi.php';
    
    if (isset($_GET['nip'])) {
        $nip = $_GET['nip'];
        $hapus = mysqli_query($db, "DELETE FROM dosen WHERE nip='$nip'");
    
        if ($hapus) {
            echo "<script>alert('Data berhasil dihapus'); window.location='index.php?p=dosen';</script>";
        }
    }
    
    

}

if($_GET['proses']=='update'){
    if(isset($_POST['update'])){
    include'../koneksi.php';

   $sql= mysqli_query($db,"UPDATE dosen SET
   nama_dosen ='$_POST[nama_dosen]',
   email ='$_POST[email]',
   prodi_id ='$_POST[prodi]',
   telp ='$_POST[notelp]',
   alamat ='$_POST[alamat]' WHERE nip='$_POST[nip]'");
    
   if($sql){
    echo "<script>alert('Data berhasil Diedit');window.location='index.php?p=dosen'</script>";
        }
    else{
    die("Query error: " . mysqli_error($db));
        }
    }
}