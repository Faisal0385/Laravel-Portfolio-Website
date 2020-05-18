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


<!-- Modal -->
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

<!-- <div id="loaderDiv" class="container">
<div class="row">
<div class="col-md-12 text-center">
<img class="loading-icon" src="{{asset('images/loader-icon.gif')}}">
</div>
</div> 
</div>-->


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








<!-- Modal -->
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
	</script>
@endsection