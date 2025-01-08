<?php
session_start();
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['submit'])) {
        include('../koneksi.php');

        $user_id = $_POST['user_id'];
        $kategori_id = $_POST['kategori_id'];
        $judul_berita = $_POST['judul_berita'];
        $isi_berita = $_POST['isi_berita'];
        $date_created = date('Y-m-d H:i:s');

        // Handle file upload
        $file_upload = '';
        if (!empty($_FILES['file_upload']['name'])) {
            $target_directory = "../assets/img/berita/";
            $file_upload = time() . '_' . basename($_FILES['file_upload']['name']);
            $target_file = $target_directory . $file_upload;
            var_dump($target_file);die;
            if (!move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file)) {
                echo "Error uploading file.";
                exit; // Stop execution if file upload fails
            }
        }

        $insert = mysqli_query($db, "INSERT INTO berita (user_id, kategori_id, judul_berita, file_upload, isi_berita, date_created) VALUES ('$_SESSION[user_id]', $kategori_id, '$judul_berita', '$file_upload', '$isi_berita', '$date_created')");
        if ($insert) {
            echo("<script>window.location='index.php?p=berita'</script>"); 
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}

if ($_GET['proses'] == 'delete') {
    include('../koneksi.php');

    // Delete the file if exists
    $id = $_GET['id'];
    $getFileQuery = mysqli_query($db, "SELECT file_upload FROM berita WHERE id = '$id'");
    $fileData = mysqli_fetch_array($getFileQuery);
    if ($fileData && file_exists("uploads/" . $fileData['file_upload'])) {
        unlink("uploads/" . $fileData['file_upload']);
    }

    $hapus = mysqli_query($db, "DELETE FROM berita WHERE id = '$id'");

    if ($hapus) {
        header("location:index.php?p=berita");
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['submit'])) {
        include('../koneksi.php');

        $id = $_POST['id'];
        $user_id = $_POST['user_id'];
        $kategori_id = $_POST['kategori_id'];
        $judul_berita = $_POST['judul_berita'];
        $isi_berita = $_POST['isi_berita'];

        // Handle file upload if new file is provided
        $file_upload = $_POST['existing_file'];
        if (!empty($_FILES['file_upload']['name'])) {
            $target_directory = "../assets/img/berita/";
            $file_upload = basename($_FILES['file_upload']['name']);
            $target_file = $target_directory . $file_upload;

            if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file)) {
                // Delete old file
                if (file_exists("uploads/" . $_POST['existing_file'])) {
                    unlink("uploads/" . $_POST['existing_file']);
                }
            } else {
                echo "Error uploading file.";
                exit; // Stop execution if file upload fails
            }
        }

        $update = mysqli_query($db, "UPDATE berita SET 
            user_id='$user_id', 
            kategori_id='$kategori_id', 
            judul_berita='$judul_berita', 
            file_upload='$file_upload', 
            isi_berita='$isi_berita' 
            WHERE id='$id'");

        if ($update) {
            echo("<script>window.location='index.php?p=berita'</script>");
        } else {
            echo "Error: " . mysqli_error($db);
        }
    }
}
?>