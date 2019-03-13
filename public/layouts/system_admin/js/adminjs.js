

    function deleteUser(id) {
        if (confirm("Bạn có muốn xóa id: "+id+" không ?")) {
            $('#delete-form'+id).submit();
            return true;
        }
        else {
            return false;
        }
    }
    function dep(id){
        $("#form-dep"+id).submit();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     url: '/ajaxdp/'+id,
        //     type: 'POST',
        //     cache: false,
        //     success: function(){
        //     },
        //     error: function (){
        //         alert('Lỗi đã xảy ra');
        //     }
        // });
        // return false;
    };
    function pos(id) {
        $("#form-pos"+id).submit();
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     url: "/ajaxps/"+id,
        //     type: 'POST',
        //     cache: false,
        //     success: function(){
        //     },
        //     error: function (){
        //         alert('Lỗi đã xảy ra');
        //     }
        // });
        // return false;
    };
    function readURLPicTure(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatar").change(function() {
        readURLPicTure(this);
    });
