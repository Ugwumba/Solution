<!-- Add  client-->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span>Add Admin</span></b></h4>
        <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <form class="form-horizontal" id="admin-add-form" method="POST">
        <div class="modal-body">
          <input type="hidden" name="action" value="1">
          <div class="form-group">
            <label for="name" class="col-sm-12">Username</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-sm-12">Password</label>

            <div class="col-sm-12">
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Role</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="role" name="role" required>
            </div>
          </div>
        </div><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat nlbtn" name="add"><i class="fa fa-save"></i> Save</button>
          <button type="button" class="btn btn-primary btn-flat lbtn" style="display: none;" disabled="">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit client-->
<div class="modal fade" id="edit-modal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span>Edit Admin</span></b></h4>
        <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <form class="form-horizontal" id="admin-edit-form" method="POST">
        <div class="modal-body">
          <input type="hidden" name="action" value="2">
          <input type="hidden" name="id" id="id-edit">

          <div class="form-group">
            <label for="name" class="col-sm-12">Username</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="username-edit" name="username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Role</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="role-edit" name="role" required>
            </div>
          </div>
        </div><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat nlbtn" name="add"><i class="fa fa-save"></i> Save</button>
          <button type="button" class="btn btn-primary btn-flat lbtn" style="display: none;" disabled="">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
            Save
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete client-->
<div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span>Delete</span></b></h4>
        <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" id="admin-delete-form">
          <input type="hidden" name="action" value="3">
          <input type="hidden" class="cid" name="id">
          <div class="text-center">
            <h6 class="text-warning">Are you sure you want to delete this Admin?</h6>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-flat pull-left" data-bs-dismiss="modal"><i class="fa fa-close"></i> Close</button>
        <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

