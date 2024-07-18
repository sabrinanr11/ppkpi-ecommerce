<?php
$querySetting = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
if (isset($_POST['simpan'])) {
    $email_website = $_POST['email_website'];
    $no_tlp_website = $_POST['no_tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $ig = $_POST['ig'];
    $twitter = $_POST['twitter'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];
    // $logo = $_POST['logo'];                    

    if (mysqli_num_rows($querySetting) > 0) {
        // update
        $id = mysqli_insert_id($koneksi);
        $update = mysqli_query($koneksi, "UPDATE setting SET email_website = '$email_website', no_tlp_website = '$no_tlp_website', alamat_website = '$alamat_website', ig = '$ig', twitter = '$twitter', fb = '$fb', linkedin = '$linkedin' WHERE id = '7'");
        header("location:?pg=setting&edit=berhasil");
    } else {
        // insert
        $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, no_tlp_website, alamat_website, ig, twitter, fb, linkedin) VALUES ('$email_website', '$no_tlp_website','$alamat_website', '$ig', '$twitter', '$fb', '$linkedin')");
        header("location:?pg=setting&tambah=berhasil");
    }
}
$rowSetting = mysqli_fetch_assoc($querySetting);
?>

<form action="" method="post" enctype="multipart/form-data">
    <!-- Email Start -->
    <div class="mb-3">
        <label for="">Email</label>
        <input value="<?= $rowSetting['email_website'] ?>" type="email" class="form-control" name="email_website" placeholder="Email Website" id="">
    </div>

    <!-- No tlp Start -->
    <div class="mb-3">
        <label for="">No tlp</label>
        <input value="<?= $rowSetting['no_tlp_website'] ?>" type="number" class="form-control" name="no_tlp_website" placeholder="No tlpon Website" id="">
    </div>

    <!-- Instagram -->
    <div class="mb-3">
        <label for="">Instagram</label>
        <input value="<?= $rowSetting['ig'] ?>" type="url" class="form-control" name="ig" placeholder="Instagram Link" id="">
    </div>

    <!-- Twitter -->
    <div class="mb-3">
        <label for="">Twitter</label>
        <input value="<?= $rowSetting['twitter'] ?>" type="url" class="form-control" name="twitter" placeholder="Twitter Link" id="">
    </div>

    <!-- Facebook -->
    <div class="mb-3">
        <label for="">Facebook</label>
        <input value="<?= $rowSetting['fb'] ?>" type="url" class="form-control" name="fb" placeholder="Facebook Link" id="">
    </div>

    <!-- Linkedin -->
    <div class="mb-3">
        <label for="">Linkedin</label>
        <input value="<?= $rowSetting['linkedin'] ?>" type="url" class="form-control" name="linkedin" placeholder="Linkedin Link" id="">
    </div>

    <!-- Alamat -->
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea name="alamat_website" class="form-control" id=""><?= $rowSetting['alamat_website'] ?></textarea>
    </div>

    <!-- Logo -->
    <div class="mb-3">
        <label for="">Logo</label>
        <input value="<?= $rowSetting['logo'] ?>" type="file" name="logo" placeholder="Logo" id="">
    </div>

    <!-- Button Submit -->
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        <a href="?pg=setting">Kembali</a>
    </div>
</form>