<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
include('../koneksi.php');

switch ($aksi) {
    case 'list':
        ?>
        <a href="index.php?p=kategori&aksi=input" class="btn btn-primary mb-5">Tambah Data</a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
            <?php
            $getData = mysqli_query($db, "SELECT * FROM kategori");
            while ($kategori = mysqli_fetch_array($getData)) {
                ?>
                <tr>
                    <td><?= $kategori['id'] ?></td>
                    <td><?= $kategori['nama_kategori'] ?></td>
                    <td>
                        <a href="index.php?p=kategori&aksi=edit&id_edit=<?= $kategori['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="proses_kategori.php?proses=delete&id=<?= $kategori['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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
        <div class="row justify-content-center py-5">    
            <form action="proses_kategori.php?proses=insert" method="post" class="col-md-4">
                <h3 class="mb-5">Form Kategori</h3>
                <div class="mb-3 pb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required autofocus>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
        <?php
        break;

    case 'edit':
        if (!isset($_GET['id_edit']) || empty($_GET['id_edit'])) {
            echo "<script>alert('ID tidak valid!'); window.location='index.php?p=kategori';</script>";
            exit;
        }

        $id_edit = mysqli_real_escape_string($db, $_GET['id_edit']);
        $getData = mysqli_query($db, "SELECT * FROM kategori WHERE id = '$id_edit'");
        $kategori = mysqli_fetch_array($getData);

        if (!$kategori) {
            echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?p=kategori';</script>";
            exit;
        }
        ?>

        <div class="row justify-content-center py-5">    
            <form action="" method="post" class="col-md-4">
                <h3 class="mb-5">Edit Kategori</h3>
                <div class="mb-3 pb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="number" class="form-control" id="id" value="<?= $kategori['id'] ?>" disabled>
                    <input type="hidden" name="id" value="<?= $kategori['id'] ?>">
                </div>
                <div class="mb-3 pb-3">
                    <label for="nama_kategori" class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" value="<?= $kategori['nama_kategori'] ?>" required>
                </div>
                <button type="submit" class="btn btn-warning" name="submit">Update</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $id = mysqli_real_escape_string($db, $_POST['id']);
                $nama_kategori = mysqli_real_escape_string($db, $_POST['nama_kategori']);

                $update = mysqli_query($db, "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id='$id'");

                if ($update) {
                    echo "<script>window.location='index.php?p=kategori';</script>";
                } else {
                    echo "Error: " . mysqli_error($db);
                }
            }
            ?>
        </div>
        <?php
        break;
}
?>
