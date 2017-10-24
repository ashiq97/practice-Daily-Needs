
</div><br><br>
<div class="col-md-12 text-center" > &copy; copy right 2015-2017 Daily Needs Shop</div>
<script>
jQuery(window).scroll(function()
{
  var vscroll = jQuery(this).scrollTop();
  jQuery('#logotext').css({
      "transform" : "translate(0px,"+vscroll/2+"px)"
  });
});

function detailsmodal(id){
  var data  = {"id" : id};
  jQuery.ajax({
    url : '/teacher/includes/detailsmodal.php',
    method : "post",
    data : data,
    success: function(data){
      jQuery('body').append(data);
      jQuery('#details-modal').modal('toggle');

    },
    error: function(){
      alert("SOmthing different wrong!");
    }
  });
}

</script>
</body>
</html>
