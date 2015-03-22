<?php
    echo "SVN list data<br><hr><br>";
    
    // Loads each one of the files
    //$file_logs = simplexml_load_file('resources/svn_log.xml');
    $file_list = simplexml_load_file('resources/svn_list.xml');
    
    $list = $file_list->list;
    $path = $list['path'];
    
    echo "$path<br><br>";
    
    // Parses SVN file list
    foreach ($list->entry as $entry) {
        $kind = $entry['kind'];
        $name = $entry->name;
        $revision = $entry->commit['revision'];
        $author = $entry->commit->author;
        $date = date('m/d/Y', strtotime((string)$entry->commit->date));
        $size = $entry->size;
        echo "$kind<br>$name<br>$revision<br>$author<br>$date<br>$size<br><br>";
        $path_as_array = explode("/", $name);
        



    }
