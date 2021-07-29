<script type="text/javascript">
  $(document).ready(function(){
    $('#kategori_kelompok').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kelompok');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].nama+'</option>';
                }
                $('#id_kelompok').html(html);         
        }
      });
    });
    $('#provinsi').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kota');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kota').html(html);         
        }
      });
    });
    $('#kota').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kecamatan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kecamatan').html(html);         
        }
      });
    });
    $('#kecamatan').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url('action/get_kelurahan');?>",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
                $('#kelurahan').html(html);         
        }
      });
    });
  });
</script>