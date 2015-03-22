<?php
    echo "SVN list data<br><hr><br>";
    
    // Path for the needed XML files
    $svn_logs_xml = dirname(__FILE__) . "/resources/svn_log.xml";
    $svn_list_xml = dirname(__FILE__) . "/resources/svn_list.xml";
    
    // Loads each one of the files
    $file_logs = simplexml_load_file($svn_logs_xml);
    $file_list = simplexml_load_file($svn_list_xml);
    
    $list = $file_list->list;
    $path = $list['path'];
    
    echo "$path<br><br>";
    
    // Parses SVN list file
    foreach ($list->entry as $entry) {
        $kind = $entry['kind'];
        $name = $entry->name;
        $revision = $entry->commit['revision'];
        $author = $entry->commit->author;
        $date = date('m/d/Y', strtotime((string)$entry->commit->date));
        echo "$kind<br>$name<br>$revision<br>$author<br>$date<br>";
        if ($kind == 'dir') {
            $size = $entry->size;
            echo "$size<br>";
        }
        echo "<br>";
    }
