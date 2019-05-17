<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/index.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/views/lib/jQuery.js"></script>
    
    <script>
        function btnToggle(){
          $("#navigation-bar").toggleClass("unhide");
        }
    </script>
</head>
<body>
    <div id="navigation-bar" class="navigation-bar">
        <div class="logo">
            <img src="/views/img/logo-color.png">
        </div>
        <div class="nb-tab-1">
            <a onclick="btnToggle()" href="/" class="page-active"><i class="fas fa-th-large"></i> Homepage</a>
            <a onclick="btnToggle()" href="/sell"><i class="fas fa-couch"></i> Selling List</a>
            <a onclick="btnToggle()" href="/register"><i class="fas fa-users"></i> Register</a>
            <a onclick="btnToggle()" href="#Location" class="hash-btn"><i class="fas fa-street-view"></i> Location</a>
            <a onclick="btnToggle()" href="#Price" class="hash-btn"><i class="fas fa-tags"></i> Price Range</a>
            <a onclick="btnToggle()" href="#Recomendation" class="hash-btn"><i class="fas fa-search"></i> Recomendation</a>
            <a onclick="btnToggle()" href="#Keyword" class="hash-btn"><i class="fas fa-book"></i> Keyword</a>
            <a onclick="btnToggle()" href="/user/house/add" class="upload-btn"> Sell a house</a>
        </div>
    </div>

    <div class="content">
        <div class="utility-bar">
            <div class="left-bar">
                
                <div class="carousel-navigation">
                    <button onclick="btnToggle()" class="m-menu"><i class="fas fa-bars"></i></button>
                    <button><i class="fas fa-chevron-left"></i></button>
                    <button><i class="fas fa-chevron-right"></i></button>
                </div>
                <div class="search-bar-container">
                    <form>
                        <input type="text" name="keyword" placeholder="search me"/>
                    </form>
                </div>
            </div>
            <div class="right-bar">
                <div class="user-utility">
                    <?php 
                    session_start();
                     if(isset($_SESSION["Access-Token"])){
                        echo '<button></button>';
                     }else{
                        echo '<a href="/login">Login</a>';     
                     }
                    
                    ?>
                </div>
            </div>
        </div>

        <div class="carousel">
            <!--img-->
            <!--img-->
            <!--img-->
        </div>

        <div class="location-bar" id="Location">
            <div class="title-bar">
                <label>Location</label>
            </div>

            <div class="item-bar">
                <div class="item" style="Background : url('/views/img/Thumb-Blimbing.jpg') no-repeat center;Background-size: cover;">
                    <label>Blimbing</label>
                </div>
                <div class="item" style="Background : url('/views/img/Thumb-Klojen.jpg') no-repeat center;Background-size: cover;">
                    <label>Klojen</label>
                </div>
                <div class="item" style="Background : url('/views/img/Thumb-Kedungkandang.jpg') no-repeat center;Background-size: cover;">
                    <label>Kedungkandang</label>
                </div>
                <div class="item" style="Background : url('/views/img/Thumb-Sukun.jpg') no-repeat center;Background-size: cover;">
                    <label>Sukun</label>
                </div>
                <div class="item" style="Background : url('/views/img/Thumb-Lowokwaru.jpg') no-repeat center;Background-size: cover;">
                    <label>Lowokwaru</label>
                </div>
            </div>
        </div>

        <div class="price-bar" id="Price">
            <div class="title-bar">
                <label>Price Range</label>
            </div>

            <div class="item-bar">
                <a href="" class="item">100 Juta - 200 Juta</a>
                <a href="" class="item">201 Juta - 500 Juta</a>
                <a href="" class="item">500 Juta - 750 Juta</a>
                <a href="" class="item">1M - 1,5 M</a>
                <a href="" class="item">2M - 2,5 M</a>
            </div>
        </div>

        <div class="hot-list-bar" id="Recomendation">
            <div class="title-bar">
                <label>Our Recomendation</label>
            </div>

            <div class="item-bar">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
            </div>
        </div>

        <div class="keyword-bar" id="Keyword">
            <div class="title-bar">
                <label>Keyword</label>
            </div>

            <div class="item-bar">
                <a href="#">rumah 54</a>
                <a href="#">rumah baru 72</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 52</a>
                <a href="#">rumah 74</a>
            </div>

        </div>
    </div>  
</body>
</html>
