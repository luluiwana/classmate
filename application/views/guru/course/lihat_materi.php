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
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-white fw-bold fs-4 mb-4"><?= $lesson['LessonTitle'] ?>
                    </p>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic outlined example">
                        <a class="btn btn-warning btn-sm px-2"
                            href="<?= base_url('guru/editLesson/' . $CourseID . '/' . $lesson['LessonID']) ?>">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <a class="btn btn-danger btn-sm px-2"
                            href="<?= base_url('guru/deleteLesson/' . $CourseID . '/' . $lesson['LessonID']) ?>">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </div>
                    <div class="text-white"><?= $lesson['LessonContent'] ?></div>
                </div>
            </div>
        </div>
        <?php if (!empty($lesson['File'])) { ?>
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <p class="text-white fw-bold fs-5">Berkas Lampiran</p>
                    <p class="text-white mt-3"><i class="fas fa-file me-2"></i> <?=$lesson['File']?> </p>
                    <a href="<?= base_url('assets/lesson/' . $lesson['File']) ?>" target="_blank"
                        class="btn btn-primary"><i class="fas fa-download me-2"></i> Download</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>