<?php
    require 'templates/project.php';
    require 'templates/file.php';
    
    $revisionToMessage = array();
    $allFiles = array();
    $allProjects = array();
    
    /**
     * Creates a clickable URL given the path to a file.
     *
     * @param $fullPath
     * @return string
     */
    function linkToURL($fullPath) {
        return "<a href=\"$fullPath\" target = \"_blank\">Click here to access the file</a>";
    }
    
    // Loads each one of the files
    $fileLogs = simplexml_load_file('resources/svn_log.xml');
    
    // Parses SVN log file
    foreach ($fileLogs->logentry as $logEntry) {
        $revision = (string)$logEntry['revision'];
        $message = (string)$logEntry->msg;
        $revisionToMessage[$revision] = $message;
    }
    
    // Loads each one of the files
    $fileList = simplexml_load_file('resources/svn_list.xml');
    
    $list = $fileList->list;
    $originPath = $list['path'];
    
    // Parses SVN list file
    foreach ($list->entry as $entry) {
    
        $relativePath = $entry->name;
        $relativePathArray = explode("/", $relativePath);
    
        $name = end($relativePathArray);
    
        $revision = $entry->commit['revision'];
    
        $author = $entry->commit->author;
    
        $date = date('m/d/Y', strtotime((string)$entry->commit->date));
    
        $strRevision = (string)$revision;
        $message = $revisionToMessage[$strRevision];
    
        //echo "$name<br>$revision<br>$author<br>$date<br>$message";
    
        $kind = $entry['kind'];
        if ($kind == 'dir') {
            if (sizeof($relativePathArray) == 1) {
                //echo "<hr>Found a project<hr>";
                $newProject = new Project($name, $revision, $author, $date, $message);
                array_push($allProjects, $newProject);
            }
        } else {
            $path = $originPath . "/" . $relativePath;
            $size = $entry->size;
            $type = "." . end(explode(".", $name));
            $newFile = new File($name, $revision, $author, $date, $message, $path, $size, $type);
            array_push($allFiles, $newFile);
            //echo "<br>$size<br>$type<br>";
            //echo linkToURL($path);
        }
        //echo "<br><br>";
    
    }
    
    foreach($allFiles as $sampleFile){
        $pathAsArray = explode("/", $sampleFile->path);
        foreach($allProjects as $sampleProject){
            if($sampleProject->name == $pathAsArray[6])
                array_push($sampleProject->files, $sampleFile);
        }
    }
