<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas" class="text-warning">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Temukan Kelas</li>
            </ol>
        </nav>
        <?php if (empty($course)):?>
            <div class="card">
                <div class="card-body">
                    Kamu sudah mengambil semua kelas
                </div>
            </div>
        <?php else:?>
        <?php foreach ($course as $row) : ?>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body pt-0 p-3 ">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= base_url() ?>media/logo/<?= $row->CourseLogo ?>" alt="" class="img-fluid mt-4">
                            </div>
                            <div class="col-md-8">
                                <h6 class=" mb-0 mt-3 text-light fw-bold"><?= $row->CourseName ?> | <?= $row->ClassName ?></h6>
                                <p class="text-secondary mt-2 small"> <i class="fas fa-school me-2"></i> <?= $row->SchoolName ?></p>
                                <a href="<?= base_url() ?>siswa/join/<?= $row->id ?>" class="btn btn-primary btn-sm">Bergabung ke Kelas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php endif;?>
    </div>

</div>
</main>