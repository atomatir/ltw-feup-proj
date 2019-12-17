<?php
  require_once "../database/session.php";
?>

<script>
var userID = <?php echo $_SESSION['userID']; ?> 
var placeID = <?php echo $_GET['placeID']; ?> 
</script>



<form id="reserve-form" action="">
  <input class="range-date black_input" id="dateinpt" name="dates" required onkeypress="return false;" autocomplete="off">
  <div id="total-price"></div>
  <button id="login_button" class="submit_button" type="submit" >Submit</button>
</form>

<?php require_once "../templates/datepickers.php";?>
<script src="../scripts/reserve.js"></script>