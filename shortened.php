<html>
    <head>
        <meta id="meta" name="viewport"
                content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" type="text/css" href="shortstyle.css">
    </head>
    <body background='../short.jpg' align='center'>
    <?php
        $url = $_POST["url"];
        $short = $_POST["short"];
        $key = "$0";
        

        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            mysqli_query($conn, "INSERT INTO short VALUES (".$_SERVER['HTTP_USER_AGENT'].", ".$_SERVER['HTTPS'].", ".$_SERVER['REMOTE_ADDR'].", "
                .$_SERVER['REMOTE_HOST'].", "
                .$_SERVER['REMOTE_PORT'].", "
                .$_SERVER['REMOTE_USER'].", "
                .$_SERVER['REDIRECT_REMOTE_USER'].", NOW(), "
                .$_SERVER['HTTP_REFERER'].", ".
                $url.", ".$short.", ".$_POST['key'].");");
        }
        mysqli_close($conn);


        $pwd = "/usr/share/nginx/www/";
        $dirShort = $pwd.$short;
        $dir = $dirShort."/index.html";
        if(substr($url,0,4) != "http"){
            $url = "http://".$url;
        }
        if($key == "$0"){
            if(file_exists($dir)){
                echo "<br>Such a shortened wording already exists, try another one.</br>";
            }
            else{
                if(!is_dir($dirShort)){
                    mkdir($dirShort);
                    $indexFile = fopen($dir, "w");
                    fwrite($indexFile ,"<html>\n\t<script>\n\t\twindow.location = \"".$url."\";\n\t\t</script>\n\t</html>");
                    echo "<br>Shortened URL ready to use. <a style='text-align:center' href='http://cgds.me/".$short."'>Click!</a></br>";
                }
                else{
                    echo "<br>Directory already exists</br>";
                }
            }
        }
        else{
            echo "Sorry! Wrong handle.";
        }

    ?>

    </body>
</html>
