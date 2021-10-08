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
                    Judul Quiz
                </li>
            </ol>
        </nav>
    </div>
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
                            <button class="accordion-button collapsed text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapse<?= $row['QuestionID'] ?>"
                                aria-expanded="false" aria-controls="collapse<?= $row['QuestionID'] ?>">
                                Soal Nomor <?= $i ?>
                            </button>
                        </h2>
                        <div id="collapse<?= $row['QuestionID'] ?>"
                            class="accordion-collapse collapse bg-dark text-white" aria-labelledby="flush-headingOne"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">

                                <p>
                                    <?= $row['Question'] ?>
                                </p>
                                <hr>
                                <a href="<?= base_url('guru/edit_question/' . $courseID . '/' . $row['QuestionID']) ?>"
                                    class="text-warning">Edit</a>
                                <a href="<?= base_url('guru/hapus_soal/' . $courseID . '/'  . $id . '/' . $row['QuestionID']) ?>"
                                    class="text-danger">Hapus</a>

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
    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-warning mt-4"
        href="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>"><i class="fas fa-plus"></i> Tambah
        Soal</a>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-body">
                    <span class="text-white fw-bold">Tambah Soal</span>
                     <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    <hr>
                    <form action="<?= base_url('guru/create_question/' . $courseID . '/' . $id) ?>" method="POST"
                        enctype="multipart/form-data">
                        <div class="col-12">
                            <label class="">Pertanyaan </label>
                            <textarea name="soal" class="form-control  text-light" rows="5"></textarea>
                        </div>
                       
                        <div class="row mt-2">
                             <label class="">Pilihan Jawaban</label>
                             <div class="w-10 bg-warning">
                                A
                             </div>
                             <div class="w-90">
                             <input type="text" name='jawaban_1' class="form-control">
                             </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="col-sm-12">
                                <label class="col-form-label text-light ">Jawaban B </label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name='jawaban_2' class="form-control  text-light">
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="col-sm-12">
                                <label class="col-form-label text-light ">Jawaban C </label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name='jawaban_3' class="form-control  text-light">
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="col-sm-12">
                                <label class="col-form-label text-light ">Jawaban D </label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name='jawaban_4' class="form-control  text-light">
                            </div>
                        </div>
                        <div class="col-12 mt-2">
                            <div class="col-sm-12">
                                <label class="col-form-label text-light ">Jawaban E </label>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" name='jawaban_5' class="form-control  text-light">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label for="inputState" class="col-form-label">Jawaban Benar</label>
                                <select id="inputState" name="TrueOption" class="form-select">
                                    <option selected value="">Choose...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>

                                </select>
                            </div>
                            <div class="col-md-5">
                                <label for="inputCity" class="col-form-label">Gambar</label>
                                <input type="file" name="file" class="form-control" id="inputCity">
                            </div>

                            <div class="col-md-4">
                                <label for="inputCity" class="col-form-label mt-3"> </label>
                                <div class="input-group">
                                    <input type="submit" name="processed" value="Tambah Soal"
                                        class="form-control btn btn-outline-secondary bg-secondary" id="inputCity">
                                    <input type="submit" name="processed" value="Simpan"
                                        class="form-control btn btn-outline-secondary bg-primary" id="inputCity">
                                </div>

                            </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>