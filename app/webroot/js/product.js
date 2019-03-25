$(document).ready(function(){
    var pathname = window.location.protocol + "//" + window.location.host;
    
    $('#btn-cmt').click(function(e) {
        var comment = $.trim($("#input-review").val());
        var product_id = getUrlVars()['product_id'];

        $.ajax({
            method: 'POST',
            url: pathname + '/website/Ajax/postComment/',
            dataType: 'json',
            data: {
                comment: comment,
                product_id: product_id
                },
            success: function(response) {
                if (response.status == true) {
                    $('.box-review').append(response.output);
                }
            }
        });
    });
});

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}