<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/register.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/m/register.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/navbar.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/m/navbar.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="header-container">
        <div class="left-side-container">
            <img class="logo" src="/views/img/Logo-wh.png"/>
        </div>
    </div>
    <div class="content-container">
        <?php $msg = ""; echo $msg?>
        <label>Sign Up</label>
        <form >
            <input name="name" type="text" placeholder="name">
            <input name="username" type="text" placeholder="username">
            <input name="password" type="password" placeholder="password">
            <input name="whatsapp" type="number" placeholder="whatsapp number">
            <button name="btnSignIn" formmethod="post">Sign in</button>
        </form>
        <a href="/login">already member? sign in</a>
    </div>
</body>
</html>

<?php

if(isset($_POST["btnSignIn"])){
   $curl = curl_init();

   curl_setopt_array($curl,[
           CURLOPT_RETURNTRANSFER => 1,
       CURLOPT_URL => "http://localhost/api/gateaway/user.php",
       CURLOPT_POST => 1,
       CURLOPT_POSTFIELDS => json_encode(array(
               "username" => $_POST["username"],
               "password" => $_POST["password"],
               "whatsapp" => $_POST["whatsapp"]
       ))
   ]);
    $resp = curl_exec($curl);
    $msg = curl_error($curl);
    curl_close($curl);

}
