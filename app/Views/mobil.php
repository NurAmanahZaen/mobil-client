<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mobil</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Mobil</h1>
        
        <!-- Tombol Tambah Mobil -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalTambahMobil">Tambah Mobil</button>

        <table class="table table-bordered table-hover table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID_Mobil</th>
                    <th>Nama_Mobil</th>
                    <th>Tipe_Mobil</th>
                    <th>Tahun_Mobil</th>
                    <th>Plat_Nomor</th>
                    <th>Warna_Mobil</th>
                    <th>Harga_Sewa_Per_Hari</th>
                    <th>Status_Mobil</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mobil as $p): ?>
                <tr>
                    <td><?= esc($p['id_mobil']) ?></td>
                    <td><?= esc($p['nama_mobil']) ?></td>
                    <td><?= esc($p['tipe_mobil']) ?></td>
                    <td><?= esc($p['tahun_mobil']) ?></td>
                    <td><?= esc($p['plat_nomor']) ?></td>
                    <td><?= esc($p['warna_mobil']) ?></td>
                    <td><?= esc($p['harga_sewa_per_hari']) ?></td>
                    <td><?= esc($p['status_mobil']) ?></td>

                    <!-- Kolom Aksi -->
                    <td>
                        <a href="<?= base_url('mobil/edit/'.$p['id_mobil']) ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="<?= base_url('mobil/hapus/'.$p['id_mobil']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Tambah Mobil -->
    <div class="modal fade" id="modalTambahMobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Mobil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form Tambah Mobil -->
            <form action="<?= base_url('mobil/tambah') ?>" method="post">
              <div class="form-group">
                <label for="nama_mobil">Nama Mobil</label>
                <input type="text" class="form-control" name="nama_mobil" required>
              </div>
              <div class="form-group">
                <label for="tipe_mobil">Tipe Mobil</label>
                <input type="text" class="form-control" name="tipe_mobil" required>
              </div>
              <div class="form-group">
                <label for="tahun_mobil">Tahun Mobil</label>
                <input type="text" class="form-control" name="tahun_mobil" required>
              </div>
              <div class="form-group">
                <label for="plat_nomor">Plat Nomor</label>
                <input type="text" class="form-control" name="plat_nomor" required>
              </div>
              <div class="form-group">
                <label for="warna_mobil">Warna Mobil</label>
                <input type="text" class="form-control" name="warna_mobil" required>
              </div>
              <div class="form-group">
                <label for="harga_sewa_per_hari">Harga Sewa Per Hari</label>
                <input type="text" class="form-control" name="harga_sewa_per_hari" required>
              </div>
              <div class="form-group">
                <label for="status_mobil">Status Mobil</label>
                <input type="text" class="form-control" name="status_mobil" required>
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Menambahkan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>