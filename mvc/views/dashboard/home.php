 <section class="content-header">
    <h1>
        Home page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">index page</li>
    </ol>
</section>

<!-- Main content -->
<?php 
    $usertype = $this->session->userdata("usertype");
    if($usertype == "Admin" || $usertype == "Project manager"){
?>
<section class="content">
    <!-- Widget -->
    <div class="row">
        <div class="col-md-12"> 
            <div class="owl-carousel">
                <div class="db-icon">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                <?php echo $project_count; ?>
                            </h3>
                            <p>
                                Project
                            </p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?=base_url('project');?>" class="small-box-footer">
                             More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col --> 
                <div class="db-icon">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php echo $task_count; ?>
                            </h3>
                            <p>
                                Task
                            </p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?=base_url('project');?>" class="small-box-footer">
                             More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col --> 
                <div class="db-icon">
                    <!-- small box -->
                    <div class="small-box bg-black">
                        <div class="inner">
                            <h3>
                                <?php echo $user_count; ?>
                            </h3>
                            <p>
                                Users
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=base_url('users'); ?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col -->                          
                <div class="db-icon">
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3>
                                <?php echo $notice_count; ?>
                            </h3>
                            <p>
                                Notice
                            </p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-ios7-alarm-outline"></i>
                        </div>
                        <a href="<?=base_url('notice');?>" class="small-box-footer">
                             More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col -->                
            </div>
        </div>
    </div><!-- /.row -->
    <!-- /.Widget -->
    <!-- Gantt Chart -->
    <div class="row">
        <div class="col-lg-12">
            
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Gantt Chart</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="gantt_wrapper" id="gantt_here"></div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <!-- ./Gantt chart -->
    
    <!-- Small boxes (Stat box) -->    
    <div class="row">
        <div class="col-lg-6">
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Projects</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list">
                        <?php if(count($projects)) {$i = 1; foreach($projects as $project) { ?>
                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                                                        
                            <!-- notice text -->
                            <span class="text">
                                <a href="<?=base_url('project/view/'.$project->project_id)?>">
                                <?php 
                                    if(strlen($project->project_title) > 40)
                                        echo substr($project->project_title, 0, 40)."...";
                                    else 
                                        echo substr($project->project_title, 0, 40);
                                ?>
                                </a>
                            </span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $project->project_create_date; ?></small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="<?=base_url('project/edit/'.$project->project_id)?>"><i class="fa fa-edit"></i></a>
                                <a href="<?=base_url('project/delete/'.$project->project_id)?>"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                        <?php $i++; }} ?>
                    </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="<?=base_url('project/add');?>" class="btn btn-default pull-right" type="button"><i class="fa fa-plus"></i> Add Project</a>                
                </div>
            </div><!-- /.box -->
        </div>
        <div class="col-lg-6">
            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Notice</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list">
                        <?php if(count($notices)) {$i = 1; foreach($notices as $notice) { ?>
                        <li>
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                            </span>
                                                        
                            <!-- notice text -->
                            <span class="text">
                                <a href="<?=base_url('notice/view/'.$notice->noticeID)?>">
                                <?php 
                                    if(strlen($notice->title) > 40)
                                        echo substr($notice->title, 0, 40)."...";
                                    else 
                                        echo substr($notice->title, 0, 40);
                                ?>
                                </a>
                            </span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> <?php echo $notice->date; ?></small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <a href="<?=base_url('notice/edit/'.$notice->noticeID)?>"><i class="fa fa-edit"></i></a>
                                <a href="<?=base_url('notice/delete/'.$notice->noticeID)?>"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                        <?php $i++; }} ?>
                    </ul>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <a href="<?=base_url('notice/add');?>" class="btn btn-default pull-right" type="button"><i class="fa fa-plus"></i> Add Notice</a>                
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        
        <div class="col-lg-12">
            <div class="box">
                <div class="box-header">
                    <i class="fa fa-calendar"></i>
                    <h3 class="box-title">Calendar</h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>                                        
                    </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!--The calendar -->
                    <div class="cal1" style="width: 100%"></div>
                </div><!-- /.box-body -->  
            </div><!-- /.box -->   
        </div>
    </div>
    
</section><!-- /.content -->
<?php } elseif($usertype == "Employer") { ?>
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12"> 
            <div class="owl-carousel">                        
                <div class="db-icon">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php echo $notice_count; ?>
                            </h3>
                            <p>
                                Notice
                            </p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?=base_url('notice');?>" class="small-box-footer">
                             More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col -->
                <div class="db-icon">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>
                                <?php echo $employer_count; ?>
                            </h3>
                            <p>
                                Employers
                            </p>
                        </div>
                        <div class="icon">
                             <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?=base_url('employer');?>" class="small-box-footer">
                             More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- col -->                 
            </div>
        </div>
    </div><!-- /.row -->
       
</section><!-- /.content -->
<?php } ?>
<!-- adding active class at menu item -->
<script>

