<!DOCTYPE HTML>
<HTML>
	<head>
		<title>
		Homepage
        </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
		<script src="Homepage.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- TODO open links on keypress  -->
	</head>
	
	<body id="body" onkeydown="keypressed(event)">
        <h6 id="date">
            <?php
                //echo (date("l Y-m-d") . "<br/>" . date("H:i:s")) ;
            ?>
        </h6>
        <br>

		<h3>
		Frequented
		</h3>
        <div id="freqLinks">
    		<div>
    			<p><span>1</span></p>
    			<a href="https://4chan.org/vg/vsg">
    				<img class="icon" src="Images/4chan.png" width="100px" height="100px" alt="Facebook">
    			</a>
    		</div>
            <div>
    			<p><span>2</span></p>
    			<a href="http://kalenpw.com:5222">
    				<img class="icon" src="Images/emby.png" width="100px" height="100px" alt="Emby">
    			</a>
    		</div>
    		<div>
    			<p><span>3</span></p>
    			<a href="https://mail.google.com/mail/">
    				<img class="icon" src="Images/gmail.png" width="100px" height="100px" alt="Gmail">
    			</a>
    		</div>
            <div>
                <p><span>4</span></p>
                <a href="https://github.com/kalenpw">
                    <img class="icon" src="Images/github.png" width="100px" height="100px" alt="GitHub">
                </a>
            </div>
    		<div>
    			<p><span>5</span></p>
    			<a href="http://kalenpw.com">
    			    <img class="icon" src="Images/khalidor.png" width="100px" height="100px" alt="Khalidor">
    			</a>
    		</div>
    		<div>
    			<p><span>6</span></p>
    			<a href="http://elearn.isu.edu">
    				<img class="icon" src="Images/moodle.png" width="100px" height="100px" alt="Moodle">
    			</a>
    		</div>
    		<div>
    			<p><span>7</span></p>
    			<a href="http://www.netflix.com">
    				<img class="icon" src="Images/netflix.png" width="100px" height="100px" alt="Netflix">
    			</a>
    		</div>
    		<div>
    			<p><span>8</span></p>
    			<a href="http://www.reddit.com">
    				<img class="icon" src="Images/reddit.png" width="100px" height="100px" alt="Reddit">
    			</a>
    		</div>
    		<div>
    			<p><span>9</span></p>
    			<a href="http://www.twitter.com">
    				<img class="icon" src="Images/twitter.png" width="100px" height="100px" alt="Twitter">
    			</a>
    		</div>
    		<div>
    			<p><span>0</span></p>
    			<a href="http://www.youtube.com">
    				<img class="icon" src="Images/youtube.png" width="100px" height="100px" alt="Youtube">
    			</a>
    		</div>
        </div>
		
		<h3>
		Quick Links
		</h3>
		<div id="quickLinkList">

        </div>
        
        <h3>
            //TODO
        </h3>
        
        <div id="todoDisplay">
        <ul id="todoList">
        <?php
            $todoFile = fopen('./todo.txt', 'r');
            while($line = fgets($todoFile)) {
                $formatted = '<li class="todoItem">' . $line . '</li>';
                echo $formatted;
                //echo $line;
                
            }
            fclose($todoFile);

        ?>
        </ul>
        </div>
        
        <h3>Info 4430 Links</h3>
        <div id="homework">
            <?php
                  
                $dir = "./Homework/";
                if(is_dir($dir)){
                    if($dh = opendir($dir)){
                        while(($file = readdir($dh)) !== false){
                            if(is_file("Homework/".$file)){
                                if(strlen($file) > 3){
                                    echo(createHwLink($file));
                                }
                            }
                        }
                        closedir($dh);
                    }
                }
                function createHwLink($url){
                    $formatted = "<a href='./Homework/" . $url . "' class='quickLink'>" . $url . "</a>";
                    return $formatted;
                }
            ?>
        </div>


	</body>
</HTML>
