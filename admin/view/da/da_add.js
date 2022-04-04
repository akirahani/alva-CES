$('input[name="danhmuc[]"]').change(function(){
    let iddanhmuc = $(this).val();
    if ($(this).prop("checked")) {
        $.ajax({
            method: "POST",
            data: {danhmuc:iddanhmuc, thaotac:"them"},
            url: "view/da/process-file-add.php",
            success:function(data)
            {
                $(".load-hinh").html(data);
            }
        });
    }
    else
    {
        $.ajax({
            method: "POST",
            data: {danhmuc:iddanhmuc, thaotac:"xoa"},
            url: "view/da/process-file-add.php",
            success:function(data)
            {
                $(".load-hinh").html(data);
            }
        });
    }
});