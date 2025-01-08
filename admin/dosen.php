<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'view';
switch ($aksi) {
    case 'view':
        ?>
        <?php
        include '../koneksi.php';
        ?>


        <div class="container">
        <a href="index.php?p=dosen&aksi=input" class="btn btn-primary mb-5">Tambah Dosen</a> 
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Nama Dosen</th>
                        <th>Email</th>
                        <th>Prodi</th>
                        <th>Notelp</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = mysqli_query($db, "SELECT * FROM dosen 
                    INNER JOIN prodi ON prodi.id = dosen.prodi_id");

                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $no . "</td>";
                        echo "<td>" . $row['nip'] . "</td>";
                        echo "<td>" . $row['nama_dosen'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['nama_prodi'] . "</td>";
                        echo "<td>" . $row['telp'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>
                        <a href='index.php?p=dosen&aksi=edit&nip=" . $row['nip'] . "' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='proses_dosen.php?proses=delete&nip=" . $row['nip'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Delete</a>
                    </td>";
                        echo "</tr>";


                        ?>
                        <?php
                        $no++;
                    }
                    ?>

                </tbody>
            </table>
        </div>



        <?php
        break;

    case 'input':
        ?>

        <body>
            <div class="container">
    
                <div class="row">
                    <div class="col-8">
                        <form action="proses_dosen.php?proses=insert" method="post">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">NIP</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="nip">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Nama DOSEN</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="nama_dosen">
                                </div>
                            </div>
                                                    
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email">
                                </div>
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

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">No Telepon</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="notelp">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-8">
                                    <textarea name="alamat" class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-8">
                                    <input type="submit" name="submit" class="btn btn-primary">
                                    <button type="reset" name="reset" class="btn btn-warning">Reset</button>
                                    <a href="?p=dosen" class="btn btn-success">Lihat Data Dosen</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>




            </div>

        </body>


        <?php
        break;

    case 'edit':
        ?>
        <?php
        include '../koneksi.php';

        // Mendapatkan data dosen berdasarkan NIP
        if (isset($_GET['nip'])) {
            $nip = $_GET['nip'];
            $query = mysqli_query($db, "SELECT * FROM dosen WHERE nip='$nip'");
            $data = mysqli_fetch_assoc($query);
        }

        if (isset($_POST['update'])) {
            // Mengambil data dari form
            $nip = $_POST['nip'];
            $nama_dosen = $_POST['nama_dosen'];
            $email = $_POST['email'];
            $prodi_id = $_POST['prodi'];
            $notelp = $_POST['notelp'];    
            $alamat = $_POST['alamat'];

        }
        ?>
        <body>
          
        <div class="container">
                <form action="proses_dosen.php?proses=update" method="post">
                    <input type="hidden" name="nip" value="<?= $data['nip'] ?>">
                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Dosen</label>
                        <input type="text" name="nama_dosen" class="form-control" value="<?= $data['nama_dosen'] ?>" required>
                    </div>
                    <!-- Prodi -->
                    <div class="mb-3">
                        <label class="form-label">Prodi</label>
                        <select name="prodi" class="form-select">
                            <option value="">--Pilih Prodi--</option>
                            <?php
                            include '../koneksi.php';
                            $ambil_prodi = mysqli_query($db, "SELECT * FROM prodi");
                            while ($data_prodi = mysqli_fetch_assoc($ambil_prodi)) {
                                $selected = ($data['prodi_id'] == $data_prodi['id']) ? 'selected' : '';
                                echo "<option value='" . $data_prodi['id'] . "' $selected>" . $data_prodi['nama_prodi'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>" required>
                    </div>
                    <!-- Notelp -->
                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="notelp" class="form-control" value="<?= $data['telp'] ?>" required>
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="5" required><?= $data['alamat'] ?></textarea>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
            </div>

        </body>
        <?php
        break;
}

?>