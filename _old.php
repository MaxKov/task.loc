<?php
if($_POST){
    $data = ($_POST['data']);
    $text = htmlspecialchars($_POST['text']);
    $date = date("Y-m-d");
    $cont = $date . '|' . $data . '|' . $text . '#';
    writeFile($cont);
}

$cont = loadFile();

foreach($cont as $data)
{
    $sum = explode('#', $data);

    echo '<div class="container">';
    echo '<div class="row">';

    foreach($sum as $item)
    {
        $elem = explode('|', $item);
        if($item != NULL) {
            echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">' . $elem[0] . '</div>';
            echo '<div class="panel-body">' . $elem[2] . '</div>';
            echo '<div class="panel-footer">' . $elem[1] . '</div>';
            echo '</div>';
        }
    }

    echo '</div>';
    echo '</div>';

}

function writeFile($cont)
{
    $fp = fopen('data.txt', 'a+');
    fwrite($fp, $cont);
    fclose($fp);
}


function loadFile()
{
    $cont = file('data.txt');
    return $cont;
}
?>