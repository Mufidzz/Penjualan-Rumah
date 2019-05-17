<script>
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

<div class="add-form-header">
        <label>Add new house</label>
    </div>

<form class="add-form" enctype="multipart/form-data" method="post">
    <div class="general">
        <div class="header">
            <label>General</label>
        </div>
        <label>Judul</label>
        <input name="judul" type="text"/>
        <label>Alamat</label>
        <input name="alamat" type="text" />

        <div class="kecamatan-kelurahan">
            <select onchange="ajaxKelurahan()" id="kecamatan" name="kecamatan">
                <option SELECTED disabled>Kecamatan</option>
                <?php loadKecamatan(); ?>
            </select>
            <select id="kelurahan" name="kelurahan">
                <option selected disabled>Kelurahan</option>
            </select>
        </div>
    </div>
    
    <div class="option">
        <div class="header">
            <label>Option</label>
        </div>
        <label>Kelengkapan</label>
        <div class="check-box">
            <input type="checkbox" name="PBB" value="1">PBB
            <input type="checkbox" name="SHM" value="1">SHM
            <input type="checkbox" name="HGB" value="1">HGB
            <input type="checkbox" name="AJB" value="1">AJB
        </div>
        
        <input type="file">
    </div>
    <button name="add-home" formmethod="post">Submit</button>
</form>

<?php

echo $_POST;
print_r($_POST);
exit();

if(isset($_POST["add-home"])){
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