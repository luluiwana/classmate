<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-light">Kelas</p>
                                <h5 class="font-weight-bolder mb-0 text-light">
                                    <?=$countCourse?>
                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-light">Siswa</p>
                                <h5 class="font-weight-bolder mb-0 text-light">
                                    <?=$countSiswa?>

                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-light">Materi</p>
                                <h5 class="font-weight-bolder mb-0 text-light">
                                    0

                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold text-light">Quiz</p>
                                <h5 class="font-weight-bolder mb-0 text-light">
                                    0

                                </h5>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="d-flex flex-column h-100 text-light">
                                <p class="mb-1 pt-2 text-bold">Guru</p>
                                <h5 class="font-weight-bolder text-light"><?=
                                $this->session->userdata('nama');
                                ?></h5>

                                <a href="" class="btn btn-primary btn-sm mt-4">Download Rekap Nilai</a>
                            </div>
                        </div>
                        <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                            <div class="bg-gradient-primary border-radius-lg h-100">
                                <img src="<?=base_url()?>assets/img/shapes/waves-white.svg"
                                    class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                                <div class="position-relative d-flex align-items-center justify-content-center h-100">
                                    <img class="w-100 position-relative z-index-2 pt-4"
                                        src="<?=base_url()?>assets/img/illustrations/rocket-white.png" alt="rocket">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card h-100 p-3">
                <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                    style="background-image: url('<?=base_url()?>assets/img/ivancik.jpg');">
                    <span class="mask bg-gradient-dark"></span>
                    <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                        <h5 class="text-white font-weight-bolder mb-4 pt-2">Forum Diskusi</h5>
                        <p class="text-white">Berinteraksi dan tanya jawab bersama siswa </p>
                        <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                            Jelajahi forum diskusi
                            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <h5 class="text-white font-weight-bolder mb-4 pt-2">Kelas Terbaru</h5>
        <?php if (!empty($courseList)) :?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?=base_url()?>guru/buatkelas" class="btn btn-primary me-md-2" type="button">Buat Kelas</a>
        </div>

        <?php foreach ($courseList as $row ):?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body pt-0 p-3 ">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="img-fluid mt-3" alt="">
                        </div>
                        <div class="col-md-9">
                            <h6 class=" mb-0 mt-3 text-light"><a href=""
                                    class="text-light fw-bolder"><?=$row->CourseName?>
                                    (<?=$row->ClassName?>)</a></h6>
                            <p class="text-secondary mt-2 small"> <i class="fas fa-school me-2"></i>
                                <?=$row->SchoolName?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="<?=base_url()?>guru/kelas" class="btn btn-primary me-md-2" type="button">Lihat Semua Kelas</a>
        </div>
        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Anda belum membuat kelas</p>
                <a href="<?=base_url()?>guru/buatkelas" class="btn btn-primary ml-3">Buat Kelas</a>
            </div>
        </div>
        <?php endif;?>

    </div>

</div>
</main>