$("#dashboard").addClass("active");

$(document).ready(function(){
    $(".y h2").data("direction","bottom");
    $("#slide1").nanimate({delay:true});
    $("#slide1").bind("nanimation.complete",function(){
        //alert("done");
        $(".x").each(function(){
            $(this).data("direction","right")
            .data("distance",$(this).width())
            .data("time",$(this).width()*1.5);
        });
        $("#chart").nanimate({classname:"x",noevent:true,delay:false});
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    });
});
</script>
<script type="text/javascript">
    $.ajax({
        type: 'GET',
        dataType: "json",
        url: "<?=base_url('dashboard/project')?>",
        dataType: "html",
        success: function(data) {
            var response = jQuery.parseJSON(data);
            // alert(response.ms[0]['projectID']);
            // alert(response.ms[0]['day']);

            var i;
            var cal = response.counter -1;
            var ar = [];
            for ( i=0; i <= cal; i++) {

                ar[i]={
                    id: response.ms[i]['projectID'],
                    text: response.ms[i]['project'],
                    type: gantt.config.types.project, 
                    start_date: response.ms[i]['day'], 
                    // order: 11+i, 
                    duration: response.ms[i]['duration']+1,
                    progress: response.ms[i]['process'], 
                    open: false
                };

            }
          

            var demo_tasks = {
               data:ar
            }

            var getListItemHTML = function (type, count, active) {
                return '<li'+(active?' class="active"':'')+'><a href="#">'+type+'s <span class="badge">'+count+'</span></a></li>';
            };

            gantt.templates.scale_cell_class = function(date){
                if(date.getDay()==0||date.getDay()==6){
                    return "weekend";
                }
            };
            gantt.templates.task_cell_class = function(item,date){
                if(date.getDay()==0||date.getDay()==6){
                    return "weekend" ;
                }
            };

            gantt.templates.rightside_text = function(start, end, task){
                if(task.type == gantt.config.types.milestone){
                    return task.text;
                }
                return "";
            };

            gantt.config.columns = [
                {name:"text",       label:"Project name",  width:"*", tree:true },
                {name:"start_time",   label:"Start time",  template:function(obj){
                    return gantt.templates.date_grid(obj.start_date);
                }, align: "center", width:60 },
                {name:"duration",   label:"Duration", align:"center", width:60},
                {name:"add",        label:"",           width:44 }
            ];

            gantt.config.grid_width = 390;
            gantt.config.date_grid = "%F %d";
            gantt.config.scale_height  = 60;
            gantt.config.subscales = [
                { unit:"week", step:1, date:"Week #%W"}
            ];

            gantt.attachEvent("onAfterTaskAdd", function(id,item){
                updateInfo();
            });
            gantt.attachEvent("onAfterTaskDelete", function(id,item){
                updateInfo();
            });

            gantt.init("gantt_here");
            gantt.parse(demo_tasks);
            // updateInfo();


                    // $("#patients_name").val(response.patients_name);
                }
            });

</script>

