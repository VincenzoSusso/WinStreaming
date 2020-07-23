<!DOCTYPE html>
 <html lang="it">
    <head>
        <title>WinStreaming - Add Streaming</title>
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
                <h2>Istruzioni</h2>

                <p>Per poter inserire un Film/Serie TV all'interno del sito dovrai copiare una cartella che dovrà avere il
                    nome del film o della Serie TV all'interno della cartella "Videos".<br />
                    Una volta aggiunta la cartella dovrai inserire il nome della cartella nel form sottostante, 
                    da quel momento in poi potrai visionare il Film/Serie TV nella pagina dedicata alla visualizzazione. <br />
                    P.S Il nome della cartella deve essere univoca, altrimenti potrebbero esserci degli errori.
                </p>
            </div>

            <div style="margin-top:30px; margin-bottom:30px">
                <h2>Inserisci streaming:</h2>
                <form style="margin-top:25px;margin-left:2%;margin-right:2%;" action="addStreaming.php">
                    <label for="fname">Nome della cartella:</label>
                    <input type="text" id="directoryName" name="directoryName" />
                    <br /> <br />
                    <input type="submit" value="Invio">
                    <input type="reset" value="Reset">
                </form>
            </div>
        </main>

        <div id="navBarTop">
            <h2>Vuoi Ritornare a Guardare Film/Serie TV ?</h2>
            <a class="otherPage" href="./../Index.php">Clicca qui!</a>
        </div>

        <div id="navBarBottom">
            <h2>Vuoi Cancellare un Film/Serie TV ?</h2>
            <a class="otherPage" href="#">Clicca qui!</a>
        </div>

        <footer>
            <p Style="color:#BFC4F4">Credits: WinEnzo</p>
        </footer>

    </div>

    <?php
        include "function.php";
        if(isset($_GET["directoryName"])) { 
            $directoryName = $_GET["directoryName"];
            if(isValidDirectory($directoryName)) {
                saveDirectoryFile($directoryName);
                createHTMLPage($directoryName);
                //Display ok msg
            } else {
                //Display Red Error msg
            }
        }
    ?>

    </body>
</html>