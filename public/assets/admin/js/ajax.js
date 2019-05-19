$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
	$('.edit').click(function(){
		$('.error').hide();
		let id = $(this).data('id');
		//Edit
		$.ajax({
			url : 'admin/category/'+id+'/edit',
			dataType : 'json',
			type : 'get',
			success :function($result){
				console.log($result);
				$('.name').val($result.name);
				$('.title').text($result.name);
				if($result.status == 1){
					$('.ht').attr('selected','selected');
				}else{
					$('.kht').attr('selected','selected');
				}
			}
		});
		$('.update').click(function(){
			let ten = $('.name').val();
			let status = $('.status').val();
			$.ajax({
				url : 'admin/category/'+id,
				data : {
					name : ten,
					status : status
				},
				type : 'put',
				dataType : 'json',
				success : function($result){
					console.log($result);
					if($result.error == 'true'){
						$('.error').show();
						$('.error').text($result.message.name[0]);	
					}else{
						toastr.success($result.success, 'Thông báo', {timeOut: 5000});
						$('#edit').modal('hide');
						location.reload();
					}

				}
			});
		});
	});
	//Delete category
	$('.delete').click(function(){
		let id = $(this).data('id');
		$('.del').click(function(){
			$.ajax({
				url : 'admin/category/'+id,
				dataType : 'json',
				type : 'delete',
				success : function($result){
					toastr.success($result.success, 'Thông báo', {timeOut: 5000});
					$('#edit').modal('hide');
					location.reload();
				}
			});
		});
	});
});