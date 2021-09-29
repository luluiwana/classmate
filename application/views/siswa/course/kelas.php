<div class="container-fluid py-4">
    <div class="row">
        <?php if (!empty($courseList)) :?>
        <div class="col-md-6">
            <div class="d-grid gap-2 d-md-flex ">
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-warning me-md-2" type="button">Temukan Kelas</a>
            </div>
            <p class="fw-bold text-white small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i> KELAS SAYA</p>
            <?php foreach ($courseList as $row):?>
            <div class="mt-2">
                <a href="<?=base_url()?>lesson/course/<?=$row->CourseID?>">
                    <div class="card course-link">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-3 text-center course-logo my-auto">
                                    <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="w-100 " alt="">
                                </div>
                                <div class="col-md-9 course-info">
                                    <p class=" text-light fw-bold mb-0"><?=$row->CourseName?></p>
                                    <p class=" text-secondary fw-bold mb-0 small"><?=$row->ClassName?> -
                                        <?=$row->SchoolName?></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </a>
            </div>
            <?php endforeach;?>

        </div>
        <div class="col-md-6 d-none d-sm-block">
            <img src="<?=base_url()?>assets/img/vector/Course app-pana.svg" class="w-100" alt="">
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