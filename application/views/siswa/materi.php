<div class="row mx-4 mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item " aria-current="page"><a
                    href="<?=base_url()?>lesson/course/<?=$lesson->ID_Course?>" class="text-primary fw-bold">Basis
                    Data</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page"><?=$title?>
            </li>
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <p class="text-white fw-bold fs-4"><?=$title?></p>
            <p class="text-white"><?=$lesson->LessonContent?></p>
        </div>
    </div>
    <?php if($lesson->File!=""):?>
    <div class="card mt-4">
        <div class="card-body">
            <p class="text-white fw-bold fs-5">Berkas Lampiran</p>
            <p class="text-white"><i class="fas fa-file me-2"></i> <?=$lesson->File?> </p>
            <a href="" class="btn btn-primary"><i class="fas fa-download me-2"></i> Download</a>
        </div>
    </div>
    <?php endif;?>
    <?php if($check==0):?>
    <form action="<?=base_url()?>Lesson/complete/" method="post">
        <input type="hidden" name="lesson" value="<?=$lesson->LessonID?>">
        <input type="hidden" name="course" value="<?=$lesson->ID_Course?>">
        <input type="submit" class="form-control  bg-warning btn btn-warning mt-4" value="Saya sudah mempelajari <?=$title?>">
    </form>
    <?php else:?>
    <a href="<?=base_url()?>lesson/course/<?=$lesson->ID_Course?>" class="btn btn-primary mt-4">Kembali</a>
    <?php endif;?>
</div>
</div>
</main>