<?php
$server        = "localhost";
$user        = "root";
$password    = "";
$database    = "2101020063_mertaargawa";

$conn = mysqli_connect($server, $user, $password, $database);

function select($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) :
        $rows[] = $row;
    endwhile;
    return $rows;
}

function insert($query)
{
    global $conn;
    $nama = htmlspecialchars($_POST["nama"]);
    $harga = htmlspecialchars($_POST["harga"]);
    $kategori = htmlspecialchars($_POST["kategori"]);

    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO produk (nama_produk, harga, gambar, id_kategori) VALUES
                  ('$nama', '$harga', '$gambar', '$kategori') ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['image']['name'];
    $ukfiles = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpname = $_FILES['image']['tmp_name'];

    if ($error === 4) {
        echo '
        <script>
            alert("Upload Files")
        </script>
        ';
        return false;
    }

    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo '
        <script>
            alert("yang anda upload bukan gambar")
        </script>
        ';
        return false;
    }

    $fileBaru = uniqid();
    $fileBaru .= '.';
    $fileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpname, "images/" . $fileBaru);
    return $fileBaru;
}
