<?php
    $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

    switch ($aksi) {
        case 'list':
?>

        <a href="?p=mk&aksi=input" class="btn btn-primary mb-5">Tambah Mata Kulaih</a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Prodi ID</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
            <?php 
                include('../koneksi.php');
                $getData = mysqli_query($db,"SELECT * FROM mata_kuliah JOIN prodi ON mata_kuliah.prodi_id = prodi.id");
                while($arrData = mysqli_fetch_array($getData)){
            ?>
            <tr>
                <td><?= $arrData['kode_mk'] ?></td>
                <td><?= $arrData['nama_mk'] ?></td>
                <td><?= $arrData['sks'] ?></td>
                <td><?= $arrData['prodi_id'] ?></td>
                <td><?= $arrData['semester'] ?></td>
                <td class="d-flex gap-3">
                    <a href="?p=mk&aksi=edit&kode_mk=<?= $arrData['kode_mk'] ?>" class="btn btn-warning">edit</a>
                    <a href="proses_matakuliah.php?proses=delete&kode_mk=<?= $arrData['kode_mk'] ?>" class="btn btn-danger"  onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
                </td>
            </tr>
        <?php 
            $no++;
            } 
        ?>
    </table>

<?php 
            break;
        case 'input':
?>
    <div class="row justify-content-center  py-5">    
        <form action="proses_matakuliah.php?proses=insert" method="post" class="col-md-4">
        <h3 class="mb-5">Form Mata Kuliah</h3>
            <div class="mb-3 pb-3">
                <label for="kode_mk" class="form-label">Kode MK</label>
                <input type="text" name="kode_mk" class="form-control" id="kode_mk" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" class="form-control" id="nama_mk" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" name="sks" class="form-control" id="sks" required autofocus>
            </div>
            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <select name="prodi" class="form-select">
                                        <option value="">--Pilih Prodi--</option>
                                        <?php
                                        include '../koneksi.php';
                                        $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                                        while ($data_prodi = mysqli_fetch_assoc($ambil_prodi)) {
                                            echo "<option value='" . $data_prodi['id'] . "'>" . $data_prodi['nama_prodi'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
            </div>
            <div class="mb-3 pb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" name="semester" class="form-control" id="semester" required autofocus>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>

    </div>
<?php 
            break;
        case 'edit':

?>

<?php
        include('../koneksi.php');
        $kode_mk = $_GET['kode_mk'];
        $getData = mysqli_query($db,"SELECT * FROM mata_kuliah JOIN prodi ON mata_kuliah.prodi_id = prodi.id WHERE kode_mk = '$kode_mk'");
        $arrData = mysqli_fetch_array($getData);
    ?>


    <div class="row justify-content-center  py-5">    
        <form action="proses_matakuliah.php?proses=update" method="post" class="col-md-4">
        <h3 class="mb-5">Edit Mata Kuliah</h3>
            <div class="mb-3 pb-3">
                <label for="kode_mk" class="form-label">Kode MK</label>
                <input type="text" name="kode_mk" class="form-control" id="kode_mk" required autofocus value="<?= $arrData['kode_mk'] ?>" disabled>
                <input type="hidden" name="kode_mk" class="form-control" id="kode_mk" required autofocus value="<?= $arrData['kode_mk'] ?>">
            </div>
            <div class="mb-3 pb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" name="nama_mk" class="form-control" id="nama_mk" value="<?= $arrData['nama_mk'] ?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" name="sks" class="form-control" id="sks" value="<?= $arrData['sks'] ?>">
            </div>
            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Prodi</label>
                                <div class="col-sm-8">
                                    <select name="prodi" class="form-select">
                                        <option value="<?= $arrData['prodi_id'] ?>"><?=$arrData['nama_prodi']?></option>
                                        <?php
                                        include '../koneksi.php';
                                        $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                                        while ($data_prodi = mysqli_fetch_assoc($ambil_prodi)) {
                                            echo "<option value='" . $data_prodi['id'] . "'>" . $data_prodi['nama_prodi'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
            </div>
            <div class="mb-3 pb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" name="semester" class="form-control" id="semester" required autofocus value="<?=$arrData['semester']?>">
            </div>
            <button type="submit" class="btn btn-warning" name="submit">Update</button>
            
        </form>

        <?php 
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

                $JenisKelamin = $jk == 'L' ? 'Laki-Laki' : 'Perempuan';
                $jurusan;

                $tgl_lhr = $thn . '-' . $bln . '-' . $tgl;
                $hobby = implode(',', $hobis);


                $update = mysqli_query($db,"UPDATE mahasiswa SET 
                    nama='$nama',
                    tgl_lahir='$tgl_lhr',
                    jk='$jk',
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
        ?>

    </div>

<?php 
        break;
    }
?>