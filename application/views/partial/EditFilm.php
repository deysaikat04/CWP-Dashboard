<div class="content-wrapper dashboard_wrapper"><!-- Main content -->
    <!-- Content area -->
    <div class="row pt-10">
        <div class="col-md-10 col-md-offset-1">
            <?php if($this->session->flashdata('filmUpdateFailed')){ ?>
                <div class="alert alert-danger no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <div class="alert_wrapper">
                        <span class="text-semibold"> Opps! </span><?php echo $this->session->flashdata('filmUpdateFailed'); ?></div>
                    <!--                            Name of the Vehicle and Vehicle Description should not be empty.-->
                </div>
            <?php }?>
            <?php if($this->session->flashdata('filmUpdateSuccess')){ ?>
                <div class="alert alert-success no-border">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <div class="alert_wrapper">
                        <span class="text-semibold">Well done!  </span> <?php echo $this->session->flashdata('filmUpdateSuccess');?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="content">
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Edit Film</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <?php if($video){
                foreach ($video as $row) {?>
                <form action="<?php echo base_url(); ?>FormController/editVideo" method="POST">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="panel panel-flat border-bottom-info">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Add Details</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Film Title</label><span class="text-danger"> *</span>
                                            <input type="hidden" name="id" hidden value="<?php echo $row['id']?>">
                                            <input  type="text"
                                                    class="form-control"
                                                    name="title"
                                                    placeholder="Enter Film Title Here"
                                                    value="<?php echo $row['title']?>"
                                                    required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Video Link</label><span class="text-danger"> *</span>
                                            <input  type="text"
                                                    class="form-control"
                                                    name="link"
                                                    placeholder="Enter Video Link"
                                                    value="<?php echo $row['link']?>"
                                                    required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <div class="control-label">
                                            <p class="control-label">Film Details</p>
                                            <textarea rows="3"
                                                      cols="3"
                                                      maxlength="450"
                                                      class="form-control maxlength-textarea"
                                                      placeholder="Say something about the film"
                                                      name="details"><?php echo $row['details']?></textarea>
                                        </div>
                                    </div>
                                </div>

                                    <div class="col-md-12 text-right mt-20">
                                        <button type="submit" class="btn btn-success btn-raised ">
                                            <i class="icon-floppy-disk position-left"></i> Save</button>
                                    </div>
                            </div>
                        </div><!-- col md 12 -->

                    </div> <!-- Main panel body ends -->
                </form>
                <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>