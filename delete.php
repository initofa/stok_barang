<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $deleted_id = $_GET['id'];

    // Hapus record dari tabel
    $delete_query = "DELETE FROM stok_barang WHERE id = $deleted_id";
    mysqli_query($conn, $delete_query);

    // Perbarui auto-increment untuk mengatur ulang nilai ID
    $reset_auto_increment_query = "ALTER TABLE stok_barang AUTO_INCREMENT = 1";
    mysqli_query($conn, $reset_auto_increment_query);

    // Ambil jumlah total data yang tersisa
    $remaining_query = "SELECT COUNT(*) AS count FROM stok_barang";
    $remaining_result = mysqli_query($conn, $remaining_query);
    $remaining_row = mysqli_fetch_assoc($remaining_result);
    $remaining_count = $remaining_row['count'];

    // Jika masih ada data tersisa, set AUTO_INCREMENT menjadi nilai maksimum ID + 1
    if ($remaining_count > 0) {
        $max_id_query = "SELECT MAX(id) AS max_id FROM stok_barang";
        $max_id_result = mysqli_query($conn, $max_id_query);
        $max_id_row = mysqli_fetch_assoc($max_id_result);
        $max_id = $max_id_row['max_id'];
        $reset_auto_increment_query = "ALTER TABLE stok_barang AUTO_INCREMENT = " . ($max_id + 1);
        mysqli_query($conn, $reset_auto_increment_query);
    }

    // Redirect ke halaman utama setelah penghapusan
    header("Location: index.php");
    exit();
} else {
    // Jika tidak ada parameter ID yang diberikan, mungkin Anda ingin menangani kasus ini sesuai kebutuhan aplikasi Anda.
    echo "ID tidak diberikan.";
}
?>
