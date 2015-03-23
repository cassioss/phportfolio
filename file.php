<?php
    
    /**
     * Identifies a file on SVN.
     */
    class File
    {
        var $path;
        var $kind;
        var $name;
        var $size;
        var $revision;
        var $author;
        var $date;
        var $type;
    
        /**
         * Initializes an object for a file on SVN.
         *
         * @param $path
         * @param $kind
         * @param $name
         * @param $size
         * @param $revision
         * @param $author
         * @param $date
         * @param $type
         */
        function File($path, $kind, $name, $size, $revision, $author, $date, $type)
        {
            $this->path = $path;
            $this->kind = $kind;
            $this->name = $name;
            $this->size = $size;
            $this->revision = $revision;
            $this->author = $author;
            $this->date = $date;
            $this->type = $type;
        }
    }
