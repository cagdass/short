<html>
        <head>
                <meta id="meta" name="viewport"
                content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="shortstyle.css">
        </head>
        <body background="../short.jpg">
	<?php
	    $servername = "";
	    $username = "";
	    $password = "";
        $dbname = "short";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
        //    die("Connection failed: " . $conn->connect_error);
        }
        else{
            mysqli_query($conn, "INSERT INTO short VALUES (".$_SERVER['HTTP_USER_AGENT'].", ".$_SERVER['HTTPS'].", ".$_SERVER['REMOTE_ADDR'].", ".$_SERVER['REMOTE_HOST'].", ".$_SERVER['REMOTE_PORT'].", ".$_SERVER['REMOTE_USER'].", ".$_SERVER['REDIRECT_REMOTE_USER'].", NOW(), ".$_SERVER['HTTP_REFERER'].");");
        }
        mysqli_close($conn);
            
    ?> 


            <form action="shortened.php" method="post">
                <div align="center" style="margin-top:2cm">
                	<p><b>Neither the URL nor the short version <wbr>can include whitespace or weird dipshit characters like ^?^?^?*$#.<b></p>
	                <input class="input" type="text" name="url" autofocus="on" placeholder="URL to be shortened" required="required"><br>
	                <input class="input" type="text" name="short" placeholder="Short version" required="required"><br>
	                <input class="input" type="text" name="key" placeholder="Premium token" required="required"><br>
	                <input class="input" type="submit">
	            </div>	            
                </form>

        </body>
</html>



