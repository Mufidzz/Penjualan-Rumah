<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/user.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/user.css"/>
    
	<link rel="stylesheet" type="text/css" href="/views/css/add-home.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/change-password.css"/>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/views/lib/jQuery.js"></script>
    
    <script>
        function btnToggle(){
          $("#navigation-bar").toggleClass("unhide");
        }
    </script>
</head>
<body>
    
    <div class="utility-bar">
            <div class="left-bar">
                
                <div class="carousel-navigation">
                    <button onclick="btnToggle()" class="m-menu"><i class="fas fa-bars"></i></button>
                </div>
            </div>
            <div class="right-bar">
                <div class="user-utility">
                    <button></button>
                </div>
            </div>
        </div>
    
    <div id="navigation-bar" class="navigation-bar">
        <div class="logo">
            <img href="/" src="/views/img/logo-color.png">
        </div>
        <div class="nb-tab-1">
            <a  href="/user/change-password" class="page-active"><i class="fas fa-users"></i> Change Password</a>
            <a  href="/logout" class="page-active"><i class="fas fa-users"></i> Logout</a>
            
            <!--a  href="/user?action=house-all" class="hash-btn"><i class="fas fa-home"></i> My House</a-->
             
            <a  href="/user/house/add" class="upload-btn"> Sell a house</a>
        </div>
        <div class="nb-tab-2"></div>
    </div>
    
    <div class="content">
        <?php
        error_reporting(0);
            $request = explode('/',$_SERVER['REQUEST_URI'],3);
            
            switch ($request[2]) {
                case 'house/add' :
                    require __DIR__ . "/assets/account/add-home.php";
                    break;

                case 'house/add' :
                    require __DIR__ . "/assets/account/add-home.php";
                    break;
                default:
                    require __DIR__ . "/assets/account/change-password.php";
                    break;
            }
         ?>
    </div>
</body>
</html>