$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
	$('.qty').blur(function(){
		let rowid = $(this).data('id');
		$.ajax({
			url : 'cart/'+rowid,
			type : 'put',
			dataType : 'json',
			data : {
				qty : $(this).val(),
			},
			success : function(data){
				if(data.error){
					toastr.error(data.error, 'Thông báo', {timeOut: 5000});
				}else{
					toastr.success(data.result, 'Thông báo', {timeOut: 5000});
					location.reload();
				}
			}
		});
	});
	$('.close1').click(function(){
		$('#delete').modal('show');
		let rowid = $(this).data('id');
		$('.delProduct').click(function(){
			$.ajax({
				url : 'cart/'+rowid,
				type : 'delete',
				dataType : 'json',
				success : function(data){
					$('#delete').modal('hide');
					toastr.success(data.result, 'Thông báo', {timeOut: 5000});
					location.reload();
				}
			});
		});
	});
	
});