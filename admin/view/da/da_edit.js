$('select[name="danhmuc"]').change(function(){
	let danhmuc = $(this).val();
	$.ajax({
		method: "POST",
		data: {danhmuc:danhmuc, loai:loai},
		url: "view/thong-so/loai-danh-muc.php",
		success: function(data)
		{
			$('select[name="loai"]').html(data);
		}
	});
});