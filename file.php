<?php
    
    require 'template.php';
    
    /**
     * Identifies a file on SVN.
     */
    class File extends Template
    {
        var $path;
        var $kind;
        var $size;
        var $type;
    
        /**
         * Initializes an object for a file on SVN.
         *
         * @param $name
         * @param $revision
         * @param $author
         * @param $date
         * @param $message
         * @param $path
         * @param $size
         * @param $type
         */
        function File($name, $revision, $author, $date, $message, $path, $size, $type)
        {
            parent::Template($name, $revision, $author, $date, $message);
            $this->path = $path;
            $this->size = $size;
            $this->type = $type;
        }
    }
