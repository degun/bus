$(function () {

    var fusha = $('input, select');

    fusha.each(function(){
        f = $(this);
        console.log(f.val());
        if(!(f.val() == null || f.val() == "")){
            f.css({'border-color': 'black', 'background-color': '#ffffe0'});
        }else{
            f.css({'border-color': '#999', 'background-color': 'white'});
        }
    });

    fusha.on('focusout', function(){
        f = $(this);
        console.log(f.val());
        if(!(f.val() == null || f.val() == "")){
            f.css({'border-color': 'black', 'background-color': '#ffffe0'});
        }else{
            f.css({'border-color': '#999', 'background-color': 'white'});
        }
    });
     
    var h = $(window).height();

    var q = $('.qendrore');

    q.animate({opacity: 1, 'margin-top': 0}, 100);

    $('nav a').on('click', function(e){
        var href = $(this).attr('href');
        e.preventDefault();
        q.animate({opacity: 0, 'margin-top': '-5px'}, 100);
        setTimeout(function(){
            window.location = href;
        },100);  
    });

    $('.futuQender, #mireseerdhet').height(h);
    $('.lart, .poshte').height(h/2);
    $('.m, .d').height(h/2);

    $('.kerkim').keyup(function(){
        var kerko, target, rreshta, qeliza, gjeta = 0;
        kerko = $(this).val().replace(/ë/g, 'e').replace(/ç/g,'c');
        rreshta = $('tbody tr');
        rreshta.each(function(){
            qeliza = $(this).find('td');
            qeliza.each(function(){
                target = $(this).html().toLowerCase().replace(/ë/g, 'e').replace(/ç/g,'c');
                if(target.includes(kerko)){gjeta = 1};
            });
            if(gjeta == 0){
                $(this).hide(300);
            }else{
                $(this).show(300);
            }
            gjeta = 0;
        });
    });

    function printdiv(printpage){
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

    $('.printo').click( function(){
        $(this).hide();
        printdiv('modalPrint');
        location.reload();
        $(this).show();
    });
});