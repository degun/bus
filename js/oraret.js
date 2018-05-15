$(function () {
     
    $('#data').datetimepicker({
        format: 'YYYY-MM-DD',
        locale: 'SQ'
    });

    $('#ora').datetimepicker({
        format: 'LT',
        locale: 'SQ'
    });

    var h = $(window).height();

    $('.futuQender, #mireseerdhet').height(h);
    $('.lart, .poshte').height(h/2);
    $('.m, .d').height(h/2);

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