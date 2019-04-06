$(document).ready(function(){
    var pathname = window.location.protocol + "//" + window.location.host;
    
    $('#btn-cmt').click(function(e) {
        var comment = $.trim($("#input-review").val());
        var product_id = getUrlVars()['product_id'];

        $.ajax({
            method: 'POST',
            url: pathname + '/Ajax/postComment/',
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

    $('.add-to-cart').click(function(e) {
        //check login
        var user = $.trim($("#myaccount .btn-popup").html());
        if (user == 'Login') {
            //login show popup
            $('.login-popup-cart').show();
            //Click close popup
            $('#btn-close-login').on('click', function(){
                $('.login-popup-cart').hide();
            });
        } else {
            addToCart();
        }        
    });

    $('#btn-login-cart').click(function(e) {
        var email = $("#email-cart").val();
        var password = $("#password-cart").val();

        $.ajax({
            method: 'POST',
            url: pathname + '/Ajax/login/',
            dataType: 'json',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                console.log(response)
                if (response.status == true) {
                    addToCart();
                    location.href = pathname + "/products/cart";
                }
            },
            error: function(xhr, status, err) {
                console.log(xhr);
                console.log(status);
                console.log(err);
            },
        });
    });

    $(".btn-checkout-ok").click(function(e) {
        var cart_id = getUrlVars()['cart_id'];

        $.ajax({
            method: 'POST',
            url: pathname + '/Ajax/order/',
            dataType: 'json',
            data: {
                cart_id: cart_id
                },
            success: function(response) {
                console.log(response)
                if (response.status == true) {
                    console.log("good");
                }
            },
            error: function(xhr, status, err) {
                console.log(xhr);
                console.log(status);
                console.log(err);
            },
        });
    });
});

function addToCart() {
    var pathname = window.location.protocol + "//" + window.location.host;
    var number = $("#input-quantity").val();
    console.log(number);
    var product_id = getUrlVars()['product_id'];

    $.ajax({
        method: 'POST',
        url: pathname + '/Ajax/addToCart/',
        dataType: 'json',
        data: {
            number: number,
            product_id: product_id
            },
        success: function(response) {
            console.log(response)
            if (response.status == true) {
                $("#cart span").html(response.number);
                console.log("good");
            }
        },
        error: function(xhr, status, err) {
            console.log(xhr);
            console.log(status);
            console.log(err);
        },
    });
}

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