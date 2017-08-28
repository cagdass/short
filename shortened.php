<html>
    <head>
        <meta id="meta" name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="./shortstyle.css">
    </head>
    <body background="./short.png"><center style="margin: 20%">
    <script src="https://cdn.jsdelivr.net/npm/clipboard@1/dist/clipboard.min.js"></script>
    
    <?php
        $url = $_POST["url"];
        $short = $_POST["short"];
        $key = $_POST["key"];        

	// Root directory of nginx, could be /usr/share/nginx/www in newer versions, beware.
        $pwd = "/usr/share/nginx/html/";
        $dirShort = $pwd.$short;
	$dir = $dirShort."/index.html";
	// Add http:// to the URL if it does not have it.
        if(substr($url,0,4) != "http"){
            $url = "http://".$url;
        }
	// Change to your own key.
        if($key == ""){
	    // The short keyword already exists.
            if(file_exists($dir)){
                echo "<br>Such a shortened wording already exists, try another one.</br>";
            }
            else{
		// Create a new directory in the root directory and add an index.html file that'll redirect to the given URL
                if(!is_dir($dirShort)){
                    mkdir($dirShort, 0777, true);
                    $indexFile = fopen($dir, "w");
                    fwrite($indexFile ,"<html>\n\t<script>\n\t\twindow.location = \"".$url."\";\n\t\t</script>\n\t</html>");
                    $res = "http://cgds.me/".$short;
                    echo "<br>Shortened URL ready to use. <a style='text-align:center' href='".$res."'>Go there!</a><br/><br/>";
		    echo "<br><a style=';text-decoration: underline;cursor: pointer;text-align:center' class='btn' data-clipboard-text='".$res."'>Copy Link</a>";

                }
                else{
                    echo "<br>This short link already exists";
                }
            }
        }
	// Wrong key.
        else{
            echo "Sorry! Wrong handle.";
        }
    ?>
    <script>
    var clipboard = new Clipboard('.btn');
    clipboard.on('success', function(e) {
        console.log(e);
    });
    clipboard.on('error', function(e) {
        console.log(e);
    });
    </script>
    </center></body>
</html>
