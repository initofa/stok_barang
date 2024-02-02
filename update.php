<?php
include 'koneksi.php';

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_barang = $_POST['jumlah_barang'];
    $harga_barang = $_POST['harga_barang'];

    $query = "UPDATE stok_barang SET nama_barang='$nama_barang', jumlah_barang='$jumlah_barang', harga_barang='$harga_barang' WHERE id=$id";
    mysqli_query($conn, $query);

    header("Location: index.php"); // Redirect kembali ke halaman utama
    exit();
}

$id = $_GET['id'];
$query = "SELECT * FROM stok_barang WHERE id=$id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Stok Barang</title>
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

<h2>Edit Data Stok Barang</h2>

<!-- Form untuk mengedit stok barang -->
<form method="post" action="">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="nama_barang">Nama Barang:</label>
    <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
    <label for="jumlah_barang">Jumlah Barang:</label>
    <input type="number" name="jumlah_barang" value="<?php echo $row['jumlah_barang']; ?>" required>
    <label for="harga_barang">Harga Barang:</label>
    <input type="number" name="harga_barang" value="<?php echo $row['harga_barang']; ?>" required>
    <button type="submit" name="submit">Update</button>
</form>

</body>
</html>
