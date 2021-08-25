  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/js/core/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/editor.js"></script>
  <script src="<?= base_url() ?>assets/js/core/bootstrap.min.js"></script>
  <!-- <script src="<?= base_url() ?>assets/js/plugins/perfect-scrollbar.min.js"></script> -->
  <script src="<?= base_url() ?>assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="<?= base_url() ?>assets/js/plugins/chartjs.min.js"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?= base_url() ?>assets/js/soft-ui-dashboard.js?v=1.0.3"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <script src="<?= base_url() ?>assets/summernote/summernote.js"></script>
  <script src="<?=base_url()?>assets/js/user.js"></script>

  </body>

  <script>
    $(document).ready(function() {
      $('#add_question').summernote({
        placeholder: 'Masukkan Informasi yang anda ingin sampaikan',
        tabsize: 2,
        height: 300
      });
    });
  </script>


  </html>