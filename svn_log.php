<?php
    
    // Creates an array for both files and projects
    $files_array = array();
    $projects_array = array();
    
    require('file.php');
    
    echo "SVN log data<br><hr><br>";
    
    // Loads each one of the files
    $file_logs = simplexml_load_file('resources/svn_log.xml');
    $file_list = simplexml_load_file('resources/svn_list.xml');
    
    // Parses SVN log file
    foreach ($file_logs->logentry as $logentry) {
        $revision = $logentry['revision'];
        $date = date('m/d/Y', strtotime((string)$logentry->date));
        $msg = $logentry->msg;
        foreach ($logentry->paths as $paths) {
            foreach ($paths->path as $path) {
                $action = $path['action'];
                $kind = $path['kind'];
                $content = $path;
    
                echo "$revision<br>$date<br>$msg<br>$date<br>$action<br>$kind<br>$content<br><br>";
                $divided_path = explode("/", $content);
                if(sizeof($divided_path) == 3){
                        
                }
            }
        }
    }
