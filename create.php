<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang = $_POST['harga_barang'];

    // Insert data ke dalam tabel
    $query = "INSERT INTO stok_barang (nama_barang, jumlah_barang, harga_barang) VALUES ('$nama_barang', '$jumlah_barang', '$harga_barang')";
    mysqli_query($conn, $query);

    // Redirect kembali ke halaman utama setelah berhasil memasukkan data
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Stok Barang</title>
    
    <style>
   body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h2 {
        font-size: 28px;
        margin-bottom: 20px;
        color: #333;
        text-align: center;
    }

    form {
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #666;
    }

    input[type="text"],
    input[type="number"],
    button[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    button[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }
    </style>
</head>
<body>

<h2>Tambah Data Stok Barang</h2>

<!-- Form untuk menambahkan stok barang -->
<form method="post" action="">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" required>
    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" name="jumlah_barang" required>
    <label for="harga_barang">Harga Barang:</label>
    <input type="text" name="harga_barang" required>
    <button type="submit" name="submit">Tambah</button>
</form>

</body>
</html>
