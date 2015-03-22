<?php
    
    function linkToURL($fullPath){
        return "<a href=\"$fullPath\" target = \"_blank\">$fullPath</a>";
    }

    echo "SVN list data<br><hr><br>";
    
    // Loads each one of the files
    //$file_logs = simplexml_load_file('resources/svn_log.xml');
    $fileList = simplexml_load_file('resources/svn_list.xml');
    
    $list = $fileList->list;
    $originPath = $list['path'];
    
    // Parses SVN list file
    foreach ($list->entry as $entry) {
        $kind = $entry['kind'];
    
        $relativePath = $entry->name; 
        $relativePathArray = explode("/", $relativePath);
        $name = end($relativePathArray);

        $path = $originPath . "/" . $relativePath;
    
        $type = "";
        $namePlusType = explode(".", $name);
        if(sizeof($namePlusType) > 1)
            $type = "." . end($namePlusType);
    
        $revision = $entry->commit['revision'];
    
        $author = $entry->commit->author;
    
        $size = $entry->size;
        if(!is_null($size))
            $size = 0;
    
        $date = date('m/d/Y', strtotime((string)$entry->commit->date));
    
        echo "$kind<br>$name<br>$revision<br>$author<br>$date<br>$size bytes<br>$type<br>";
        echo linkToURL($path);
        echo "<br><br>";
    }