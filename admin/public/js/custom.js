$(document).ready(function () {
$('#VisitorDt').DataTable();
$('.dataTables_length').addClass('bs-select');
});


function getServicesData(){

	axios.get('/getServicesData')
	
	.then(function (response) {

		if(response.status == 200){

			$('#mainDiv').removeClass('d-none');
			$('#loaderDiv').addClass('d-none');
			$('#service_table').empty();

			// handle success
			var dataJson = response.data;
			$.each(dataJson, function(i, item){
				$('<tr>').html(

				"<td class='th-sm' ><img class='table-img' src='"+dataJson[i].service_img+"'></td>"+
				"<td class='th-sm' >"+dataJson[i].service_name+"</td>"+
				"<td class='th-sm' >"+dataJson[i].service_des+"</td>"+
				"<td class='th-sm' ><a href='' ><i class='fas fa-edit'></i></a></td>"+
				"<td class='th-sm' ><a class='serviceDeleteBtn' data-id="+dataJson[i].id+"><i class='fas fa-trash-alt'></i></a></td>"
				).appendTo('#service_table');
			});


			$('.serviceDeleteBtn').click(function(){
				var id = $(this).data('id');
				$('#serviceDeleteConfirmBtn').attr('data-id',id)
				$('#deleteModel').modal('show');
				$('#serviceDeleteConfirmBtn').click(function(){
					getServiceDelete(id);
				});
			})



		}else{

			$('#loaderDiv').addClass('d-none');
			$('#wrongDiv').removeClass('d-none');
		
		}
	
		

	})
	.catch(function (error) {

		$('#loaderDiv').addClass('d-none');
		$('#wrongDiv').removeClass('d-none');

	})

}


function getServiceDelete(deleteID){

	axios.post('/ServiceDelete',{id:deleteID})
	.then(function (response) {

		if(response.data == 1){
			$('#deleteModel').modal('hide');
			toastr.success('Data Deleted.');
			getServicesData();
		}else{
			$('#deleteModel').modal('hide');
			toastr.error('Delete Failed.');
			getServicesData();
		}
	
		

	})
	.catch(function (error) {


	})

}