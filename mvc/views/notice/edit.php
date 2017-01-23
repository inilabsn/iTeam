 <section class="content-header">

    <h1>

        <?=$this->lang->line('panel_title')?>

    </h1>

    <ol class="breadcrumb">

        <li><a href="#"><i class="fa fa-dashboard"></i> <?=$this->lang->line('main_menu')?></a></li>

        <li class="active"><?=$this->lang->line('page_menu')?> page</li>

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

                       

                        <?php 

                            if(form_error('title')) 

                                echo "<div class='form-group has-error' >";

                            else     

                                echo "<div class='form-group' >";

                        ?>

                            <label for="title" class="col-sm-2 control-label">

                                <?=$this->lang->line("notice_title")?>

                            </label>

                            <div class="col-sm-5">

                                <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title', $notice->title)?>" >

                            </div>

                            <span class="col-sm-4 control-label">

                                <?php echo form_error('title'); ?>

                            </span>

                        </div>



                        <?php 

                            if(form_error('notice')) 

                                echo "<div class='form-group has-error' >";

                            else     

                                echo "<div class='form-group' >";

                        ?>

                            <label for="notice" class="col-sm-2 control-label">

                                <?=$this->lang->line("notice_notice")?>

                            </label>

                            <div class="col-sm-5">

                                <textarea class="form-control textarea" placeholder="Enter ..." rows="3" id="notice" name="notice"> <?=set_value('notice', $notice->notice)?> </textarea>

                            </div>

                            <span class="col-sm-4 control-label">

                                <?php echo form_error('notice'); ?>

                            </span>

                        </div>



                        <?php 

                            if(form_error('date')) 

                                echo "<div class='form-group has-error' >";

                            else     

                                echo "<div class='form-group' >";

                        ?>

                            <label for="date" class="col-sm-2 control-label">

                                <?=$this->lang->line("notice_date")?>

                            </label>

                            <div class="col-sm-5">

                                <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date', $notice->date)?>" >

                            </div>

                            <span class="col-sm-4 control-label">

                                <?php echo form_error('date'); ?>

                            </span>

                        </div>



                        <div class="form-group">

                            <div class="col-sm-offset-2 col-sm-8">

                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_notice")?>" >

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

    $('#date').datepicker({ dateFormat : 'mm-dd-yyyy' });

    $("#employer").addClass("active");

</script>

