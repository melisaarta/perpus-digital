<?= $this->include('partials/head') ?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h3 class="fw-bold mb-2">📚 Daftar Buku</h3>
        <div>
            <span class="me-2 text-secondary">👤 Login sebagai: <strong><?= esc(session()->get('username')) ?></strong></span>
            <a href="<?= base_url('/auth/logout') ?>" class="btn btn-outline-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <!-- Search Bar -->
    <form method="get" action="<?= base_url('/buku') ?>" class="mb-4">
        <div class="input-group shadow-sm">
            <input type="text" name="keyword" class="form-control" placeholder="🔍 Cari buku berdasarkan judul, penulis..." value="<?= esc($_GET['keyword'] ?? '') ?>">
            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
        </div>
    </form>

    <!-- Tambah Buku -->
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <a href="<?= base_url('/buku/create') ?>" class="btn btn-success">
            <i class="fas fa-plus me-1"></i> Tambah Buku
        </a>
    </div>

    <!-- Daftar Buku -->
    <?php if ($buku): ?>
    <div class="row g-4">
        <?php foreach ($buku as $b): ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm border-0">
                <?php if ($b['cover']): ?>
                    <img src="<?= base_url('uploads/' . $b['cover']) ?>" class="card-img-top" alt="Cover buku <?= esc($b['judul']) ?>" style="height: auto; object-fit: cover;">
                <?php else: ?>
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 220px;">
                        <span class="fst-italic">Tidak ada cover</span>
                    </div>
                <?php endif; ?>
                <div class="card-body d-flex flex-column">
                    <h6 class="card-title fw-bold"><?= esc($b['judul']) ?></h6>
                    <p class="card-text text-muted mb-2" style="font-size: 0.9rem;">
                        <i class="fas fa-user-edit me-1"></i> <?= esc($b['penulis']) ?><br>
                        <i class="fas fa-building me-1"></i> <?= esc($b['penerbit']) ?><br>
                        <i class="fas fa-calendar-alt me-1"></i> <?= esc($b['tahun']) ?>
                    </p>
                    <?php if (!empty($b['sinopsis'])): ?>
                        <p class="card-text text-secondary small mb-3">
                            <?= esc(word_limiter($b['sinopsis'], 20)) ?>
                        </p>
                    <?php endif; ?>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="<?= base_url('/buku/edit/' . $b['id']) ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 d-flex align-items-center">
                            <i class="fas fa-edit me-1"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3 d-flex align-items-center btn-delete" data-id="<?= $b['id'] ?>">
                            <i class="fas fa-trash-alt me-1"></i> Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
        <div class="text-center text-muted py-5">
            <i class="fas fa-book-open fa-2x mb-3"></i>
            <p class="mb-0">Tidak ada data buku.</p>
        </div>
    <?php endif ?>

    <!-- Pagination -->
    <?php if ($pager): ?>
    <div class="mt-4 d-flex justify-content-center align-items-center">
        <p class="mb-0 me-2 fw-semibold">Halaman</p>
        <?= $pager->links() ?>
    </div>
    <?php endif; ?>
</div>

<!-- SweetAlert success flash -->
<?php if (session()->getFlashdata('success')): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '<?= session()->getFlashdata('success') ?>',
        timer: 2500,
        showConfirmButton: false
    });
</script>
<?php endif; ?>

<!-- SweetAlert Delete Confirm -->
<script>
    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const id = this.dataset.id;

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data buku ini akan dihapus secara permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "<?= base_url('/buku/delete/') ?>" + id;
                }
            });
        });
    });
</script>

<?= $this->include('partials/footer') ?>
