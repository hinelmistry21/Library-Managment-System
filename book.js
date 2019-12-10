<script type="text/javascript">
$(document).ready(function () {
    $('#bookname').click(function (e) { 
      $('#search_text').keyup(function(e){
      e.preventDefault();
      var txt=$(this).val();

  if(txt != '')
  {
      $('#result').html('');
      $.ajax({
      url:"bookfetch.php",
      method:"post",
      data:{search:txt},
      dataType:"text",
      success:function(data)
      {
          $('#result').html(data);
          $('select').dropdown();
          $('drop').dropdown();
      }
      });
  }
  else
  { }
  })
    })
});
</script>