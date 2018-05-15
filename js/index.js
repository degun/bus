$(function () {
    $("<div />").css({
        position: "absolute",
        width: "100%",
        height: "100%",
        left: -1,
        top: -1,
        zIndex: 3, 
        backgroundColor: "white",
        border: '1px solid white'
    }).appendTo($(".djathtas, .m, .d").css("position", "relative"));

    $('.m div').css({left: 0});

    $('.djathtas div').animate({width: 0}, 800, function(){
        $(this).css({right: 0, left: 'auto'});
    });
    $('.d div').delay(400).animate({width: 0, height: 0}, 800);
    $('.m div').delay(800).animate({width: 0}, 800);
    //$('h6').delay(800).animate({'margin-top': 0, 'opacity': 1}, 600);
    $('h2').delay(1000).animate({'margin-top': 0, 'opacity': 1}, 600);
    

    $("#mireseerdhet a").click(function(e){
        var href = $(this).attr('href');
        e.preventDefault();
        $('h2').animate({'margin-top': '20px', 'opacity': 0}, 600);
        $('h6').delay(200).animate({'margin-top': '20px', 'opacity': 0}, 600);
        $('.m div').animate({width: '100%'}, 800);
        $('.d div').delay(400).animate({width: '100%', height: '100%'}, 800);
        $('.djathtas div').delay(400).animate({width: '100%'}, 800);
        $('body').delay(400).animate({'background-color': 'whitesmoke'}, 800);
        setTimeout(function(){
            window.location = href;
       },1200);  
    });

    function shperthimTeksti(element){
        var $teksti = $(element);
        var teksti = $teksti.html();
        $teksti.html('');
        for(var i=0;i<teksti.length;i++){
            $teksti.append('<span style="position: relative; opacity: 0; top: 18px">'+teksti.charAt(i)+'</span>');
        }
        var shkronjat =$teksti.find('span');
        shkronjat.each(function(i){
        var shkronje = $(this); 
        setTimeout(function() { 
            shkronje.delay(300).animate({'top': 0, 'opacity': 1}, 1000);
        }, 10*i);
        });
    }

    shperthimTeksti('.majtas .row .lart h6');

});