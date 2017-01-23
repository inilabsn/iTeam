<section class="content-header">
    <h1>
        <?=$task->task_title?>
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
                        
                        <div class='form-group <?php if(form_error('task_title')) echo "has-error"?>"' > 
                            <label for="title" class="col-sm-2 control-label">
                                Title
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title', $task->task_title)?>" >
                            </div>
                            <span class="col-sm-4 control-label" id="title_error">
                                <?php echo form_error('task_title'); ?>
                            </span>
                        </div>

                        <div class='form-group <?php if(form_error('description')) echo "has-error"?>"'> 
                            <label for="description" class="col-sm-2 control-label">
                                Description
                            </label>
                            <div class="col-sm-5">
                                <textarea class="form-control" id="description" name="description" value="<?=set_value('description')?>" ><?=$task->description?></textarea>                        
                            </div>
                            <span class="col-sm-4 control-label" id="description_error">
                                <?php echo form_error('description'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('users')) echo "has-error"?>">
                            <label for="users" class="col-sm-2 control-label">
                                Select User
                            </label>
                            <div class="col-sm-5">
                                <?php
                                    $option = array(); 
                                    $select_ar = array();
                                    foreach ($users as $user) {
                                        $option[$user->userID] = $user->name;
                                    }
                                    foreach ($task_users as $user) {
                                        $select_ar[$user->user_id] = $user->user_id;
                                    }
                                    echo form_multiselect('users[]', $option, $select_ar, 'class="form-control"');
                                ?>
                            </div>
                            <span class="col-sm-4 control-label" id="userID_error">
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_task")?>" >
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

