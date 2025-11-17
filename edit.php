<?php
require_once 'config.php';
require_once 'functions.php';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $nim = trim($_POST['nim'] ?? '');
    $jurusan = trim($_POST['jurusan'] ?? '');

    if ($nama === '') $errors[] = 'Nama wajib diisi';
    if ($nim === '') $errors[] = 'NIM wajib diisi';
    if ($jurusan === '') $errors[] = 'Jurusan wajib diisi';

    if (empty($errors)) {
        $stmt = $mysqli->prepare("INSERT INTO mahasiswa (nama, nim, jurusan) VALUES (?, ?, ?)");
        $stmt->bind_param('sss', $nama, $nim, $jurusan);
        $ok = $stmt->execute();
        if ($ok) {
            redirect('index.php');
        } else {
            $errors[] = 'Gagal menyimpan data: ' . $stmt->error;
        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h1>Tambah Mahasiswa</h1>
    <a href="index.php" class="btn btn-secondary mb-3">Kembali</a>

    <?php if($errors): ?>
      <div class="alert alert-danger">
        <ul><?php foreach($errors as $e) echo "<li>".h($e)."</li>"; ?></ul>
      </div>
    <?php endif; ?>

    <form method="post" novalidate>
      <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= h($_POST['nama'] ?? '') ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">NIM</label>
        <input type="text" name="nim" class="form-control" value="<?= h($_POST['nim'] ?? '') ?>">
      </div>
      <div class="mb-3">
        <label class="form-label">Jurusan</label>
        <input type="text" name="jurusan" class="form-control" value="<?= h($_POST['jurusan'] ?? '') ?>">
      </div>
      <button class="btn btn-primary">Simpan</button>
    </form>
  </div>
</body>
</html>
