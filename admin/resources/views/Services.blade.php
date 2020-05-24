@extends('Layout.app')


@section('content')


<div id="mainDiv" class="container d-none text-center">
	<div class="row">
		<div class="col-lg-6 mt-5 text-left">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addServicesBtn"> Add </button>
		</div>
		<div class="col-md-12 p-4">
			<table id="" class="table table-striped table-bordered" cellspacing="0" width="100%">
			  <thead>
			    <tr>
			      <th class="th-sm">Image</th>
				  <th class="th-sm">Name</th>
				  <th class="th-sm">Description</th>
				  <th class="th-sm">Edit</th>
				  <th class="th-sm">Delete</th>
			    </tr>
			  </thead>
			  <tbody id="service_table">



			  </tbody>
			</table>
		</div>
	</div>
</div>


<!-- Delete Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

		<div id="loaderDiv" class="container">
		<div class="row">
		<div class="col-md-12 text-center">
		<img class="loading-icon" src="{{asset('images/loader-icon.gif')}}">
		</div>
		</div> 
		</div>


		<div id="wrongDiv" class="container d-none">
		<div class="row">
		<div class="col-md-12 p-5 text-center">
		<h3>Somthing went worng!!</h3>
		</div>
		</div>
		</div>

       <h5>Do you want to delete?</h5>
       <h5 id="dataDeleteId"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        <button data-id="" id="serviceDeleteConfirmBtn" type="button" class="btn btn-primary btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="editModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<div>
	      	<h5 id="dataEditId"></h5>
			<!-- service_name -->
			<label for="materialContactFormMessage">Service Name</label>
			<input type="text" id="service_name" class="form-control mb-4">

			<!-- service_des -->
			<label for="materialContactFormMessage">Service Descriptions</label>
			<input type="text" id="service_des" class="form-control mb-4">

			<!-- service_img -->
			<label for="materialContactFormMessage">Service Image</label>
			<input type="text" id="service_img" class="form-control mb-4">
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" data-id="" id="serviceEditConfirmBtn" class="btn btn-sm btn-primary">Update</button>
      </div>
    </div>
  </div>
</div>

<div id="loaderDiv" class="container">
	<div class="row">
		<div class="col-md-12 p-5 text-center">
			<img class="loading-icon" src="{{asset('images/loader-icon.gif')}}">
		</div>
	</div>
</div>


<div id="wrongDiv" class="container d-none">
	<div class="row">
		<div class="col-md-12 p-5 text-center">
			<h3>Somthing went worng!!</h3>
		</div>
	</div>
</div>








<!-- Add Service Modal -->
<div class="modal fade" id="addServicesBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="addServiceForm">
			<!-- service_name -->
			<label for="materialContactFormMessage">Service Name</label>
			<input type="text" id="addService_name" class="form-control mb-4">

			<!-- service_des -->
			<label for="materialContactFormMessage">Service Descriptions</label>
			<input type="text" id="addService_des" class="form-control mb-4">

			<!-- service_img -->
			<label for="materialContactFormMessage">Service Image</label>
			<input type="text" id="addService_img" class="form-control mb-4">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
        <button type="button" id="serviceAddConfirmBtn" class="btn btn-primary btn-sm">Save</button>
      </div>
    </div>
  </div>
</div>














@endsection

@section('script')
	<script type="text/javascript">
		getServicesData();

		


function getServicesData() {

    axios.get('/getServicesData')

        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#service_table').empty();

                // handle success
                var dataJson = response.data;
                $.each(dataJson, function(i, item) {
                    $('<tr>').html(
                        "<td class='th-sm' ><img class='table-img' src='" + dataJson[i].service_img + "'></td>" +
                        "<td class='th-sm' >" + dataJson[i].service_name + "</td>" +
                        "<td class='th-sm' >" + dataJson[i].service_des + "</td>" +
                        "<td class='th-sm' ><a class='serviceEditBtn' data-id=" + dataJson[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                        "<td class='th-sm' ><a class='serviceDeleteBtn' data-id=" + dataJson[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#service_table');
                });

            } else {

                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');

            }

            $('.serviceDeleteBtn').click(function() {
                var id = $(this).data('id');
                $('#dataDeleteId').html(id);
                $('#deleteModel').modal('show');
            })

            $('.serviceEditBtn').click(function() {
                var id = $(this).data('id');
                getServicesSingleData(id);
                $('#dataEditId').html(id);
                $('#editModel').modal('show');

            })

        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}

$('#serviceDeleteConfirmBtn').click(function() {
    var id = $('#dataDeleteId').html();
    getServiceDelete(id);
});

$('#serviceEditConfirmBtn').click(function() {
    var id = $('#dataEditId').html();
    var service_name = $('#service_name').val();
    var service_des = $('#service_des').val();
    var service_img = $('#service_img').val();
    getServiceEdit(id, service_name, service_des, service_img);
})


$('#serviceAddConfirmBtn').click(function() {
    var addService_name = document.getElementById("addService_name").value;
    var addService_des  = document.getElementById("addService_des").value;
    var addService_img  = document.getElementById("addService_img").value;

    addService(addService_name, addService_des, addService_img);
})


function getServiceDelete(deleteID) {

    axios.post('/ServiceDelete', {
            id: deleteID
        })
        .then(function(response) {

            if (response.data == 1) {
                $('#deleteModel').modal('hide');
                toastr.success('Data Deleted.');
                getServicesData();
            } else {
                $('#deleteModel').modal('hide');
                toastr.error('Delete Failed.');
                getServicesData();
            }
        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}


function getServicesSingleData(id) {

    axios.post('/getServicesSingleData', {
            id: id
        })

        .then(function(response) {

            document.getElementById("service_name").value = response.data[0].service_name;
            document.getElementById("service_des").value = response.data[0].service_des;
            document.getElementById("service_img").value = response.data[0].service_img;

        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}

function getServiceEdit(editID, service_name, service_des, service_img) {

    axios.post('/ServiceEdit', {
            id: editID,
            service_name: service_name,
            service_des: service_des,
            service_img: service_img

        })
        .then(function(response) {

            if (response.data == 1) {
                $('#editModel').modal('hide');
                toastr.success('Data Updated.');
                getServicesData();
            } else {
                $('#editModel').modal('hide');
                toastr.error('Update Failed.');
                getServicesData();
            }
        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}


function addService(addService_name, addService_des, addService_img) {

    axios.post('/ServiceAdd', {

            service_name: addService_name,
            service_des: addService_des,
            service_img: addService_img

        })
        .then(function(response) {

            //console.log(response.data[0]);

            if (response.data == 1) {
                $('#addServicesBtn').modal('hide');
                toastr.success('Service Add.');
                getServicesData();
            } else {
                $('#addServicesBtn').modal('hide');
                toastr.error('Insert Data Failed.');
                getServicesData();
            }
        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}




	</script>
@endsection