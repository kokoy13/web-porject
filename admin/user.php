
<?php
        $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
        switch($aksi){
            case 'list':
    ?>

    <a href="index.php?p=user&aksi=input" class="btn btn-primary mb-5">Tambah User</a>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
        <?php 
            include('../koneksi.php');
            $getData = mysqli_query($db,"SELECT * FROM user");
            while($user = mysqli_fetch_array($getData)){
        ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['full_name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['password'] ?></td>
                <td><?= $user['level'] ?></td>
                <td>
                    <a href="index.php?p=user&aksi=edit&id_edit=<?= $user['id'] ?>" class="btn btn-warning">edit</a>
                    <a href="proses_user.php?proses=delete&id=<?= $user['id'] ?>" class="btn btn-danger"  onclick="return confirm('yakin ingin menghapus data?')">hapus</a>
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
        <form action="proses_user.php?proses=insert" method="post" class="col-md-4">
        <h3 class="mb-5">Form User</h3>
            <div class="mb-3 pb-3">
                <label for="nama" class="form-label">Nama lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="level" class="form-label">Level</label><br>
                <input type="radio" class="form-check-input me-2" name="level" id="admin" value="admin" checked><label for="admin">Admin</label>
                <input type="radio" class="form-check-input ms-4 me-2" name="level" id="user" value="user"><label for="user">User</label>
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
        $getData = mysqli_query($db,"SELECT * FROM user WHERE id = '".$_GET['id_edit']."'");

        $user = mysqli_fetch_array($getData);

    ?>


    <div class="row justify-content-center  py-5">    
        <form action="proses_user.php?proses=update" method="post" class="col-md-4">
        <h3 class="mb-5">Edit User</h3>
            <div class="mb-3 pb-3">
                <label for="id" class="form-label">Id User</label>
                <input type="number" name="" class="form-control" id="id" required autofocus value="<?= $user['id'] ?>" disabled>
                <input type="hidden" name="id" class="form-control" id="id" required autofocus value="<?= $user['id'] ?>">
            </div>
            <div class="mb-3 pb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" value="<?= $user['full_name'] ?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="<?= $user['email'] ?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="<?= $user['password'] ?>" required autofocus>
            </div>
            <div class="mb-3 pb-3">
                <label for="level" class="form-label">Level</label><br>
                <input type="radio" class="form-check-input me-2" name="level" id="admin" value="admin" checked><label for="admin">Admin</label>
                <input type="radio" class="form-check-input ms-4 me-2" name="level" id="user" value="user"><label for="user">User</label>
            </div>
            <button type="submit" class="btn btn-warning" name="submit">Update</button>
            
        </form>

    </div>
    
                <?php
                break;
        }
   ?>
   
   
