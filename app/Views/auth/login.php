<?= $this->include('partials/head') ?>

<body class="bg-login">
    <div class="overlay"></div>

    <div class="d-flex justify-content-center align-items-center min-vh-100 position-relative">
        <div class="card shadow-lg p-4 rounded-4" style="width: 100%; max-width: 400px; z-index: 2; background-color: rgba(255,255,255,0.95);">
            <div class="card-body text-center">

                <img id="logo" class="mb-4" src="<?= base_url('uploads/logo.png') ?>" alt="Logo" width="80">

                <h4 class="mb-4 fw-bold">Perpustakaan Digital</h4>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-warning text-start">
                        <?php foreach (session()->getFlashdata('errors') as $e): ?>
                            <div><?= esc($e) ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="post" action="<?= base_url('auth/loginProcess') ?>">
                    <div class="mb-3 text-start">
                        <label class="fw-semibold">Username</label>
                        <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
                    </div>
                    <div class="mb-4 text-start">
                        <label class="fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Login</button>
                </form>
            </div>

            <p class="text-center mt-4 text-muted small">
                &copy; <?= date('Y') ?> Universitas Siber Asia
            </p>
        </div>
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
</body>

<?= $this->include('partials/footer') ?>
