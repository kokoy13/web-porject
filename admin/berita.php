<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
include('../koneksi.php');

switch ($aksi) {
    case 'list':
        ?>
        <a href="index.php?p=berita&aksi=input" class="btn btn-primary mb-5">Tambah Berita</a>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Kategori</th>
                <th>Judul Berita</th>
                <th>File Upload</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            <?php
            // Query untuk mengambil data dari tabel user, berita, dan kategori
            $result = mysqli_query($db, "SELECT * FROM berita");

            while ($berita = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $berita['id'] ?></td>
                    <td><?= $berita['user_id'] ?></td>
                    <td><?= $berita['kategori_id'] ?></td>
                    <td><?= $berita['judul_berita'] ?></td>
                    <td><a href="../assets/img/berita/<?= $berita['file_upload'] ?>" target="_blank">Lihat File</a></td>
                    <td><?= $berita['date_created'] ?></td>
                    <td class="d-flex gap-3">
                        <a href="index.php?p=berita&aksi=edit&id_edit=<?= $berita['id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="proses_berita.php?proses=delete&id=<?= $berita['id'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
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
            <form action="proses_berita.php?proses=insert" method="post" enctype="multipart/form-data" class="col-md-6">
                <h3 class="mb-5">Tambah Berita</h3>
                <div class="mb-3 pb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="number" name="user_id" class="form-control" id="user_id" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="kategori_id" class="form-label">Kategori ID</label>
                    <input type="number" name="kategori_id" class="form-control" id="kategori_id" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="judul_berita" class="form-label">Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" id="judul_berita" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="file_upload" class="form-label">File Upload</label>
                    <input type="file" name="file_upload" class="form-control mb-3" accept=”.jpg, .jpeg, .png” id="file-upload">
                    <img src="#" alt="Preview Uploaded Image" width="200" id="file-preview">
                </div>
                <div class="mb-3 pb-3">
                    <label for="isi_berita" class="form-label">Isi Berita</label>
                    <textarea name="isi_berita" class="form-control" id="isi_berita" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
        </div>
        <?php
        break;

    case 'edit':
        include('../koneksi.php');
        if (!isset($_GET['id_edit']) || empty($_GET['id_edit'])) {
            echo "<script>alert('ID tidak valid!'); window.location='index.php?p=berita';</script>";
            exit;
        }

        $id_edit = mysqli_real_escape_string($db, $_GET['id_edit']);
        $getData = mysqli_query($db, "SELECT * FROM berita WHERE id = '".$id_edit."'");
        $berita = mysqli_fetch_array($getData);

        if (!$berita) {
            echo "<script>alert('Data tidak ditemukan!'); window.location='index.php?p=berita';</script>";
            exit;
        }
        ?>

        <div class="row justify-content-center py-5">    
            <form action="" method="post" enctype="multipart/form-data" class="col-md-6">
                <h3 class="mb-5">Edit Berita</h3>
                <div class="mb-3 pb-3">
                    <label for="id" class="form-label">Id</label>
                    <input type="number" class="form-control" id="id" value="<?= $berita['id'] ?>" disabled>
                    <input type="hidden" name="id" value="<?= $berita['id'] ?>">
                </div>
                <div class="mb-3 pb-3">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="number" name="user_id" class="form-control" id="user_id" value="<?= $berita['user_id'] ?>" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="kategori_id" class="form-label">Kategori ID</label>
                    <input type="number" name="kategori_id" class="form-control" id="kategori_id" value="<?= $berita['kategori_id'] ?>" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="judul_berita" class="form-label">Judul Berita</label>
                    <input type="text" name="judul_berita" class="form-control" id="judul_berita" value="<?= $berita['judul_berita'] ?>" required>
                </div>
                <div class="mb-3 pb-3">
                    <label for="file_upload" class="form-label">File Upload (Kosongkan jika tidak ingin mengganti)</label>
                    <input type="file" name="file_upload" class="form-control" id="file_upload">
                </div>
                <div class="mb-3 pb-3">
                    <label for="isi_berita" class="form-label">Isi Berita</label>
                    <textarea name="isi_berita" class="form-control" id="isi_berita" rows="5" required><?= $berita['isi_berita'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-warning" name="submit">Update</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $id = mysqli_real_escape_string($db, $_POST['id']);
                $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
                $kategori_id = mysqli_real_escape_string($db, $_POST['kategori_id']);
                $judul_berita = mysqli_real_escape_string($db, $_POST['judul_berita']);
                $isi_berita = mysqli_real_escape_string($db, $_POST['isi_berita']);
                $file_upload = $berita['file_upload'];

                // Handle file upload jika ada file baru
                if (!empty($_FILES['file_upload']['name'])) {
                    $file_upload = time() . '_' . $_FILES['file_upload']['name'];
                    move_uploaded_file($_FILES['file_upload']['tmp_name'], "uploads/" . $file_upload);
                }

                $update = mysqli_query($db, "UPDATE berita SET 
                    user_id='$user_id', 
                    kategori_id='$kategori_id', 
                    judul_berita='$judul_berita', 
                    file_upload='$file_upload', 
                    isi_berita='$isi_berita' 
                    WHERE id='$id'");

                if ($update) {
                    echo "<script>window.location='index.php?p=berita';</script>";
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

<script>
const input = document.getElementById('file-upload');
const previewPhoto = () => {
    const file = input.files;
    if (file) {
        const fileReader = new FileReader();
        const preview = document.getElementById('file-preview');
fileReader.onload = function (event) {
            preview.setAttribute('src', event.target.result);
        }
        fileReader.readAsDataURL(file[0]);
    }
}
input.addEventListener("change", previewPhoto);
</script>
