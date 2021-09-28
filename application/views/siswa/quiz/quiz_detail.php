<div class="container-fluid">
      <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item " aria-current="page"><a
                    href="<?=base_url()?>lesson/course/<?=$lesson->ID_Course?>" class="text-primary fw-bold">Basis
                    Data</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?>
            </li>
        </ol>
    </nav> -->
    <div class="card">
        <div class="card-body">
            <div class="container mb-5">
                <div class="row">
                    <?php foreach ($question as $row) : ?>
                        <form action="<?= base_url('quiz/QuizResult/' . $row->QuizID) ?>" method="post">

                            <div class="col-md-12 ">
                                <p>
                                    <b><?= $row->Question ?></b>
                                </p>


                                <div class="col-md-12 " id="options">

                                    <label class="options"><?= $row->OptionA ?>
                                        <input type="radio" name="pertanyaan<?= $row->QuestionID ?>" value="A"> <span class="checkmark text-center"></span>

                                    </label> <label class="options"><?= $row->OptionB ?>
                                        <input type="radio" name="pertanyaan<?= $row->QuestionID ?>" value="B"> <span class="checkmark "></span>
                                    </label> <label class="options"><?= $row->OptionC ?>
                                        <input type="radio" name="pertanyaan<?= $row->QuestionID ?>" value="C"> <span class="checkmark"></span> </label>
                                    <label class="options"><?= $row->OptionD ?> <input type="radio" name="pertanyaan<?= $row->QuestionID ?>" value="D"> <span class="checkmark"></span> </label>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <input type="submit" value="Selesei" class="btn btn-block btn-primary">
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>