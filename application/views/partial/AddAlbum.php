<div class="content-wrapper"><!-- Main content -->
    <!-- Content area -->
    <div class="content">
        <!--Notification Area-->
        <div class="row pt-10">
            <?php if ($this->session->flashdata('addAlbumSucc')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-success no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Success!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('addAlbumSucc'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('addFromValErr')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Oh snap1!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('addFromValErr'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('addAlbumErr')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Oh snap!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('addAlbumErr'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('cvrImageNotFound')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Oh snap!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('cvrImageNotFound'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('errUploadCoverImg')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Failed!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('errUploadCoverImg'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('errInsertCoverImg')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span class="text-semibold">Opps!&nbsp;&nbsp;</span>
                            <?php echo $this->session->flashdata('errInsertCoverImg'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('errAlbumImg')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Failed!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('errAlbumImg'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('errAlbumInsertImg')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Opps!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('errAlbumInsertImg'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            
            <?php if ($this->session->flashdata('coverResErr')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span>
                        </button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Opps!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('coverResErr'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--Notification Area Ends-->

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Add Album</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <form action="<?php echo base_url(); ?>FormController/addAlbum" method="POST"
                      enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="panel panel-flat border-bottom-info">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Add Basic Details</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Name of the Album</label><span
                                                    class="text-danger"> *</span>
                                            <input type="text"
                                                   class="form-control"
                                                   name="albumName"
                                                   placeholder="Name of the Album"
                                                   maxlength="30"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Album Type</label><span class="text-danger"> *</span>
                                            <select name="category" class="selectpicker" data-width="100%" required>
                                                <option value="0">Select a Category</option>
                                                <?php foreach (unserialize(PCATEGORY) as $cats) { ?>
                                                    <option value="<?php echo $cats['id']; ?>"><?php echo $cats['name']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- col md 12 -->
                        <div class="col-md-12">
                            <div class="panel panel-flat border-bottom-info">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Add Cover photo.</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="file"
                                               name="coverImage"
                                               id="file-input-cover"
                                               
                                               data-show-caption="true"
                                               data-main-class="input-group-lg"
                                               
                                               required>
                                        <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only and resolution should be <code>1:1</code>.</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- col md 12 -->
                        <div class="col-md-12">
                            <div class="panel panel-flat  border-bottom-info">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Add other photos.</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <input type="file"
                                               multiple="multiple"
                                               name="portfolioImage[]"
                                               id="file-input-portfolio"
                                               class="file-input"
                                               data-show-caption="true"
                                               data-main-class="input-group-lg"
                                               required>
                                        <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                    </div>
                                </div>
                            </div>
                        </div><!-- col md 12 -->

                        <div class="col-md-12 text-center mt-20">
                            <button type="submit" class="btn btn-success btn-raised "><i
                                        class="icon-folder-upload3 position-left"></i> Save
                            </button>
                        </div>
                    </div> <!-- Main panel body ends -->
                </form>

            </div><!--  panel panel-flat ends-->
        </div>
    </div>
</div>