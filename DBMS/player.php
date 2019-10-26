<html>
    <body bgcolor="black">
    <div style="align-content: center;">
    <video width="1500" height="700" controls>
        <?php
          $q = $_REQUEST['q'];
          echo("<source src='$q' type='video/mp4'>");
          echo($q);
        ?>
    </video>
</div>
</body>
</html>