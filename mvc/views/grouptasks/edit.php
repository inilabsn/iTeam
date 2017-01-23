 <section class="content-header">

    <h1>

        <?=$this->lang->line('panel_title')?>

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

                    <h3 class="box-title">Project form</h3>

                </div><!-- /.box-header -->

                <div class="box-body">

                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group <?php if(form_error('group_name')) echo "has-error"?>">
                            <label for="group_name" class="col-sm-2 control-label">
                                <?=$this->lang->line("grouptasks_gname")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="group_name" name="group_name" value="<?=set_value('group_name', $grouptask->group_name)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('group_name'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('date')) echo "has-error"?>">
                            <label for="date" class="col-sm-2 control-label">
                                <?=$this->lang->line("grouptasks_date")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', $grouptask->date)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('date'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('tasks')) echo "has-error"?>">
                            <label for="tasks" class="col-sm-2 control-label">
                                <?=$this->lang->line('grouptasks_tasks')?>
                            </label>
                            <div class="col-sm-5">
                                <?php
                                    $option = array(); 
                                    $select_ar = array();
                                    foreach ($tasks as $task) {
                                        $option[$task->task_id] = $task->task_title;
                                    }
                                    foreach ($ctasks as $ctask) {
                                        $select_ar[$ctask->tasksID] = $ctask->tasksID;
                                    }
                                    echo form_multiselect('tasks[]', $option, $select_ar, 'class="form-control"');
                                ?>
                            </div>
                            <span class="col-sm-4 control-label" id="userID_error">
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('description')) echo "has-error"?>">
                            <label for="description" class="col-sm-2 control-label">
                                <?=$this->lang->line("grouptasks_description")?>
                            </label>
                            <div class="col-sm-5">
                                <textarea class="form-control textarea" placeholder="Enter ..." rows="3" id="description" name="description"><?=set_value('description', $grouptask->description)?></textarea>
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('description'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_group_task")?>" >
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
    $('#date').datepicker({ dateFormat : "yyyy-mm-dd" });
    $("#grouptasks").addClass("active");
</script>

