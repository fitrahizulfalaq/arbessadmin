<script type="text/javascript">
  $(document).ready(function(){
    $('#kategori_kelompok').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kelompok');?>",
        method : "POST",
        data : {id: id - 1},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id_kelompok+'">'+data[i].nama+'</option>';
                }
                $('#id_kelompok').html(html);         
        }
      });
    });
  });
</script>