//we store out timerIdhere
var timeOutId = 0;
//we define our function and STORE it in a var
var ajaxFn = function () {
        $.ajax({
            url: baseurl+"update_status",
            success: function (response) {
                if (response == 'True') {//YAYA
                    clearTimeout(timeOutId);//stop the timeout
                } else {//Fail check?
                    timeOutId = setTimeout(ajaxFn, 500);//set the timeout again
                    console.log("call");//check if this is running
                    //you should see this on jsfiddle
                    // since the response there is just an empty string
                }
            }
        });
}
ajaxFn();//we CALL the function we stored 
//or you wanna wait 10 secs before your first call? 
//use THIS line instead
timeOutId = setTimeout(ajaxFn, 500);