<?php
require "php/config.php";
require "admin/template/header.php"; ?>

<script type="text/javascript" src="admin/js/validacija.js"></script>

<div class="row">

  <div class="row_header">
    <h1 class = 'text-shadow'>Izmena podataka o proizvodu</h1>
    <br><br><br>
  </div>

  <div class="col-sm-12">
          <div class="post3">
            <div class="col-sm-2">
          </div>
            <div class="col-sm-6">
              <?php
                  if(isset($_GET['poruka'])) {
                      $staPrikazati = $_GET['poruka'];
                      if($staPrikazati == "Uspešno ste izvršili izmenu podataka o proizvodu!") {
                      ?>
                         <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong> <?php echo $staPrikazati  ?> </strong>
                          </div>
                          <?php
                      }
                      else {
                        ?>    <div class="alert alert-danger alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong> <?php echo $staPrikazati  ?></strong>
                      </div>
                      <?php
                     }
                  }
              ?>
              <?php
                  $actual_link = "http://$_SERVER[HTTP_HOST]";
                  $proizvodID = $_GET['proizvodID'];
                  $url = 'http://localhost/projekat/knjige/'. $proizvodID .'.json';
                  $curl = curl_init($url);
                  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                  curl_setopt($curl, CURLOPT_HTTPGET, true);
                  $curl_odgovor = curl_exec($curl);
                  curl_close($curl);
                  $k = json_decode($curl_odgovor);
              ?>
<br><br>
              <form id="form" class="form-horizontal" method="POST" action="update.php?proizvodID=<?php echo "$k->proizvodID";?>">
                <div class="form-group">
                  <label for="proizvodNaziv" class="col-sm-2  control-label">Naziv proizvoda:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="proizvodNaziv" placeholder="Unesite naziv proizvoda..." id="proizvodNaziv"value="<?php echo "$k->proizvodNaziv";?>">
                  </div>
                </div>

                  <div class="form-group">
                      <label for="proizvodjac" class="col-sm-2  control-label">Proizvođač:</label>
                      <div class="col-sm-8">
                      <select id="proizvodjac" class="form-control" name="proizvodjac">
                        <option value=''></option>
                        <?php
                            $urlZaSB = 'http://localhost/projekat/proizvodjac.json';
                            $curlZaSB = curl_init($urlZaSB);
                            curl_setopt($curlZaSB, CURLOPT_RETURNTRANSFER, true);
                            curl_setopt($curlZaSB, CURLOPT_HTTPHEADER, array('Accept: application/json','Content-Type: application/json'));
                            curl_setopt($curlZaSB, CURLOPT_HTTPGET, true);
                            $curl_odgovorSB = curl_exec($curlZaSB);
                            curl_close($curlZaSB);
                            $odgovorOdServisa = json_decode($curl_odgovorSB);
                            foreach($odgovorOdServisa->proizvodjac as $proizvodjac) {
                                echo "<option value='$proizvodjac->proizvodjacID' ";
                                if($k->proizvodjacID == $proizvodjac->proizvodjacID) {
                                    echo "selected";
                                }
                                echo ">$proizvodjac->proizvodjacNaziv</option>";
                            }
                        ?>
                      </select>
                  </div>

                  </div>

                  <div class="form-group">
                    <label for="brojSerije" class="col-sm-2  control-label">Broj serije:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="brojSerije" placeholder="Unesite broj serije..." id="brojSerije"value="<?php echo "$k->brojSerije";?>">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="proizvodCena" class="col-sm-2  control-label">Cena:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="proizvodCena" placeholder="Unesite cenu..."  id="proizvodCena"value="<?php echo "$k->proizvodCena";?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label for="proizvodStanje" class="col-sm-2  control-label">Količina:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="proizvodStanje" placeholder="Unesite količinu..." id="proizvodStanje" value="<?php echo "$k->proizvodStanje";?>">
                    </div>
                  </div>



                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <button type="submit" name="sacuvaj" class="btn btn-success">Sačuvaj izmene</button>
                    </div>
                  </div>
                  <br>
              </form>
          </div>
          <div class="col-sm-2">
            <img src="img/supplies.jpg" alt="books" height="300px"/>
            <br><br>
        </div>


</div>

</div>

</div>
<br><br>
<?php require "admin/template/footer.php"; ?>
