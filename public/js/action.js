var isUpdate = false;
var idCategory = null;

function deleteCategory(aTag) {
    idCategory = $($($(aTag)[0]).parent()[0]).siblings('#id').text();
    $.ajax({
        url: '/api/category/' + idCategory,
        method: 'delete',
        data: {
            url: window.location.host
        },
        success: function (data, textStatus, jqXHR) {
            if (jqXHR.status == 200) {
                alert('Xóa thành công');
                location.reload();
            } else {
                alert('Xóa thất bại, chú ý còn danh mục con thì không thể xóa!');
            }
        }
    });
}

function getCategory(aTag) {
    idCategory = $($($(aTag)[0]).parent()[0]).siblings('#id').text();
    isUpdate = true;
    $.ajax({
        url: '/api/category/' + idCategory,
        dataType: 'json',
        data: {
            url: window.location.host
        },
        success: function (data, textStatus, jqXHR) {
            $('.component input').val(data.name);
            updateParentInPage(data.parentId);
        }
    });
}

function updateParentInPage($idParent) {
    let parent = null;
    parents = $('option');
    $('option').each(function () {
        if ($(this).val() == $idParent) {
            $(this).prop('selected', true);
        }
    });
}

function submit(btn) {
    let parentId = $('select').val();
    let name = $('input').val();
    // Check if update data or not
    if (isUpdate == true) {
        $.ajax({
            url: '/api/category/' + idCategory,
            method: 'put',
            dataType: 'json',
            data: {
                url: window.location.host,
                name: name,
                parentId: parentId
            },
            success: function (data, textStatus, jqXHR) {
                if (jqXHR.status == 200) {
                    isUpdate = false;
                    alert('Cập nhật thành công');
                    location.reload();
                } else {
                    alert('Cập nhật thất bại. Vui lòng thử lại');
                }
            }
        });
    } else {
        $.ajax({
            url: '/api/category',
            method: 'post',
            dataType: 'json',
            data: {
                url: window.location.host,
                name: name,
                parentId: parentId
            },
            success: function (data, textStatus, jqXHR) {
                if (jqXHR.status == 200) {
                    isUpdate = false;
                    alert('Tạo danh mục mới thành công');
                    location.reload();
                } else {
                    alert('Tạo danh mục thất bại. Vui lòng thử lại');
                }
            }
        });
    }
}
