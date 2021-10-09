<div class="container">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/course/<?=$CourseID?>"
                        class="text-primary fw-bold"><?=$CourseName?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?= $lesson['LessonTitle'] ?>
                </li>
            </ol>
        </nav>
        <div class="col-md-9 mt-2">

            <div class="card">
                <div class="card-body">

                    <p class="text-white fw-bold fs-2 mb-4"><?= $lesson['LessonTitle'] ?>
                    </p>

                    <div class="text-white"><?= $lesson['LessonContent'] ?></div>

                </div>
            </div>
        </div>
        
        <div class="col-md-3 mt-2">
            <?php if (!empty($lesson['File'])) { ?>
            <div class="card mb-2 bg-darkpurple">
                <div class="card-body ">
                    <p class="text-white fw-bold fs-5">Berkas Lampiran</p>
                    <p class="text-white mt-3"><i class="fas fa-file me-2"></i> <?=$lesson['File']?> </p>
                    <a href="<?= base_url('assets/lesson/' . $lesson['File']) ?>" target="_blank"
                        class="btn btn-primary"><i class="fas fa-download me-2"></i> Download</a>
                </div>
            </div>
            <?php } ?>
            <div class="card card-body bg-darkgreen mb-2">
                <h1 class="text-white"><?=$countUserLesson?></h1>
                <p class="text-white small">Siswa telah membaca materi</p>
                <a href="" class="btn btn-warning mt-3"><i class="fas fa-eye me-2"></i> Lihat </a>
            </div>
                <a class="btn btn-warning  "
                    href="<?= base_url('guru/editLesson/' . $CourseID . '/' . $lesson['LessonID']) ?>">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a class="btn btn-danger "
                    href="<?= base_url('guru/deleteLesson/' . $CourseID . '/' . $lesson['LessonID']) ?>">
                    <i class="fas fa-trash"></i> Hapus
                </a>
        </div>
        

    </div>
</div>