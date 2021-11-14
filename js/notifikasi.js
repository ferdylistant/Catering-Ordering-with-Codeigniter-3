$(document).ready(function(){
  function load_unseen_notification(view ='')
  {
    $.ajax({
      url: baseurl+"notifikasi",
      method:"POST",
      data:{ view:view },
      dataType:"json",
      cache: false,
      success:function(data)
      {
        if(data.unseen_notification> 0)
        {
          $('.labelBadge').html(data.unseen_notification);
          $(document).ready(function(){
            $(".klik_notif").click(function(){
              $.LoadingOverlay("show");
              $('#tampilkan').html(data.notification);
              $.LoadingOverlay("hide");
            });
          });
        }
        console.log(data.unseen_notification);
      }
    });
  }
  load_unseen_notification();
  $(document).on('click', '#nt', function(){
    $('.labelBadge').html('');
    load_unseen_notification('yes');
  });
  setInterval(function(){
    load_unseen_notification();
  }, 5000);
});