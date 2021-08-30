<div class="row mx-4 mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item " aria-current="page"><a href="<?=base_url()?>lesson/course/<?=$lesson->ID_Course?>"
                    class="text-primary fw-bold">Basis Data</a>
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
    <a href="" class="btn btn-warning mt-4">Saya sudah mempelajari <?=$title?></a>

</div>
</div>
</main>