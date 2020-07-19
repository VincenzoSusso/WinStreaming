<?php
    function isValidDirectory($directoryName) {
        $directoryPath = "./../Videos/" . $directoryName;
        return file_exists($directoryPath) and is_dir($directoryPath);
    }
?>