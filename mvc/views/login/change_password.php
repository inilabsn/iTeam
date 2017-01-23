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
                <?php
                    if($success == "no") {
                    } else {
                        echo "<div class=\"alert alert-success\">
                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;
                        </button>
                        <h4><span class=\"fa fa-check-circle\"></span> Success!</h4>
                        <h5> Your password is changed! <h5>
                        
                        </div>";
                    }
                ?>
                <form class="form-horizontal" role="form" method="post">

                    <?php 
                        if(form_error('old_password')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="old_password" class="col-sm-2 control-label">
                            <?=$this->lang->line('old_password')?>
                        </label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="old_password" name="old_password" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('old_password'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('new_password')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="new_password" class="col-sm-2 control-label">
                            <?=$this->lang->line("new_password")?>
                        </label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('new_password'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('re_password')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="re_password" class="col-sm-2 control-label">
                            <?=$this->lang->line("re_password")?>
                        </label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="re_password" name="re_password">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('re_password'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("change_password")?>" >
                        </div>
                    </div>

                </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->