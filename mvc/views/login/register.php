<div class="form-box" id="login-box">

    <div class="header" id="head-reg">Customer Registration</div>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="body">
            <div class="form-group" <?php if(form_error('name')) {echo 'style="border:1px solid #c7254e;"';} ?>>                
                <input style='border: 1px solid #e7e7e7;' type="text" name="name" class="form-control" value="<?=set_value('name')?>" placeholder="Full name"/>
            </div>
            <div class="form-group">
                <input style="border: 1px solid #e7e7e7;" type="text" name="company" class="form-control" placeholder="Company"/>
            </div>
            <div class="form-group">
               <?php 
                    echo form_dropdown("gender", array("Male" => "Male", "Female" => "Female"), set_value("gender"), "id='gender' class='form-control' style='border: 1px solid #e7e7e7;'"); 
                ?>
            </div>
            <div class="form-group" <?php if(form_error('email')) {echo 'style="border:1px solid #c7254e;"';} ?>>
                <input style='border: 1px solid #e7e7e7;' type="text" name="email" class="form-control" value="<?=set_value('email')?>" placeholder="Email"/>
            </div>
            <div class="form-group" <?php if(form_error('phone')) {echo 'style="border:1px solid #c7254e;"';} ?>>
                <input style='border: 1px solid #e7e7e7;' type="text" id="phone" name="phone" class="form-control" placeholder="Phone"/>
            </div>
            <div class="form-group" <?php if(form_error('address')) {echo 'style="border:1px solid #c7254e;"';} ?>>
                <input style='border: 1px solid #e7e7e7;' type="text" id="address" name="address" value="<?=set_value('address')?>" class="form-control" placeholder="Address"/>
            </div>
            
            <div class="form-group" <?php if(form_error('username')) {echo 'style="border:1px solid #c7254e;"';} ?>>
                <input style='border: 1px solid #e7e7e7;' type="text" name="username" value="<?=set_value('username')?>" class="form-control" placeholder="Username"/>
            </div>
            <div class="form-group" <?php if(form_error('password')) {echo 'style="border:1px solid #c7254e;"';} ?>>
                <input style='border: 1px solid #e7e7e7;' type="password" name="password" class="form-control" placeholder="Password"/>
            </div>
            <div class="form-group" >
                <input class="form-control" <?php if(isset($image)) {echo 'style="border:1px solid #c7254e;max-width:155px;display:inline;"';} else {echo 'style="max-width:155px;display:inline;"';} ?> id="uploadFile" placeholder="Choose File"  disabled/>
                <div class="fileUpload btn btn-success form-control" style="max-width:150px; margin-left: 10px;">
                    <span class="fa fa-repeat"></span>
                    <span>Upload</span>
                    <input id="uploadBtn" type="file" class="upload" name="image" />
                </div>  
            </div>
        </div>
        <div class="footer">                    

            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>

            <a href="<?=base_url('login'); ?>" class="text-center">I already have a membership</a>
        </div>
    </form>

</div>

<script>
    document.getElementById("uploadBtn").onchange = function() {
        document.getElementById("uploadFile").value = this.value;
    };
</script>