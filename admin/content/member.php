<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
$query = mysqli_query($koneksi, "SELECT * FROM member WHERE deleted_at = 0 ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "UPDATE member SET  deleted_at = 1 WHERE id = '$id'");
    header('location:?pg=member&hapus-berhasil');
}



?>
<div class="mb-3" align="right">
    <a href="?pg=tambah-member" class="btn btn-primary">Tambah Member</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td><?php echo $row['nama_lengkap'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td>
                <!-- <a href="?pg=tambah-member&edit=<?php echo $row['id']; ?>" class="btn btn-xs btn-success"><i class="bi bi-pencil-square"></i></a> -->
                <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" 
                    href="?pg=member&delete=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash3-fill"></i></a>
            </td>
        </tr>
        <?php endwhile ?>
    </tbody>
    
</table>