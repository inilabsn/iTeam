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
                        <a href="<?php echo base_url('notice/add') ?>">
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
                                <th><?=$this->lang->line('notice_title')?></th>
                                <th><?=$this->lang->line('notice_notice')?></th>
                                <th><?=$this->lang->line('notice_date')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($notices)) {$i = 1; foreach($notices as $notice) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_title')?>">
                                        <?php 
                                            if(strlen($notice->title) > 40)
                                                echo substr($notice->title, 0, 40)."...";
                                            else 
                                                echo substr($notice->title, 0, 40);
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_notice')?>">
                                        <?php 
                                            if(strlen($notice->notice) > 50)
                                                echo substr($notice->notice, 0, 50)."...";
                                            else 
                                                echo substr($notice->notice, 0, 50);
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('notice_date')?>">
                                        <?php echo $notice->date; ?>
                                    </td>
                                    <td action="" data-title='Action'>
                                        <?php echo btn_view('notice/view/'.$notice->noticeID, '') ?>
                                        <?php echo btn_edit('notice/edit/'.$notice->noticeID, '') ?>
                                        <?php echo btn_delete('notice/delete/'.$notice->noticeID, '') ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
            <?php } else { ?>
            <div class="box box-info">
                <div id="hide-table" class="box-body table-responsive">
                    <table id="dataTable" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('notice_title')?></th>
                                <th><?=$this->lang->line('notice_notice')?></th>
                                <th><?=$this->lang->line('notice_date')?></th>
                                <th><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(count($notices)) {$i = 1; foreach($notices as $notice) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td class="col-lg-3" data-title="<?=$this->lang->line('notice_title')?>">
                                        <?php 
                                            if(strlen($notice->title) > 40)
                                                echo substr($notice->title, 0, 40)."...";
                                            else 
                                                echo substr($notice->title, 0, 40);
                                        ?>
                                    </td>
                                    <td class="col-lg-4" data-title="<?=$this->lang->line('notice_notice')?>">
                                        <?php 
                                            if(strlen($notice->notice) > 50)
                                                echo substr($notice->notice, 0, 50)."...";
                                            else 
                                                echo substr($notice->notice, 0, 50);
                                        ?>
                                    </td>
                                    <td class="col-lg-2" data-title="<?=$this->lang->line('notice_date')?>">
                                        <?php echo $notice->date; ?>
                                    </td>
                                    <td class="col-lg-2 action" data-title='Action'>
                                        <?php echo btn_view('notice/view/'.$notice->noticeID, $this->lang->line('view')) ?>                                        
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
    $("#notice").addClass("active");
</script>



