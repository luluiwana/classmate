<div class="container">

    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?= base_url() ?>guru/kelas" class="text-primary fw-bold">Kelas</a></li>
                <?php if ($course_menu == "Kelas") : ?>
                    <li class="breadcrumb-item active" aria-current="page"><?= $course->CourseName ?> -
                        <?= $course->ClassName ?></li>
                <?php else : ?>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="<?= base_url() ?>guru/course/<?= $course->CourseID ?>" class="text-primary fw-bold">
                            <?= $course->CourseName ?> - <?= $course->ClassName ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?= $course_menu ?>
                    </li>
                <?php endif; ?>
            </ol>
        </nav>
    </div>

    <p class="small text-white"> DAFTAR PERTANYAAN</p>

    <div class="col-md-9 mt-3">

        <?php
        if (!empty($question)) {
            $i = 1;
            foreach ($question as $row) : ?>
                <div class="card bg-primary mb-4">
                    <div class="card-body p-0">
                        <div class="accordion text-dark " id="accordionFlushExample">
                            <div class="accordion-item text-dark">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['QuestionID'] ?>" aria-expanded="false" aria-controls="collapse<?= $row['QuestionID'] ?>">
                                        Soal Nomor <?= $i ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $row['QuestionID'] ?>" class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">

                                        <p>
                                            <?= $row['Question'] ?>
                                        </p>
                                        <hr>
                                        <a href="<?= base_url('guru/edit_question/' . $courseID . '/' . $row['QuestionID']) ?>" class="text-warning">Edit</a>
                                        <a href="<?= base_url('guru/hapus_soal/' . $courseID . '/'  . $id . '/' . $row['QuestionID']) ?>" class="text-danger">Hapus</a>

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
            <div class="card bg-primary mb-4">
                <div class="card-body p-0">
                    <div class="accordion text-dark " id="accordionFlushExample">
                        <div class="accordion-item text-dark">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Anda Belum Membuat Soal
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php
        } ?>




    </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="text-white text-center">Tambah Pertanyaan </h6>
                <div class="d-grid gap-2  mx-auto">
                    <a class="btn btn-primary" href="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>">ADD</a>
                </div>
            </div>
        </div>
    </div>

</div>