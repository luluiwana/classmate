<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="car     d mt-3">
                <div class="card-body">
                    <h5 class="card-title text-white"><?= $lesson['LessonTitle'] ?></h5>
                    <p class="card-text">
                        <?= $lesson['LessonContent'] ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="text-white text-center">Download File Materi </h6>
                    <div class="d-grid gap-2  mx-auto">
                        <a download href="<?= base_url('assets/lesson/' . $lesson['File']) ?>" target="_blank" class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>