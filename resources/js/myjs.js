function submitForm(id) {
    const flag = confirm("Bạn có chắc chắc chắn muốn xóa không? \nCác dữ liệu liên quan sẽ không bị ảnh hưởng.");
    if (flag === true) {
        document.getElementById(id).submit();
    }
}

function restoreArchivedData(id) {
    const flag = confirm("Bạn có muốn khôi phục dữ liệu này?");
    if (flag === true) {
        document.getElementById(id).submit();
    }
}

function acceptApproval(id) {
    const flag = confirm("bạn có chắc chắc muốn duyệt biễu mẫu này không ?");
    if (flag === true) {
        document.getElementById(id).submit();
    }
}

function cancelApproval(id) {
    const flag = confirm("bạn có chắc chắc muốn hủy duyệt biễu mẫu này không ?");
    if (flag === true) {
        document.getElementById(id).submit();
    }
}

function changeDepartment(id) {
    const flag = confirm("Bạn có muốn thay đổi phòng ban của id: " + id + " này không ?");
    if (flag === true) {
        $("#changeDepartment" + id).submit();
    }
}

function changePosition(id) {
    const flag = confirm("Bạn có muốn thay đổi chức vụ của id " + id + " này không ?");
    if (flag === true) {
        $("#changePosition" + id).submit();
    }
}

$(document).on('click', '#btnAddUser', function () {
    $.ajax({
        method: "GET",
        async: false,
        url: "/ajax-email",
    }).done(function (data) {
        var count = Object.keys(data).length;
        function validateEmail() {
            var email = document.getElementById("email");
            for (var i = 0; i < count; i++) {
                var obj = data[i];
                if (obj.email == email.value) {
                    return true;
                }
            }
            return false;
        }
        if (validateEmail() == true) {
            email.onchange = validateEmail;
            email.onkeyup = validateEmail;
            email.setCustomValidity("Tài Khoản Email " + email.value + " Đã Tồn Tại Trong Hệ Thống");
            $('#email').focus();
        }
        else {
            email.setCustomValidity("");
        }

        var new_password = document.getElementById("newpassword");
        var password_confirmation = document.getElementById("confirmpassword");
        if(new_password.value != password_confirmation.value)
        {
            password_confirmation.setCustomValidity('Vui lòng nhập giống với mật khẩu mới');
            $('#confirmpassword').focus();
        }
        else
        {
            password_confirmation.setCustomValidity("");
        }
    });
});

$(document).ready(function () {

    function readURLPicTure(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function () {
        readURLPicTure(this);
    });

    $("#resetAdd").click(function () {
        this.form.reset();
        return false;
    })
});

jQuery(document).ready(function($){
    $('.live-search-list option').each(function(){
        $(this).attr('data-search-term', $(this).text().toLowerCase());
    });

    $('.live-search-box').on('keyup', function(){

        var searchTerm = $(this).val().toLowerCase();

        $('.live-search-list option').each(function(){

            if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
                $(this).show();
            } else {
                $(this).hide();
            }

        });

    });
});

$(document).on("click", "#editInfor", function(){
    $.ajax({
        url: '/ajax-infor',
        type: 'GET',
        cache: false,
        success: function(data){
            $('.css-profile').addClass('css-load-form');
            $('#ajaxform').html(data);
        },
        error: function (){
            alert("that bai");
        }
    });
    return false;
});

$(document).on("change", "#picture", function(){
    $('#changeAvatar').submit();
});
