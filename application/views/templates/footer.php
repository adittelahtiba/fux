<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
<!--slimscroll JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?= base_url('assets/BackEnd/') ?>js/waves.js"></script>
<!--Counter js -->
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/counterup/jquery.counterup.min.js"></script>
<!--Morris JavaScript -->
<!-- <script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/morrisjs/morris.js"></script> -->

<!-- Calendar JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/moment/moment.js"></script>
<script src='<?= base_url('assets/BackEnd/') ?>plugins/bower_components/calendar/dist/fullcalendar.min.js'></script>
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/calendar/dist/cal-init.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>js/custom.min.js"></script>
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/dropzone-master/dist/dropzone.js"></script>
<script src="<?= base_url('assets/BackEnd/') ?>js/jasny-bootstrap.js"></script>
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/dropify/dist/js/dropify.min.js">

</script>

<script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();
        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });
        // Used events
        var drEvent = $('#input-file-events').dropify();
        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });
        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });
        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });
        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>
<script>
    $(function() {

        var i = 1;
        $('#dynamic_field').on('click', '#add', function() {
            i++;
            $('#dynamic_field').append('<div class="col-md-10" id="row' + i + '"><input type="text" class="form-control" id="NamaBk" name="NamaBk[]"></div><div class="col-md-2" id="rowx' + i + '"><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Hapus</button></div>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
            $('#rowx' + button_id + '').remove();
        });
    });
</script>
<!-- <script src="js/dashboard1.js"></script> -->
<!-- Custom tab JavaScript -->
<script src="<?= base_url('assets/BackEnd/') ?>js/cbpFWTabs.js"></script>


<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>

<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/sweetalert/sweetalert.min.js"></script>
<script src="<?= base_url('assets/BackEnd/') ?>js/mask.js"></script>

<!--Style Switcher -->
<script src="<?= base_url('assets/BackEnd/') ?>plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>