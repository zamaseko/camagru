<?php  include "head.php" ?>

<html>
    <style>
    .notif{
        font-size: large;
    }
    </style>
    <body>
    <p class="notif"> Do you want to recieve your notifications? </p> 
        <button type=”checkbox” onclick="window.location.href='notif_on.php';" name=”affirmative” value=”yes” checked>Yes</button>
        <button type=”radio” onclick="window.location.href='notif_off.php';"name=”negative” value=”no”>No</button>
    </body>

</html>
<?php
 

?>