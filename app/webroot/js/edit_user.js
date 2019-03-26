jQuery(document).ready(function () {
    $("input[type='file']").change(function () {
        $(".error-file-msg").text('');
        var uploadImg = $("input[type='file']").val();
        var extension = $("input[type='file']").val().split('.').pop().toLowerCase();
        if (uploadImg != '') {
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
                $(".error-file-msg").css('maxWidth', '190px').html('<div class="alert alert-warning">Only except jpg, jpeg, png, gif format</div>');
                $("input[type='file']").val('');
                return false;
            }
            if (this.files[0].size > 1000000) {
                $(".error-file-msg").css('maxWidth', '190px').html('<div class="alert alert-warning">Max file size: 10 Mb</div>');
                return false;
            }
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img-profile').attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        }
    });
    //show, hide changing password field
    $("#chk_change_pwd").on('click', function (event) {
        if ($(this).is(":checked")) {
            // changeStatus();
            $("#change_pass_panel").slideDown('slow');
        } else {
            $("#change_pass_panel").slideUp('slow');
        }
    });
    //clear the edit user form
    $("button[type='reset']").click(function (event) {
        $("#editUserFrm")[0].reset();
    });
    //edit user profile validation
    $("#editUserFrm").validate({
        rules: {
            fullname: {
                required: true,
            },
            bio: {
                required: true,
                minlength: 20
            },
            date_of_birth: {
                required: true,
                dateISO: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            position_id: {
                required: true
            },
            role_id: {
                required: true
            },
            status_id: {
                required: true
            },
            old_pass: {
                required: {
                    depends: function (element) {
                        return $("#chk_change_pwd").is(":checked");
                    }
                },
                minlength: 6
            },
            new_pass: {
                required: {
                    depends: function (element) {
                        return $("#old_pass").val() != '';
                    }
                },
                minlength: 6
            },
            confirm_pass: {
                required: {
                    depends: function (element) {
                        return $("#new_pass").val() != '';
                    }
                },
                equalTo: "#new_pass"
            },
            facebook: {
                url: true
            },
            twitter: {
                url: true
            },
            instagram: {
                url: true
            },
            gender: {
                required: true,
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            confirm_pass: "Please enter same password",
            bio: "Introduce your self a little bit, guy (at least 20 characters)"
        },
        errorPlacement: function(error, element) {
            if (element.attr("name") == "date_of_birth") {
                error.insertAfter("#birthday_area");
            } else if(element.attr("name") == "gender") {
                error.insertAfter(".gender-area").css('paddingLeft', '12px');
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            $(".error-file-msg").text('');
            form.submit();
        }
    });
});
