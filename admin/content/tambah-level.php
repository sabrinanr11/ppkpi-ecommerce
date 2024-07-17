<?php
if (isset($_POST['simpan'])) {
    $nama_level = $_POST['nama_level'];
    $keterangan =  $_POST['keterangan'];

    //MASUKKAN KE DALAM TABEL level (YANG AKAN DIMASUKKAN) VALUES (INPUTAN MASING-MASING KOLOM)

    $insert = mysqli_query($koneksi, "INSERT INTO level (nama_level, keterangan)
    VALUES ('$nama_level','$keterangan')");
    header("location:?pg=level&insert-berhasil");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    //tampilkan sebuah data dari tabel level dimana id bernilai dari nilai parameter
    $edit = mysqli_query($koneksi, "SELECT * FROM level WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}

if (isset($_POST['edit'])){
    $nama_level = $_POST['nama_level'];
    $keterangan =  $_POST['keterangan'];
    $id =  $_GET['edit'];

   

    $update = mysqli_query($koneksi, "UPDATE level SET nama_level='$nama_level', keterangan='$keterangan' WHERE id='$id'" );
    header("location:?pg=level&update-berhasil");
}



?>

<!-- <form action="" method="post">
    <div class="mb-3">
        <label for="">Nama Level</label>
        <input type="text" class="form-control" name="nama_level" placeholder="Masukkan Nama Level">
    </div>
    <div class="mb-3">
        <label for="">Keterangan</label>
        <textarea name="keterangan" id="" class="form-control" placeholder="Masukkan Keterangan"></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
        <a href="?pg-level">Kembali</a>
    </div>
</form> -->

<form action="" method="post">
    <div class="mb-3">
        <label for="">Nama Level</label>
        <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_level'] : ''?>" type="text" class="form-control" name="nama_level" placeholder="Masukkan Nama Level">
    </div>
    <div class="mb-3">
        <label for="">Keterangan</label>
        <textarea class="form-control" name="keterangan" placeholder="Masukkan Keterangan"><?php echo isset($_GET['edit']) ? $rowEdit['keterangan'] : ''?></textarea>
    </div>
    <div class="mb-3">
        <input type="submit" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan'?>" value="Simpan" class="btn btn-primary">
        <a href="?pg=level">Kembali</a>
    </div>
</form>