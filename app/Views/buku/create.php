<?= $this->include('partials/head') ?>

<div class="container">
    <h2>Tambah Buku</h2>

    <form action="<?= base_url('buku/store') ?>" method="post" enctype="multipart/form-data" class="form">
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>
        </div>

        <div class="form-group">
            <label for="penulis">Penulis:</label>
            <input type="text" name="penulis" id="penulis">
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit:</label>
            <input type="text" name="penerbit" id="penerbit">
        </div>

        <div class="form-group">
            <label for="tahun">Tahun:</label>
            <input type="text" name="tahun" id="tahun" maxlength="4">
        </div>

        <div class="form-group">
            <label for="sinopsis">Sinopsis:</label>
            <textarea name="sinopsis" id="sinopsis" rows="4"></textarea>
        </div>

        <div class="form-group">
            <label for="cover">Cover:</label>
            <input type="file" name="cover" id="cover">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn" onclick="window.location.href='<?= base_url('/buku') ?>'">Kembali</button>
        </div>
    </form>
</div>

<?= $this->include('partials/footer') ?>
