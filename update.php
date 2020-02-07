<?php
    $proizvodUpdate;
    $proizvodID = $_GET['proizvodID'];
    if(isset($_POST['proizvodNaziv']) && isset($_POST['brojSerije']) && isset($_POST['proizvodCena'])  && isset($_POST['proizvodStanje']) && isset($_POST['proizvodjac'])) {
        $proizvodUpdate = '{
            "proizvodNaziv": "'. $_POST['proizvodNaziv'] .'",
            "brojSerije": '. $_POST['brojSerije'] .',
            "proizvodCena": '. $_POST['proizvodCena'] .',
              "proizvodStanje":'. $_POST['proizvodStanje'] .',
              "proizvodjacID":'. $_POST['proizvodjac'] .'
            }';
    }
    else {
        $proizvodUpdate = '{"Greška, nisu uneti svi podaci!"}';
    }
    $url = 'http://localhost/projekat/proizvod/'. $proizvodID;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
    curl_setopt($curl, CURLOPT_POSTFIELDS, $proizvodUpdate);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
            header("Location: izmenaBrisanje.php?poruka=$json_objekat->poruka");
    }
?>
