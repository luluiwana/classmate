<div class="container-fluid py-4">
    <div class="card-forum">
        <form action="<?= base_url('siswa/addDataDiskusi') ?>" method="post" enctype="multipart/form-data">

            <div class="form-group ">
                <label class="col-md-2 col-xs-12 col-form-label">Judul</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control bg-light" name="judul" placeholder="Judul Artikel" value="" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-2 col-xs-12 col-form-label">Kategori</label>
                <div class="col-sm-12">
                    <select name="kategori" class="form-control bg-light" required>
                        <option value="">--Kategori--</option>
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Pertanyaan">Pertanyaan</option>

                    </select>
                </div>
            </div>

            <div class="form-group row">
                <textarea name="content" id="add_question" class=" form-control" cols="30" rows="30" required></textarea>
            </div>

            <div class="form-group row">
                <input type="submit" class="btn btn-primary float-right ml-auto pl-5 pr-5" value="Simpan">
            </div>
        </form>
    </div>
</div>