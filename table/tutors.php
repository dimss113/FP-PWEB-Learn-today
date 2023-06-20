<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/css/bootstrap.min.css">

  </head>

  <body>
    <!-- Navigation -->
    <nav>
      <div class="navbar">
        <div class="logo">
          <img src="images/logo.png" alt="">
          <h1>LearnToday</h1>
        </div>
        <div class="menu">
          <a href="../home/index.php" class="menu-item">Home</a>
          <a href="../course/index.php" class="menu-item">Course</a>
          <a href="../tutor/index.php" class="menu-item">Tutor</a>
          <a href="../contact/index.php" class="menu-item">Contact</a>
        </div>
      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="tutors.php">Tutors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="courses.php">Courses</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Content -->
    <div class="container mt-4">
      <div id="tutors">
        <h2>Tutors</h2>
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Photo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Data for tutors table -->
            <?php
            $host = "localhost"; // Nama hostnya
            $username = "id20934520_root"; // Username
            $password = "Learn-today123"; // Password (Isi jika menggunakan password)
            $database = "id20934520_fppweb"; // Nama databasenya
            $pdo = new PDO('mysql:host=' . $host . ';dbname=' . $database, $username, $password);

            $sql = $pdo->prepare("SELECT * FROM tutors");
            $sql->execute();

            while ($data = $sql->fetch()) {
              echo "<tr>";
              echo "<td>" . $data['id'] . "</td>";
              echo "<td>" . $data['nama'] . "</td>";
              echo "<td>" . $data['deskripsi'] . "</td>";
              echo "<td><img src='../form/images/" . $data['foto'] . "' alt='" . $data['nama'] . "' width='50'></td>";
              echo "<td>";
              echo "<a href='tutor-update.php?id=" . $data['id'] . "'><button class='btn btn-primary'>Update</button></a> ";
              echo "<a href='tutor-delete.php?id=" . $data['id'] . "'><button class='btn btn-danger'>Delete</button></a>";
              echo "</td>";
              echo "</tr>";
            }

            ?>
            <!-- Add more tutor rows if needed -->
          </tbody>
        </table>
      </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
  </body>

</html>