<?php
if (isset($_POST['simpan'])) {
    // print_r($_POST);
    // die;
    $email_website = $_POST['email_website'];
    $no_tlp_website = $_POST['no_tlp_website'];
    $alamat_website = $_POST['alamat_website'];
    $ig = $_POST['ig'];
    $twitter = $_POST['twitter'];
    $fb = $_POST['fb'];
    $linkedin = $_POST['linkedin'];

    $querySetting = mysqli_query($koneksi, "SELECT * FROM setting ORDER BY id DESC");
    if (mysqli_num_rows($querySetting) > 0) {
        //updated

    } else {
        //insert
        $insert = mysqli_query($koneksi, "INSERT INTO setting (email_website, no_tlp_website, alamat_website, ig, twitter, fb, linkedin)
        VALUES ('$email_website','$no_tlp_website','$alamat_website','$ig','$twitter','$fb','$linkedin')");
    }
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="">Email Website</label>
        <input type="email" class="form-control" name="email_website" placeholder="Email Website">
    </div>
    <div class="mb-3">
        <label for="">Telepon Website</label>
        <input type="text" class="form-control" name="no_tlp_website" placeholder="No Telepon Website">
    </div>
    <div class="mb-3">
        <label for="">Alamat</label>
        <textarea id="" class="form-control" name="alamat_website" placeholder="Alamat Website"></textarea>
    </div>
    <div class="mb-3">
        <label for="">Instagram Link</label>
        <input type="text" class="form-control" name="ig" placeholder="Instagram Link">
    </div>
    <div class="mb-3">
        <label for="">Facebook Link</label>
        <input type="url" class="form-control" name="fb" placeholder="Facebook Link">
    </div>
    <div class="mb-3">
        <label for="">Twitter Link</label>
        <input type="url" class="form-control" name="twitter" placeholder="Twitter Link">
    </div>
    <div class="mb-3">
        <label for="">LinkedIn</label>
        <input type="url" class="form-control" name="linkedin" placeholder="LinkedIn">
    </div>
    <div class="mb-3">
        <label for="">Logo</label>
        <input type="file" name="logo" </div>
        <div class="mb-3">

            <input type="submit" class="btn-btn-primary" name="simpan" value="Simpan">
        </div>
</form>