 <section class="content-header">

    <h1>

        <?=$this->lang->line('panel_title')?>

    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard/index')?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('main_menu')?></a></li>
        <li class="active"><a href="<?=base_url('timetracker/index')?>">Time Tracker</a></li>
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

                        <div class="form-group <?php if(form_error('project_id')) echo "has-error"?>">
                            <label for="project_id" class="col-sm-2 control-label">
                                <?=$this->lang->line('timetracker_project')?>
                            </label>
                            <div class="col-sm-5">
                                <?php
                                    if(count($projects)) {
                                        foreach ($projects as $project) {
                                            $data[0] = "Select Project";
                                            $data[$project->project_id] = $project->project_title;
                                        }
                                        echo form_dropdown("project_id", $data, set_value("project_id", $set), "id='project_id' class='form-control'");
                                    } else { ?>
                                        
                                    <select id="project_id" name="project_id" class="form-control">
                                    </select>
                                <?php } ?>
                            </div>
                             <span class="col-sm-4 control-label">
                                <?php echo form_error('project_id'); ?>
                            </span>
                        </div>
                        
                        <div class="form-group <?php if(form_error('date')) echo "has-error"?>">
                            <label for="date" class="col-sm-2 control-label">
                                <?=$this->lang->line("timetracker_date")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date')?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('date'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('hour')) echo "has-error"?>">
                            <label for="hour" class="col-sm-2 control-label">
                                <?=$this->lang->line("timetracker_hour")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="hour" name="hour" value="<?=set_value('hour')?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('hour'); ?>
                            </span>
                        </div>

                        <div class="form-group <?php if(form_error('taskID')) echo "has-error"?>">
                            <label for="tasks" class="col-sm-2 control-label">
                                <?=$this->lang->line('timetracker_tasks')?>
                            </label>
                            <div class="col-sm-5">
                                <?php
                                    if(count($tasks)) {
                                        foreach ($tasks as $task) {
                                            $array[0] = "Select Task";
                                            $array[$task->task_id] = $task->task_title;
                                        }
                                        echo form_dropdown("taskID", $array, set_value("taskID"), "id='taskID' class='form-control'");
                                    } else { ?>
                                        
                                    <select id="taskID" name="taskID" class="form-control">
                                    </select>
                                <?php } ?>
                            </div>
                             <span class="col-sm-4 control-label">
                                <?php echo form_error('taskID'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_timetracker")?>" >
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
    $("#timetracker").addClass("active");

    $('#project_id').change(function() {
        var project_id = $(this).val();
        if(project_id == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('timetracker/task_list')?>",
                data: "id=" + project_id,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>

