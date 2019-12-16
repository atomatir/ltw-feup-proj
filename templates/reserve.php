<?php
  require_once "../database/session.php";


    if(!isset($_GET['placeID'])){
        header("Location: " . $_SERVER['HTTP_REFERER']);
        die();
    }

    if(!isset($_SESSION['userID'])){
      header("Location: " . "../pages/login-page.php");
      die();
    }


?>


<script>
var userID = <?php echo $_SESSION['userID']; ?> 
var placeID = <?php echo $_GET['placeID']; ?> 
</script>



<div id = "outer-form">

<form id="reserve-form" action="">
  <input class="range-date" id="dateinpt" name="dates" required>
  <button id="submit" class="submit-button" type="submit" >Submit</button>
</form>

</div>

<?php require_once "../templates/datepickers.php";?>
<script src="../scripts/reserve.js"></script>