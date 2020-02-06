<?php
    $proizvod;
    if(isset($_POST['proizvodNaziv']) && isset($_POST['brojSerije']) &&  isset($_POST['proizvodStanje'])&&  isset($_POST['proizvodSCena']) && isset($_POST['proizvodjac'])) {
        $proizvod= '{
            "proizvodNaziv": "'. $_POST['proizvodNaziv'] .'",
            "brojSerije": '. $_POST['brojSerije'] .',
            "proizvodStanje":'. $_POST['proizvodStanje'] .',
            "proizvodCena":'. $_POST['proizvodSCena'] .',
            "proizvodjacID":'. $_POST['proizvodjac'] .'
        }';
    }
    else {
        $proizvod = '{"Greška, nisu uneti svi podaci!"}';
        
    }
    print_r($proizvod);
    $url = 'http://localhost/projekat/proizvod';
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $proizvod);

    $curl_odgovor = curl_exec($curl);
    curl_close($curl);
    echo $curl_odgovor;
    $json_objekat = json_decode($curl_odgovor);

    if (isset($json_objekat)) {
        header("Location: insertproizvod.php?poruka=$json_objekat->poruka");
    }
?>
