<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/global.css"/>
    <link rel="stylesheet" type="text/css" href="css/sell.css"/>
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
            <div class="left-side-option-container">

            </div>
        </div>
        <div class="right-side-container">
            <?php
            for($i = 0; $i<15 ; $i++){
                echo '<div class="item-card"></div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
