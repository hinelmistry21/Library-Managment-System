<script type="text/javascript">
$(document).ready(function () {
    $('#student').click(function (e) { 
      $('#search_text').keyup(function(e){
      e.preventDefault();
      var txt=$(this).val();
  //alert(txt);
  if(txt != '')
  {
      $('#result').html('');
      $.ajax({
      url:"studentfetch.php",
      method:"post",
      data:{search:txt},
      dataType:"text",
      success:function(data)
      {
          $('#result').html(data);
          $('#drop').dropdown();
          $('#select').dropdown();
      }
      });
  }
  else
  {
    
  }
  })
    })
});
</script>