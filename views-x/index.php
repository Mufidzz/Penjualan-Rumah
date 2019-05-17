<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views-x/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views-x/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/views-x/css/m/index.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="content-container">
        <div class="page no1">
            <div class="carousel-conainer">
                <div class="search-bar-container">
                    <a class="mobile-nav" href="#">Menu</a>
                    <form>
                        <input type="text" placeholder="Search here"/>
                        <button>G</button>
                    </form>
                    <a class="mobile-nav" href="#">Login</a>

                </div>

                <div class="main-image-container"></div>
                <div class="list-image-container">
                    <div class="item no1"></div>
                    <div class="item no2"></div>
                    <div class="item no3"></div>
                    <div class="item no4"></div>
                </div>
            </div>
            <div class="sidebar-container">
                <div class="account-utility-container">
                    <img src="/views/img/Logo-wh.png"/>
                </div>
                <div class="items-container">
                    <a href="/login">Sign in</a>
                    <a href="/register">Register</a>
                </div>
            </div>
        </div>
        <div class="page no2">

            <div class="sell-list-container">
                <div class="header">
                    <label for="sell-list-container-header">
                        Kecamatan
                    </label>
                    <label for="see-all-sell-list-container-header">
                        All House
                    </label>
                </div>
                <div class="content">
                    <?php
                    for($i = 0; $i<15 ; $i++){
                        echo '<div class="item-card"></div>';
                    }
                    ?>
                </div>
            </div>

            <div class="sell-list-container">
                <div class="header">
                    <label for="sell-list-container-header">
                        Kecamatan
                    </label>
                    <label for="see-all-sell-list-container-header">
                        All House
                    </label>
                </div>
                <div class="content">
                    <?php
                    for($i = 0; $i<15 ; $i++){
                        echo '<div class="item-card"></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="sell-list-container">
                <div class="header">
                    <label for="sell-list-container-header">
                        Kecamatan
                    </label>
                    <label for="see-all-sell-list-container-header">
                        All House
                    </label>
                </div>
                <div class="content">
                    <?php
                    for($i = 0; $i<15 ; $i++){
                        echo '<div class="item-card"></div>';
                    }
                    ?>
                </div>
            </div>
            <div class="sell-list-container">
                <div class="header">
                    <label for="sell-list-container-header">
                        Kecamatan
                    </label>
                    <label for="see-all-sell-list-container-header">
                        All House
                    </label>
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
    </div>
</body>

</html>
