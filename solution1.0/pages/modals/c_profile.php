<!-- Edit client profile-->
<div class="modal fade" id="profile-edit-modal" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b><span>Edit Profile</span></b></h4>
                <a href="javascript:void(0);" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
            <form class="form-horizontal" id="profile-edit-form">
                <div class="modal-body">
                    <input type="hidden" name="action" value="13">
                    <input type="hidden" name="id" id="id-edit">
                    <div class="form-group">
                        <label for="name" class="col-sm-12">About</label>

                        <div class="col-sm-12">
                            <textarea  style="border:1px solid black;" class="form-control" id="aboutprofile-edit" name="about" required>
                           </textarea>
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