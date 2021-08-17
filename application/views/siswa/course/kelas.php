<div class="container-fluid py-4">
    <div class="row">

        <?php if (!empty($courseList)) :?>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="<?=base_url()?>siswa/carikelas" class="btn btn-primary me-md-2" type="button">Temukan Kelas</a>
        </div>
        <?php foreach ($courseList as $row):?>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body pt-0 p-3 ">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="<?=base_url()?>media/logo/<?=$row->CourseLogo?>" class="img-fluid mt-4" alt="">
                        </div>
                        <div class="col-md-9">
                            <h6 class=" mb-0 mt-3 text-light fw-bold"><?=$row->CourseName?></h6>
                            <div class="progress mt-3">
                                <div class="progress-bar" role="progressbar" style="width: 25%; height:17px"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
         

        <?php else:?>
        <div class="card">
            <div class="card-body">
                <p>Kamu belum mendaftar kelas apapun</p>
                <a href="<?=base_url()?>siswa/carikelas" class="btn btn-primary ml-3">Temukan Kelas</a>
            </div>
        </div>
        <?php endif;?>

    </div>

</div>
</main>