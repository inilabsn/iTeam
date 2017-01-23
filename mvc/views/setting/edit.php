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
                            if(form_error('sitename')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="sitename" class="col-sm-2 control-label">
                                <?=$this->lang->line('sitename')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sitename" name="sitename" value="<?=set_value('sitename', $setting->sitename)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('sitename'); ?>
                            </span>
                        </div>

                        <?php 
                            if(form_error('name')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="name" class="col-sm-2 control-label">
                                <?=$this->lang->line('name')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $setting->name)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('name'); ?>
                            </span>
                        </div>
                    
                        <?php 
                            if(form_error('email')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="email" class="col-sm-2 control-label">
                                <?=$this->lang->line('email')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $setting->email)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('email'); ?>
                            </span>
                        </div>
                    
                        <?php 
                            if(form_error('phone')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="phone" class="col-sm-2 control-label">
                                <?=$this->lang->line('phone')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $setting->phone)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('phone'); ?>
                            </span>
                        </div>

                        <?php 
                            if(form_error('address')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="address" class="col-sm-2 control-label">
                                <?=$this->lang->line('address')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $setting->address)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('address'); ?>
                            </span>
                        </div>

                        <?php 
                            if(form_error('currency')) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="currency" class="col-sm-2 control-label">
                                <?=$this->lang->line('currency')?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="currency" name="currency" value="<?=set_value('currency', $setting->currency)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('currency'); ?>
                            </span>
                        </div>

                        <?php 
                            if(isset($image)) 
                                echo "<div class='form-group has-error' >";
                            else     
                                echo "<div class='form-group' >";
                        ?>
                            <label for="photo" class="col-sm-2 control-label">
                                <?=$this->lang->line('photo')?>
                            </label>
                            <div class="col-sm-3">
                                <input class="form-control"  id="uploadFile" value="<?=set_value('photo', $setting->photo)?>" placeholder="Choose File" disabled />  
                            </div>

                            <div class="col-sm-2">
                                <div class="fileUpload btn btn-success form-control">
                                    <span class="fa fa-repeat"></span>
                                    <span>Upload</span>
                                    <input id="uploadBtn" type="file" class="upload" name="image" />
                                </div>
                            </div>
                             <span class="col-sm-4 control-label">
                               
                                <?php if(isset($image)) echo $image; ?>
                            </span>
                        </div>                     
                    
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="Update Settings" >
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
    document.getElementById("uploadBtn").onchange = function() {
        document.getElementById("uploadFile").value = this.value;
    };
</script>