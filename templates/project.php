<?php
    
    /**
     * Identifies a project on SVN.
     */
    class Project
    {
        var $name;
        var $revision;
        var $author;
        var $date;
        var $message;
        var $files;
    
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
            $this->name = $name;
            $this->revision = $revision;
            $this->author = $author;
            $this->date = $date;
            $this->message = $message;
            $this->files = array();
        }
    }
