  <!--   Core JS Files   -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"></script>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"></script>
  <script src="<?= base_url() ?>assets/summernote/summernote.js"></script>
  <script src="<?=base_url()?>assets/js/user.js"></script>

  </body>

  <script>
$(document).ready(function() {
    $('#add_question').summernote({
        placeholder: 'Tulis sesuatu...',
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['clear', 'bold', 'italic', ]],
            ['insert', ['picture', 'link']],
        ]
    });
    $("#add_question").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });
    $('#add_answer').summernote({
        placeholder: 'Tulis komentarmu...',
        height: 100,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['clear', 'bold', 'italic', ]],
            ['insert', ['picture', 'link']],
        ]
    });
    $("#add_answer").on("summernote.enter", function(we, e) {
        $(this).summernote("pasteHTML", "<br><br>");
        e.preventDefault();
    });
    $(".note-editable").click(function() {
        $(".btn-diskusi").show();
    });
    $(".note-placeholder").click(function() {
        $(".btn-diskusi").show();
    });
});
  </script>


  </html>