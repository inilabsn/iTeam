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
                        
                        <div class="form-group <?php if(form_error('name')) echo "has-error"?>">
                            <label for="name" class="col-sm-2 control-label">
                                <?=$this->lang->line("user_name")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $user->name)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('name'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="col-sm-2 control-label">
                                <?=$this->lang->line("user_gender")?>
                            </label>
                            <div class="col-sm-5">
                                <?php 
                                    echo form_dropdown("gender", array("Male" => "Male", "Female" => "Female"), set_value("gender", $user->gender), "id='gender' class='form-control'"); 
                                ?>
                            </div>
                        </div>

                        <div class="form-group <?php if(form_error('email')) echo "has-error"?>">
                            <label for="email" class="col-sm-2 control-label">
                                <?=$this->lang->line("user_email")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $user->email)?>" >
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('email'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">
                                <?=$this->lang->line("user_phone")?>
                            </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $user->phone)?>" >
                            </div>
                        </div>

                        <div class="form-group <?php if(form_error('image')) echo "has-error"?>">
                            <label for="photo" class="col-sm-2 control-label">
                                <?=$this->lang->line("user_photo")?>
                            </label>
                            <div class="col-sm-3">
                                <input class="form-control"  id="uploadFile" placeholder="Choose File" disabled />  
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

                        <div class="form-group <?php if(form_error('usertype')) echo "has-error"?>">
                            <label for="usertype" class="col-sm-2 control-label">
                                <?=$this->lang->line("usertype")?>
                            </label>
                            <div class="col-sm-5">
                                <?php 
                                echo form_dropdown("usertype", array("Admin" => "Admin", "Project manager" => "Project Manager","User" => "User", "Client" => "Client"), set_value("usertype", $user->usertype), "id='usertype' class='form-control'"); 
                                ?>
                            </div>
                            <span class="col-sm-4 control-label">
                                <?php echo form_error('usertype'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_user")?>" >
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

    $('#dob').datepicker({ dateFormat : 'mm-dd-yyyy' });

    $('#joinDate').datepicker({ dateFormat : 'mm-dd-yyyy' });

    $("#employer").addClass("active");

</script>

