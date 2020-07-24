<!DOCTYPE html>
 <html lang="it">
    <head>
        <title>WinStreaming - Remove Streaming</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Start Css Normalize -->
        <link href="./../CSS/Normalize.css" rel="stylesheet" type="text/CSS" />
        <!-- End Css Normalize -->

        <!-- Start Css Style -->
        <link href="./../CSS/Style.css" rel="stylesheet" type="text/CSS" />
        <!-- End Css Style -->

        <!-- Start VideoJS -->
        <link href="./../JavaScript/VideoJS/video-js.css" rel="stylesheet" type="text/CSS" />
        <script src="./../JavaScript/VideoJS/video.js"></script>
        <!-- End VideoJS -->
        
        <!-- Start Favicon -->
        <link href="./../Images/Logo.png" rel="icon" type="image/png" />
         <!-- End Favicon -->
    </head>
    <body>
    
    <div id="wrapper">
        <header>   
            <h1>WinStreaming</h1>

            <div id="logo">
                <a href="./../Index.php">
                    <img src="./../Images/Logo.png" alt="Logo"/>
                </a>
            </div>
        </header>

        <div id="space"></div>

        <main>
            <div>
            <?php
                include "function.php";

                foreach (new DirectoryIterator("./") as $fileDirectory) {
                    if($fileDirectory -> isDir() And !$fileDirectory->isDot()) {
                        echo "<h1>" . $fileDirectory->getFilename() . "</h1>
                        <a href=Source/" . $fileDirectory . "/" . $fileDirectory . ".php class=\"otherPage\" style=\"font-size:1.2em\">Clicca qui per cancellare " . $fileDirectory->getFilename() . "</a>";
                    }
                }
            ?>

        </main>

        <div id="navBarTop">
            <h2>Vuoi Ritornare a Guardare Film/Serie TV ?</h2>
            <a class="otherPage" href="./../Index.php">Clicca qui!</a>
        </div>

        <div id="navBarBottom">
            <h2>Vuoi Inserire un Nuovo Film/Serie TV ?</h2>
            <a class="otherPage" href="addStreaming.php">Clicca qui!</a>
        </div>

        <footer>
            <p Style="color:#BFC4F4;font-size:1em; text-align: center;">
                <em>Web site design, testi e grafica &copy; 2020 WinStreaming - È vietata la riproduzione anche parziale.</em>
                <br />
                <em>Credits:Vincenzo Susso - WinEnzo</em>
            </p>
        </footer>

    </div>

    </body>
</html>