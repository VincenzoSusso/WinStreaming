<!DOCTYPE html>
 <html lang="it">
    <head>
        <title>WinStreaming - Homepage</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        <!-- Start Css Normalize -->
        <link href="CSS/Normalize.css" rel="stylesheet" type="text/CSS" />
        <!-- End Css Normalize -->

        <!-- Start Css Style -->
        <link href="CSS/Style.css" rel="stylesheet" type="text/CSS" />
        <!-- End Css Style -->

        <!-- Start VideoJS -->
        <link href="JavaScript/VideoJS/video-js.css" rel="stylesheet" type="text/CSS" />
        <script src="JavaScript/VideoJS/video.js"></script>
        <!-- End VideoJS -->
        
        <!-- Start Favicon -->
        <link href="Images/Logo.png" rel="icon" type="image/png" />
         <!-- End Favicon -->
    </head>
    <body>
    
    <div id="wrapper">
        <header>   
            <h1>WinStreaming</h1>

            <div id="logo">
                <a href="Index.php">
                    <img src="Images/Logo.png" alt="Logo"/>
                </a>
            </div>
        </header>

        <div id="space"></div>

        <main>
            
            <?php
                include "Source/function.php";

                getLinkPages();
            ?>

        </main>

        <div id="navBarTop">
            <h2>Vuoi Inserire un Nuovo Film/Serie TV ?</h2>
            <a class="otherPage" href="Source/addStreaming.php">Clicca qui!</a>
        </div>

        <div id="navBarBottom">
            <h2>Vuoi Cancellare un Film/Serie TV ?</h2>
            <a class="otherPage" href="#">Clicca qui!</a>
        </div>

        <footer>
            <p Style="color:#BFC4F4">Credits: WinEnzo</p>
        </footer>
    </div>

    </body>
</html>