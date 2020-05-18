$(document).ready(function() {
    $('#VisitorDt').DataTable();
    $('.dataTables_length').addClass('bs-select');
});


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