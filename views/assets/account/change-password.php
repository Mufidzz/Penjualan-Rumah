<form class="change-password-form">
    <div class="header">
        <label>Change Password</label>
    </div>
    <label>Old Password</label>
    <input name="pw-old" type="password"/>
    
    <label>New Password</label>
    <input name="pw-new" type="password"/>
    <label>Re-type New Password</label>
    <input name="pw-new-veriv" type="password"/>
    
    <button name="change-password" formmethod="post"> Submit</button>
</form>

<?php

session_start();

if($_POST["pw-new"] != $_POST["pw-new-veriv"]){
    echo "Password not match";
    exit();
}


if(isset($_POST["change-password"])){
    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/validator.php",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode(array(
            "jwt" => $_SESSION["Access-Token"]
        ))
    ]);
    
    $resp = curl_exec($curl); 
    $resp_arr = json_decode($resp);
     
    
    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/login.php",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode(array(
            "username" => $resp_arr->data->username,
            "password" => $_POST["pw-old"]
        ))
    ]);
    
    $resp = curl_exec($curl); 
    $resp_arr = json_decode($resp);
    
   
    if($httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE) == 200){
        curl_setopt_array($curl,[
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => "http://localhost/api/gateaway/user.php",
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode(array(
                "jwt" => $_SESSION["Access-Token"],
                "password" => $_POST["pw-new"]
            ))
        ]);
        $resp = curl_exec($curl); 
        $resp_arr = json_decode($resp);
        echo $resp_arr->jwt;
    }else{
        echo "Password Wrong";
    }
    
    curl_close($curl);
}
?>