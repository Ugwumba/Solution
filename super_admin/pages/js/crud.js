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
                toastr.error('<h6 style="color:red; font-size: 16px; padding:20px;"><i class="fa fa-exclamation-circle"></i> ' + response.message[i] + '</h6>', '', {
                    closeButton: false,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    tapToDismiss: false,
                    backgroundColor: '#b92020', // Red background color
                    textColor: '#fff', // White text color
                });
            });
        } else {
          $('#crud-add-form')[0].reset();
          toastr.success('<h6 style="color:green; font-size: 16px; padding:20px;"><i class="fa fa-check"></i> ' + response.message + '</h6>', '',  {
              closeButton: false,
              timeOut: 5000,
              positionClass: 'toast-top-right',
              tapToDismiss: false,
              backgroundColor: '#00ff00', // Green background color
              textColor: '#fff', // White text color
          });
          $('#add-modal').modal('hide');
          loadlist();
          loadphone();
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
      beforeSend: function ()  { $(".lbtn").show(); $(".nlbtn").hide(); },
      success: function (response) {
        if (response.error) {
            $.each(response.message, function (i) {
                toastr.error('<h6 style="color:red; font-size: 16px; padding:20px;"><i class="fa fa-exclamation-circle"></i> ' + response.message[i] + '</h6>', '', {
                    closeButton: false,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    tapToDismiss: false,
                    backgroundColor: '#b92020', // Red background color
                    textColor: '#fff', // White text color
                });
            });
        } else {
            $('#crud-edit-form')[0].reset();
            toastr.success('<h6 style="color:green; font-size: 16px; padding:20px;"><i class="fa fa-check"></i> ' + response.message + '</h6>', '',  {
                closeButton: false,
                timeOut: 5000,
                positionClass: 'toast-top-right',
                tapToDismiss: false,
                backgroundColor: '#00ff00', // Green background color
                textColor: '#fff', // White text color
            });
            $('#edit-modal').modal('hide');
            loadlist();
            loadphone();
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
            $.each(response.message, function (i) {
                toastr.error('<h6 style=" color:red; font-size: 16px;  padding:20px;"><i class="fa fa-exclamation-circle"></i> ' + response.message[i] + '</h6>', '', {
                    closeButton: false,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    tapToDismiss: false,
                    backgroundColor: '#b92020', // Red background color
                    textColor: '#fff', // White text color
                });
            });
        } else {
            $('#crud-delete-form')[0].reset();
            toastr.success('<h6 style=" color:green; font-size: 16px;  padding:20px;"><i class="fa fa-check"></i> ' + response.message + '</h6>', '',  {
                closeButton: false,
                timeOut: 5000,
                positionClass: 'toast-top-right',
                tapToDismiss: false,
                backgroundColor: '#00ff00', // Green background color
                textColor: '#fff', // White text color
            });
            $('#delete-modal').modal('hide');
            loadlist();
            loadphone();
        }
        setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
    }
    });
  });

   //edit clients with same phone number
   $('#crud-editphone-form').submit(function (e) {
    e.preventDefault();
    $.ajax({
      type: 'POST',
      url: '../controller/CrudController.php',
      data: new FormData(this),
      processData: false,
      contentType: false,
      dataType: 'json',
      beforeSend: function ()  { $(".lbtn").show(); $(".nlbtn").hide(); },
      success: function (response) {
        if (response.error) {
            $.each(response.message, function (i) {
                toastr.error('<h6 style="color:red; font-size: 16px; padding:20px;"><i class="fa fa-exclamation-circle"></i> ' + response.message[i] + '</h6>', '', {
                    closeButton: false,
                    timeOut: 5000,
                    positionClass: 'toast-top-right',
                    tapToDismiss: false,
                    backgroundColor: '#b92020', // Red background color
                    textColor: '#fff', // White text color
                });
            });
        } else {
            $('#crud-edit-form')[0].reset();
            toastr.success('<h6 style="color:green; font-size: 16px; padding:20px;"><i class="fa fa-check"></i> ' + response.message + '</h6>', '',  {
                closeButton: false,
                timeOut: 5000,
                positionClass: 'toast-top-right',
                tapToDismiss: false,
                backgroundColor: '#00ff00', // Green background color
                textColor: '#fff', // White text color
            });
            $('#editphone-modal').modal('hide');
            loadphone();
        }
        setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
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

function editphoneModal(id) {
  $('.cid').val(id);
  getItem(id);
  $('#editphone-modal').modal('show');
}

$(document).ready(function () {
  $('#crud-table').DataTable();
});




function loadlist() {
  $('#crud-table').DataTable({
    "processing": true,
    "ordering": true, // Enable sorting
    "order": [[0, "asc"]], // Sort by the first column (id) in ascending order
    "destroy": true,
    'ajax': {
      'url': '../controller/CrudController.php',
      "type": "POST",
      "data": {
        action: '4'
      }
    },
    "autoWidth": false,
    "columns": [
      {
        data: null,
        render: function (data, type, row, meta) {
          if (type === 'display') {
            return meta.row + 1;
          }
          return meta.row + 1;
        }
      },
      { data: 'firstname' },
      { data: 'lastname' },
      { data: 'email' },
      { data: 'phone' },
      { data: 'address' },
      { data: 'status' ,
        render: function (data, type) {
          if (type === 'display' && data === 1) {
            return `<p style="color:green; font-weight:bold;">Active</p>`;
          } 
          if (data === 0){
            return '<p style="color:red; font-weight:bold;">InActive</p>';
          }
          return data;
        }
      },
      { data: 'created_at' },
      {
        data: 'id',
        render: function (data, type) {
          // Check the user's role (role2Value) here
          if (type === 'display') {
            var role2Value = document.getElementById('role2').value;
            if (role2Value === 'super_admin') {
              return `<a class="btn btn-sm btn-warning text-white" title="Edit" onclick="editModal('` + data + `')"><i class="fa fa-edit"></i>Edit</a><a class="btn btn-sm btn-danger text-white" title="Delete" onclick="deleteModal('` + data + `')"><i class="fa fa-trash"></i>Delete</a>`;
            }
            if (role2Value === 'sub_admin') {
              return `<a class="btn btn-sm btn-warning text-white" title="Edit" onclick="editModal('` + data + `')"><i class="fa fa-edit"></i>Edit</a>`;
            }
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

      // Set the "status" field here
      $('#status-edit').val(response.status); // Assuming response.status is 0 or 1
    }
  });
}





//fetch the clients with the same phone numbers
function loadphone() {
  $('#phone-table').DataTable({
    "processing": true,
    "ordering": true, // Enable sorting
    "order": [[0, "asc"]], // Sort by the first column (id) in descending order
    "destroy": true,
    'ajax': {
      'url': '../controller/CrudController.php',
      "type": "POST",
      "data": {
        action: '8'
      }
    },
    "autoWidth": false,
    "columns": [
      {
        data: null,
        render: function (data, type, row, meta) {
            if (type === 'display') {
                return meta.row + 1;
            }
            return meta.row + 1;
        }
    },
      { data: 'firstname' },
      { data: 'phone' },
    ]
  });
}


function updateClientCount() {
  $.ajax({
      type: 'POST',
      url: '../controller/CrudController.php',
      data: { action: '6' }, 
      dataType: 'json',
      success: function (response) {
          if (response.clientCount !== undefined) {
              $('#clientCount').text(response.clientCount); // Update the client count
          }
      }
  });
}

// Call the function to update the client count when the page loads
updateClientCount();






