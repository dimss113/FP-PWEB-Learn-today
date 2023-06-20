<?php
$host = "localhost"; // Nama hostnya
$username = "id20934520_root"; // Username
$password = "Learn-today123"; // Password (Isi jika menggunakan password)
$database = "id20934520_fppweb"; // Nama databasenya
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

$id = $_GET['id'];

$judul = $_POST['judul'];
$tutor = $_POST['tutor'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if (empty($foto)) {
  $sql = $pdo->prepare("UPDATE courses SET judul=:judul, tutor=:tutor, harga=:harga, deskripsi=:deskripsi WHERE id=:id");
  $sql->bindParam(':judul', $judul);
  $sql->bindParam(':tutor', $tutor);
  $sql->bindParam(':harga', $harga);
  $sql->bindParam(':deskripsi', $deskripsi);
  $sql->bindParam(':id', $id);
  $sql->execute(); // Eksekusi query insert

  if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: ../course/index.php"); // Redirect ke halaman index.php
    // exit();
  } else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='course.php'>Kembali Ke Form</a>";
  }
} else {
  $fotobaru = date('dmYHis') . $foto;

  $path = "../form/images/" . $fotobaru;

  if (move_uploaded_file($tmp, $path)) {
    $sql = $pdo->prepare("SELECT foto FROM courses WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch();
    if (is_file("../form/images/" . $data['foto']))
      unlink("../form/images/" . $data['foto']);
    $sql = $pdo->prepare("UPDATE courses SET judul=:judul, tutor=:tutor, harga=:harga, foto=:foto, deskripsi=:deskripsi WHERE id=:id");
    $sql->bindParam(':judul', $judul);
    $sql->bindParam(':tutor', $tutor);
    $sql->bindParam(':harga', $harga);
    $sql->bindParam(':deskripsi', $deskripsi);
    $sql->bindParam(':foto', $fotobaru);
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert

    if ($sql) { // Cek jika proses simpan ke database sukses atau tidak
      // Jika Sukses, Lakukan :
      header("location: ../course/index.php"); // Redirect ke halaman index.php
      // exit();
    } else {
      // Jika Gagal, Lakukan :
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='course.php'>Kembali Ke Form</a>";
    }
  } else {
    // Jika gambar gagal diupload, Lakukan :
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='course.php'>Kembali Ke Form</a>";
  }
}

?>