<html>

<head>
<title> Drop-down app </title>
</head>

<body>

<div class="center">
<h2> Welcome to drop-down app </h2>
<br />
<form action="query.php" method="post">
<input type="text" name="subject">
<input type="hidden" name="parent_id" value="<?php echo isset($_GET['parent_id']); ?>">
<input type="submit">
</form>
</div>

<div>
<form action="http://robin/dropdown/delete.php">
    <input type="submit" value="Empty the database" />
</form>
</div>
<div>
<form action="http://robin/dropdown/dropdown.php">
    <input type="submit" value="Show the drop-down" />
</form>
</div>
<div>
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
                    $html .= '<li>' . $option['value']['name'] . "<a href='http://robin/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
                    $html .= '<ul>'; 
                    array_push( $parent_stack, $parent );
                    $parent = $option['value']['id'];
                }
                else
                $html .= '<li>' . $option['value']['name'] . "<a href='http://robin/dropdown/index.php?parent_id={$option['value']['id']}' style='text-decoration: none'> + </a>" . '</li>';
            }
            else
            {
                $html .= '</ul>';
                $parent = array_pop( $parent_stack );
            }
        }

        echo $html;
?>
</div>
</body>
</html>
