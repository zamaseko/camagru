<?php
 include "head.php";
 session_start();
 $use = $_SESSION['vkey'];
 ?>
<html>
<style>
*{
    box-sizing: border-box;
}
	a.logout{
	color: blue;
    font-size: medium;
    text-decoration: none;
    float: right;
	}
	a.settings {
    color: blue;
    font-size: medium;
    text-decoration: none;
    float: right;
}
a.buy:hover
{
    color: #f90;
    text-decoration: underline;         
}
.inrow
			{
				display: flex;
            }
.caption_text{
	font-weight: bold;
	padding: 6px;
	font-size: 16px;
}
</style>
<body>

<?php
    if(isset($_GET['remove']) && $_GET['remove'] == 'delete')
    {
        if(isset($_GET['id']))
        {
            try{
                $image_id = $_GET['id'];
                echo $use;
            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


?>



</body>
</html>