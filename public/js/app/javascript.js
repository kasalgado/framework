$(function() {
    $('.btn-success').click(function() {
        $('.box-toggle').toggle('fast', function() {
            
        }); 
    });
    
    $('#ajax-json').click(function() {
        var name = $('#name-two').val();
        
        $.ajax({
            type: 'POST',
            url: basename,
            data: {
                name: name,
                response: 'json',
                ctr: 'javascriptJson'
            },
            dataType: 'json'
        }).done(function(data) {
            $('#set-name').text(data.name);
        });
    });
    
    $('#ajax-html').click(function() {
        var name = $('#name-three').val();
        
        $.ajax({
            type: 'POST',
            url: basename,
            data: {
                name: name,
                response: 'html',
                ctr: 'javascriptHtml'
            },
            dataType: 'html'
        }).done(function(data) {
            $('#set-html').html(data);
        });
    });
});