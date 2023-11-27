<?php
require "function.php";

$kategori = select("SELECT * FROM kategori");

// cek apakah tombol sumbit sudah ditekan
if (isset($_POST["submit"])) {
    echo "<script>
    alert('data berhasil')
    </script>";

    if (insert($_POST) > 0) {
        echo "
          <script>
            alert('Data berhasil ditambahkan');
          </>
      ";
        header("Location: index.php");
        exit();
    } else {
        echo "
      <script>
        alert('Data gagal ditambahkan');
      </script>
  ";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container d-flex flex-column h-100">

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
            <div class="container">
                <a class="navbar-brand" href="#">WEB I Made Merta Argawa 2101020063</a>
            </div>
        </nav>
    </header>

    <h4 class="text-center">Tambah Product</h4>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nama</span>
            <input name="nama" type="text" class="form-control" placeholder="Nama Produk" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Harga</span>
            <input name="harga" type="text" class="form-control" placeholder="Harga Produk" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Gambar Produk</label>
            <input name="image" class="form-control" type="file" id="formFile">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01">Options</label>
            <select class="form-select" id="inputGroupSelect01" name="kategori">
                <?php foreach ($kategori as $kat) : ?>
                    <option value="<?= $kat["id_kategori"]; ?>"><?= $kat["nama_kategori"]; ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mb-3" name="submit">Tambah Produk</button>
    </form>

    </div>

    <footer class="bg-dark text-white p-3">
        <a>&copy; 2023</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>