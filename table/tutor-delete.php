<?php
// Load file koneksi.php
$host = "localhost"; // Nama hostnya
$username = "id20934520_root"; // Username
$password = "Learn-today123"; // Password (Isi jika menggunakan password)
$database = "id20934520_fppweb"; // Nama databasenya
$pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);
$id = $_GET['id'];
$sql = $pdo->prepare("SELECT foto FROM tutors WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute();
$data = $sql->fetch();
if (is_file("../form/images/" . $data['foto']))
  unlink("../form/images/" . $data['foto']);
$sql = $pdo->prepare("DELETE FROM tutors WHERE id=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute();
if ($execute) {
  header("location: tutors.php");
} else {
  echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
}
?>