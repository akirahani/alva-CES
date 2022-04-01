$(".select").change(function(){
    console.log('change');
    let nhom = $(this).val();
    $(".loading").show();
    $.ajax({
        method: "POST",
        data: {nhom:nhom},
        url: "view/nhom-trang-quyen/ajax-nhom.php",
        success:function(dulieu)
        {
            $(".table").html(dulieu);
            $(".loading").hide();
        }
    });
});