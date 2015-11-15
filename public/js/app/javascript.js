$(function() {
    $('.toggle-fade').click(function() {
        $(this).fadeOut(); 
    });
    
    $('.call-ajax').click(function() {
        $.ajax({
            type: 'POST',
            url: basename,
            data: {
                id: js_name,
                response: 'json',
                ctr: 'javascriptAjax'
            },
            dataType: 'json'
        }).done(function(data) {
            $('.show-text').html(data.id + ':' + data.string);
        });
    });
});