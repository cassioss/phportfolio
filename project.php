<?php
    
    require 'file.php';
    
    /**
     * Identifies a project on SVN.
     */
    class Project extends File
    {
    
        /**
         * Initializes an object for a project on SVN.
         *
         * @param $path
         * @param $kind
         * @param $name
         * @param $size
         * @param $revision
         * @param $author
         * @param $date
         */
        function Project($path, $kind, $name, $size, $revision, $author, $date)
        {
            parent::File($path, $kind, $name, $size, $revision, $author, $date);
            echo $this->path;
        }
    }