<div class="content-wrapper dashboard_wrapper"><!-- Main content -->
    <div class="content"><!-- Content area -->
        <div class="row pt-10">
            <div class="col-md-10 col-md-offset-1">
                <?php if ($this->session->flashdata('filmDataInsertFailed')) { ?>
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper">
                            <span class="text-semibold"> Opps! </span><?php echo $this->session->flashdata('filmDataInsertFailed'); ?>
                        </div>
                        <!--                            Name of the Vehicle and Vehicle Description should not be empty.-->
                    </div>
                <?php } ?>
                <?php if ($this->session->flashdata('filmDataInsertSuccess')) { ?>
                    <div class="alert alert-success no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper">
                            <span class="text-semibold">Well done!  </span> <?php echo $this->session->flashdata('filmDataInsertSuccess'); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Flims</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <form action="<?php echo base_url(); ?>FormController/addVideo" method="POST">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="panel panel-flat border-bottom-info">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Add Details</h6>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Film Title</label><span
                                                    class="text-danger"> *</span>
                                            <input type="text"
                                                   class="form-control"
                                                   name="title"
                                                   placeholder="Enter Film Title Here"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Video Link</label><span
                                                    class="text-danger"> *</span>
                                            <input type="text"
                                                   class="form-control"
                                                   name="link"
                                                   placeholder="Enter Video Link"
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
                                                          name="details"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-right mt-20">
                                        <button type="submit" class="btn btn-success btn-raised "><i
                                                    class="icon-floppy-disk position-left"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div><!-- col md 12 -->

                        </div> <!-- Main panel body ends -->
                </form>

            </div>
        </div>
        <div class="row">
            <?php if ($videos) { ?>
                <?php foreach ($videos as $video) { ?>
                    <div class="col-md-4">
                        <!-- Youtube -->
                        <div class="panel panel-info panel-bordered">
                            <div class="panel-heading">
                                <h5 class="panel-title text-thin text-center"><?php echo $video['title']; ?></h5>
                            </div>

                            <div class="panel-body">
                                <div class="content-group-lg">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="<?php echo $video['link']; ?>"
                                                frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <p><?php echo $video['details']; ?></p>
                            </div>
                            <div class="panel-footer"><a class="heading-elements-toggle"><i class="icon-more"></i></a>
                                <div class="heading-elements text-center">
                                    <a href="<?php echo base_url() . 'Dashboard/EditFilm/' . $video['id']; ?>"
                                       class="btn btn-info btn-icon"><i class="icon-file-plus"></i></a>
                                    <a href="<?php echo base_url() . 'FormController/removeFilm/' . $video['id']; ?>"
                                       class="btn btn-danger btn-icon"><i class="icon-trash"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /youtube -->
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>
