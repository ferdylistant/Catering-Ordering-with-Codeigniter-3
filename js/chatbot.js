function openForm() {
  $("#myForm").show("blind").css("display","block");
}
function closeForm() {
  $("#myForm").css("display","none");
}
var dt = new Date();
var hours = dt.getHours();
var minutes = dt.getMinutes();
var ampm = hours >= 12 ? 'pm' : 'am';
hours = hours % 12;
  hours = hours ? hours : 12; // the hour '0' should be '12'
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var time = hours + ':' + minutes + ' ' + ampm;
  $(document).ready(function() {
    $.each($('.tbl'), function(index, value) {
      $(this).on("click", function(e){
        $("#chatmsg").prepend(`
          <div class="box-chat d-flex justify-content mb-4">
          <div class="msg_cotainer_send">`+$(value).text()+`
          <span class="msg_time_send">`+time+`</span>
          </div>
          <div class="kanan">
          <img src="`+baseurl+`images/userWA.png" class="rounded-circle user_img_msg">
          </div>`);
        sendReceive($(value).text());
            // $("#msg").val("");
          });
    });
  });
  function sendReceive(msg)
  {
        //alert( "Data Loaded: " + data );
        var len = $("#chatmsg").html().length;
        if(len>400)
        {
          $( "#chatmsg" ).css( "height", "300px" );

          $.post( baseurl + "chatbotfront/get_chat_data", { msg: msg })
          .done(function( data ) {
            $("#chatmsg").prepend(`
              <div class="box-chat d-flex justify-content mb-4">
              <div class="kiri">
              <img src="`+baseurl+`images/icons/chatbot.png" class="rounded-circle user_img_msg">
              </div>
              <div class="msg_cotainer"><span>`+data+`</span>
              <span class="msg_time">`+time+`</span>
              </div>
              </div>`);
          }).fail(function( data ) {
            alert( "Data Loaded Fail");
          });
          $( "#chatmsg" ).css( "overflow", "auto" );
        }
        else{
          $.post( baseurl + "chatbotfront/get_chat_data", { msg: msg })
          .done(function( data ) {
            $("#chatmsg").prepend(`
              <div class="box-chat d-flex justify-content mb-4">
              <div class="kiri">
              <img src="`+baseurl+`images/icons/chatbot.png" class="rounded-circle user_img_msg">
              </div>
              <div class="msg_cotainer"><span>`+data+`</span>
              <span class="msg_time">`+time+`</span>
              </div>
              </div>`);
          }).fail(function( data ) {
            alert( "Data Loaded Fail");
          });
        }
      }