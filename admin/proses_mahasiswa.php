<?php
    if($_GET['proses'] == 'insert'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');

            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $email = $_POST['email'];
            $alamat = $_POST['alamat'];
            $prodi = (int)$_POST['prodi'];
            $hobis = $_POST['hobi'];
            $tgl = $_POST['tgl'];
            $bln = $_POST['bln'];
            $thn = $_POST['thn'];

            $tgl_lhr = $thn . '-' . $bln . '-' . $tgl;
            $hobby = implode(',', $hobis);
            // var_dump($_POST);die;

            $insert = mysqli_query($db,"INSERT INTO mahasiswa VALUES ('$nim','$nama','$tgl_lhr','$jk','$email','$alamat',$prodi,'$hobby')");
            if($insert){
                echo("<script>window.location='index.php?p=mhs'</script>");
            }else{
                echo('Query Salah');
            }

        }
    }
    if($_GET['proses'] == 'delete'){
        include('../koneksi.php');
        $hapus = mysqli_query($db, "DELETE FROM mahasiswa WHERE nim = $_GET[nim]");

        if($hapus){
            header("location:index.php?p=mhs");
        }
    }
    if($_GET['proses'] == 'update'){
        if(isset($_POST['submit'])){
            include('../koneksi.php');
            
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $jk = $_POST['jk'];
            $prodi = $_POST['prodi'];
            $hobis = $_POST['hobi'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $tgl = $_POST['tgl'];
            $bln = $_POST['bln'];
            $thn = $_POST['thn'];

            $tgl_lhr = $thn . '-' . $bln . '-' . $tgl;
            $hobby = implode(',', $hobis);


            $update = mysqli_query($db,"UPDATE mahasiswa SET 
                nama='$nama',
                tanggal_lahir='$tgl_lhr',
                jenis_kelamin='$jk',
                email='$email',
                alamat='$alamat',
                prodi_id='$prodi',
                hobi='$hobby'
                WHERE nim='$nim'");
            if($update){
                echo("<script>window.location='index.php?p=mhs'</script>");
            }else {
                echo "Error: " . mysqli_error($db);
            }

        }
    }
