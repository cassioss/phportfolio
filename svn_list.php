<?php
    echo "I got in\n";

    // Path that keeps XML files inside
    $svn_log_xml = dirname(__FILE__)."/resources/svn_log.xml";
    $svn_list_xml = dirname(__FILE__)."/resources/svn_list.xml";

    // Creates each one of the files
    $file_data = simplexml_load_file($svn_list_xml);
    $file_logs = simplexml_load_file($svn_log_xml);

    /*foreach ($file_logs->logentry as $logentry){
        $date = (string) $logentry->date;
        foreach($logentry->paths as $paths){
            foreach($paths->path as $path){
                $action = $path['action'];
                $content = (string) $path;
                echo "$date\n";
                echo $action;
                echo $content, "\n";
            }
        }
    }*/