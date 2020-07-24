<?php
    define("DIRECTORY_PATH_VIDEOS", "./../Videos/");
    define("DIRECTORY_PATH_SOURCE", "./");

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

    function insertLinkPages($directoryName) {
        foreach (new DirectoryIterator("./") as $fileDirectory) {
            if(!($fileDirectory -> isDir()) And strcmp($fileDirectory -> getFilename(), $directoryName . '.php') != 0) {
                echo "<h1 class=\"episode\">" . $fileDirectory -> getBasename(".mp4.php") . "</h1>
                <a href=" . $fileDirectory -> getFilename() . " class=\"episode\">Per vedere " . $fileDirectory -> getBasename(".mp4.php") . " clicca qui</a>";
            }
        }
    }

    function createHTMLMainPage($directoryName) {
        $directoryFilePath = "./" . $directoryName;
        $htmlPage = "<!DOCTYPE html>
        <html lang='it'>
           <head>
               <title>WinStreaming - $directoryName</title>
               <meta charset='UTF-8' />
               <meta name='viewport' content='width=device-width, initial-scale=1.0' />
               
               <!-- Start Css Normalize -->
               <link href='./../../CSS/Normalize.css' rel='stylesheet' type='text/CSS' />
               <!-- End Css Normalize -->
       
               <!-- Start Css Style -->
               <link href='./../../CSS/Style.css' rel='stylesheet' type='text/CSS' />
               <!-- End Css Style -->
       
               <!-- Start VideoJS -->
               <link href='./../../JavaScript/VideoJS/video-js.css' rel='stylesheet' type='text/CSS' />
               <script src='./../../JavaScript/VideoJS/video.js'></script>
               <!-- End VideoJS -->
               
               <!-- Start Favicon -->
               <link href='./../../Images/Logo.png' rel='icon' type='image/png' />
                <!-- End Favicon -->
           </head>
           <body>
           
           <div id='wrapper'>
               <header>   
                   <h1>WinStreaming</h1>
       
                   <div id='logo'>
                       <a href='./../../Index.php'>
                           <img src='./../../Images/Logo.png' alt='Logo'/>
                       </a>
                   </div>
               </header>
       
               <div id='space'></div>
       
               <main>
                    <?php
                        include './../function.php';
                        insertLinkPages(\"$directoryName\");
                    ?>
                </main>
           
                <div id='navBarTop'>
                   <h2>Vuoi Inserire un Nuovo Film/Serie TV ?</h2>
                   <a class='otherPage' href='./../addStreaming.php'>Clicca qui!</a>
               </div>
           
                <div id='navBarBottom'>
                   <h2>Vuoi Cancellare un Film/Serie TV ?</h2>
                   <a class='otherPage' href='./../removeStreaming.php'>Clicca qui!</a>
               </div>
           
                <footer>
                    <p Style=\"color:#BFC4F4;font-size:1em; text-align: center;\">
                        <em>Web site design, testi e grafica &copy; 2020 WinStreaming - È vietata la riproduzione anche parziale.</em>
                        <br />
                        <em>Credits:Vincenzo Susso - WinEnzo</em>
                    </p>
               </footer>
           </div>
           
            </body>
        </html>";

        $file = fopen($directoryFilePath . "/" . $directoryFilePath . ".php", 'w');
        fwrite($file, $htmlPage);
        fclose($file);

    }

    function createHTMLEpisodePage($directoryName, $fileName) {
        $directoryVideoPath = "./../../Videos/" . $directoryName . "/" . $fileName;
        $directoryFilePath = "./" . $directoryName . "/";
        
        $htmlPage = "<!DOCTYPE html>
        <html lang='it'>
           <head>
               <title>WinStreaming - $fileName</title>
               <meta charset='UTF-8' />
               <meta name='viewport' content='width=device-width, initial-scale=1.0' />
               
               <!-- Start Css Normalize -->
               <link href='./../../CSS/Normalize.css' rel='stylesheet' type='text/CSS' />
               <!-- End Css Normalize -->
       
               <!-- Start Css Style -->
               <link href='./../../CSS/Style.css' rel='stylesheet' type='text/CSS' />
               <!-- End Css Style -->
       
               <!-- Start VideoJS -->
               <link href='./../../JavaScript/VideoJS/video-js.css' rel='stylesheet' type='text/CSS' />
               <script src='./../../JavaScript/VideoJS/video.js'></script>
               <!-- End VideoJS -->
               
               <!-- Start Favicon -->
               <link href='./../../Images/Logo.png' rel='icon' type='image/png' />
                <!-- End Favicon -->
           </head>
           <body>
           
           <div id='wrapper'>
               <header>   
                   <h1>WinStreaming</h1>
       
                   <div id='logo'>
                       <a href='./../../Index.php'>
                           <img src='./../../Images/Logo.png' alt='Logo'/>
                       </a>
                   </div>
               </header>
       
               <div id='space'></div>
       
               <main>
                    <?php
                        echo \"<h1 class=\\\"episode\\\">$fileName</h1>
                            <div class='video'>
                                <video class='video-js vjs-default-skin' controls data-setup='{\\\"Controls\\\":true,
                                \\\"fluid\\\":true}'>
                                    <source src='$directoryVideoPath'>
                                </video>
                            </div>\";
                    ?>
                </main>
           
                <div id='navBarTop'>
                   <h2>Vuoi Inserire un Nuovo Film/Serie TV ?</h2>
                   <a class='otherPage' href='./../addStreaming.php'>Clicca qui!</a>
               </div>
           
                <div id='navBarBottom'>
                   <h2>Vuoi Cancellare un Film/Serie TV ?</h2>
                   <a class='otherPage' href='./../removeStreaming.php'>Clicca qui!</a>
               </div>
           
                <footer>
                    <p Style=\"color:#BFC4F4;font-size:1em; text-align: center;\">
                        <em>Web site design, testi e grafica &copy; 2020 WinStreaming - È vietata la riproduzione anche parziale.</em>
                        <br />
                        <em>Credits:Vincenzo Susso - WinEnzo</em>
                    </p>
               </footer>
           </div>
           
            </body>
        </html>";

        $file = fopen($directoryFilePath . "/" . $fileName . ".php", 'w');
        fwrite($file, $htmlPage);
        fclose($file);
        
    }

    function createHTMLPage($directoryName) {
        $directoryVideoPath = DIRECTORY_PATH_VIDEOS . $directoryName;
        $directoryFilePath = DIRECTORY_PATH_SOURCE . $directoryName;
        
        if (!file_exists($directoryFilePath)) {
            mkdir($directoryFilePath, 0777, true);
        }

        foreach (new DirectoryIterator($directoryVideoPath) as $fileDirectory) {
            if(!($fileDirectory -> isDir())) {
                createHTMLEpisodePage($directoryName, $fileDirectory -> getFilename());
            }
        }

        createHTMLMainPage($directoryName);

    }

    function getLinkPages() {
        $pageWritten = false;

        foreach (new DirectoryIterator("Source/") as $fileDirectory) {
            if($fileDirectory -> isDir() And !$fileDirectory->isDot()) {
                echo "<h1>" . $fileDirectory->getFilename() . "</h1>
                <a href=Source/" . $fileDirectory . "/" . $fileDirectory . ".php class=\"otherPage\" style=\"font-size:1.2em\">Clicca qui per vedere " . $fileDirectory->getFilename() . "</a>";
                $pageWritten = true;
            }
        }

        if(!$pageWritten) {
            echo "<h1>Non c'è nessun Film/SerieTV disponibile</h1>";
        }
    }

    function deleteDirectory($path) {
        foreach (new DirectoryIterator($path) as $fileDirectory) {
            if($fileDirectory -> isDir() And !$fileDirectory -> isDot()) {
                deleteDirectory($fileDirectory->getRealPath());
            } else {
                if(!$fileDirectory -> isDot()) {
                    unlink($fileDirectory -> getRealPath());
                }
            }
        }

        rmdir($path);
    }

    function removeDirectory($directoryName) {
        $directoryFilePath = DIRECTORY_PATH_SOURCE . $directoryName;
        $directoryVideoPath = DIRECTORY_PATH_VIDEOS . $directoryName;
        
        deleteDirectory($directoryFilePath);
        deleteDirectory($directoryVideoPath);
    }
?>