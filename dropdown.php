<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Drop-down menu</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="main.css">
</head>
<body>
<div>
<form action="http://localhost/dropdown/index.php">
    <input type="submit" value="Back to homepage" />
</form>
</div>

<?php

include "conn.php";

$query = "SELECT id, parent_id, name FROM NavMenu ORDER BY parent_id";
$result = mysqli_query($conn,$query);
$parent = 0;
$parent_stack = array();
$children = array();

foreach ( $result as $item )
    $children[$item['parent_id']][] = $item;

$html = "<ul id='nav'>";
while ( ( $option = each( $children[$parent] ) ) || ( $parent > 0 ) )
        {
            if ( !empty( $option ) )
            {
                if ( !empty( $children[$option['value']['id']] ) )
                {
                    $html .= "<li> <a href='#'>" . $option['value']['name'] . "</a>";
                    $html .= "<ul>";
                    array_push( $parent_stack, $parent );
                    $parent = $option['value']['id'];
 		    $html .= "</li>";
                }
                else
                $html .= "<li> <a href='#'>"  . $option['value']['name'] . "</a></li>";
            }
            else
            {
                $html .= '</ul>';
                $parent = array_pop( $parent_stack );
            }
        }

        echo $html;
?>

</body>
</html>
