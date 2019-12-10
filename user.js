<script type="text/javascript">

$(document).ready(function(){
  $('#search_text').keyup(function(e){
      e.preventDefault();
  var txt=$(this).val();
  //alert(txt);
  if(txt != '')
  {
      $('#result').html('');
      $.ajax({
      url:"userfetch.php",
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
  { }
  })
});

$(document).ready(function () {
    $('#displaybtn').click(function (e) { 
        e.preventDefault();
        $.ajax({
            method: "post",
            url: "issue.php",
            data: ('#result'),
            dataType: "html",
            success: function (response) {
                $('#result').html(response);
                $('#drop').dropdown();
                $('#select').dropdown();
            }
        });
    })
});


</script>