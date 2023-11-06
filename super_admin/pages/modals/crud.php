<!-- Add  client-->
<div class="modal fade" id="add-modal" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><b><span>Add Client</span></b></h4>
        <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <form class="form-horizontal" id="crud-add-form">
        <div class="modal-body">
          <input type="hidden" name="action" value="1">
          <div class="form-group">
            <label for="name" class="col-sm-12">First Name</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Last Name</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Email</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="email" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Phone</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Address</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="address" name="address" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Status</label>

            <div class="col-sm-12">
              <select class="form-control" name="status" id="status">
                <option  value="-1" disabled selected>Choose a status</option>
                <option style="color:red;" value="0">InActive</option>
                <option style="color:green;" value="1">Active</option>
              </select>
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
        <h4 class="modal-title"><b><span>Edit Client</span></b></h4>
        <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <form class="form-horizontal" id="crud-edit-form">
        <div class="modal-body">
          <input type="hidden" name="action" value="2">
          <input type="hidden" name="id" id="id-edit">

          <div class="form-group">
            <label for="name" class="col-sm-12">First Name</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="firstname-edit" name="firstname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Last Name</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="lastname-edit" name="lastname" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Email</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="email-edit" name="email" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Phone</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="phone-edit" name="phone" required>
            </div>
          </div>
          <div class="form-group">
            <label for="name" class="col-sm-12">Address</label>

            <div class="col-sm-12">
              <input type="text" class="form-control" id="address-edit" name="address" required>
            </div><br>

            <div class="form-group">
              <label for="name" class="col-sm-12">Status</label>

              <div class="col-sm-12">
                <select class="form-control" id="status-edit" name="status">
                  <option  value="-1"  disabled selected>Choose a status</option>
                  <option style="color:red;" value="0">InActive</option>
                  <option style="color:green;" value="1">Active</option>
                </select>
              </div>
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
        <form class="form-horizontal" id="crud-delete-form">
          <input type="hidden" name="action" value="3">
          <input type="hidden" class="cid" name="id">
          <div class="text-center">
            <h6 class="text-warning">Are you sure you want to delete this client?</h6>
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

