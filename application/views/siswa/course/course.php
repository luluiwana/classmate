<div class="container-fluid py-4">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>siswa/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$course->CourseName?></li>
            </ol>
        </nav>
    </div>
    <div class="row mx-0">
        <div class="card bg-dark">
            <div class="card-body p-0">
                <div class=" p-3">
                    <div class="text-white font-weight-bolder fs-5"><?=$course->CourseName?> (<?=$course->ClassName?> - <?=$course->SchoolName?>)</div>
                    <div class="text-white">Guru:</div>
                </div>
                <div class="btn-group btn-group-md w-100 p-0 " role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-disabled text-primary mb-0">Misi</button>
                    <button type="button" class="btn btn-dark mb-0">Informasi</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
         <p class="small text-white"> <i class="fas fa-lightbulb text-warning"></i> Kamu memiliki 3 misi</p>
        <div class="col-md-8">
           
            <div class="card bg-primary">

                <div class="card-body p-0">
                    <div class="accordion text-dark " id="accordionFlushExample">
                        <div class="accordion-item text-dark">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed text-white" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-collapseOne" aria-expanded="false"
                                    aria-controls="flush-collapseOne">
                                    Struktur Hierarki Basis Data
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse bg-dark text-white"
                                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to
                                    demonstrate the <code>.accordion-flush</code> class. This is the first item's
                                    accordion body.</div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-white">Progress</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-white">Aktivitas</h5>
                </div>
            </div>
        </div><div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-white">Leaderboard</h5>
                </div>
            </div>
        </div>
    </div>
</div>
</main>