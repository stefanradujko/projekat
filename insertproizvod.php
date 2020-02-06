<?php
require "php/config.php";
require "admin/template/header.php"; ?>

<script src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="admin/js/validacija.js"></script>

<div class="row">

  <div class="row_header">
    <h1 class="text-shadow">Unos novog proizvoda</h1>
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
                      if($staPrikazati == "Uspešno ste dodali novi proizvod!") {
                        ?>    <div class="alert alert-info alert-dismissible" role="alert">  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
<br><br>
              <form id="form" class="form-horizontal" method="POST" action="insert.php">
                <div class="form-group">
                  <label for="proizvodNaziv" class="col-sm-2  control-label">Naziv:</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="proizvodNaziv" placeholder="Unesite naziv proizvoda..." id="proizvodNaziv">
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
                                echo "<option value='$proizvodjac->proizvodjacID'>$proizvodjac->proizvodjacNaziv</option>";

                              }
                          ?>
                      </select>
                  </div>

                  </div>

                  <div class="form-group">
                    <label for="brojSerije" class="col-sm-2  control-label">Broj serije:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="brojSerije" placeholder="Unesite broj serije proizvoda..." id="brojSerije">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="proizvodStanje" class="col-sm-2  control-label">Stanje:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="proizvodStanje" placeholder="Unesite stanje..."  id="proizvodStanje">
                    </div>
                  </div>
				  
					<div class="form-group">
                    <label for="proizvodCena" class="col-sm-2  control-label">Cena:</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="proizvodSCena" placeholder="Unesite cenu..."  id="proizvodCena">
                    </div>
                  </div>



                  
                    <br>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <button type="submit" name="ubaci" class="btn btn-success">Dodaj proizvod</button>

                    </div>
                  </div>
                  </form>
              </form> <br><br>
          </div>
          <div class="col-sm-2">
            <img src="img/supplies.jpg" alt="books" height="300px"/>
            <br><br><br>  <br><br><br>
        </div>


</div>
</div>
</div>

<br><br>


<?php require "admin/template/footer.php"; ?>
