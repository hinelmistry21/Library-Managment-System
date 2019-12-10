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
      url:"fetch.php",
      method:"post",
      data:{search:txt},
      dataType:"text",
      success:function(data)
      {
          $('#result').html(data);
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
            }
        });
    })
});

$(document).ready(function () {
    $('#bookname').click(function (e) { 
      $('#search_text').keyup(function(e){
      e.preventDefault();
      var txt=$(this).val();
  //alert(txt);
  if(txt != '')
  {
      $('#result').html('');
      $.ajax({
      url:"fetch.php",
      method:"post",
      data:{search:txt},
      dataType:"text",
      success:function(data)
      {
          $('#result').html(data);
      }
      });
  }
  else
  { }
  })
    })
});
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
      url:"book.php",
      method:"post",
      data:{search:txt},
      dataType:"text",
      success:function(data)
      {
          $('#result').html(data);
      }
      });
  }
  else
  {
    $('#student').click(function (e) { 
        e.preventDefault();
        $.ajax({
            method: "post",
            url: "book.php",
            data: ('#result'),
            dataType: "html",
            success: function (response) {
                $('#result').html(response);
            }
        });
    }) 
  }
  })
    })
});

</script>