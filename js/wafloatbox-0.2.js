
jQuery.fn.extend({
    WAFloatBox: function () {
        var a = $(this);
        a.prepend('<button class="myk-btn"><img src="'+baseurl+'images/wa-icon.png" class="myk-wa-icon"></button><div class="myk-panel"></div>');


        var b = $(".myk-panel");
        b.append('<div class="myk-panelhead"><span class="myk-close"><i class="fa fa-close"></i></span><img src="'+baseurl+'images/wa-icon.png" class="myk-wa-icon" style="width: 30px"><h4 class="myk-paneltitle">WhatsApp </h4></div><div class="myk-panelbody"></div>');

        $('.myk-item').each(function(){
        //this wrapped in jQuery will give us the current .letter-q div
        $('.myk-panelbody').append(`
        <a target='_blank' href="https://wa.me/${$(this).data('wanumber')}?text=${$(this).data('watext')}" class="myk-list">
            <img src="${$(this).data('waava')}" class="myk-ava">
            <div class="myk-number">
                <p class="myk-who"><b>${$(this).data('wadivision')}</b></p>
                <span class="myk-name">${$(this).data('waname')}</span>
            </div>
        </a>
        `)


    });

    // trigger 
    $(".myk-btn").click(function(){
    $(".myk-panel").toggleClass("myk-show");
    });
    $(".myk-close").click(function(){
    $(".myk-panel").toggleClass("myk-show");
    });

    }
});

