<?php
if (isset($_POST['simpan'])) {
    //FILES
    $nama_barang = $_POST['nama_barang'];
    $harga =  $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];


    $ekstensi = array('png', 'jpg', 'jpeg');
    $ext = pathinfo($foto, PATHINFO_EXTENSION);
    // print_r($_FILES);
    // die;

    if (!in_array($ext,$ekstensi)) {
        echo "Mohon maaf ekstensi tidak terdaftar";
    }else{
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' .$foto);
    }

         $insert = mysqli_query($koneksi, "INSERT INTO produk (nama_barang, harga, foto)
        VALUES ('$nama_barang','$harga','$foto')");
         if (!$insert) {
            // echo "gagal";
            header("location:?pg=tambah-produk&pesan-tambah-gagal");
        } else {
            // echo "berhasil";
            header("location:?pg=produk&pesan-tambah-berhasil");
        }
}

    //MASUKKAN KE DALAM TABEL produk (YANG AKAN DIMASUKKAN) VALUES (INPUTAN MASING-MASING KOLOM)



   

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];


    //tampilkan sebuah data dari tabel produk dimana id bernilai dari nilai parameter
    $edit = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
    $rowEdit = mysqli_fetch_assoc($edit);
}



if (isset($_POST['edit'])){
    $nama_barang = $_POST['nama_barang'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];


    $ekstensi = array('png', 'jpg', 'jpeg');
    $ext = pathinfo($foto, PATHINFO_EXTENSION);

    $id = $_GET['edit'];

    // print_r($_FILES);
    // die;

    if (!in_array($ext,$ekstensi)) {
        echo "Mohon maaf ekstensi tidak terdaftar";
    }else{
        unlink("upload/" . $rowEdit['foto']);
        move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' .$foto);

        $update = mysqli_query($koneksi, "UPDATE produk SET nama_barang='$nama_barang', harga='$harga', foto='$foto' WHERE id='$id'" );
       header("location:?pg=produk&update-berhasil");
       
    }


}

?>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="">Nama Barang</label>
            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['nama_barang'] : ''?>" type="text" class="form-control" placeholder="Masukkan Nama Barang Anda" name="nama_barang">
        </div>

        <div class="mb-3">
            <label for="">Harga</label>
            <input value="<?php echo isset($_GET['edit']) ? $rowEdit['harga'] : ''?>" type="number" class="form-control" placeholder="Harga Produk " name="harga">
        </div>

        <div class="mb-3">
            <label for="">Foto</label>
            <input value="" type="file" name="foto" required>
        </div>

        <div class="mb-3">
            <input type="submit" class="btn btn-primary" value="Simpan"
            name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan'?>">
            <a href="?pg=produk">Kembali</a>
        </div>
    </form>
    
</body>