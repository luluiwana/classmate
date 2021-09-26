<div class="container-fluid">
    <div class="row">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?=base_url()?>discussion" class="text-primary fw-bold">Diskusi</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="<?=base_url()?>discussion/all/<?=$CourseID?>" class="text-primary fw-bold">Diskusi
                        <?=$CourseName?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <?=$thread->UserName?>
                </li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card-forum">
                <div class="row mb-3">
                    <div class="w-90 row">
                        <div class="pe-0 w-auto">
                            <img src="<?= base_url() ?>media/avatar/<?=$thread->UserAvatar?>" alt="image"
                                class="my-auto" style="width:45px">
                        </div>
                        <div class="w-80 name-space ">
                            <div class="fw-bolder"><?=$thread->UserName?></div>
                            <div class="text-secondary small">
                                <span class="me-3"><?=$thread->CreatedDateTime?></span>
                                <span class="badge bg-warning"><?=$thread->category?></span>
                            </div>

                        </div>
                    </div>
                    <div class="w-10 text-end">
                        <?php if($thread->UserID==$this->session->userdata('id_user')):?>
                        <div class="dropdown">
                            <a class="dropdown-toggle text-white fw-bold small" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Opsi
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?=base_url()?>discussion/editdiskusi/<?=$thread->ForumQID?>/<?=$CourseID?>">Edit</a></li>
                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#deleteThread">Hapus</a></li>
                            </ul>
                            <!-- Modal Keluar-->
                            <div class="modal fade" id="deleteThread" tabindex="-1" aria-labelledby="quitLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content modal-warning">
                                        <div class="modal-body text-center">
                                            <p class="text-white fw-bold mb-4">Kamu yakin ingin menghapus?
                                            </p>
                                            <a href="<?=base_url()?>discussion/delete/<?=$thread->ForumQID?>/<?=$thread->CourseID?>"
                                                class="btn btn-warning btn-sm me-5">Hapus</a>
                                            <button type="button" class="btn btn-dark btn-sm "
                                                data-bs-dismiss="modal">Batal</button>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>

                    </div>
                </div>
                <p><?= $thread->ForumQContent ?></p>
                <div class="mt-5">
                    <form action="<?= base_url('discussion/addComments/' . $thread->ForumQID) ?>" method="post">
                        <div class="form-group row">
                            <textarea name="content" id="add_answer" class=" form-control" required></textarea>
                        </div>
                        <input type="hidden" name="CourseID" value="<?=$CourseID?>">
                        <button type="submit" class="btn btn-block bg-warning btn-diskusi"
                            style="display:none">Tambahkan
                            Komentar</button>
                    </form>
                </div>
            </div>
            <?php if(!empty($comments)):?>
            <div class="col-md-12">
                <p class="fw-bold text-white small mt-3"> <i class="fas fa-dot-circle text-warning me-1"></i> 4 Komentar
                </p>
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($comments as $row) : ?>
                        <div class="row ">
                            <div class="pe-0 w-auto">
                                <img src="<?= base_url() ?>media/avatar/<?=$row->UserAvatar?>" alt="image"
                                    class="my-auto" style="width:45px">
                            </div>
                            <div class="w-80">
                                <p class="card-title text-white fw-bold mb-0"><?= $row->UserName ?> . <span
                                        class="me-3 fw-light text-secondary"><?=$thread->CreatedDateTime?></span></p>
                                <div class="card-text text-white small fs-15 mb-4"><?= $row->ForumAContent ?>
                                    <?php if($row->UserID==$this->session->userdata('id_user')):?>
                                    <div>
                                        <a href="<?=base_url()?>discussion/editkomentar/<?=$row->ForumAID?>/<?=$thread->ForumQID?>/<?=$thread->CourseID?>" class="text-primary">Edit</a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteComment<?=$row->ForumAID?>"
                                            class="text-primary ms-3">Hapus</a>
                                    </div>
                                    <!-- Modal Keluar-->
                                    <div class="modal fade" id="deleteComment<?=$row->ForumAID?>" tabindex="-1"
                                        aria-labelledby="quitLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content modal-warning">
                                                <div class="modal-body text-center">
                                                    <p class="text-white fw-bold mb-4">Kamu yakin ingin menghapus
                                                        komentar ini?
                                                    </p>
                                                    <a href="<?=base_url()?>discussion/deletecomment/<?=$thread->CourseID?>/<?=$row->ForumQID?>/<?=$row->ForumAID?>"
                                                        class="btn btn-warning btn-sm me-5">Hapus</a>
                                                    <button type="button" class="btn btn-dark btn-sm "
                                                        data-bs-dismiss="modal">Batal</button>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                </div>

                            </div>
                            <hr>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>
</div>