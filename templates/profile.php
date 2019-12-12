





<div class="wrapper">
    <div id="user-sidebar">
    <img id="profile_pic" src="../images/profile.png" alt="profile picture">
    <img id="average_rating" src="../images/Average Rating.png" alt="rating">
    <p><?php echo $_SESSION['firstName'] . "'s average rating"?></p>
    </div>
    <div id="user">
        <section id="user-info">
            <h1><?php echo $_SESSION['firstName'] . " " . $_SESSION['lastName']; ?></h1>
            <p> Member since October 25, 2019 </p>
            <p> eU sOU uM rAPAZINHO eMBORA pEQUENINO tENHO mUITO tINO sOU o rUcA </p>
        </section>
        <section id="user-places">
            <h3> My places </h3>
            <div id="places">
            <div id="place1">
            <img id="room_img" src="../images/room.png" alt="room">
            <h4> Clégiros Room</h4>
            </div>
            <div id="room2">
            <img id="room_img" src="../images/room2.png" alt="room">
            <h4>Ilhas Douro</h4>
            </div>
            </div>
        </section>
    </div>
</div>

<footer id="black-footer">