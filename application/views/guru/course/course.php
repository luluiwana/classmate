<div class="row mt-4">

    <p class="small text-white"> DAFTAR KOMPETENSI DASAR</p>

    <div class="col-md-9">

        <?php
        if (!empty($competencies)) {
            foreach ($competencies as $row) : ?>
                <div class="card bg-primary mb-4">
                    <div class="card-body p-0">
                        <div class="accordion text-dark " id="accordionFlushExample">
                            <div class="accordion-item text-dark">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['CompetenciesID'] ?>" aria-expanded="false" aria-controls="collapse<?= $row['CompetenciesID'] ?>">
                                        <?= $row['CompetenciesName'] ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $row['CompetenciesID'] ?>" class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <?php if (!empty($lesson[$row['CompetenciesID']])) {
                                            foreach ($lesson[$row['CompetenciesID']] as $row2) :
                                        ?>

                                                <a href="<?= base_url('guru/detail_lesson/'  . $row2['LessonID']) ?>" class="text-white">
                                                    <p><?= $row2['LessonTitle'] ?></p>
                                                </a>
                                        <?php
                                            endforeach;
                                        } ?>


                                        <a href="<?= base_url('guru/Lesson/' . $row['CompetenciesID']) ?>" class="text-danger small ">Tambah Materi</a>
                                        <hr>

                                        <?php if (!empty($quiz[$row['CompetenciesID']])) {
                                            foreach ($quiz[$row['CompetenciesID']] as $row3) :
                                        ?>

                                                <a href="<?= base_url('guru/list_question/' . $id . '/' . $row3['QuizID']) ?>" class="text-white">
                                                    <p><?= $row3['QuizTitle'] ?></p>
                                                </a>
                                        <?php
                                            endforeach;
                                        } ?>

                                        <a href="<?= base_url('guru/create_quiz/' . $id . '/' . $row['CompetenciesID']) ?>" class="text-danger small ">Tambah Quiz</a>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach;
        } else {
            ?>
            <div class="card bg-primary mb-4">
                <div class="card-body p-0">
                    <div class="accordion text-dark " id="accordionFlushExample">
                        <div class="accordion-item text-dark">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Tidak ada Kompetensi Dasar Tersedia
                                </button>
                            </h2>
                            <!-- <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">
                                  
                                </div>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        <?php
        } ?>

    </div>

    <div class="col-md-3">
        <div class="card mb-4">
            <div class="card-body">
                <h6 class="text-white text-center">Jumlah KD</h6>
                <h2 class="text-center text-white">5</h2>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h6 class="text-white text-center">Tambah KD </h6>
                <div class="d-grid gap-2  mx-auto">
                    <button data-bs-toggle="modal" data-bs-target="#addKD" class="btn btn-primary" type="button">ADD</button>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="addKD" tabindex="-1" aria-labelledby="addKD" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah KD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('guru/addKD/' . $course->CourseID) ?>" method="post">
                    <div class="form-group">
                        <h6>Masukkan Nama Kompetensi Dasar</h6>
                        <input type="text" name="nama-kd" placeholder="Contoh ( KD 3.4 Enkapsulasi )" class="form-control text-dark">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Tambah KD">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>