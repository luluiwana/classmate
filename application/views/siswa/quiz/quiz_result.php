<div class="row mx-4 mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="<?=base_url()?>lesson/course/<?=$CourseID?>"
                    class="text-primary fw-bold">Basis
                    Data</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$quiz->QuizTitle?>
            </li>
        </ol>
    </nav>
    <div class="card bg-darkpurple">
        <div class="card-body p-0">
            <div class="row">

                <div class="col-md-5 mb-3">
                    <img src="<?=base_url()?>assets/img/vector/Grades-cuate.svg" alt="" class="w-100" srcset="">
                </div>
                <div class="col-md-7 my-auto ">
                    <h3 class="text-white mb-5"><?=$quiz->QuizTitle?></h3>
                    <p> <i class="fas fa-star text-warning fs-5"></i> <span class="text-white fw-bold">Kamu mendapat
                            reward
                            <?=$user_quiz->addXP?> XP</span></p>
                    <div class="card bg-primary text-center mt-3 py-3" style="width:inherit">
                        <p class="text-white h4">Nilaimu</p>
                        <p class="h1 text-white "><?=$user_quiz->result?></p>
                    </div>
                </div>
                <div class="col-md-12 mt-5">
                    <p class="h3 text-white mb-3 ms-3">HASIL QUIZ</p>
                    <?php $x=1; foreach($feedback as $row):?>
                    <?php $t=$row->TrueOption; $a=$row->answer;?>
                    <div class="card-forum">
                        <p class="text-white mb-2 h6"><?=$x?>. <?=$row->Question?></p>
                        <p
                            class="border rounded border-2 p-2 mb-2 <?php if($t==$a && $a=='A'){echo 'text-success border-success';}elseif($t!==$a && $a=='A'){echo 'text-danger border-danger';}elseif($t=='A'){echo 'text-success border-success';}else{echo 'border-secondary text-secondary';}?>">
                            <?=$row->OptionA?>
                            <?php if($t=='A'):?>
                            <i class="fas fa-check text-success"></i>
                            <?php endif;?>
                            <?php if ($t!==$a && $a=='A'):?>
                            <i class="fas fa-times text-danger"></i>
                            <?php endif;?>
                        </p>
                          <p
                            class="border rounded border-2 p-2 mb-2 <?php if($t==$a && $a=='B'){echo 'text-success border-success';}elseif($t!==$a && $a=='B'){echo 'text-danger border-danger';}elseif($t=='B'){echo 'text-success border-success';}else{echo 'border-secondary text-secondary';}?>">
                            <?=$row->OptionB?>
                            <?php if($t=='B'):?>
                            <i class="fas fa-check text-success"></i>
                            <?php endif;?>
                            <?php if ($t!==$a && $a=='B'):?>
                            <i class="fas fa-times text-danger"></i>
                            <?php endif;?>
                        </p>
                          <p
                            class="border rounded border-2 p-2 mb-2 <?php if($t==$a && $a=='C'){echo 'text-success border-success';}elseif($t!==$a && $a=='C'){echo 'text-danger border-danger';}elseif($t=='C'){echo 'text-success border-success';}else{echo 'border-secondary text-secondary';}?>">
                            <?=$row->OptionC?>
                            <?php if($t=='C'):?>
                            <i class="fas fa-check text-success"></i>
                            <?php endif;?>
                            <?php if ($t!==$a && $a=='C'):?>
                            <i class="fas fa-times text-danger"></i>
                            <?php endif;?>
                        </p>
                          <p
                            class="border rounded border-2 p-2 mb-2 <?php if($t==$a && $a=='D'){echo 'text-success border-success';}elseif($t!==$a && $a=='D'){echo 'text-danger border-danger';}elseif($t=='D'){echo 'text-success border-success';}else{echo 'border-secondary text-secondary';}?>">
                            <?=$row->OptionD?>
                            <?php if($t=='D'):?>
                            <i class="fas fa-check text-success"></i>
                            <?php endif;?>
                            <?php if ($t!==$a && $a=='D'):?>
                            <i class="fas fa-times text-danger"></i>
                            <?php endif;?>
                        </p>
                          <p
                            class="border rounded border-2 p-2 mb-2 <?php if($t==$a && $a=='E'){echo 'text-success border-success';}elseif($t!==$a && $a=='E'){echo 'text-danger border-danger';}elseif($t=='E'){echo 'text-success border-success';}else{echo 'border-secondary text-secondary';}?>">
                            <?=$row->OptionE?>
                            <?php if($t=='E'):?>
                            <i class="fas fa-check text-success"></i>
                            <?php endif;?>
                            <?php if ($t!==$a && $a=='E'):?>
                            <i class="fas fa-times text-danger"></i>
                            <?php endif;?>
                        </p>
                      
                    </div>
                    <?php $x++; endforeach;?>


                </div>

            </div>
        </div>
    </div>
</div>
</div>
</main>