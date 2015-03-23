<?php
    /**
     * Identifies a template for both files and projects on SVN.
     */
    class Template
    {
        var $name;
        var $revision;
        var $author;
        var $date;
        var $message;
    
        /**
         * Initializes a template.
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
        }
    }
