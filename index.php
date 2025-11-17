<?php
require_once 'config.php';
require_once 'functions.php';

// ambil semua data
$stmt = $mysqli->prepare("SELECT id, nama, nim, jurusan, created_at FROM mahasiswa ORDER BY id DESC");
$stmt->execute();
$res = $stmt->get_result();
$rows = $res->fetch_all(MYSQLI_ASSOC);
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Daftar Mahasiswa - CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h1 class="mb-4">Daftar Mahasiswa</h1>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

    <?php if(count($rows) === 0): ?>
      <div class="alert alert-info">Belum ada data.</div>
    <?php else: ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Jurusan</th>
          <th>Dibuat</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($rows as $r): ?>
        <tr>
          <td><?= h($r['id']) ?></td>
          <td><?= h($r['nama']) ?></td>
          <td><?= h($r['nim']) ?></td>
          <td><?= h($r['jurusan']) ?></td>
          <td><?= h($r['created_at']) ?></td>
          <td>
            <a href="edit.php?id=<?= h($r['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="delete.php?id=<?= h($r['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; ?>
  </div>
</body>
</html>
