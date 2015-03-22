<<<<<<< HEAD
<?php
    echo "SVN log data<br><hr><br>";
    
    // Path for the needed XML files
    $svn_logs_xml = dirname(__FILE__) . "/resources/svn_log.xml";
    $svn_list_xml = dirname(__FILE__) . "/resources/svn_list.xml";
    
    // Loads each one of the files
    $file_logs = simplexml_load_file($svn_logs_xml);
    $file_list = simplexml_load_file($svn_list_xml);
    
    // Parses SVN log file
    foreach ($file_logs->logentry as $logentry) {
        $revision = $logentry['revision'];
        $date = date('m/d/Y', strtotime((string)$logentry->date));
        $msg = $logentry->msg;
        foreach ($logentry->paths as $paths) {
            foreach ($paths->path as $path) {
                $action = $path['action'];
                $kind = $path['kind'];
                $content = (string)$path;
    
                echo "$revision<br>$date<br>$msg<br>$date<br>$action<br>$kind<br>$content<br><br>";
=======
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Welcome!</title>
        <!-- Bootstrap core CSS -->
        <link href="style/vendor/bootstrap.min.css" rel="stylesheet">
        <!-- Custom style(s) for this page -->
    </head>
    <body>
        <h1>Simple test</h1>
        <?php
            echo "I got in<br>";

            // Path for the needed XML files
            $svn_logs_xml = dirname(__FILE__) . "/resources/svn_log.xml";
            $svn_list_xml = dirname(__FILE__) . "/resources/svn_list.xml";

            // Loads each one of the files
            $file_logs = simplexml_load_file($svn_logs_xml);
            $file_list = simplexml_load_file($svn_list_xml);

            $list = $file_list->list;
            $path = $list['path'];

            /*foreach ($list->entry as $entry) {
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
            }*/

            foreach ($file_logs->logentry as $logentry) {
                $revision = $logentry['revision'];
                $date = date('m/d/Y', strtotime((string)$logentry->date));
                $msg = $logentry->msg;
                foreach ($logentry->paths as $paths) {
                    foreach ($paths->path as $path) {
                        $action = $path['action'];
                        $kind = $path['kind'];
                        $content = (string)$path;

                        echo "$revision<br>$date<br>$msg<br>$date<br>$action<br>$kind<br>$content<br><br>";
                    }
                }
>>>>>>> parent of 6d3ae02... Added TEMPLATED CSS, removed Bootstrap
            }
        ?>
        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/vendor/jquery-2.1.1.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/header.js"></script>
    </body>
</html>
