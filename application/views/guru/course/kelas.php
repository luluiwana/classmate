 <div class="row mt-4">
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
        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Anda belum membuat kelas</p>
                <a href="<?=base_url()?>guru/buatkelas" class="btn btn-primary ml-3">Buat Kelas</a>
            </div>
        </div>
        <?php endif;?>

    </div>