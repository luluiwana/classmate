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
                                data-bs-toggle="collapse" data-bs-target="#KD<?=$row->CompetenciesID?>"
                                aria-expanded="false" aria-controls="KD<?=$row->CompetenciesID?>"><i
                                    class="fas fa-fire text-warning me-3 fs-3"></i>
                                <?=$row->CompetenciesName?>
                            </button>
                        </h2>
                        <div id="KD<?=$row->CompetenciesID?>" class="accordion-collapse collapse bg-dark text-white"
                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">

                            <div class="accordion-body">
                                <p class="small text-secondary mb-4">Tantangan</p>
                                <?php $lessons = $this->M_Lesson->getLessons($row->CompetenciesID)?>
                                <?php foreach($lessons as $lesson):?>
                                <a href="<?=base_url()?>lesson/study/<?=$lesson->IDLesson?>">
                                    <div class="mt-2 text-secondary">
                                        <i
                                            class="fas fa-book me-2 <?php if($lesson->Score!=NULL){echo "text-warning";}?> fs-5"></i>
                                        <span
                                            class="<?php if($lesson->Score!=NULL){echo "text-white";}?>"><?=$lesson->LessonTitle?></span>
                                        <?php if($lesson->Score!=NULL):?>
                                            <i
                                            class="fas fa-check-circle float-right position-absolute end-5 text-warning fs-3"></i>
                                        <?php endif;?>
                                    </div>
                                </a>
                                <hr>
                                <?php endforeach;?>

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
    <div class="col-md-4 mt-2">
        <div class="card">
            <div class="card-body p-0 pb-4">
                <div class="text-center text-white fw-bold mt-3">
                    Tantangan
                    <canvas id="myChart" class="mt-3"></canvas>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body row ">

                <div class="text-white fw-bold w-30 text-center">Skor
                    <p class="fs-5 text-warning fw-bolder"><?=$score?></p>
                </div>
                <div class="text-white fw-bold w-40 text-center">Total XP
                    <p class="fs-5 text-warning fw-bolder"><?=$total_xp?></p>
                </div>
                <div class="text-white fw-bold w-30 text-center">Level
                    <p class="fs-5 text-warning fw-bolder"><?=$user->LevelID?></p>
                </div>
                <div class="text-center mb-3">
                    <img src="<?=base_url()?>assets/character/1.png" class="w-50" alt="">
                </div>
                <div class="bg-dark text-white fw-bold py-2 text-center mb-3">
                    PEMULA
                </div>
                <div class="text-center">
                    <img src="<?=base_url()?>assets/badge/1.png" alt="" class="w-15">
                    <img src="<?=base_url()?>assets/badge/2.png" alt="" class="w-15">
                    <img src="<?=base_url()?>assets/badge/3.png" alt="" class="w-15">
                    <img src="<?=base_url()?>assets/badge/4.png" alt="" class="w-15">
                    <img src="<?=base_url()?>assets/badge/5.png" alt="" class="w-15">
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
</main>