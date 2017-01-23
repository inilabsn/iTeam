<section class="content-header">
    <h1>
        <?=$this->lang->line('panel_title')?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('main_menu')?></a></li>
        <li class="active"><?=$this->lang->line('page_menu')?> page</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php 
                $usertype = $this->session->userdata("usertype");
                if($usertype){
            ?>
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-text-width"></i>
                                    <h3 class="box-title">Notice Details</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <dl class="dl-horizontal">
                                        <dt>Notice Title</dt>
                                        <dd><?php echo $notice->title; ?></dd>
                                        <dt>Description</dt>
                                        <dd><?php echo $notice->notice; ?></dd>
                                        <dt>Date</dt>
                                        <dd><?php echo $notice->date; ?></dd>                        
                                    </dl>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- ./col -->
                    </div>
                        
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php
                }
            ?>
        </div>
    </div>
</section><!-- /.content -->

<!-- adding active class at menu item -->
<script>
    $("#notice").addClass("active");
</script>


