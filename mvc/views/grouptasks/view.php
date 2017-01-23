<section class="content-header">
    <h1>
        <?=$this->lang->line('panel_title');?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('main_menu')?></a></li>
        <li class="active"><?=$this->lang->line('page_menu')?> page</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    <?php 
        $usertype = $this->session->userdata("usertype");
        if($usertype){
    ?>
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-body">
                <div class="box box-solid">

                    <div class="box-header">

                        <i class="fa fa-text-width"></i>

                        <h3 class="box-title"><?php echo $grouptasks->group_name ?></h3>
                        <div class="box-tools pull-right">
                            <a class="btn btn-warning btn-sm" href="<?=base_url('grouptasks/edit/'.$grouptasks->grouptasksID);?>">
                                <i class="fa fa-edit"></i>
                            </a>
                        </div>

                    </div><!-- /.box-header -->
                    <div class="box-body">                                
                        <table style="max-width: 400px;" class="table table-striped table-bordered">

                            <tbody>
                                <tr>
                                    <th colspan="2">Group Tasks Details</th>
                                </tr>
                                <tr>
                                    <td><?=$this->lang->line("grouptasks_cdate")?></td>
                                    <td><?php  echo $grouptasks->date; ?></td>
                                </tr>
                                
                                <tr>
                                    <th colspan="2"><?=$this->lang->line("grouptasks_description")?></th>                                            
                                </tr>
                                <tr>                                            
                                    <td colspan="2"><?php  echo $grouptasks->description; ?></td>
                                </tr>
                                <tr>
                                    <td><?=$this->lang->line("grouptasks_status")?></td>
                                    <td>
                                        <?php if($grptask_progress == 100) {
                                           echo "<small class=\"text-center badge\" style=\"background-color:#5cb85c\">Complete</small>";
                                        } else {

                                            echo "<small class=\"text-center badge bg-aqua\">in progress</small>";
                                        }
                                        ?>
                                        <!-- <small class="text-center badge bg-aqua"><?php  echo $grouptasks->grouptasks_status; ?></small> -->
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="2"><?=$this->lang->line("grouptasks_progress")?></th>
                                </tr>
                                <tr>                                            
                                    <td colspan="2" class="text-center">
                                        <input type="text" class="knob" value="<?php  echo $grptask_progress; ?>" data-width="150" data-height="150" data-fgColor="#3c8dbc"/>
                                    </td>
                                </tr>
                            </tbody>    

                        </table>  

                    </div><!-- /.box-body -->
                </div><!-- /.box -->                            
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <i class="ion ion-clipboard"></i>
                <h3 class="box-title">Tasks</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <ul class="todo-list">
                    <?php if (count($alltasks)): ?>
                        <?php foreach ($alltasks as $task): ?>
                            <li class="<?php if($task['task_status']==1){?>done<?php } ?>">
                                <!-- drag handle -->
                                <span class="handle">
                                    <i class="fa fa-ellipsis-v"></i>
                                    <i class="fa fa-ellipsis-v"></i>
                                </span>
                                <!-- todo text -->
                                <span class="text"><?=$task['task_name']?></span>
                                <!-- Emphasis label -->
                                <small class="label <?php if($task['task_status']==1){?>label-success<?php } else {?>label-danger<?php } ?>" data-toggle="tooltip" data-original-title="task_status"><i class="fa fa-clock-o"></i> <?php if($task['task_status']==0){echo "Pending";} else {echo "Complete";}?></small>
                                <!-- General tools such as edit or delete-->
                                                               
                            </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                        </span>
                        <span class="text">No task added yet</span>
                    <?php endif ?>                    
                </ul>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div> 
    
    <?php
        }
    ?>
    </div>
</section><!-- /.content -->
<!-- Task adding module -->

<!-- end task module -->
<!-- adding active class at menu item -->
<script>
    $("#grouptasks").addClass("active");
</script>





