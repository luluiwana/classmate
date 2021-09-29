<div class="container-fluid ">

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

    <div class="card">
        <div class="container">
            <h3 class="mx-auto text-center mb-3">Buat Quiz</h3>
            <form id="add-quiz" method="post" action="<?= base_url('guru/create_quiz/' . $courseID . '/' . $id) ?>" enctype="multipart/form-data">
                <div class="mb-2 row mx-auto">
                    <div class="col-sm-1">
                        <label class="col-form-label ">Judul </label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name='judul' class="form-control bg-light text-dark">
                    </div>
                    <div class="form-group col-sm-3">
                        <input type="submit" class="btn btn-primary float-right ml-auto" value="Buat">
                    </div>
                </div>
            </form>
        </div>


    </div>

</div>