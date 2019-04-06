jQuery(document).ready(function ($) {

    //slideup notify after 3 seconds
    $(".alert-success").delay(3000).slideUp();
    $(".alert-danger").delay(5000).slideUp();

    //datepicker plugin
    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    //Load more content on edit contract page
    $("#load_content_btn").click(function(event) {
        var status = $(".show-more-content").is(":hidden");
        // var this = $(this).html('');
        if (status == true) {
            $(this).html('Show less <i class="fa fa-angle-up"></i>');
            $(".show-more-content").slideDown('slow');
        } else {
            $(this).html('Show more <i class="fa fa-angle-down"></i>');
            $(".show-more-content").slideUp('slow');
        }
    });
    $("input[name='detail_url']").change(function () {
        $(".error-file-msg").text('');
        var uploadFile = $("input[type='file']").val();
        var extension = $("input[type='file']").val().split('.').pop().toLowerCase();
        if (uploadFile != '') {
            if(jQuery.inArray(extension, ['pdf']) == -1)
            {
                $(".error-file-msg").html('<div class="alert alert-warning">Only except (.pdf) format</div>');
                $("input[type='file']").val('');
                return false;
            }
            if (this.files[0].size > 10000000) {
                $(".error-file-msg").html('<div class="alert alert-warning">Max file size: 10 Mb</div>');
                return false;
            }
        }
    });
    // Mail
    $(".check-all").click(function () {
        $(".sub-check").trigger('click');
    });

    $(".send-all").on('click',function () {
        $('.mail-list tr').each(function(){
            //console.log($(this).find(".sub-check").is(':checked'));
            if($(this).find(".sub-check").is(':checked')) {
                var fullname = $(this).children()[1].innerText;
                var name = $(this).children()[1].innerText.split(" ").pop();
                var email = $(this).children()[2].innerText;
                $.ajax({
                    method: 'POST',
                    url: '/send',
                    data: {fullname: fullname, name: name, email: email},
                }).done(function(data){
                    console.log(data);
                });
            }
        });
    });

    $(".fpdf").click(function () {
        $(".embed-pdf").attr("src", "/files/" + $(this).find(".pdf-file").text());
    });

    // User
    //editables on first profile page
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
        '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';

    //editables

    // *** editable avatar *** //
    try {//ie8 throws some harmless exceptions, so let's catch'em

        //first let's add a fake appendChild method for Image element for browsers that have a problem with this
        //because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
        try {
            document.createElement('IMG').appendChild(document.createElement('B'));
        } catch(e) {
            Image.prototype.appendChild = function(el){}
        }

        var last_gritter;
        $('#avatar').editable({
            type: 'image',
            name: 'avatar',
            value: null,
            //onblur: 'ignore',  //don't reset or hide editable onblur?!
            image: {
                //specify ace file input plugin's options here
                btn_choose: 'Change Avatar',
                droppable: true,
                maxSize: 1100000,//~100Kb

                //and a few extra ones here
                name: 'avatar',//put the field name here as well, will be used inside the custom plugin
                on_error : function(error_type) {//on_error function will be called when the selected file has a problem
                    if(last_gritter) $.gritter.remove(last_gritter);
                    if(error_type == 1) {//file format error
                        last_gritter = $.gritter.add({
                            title: 'File is not an image!',
                            text: 'Please choose a jpg|gif|png image!',
                            class_name: 'gritter-error gritter-center'
                        });
                    } else if(error_type == 2) {//file size rror
                        last_gritter = $.gritter.add({
                            title: 'File too big!',
                            text: 'Image size should not exceed 100Kb!',
                            class_name: 'gritter-error gritter-center'
                        });
                    }
                    else {//other error
                    }
                },
                on_success : function() {
                    $.gritter.removeAll();
                }
            },
            url: function(params) {
                // ***UPDATE AVATAR HERE*** //
                //for a working upload example you can replace the contents of this function with
                //examples/profile-avatar-update.js

                var deferred = new $.Deferred;

                var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
                if(!value || value.length == 0) {
                    deferred.resolve();
                    return deferred.promise();
                }


                //dummy upload
                setTimeout(function(){
                    if("FileReader" in window) {
                        //for browsers that have a thumbnail of selected image
                        var thumb = $('#avatar').next().find('img').data('thumb');
                        if(thumb) $('#avatar').get(0).src = thumb;
                        $('#img-profile').val(thumb);
                    }

                    deferred.resolve({'status':'OK'});

                    if(last_gritter) $.gritter.remove(last_gritter);
                    // last_gritter = $.gritter.add({
                    //     title: 'Avatar Updated!',
                    //     text: 'Uploading to server can be easily implemented. A working example is included with the template.',
                    //     class_name: 'gritter-info gritter-center'
                    // });

                }, parseInt(Math.random() * 800 + 800));

                return deferred.promise();

                // ***END OF UPDATE AVATAR HERE*** //
            },

            success: function(response, newValue) {
            }
        })
    }catch(e) {}

    $("#number-format").on('keyup', function () {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        $(this).val(n.toLocaleString());
    });

    //or change it into a date range picker
    $('.date_start').datepicker({
        format: 'dd/mm/yyyy',
    }).on('changeDate', function (selected) {
        var startDate = new Date(selected.date.valueOf());
        var jobType = $('.job-type').val();
        if (jobType == '1') {
            $('.date_end').datepicker('setStartDate', new Date(startDate.setMonth(startDate.getMonth() + 6)));
        }
    }).on('clearDate', function (selected) {
        $('.date_end').datepicker('setStartDate', null);
    });
    $('.date_end').datepicker({
        format: 'dd/mm/yyyy'
    });


    $('#id-input-file-1 , #id-input-file-2').ace_file_input({
        no_file: 'No File ...',
        btn_choose: 'Choose',
        btn_change: 'Change',
        droppable: true,
        onchange: null,
        thumbnail: true //| true | large
        //whitelist:'gif|png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });

    var atDefaultPasswdIsChecked = $('#default_passwd:checkbox:checked').length > 0;
    if(atDefaultPasswdIsChecked){
        $('.user-add #password').prop('disabled', true);
    }
    $(".user-add #default_passwd").change(function() {
        if(this.checked) {
            $('#password').prop('disabled', true);
        }else{
            $('#password').prop('disabled', false);
        }
    });
});


// Add new user
jQuery(function($) {

    //documentation : http://docs.jquery.com/Plugins/Validation/validate

    $('#validation-form').validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: false,
        ignore: "",
        rules: {
            email: {
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength: 6
            },
            password2: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            },
            fullname: {
                required: true
            },
            position_id: {
                required: true,
                number: true,
            },
            role_id: {
                required: true,
                number: true,
            }
        },

        messages: {
            email: {
                required: "Please provide a valid email.",
                email: "Invalid email address"
            },
            password: {
                required: "Please specify a password.",
                minlength: "Password must be at least 6 characters"
            },
            fullname: {
                required: "Please provide a fullname."
            }
        },

        highlight: function (e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },

        success: function (e) {
            $(e).closest('.form-group').removeClass('has-error');
            $(e).remove();
        },

        errorPlacement: function (error, element) {
            error.insertAfter(element.parent());
        },

        submitHandler: function (form) {
            var email = $('#email').val();
            var fullname = $('#fullname').val();
            var password = $('#password').val();
            var position_id = $('#position_id').val();
            var role_id = $('#role_id').val();
            $.ajax({
                type: "POST",
                url: "/users/new-user",
                dataType: 'json',
                data: {
                    email: email,
                    fullname: fullname,
                    password: password,
                    position_id: position_id,
                    role_id: role_id,
                },
                success: function(data) {
                    if (data.success == false) {
                        $("#email").closest('.form-group').addClass('has-error');
                        $("<div id='email-error' class='help-block'>" + data.errors.email[0] + "</div>").insertAfter($("#email").parent());
                    } else {
                        // Clear error message
                        $("#email").closest('.form-group').removeClass('has-error');
                        $("#email-error").remove();

                        // show dialog
                        bootbox.dialog({
                            message: "<h4>New user was saved successfully!</h4>",
                            buttons: {
                                transition: {
                                    label: "Go to user list.",
                                    className: 'btn-info',
                                    callback: function(){
                                        window.location.href = '/users';
                                    }
                                },
                                new: {
                                    label: "Add new a user!",
                                    className: 'btn-success',
                                    callback: function(){
                                        $(".user-reset-btn").click();
                                    }
                                }
                            }
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        },

        invalidHandler: function (form) {
        }
    });
})

// Contracts screen
jQuery(function($) {
    $(".contract-delete-btn").click(function() {
        var that = $(this);
        var cid = that.data('id');

        // show dialog
        bootbox.confirm({
            message: "Do you want to delete it? Are you sure ?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result) {
                    console.log('This was logged in the callback0: ' + result);
                    $.ajax({
                        type: "POST",
                        url: "/contracts/delete",
                        dataType: 'json',
                        data: {
                            id: cid,
                        },
                        success: function(data) {
                            if (data.success == true) {
                                that.closest('.contract-row').remove();
                            } else {
                                bootbox.alert("Something was wrong! Please, try again!");
                            }
                        },
                        error: function (error) {
                            bootbox.alert("Something was wrong! Please, try again!");
                        }
                    });
                }
            }
        });
    });
});
