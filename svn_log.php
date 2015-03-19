<?php
echo "I got in<br>";

// Path for the needed XML files
$svn_logs_xml = dirname(__FILE__) . "/resources/svn_log.xml";
$svn_list_xml = dirname(__FILE__) . "/resources/svn_list.xml";

// Loads each one of the files
$file_logs = simplexml_load_file($svn_logs_xml);
$file_list = simplexml_load_file($svn_list_xml);

$list = $file_list->lists->list;
$path = $list['path'];
foreach ($list->entry as $entry) {
    $kind = $entry['kind'];
    $name = $entry->name;
    $revision = $entry->commit['revision'];
    $author = $entry->commit->author;
    $date = $entry->commit->date;
    echo "$path<br>$kind<br>$name<br>$revision<br>$author<br>$date<br>";
    if ($kind == 'dir') {
        $size = $entry->size;
        echo "$size<br>";
    }
    echo "<br>";
}

foreach ($file_logs->logentry as $logentry) {
    $revision = $logentry['revision'];
    $date = date('m/d/Y', strtotime((string)$logentry->date));
    $msg = $logentry->msg;
    foreach ($logentry->paths as $paths) {
        foreach ($paths->path as $path) {
            $action = $path['action'];
            $kind = $path['kind'];
            $content = (string)$path;

            //echo "$revision<br>$date<br>$msg<br>$date<br>$action<br>$kind<br>$content<br><br>";
        }
    }
}