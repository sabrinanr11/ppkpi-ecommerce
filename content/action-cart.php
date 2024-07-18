<?php
    // print_r("test");
    // die;
    if (!isset($_SESSION['id_member'])){
        header('location:?pg=action-cart&message=Silahkan-Register-Terlebih-Dahulu');
    }
    else {
        
    }
?>
?>