function getCoursesData() {

    axios.get('/getCoursesData')

        .then(function(response) {

            if (response.status == 200) {

                $('#mainDiv').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');
                $('#course_table').empty();

                // handle success
                var dataJson = response.data;
                $.each(dataJson, function(i, item) {
                    $('<tr>').html(
                        "<td class='th-sm' >" + dataJson[i].course_name + "</td>" +
                        "<td class='th-sm' >" + dataJson[i].course_des + "</td>" +
                        "<td class='th-sm' >" + dataJson[i].course_fee + "</td>" +
                        "<td class='th-sm' ><a class='serviceEditBtn' data-id=" + dataJson[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                        "<td class='th-sm' ><a class='courseDeleteBtn' data-id=" + dataJson[i].id + "><i class='fas fa-trash-alt'></i></a></td>"
                    ).appendTo('#course_table');
                });

            } else {

                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');

            }

            $('.courseDeleteBtn').click(function() {
                var id = $(this).data('id');
                $('#dataDeleteId').html(id);
                $('#deleteCourseModel').modal('show');
            })

            // $('.serviceEditBtn').click(function() {
            //     var id = $(this).data('id');
            //     getServicesSingleData(id);
            //     $('#dataEditId').html(id);
            //     $('#editModel').modal('show');

            // })

        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}

$('#CoursesDeleteConfirmBtn').click(function() {
    var id = $('#dataDeleteId').html();
    getCourseDelete(id);
});

function getCourseDelete(deleteID) {

    axios.post('/CourseDelete', {
            id: deleteID
        })
        .then(function(response) {

            if (response.data == 1) {
                $('#deleteCourseModel').modal('hide');
                toastr.success('Data Deleted.');
                getCoursesData();
            } else {
                $('#deleteCourseModel').modal('hide');
                toastr.error('Delete Failed.');
                getCoursesData();
            }
        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}


$('#CourseAddConfirmBtn').click(function() {

    var CourseNameId   = document.getElementById("CourseNameId").value;
    var CourseDesId    = document.getElementById("CourseDesId").value;
    var CourseFeeId    = document.getElementById("CourseFeeId").value;
    var CourseEnrollId = document.getElementById("CourseEnrollId").value;
    var CourseClassId  = document.getElementById("CourseClassId").value;
    var CourseLinkId   = document.getElementById("CourseLinkId").value;
    var CourseImgId    = document.getElementById("CourseImgId").value;


    addCourse(CourseNameId, CourseDesId, CourseFeeId, CourseEnrollId, CourseClassId, CourseLinkId, CourseImgId);
})


//Add Service
function addCourse(CourseNameId, CourseDesId, CourseFeeId, CourseEnrollId,CourseClassId,CourseLinkId,CourseImgId) {

    axios.post('/CourseAdd', {

            CourseNameId: CourseNameId,
            CourseDesId: CourseDesId,
            CourseFeeId: CourseFeeId,
            CourseEnrollId: CourseEnrollId,
            CourseClassId: CourseClassId,
            CourseLinkId: CourseLinkId,
            CourseImgId: CourseImgId,


        })
        .then(function(response) {

            if (response.data == 1) {
                $('#addCourseBtn').modal('hide');
                toastr.success('Course Add.');
                getCoursesData();
            } else {
                $('#addCourseBtn').modal('hide');
                toastr.error('Insert Data Failed.');
                getCoursesData();
            }
        })
        .catch(function(error) {

            $('#loaderDiv').addClass('d-none');
            $('#wrongDiv').removeClass('d-none');

        })

}