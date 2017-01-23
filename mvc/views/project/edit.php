<section class="content-header">
    <h1>
        <?=$project->project_title?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard/index')?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('main_menu')?></a></li>
        <li class="active"><a href="<?=base_url('project/index')?>"><?=$this->lang->line('page_menu')?></a></li>
    </ol>
</section>



<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title"><?=$this->lang->line('panel_header')?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">

                        <div class="form-group <?php if(form_error('project_title')) echo "has-error"?>">
                            <label for="project_title" class="col-sm-2 control-label">
                                <?=$this->lang->line("project_title")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="project_title" name="project_title" value="<?=set_value('project_title', $project->project_title)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('project_title'); ?>
                            </span>
                        </div>
        
                        <div class="form-group <?php if(form_error('project_create_date')) echo "has-error"?>">
                            <label for="project_create_date" class="col-sm-2 control-label">
                                <?=$this->lang->line("project_create_date")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="project_create_date" name="project_create_date" value="<?=set_value('project_create_date', $project->project_create_date)?>" data-date-format="yyyy-mm-dd">
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('project_create_date'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('project_deadline')) echo "has-error"?>">
                            <label for="project_deadline" class="col-sm-2 control-label">
                                <?=$this->lang->line("project_deadline")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="project_deadline" name="project_deadline" value="<?=set_value('project_deadline', $project->project_deadline)?>" data-date-format="yyyy-mm-dd">
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('project_deadline'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('project_description')) echo "has-error"?>">
                            <label for="project_description" class="col-sm-2 control-label">
                                <?=$this->lang->line("project_description")?>
                            </label>
                            <div class="col-sm-5">
                                <textarea class="form-control textarea" placeholder="Enter ..." rows="3" id="project_description" name="project_description" value="<?=set_value('project_description')?>"><?=$project->project_description?></textarea>
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('project_description'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_project")?>" >
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->



<!-- adding active class at menu item -->

<script>

    $('#project_deadline, #project_create_date').datepicker({ dateFormat : 'yyyy-mm-dd' });

    $("#employer").addClass("active");

</script>

