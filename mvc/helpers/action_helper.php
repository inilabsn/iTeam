<?php

function btn_add($uri, $name) {

    return anchor($uri, "<i class='fa fa-plus'></i> ".$name, "class='btn btn-primary btn-xs' data-toggle='tooltip' data-placement='top' title='Add'");

}



function btn_view($uri, $name) {

    return anchor($uri, "<i class='fa fa-check-square-o'></i> ".$name, "class='btn btn-success btn-xs' data-toggle='tooltip' data-placement='top' title='View'");

}



function btn_edit($uri, $name) {

    return anchor($uri, "<i class='fa fa-edit'></i> ".$name, "class='btn btn-warning btn-xs' data-toggle='tooltip' data-placement='top' title='Edit'");

}

function btn_custom($uri, $name) {

    return anchor($uri, "<i class='fa fa-clock-o'></i> ".$name, "class='btn btn-warning btn-xs' data-toggle='tooltip' data-placement='top' title='Timetracker'");

}

function btn_submit($uri, $name) {

    return anchor($uri, "<i class='fa fa-check-square-o'></i> ".$name, "class='btn btn-success btn-sm'");

}



function btn_delete($uri, $name) {

    return anchor($uri, "<i class='fa fa-trash-o'></i> ". $name,

        array(

            "onclick" => "return confirm('you are about to delete a record. This cannot be undone. are you sure?')",
            "class" => 'btn btn-danger btn-xs',
            "data-toggle" => 'tooltip',
            "data-placement" => 'top',
            "title"=>'Delete'
        )

    );

}



function btn_lg_add($uri, $name) {

    return anchor($uri, "<i class='fa fa-shopping-cart'></i> ".$name, "class='btn btn-md btn-primary' style='text-decoration: none;' role='button'");

}



function btn_return($uri, $name) {

    return anchor($uri, "<i class='fa fa-mail-forward'></i> ". $name,

        array(

            "onclick" => "return confirm('you are return the book . This cannot be undone. are you sure?')",

            "class" => 'btn btn-danger btn-xs'



        )

    );

}







if (!function_exists('dump')) {

    function dump ($var, $label = 'Dump', $echo = TRUE)

    {

        // Store dump in variable 

        ob_start();

        var_dump($var);

        $output = ob_get_clean();

        

        // Add formatting

        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);

        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';

        

        // Output

        if ($echo == TRUE) {

            echo $output;

        }

        else {

            return $output;

        }

    }

}





if (!function_exists('dump_exit')) {

    function dump_exit($var, $label = 'Dump', $echo = TRUE) {

        dump ($var, $label, $echo);

        exit;

    }

}