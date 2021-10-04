<div class="container-fluid py-4">
    <div class="card-forum">
        <form action="<?= base_url('guru/addLessonCourse/' . $id . '/' . $CompetenciesID) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group ">
                <label class="col-md-2 col-xs-12 col-form-label">Judul Materi</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control bg-light text-dark" name="title" placeholder="Judul Artikel" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-12 col-xs-12 col-form-label">File </label>
                <div class="col-md-8">
                    <input type="file" name="file" class='form-control bg-light text-dark'>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-12 col-xs-12 col-form-label">Content Materi </label>
                <textarea name="content" id="add_question" class="text-light form-control" cols="30" rows="30" required></textarea>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-primary float-right ml-auto pl-5 pr-5" value="Simpan">
            </div>
        </form>
    </div>
</div>