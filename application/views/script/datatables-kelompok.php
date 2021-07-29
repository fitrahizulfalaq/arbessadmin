
<script type="text/javascript">
  var table;
  $(document).ready(function() {
      //datatables
      table = $('#table').DataTable({ 
          "processing": true, 
          "serverSide": true, 
          "order": [], 
           
          "ajax": {
              "url": "<?php echo site_url('kelompok/get_data_kelompok')?>",
              "type": "POST"
          },
          "columnDefs": [
          { 
              "targets": [ 0 ], 
              "orderable": false, 
          },
          ],
      });
  });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,            
    });

  var table = $('#example3').DataTable({
    "lengthMenu": [ [5, 10, 15, 20, 50, 100, -1], [5, 10, 15, 20, 50, 100, "All"] ],
    "autoWidth": true,
    select: true
  });

  new $.fn.dataTable.Buttons(table, {
      
      buttons: [        
        {
            extend: 'colvis',
            text: '<i class="fas fa-eye"></i>',                
        },
        {
            extend: 'print',
            text: '<i class="fas fa-print"></i>',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csv',
            text: '<i class="fas fa-file-excel"></i>',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i>',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i>',
            exportOptions: {
                columns: ':visible'
            }
        },        
      ],            
  });
   
  table.buttons( 0, null ).containers().appendTo( '.tableTools-container' );
  });
</script>