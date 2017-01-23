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
                if($usertype == "Admin" || $usertype=="Project manager"){
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <h6 class="box-title">
                        <a href="<?php echo base_url('grouptasks/add') ?>">
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
                                <th><?=$this->lang->line('grouptasks_gname')?></th>
                                <th><?=$this->lang->line('grouptasks_date')?></th>
                                <th><?=$this->lang->line('grouptasks_description')?></th>
                                <th><?=$this->lang->line('grouptasks_status')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($grouptasks)) {$i = 1;
                                foreach ($grouptasks as $grouptask) {                           
                            ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('grouptasks_gname')?>">
                                        <a href="<?=base_url('grouptasks/view/'.$grouptask->grouptasksID)?>">
                                        <?=$grouptask->group_name?>
                                        </a>
                                    </td>
                                    <td data-title="<?=$this->lang->line('grouptasks_date')?>">
                                        <?php echo $grouptask->date; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('grouptasks_description')?>">                         
                                        <?php 
                                            if(strlen($grouptask->description) > 40)
                                                echo substr($grouptask->description, 0, 40)."...";
                                            else 
                                                echo substr($grouptask->description, 0, 40);
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('grouptasks_status')?>">                         
                                        
                                    </td>
                                    <td action="" data-title='Action'>
                                        <?php echo btn_view('grouptasks/view/'.$grouptask->grouptasksID, '') ?>
                                        <?php echo btn_edit('grouptasks/edit/'.$grouptask->grouptasksID, '') ?>
                                        <?php echo btn_delete('grouptasks/delete/'.$grouptask->grouptasksID, '') ?>
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
    $("#grouptasks").addClass("active");
</script>



