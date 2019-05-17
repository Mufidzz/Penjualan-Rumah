<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/login.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/login.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/views/lib/jQuery.js"></script>
    
    <script>
        function btnToggle(){
          $("#navigation-bar").toggleClass("unhide");
        }
        
        function ajaxKelurahan(){
          $.ajax({
              type: "POST",
              url:
          })   
        }
    </script>
</head>

<body>    
    <div class="main-container">
        <div class="logo">
            <img src="/views/img/logo-color.png">
        </div>
        <form id="form-login">
            <input type="text" name="username" placeholder="username"/>
            <input type="text" name="password" placeholder="password"/>
        </form>
        <div class="Navigator">
            <button form="form-login" formmethod="post">Login</button>
            <a href="/register">Not yet a member ? Register</a>
        </div>
        
    </div>
     <a href="/">Back to homepage</a>
</body>
</html>
<?php
session_start();


if(isset($_POST["username"])){
    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/login.php",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode(array(
            "username" => $_POST["username"],
            "password" => $_POST["password"]
        ))
    ]);

    $resp = curl_exec($curl);
    $msg = curl_error($curl);

    $resp_arr = json_decode($resp);


    $_SESSION["Access-Token"] = $resp_arr->jwt;
    curl_close($curl);
}

if(isset($_SESSION["Access-Token"])){
    header("Location: /user");
}
