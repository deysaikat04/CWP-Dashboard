<div class="content-wrapper"><!-- Main content -->
    <!-- Content area -->
    <div class="content">
        <!--Notification Area-->
        <div class="row pt-10">
            <?php if ($this->session->flashdata('portfolioDataInsertSuccess')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-success no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Success!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('portfolioDataInsertSuccess'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('portfolioDataInsertFailed')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Oh snap!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('portfolioDataInsertFailed'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('imageNotFound')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Failed!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('imageNotFound'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('imageInsertFailed')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span class="text-semibold">Opps!&nbsp;&nbsp;</span>
                            <?php echo $this->session->flashdata('imageInsertFailed'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('portfolioImageDeleteSuccess')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-info no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Success!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('portfolioImageDeleteSuccess'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->flashdata('portfolioImageDeleteFailed')) { ?>
                <div class="col-md-offset-1 col-md-10">
                    <div class="alert alert-danger no-border">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span
                                    class="sr-only">Close</span></button>
                        <div class="alert_wrapper"><span
                                    class="text-semibold">Opps!&nbsp;&nbsp;</span> <?php echo $this->session->flashdata('portfolioImageDeleteFailed'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <!--Notification Area Ends-->
        <div class="col-md-12">
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Portfolio</h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="collapse"></a></li>
                            <li><a data-action="reload"></a></li>
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
                            <li class="active"><a href="#colored-rounded-justified-tab1" data-toggle="tab">Pre
                                    Wedding</a></li>
                            <li><a href="#colored-rounded-justified-tab2" data-toggle="tab">Wedding</a></li>
                            <li><a href="#colored-rounded-justified-tab3" data-toggle="tab">Post Wedding</a></li>
                            <li><a href="#colored-rounded-justified-tab4" data-toggle="tab">Baby</a></li>
                            <li><a href="#colored-rounded-justified-tab5" data-toggle="tab">Lifestyle</a></li>
                        </ul>

                        <div class="tab-content">
                            <!--                    Tab one               -->
                            <div class="tab-pane active" id="colored-rounded-justified-tab1">
                                <div class="col-md-12">
                                    <div class="panel panel-flat border-top-info border-bottom-info">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Add new photos under this category.</h6>
                                        </div>

                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>FormController/addPortfolioImage"
                                                  method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="category" value="PreWedding"
                                                       hidden>
                                                <div class="form-group">
                                                    <input type="file"
                                                           multiple="multiple"
                                                           name="portfolioImage[]"
                                                           id="file-input-portfolio"
                                                           class="file-input"
                                                           data-show-caption="true"
                                                           data-main-class="input-group-lg"/>
                                                    <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-raised pull-right"><i
                                                            class="icon-folder-upload3 position-left"></i> Upload
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $img) { ?>
                                            <?php if ($img['category'] == "PreWedding") { ?>
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . $img['path']; ?>" alt="">
                                                            <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url() . $img['path']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"
                                                           data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                                        <a href="<?php echo base_url(); ?>FormController/removePortfolioImage/<?php echo $img['id']; ?>/<?php echo $img['file_name']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"><i
                                                                    class="icon-trash"></i></a>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                    Tab one End             -->
                            <!--                    Tab Two               -->

                            <div class="tab-pane" id="colored-rounded-justified-tab2">
                                <div class="col-md-12">
                                    <div class="panel panel-flat border-top-info border-bottom-info">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Add new photos under this category.</h6>
                                        </div>

                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>FormController/addPortfolioImage"
                                                  method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="category" value="Wedding" hidden>
                                                <div class="form-group">
                                                    <input type="file"
                                                           multiple="multiple"
                                                           name="portfolioImage[]"
                                                           class="file-input"
                                                           data-show-caption="true"
                                                           data-main-class="input-group-lg"/>
                                                    <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-raised pull-right"><i
                                                            class="icon-folder-upload3 position-left"></i> Upload
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $img) { ?>
                                            <?php if ($img['category'] == "Wedding") { ?>
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . $img['path']; ?>" alt="">
                                                            <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url() . $img['path']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"
                                                           data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                                        <a href="<?php echo base_url(); ?>FormController/removePortfolioImage/<?php echo $img['id']; ?>/<?php echo $img['file_name']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"><i
                                                                    class="icon-trash"></i></a>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                    Tab Two Ends              -->
                            <!--                    Tab Three              -->

                            <div class="tab-pane" id="colored-rounded-justified-tab3">
                                <div class="col-md-12">
                                    <div class="panel panel-flat border-top-info border-bottom-info">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Add new photos under this category.</h6>
                                        </div>

                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>FormController/addPortfolioImage"
                                                  method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="category" value="PostWedding"
                                                       hidden>
                                                <div class="form-group">
                                                    <input type="file"
                                                           multiple="multiple"
                                                           name="portfolioImage[]"
                                                           id="file-input-portfolio"
                                                           class="file-input"
                                                           data-show-caption="true"
                                                           data-main-class="input-group-lg"/>
                                                    <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-raised pull-right"><i
                                                            class="icon-folder-upload3 position-left"></i> Upload
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $img) { ?>
                                            <?php if ($img['category'] == "PostWedding") { ?>
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . $img['path']; ?>" alt="">
                                                            <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url() . $img['path']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"
                                                           data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                                        <a href="<?php echo base_url(); ?>FormController/removePortfolioImage/<?php echo $img['id']; ?>/<?php echo $img['file_name']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"><i
                                                                    class="icon-trash"></i></a>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                    Tab Three ends             -->
                            <!--                    Tab Four              -->

                            <div class="tab-pane" id="colored-rounded-justified-tab4">
                                <div class="col-md-12">
                                    <div class="panel panel-flat border-top-info border-bottom-info">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Add new photos under this category.</h6>
                                        </div>

                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>FormController/addPortfolioImage"
                                                  method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="category" value="Baby" hidden>
                                                <div class="form-group">
                                                    <input type="file"
                                                           multiple="multiple"
                                                           name="portfolioImage[]"
                                                           id="file-input-portfolio"
                                                           class="file-input"
                                                           data-show-caption="true"
                                                           data-main-class="input-group-lg"/>
                                                    <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-raised pull-right"><i
                                                            class="icon-folder-upload3 position-left"></i> Upload
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $img) { ?>
                                            <?php if ($img['category'] == "Baby") { ?>
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . $img['path']; ?>" alt="">
                                                            <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url() . $img['path']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"
                                                           data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                                        <a href="<?php echo base_url(); ?>FormController/removePortfolioImage/<?php echo $img['id']; ?>/<?php echo $img['file_name']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"><i
                                                                    class="icon-trash"></i></a>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                    Tab Four Ends             -->
                            <!--                    Tab Five              -->
                            <div class="tab-pane" id="colored-rounded-justified-tab5">
                                <div class="col-md-12">
                                    <div class="panel panel-flat border-top-info border-bottom-info">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Add new photos under this category.</h6>
                                        </div>

                                        <div class="panel-body">
                                            <form action="<?php echo base_url(); ?>FormController/addPortfolioImage"
                                                  method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="category" value="LifeStyle"
                                                       hidden>
                                                <div class="form-group">
                                                    <input type="file"
                                                           multiple="multiple"
                                                           name="portfolioImage[]"
                                                           id="file-input-portfolio"
                                                           class="file-input"
                                                           data-show-caption="true"
                                                           data-main-class="input-group-lg"/>
                                                    <span class="help-block">Upload images under <code>500kb</code> and of <code>.jpg</code>, <code>.png</code> formats only.</span>
                                                </div>
                                                <button type="submit" class="btn btn-danger btn-raised pull-right"><i
                                                            class="icon-folder-upload3 position-left"></i> Upload
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($images) { ?>
                                        <?php foreach ($images as $img) { ?>
                                            <?php if ($img['category'] == "LifeStyle") { ?>
                                                <div class="col-md-3">
                                                    <div class="thumbnail">
                                                        <div class="thumb">
                                                            <img src="<?php echo base_url() . $img['path']; ?>" alt="">
                                                            <div class="caption-overflow">
                                                    <span>
                                                        <a href="<?php echo base_url() . $img['path']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"
                                                           data-popup="lightbox"><i class="icon-zoomin3"></i></a>
                                                        <a href="<?php echo base_url(); ?>FormController/removePortfolioImage/<?php echo $img['id']; ?>/<?php echo $img['file_name']; ?>"
                                                           class="btn btn-flat border-white text-white btn-rounded btn-icon"><i
                                                                    class="icon-trash"></i></a>
                                                    </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <!--                    Tab Five Ends              -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>