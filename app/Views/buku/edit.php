<?= $this->include('partials/head') ?>

<div class="container">
    <h2>Edit Buku</h2>

    <form class="form" method="post" action="<?= base_url('buku/update/' . $buku['id']) ?>" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" value="<?= esc($buku['judul']) ?>" required>
        </div>

        <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" value="<?= esc($buku['penulis']) ?>" required>
        </div>

        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" value="<?= esc($buku['penerbit']) ?>" required>
        </div>

        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" id="tahun" name="tahun" value="<?= esc($buku['tahun']) ?>" required>
        </div>

        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea id="sinopsis" name="sinopsis" rows="4"><?= esc($buku['sinopsis']) ?></textarea>
        </div>

        <div class="form-group">
            <label>Cover Saat Ini:</label><br>
            <?php if (!empty($buku['cover'])): ?>
                <img src="<?= base_url('uploads/' . $buku['cover']) ?>" alt="Cover" style="max-width: 150px; border:1px solid #ccc; margin-bottom:10px;">
            <?php else: ?>
                <p><em>Tidak ada cover.</em></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label for="cover">Ganti Cover (opsional)</label>
            <input type="file" name="cover" id="cover">
        </div>

        <div class="form-group">
            <button class="btn btn-primary" type="submit">Update</button>
            <button type="button" class="btn" onclick="window.location.href='<?= base_url('/buku') ?>'">Kembali</button>
        </div>
    </form>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '<?= session()->getFlashdata('success') ?>',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<?= $this->include('partials/footer') ?>
