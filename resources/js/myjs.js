function submitForm(id){
    const flag = confirm("Bạn có chắc chắc chắn muốn xóa không? \nCác dữ liệu liên quan sẽ không bị ảnh hưởng.");
    if(flag === true){
        document.getElementById(id).submit();
    }
}

function restoreArchivedData(id){
    const flag = confirm("Bạn có muốn khôi phục dữ liệu này?");
    if(flag === true){
        document.getElementById(id).submit();
    }
}
