<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHPortfolio</title>
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link rel="stylesheet" type="text/css" href="style/default.css" />
        <link rel="stylesheet" type="text/css" href="style/component.css" />
        <script src="js/modernizr.custom.js"></script>
    </head>
    <body>
        <div class="container">
            <header class="clearfix">
                <span>CS242 - Programming Studio</span>
                <h1>PHPortfolio - Cassio Sousa</h1>
            </header>
            <div class="main">
                <ul id="cbp-ntaccordion" class="cbp-ntaccordion">
                    <?php
                        include 'svn_list.php';
                        foreach($allProjects as $eachProject){
                            echo "<li><h3 class=\"cbp-nttrigger\">" . $eachProject->name . "</h3><div class=\"cbp-ntcontent\"><p>";
                            echo "Author: " . $eachProject->author . "<br>";
                            echo "Date: " . $eachProject->date . "<br>";
                            echo "Revision: " . $eachProject->revision . "<br>";
                            echo "Commit message: <em>" . $eachProject->message . "</em><br>";
                            echo "Files:<br></p><ul class=\"cbp-ntsubaccordion\">";
                            foreach($eachProject->files as $eachFile){
                                echo "<li><h4 class=\"cbp-nttrigger\">" . $eachFile->relativePath . "</h4><div class=\"cbp-ntcontent\"><p>";
                                echo "Name: " . $eachFile->name . "<br>";
                                echo "Author: " . $eachFile->author . "<br>";
                                echo "Date: " . $eachFile->date . "<br>";
                                echo "Type: " . $eachFile->type . "<br>";
                                echo "Size: " . $eachFile->size . " bytes<br>";
                                echo "Revision: " . $eachFile->revision . "<br>";
                                echo "Commit message: <em>" . $eachFile->message . "</em><br>";
                                echo linkToURL($eachFile->path) . "<br>";
                                echo "</p></div></li>";
                            }
                            echo "</ul></div></li>";
                        }
                    ?>
                </ul>
                <h2>&copy; Codrops 2015. All rights reserved. <a href="http://tympanus.net/codrops/2013/03/29/nested-accordion/" target="_blank">Source code</a></h2>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="js/jquery.cbpNTAccordion.min.js"></script>
        <script>
            $( function() {
                /*
                - how to call the plugin:
                $( selector ).cbpNTAccordion( [options] );
                - destroy:
                $( selector ).cbpNTAccordion( 'destroy' );
                */
                $( '#cbp-ntaccordion' ).cbpNTAccordion();
            } );
        </script>
    </body>
</html>