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
        <div class="card-body">
            <div class="row">
                <div class="col-md-5 mb-3">
                    <img src="<?=base_url()?>assets/img/vector/Grades-cuate.svg" alt="" class="w-100" srcset="">
                </div>
                <div class="col-md-7 my-auto ">
                    <p> <i class="fas fa-star text-warning fs-5"></i> <span class="text-white fw-bold">Hadiah
                            +1200XP</span></p>
                    <div class="card bg-primary text-center mt-3 py-3">
                        <p class="text-white h4">Nilai Kamu</p>
                        <p class="h1 text-white ">90</p>
                    </div>
                </div>
                <hr>
                <div class="col-md-8">
                    <p class="h3 text-white mb-5">HASIL QUIZ</p>
                    <p class="text-white"> 1. Sebutkan 5 nama kucing paling lucu sedunia!</p>
                </div>
               
            </div>
        </div>
    </div>
</div>
</div>
</main>