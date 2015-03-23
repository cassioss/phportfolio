<?php
    
    require 'template.php';
    
    /**
     * Identifies a project on SVN.
     */
    class Project extends Template
    {
        var $allFiles;
    
        /**
         * Initializes an object for a project on SVN.
         *
         * @param $name
         * @param $revision
         * @param $author
         * @param $date
         * @param $message
         */
        function __construct($name, $revision, $author, $date, $message)
        {
            parent::__construct($name, $revision, $author, $date, $message);
            $allFiles = array();
        }
    }
