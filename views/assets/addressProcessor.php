<?php
    $curl = curl_init();

    curl_setopt_array($curl,[
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => "http://localhost/api/gateaway/address.php",
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => json_encode(array(
            "id_kec" => $_POST["id_kec"]
        ))
    ]);
    $resp = curl_exec($curl);
    $resp = json_decode($resp);

    echo '<option selected disabled>Kelurahan</option>';
    foreach ($resp->data as $item) {
        echo '<option value="'.$item->id_kel.'">'.$item->nama.'</option>';
    }
    curl_close($curl);
?>