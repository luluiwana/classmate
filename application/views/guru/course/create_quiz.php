<div class="container-fluid ">

    <div class="row">
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
                    Buat Quiz
                </li>
            </ol>
        </nav>
    </div>

    <div class="card card-body">
        <form id="add-quiz" method="post" action="<?= base_url('guru/create_quiz/' . $courseID . '/' . $id) ?>"
            enctype="multipart/form-data">
            <label for="judul">Judul Quiz</label>
            <input type="text" name='judul' class="form-control ">
            <input type="submit" class="btn btn-primary float-right ml-auto mt-3" value="Buat Quiz">
        </form>


    </div>

</div>