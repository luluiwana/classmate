
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Classmate</h3>
                  <!-- <p class="mb-0">Masukkan username dan password untuk masuk</p> -->
                </div>
                <div class="card-body">
                  <form role="form">
                      <label>Nama Lengkap</label>
                    <div class="mb-3">
                      <input type="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon">
                    </div>
                    <label>Buat Username</label>
                    <div class="mb-3">
                      <input type="username" class="form-control" placeholder="username" aria-label="username" aria-describedby="username-addon">
                    </div>
                    <label>Daftar Sebagai</label>
                    <div class="mb-3">
                     <select name="" id="" class="form-control">
                         <option value="">Guru</option>
                         <option value="">Siswa</option>
                     </select>
                    </div>
                    <label>Buat Password</label>
                    <div class="mb-3">
                      <input type="username" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                      <label>Konfirmasi Password</label>
                    <div class="mb-3">
                      <input type="username" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                   
                    <div class="text-center">
                      <button type="button" class="btn bg-gradient-info w-100 mt-4 mb-0">Daftar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Sudah memiliki akun?
                    <a href="<?=base_url()?>home/daftar" class="text-info text-gradient font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('<?=base_url()?>assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
 
  