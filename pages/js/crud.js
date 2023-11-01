$(function () {
  //add client
  $('#crud-add-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../controller/CrudController.php',
      data: new FormData(this),
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () { $(".lbtn").show(); $(".nlbtn").hide(); },
      success: function (response) {
        if (response.error) {
            $.each(response.message, function (i) {
                toastr.error('<h6 style="color: #fff; font-size: 13px;"><i class="fa fa-exclamation-circle"></i> ' + response.message[i] + '</h6>', '', {
                    closeButton: false,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    tapToDismiss: false,
                    backgroundColor: '#b92020', // Red background color
                    textColor: '#b92020', // White text color
                });
            });
        } else {
            $('#crud-add-form')[0].reset();
            toastr.success('<h6 style="color: #fff; font-size: 13px;"><i class="fa fa-check"></i> ' + response.message + '</h6>', '',  {
                closeButton: false,
                timeOut: 5000,
                positionClass: 'toast-top-right',
                tapToDismiss: false,
                backgroundColor: '#00ff00', // Green background color
                textColor: '#00ff00', // White text color
                class: 'custom-toast-error'
            });
            $('#add-modal').modal('hide');
            loadlist();
        }
        setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
    }
    
    
    });
  });

  //edit client
  $('#crud-edit-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../controller/CrudController.php',
      data: new FormData(this),
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function () { $(".lbtn").show(); $(".nlbtn").hide(); },
      success: function (response) {
        if (response.error) {
          $.each(response.message, function (i) {
            $.toast({
              text: '<h6 style="color: #fff; font-size: 13px;"><i class="fa fa-exclamation-circle "></i> ' + response.message[i] + '</h6>',
              showHideTransition: 'slide',
              bgColor: '#b92020',
              textColor: '#eee',
              allowToastClose: false,
              hideAfter: 5000,
              stack: 15,
              textAlign: 'left',
              position: 'top-right'
            });
          });
        }
        else {
          $('#crud-edit-form')[0].reset();
          $.toast({
            text: '<h6 style="color: #fff;"><i class="fa fa-check "></i> ' + response.message + '</h6>',
            showHideTransition: 'slide',
            bgColor: 'green',
            textColor: '#eee',
            allowToastClose: false,
            hideAfter: 5000,
            stack: 5,
            textAlign: 'left',
            position: 'top-right'
          });
          $('#edit-modal').modal('hide');
          loadlist();
        }
        setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
      }
    });
  });

  //delete client
  $('#crud-delete-form').submit(function (e) {
    e.preventDefault();
    // $.blockUI({ overlayCSS: { backgroundColor: '#fff' } });
    $.ajax({
      type: 'POST',
      url: '../controller/CrudController.php',
      data: new FormData(this),
      processData: false,
      contentType: false,
      dataType: 'json',
      success: function (response) {
        if (response.error) {
          $.toast({
            text: '<h6 style="color: #fff; font-size: 13px;"><i class="fa fa-exclamation-circle "></i> ' + response.message + '</h6>',
            showHideTransition: 'slide',
            bgColor: '#b92020',
            textColor: '#eee',
            allowToastClose: false,
            hideAfter: 5000,
            stack: 15,
            textAlign: 'left',
            position: 'top-right'
          });
        }
        else {
          $('#delete-modal').modal('hide');
          $.toast({
            text: '<h6 style="color: #fff;"><i class="fa fa-check "></i> ' + response.message + '</h6>',
            showHideTransition: 'slide',
            bgColor: 'green',
            textColor: '#eee',
            allowToastClose: false,
            hideAfter: 5000,
            stack: 5,
            textAlign: 'left',
            position: 'top-right'
          });
          loadlist();

        }
        // $.unblockUI();
      }
    });
  });

});

function editModal(id) {
  $('.cid').val(id);
  getItem(id);
  $('#edit-modal').modal('show');
}
function deleteModal(id) {
  $('.cid').val(id);
  $('#delete-modal').modal('show');
}

$(document).ready(function () {
  $('#crud-table').DataTable();
});




function loadlist() {

  $('#crud-table').DataTable({
    "processing": true,
    "ordering": false,
    destroy: true,
    'ajax': {
      'url': '../controller/CrudController.php',
      "type": "POST",
      "data": {
        action: '4'
      }
    },
    "autoWidth": false,
    "columns": [
      { data: 'firstname' },
      { data: 'lastname' },
      { data: 'email' },
      { data: 'phone' },
      { data: 'address' },
      { data: 'status' ,
        render: function (data, type) {
        if (type === 'display' & data === 1) {
          return `<p style="color:green; font-weight:bold;">Active</p>`;
        } else {
          return `<p style="color:red; font-weight:bold;">InActive</p>`;
        }
        return data;
      }
    },
      { data: 'created_at' },
      
      {
        data: 'id',
        render: function (data, type) {
          if (type === 'display') {
            return `<a class="btn btn-sm btn-warning text-white" title="Edit" onclick="editModal('` + data + `')"><i class="fa fa-edit"></i>Edith</a> 
                    <a class="btn btn-sm btn-danger text-white" title="Delete" onclick="deleteModal('` + data + `')"><i class="fa fa-trash"></i>Delete</a>`;
          }
          return data;
        }
      },

    ]
  });
}

function getItem(id) {
  $.ajax({
    type: 'POST',
    url: '../controller/CrudController.php',
    data: {
      id: id,
      action: '5'
    },
    dataType: 'json',
    success: function (response) {
      $('#id-edit').val(id);
      $('#firstname-edit').val(response.firstname);      
      $('#lastname-edit').val(response.lastname);
      $('#email-edit').val(response.email);
      $('#phone-edit').val(response.phone);
      $('#address-edit').val(response.address);
      $('#status-edit').val(response.status);
    }
  });
}



