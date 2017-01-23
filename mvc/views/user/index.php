 <section class="content-header">
    <h1>
        <?=$this->lang->line('panel_title')?>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard/index')?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('main_menu')?></a></li>
        <li class="active"><a href="<?=base_url('user/index')?>"><?=$this->lang->line('page_menu')?></a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php 
                $usertype = $this->session->userdata("usertype");
                if($usertype == "Admin"){
            ?>
            <div class="box box-info">
                <div class="box-header">
                    <h6 class="box-title">
                        <a href="<?php echo base_url('user/add') ?>">
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
                                <th><?=$this->lang->line('user_photo')?></th>
                                <th><?=$this->lang->line('user_name')?></th>
                                <th><?=$this->lang->line('user_email')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($users)) {$i = 1; foreach($users as $user) { ?>
                                <tr>
                                    <td class="col-lg-1" data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="col-lg-2" data-title="<?=$this->lang->line('user_photo')?>">
                                        <?php $array = array(
                                            "src" => base_url('uploads/images/'.$user->photo),
                                            'width' => '35px',
                                            'height' => '35px',
                                            'class' => 'img-rounded'
                                        );
                                        echo img($array); 
                                        ?>
                                    </td>
                                    <td class="col-lg-3" data-title="<?=$this->lang->line('user_name')?>">
                                        <?php echo $user->name; ?>
                                    </td>
                                    <td class="col-lg-3" data-title="<?=$this->lang->line('user_email')?>">
                                        <?php echo $user->email; ?>
                                    </td>
                                    <td class="col-lg-3 action" data-title='Action'>
                                        <?php echo btn_view('user/view/'.$user->userID, '') ?>
                                        <?php echo btn_edit('user/edit/'.$user->userID, '') ?>
                                        <?php echo btn_delete('user/delete/'.$user->userID, '') ?>
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
    $("#user").addClass("active");
</script>







