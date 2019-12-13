<?php  include "head.php";
session_start();
?>

<html>
    <style>
    .notif{
        font-size: large;
    }
    </style>
    <body>
    <p class="notif"> Do you want to recieve your notifications? </p> 
        <button type=”button” onclick = "on()" name=”affirmative” value=”yes” checked>Yes</button>
        <button type=”button” onclick = "off()" name=”negative” value=”no”>No</button>
    </body>
    <script>
    function on()
    {
        alert("Notifictations have been turned on!!!");
        location.replace("notif_on.php");
    }
    function off()
    {
        alert("Notifictations have been turned off!!!");
        location.replace("notif_off.php");
    }
    </script>
</html>
