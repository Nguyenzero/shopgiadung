function removeRow(id, url) {
    if (confirm('Bạn có chắc chắn muốn xóa không?')) {
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: { "_token": "{{ csrf_token() }}" },
            url: url + '/' + id,
            success: function (result) {
                if (result.success) {
                    location.reload();
                } else {
                    alert('Xóa không thành công');
                }
            }
        });
    }
}