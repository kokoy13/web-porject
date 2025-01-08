<?php
    include('koneksi.php');

    function query($query)
    {
        global $db;
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function news(){
        $query = query("SELECT id, judul_berita, file_upload, isi_berita, date_created FROM berita order by date_created DESC");
        return $query;
    }

    function news2(){
        $query = query("SELECT id, judul_berita, file_upload, isi_berita, date_created FROM berita order by date_created DESC limit 8");
        return $query;
    }

    function getUser(){
        $query = query("SELECT * FROM user");
        return $query;
    }
?>