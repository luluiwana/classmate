<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <p class="text-white fw-bold fs-4 mb-4"><?= $lesson['LessonTitle'] ?></p>
                    <p class="text-white"><?= $lesson['LessonContent'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="text-white text-center">Download File Materi </h6>
                    <div class="d-grid gap-2  mx-auto">
                        <?php if (empty($lesson['File'])) { ?>
                            <a disabled class="btn btn-secondary">File Tidak Tersedia</a>
                        <?php } else {  ?>
                            <a download href="<?= base_url('assets/lesson/' . $lesson['File']) ?>" target="_blank" class="btn btn-primary">Download</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>