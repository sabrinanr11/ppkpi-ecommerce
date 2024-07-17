<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<?php
$query= mysqli_query($koneksi, "SELECT * FROM level ORDER BY id DESC");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $delete = mysqli_query($koneksi, "DELETE FROM level WHERE id = '$id'");
    header('location:?pg=level&hapus-berhasil');
}
?>


<div align="right" class="mb-3">
    <a href="?pg=tambah-level" class="btn btn-primary">Tambah Level</a>
</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="d-flex justify-content-center">No</th>
            <th>Level</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <!-- <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody> -->
    <tbody>
        <?php $no = 1;
        while ($row = mysqli_fetch_assoc($query)): ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td><?php echo $row['nama_level'] ?></td>
            <td><?php echo $row['keterangan'] ?></td>
            <td><a href="?pg=tambah-level&edit=<?php echo $row['id']; ?>" class="btn btn-xs btn-success"><i class="bi bi-pencil-square"></i></a>
                <a onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" 
                    href="?pg=level&delete=<?php echo $row['id'] ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash3-fill"></i></a></td>
        </tr>
        <?php endwhile ?>
    </tbody>
</table>