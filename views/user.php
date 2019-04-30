<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <link rel="stylesheet" type="text/css" href="css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="css/user.css"/>
</head>
<body>
    <div class="header-container">
        <div class="left-side-container">
            <img class="logo" src="img/Logo.png"/>
        </div>
        <div class="middle-side-container">
            <form>
                <input type="input">
                <button>G</button>
            </form>
        </div>
        <div class="right-side-container">
            <a href="#">Sell House</a>
            <div class="user-container"></div>
        </div>
    </div>
    <div class="content-container">
        <div class="left-side-container">
            <div class="user-card">
                <img class="profile-pict">
                <label for="user-username">{username}</label>
                <a href="#">Edit Profile</a>
            </div>
        </div>
        <div class="right-side-container">
            <div class="header">
                <label>My Listing</label>
                <button>Add</button>
            </div>
            <div class="content">
                <?php
                for($i = 0; $i<15 ; $i++){
                    echo '<div class="item-card"></div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
