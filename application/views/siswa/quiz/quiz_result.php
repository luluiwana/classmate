<div class="container-fluid mt-4">
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
    <div class="row mx-0">
        <div class="card">
            <div class="card-body p-0 py-2">
                <a href="<?=base_url()?>lesson/course/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Kelas"){echo "active-menu";}?>">Misi</a>
                <a href="<?=base_url()?>siswa/leaderboard/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Leaderboard"){echo "active-menu";}?>">Leaderboard</a>
                <a href="<?=base_url()?>siswa/aktivitas/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Aktivitas"){echo "active-menu";}?>">Aktivitas</a>
                <a href="<?=base_url()?>siswa/teman/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Teman"){echo "active-menu";}?>">Teman
                </a>
                <a href="<?=base_url()?>siswa/informasi/<?=$course->CourseID?>"
                    class="btn btn-disabled mb-0 course-menu shadow-none <?php if($course_menu=="Informasi"){echo "active-menu";}?>">Informasi</a>

            </div>
        </div>
    </div>

    <div class="card card-body bg-darkgreen mt-4">
        <div class="row">
            <div class="col-md-5 mb-3">
                <img src="<?=base_url()?>assets/img/vector/Grades-cuate.svg" alt="" class="w-100" srcset="">
            </div>
            <div class="col-md-7 my-auto ">
                <h3 class="text-white mb-5"><?=$quiz->QuizTitle?></h3>
                <p> <i class="fas fa-award text-warning fs-5"></i> <span class="text-white fw-bold">Kamu mendapat
                        reward
                        <?=$user_quiz->addXP?> XP</span></p>
                <div class="bg-warning text-center mt-3 py-3" style="width:inherit">
                    <p class="text-dark h4">Nilaimu</p>
                    <p class="h1 text-dark "><?=$user_quiz->result?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-4">
        <p class="h4 text-white mb-3 ms-3"><i class="fas fa-bookmark text-warning"></i> HASIL QUIZ</p>
        <?php $x=1; foreach($feedback as $row):?>
        <?php $t=$row->TrueOption; $a=$row->answer;?>
        <div class="card card-body bg-darkblue mb-3">
            <p class="text-white h6"><?=$x?>. <?=$row->Question?></p>
            <?php if ($row->question_img!=null):?>
            <a href="<?=base_url()?>media/soal/<?=$row->question_img?>" target="_blank">
                <img src="<?=base_url()?>media/soal/<?=$row->question_img?>" style="height:200px" class="rounded ms-3"
                    alt="">
            </a>
            <?php endif;?>
            <div class="ms-3">
                <p
                    class=" <?php if($t==$a && $a=='A'){echo 'text-success border-success';}elseif($t!==$a && $a=='A'){echo 'text-white';}elseif($t=='A'){echo 'text-success border-success';}else{echo 'text-white';}?>">
                    A. <?=$row->OptionA?>
                    <?php if($t=='A'):?>
                    <i class="fas fa-check text-success"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='A'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='B'){echo 'text-success border-success';}elseif($t!==$a && $a=='B'){echo 'text-white';}elseif($t=='B'){echo 'text-success border-success';}else{echo 'text-white';}?>">
                    B. <?=$row->OptionB?>
                    <?php if($t=='B'):?>
                    <i class="fas fa-check text-success"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='B'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='C'){echo 'text-success border-success';}elseif($t!==$a && $a=='C'){echo 'text-white';}elseif($t=='C'){echo 'text-success border-success';}else{echo 'text-white';}?>">
                    C. <?=$row->OptionC?>
                    <?php if($t=='C'):?>
                    <i class="fas fa-check text-success"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='C'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='D'){echo 'text-success border-success';}elseif($t!==$a && $a=='D'){echo 'text-white';}elseif($t=='D'){echo 'text-success border-success';}else{echo 'text-white';}?>">
                    D. <?=$row->OptionD?>
                    <?php if($t=='D'):?>
                    <i class="fas fa-check text-success"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='D'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
                <p
                    class=" <?php if($t==$a && $a=='E'){echo 'text-success border-success';}elseif($t!==$a && $a=='E'){echo 'text-white';}elseif($t=='E'){echo 'text-success border-success';}else{echo 'text-white';}?>">
                    E. <?=$row->OptionE?>
                    <?php if($t=='E'):?>
                    <i class="fas fa-check text-success"></i>
                    <?php endif;?>
                    <?php if ($t!==$a && $a=='E'):?>
                    <i class="fas fa-times text-danger"></i>
                    <?php endif;?>
                </p>
            </div>

        </div>
        <?php $x++; endforeach;?>


    </div>



</div>
</div>
</main>