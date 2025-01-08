
   <?php
        $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        switch($aksi){
            case 'list':
    ?>

    <a href="index.php?p=prodi&aksi=input" class="btn btn-primary mb-5">Tambah Prodi</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Nama Prodi</th>
            <th>Jenjang</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php 
            include('../koneksi.php');
            $getData = mysqli_query($db,"SELECT * FROM prodi");
            $no = 1;
            while($prodi = mysqli_fetch_array($getData)){
        ?>
            <tr>
                <td><?= $prodi['id'] ?></td>
                <td><?= $prodi['nama_prodi'] ?></td>
                <td><?= $prodi['jenjang_studi'] ?></td>
                <td><?= $prodi['keterangan'] ?></td>
                <td>
                    <a href="index.php?p=prodi&aksi=edit&id_edit=<?= $prodi['id'] ?>" class="btn btn-warning">edit</a>
                    <a href="proses_prodi.php?proses=delete&id=<?= $prodi['id'] ?>" class="btn btn-danger"  onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
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
        <form action="proses_prodi.php?proses=insert" method="post" class="col-md-4">
        <h3 class="mb-5">Form Prodi</h3>
            <div class="mb-3 pb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="jenjang" class="form-label">Jenjang</label>
                <select name="jenjang" class="form-select" id="jenjang" required>
                    <option value="" disabled selected>--- Pilih Jenjang ---</option>
                    <option value="d2">D2</option>
                    <option value="d3">D3</option>
                    <option value="d4">D4</option>
                    <option value="s2">S2</option>
                </select>
            </div>
            <div class="mb-3 pb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <textarea class="form-control" id="ket" name="ket" required></textarea>
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
        $getData = mysqli_query($db,"SELECT * FROM prodi WHERE id = $_GET[id_edit]");
        $no = 1;
        
        $prodi = mysqli_fetch_array($getData);

    ?>


    <div class="row justify-content-center  py-5">    
        <form action="" method="post" class="col-md-4">
        <h3 class="mb-5">Edit Prodi</h3>
            <div class="mb-3 pb-3">
                <label for="id" class="form-label">Id Prodi</label>
                <input type="number" name="" class="form-control" id="id" required autofocus value="<?= $prodi['id'] ?>" disabled>
                <input type="hidden" name="id" class="form-control" id="id" required autofocus value="<?= $prodi['id'] ?>">
            </div>
            <div class="mb-3 pb-3">
                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                <input type="text" name="nama_prodi" class="form-control" id="nama_prodi" value="<?= $prodi['nama_prodi'] ?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="jenjang" class="form-label">Jenjang Studi</label>
                <select name="jenjang" class="form-select" id="jenjang" required>
                    <option value="" disabled>--- Pilih Jenjang ---</option>
                    <option value="d2" <?= $prodi['jenjang_studi'] == 'd2' ? 'selected' : '' ?>>D2</option>
                    <option value="d3" <?= $prodi['jenjang_studi'] == 'd3' ? 'selected' : '' ?>>D3</option>
                    <option value="d4" <?= $prodi['jenjang_studi'] == 'd4' ? 'selected' : '' ?>>D4</option>
                    <option value="s2" <?= $prodi['jenjang_studi'] == 's2' ? 'selected' : '' ?>>S2</option>
                </select>
            </div>
            <div class="mb-3 pb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <textarea class="form-control" id="ket" name="ket" required><?= $prodi['keterangan'] ?></textarea>
                
            </div>
            <button type="submit" class="btn btn-warning" name="submit">Update</button>
            
        </form>

        <?php 
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
        ?>

    </div>
    
                <?php
                break;
        }
   ?>
   
   
