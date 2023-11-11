$(function () {
    //add client
    $('#admin-add-form').submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '../controller/m_adminController.php',
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
            $('#admin-add-form')[0].reset();
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
        }
          setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
      }
      
      
      });
    });
  
    //edit client
    $('#admin-edit-form').submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '../controller/m_adminController.php',
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
              $('#admin-edit-form')[0].reset();
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
          }
          setInterval(function () { $(".nlbtn").show(); $(".lbtn").hide(); }, 1500);
      }
      });
    });
  
    //delete client
    $('#admin-delete-form').submit(function (e) {
      e.preventDefault();
      $.ajax({
        type: 'POST',
        url: '../controller/m_adminController.php',
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
              $('#admin-delete-form')[0].reset();
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
        'url': '../controller/m_adminController.php',
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
      
        { data: 'username' },
        { data: 'role' },
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
      url: '../controller/m_adminController.php', 
      data: {
        id: id,
        action: '5'
      },
      dataType: 'json',
      success: function (response) {
        $('#id-edit').val(id);
        $('#username-edit').val(response.username);      
        $('#role-edit').val(response.role);
      }
    });
  }
  
  
  
  function updateClientCount() {
    $.ajax({
        type: 'POST',
        url: '../controller/m_adminController.php',
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
  
  
  
  
  
  