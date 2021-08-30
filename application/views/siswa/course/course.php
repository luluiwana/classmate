<div class="row mt-4">
    <p class="small text-white"> <i class="fas fa-dot-circle text-primary me-1"></i> 3 MISI</p>
    <div class="col-md-8">
        <?php foreach($kd as $row):?>
        <div class="card bg-darkgreen mt-2">
            <div class="card-body p-0 ">
                <div class="accordion text-dark " id="accordionFlushExample">
                    <div class="accordion-item text-dark">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#KD<?=$row->CompetenciesID?>" aria-expanded="false"
                                aria-controls="KD<?=$row->CompetenciesID?>"><i class="fas fa-fire text-warning me-3 fs-3"></i>
                                <?=$row->CompetenciesName?>
                            </button>
                        </h2>
                        <div id="KD<?=$row->CompetenciesID?>" class="accordion-collapse collapse bg-dark text-white"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                            </div>
                            <div class="accordion-body">
                                <p class="small text-secondary mb-4">5 Tantangan</p>
                                <?php $lessons = $this->M_Lesson->getLessons($row->CompetenciesID)?>
                                <?php foreach($lessons as $lesson):?>
                                <a href="<?=base_url()?>lesson/study/1">
                                    <div class="mt-2 text-white">
                                        <i class="fas fa-fan me-2 text-warning fs-5"></i> <?=$lesson->LessonTitle?>
                                        <i
                                            class="fas fa-check-circle float-right position-absolute end-5 text-warning fs-3"></i>
                                    </div>
                                </a>
                                <?php endforeach;?>
                                <hr>
                                <div class="mt-2 text-secondary"> <i class="fas fa-gamepad me-2 fs-5"></i> Quiz 1</div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="text-white">Progress</h5>
            </div>
        </div>
    </div>

</div>
</div>
</main>