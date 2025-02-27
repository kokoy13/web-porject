
<?php
        $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        switch($aksi){
            case 'list':
    ?>

    <a href="index.php?p=ruangan&aksi=input" class="btn btn-primary mb-5">Tambah Ruangan</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Kode Ruangan</th>
            <th>Nama Ruangan</th>
            <th>Gedung</th>
            <th>Lantai</th>
            <th>kapasitas</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        <?php 
            include('../koneksi.php');
            $getData = mysqli_query($db,"SELECT * FROM ruangan");
            while($ruangan = mysqli_fetch_array($getData)){
        ?>
            <tr>
                <td><?= $ruangan['id'] ?></td>
                <td><?= $ruangan['kode_ruangan'] ?></td>
                <td><?= $ruangan['nama_ruangan'] ?></td>
                <td><?= $ruangan['gedung'] ?></td>
                <td><?= $ruangan['lantai'] ?></td>
                <td><?= $ruangan['kapasitas'] ?></td>
                <td><?= $ruangan['keterangan'] ?></td>
                <td>
                    <a href="index.php?p=ruangan&aksi=edit&id=<?= $ruangan['id'] ?>" class="btn btn-warning">edit</a>
                    <a href="proses_ruangan.php?proses=delete&id=<?= $ruangan['id'] ?>" class="btn btn-danger"  onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
                </td>
            </tr>
        <?php 
            } 
        ?>
    </table>
    <?php
    break;

    case 'input':
        ?>
        <div class="row justify-content-center  py-5">    
        <form action="proses_ruangan.php?proses=insert" method="post" class="col-md-4">
        <h3 class="mb-5">Form Ruangan</h3>
            <div class="mb-3 pb-3">
                <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                <input type="text" name="kode_ruangan" class="form-control" id="kode_ruangan" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" id="nama_ruangan" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="gedung" class="form-label">Gedung</label>
                <input type="text" name="gedung" class="form-control" id="gedung" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="lantai" class="form-label">Lantai</label>
                <input type="number" name="lantai" class="form-control" id="lantai" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
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
        $getData = mysqli_query($db,"SELECT * FROM ruangan WHERE id = $_GET[id]");
        
        $ruangan = mysqli_fetch_array($getData);

    ?>

<div class="row justify-content-center py-5">    
        <form action="proses_ruangan.php?proses=update&id=<?=$_GET['id']?>" method="post" class="col-md-4">
        <h3 class="mb-5">Edit Ruangan</h3>
            <div class="mb-3 pb-3">
                <label for="kode_ruangan" class="form-label">Kode Ruangan</label>
                <input type="text" name="kode_ruangan" class="form-control" value="<?=$ruangan['kode_ruangan']?>" id="kode_ruangan" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="nama_ruangan" class="form-label">Nama Ruangan</label>
                <input type="text" name="nama_ruangan" class="form-control" value="<?=$ruangan['nama_ruangan']?>" id="nama_ruangan" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="gedung" class="form-label">Gedung</label>
                <input type="text" value="<?=$ruangan['gedung']?>" name="gedung" class="form-control" id="gedung" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="lantai" class="form-label">Lantai</label>
                <input type="number" name="lantai" class="form-control" id="lantai" required autofocus value="<?=$ruangan['lantai']?>">
            </div>
            <div class="mb-3 pb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="number" name="kapasitas" class="form-control" id="kapasitas" value="<?=$ruangan['kapasitas']?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" required><?=$ruangan['keterangan']?></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </form>

        

    </div>
    
                <?php
                break;
        }
   ?>
   
   
