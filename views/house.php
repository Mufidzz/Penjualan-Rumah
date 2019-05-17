<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/house.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/house.css"/>
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
                <div class="search-bar-container">
                    <form>
                        <input type="text" name="keyword" placeholder="search me"/>
                        <button><i class="fas fa-search"></i></button>
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
        
        <div class="product-content">
            <div class="image-box">
                <div class="image-main">
                    <img src="/views/img/test-image.jpg"/>
                </div>
                <div class="image-list">
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                    <img src="/views/img/test-image.jpg"/>
                </div>
            </div>
            
            <div class="description-box">
                <div class="left-box">
                    <label for="judul">Rumah Tipe 34 - Dokumen Lengkap</label>

                    <label for="alamat">Jl Simpang KH. Yusuf</label>
                    <label for="alamat">Tasikmadu, Lowokwaru</label>
                    <label for="alamat">Kota Malang</label>
                    
                    <div class="document">
                        <label for="title">Document</label>
                    </div>
                </div>
                <div class="right-box">
                    <label for="price">
                        Rp 500.000.000
                    </label>
                    <label for="price-prop">
                        Negotiable
                    </label>
                    <br/>
                    <button class="blue"><i class="fas fa-credit-card"></i> Buy via  FindHome</button>
                    <button><i class="fab fa-whatsapp"></i> Hubungi Penjual</button>
                </div>
            </div>
            
        </div>
    </div>
    
    
    
</body>
</html>
