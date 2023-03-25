
<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<script src="plugins/vendor/fontawesome-free/js/all.min.js"></script>
<script src="plugins/vendor/jquery/jquery.min.js"></script>
<script src="plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script src="plugins/js/ruang-admin.min.js"></script>

<!-- Select2 -->
<script src="plugins/vendor/select2/dist/js/select2.min.js"></script>
<script src="plugins/jquery.validate.js"></script>
<script src="plugins/additional-methods.min.js"></script>

<!-- function -->
<script type="text/javascript" src="<?= base_url() ?>/plugins/js/function.js"></script>

<!-- Select2 -->
<script src="<?= base_url() ?>/plugins/select2/js/select2.min.js"></script>

<script>
  $(function() {
    var href = window.location.href;
    $('li a').each(function(e,i) {
      if (href.indexOf($(this).attr('href')) >= 0) {
        $(this).addClass('success text-white font-weight-bold');
      }
    });
  });
</script>



<script>
  $(document).ready(function () {
    $('#dataTable, #dataTable1, #dataTable3').DataTable(); 

  });
</script>

<script>
  $('a[data-toggle="pill"]').on('show.bs.tab', function(e) {
    localStorage.setItem('currentTab', $(e.target).attr('href'));
  });
  var currentTab = localStorage.getItem('currentTab');
  if (currentTab) {
    $('a[href="' + currentTab + '"]').tab('show');
  }
  $('[data-toggle="tooltip"]').tooltip();
</script>
</body>