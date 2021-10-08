<div class="container-fluid py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/kelas"
                    class="text-primary fw-bold">Kelas</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="<?=base_url()?>guru/course/<?=$id?>"
                    class="text-primary fw-bold"><?=$CourseName?></a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Buat Materi
            </li>
        </ol>
    </nav>
    <div class="card">
       <div class="card-body">
            <form action="<?= base_url('guru/addLessonCourse/' . $id . '/' . $CompetenciesID) ?>" method="post"
            enctype="multipart/form-data">

            <div class="form-group ">
                <label class=" text-white">Judul Materi</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control " name="title" placeholder="Judul Materi"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label class=" text-white">Tambah Lampiran (opsional)</label>
                <div class="col-md-4">
                    <input type="file" name="file" class='form-control '>
                </div>
            </div>

            <div class="form-group row">
              <label class=" text-white">Isi Materi</label>
                <textarea name="content" id="add_materi" class="text-white form-control" cols="30" rows="30"
                    required></textarea>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-primary float-right ml-auto pl-5 pr-5" value="Simpan">
            </div>
        </form>
       </div>
    </div>
</div>