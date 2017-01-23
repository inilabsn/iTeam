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
            <?php 
                $usertype = $this->session->userdata("usertype");
                if($usertype){
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <h6 class="box-title">
                        <a href="<?php echo base_url('timetracker/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </h6>
                </div><!-- /.box-header -->
                <div id="hide-table" class="box-body table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('timetracker_ttitle')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('timetracker_date')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('timetracker_hour')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($timetrackers)) {$i = 1;
                                foreach ($timetrackers as $timetracker) {                           
                            ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('timetracker_ttitle')?>">
                                        <?=$timetracker->task_title?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('timetracker_date')?>">
                                        <?php echo $timetracker->date; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('timetracker_hour')?>">                         
                                       <?=$timetracker->timehour?>
                                    </td>

                                    <td action="" data-title='Action'>
                                        <?php if ($usertype=="Admin" || $usertype=="Project manager"): ?>                                        
                                            <?php echo btn_edit('timetracker/edit/'.$timetracker->project_id.'/'.$timetracker->timetrackerID, '') ?>
                                        <?php endif ?>
                                        <?php echo btn_delete('timetracker/delete/'.$timetracker->timetrackerID, '') ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php }  ?>
        </div>
    </div>
</section><!-- /.content -->

<!-- adding active class at menu item -->
<script>
    $("#timetracker").addClass("active");
</script>



