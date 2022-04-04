function readURL(input) {
if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function(e) {
    $('#blah').attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]); // convert to base64 string
}
}
  $("#file").change(function() {
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
                    $($.parseHTML('<img  class="img-display" style=" width:10%; padding:10px">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

    };

    $('#file').change(function(){
        imagesPreview(this,'div.file');
    });
});