<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="js/jquery.wallform.js"></script>
<script src="../datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables -->
<script>
  $(function () {

    $('#table1').DataTable({
	"lengthMenu" : [[20,50,100, -1], [20,50,100,'All']],
	'ordering'    : false,
	'scrollX': true,
	"language": {
		"sProcessing": "??????????????????????????????????????????...",
		"sLengthMenu": "???????????? _MENU_ ?????????",
		"sZeroRecords": "?????????????????????????????????",
		"sInfo": "???????????? _START_ ????????? _END_ ????????? _TOTAL_ ?????????",
		"sInfoEmpty": "???????????? 0 ????????? 0 ????????? 0 ?????????",
		"sInfoFiltered": "(?????????????????????????????? _MAX_ ??????????????????)",
		"sInfoPostFix": "",
		"sSearch": "??????????????? ",
		"sUrl": "",
		"oPaginate": {
				"sFirst": "???????????????????????????",
				"sPrevious": "????????????????????????",
				"sNext": "???????????????",
				"sLast": "?????????????????????"
		}
	}
			 		
	})
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      'autoWidth'   : false,
	  'scrollX': true
    })
  })
</script>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>
    $(function(){
        $("#demo").click(function(){ 
                $("div#show").show();
        }); 
        $("#demo2").click(function(){ 
                $("div#show_demo").hide();
        });         
    });
</script>
<script src="assets/export_excel/xlsx.full.min.js"></script>
<script src="assets/export_excel/FileSaver.js"></script>
<script>
function ExcelReport()
{
    var sheet_name="excel_sheet";
    var elt = document.getElementById('table1');

    var wb = XLSX.utils.table_to_book(elt, {sheet: sheet_name});
    XLSX.writeFile(wb,'report.xlsx');
}
</script>









