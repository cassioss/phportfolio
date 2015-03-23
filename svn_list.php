<?php
    include('includes/header.php');    
    // Necessary requirements
    require 'project.php';
    
    /**
     * Creates a clickable URL given the path to a file.
     */
    function linkToURL($fullPath){
        return "<a href=\"$fullPath\" target = \"_blank\">Click here to access the file</a>";
    }
    
    // Counts all files and projects
    $allFiles = array();
    $allProjects = array();
    
    echo "SVN list data<br><hr><br>";
    
    // Loads each one of the files
    //$file_logs = simplexml_load_file('resources/svn_log.xml');
    $fileList = simplexml_load_file('resources/svn_list.xml');
    
    $list = $fileList->list;
    $originPath = $list['path'];
    
    // Parses SVN list file
    foreach ($list->entry as $entry) {
    
        $relativePath = $entry->name; 
        $relativePathArray = explode("/", $relativePath);
        $path = $originPath . "/" . $relativePath;
    
        $kind = $entry['kind'];
    
        $name = end($relativePathArray);
    
        $size = $entry->size;
        if(!is_null($size))
            $size = 0;
    
        $revision = $entry->commit['revision'];
    
        $author = $entry->commit->author;
    
        $date = date('m/d/Y', strtotime((string)$entry->commit->date));
    
        $type = "";
        $namePlusType = explode(".", $name);
        if(sizeof($namePlusType) > 1)
            $type = "." . end($namePlusType);
    
        if($kind == 'dir'){
            if(sizeof($relativePathArray)==1){
                echo "<hr>Found a project<hr>";
                $newProject = new Project($path, $kind, $name, $size, $revision, $author, $date, $type);
                array_push($allProjects, $newProject);
            }
        } else {
            $newFile = new File($path, $kind, $name, $size, $revision, $author, $date, $type);
            array_push($allFiles, $newFile);
        }
    
        echo "$kind<br>$name<br>$revision<br>$author<br>$date";
        if($kind == 'file'){
            echo "<br>$size bytes<br>";
            echo "$type<br>";
            echo linkToURL($path);
        }
    
        echo "<br><br>";
    }
    
    include('includes/footer.php');
