<?php
// print_r("test");
// die;

if (isset($_GET['delete-cart'])) {
    $id_produk = $_GET['delete-cart'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id_produk'] == $id_produk){
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location:?pg=cart');
        }
    }
} else {

    //memeriksa barang ada atau tidak ada 
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['id_member'])) {
        header('location:?pg=member&message=Silahkan-Register-Terlebih-Dahulu');
    } else {
        $id_member = $_SESSION['id_member'];
        $id_produk = $_POST['id_produk'];
        $queryCart = mysqli_query($koneksi, "SELECT * FROM produk WHERE id ='$id_produk'");
        $rowProduk = mysqli_fetch_assoc($queryCart);
        
        $session_produk = array(
            'id_produk' => $id_produk,
            'nama_produk'   => $rowProduk['nama_barang'],
            'qty'       => 1,
            'harga'     => $rowProduk['harga'],
            'foto'     => $rowProduk['foto']
        );

        $product_exists = false;
        //periksa apakah produk sudah ada di keranjang
        foreach($_SESSION['cart'] as $key => &$item){
            if($item['id_produk'] == $id_produk){
                $item['qty'] += 1;
                $product_exists = true;
                break;
            }
        }


        //jika nilai sessionnya kosong/keranjang belanja produknya kosong
        if (!$product_exists){
            // print_r('produk baru');
            // die;
            $_SESSION['cart'][] = $session_produk;
        }



        // $_SESSION['cart'][] = $session_produk;
        header('location:index.php?tambah=cart-berhasil');
    }
}


        // while($rowCart = mysqli_fetch_assoc(($queryCart))){
            
        // }
        // $penjualan = mysqli_query($koneksi, "INSERT INTO  penjualan (id_member, status) VALUES ('$id_member', 0)");
    
        // if($penjualan){
            
        // }
