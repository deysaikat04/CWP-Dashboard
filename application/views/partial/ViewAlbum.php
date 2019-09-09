<div class="content-wrapper"><!-- Main content -->
    <!-- Content area -->
    <div class="content">
        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><span class="text-semibold">My Albums</span> </h4>
                </div>
            </div>
        </div>
        <!-- /page header -->
        <!-- Thumbnail with image and button Albums -->
        <div class="row">
            <?php if($allAlbum) { ?>
                <?php foreach($allAlbum as $img) { ?>
                    <div class="col-sm-4 ">
                        <div class="thumbnail">
                            <div class="thumb">
                                <?php if($img['is_cover'] == 1) { ?>
                                    <img src="<?php echo base_url().$img['path'];?>" alt="">
                                <?php } ?>
                                <div class="caption-overflow">

                                </div>
                            </div>

                            <div class="caption text-center">
                                <h5 class="text-semibold no-margin"><?php echo $img['title'];?></h5>
                                <p class="text-muted mb-15 mt-5">
                                    <?php foreach (unserialize(PCATEGORY) as $cats) {
                                        if($cats['id'] == $img['category']) {?>
                                            <?php echo $cats['name'];?>
                                    <?php  }}?>
                                </p>
                                <span>
                                    <a href="<?php echo base_url()?>Dashboard/EditAlbum/<?php echo $img['album_id'];?>" class="btn bg-orange-400 btn-raised ">
                                         <i class="icon-eraser3"></i></a>
<!--                                    <a href="--><?php //echo base_url()?><!--Dashboard/viewAlbumbyId/--><?php //echo $img['album_id'];?><!--"class="btn btn-danger btn-raised ">Remove</a>-->
                                    <a class="btn btn-danger btn-raised "
                                       id="removeAlbum"
                                       onclick='javascript:confirmationDelete($(this));return false;'
                                       href="<?php echo base_url()?>FormController/removeAlbum/<?php echo $img['album_id'];?>"><i class="icon-trash"></i>
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div> <!-- single thumbnail -->
                <?php } ?>
            <?php } ?>
        </div>
        <!-- /thumbnail with image and button -->
    </div>
</div>
<script>

</script>
