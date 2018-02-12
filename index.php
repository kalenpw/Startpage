<!DOCTYPE HTML>
<HTML>
	<head>
		<title>
		Homepage
        </title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
		<script src="Homepage.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Gloria+Hallelujah' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	
	<body id="body">
        <h6 id="date">
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
    			<a href="http://elearn.isu.edu">
    				<img class="icon" src="Images/moodle.png" width="100px" height="100px" alt="Moodle">
    			</a>
            </div>

    		<div>
    			<p><span>6</span></p>
    			<a href="http://www.netflix.com">
    				<img class="icon" src="Images/netflix.png" width="100px" height="100px" alt="Netflix">
    			</a>
            </div>

    		<div>
    			<p><span>7</span></p>
    			<a href="https://mail.protonmail.com/login">
    				<img class="icon" src="Images/protonMail.png" width="100px" height="100px" alt="Proton Mail">
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
            }
            fclose($todoFile);

        ?>
        </ul>
        </div>
        
	</body>
</HTML>
