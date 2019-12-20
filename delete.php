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

                $smtp = $connect->prepare("DELETE FROM media WHERE media . media_id = $image_id ");
                // $smtp2= $connect->prepare("DELETE FROM comments WHERE comments . media_id = $image_id ");
                //$smtp = $connect->prepare("DELETE FROM likes WHERE media . media_id = $image_id ");
                if($smtp ->execute())
                {
                    echo '<script language="javascript">alert("Image Deleted")</script>';
                    header("refresh:0.5; url=profile.php");
                }
                

            }catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }


?>



</body>
</html>