<html>
<head>
    <link rel="stylesheet" type="text/css" href="/views/lib/font-awesome/css/all.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/fonts.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/global.css"/>
    <link rel="stylesheet" type="text/css" href="/views/css/register.css"/>
	<link rel="stylesheet" type="text/css" href="/views/css/m/register.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/views/lib/jQuery.js"></script>
    
    <script>
        function btnToggle(){
          $("#navigation-bar").toggleClass("unhide");
        }
        
        function ajaxKelurahan(){
            $.ajax({
            type: 'POST',  
            url: '/views/assets/addressProcessor.php', 
            data: { id_kec: $("#kecamatan").val() },
            success: function(response) {
                console.log(response);
                $("#kelurahan").html(response);
            }
            });
        }
    </script>
</head>

<body>    
    <div class="main-container">
        <div class="logo">
            <img src="/views/img/logo-color.png">
        </div>
        <form id="form-register" method="post">
            <input type="text" name="name" placeholder="name"/>
            <input type="text" name="username" placeholder="username"/>
            <input type="text" name="password" placeholder="password"/>
            <input type="text" name="whatsapp" placeholder="whatsapp"/>
            <input type="text" name="alamat" placeholder="alamat"/>
            
            <div class="kecamatan-kelurahan">
                <select onchange="ajaxKelurahan()" id="kecamatan">
                    <option SELECTED disabled>Kecamatan</option>
                    <?php
                        loadKecamatan();
                    ?>
                </select>
                <select id="kelurahan">
                    <option selected disabled>Kelurahan</option>
                </select>
            </div>
        </form>
        <div class="Navigator">
            <label>By Clicking Register, you had accept our <a href=""> Terms &amp; Condition</a> </label>
            <button form="form-register" formmethod="POST" name="btn-register">Register</button>
            
            <a href="/login">Have an account ? Login</a>
        </div>
        
    </div>
     <a href="/">Back to homepage</a>
</body>
</html>


<?php
if(isset($_POST["name"])){
    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/user.php",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode(array(
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "whatsapp" => $_POST["whatsapp"]
        ))
    ]);
    $resp = curl_exec($curl);
    $msg = curl_error($curl);
    curl_close($curl);

}

function loadKecamatan(){
    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/address.php",
        CURLOPT_POST => 1
    ]);
    $resp = curl_exec($curl);
    $resp = json_decode($resp);

    foreach ($resp->data as $item) {
        echo '<option value="'.$item->id_kec.'">'.$item->nama.'</option>';
    }
    curl_close($curl);
}