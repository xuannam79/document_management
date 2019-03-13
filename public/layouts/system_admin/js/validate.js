$(document).on('click', '#btnAddUser', function () {
    $.ajax({
        method: "GET",
        async: false,
        url: "/ajax-email",
    }).done(function(data) {
        var count = Object.keys(data).length;
        function validateEmail(){
            var email = document.getElementById("email");
            for(var i = 0; i < count; i++){
                var obj = data[i];
                if(obj.email == email.value)
                {
                    return true;
                }
            }
            return false;
        }
        function validatePhone(){
            var phone = document.getElementById("phone");
            for(var i = 0; i < count; i++){
                var obj = data[i];
                if(obj.phone == phone.value)
                {
                    return true;
                }
            }
            return false;
        }

        if(validateEmail() == true){
            email.onchange = validateEmail;
            email.onkeyup = validateEmail;
            email.setCustomValidity("địa chỉ email : " + email.value + " đã tồn tại");
            $('#email').focus();
        }
        else
        {
            email.setCustomValidity("");
        }

        if(validatePhone() == true){
            phone.onchange = validatePhone;
            phone.onkeyup = validatePhone;
            phone.setCustomValidity("địa chỉ email : " + phone.value + " đã tồn tại");
            $('#phone').focus();
        }
        else
        {
            phone.setCustomValidity("");
        }
    });
});
