<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "./NoteUtil.php";

\NoteUtil::convertToHtml();
\NoteUtil::generateLinks();


?>


<style>
    *{
        padding: 5px;
        color: #D8D8D8;
        background-color: #333333;
    }
    body{
        display: flex;
        flex-wrap: wrap;
        column-count: 3;
    }
    a{
        width: 33%;
        flex: 1 0 21%;
        text-decoration: none;
        width: 100%;
        height: 100%;
        border: 1px solid black;
    }



</style>