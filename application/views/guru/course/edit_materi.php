<div class="container-fluid py-4">
     <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                        class="text-primary fw-bold">Kelas</a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/course/<?=$id?>"
                        class="text-primary fw-bold"><?=$CourseName?></a></li>
                <li class="breadcrumb-item active" aria-current="page">
                 Edit Materi: <?= $lesson['LessonTitle'] ?>
                </li>
            </ol>
        </nav>
    <div class="card card-body">
        
        <form action="<?= base_url('guru/editLessonCourse/' . $id . '/' . $lesson['LessonID']) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group ">
                <label class="">Judul Materi</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control text-white" name="title" value='<?= $lesson['LessonTitle'] ?>' placeholder="Judul Artikel" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="">File </label>
                <div class="col-md-8">
                    <input type="file" name="file" class='form-control  text-white'>
                </div>
            </div>

            <div class="form-group row">
                <label class="">Isi Materi </label>
                <textarea name="content" id="add_materi" class="text-lights form-control" cols="30" rows="30" required>
                <?= $lesson['LessonContent'] ?>
                </textarea>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-primary float-right ml-auto pl-5 pr-5" value="Simpan">
            </div>
        </form>
    </div>
</div>