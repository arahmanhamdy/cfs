<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>static/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>static/js/bootstrap.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>static/js/metisMenu.min.js"></script>

<?php if (isset($table)) { ?>
    <!-- Data tables js -->
    <script src="<?php echo base_url(); ?>static/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>static/js/dataTables.bootstrap.min.js"></script>
<?php } ?>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>static/js/sb-admin-2.js"></script>

<?php if (isset($table)) { ?>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                responsive: true
            });
            $('#confirm-delete').on('show.bs.modal', function (e) {
                $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
            });
        });
    </script>
<?php } ?>

<?php if (isset($textarea)) { ?>
    <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
    <script>tinymce.init({
            selector: 'textarea',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern imagetools"
            ]
        });</script>
<?php } ?>


</body>

</html>