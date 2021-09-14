<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-7">
            <div class="card bg-darkpurple">
                <div class="card-body row">
                    <div class="col-md-7">
                        <p class="text-white fw-bold text-uppercase mb-0"><?=$user->UserName?>
                        </p>
                        <p class="text-warning fw-bolder fs-2 text-uppercase"><?=$user->desc?></p>
                        <hr>
                        <div class="row text-white small">
                            <div class="col-md-3 w-50">
                                Kelas <p class="fw-bold fs-4"><?=$countCourse?></p>
                            </div>
                            <div class="col-md-3 w-50">
                                Misi <p class="fw-bold fs-4">0/6</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row text-white small">
                            <p>Lencana</p>
                            <div class="">
                                <img src="<?=base_url()?>assets/badge/1.png" alt=""class="badges">
                                <img src="<?=base_url()?>assets/badge/2.png" alt=""class="badges">
                                <img src="<?=base_url()?>assets/badge/3.png" alt=""class="badges">
                                <img src="<?=base_url()?>assets/badge/4.png" alt=""class="badges">
                                <img src="<?=base_url()?>assets/badge/5.png" alt=""class="badges">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 text-center">
                        <img src="<?=base_url()?>assets/character/<?=$user->LevelID?>.png" class="character" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <div class="card bg-darkgreen">
                        <div class="card-body">
                            <p class="text-white fw-bold small"> <i class="fas fa-dot-circle text-success me-1"></i> TOTAL XP</p>
                            <p class="text-white fw-bold fs-2 text-center"><?=$total_xp?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="card bg-darkgreen">
                        <div class="card-body">
                            <p class="text-white fw-bold small"> <i class="fas fa-dot-circle text-success me-1"></i>LEVEL</p>
                            <p class="text-white fw-bold fs-2 text-center"><i class="fas fa-star"></i><?=$user->LevelID?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">Live Coding</h5>

                                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>siswa/livecode">
                                    Mulai Coding
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 d-none d-sm-block">
                    <div class="card h-100 p-3">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                            <span class="mask bg-gradient-dark"></span>
                            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                <h5 class="text-white font-weight-bolder mb-4 pt-2">Forum Diskusi</h5>

                                <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                    href="<?=base_url()?>siswa/discussion">
                                    Jelajahi Forum
                                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <h6 class="text-white font-weight-bolder mb-2 pt-2">Kelas Terbaru</h6>
        <?php if (!empty($courseList)) :?>

        <?php foreach ($courseList as $row):?>
        <div class="col-md-4 mt-2">
            <a href="<?=base_url()?>lesson/course/<?=$row->CourseID?>">
                <div class="card course-link">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-3 text-center course-logo my-auto">
                                <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                            </div>
                            <div class="col-md-9 course-info">
                                <p class=" text-light fw-bold mb-0"><?=$row->CourseName?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach;?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-4">
            <a href="<?=base_url()?>siswa/kelas" class="btn btn-warning me-md-2" type="button">Lihat Semua Kelas</a>
        </div>

        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Kamu belum mendaftar kelas apapun</p>
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-warning ml-3">Temukan Kelas</a>
            </div>
        </div>
        <?php endif;?>

    </div>

</div>
</main>