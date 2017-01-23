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
            <?php 
                $usertype = $this->session->userdata("usertype");
                if($usertype){
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <h6 class="box-title">
                        <a href="<?php echo base_url('project/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h6>
                </div><!-- /.box-header -->
                <div id="hide-table" class="box-body table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('project_title')?></th>
                                <th><?=$this->lang->line('project_create_date')?></th>
                                <th><?=$this->lang->line('project_deadline')?></th>
                                <th><?=$this->lang->line('project_hour')?></th>
                                <th><?=$this->lang->line('project_progress')?></th>
                                <th><?=$this->lang->line('project_status')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($projects)) {$i = 1; $count = 0; $task_com = 0;
                                foreach($projects as $project) { 
                                    foreach ($tasks as $task) {

                                        if ($project->project_id == $task->project_id) {
                                            $count++;
                                            if ($task->status==1) {
                                                $task_com++;
                                            }
                                        }

                                    }
                                    if ($count!=0) {
                                       $percentage = ceil((100/$count)*$task_com);
                                        $count=0;
                                        $task_com = 0; 
                                    } else {
                                        $percentage = 0;
                                    }                                    
                            ?>

                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('project_title')?>">
                                        <a href="<?=base_url('project/view/'.$project->project_id)?>">
                                        <?php 
                                            if(strlen($project->project_title) > 40)
                                                echo substr($project->project_title, 0, 40)."...";
                                            else 
                                                echo substr($project->project_title, 0, 40);
                                        ?>
                                        </a>
                                    </td>
                                    <td data-title="<?=$this->lang->line('project_deadline')?>">
                                        <?php echo $project->project_create_date; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('project_deadline')?>">
                                        <?php echo $project->project_deadline; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('project_deadline')?>">
                                        <?php echo $project->time; ?> Hours
                                    </td>
                                    <td class="col-md-2" data-title="<?=$this->lang->line('project_progress')?>">
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" style="width: <?php echo $percentage; ?>%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="<?php echo $project->project_percentage; ?>" role="progressbar">

                                            <span class=""><?php echo $percentage; ?>%</span>
                                            </div>
                                        </div>                                   
                                    </td>
                                    <td class="text-center" data-title="<?=$this->lang->line('project_status')?>">
                                        <small class="text-center badge bg-aqua">
                                            <?php echo $project->project_status; ?>
                                        </small>                                        
                                    </td>
                                    <td action="" data-title='Action'>
                                        <?php echo btn_view('project/view/'.$project->project_id, '') ?>
                                        <?php echo btn_edit('project/edit/'.$project->project_id, '') ?>
                                        <?php echo btn_custom('timetracker/add/'.$project->project_id, '') ?>
                                        <?php echo btn_delete('project/delete/'.$project->project_id, '') ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php } ?>
        </div>
    </div>
</section><!-- /.content -->

<!-- adding active class at menu item -->
<script>
    $("#project").addClass("active");
</script>



