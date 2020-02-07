<?php
require "php/config.php";
if(!isset($_SESSION['username'])) {
	header('Location: index.php');
	die();
}
require "php/korisnik.php";
$t="";
$korisnik = new Korisnik();
if (!$korisnik->SetUserData($_SESSION['username'])) {
	$t= $korisnik->message;
}
require "korisnik/template/header.php";
?>
<script>
       function pretrazi(tekst) {
           var bodyTabele = document.getElementById('ajaxPodaci');
           var url = "http://localhost/projekat/kupovina/'.$username.'.json?search="+ tekst;
           $.getJSON(url, function(odgovorServisa) {
               bodyTabele.innerHTML = "";
               $.each(odgovorServisa.kupovina,function(i, kupovina) {
                   $("#ajaxPodaci").append("<tr>"+

                           "<td>"+ kupovina.proizvodID +"</td>"+
                          "<td>"+ kupovina.kolicina +"</td>"+
                           "<td>"+ kupovina.korisnik +"</td>" +
                           "<td>"+ kupovina.datum +"</td>" +


                           "</tr>");
               })
           });
       }
   </script>
<div class="profil">
	<center>
		<b><?php echo $t;?></b>
		<br>
		<h1 class="text-shadow">Vaš Profil: </h1>
		<br><br>
		<table class="table">
            <thead>
                <tr>
                    <th>Ime: </th>
                    <th>Prezime: </th>
                    <th>Email: </th>
                    <th>Telefon: </th>
                    <th>Korisničko ime: </th>
                    <th>Status: </th>                   
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $korisnik->ime;?></td>
                    <td><?php echo $korisnik->prezime;?></td>
                    <td><?php echo $korisnik->email;?></td>
                    <td><?php echo $korisnik->telefon;?></td>
                    <td><?php echo $korisnik->username;?></td>
                    <td><?php echo strtoupper($korisnik->status);?></td>
                </tr>
            </tbody>
		</table>
	</center>


      <div class="post3">
          <div class="post_body3">
             <br>
              <?php
                  $korisnik = $_SESSION['username'];
                  $url = 'http://localhost/projekat/kupovina/'. $korisnik .'.json';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curl, CURLOPT_HTTPGET, true);

                  $curl_odgovor = curl_exec($curl);
                  curl_close($curl);
                  $json_objekat = json_decode($curl_odgovor);
              ?>
							<br>
              <div class="datagrid" style="overflow-y:scroll; max-height:360px;" >
                  <table id="listakupovina">
                      <thead>
                          <tr>
                              <th>Naziv proizvoda</th>
                              <th>Datum</th>
                              <th></th>

                          </tr>
                      </thead>
                      <tbody id="ajaxPodaci">
                          <?php
                              foreach($json_objekat->kupovina as $kupovina) {
                              	$proizvodID=$kupovina->proizvodID;
                              	$url = 'http://localhost/projekat/knjige/'. $proizvodID .'.json';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curl, CURLOPT_HTTPGET, true);

                  $curl_odgovor = curl_exec($curl);
                  curl_close($curl);
                  $json_objekat = json_decode($curl_odgovor);

              $proizvod=$json_objekat;

                                  echo "<tr>
                                          <td>$proizvod->proizvodNaziv</td>
                                          <td>$kupovina->datum</td>
                                          <td><a href='deleteKup.php?kupovinaID=". $kupovina->kupovinaID ."'><button  class='btn btn-primary'>Obriši Kupovinu</button></a></td>

                                      </tr>";
                              }
                          ?>
                      </tbody>
                  </table>

          </div>
      </div>
  </div>


</div>
<br><br><br><br><br><br><br>

<?php
require "admin/template/footer.php";
?>
