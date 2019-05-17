<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/sell.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/sell.css"/>
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
            <a onclick="btnToggle()" href="/login"><i class="fas fa-users"></i> Login</a>
            <a onclick="btnToggle()" href="#Location" class="hash-btn"><i class="fas fa-street-view"></i> Location</a>
            <a onclick="btnToggle()" href="#Price" class="hash-btn"><i class="fas fa-tags"></i> Price Range</a>
            <a onclick="btnToggle()" href="#Recomendation" class="hash-btn"><i class="fas fa-search"></i> Recomendation</a>
            <a onclick="btnToggle()" href="#Keyword" class="hash-btn"><i class="fas fa-book"></i> Keyword</a>
            <a onclick="btnToggle()" href="/account/seller" class="upload-btn"> Sell a house</a>
        </div>
        <div class="nb-tab-2"></div>
    </div>

    <div class="content">
        <div class="header">
            <div class="left">
                <button onclick="btnToggle()" class="m-menu"><i class="fas fa-bars"></i></button>
                <form>
                    <input type="text" placeholder="search me"/>
                    <button><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="right">
                <a href="#">Sell a Home</a>
                <button></button>
            </div>
        </div>
        
        <div class="filter">
            <!--Filter Option-->
        </div>
        
        <div class="list">
            <a class="item" href="/house"></a>
        </div>
    </div>
    
    
    
</body>
</html>
