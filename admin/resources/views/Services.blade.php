@extends('Layout.app')


@section('content')

<div id="mainDiv" class="container d-none text-center">
	<div class="row">
		<div class="col-md-12 p-5">
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
<div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <h5>Do you want to delete?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
        <button data-id="" id="serviceDeleteConfirmBtn" type="button" class="btn btn-primary btn-sm">Yes</button>
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


















@endsection

@section('script')
	<script type="text/javascript">
		getServicesData();		
	</script>
@endsection