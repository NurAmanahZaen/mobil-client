<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Mobil</h1>
        
        <form action="<?= base_url('mobil/update') ?>" method="post">
            <input type="hidden" name="id" value="<?= esc($mobil['id']) ?>">

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
            <a href="<?= base_url('mobil') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>