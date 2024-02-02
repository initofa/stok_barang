<?php
include 'koneksi.php';

$query = "SELECT * FROM stok_barang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
    <style>
     body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

a {
    text-decoration: none;
    color: #fff;
}

.btn-stok {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn-stok:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.9);
}

table th, table td {
    padding: 12px;
    border: 1px solid #ccc;
}

table th {
    background-color: #007bff;
    color: #fff;
}

.action-buttons a {
    margin-right: 5px;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
}

.action-buttons .edit-btn {
    background-color: #ffc107;
    color: #333;
}

.action-buttons .delete-btn {
    background-color: #dc3545;
    color: #fff;
}

.action-buttons a:hover {
    opacity: 0.8;
}

.additional-buttons .custom-btn {
    background-color: #6c757d;
    color: #fff;
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
}

.additional-buttons .custom-btn:hover {
    opacity: 0.8;
}
    </style>
</head>
<body>

<div class="container">
    <h2>Stok Barang</h2>
    <a href="create.php" class="btn-stok">Tambah Data</a>
    <!-- Tabel untuk menampilkan daftar stok barang -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Action</th> 
        </tr>

        <?php
         // Menampilkan daftar stok barang dalam tabel
         while ($row = mysqli_fetch_assoc($result)) {
             // Menampilkan baris data dalam tabel
             echo "<tr>";
             echo "<td>".$row['id']."</td>";
             echo "<td>".$row['nama_barang']."</td>";
             echo "<td>".$row['jumlah_barang']."</td>";
             // Memformat harga barang dengan titik sebagai pemisah ribuan
             echo "<td>Rp ".number_format($row['harga_barang'], 2, ',', '.')."</td>";
             echo "<td>";
             echo "<div class='action-buttons additional-buttons'>";
             // Tambahkan tombol edit dengan link ke edit.php
             echo "<a href='update.php?id=".$row['id']."' class='edit-btn'>Edit</a>";
             echo " | ";
             // Tambahkan tombol delete dengan link ke delete.php
             echo "<a href='delete.php?id=".$row['id']."' class='delete-btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>Delete</a>";
             echo "</td>";
             echo "</tr>";
         }
        ?>
    </table>
</div>

</body>
</html>
