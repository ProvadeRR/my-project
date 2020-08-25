<?php
foreach ($array as $post)
{
    if($post['avaibility'] == true)
    {
        echo "<h1> {$post['title']} </h1>";
        echo "<p> {$post['small_text']} </p>";
        echo "<h3> Автор: {$post['name']} </h3>";
    }
}