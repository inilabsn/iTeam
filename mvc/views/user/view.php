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

<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                       <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-text-width"></i>
                                    <h3 class="box-title">Profile Details</h3>
                                    <div class="box-tools pull-right">
                                        <a class="btn btn-warning btn-sm" href="<?=base_url('user/edit/'.$user->userID);?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </div>
                                </div><!-- /.box-header -->
                                <?php 
                                $usertype = $this->session->userdata("usertype");
                                if($usertype){
                                ?>
                                <div class="box-body">
                                    <?php 
                                    $array = array(
                                        "src" => base_url('uploads/images/'.$user->photo),
                                        'width' => '85px',
                                        'height' => '85px',
                                        "style" => "margin-bottom:10px; border: 5px solid;"
                                    );
                                    echo img($array);
                                    ?>
                                    <table style="max-width: 400px;" class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th colspan="2">Personal Information</th>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("user_username")?></td>
                                                <td><?php  echo $user->username; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("user_name")?></td>
                                                <td><?php  echo $user->name; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("user_gender")?></td>
                                                <td><?php  echo $user->gender; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("user_email")?></td>
                                                <td><?php  echo $user->email; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("user_phone")?></td>
                                                <td><?php  echo $user->phone; ?></td>
                                            </tr>
                                            <tr>
                                                <td><?=$this->lang->line("usertype")?></td>
                                                <td><?php  echo $user->usertype; ?></td>
                                            </tr>
                                        </tbody>    

                                    </table>  

                                </div><!-- /.box-body -->
                                <?php
                                }
                                ?>
                            </div><!-- /.box -->
                        </div><!-- ./col -->
                    </div>
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </div>

    </div>

</section><!-- /.content -->



<!-- adding active class at menu item -->

<script>

    $("#user").addClass("active");

</script>

