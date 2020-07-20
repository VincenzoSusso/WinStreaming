<?php
    define("DIRECTORY_PATH_VIDEOS", "./../Videos/");
    define("DIRECTORY_PATH_SOURCE", "./");
    define("DIRECTORY_PATH_DATA", "../Data/");
    define("FILE_PATH_DATA", "Data.bin");

    class DirectoryInformation {
        private $directoryName;
        private $filesName = array();
        
        public function setDirectoryName($directoryName) {
            $this->directoryName = $directoryName;
        }

        public function getDirectoryName() {
            return $this->directoryName;
        }

        public function getFilesName() {
            return $this->filesName;
        }

        public function setFile($fileName) {
            $directoryFilePath = DIRECTORY_PATH_VIDEOS . $fileName;
            $this->filesName[] = $directoryFilePath;
        }

        public function getSizeFilesName() {
            return count($this->filesName);
        }
    }

    function isValidDirectory($directoryName) {
        $validDirectory = false;
        if (empty($directoryName)) {
            $validDirectory = false;
        } else {
            $directoryFilePath = DIRECTORY_PATH_VIDEOS . $directoryName;
            $validDirectory = file_exists($directoryFilePath) and is_dir($directoryFilePath);
        }
        
        return $validDirectory;
    }

    function saveDirectoryFile($directoryName) {
        $directoryFilePath = DIRECTORY_PATH_VIDEOS . $directoryName;
        $directoryInformation = new DirectoryInformation();

        if (!file_exists(DIRECTORY_PATH_DATA)) {
            mkdir(DIRECTORY_PATH_DATA, 0777, true);
        }

        $file = fopen(DIRECTORY_PATH_DATA . FILE_PATH_DATA, "ab");
        $directoryInformation->setDirectoryName($directoryName);
        
        foreach (new DirectoryIterator($directoryFilePath) as $fileDirectory){
            if($fileDirectory->isFile()) {
                $directoryInformation->setFile($fileDirectory->getFilename());
            }
        }

        $directoryInformationData = serialize($directoryInformation);

        fwrite($file, $directoryInformationData);

        fclose($file);
    }

    function createHTMLPage($directoryName) {
        $directoryFilePath = DIRECTORY_PATH_VIDEOS . $directoryName;
        foreach (new DirectoryIterator($directoryFilePath) as $file) {
            //code create html page for each file in directory
        }
    }
?>