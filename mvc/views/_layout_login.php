<?php echo doctype("html5"); ?>

<html class="bg-black" lang="en">

    <head>

        <meta charset="UTF-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <meta name="description" content="Customer complain system">

        <meta name="author" content="Rid Islam">

        <meta name="keyword" content="Project Mangagement System">

        <link rel="shortcut icon" href="img/favicon.html">

        <title>Project Management Tools</title>



        <!-- Main JS -->

        <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js'); ?>"></script>



        <!-- Main css  -->

        <!-- bootstrap 3.0.2 -->

        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" />

        <!-- font Awesome -->

        <link href="<?php echo base_url('css/font-awesome.min.css'); ?>" rel="stylesheet"/>

        <!-- Ionicons -->

        <link href="<?php echo base_url('css/ionicons.min.css'); ?>" rel="stylesheet" type="text/css" />

        <!-- Theme style -->

        <link href="<?php echo base_url('css/inistyle.css'); ?>" rel="stylesheet" type="text/css" />



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

        <![endif]-->

    </head>
    <body  style="background-color:#F1F2F7;">
        <?php $this->load->view($subview); ?>
        <!-- Bootstrap -->
        <script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
        <!-- inistyle App -->
        <script src="<?php echo base_url('js/inistyle/app.js'); ?>" type="text/javascript"></script>
    </body>
</html>

