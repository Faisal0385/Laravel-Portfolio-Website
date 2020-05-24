@extends('Layout.app')


@section('content')

<div id="mainDiv" class="container">
<div class="row">
<div class="col-md-12 p-5">
    <div class="col-lg-6 mb-3">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addCourseBtn"> Add </button>
    </div>
<table id="course_Datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Course Name</th>
	  <th class="th-sm">Course Description</th>
	  <th class="th-sm">Course Fee</th>
	  <th class="th-sm">Edit</th>
	  <th class="th-sm">Delete</th>
    </tr>
  </thead>
  <tbody id="course_table">
	
  </tbody>
</table>

</div>
</div>
</div>

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

<!-- Delete Modal -->
<div class="modal fade" id="deleteCourseModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

		<!-- <div id="loaderDiv" class="container">
		<div class="row">
		<div class="col-md-12 text-center">
		<img class="loading-icon" src="{{asset('images/loader-icon.gif')}}">
		</div>
		</div> 
		</div> -->


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
        <button data-id="" id="CoursesDeleteConfirmBtn" type="button" class="btn btn-primary btn-sm">Yes</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Course Model -->
<div class="modal fade" id="addCourseBtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Add New Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body  text-center">
       <div class="container">
       	<div class="row">
       		<div class="col-md-6">
             	<input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
          	 	<input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
    		 	<input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
     			<input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
       		</div>
       		<div class="col-md-6">
     			<input id="CourseClassId" type="text" id="" class="form-control mb-3" placeholder="Total Class">      
     			<input id="CourseLinkId" type="text" id="" class="form-control mb-3" placeholder="Course Link">
     			<input id="CourseImgId" type="text" id="" class="form-control mb-3" placeholder="Course Image">
       		</div>
       	</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
        <button  id="CourseAddConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Save</button>
      </div>
    </div>
  </div>
</div>





@endsection

@section('script')
	<script type="text/javascript">
		getCoursesData();
	</script>
@endsection