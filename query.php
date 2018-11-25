<?php
include "conn.php";

if($_POST['parent_id'] == 0)
{
	$sql = "INSERT INTO NavMenu (parent_id, name) VALUES (0,'{$_POST["subject"]}')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully" . "<br />";
	} else {
    	echo "Error: " . $sql . "<br />" . mysqli_error($conn);
	}

        include "index.php";

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
            	    $html .= '<li>' . $option['value']['name'] . "<a href='http://localhost/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
            	    $html .= '<ul>'; 
            	    array_push( $parent_stack, $parent );
            	    $parent = $option['value']['id'];
        	}
            	else
            	$html .= '<li>' . $option['value']['name'] . "<a href='http://localhost/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
    	    }
    	    else
    	    {
        	$html .= '</ul>';
        	$parent = array_pop( $parent_stack );
    	    }
	}

	echo $html;
}


if($_POST['parent_id'] > 0)
{
	$sql="INSERT INTO NavMenu (parent_id, name) VALUES ('{$_POST["parent_id"]}','{$_POST["subject"]}')";

	if (mysqli_query($conn, $sql)) {
    	echo "New record created successfully" . "<br />";
	} else {
    	echo "Error: " . $sql2 . "<br />" . mysqli_error($conn);
	}

	include "index.php";

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
                    $html .= '<li>' . $option['value']['name'] . "<a href='http://localhost/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
                    $html .= '<ul>';
                    array_push( $parent_stack, $parent );
                    $parent = $option['value']['id'];
                }
                else
                $html .= '<li>' . $option['value']['name'] . "<a href='http://localhost/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
            }
            else
            {
                $html .= '</ul>';
                $parent = array_pop( $parent_stack );
            }
        }

        echo $html;
}

?>
