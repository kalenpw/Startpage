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
            <?php 
                generateFrequentLinks();
            ?>
        </div>
		
		<h3>
		Quick Links
		</h3>
        <div id="quickLinkList">
            <?php
                
            $categories = [
                "School",
                "Work",
                "Programming",
                "Torrent",
                "Misc"
            ];

            for($i = 0; $i < count($categories); $i++)
            {
                $cat = $categories[$i];
                echo "<li id='$cat' class='quickLink'>$cat</li>";
                $path = "./Data/" . strtolower($cat) . "-links.json";
                generateQuicklinks($path, $cat);
            }

            ?>
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

<?php
            function generateQuicklinks($jsonFile, $type)
            {
                $string = file_get_contents($jsonFile);
                $json = json_decode($string, true);
                
                for($i = 0; $i < count($json); $i++)
                {
                    $title = $json[$i]["title"];
                    $url = $json[$i]["url"];
                    $link = formatQuickLink($url, $title, $type);
                    echo $link;
                }

            }   
            function formatQuickLink($url, $name, $className)
            {
                return "<a href='$url' class='quickLink hidden innerLink $className'>$name</a>";
            }

            function generateFrequentLinks()
            {


                $string = file_get_contents("./Data/frequent-links.json");
                $json = json_decode($string, true);

                for($i = 0; $i < count($json); $i++)
                {
                    $hotkey = $json[$i]["hotkey"];
                    $url = $json[$i]["url"];
                    $image = $json[$i]["image"];
                    $fullImage = "Images/$image";

                    echo "<div>";
                    echo "<p><span>$hotkey</span></p>";
                    echo "<a href='$url'><img class='icon' src='$fullImage' width='100px' height='100px' alt='$image'></a></div>";
                }

            }
?>
