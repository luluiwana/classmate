<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Classmate</h3>
                               
                            </div>
                            <div class="card-body">
                               <div class="fw-bold text-danger small"><?php echo validation_errors(); ?></div>
                                <form role="form" method="POST" action="<?= base_url('auth/daftar') ?>">
                                    <label>Nama Lengkap</label>
                                    <div class="mb-3">
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Masukkan Nama" aria-describedby="username-addon" required>
                                    </div>
                                    <label>Email Kamu</label>
                                    <div class="mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Masukkan alamat e-mail"
                                            aria-label="username" aria-describedby="username-addon" required>
                                    </div>
                                    <label>Nomor Telepon Kamu</label>
                                    <div class="mb-3">
                                        <input type="tel" name="telp" class="form-control" placeholder="Masukkan Nomor Telp"
                                            aria-label="username" aria-describedby="username-addon" required>
                                    </div>
                                    <label>Daftar Sebagai</label>
                                    <div class="mb-3">
                                       <div class="form-check">
                                            <input class="form-check-input" type="radio" name="userRole"
                                                id="flexRadioDefault2" value="2" required>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Siswa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="userRole"
                                                id="flexRadioDefault1" value="1" required>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Guru
                                            </label>
                                        </div>
                                       
                                    </div>
                                    <label>Buat Password</label>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" aria-label="Buat Password"
                                            aria-describedby="password-addon" required autocomplete="off">
                                    </div>
                                    <label>Konfirmasi Password</label>
                                    <div class="mb-3">
                                        <input type="password" name='passconf' class="form-control"
                                            placeholder="Konfirmasi Password"
                                            aria-describedby="password-addon" required autocomplete="off">
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0"
                                            value="Daftar">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    Sudah memiliki akun?
                                    <a href="<?= base_url() ?>auth/"
                                        class="text-info text-gradient font-weight-bold">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                style="background-image:url('<?= base_url() ?>assets/img/curved-images/curved6.jpg')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>