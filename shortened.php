<html>
    <head>
        <meta id="meta" name="viewport"
                content="width=device-width, initial-scale=1.0" />
                <link rel="stylesheet" type="text/css" href="./shortstyle.css">
    </head>
<body background="./short.png"><center style="margin-top: %20">
    <?php
	error_reporting(E_ALL);
ini_set('display_errors', '1');

        $url = $_POST["url"];
        $short = $_POST["short"];
        $key = $_POST["key"];
        
        $servername = "localhost";
        $username = "";
        $password = "";
        $dbname = "";


        $pwd = "/usr/share/nginx/html/";
        $dirShort = $pwd.$short;
        $dir = $dirShort."/index.html";
        if(substr($url,0,4) != "http"){
            $url = "http://".$url;
        }
        if($key == "aajsgfjka"){
            if(file_exists($dir)){
                echo "<br>Such a shortened wording already exists, try another one.</br>";
            }
            else{
                if(!is_dir($dirShort)){
		    echo $dirShort;
		    echo __FILE__;
                    mkdir($dirShort, 0777, true);
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

    </center></body>
</html>
