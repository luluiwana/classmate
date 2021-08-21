<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$course->CourseName?> - <?=$course->ClassName?></li>
            </ol>
        </nav>
    </div>
    <div class="row mx-0">
        <div class="card bg-dark">
            <div class="card-body p-0">
                <div class=" p-3">
                    <div class="text-white font-weight-bolder fs-5"><?=$course->CourseName?> (<?=$course->ClassName?> - <?=$course->SchoolName?>)</div>
                  
                </div>
                <div class="btn-group btn-group-md w-100 p-0 " role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-disabled text-primary mb-0">Materi</button>
                    <button type="button" class="btn btn-dark mb-0">Informasi</button>
                    <button type="button" class="btn btn-dark mb-0">Pengaturan</button>
                </div>
            </div>
        </div>
    </div>
  
</div>
</main>