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



function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}
  $("#vuong").change(function() {
    readURL(this);
  });
    $("#vuong1").change(function() {
    readURL(this);
  });
  $(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML('<img  class="img-display1" style=" width:10%; padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#vuong').change(function(){
        imagesPreview(this,'div.vuong');

    });
     $('#vuong1').change(function(){
        imagesPreview(this,'div.vuong1');
    });
});