<div class="container">
    <div class="row mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url() ?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?= base_url() ?>guru/course/<?= $course->CourseID ?>" class="text-primary fw-bold">
                        <?= $course->CourseName ?> - <?= $course->ClassName ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?=$quiz->QuizTitle?>
                </li>
            </ol>
        </nav>
    </div>
    <div class="card card-body d-block bg-darkpurple">
        <h5 class="text-white">Quiz: <?=$quiz->QuizTitle?></h5>
        <a data-bs-toggle="modal" data-bs-target="#addMateri" class="btn btn-warning"
            href="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>"><i class="fas fa-plus"></i> Tambah
            Soal</a>
        <a href="" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#editQuiz">Edit Quiz</a>
        <div class="modal" id="editQuiz" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                       <label for="">Judul Quiz</label>
                       <input type="text" value="<?=$quiz->QuizTitle?>" class="form-control mb-3">
                       <a href="" class="btn btn-primary">Simpan</a>
                       <a href="" class="btn btn-danger float-end">Hapus Quiz</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-9 mt-3">
            <?php
        if (!empty($question)) {
            $i = 1;
            foreach ($question as $row) : ?>

            <div class="card mb-2">
                <div class="accordion text-dark " id="accordionFlushExample">
                    <div class="accordion-item text-dark">
                        <h2 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed text-white course-link" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['QuestionID'] ?>"
                                aria-expanded="false" aria-controls="collapse<?= $row['QuestionID'] ?>">
                                <?= $i ?>. <?= $row['Question'] ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $row['QuestionID'] ?>"
                            class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <?php if($row['question_img']!=NULL):?>
                                <a href="<?=base_url()?>media/soal/<?=$row['question_img']?>" target="_blank">
                                    <img src="<?=base_url()?>media/soal/<?=$row['question_img']?>" style="height:200px"
                                        class="rounded" alt="">
                                </a>
                                <?php endif;?>
                                <?php $to=$row['TrueOption']?>
                                <p>a. <?= $row['OptionA'] ?>
                                    <?php if($to=="A"):?>
                                    <i class="fas fa-check text-success"></i>
                                    <?php endif;?>
                                </p>
                                <p>b. <?= $row['OptionB'] ?>
                                    <?php if($to=="B"):?>
                                    <i class="fas fa-check text-success"></i>
                                    <?php endif;?>
                                </p>
                                <p>c. <?= $row['OptionC'] ?>
                                    <?php if($to=="C"):?>
                                    <i class="fas fa-check text-success"></i>
                                    <?php endif;?>
                                </p>
                                <p>d. <?= $row['OptionD'] ?>
                                    <?php if($to=="D"):?>
                                    <i class="fas fa-check text-success"></i>
                                    <?php endif;?>
                                </p>
                                <p>e. <?= $row['OptionE'] ?>
                                    <?php if($to=="E"):?>
                                    <i class="fas fa-check text-success"></i>
                                    <?php endif;?>
                                </p>
                                <div class="btn-group btn-group-sm mt-3" role="group"
                                    aria-label="Basic outlined example">
                                    <a href="<?= base_url('guru/edit_question/' . $courseID . '/' . $row['QuestionID']) ?>"
                                        class="btn btn-outline-info" data-bs-toggle="modal"
                                        data-bs-target="#edit<?= $row['QuestionID'] ?>"> <i class="fas fa-edit"></i>
                                        Edit</a>
                                    <a href="<?= base_url('guru/hapus_soal/' . $courseID . '/'  . $id . '/' . $row['QuestionID']) ?>"
                                        class="btn btn-outline-warning rounded-end"><i class="fas fa-trash"></i>
                                        Hapus</a>
                                    <div class="modal" id="edit<?= $row['QuestionID'] ?>" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <span class="text-white fw-bolder">Edit Soal</span>
                                                    <button type="button" class="btn-close float-end"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                    <hr>
                                                    <form
                                                        action="<?= base_url('guru/edit_question/' . $courseID . '/' . $row['QuestionID']) ?>"
                                                        method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" name="quizid" value="<?=$row['QuizID']?>">
                                                        <div class="col-12">
                                                            <label class="">Pertanyaan </label>
                                                            <textarea name="soal" class="form-control  text-white"
                                                                rows="5" required><?= $row['Question'] ?></textarea>
                                                        </div>
                                                        <label class="mt-3">Pilihan Jawaban</label>
                                                        <div class="row ms-1 mt-1">
                                                            <div class="w-10 bg-warning rounded-start">
                                                                <div class="fw-bold text-center mt-2">A</div>
                                                            </div>
                                                            <div class="w-90 ps-0">
                                                                <input type="text" name='jawaban_1'
                                                                    class="form-control rounded-0 rounded-end"
                                                                    placeholder="Pilihan Jawaban A"
                                                                    value="<?= $row['OptionA'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row ms-1 mt-3">
                                                            <div class="w-10 bg-warning rounded-start">
                                                                <div class="fw-bold text-center mt-2">B</div>
                                                            </div>
                                                            <div class="w-90 ps-0">
                                                                <input type="text" name='jawaban_2'
                                                                    class="form-control rounded-0 rounded-end"
                                                                    placeholder="Pilihan Jawaban B"
                                                                    value="<?= $row['OptionB'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row ms-1 mt-3">
                                                            <div class="w-10 bg-warning rounded-start">
                                                                <div class="fw-bold text-center mt-2">C</div>
                                                            </div>
                                                            <div class="w-90 ps-0">
                                                                <input type="text" name='jawaban_3'
                                                                    class="form-control rounded-0 rounded-end"
                                                                    placeholder="Pilihan Jawaban C"
                                                                    value="<?= $row['OptionC'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row ms-1 mt-3">
                                                            <div class="w-10 bg-warning rounded-start">
                                                                <div class="fw-bold text-center mt-2">D</div>
                                                            </div>
                                                            <div class="w-90 ps-0">
                                                                <input type="text" name='jawaban_4'
                                                                    class="form-control rounded-0 rounded-end"
                                                                    placeholder="Pilihan Jawaban D"
                                                                    value="<?= $row['OptionD'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row ms-1 mt-3">
                                                            <div class="w-10 bg-warning rounded-start">
                                                                <div class="fw-bold text-center mt-2">E</div>
                                                            </div>
                                                            <div class="w-90 ps-0">
                                                                <input type="text" name='jawaban_5'
                                                                    class="form-control rounded-0 rounded-end"
                                                                    placeholder="Pilihan Jawaban E"
                                                                    value="<?= $row['OptionE'] ?>" required>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-2">
                                                                <label for="inputState" class="">Jawaban Benar</label>
                                                                <select id="inputState" name="TrueOption"
                                                                    class="form-control border-0 bg-primary fw-bold"
                                                                    required>

                                                                    <option selected value="">Pilih</option>
                                                                    <option value="A"
                                                                        <?php if($to=="A"){echo "selected";}?>>A
                                                                    </option>
                                                                    <option value="B"
                                                                        <?php if($to=="B"){echo "selected";}?>>B
                                                                    </option>
                                                                    <option value="C"
                                                                        <?php if($to=="C"){echo "selected";}?>>C
                                                                    </option>
                                                                    <option value="D"
                                                                        <?php if($to=="D"){echo "selected";}?>>D
                                                                    </option>
                                                                    <option value="E"
                                                                        <?php if($to=="E"){echo "selected";}?>>E
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="inputCity" class="">Gambar
                                                                    (Opsional)</label>
                                                                <input type="file" name="file" class="form-control"
                                                                    id="inputCity">
                                                            </div>
                                                            <div class="col-md-3">
                                                                <label for="inputCity" class=""></label>
                                                                <input type="submit" name="processed" value="Simpan"
                                                                    class="form-control btn btn-primary" id="inputCity">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <?php
                $i++;
            endforeach;
        } else {
            ?>
            <div class="card ">
                <div class="card-body ">
                    Anda Belum Membuat Soal
                </div>
            </div>
            <?php
        } ?>
        </div>
        <?php if(!empty($question)):?>
        <div class="col-md-3 mt-3 ">
            <div class="card card-body bg-darkgreen">
                <h1 class="text-white">56</h1>
                <p class="text-white small">Siswa telah mengerjakan quiz</p>
                <a href="" class="btn btn-warning mt-3"><i class="fas fa-file-alt me-2"></i> Lihat Hasil</a>
            </div>
        </div>
        <?php endif;?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addMateri" tabindex="-1" aria-labelledby="addMateriLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="text-white fw-bolder">Tambah Soal</span>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    <hr>
                    <form action="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="">Pertanyaan </label>
                            <textarea name="soal" class="form-control  text-white" rows="5" required></textarea>
                        </div>
                        <label class="mt-3">Pilihan Jawaban</label>
                        <div class="row ms-1 mt-1">
                            <div class="w-10 bg-warning rounded-start">
                                <div class="fw-bold text-center mt-2">A</div>
                            </div>
                            <div class="w-90 ps-0">
                                <input type="text" name='jawaban_1' class="form-control rounded-0 rounded-end"
                                    placeholder="Pilihan Jawaban A" required>
                            </div>
                        </div>
                        <div class="row ms-1 mt-3">
                            <div class="w-10 bg-warning rounded-start">
                                <div class="fw-bold text-center mt-2">B</div>
                            </div>
                            <div class="w-90 ps-0">
                                <input type="text" name='jawaban_2' class="form-control rounded-0 rounded-end"
                                    placeholder="Pilihan Jawaban B" required>
                            </div>
                        </div>
                        <div class="row ms-1 mt-3">
                            <div class="w-10 bg-warning rounded-start">
                                <div class="fw-bold text-center mt-2">C</div>
                            </div>
                            <div class="w-90 ps-0">
                                <input type="text" name='jawaban_3' class="form-control rounded-0 rounded-end"
                                    placeholder="Pilihan Jawaban C" required>
                            </div>
                        </div>
                        <div class="row ms-1 mt-3">
                            <div class="w-10 bg-warning rounded-start">
                                <div class="fw-bold text-center mt-2">D</div>
                            </div>
                            <div class="w-90 ps-0">
                                <input type="text" name='jawaban_4' class="form-control rounded-0 rounded-end"
                                    placeholder="Pilihan Jawaban D" required>
                            </div>
                        </div>
                        <div class="row ms-1 mt-3">
                            <div class="w-10 bg-warning rounded-start">
                                <div class="fw-bold text-center mt-2">E</div>
                            </div>
                            <div class="w-90 ps-0">
                                <input type="text" name='jawaban_5' class="form-control rounded-0 rounded-end"
                                    placeholder="Pilihan Jawaban E" required>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <label for="inputState" class="">Jawaban Benar</label>
                                <select id="inputState" name="TrueOption"
                                    class="form-control border-0 bg-primary fw-bold" required>
                                    <option selected value="">Pilih</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="inputCity" class="">Gambar (Opsional)</label>
                                <input type="file" name="file" class="form-control" id="inputCity">
                            </div>
                            <div class="col-md-3">
                                <label for="inputCity" class=""></label>
                                <input type="submit" name="processed" value="Simpan"
                                    class="form-control btn btn-primary" id="inputCity">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>