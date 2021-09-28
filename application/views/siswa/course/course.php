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
                                <a href="<?=base_url()?>lesson/study/<?=$lesson->LessonID?>">
                                    <?php if($this->M_Lesson->isLessonComplete($lesson->LessonID)==true): ?>
                                    <div class="mt-2 text-secondary text-white">
                                        <i class="fas fa-star me-2 fs-5  text-warning"></i>
                                        <span class=""><?=$lesson->LessonTitle?></span>


                                    </div>
                                    <?php else:?>
                                    <div class="mt-2 text-secondary">
                                        <i class="fas fa-star me-2 fs-5"></i>
                                        <span class=""><?=$lesson->LessonTitle?></span>

                                    </div>
                                    <?php endif?>
                                </a>
                                <hr>
                                <?php endforeach;?>
                                <?php $quiz = $this->M_Lesson->getQuiz($row->CompetenciesID)?>
                                <?php foreach($quiz as $q):?>
                                <a href="<?=base_url()?>quiz/quiz_detail/<?=$q->QuizID?>"><div class="mt-2 text-secondary"> <i class="fas fa-gamepad me-2 fs-5"></i> <?=$q->QuizTitle?></div></a>
                                <hr>
                                <?php endforeach;?>
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
                    <img src="<?=base_url()?>assets/character/<?=$user->LevelID?>.png" class="" style="max-height: 200px;" alt="">
                </div>
                <div class="bg-dark text-white fw-bold py-2 text-center mb-3">
                    <?=$user->desc?>
                </div>
                <!-- start badges -->
                <div class="text-center">
                    <?php if($user->LevelID==0):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Raih 500XP untuk mendapatkan lencana PEMULA'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1-gs.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Raih 1000XP untuk mendapatkan lencana PETUALANG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/2-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Raih 2000XP untuk mendapatkan lencana PEJUANG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/3-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Raih 4000XP untuk mendapatkan lencana PETARUNG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/4-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Raih 8000XP untuk mendapatkan lencana MASTER'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/5-gs.png' alt='' class='w-100'></button>
                    </span>
                    <?php elseif($user->LevelID==1):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Raih 1000XP untuk mendapatkan lencana PETUALANG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/2-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Raih 2000XP untuk mendapatkan lencana PEJUANG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/3-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Raih 4000XP untuk mendapatkan lencana PETARUNG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/4-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Raih 8000XP untuk mendapatkan lencana MASTER'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/5-gs.png' alt='' class='w-100'></button>
                    </span>
                    <?php elseif($user->LevelID==2):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/2.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Raih 2000XP untuk mendapatkan lencana PEJUANG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/3-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Raih 4000XP untuk mendapatkan lencana PETARUNG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/4-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Raih 8000XP untuk mendapatkan lencana MASTER'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/5-gs.png' alt='' class='w-100'></button>
                    </span>
                    <?php elseif($user->LevelID==3):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/2.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/3.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Raih 4000XP untuk mendapatkan lencana PETARUNG'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/4-gs.png' alt='' class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Raih 8000XP untuk mendapatkan lencana MASTER'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/5-gs.png' alt='' class='w-100'></button>
                    </span>
                    <?php elseif($user->LevelID==4):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/2.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/3.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Penghargaan karena kamu telah mencapai 4000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/4.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Raih 8000XP untuk mendapatkan lencana MASTER'>
                        <button class='btn m-0 p-0' type='button' disabled> <img
                                src='<?=base_url()?>assets/badge/5-gs.png' alt='' class='w-100'></button>
                    </span>
                    <?php elseif($user->LevelID==5):?>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pemula'
                        data-bs-content='Penghargaan karena kamu telah mencapai 500XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/1.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petualang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 1000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/2.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Pejuang'
                        data-bs-content='Penghargaan karena kamu telah mencapai 2000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/3.png' alt=''
                                class='w-100'></button>
                    </span>
                     <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Petarung'
                        data-bs-content='Penghargaan karena kamu telah mencapai 4000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/4.png' alt=''
                                class='w-100'></button>
                    </span>
                    <span class='d-inline-block w-15' tabindex='0' data-bs-toggle='popover' data-bs-placement="top"
                        data-bs-trigger='hover focus' title='Lencana Master'
                        data-bs-content='Penghargaan karena kamu telah mencapai 8000XP'> <button class='btn m-0 p-0'
                            type='button' disabled> <img src='<?=base_url()?>assets/badge/5.png' alt=''
                                class='w-100'></button>
                    </span>
                    <?php endif;?>
                </div>
                <!-- end badges -->
            </div>
        </div>
    </div>

</div>
</div>
</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
<script>
    //chart js
var data = {
	labels: ["Tantangan selesai", "Tantangan belum selesai"],
	datasets: [
		{
			data: [12, 8],
			backgroundColor: ["#7200ff", "#191b2a"],
			hoverBackgroundColor: ["#7200ff", "#191b2a"],
		},
	],
};

var promisedDeliveryChart = new Chart(document.getElementById('myChart'), {
  type: 'doughnut',
  data: data,
  options: {
  	responsive: true,
	   cutoutPercentage: 70,
    legend: {
      display: false
    }
  }
});

Chart.pluginService.register({
  beforeDraw: function(chart) {
    var width = chart.chart.width,
        height = chart.chart.height,
        ctx = chart.chart.ctx;

    ctx.restore();
    var fontSize = (height / 114).toFixed(2);
    ctx.font = fontSize + "em sans-serif";
    ctx.textBaseline = "middle";
	ctx.fillStyle = "#fff";

    var text = "12/20",
        textX = Math.round((width - ctx.measureText(text).width) / 2),
        textY = height / 2;

    ctx.fillText(text, textX, textY);
    ctx.save();
  }
});
</script>