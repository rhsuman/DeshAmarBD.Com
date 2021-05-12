<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- jQuery -->
<script src="<?php echo base_url() ?>dist/plugins/jquery/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>dist/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>dist/admin/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?php echo base_url() ?>dist/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

<script src="<?php echo base_url() ?>dist/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url() ?>dist/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>dist/plugins/summernote/summernote-bs4.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>dist/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!--tag input -->
<script src="<?= base_url(); ?>dist/plugins/tagsinput/jquery.tagsinput.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "buttons": ["copy", "csv", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "order": [[0, "desc"]],
    });
    
    // Summernote
    $('#summernote').summernote()
    
    //tags
        $('#tags').tagsInput({width: 'auto'});
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function () {

        $('#category').change(function () {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo site_url('posts/get_sub_category'); ?>",
                method: "POST",
                data: {id: id},
                async: true,
                dataType: 'json',
                success: function (data) {

                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].id + '>' + data[i].name + '</option>';
                    }
                    $('#sub_category').html(html);
                }
            });
            return false;
        });
    }
    );</script>

</body>
</html>
