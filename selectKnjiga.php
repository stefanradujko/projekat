<?php 
require "admin/template/header.php"; ?>
  <script type="text/javascript" src="admin/js/pretrazi.js"></script>
  

<div id="container" style="padding-left:120px;">
  <div class="container_header">
    <br>
    <h1>Ponuda proizvod</h1>
    <br>
  </div>
  <div id="container-left" class="col-sm-8">
      <div class="post3">
          <div class="post_body3">
              <div>
                  <label for="radio"><b>Za pretragu unesite naziv knjige: </b></label>
                  <input type="text" name="textSearch" id="textSearch" onkeyup="pretrazi(this.value)">
              </div> <br>
              <?php
                  $proizvodjacID = $_GET['proizvodjacID'];
                  $url = 'http://localhost/projekat/proizvod/'. $proizvodjacID .'.json';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curl, CURLOPT_HTTPGET, true);

                  $curl_odgovor = curl_exec($curl);
                  curl_close($curl);
                  $json_objekat = json_decode($curl_odgovor);
              ?>
              <div class="datagrid" >
                  <table id="listaproizvod">
                      <thead>
                          <tr>
                              <th>Naziv knjige</th>
                              <th>Izdanje</th>
                              <th>Tiraž</th>
                              <th>Cena</th>
                              <th>Stanje na lageru</th>
                              <th>Prezime pisca</th>
                          </tr>
                      </thead>
                      <tbody id="ajaxPodaci">
                          <?php
                              foreach($json_objekat->proizvod as $knjige) {
                                  echo "<tr>
                                          <td>$knjige->proizvodNaziv</td>
                                          <td>$knjige->brojSerije</td>
                                          <td>$knjige->proizvodTiraz</td>
                                          <td>$knjige->proizvodCena</td>
                                          <td>$knjige->proizvodStanje</td>
                                          <td>$knjige->proizvodjacAdresa</td>
                                      </tr>";
                              }
                          ?>
                      </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
  <div id="containerselect-right" class="col-sm-2">
    <div class="right-pic">
      <img src="img/books.png" alt="books" width="270px" />
    </div>
  </div>
  </div>
</div>

<?php 
require "admin/template/footer.php"; ?>
