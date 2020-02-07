<?php
	require 'flight/Flight.php';
	require 'jsonindent.php';

	Flight::register('db', 'Database', array('prodavnica'));
	$json_podaci = file_get_contents("php://input");
	Flight::set('json_podaci', $json_podaci);

	//vrati sve knjige
	Flight::route('GET /proizvod.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"proizvod":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", " proizvodNaziv LIKE '%". $pretraga ."%' " , null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"proizvod":'. indent($json_niz) .' }';
			return false;
		}
	});
	//sve kupovine sa korisnicima i proizvodma
	Flight::route('GET /kupovina.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select2(" kupovina", ' * ', "proizvod", "proizvodID", "proizvodID", "korisnici", "korisnik","username", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
		
	});
Flight::route('GET /kupovina.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		
			$db->select(" kupovina ", ' * ', "proizvod", "proizvodID", "proizvodID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		
	});
	//vrati knjige odredjenog pisca
		Flight::route('GET /proizvod/@proizvodjacID.json', function($proizvodjacID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", "proizvod.proizvodjacID = ". $proizvodjacID, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"proizvod":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", " proizvodNaziv LIKE '%". $pretraga ."%' " , null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"proizvod":'. indent($json_niz) .' }';
			return false;
		}
	});
		//vrati kupovine odredjenog korisnika
		Flight::route('GET /kupovina/@username.json', function($username) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if(!isset($_GET['search'])) {
			$db->select(" kupovina ", ' * ', "korisnici", "korisnik", "username", "kupovina.korisnik = '". $username."'", null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
		else {
			$pretraga = $_GET['search'];
			$db->select(" kupovina ", ' * ', "korisnici", "korisnik", "username", "kupovina.korisnik = ". $username, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			echo '{'.'"kupovina":'. indent($json_niz) .' }';
			return false;
		}
	});

	Flight::route('GET /knjige/@proizvodID.json', function($proizvodID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$db->select(" proizvod ", ' * ',  "proizvodjac", "proizvodjacID", "proizvodjacID", "proizvod.proizvodID = ". $proizvodID, null);
		$red = $db->getResult()->fetch_object();
		$json_niz = json_encode($red,JSON_UNESCAPED_UNICODE);
		echo indent($json_niz);
		return false;
	});

		

//vrati pisca
	Flight::route('GET /proizvodjac.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);
		$db->select(" proizvodjac ", '*', "", "", "", null, null);
		$niz = array();
		while($red = $db->getResult()->fetch_object()) {
			$niz[] = $red;
		}
		$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
		echo '{'.'"proizvodjac":'. indent($json_niz) .' }';
		return false;
	});
	//vrati korisnika
Flight::route('GET /korisnik.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);
		$db->select(" korisnici ", '*', "", "", "", null, null);
		$niz = array();
		while($red = $db->getResult()->fetch_object()) {
			$niz[] = $red;
		}
		$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
		echo '{'.'"korisnik":'. indent($json_niz) .' }';
		return false;
	});
	Flight::route('PUT /proizvod/@proizvodID', function($proizvodID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
			$odgovor["poruka"] = "Podaci nisu prosleđeni!";
			$json_odgovor = json_encode($odgovor);
			echo $json_odgovor;
		}
		else {
			if(!property_exists($podaci,'proizvodNaziv') || !property_exists($podaci,'proizvodCena') || !property_exists($podaci,'brojSerije') ||  !property_exists($podaci,'proizvodStanje') || !property_exists($podaci,'proizvodjacID')) {
				$odgovor["poruka"] = "Nisu prosleđeni odgovarajući podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				if($db->update("proizvod", $proizvodID, array('proizvodNaziv','brojSerije','proizvodCena','proizvodStanje','proizvodjacID'),array($podaci->proizvodNaziv, $podaci->brojSerije,$podaci->proizvodCena, $podaci->proizvodStanje,$podaci->proizvodjacID))) {
					$odgovor["poruka"] = "Uspešno ste izvršili izmenu podataka o knjizi!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške pri pokušaju izmene podataka o knjizi!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('POST /proizvod', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = Flight::get("json_podaci");
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = $podaci_json;
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'proizvodNaziv') || !property_exists($podaci,'brojSerije') || !property_exists($podaci,'proizvodCena') ||  !property_exists($podaci,'proizvodStanje') || !property_exists($podaci,'proizvodjacID')) {
				$odgovor["poruka"] = "Nisu uneti ispravni podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}
				if($db->insert("proizvod","proizvodNaziv,brojSerije,proizvodCena,proizvodStanje,proizvodjacID",array($podaci_query['proizvodNaziv'], $podaci_query['brojSerije'],$podaci_query['proizvodCena'],$podaci_query['proizvodStanje'],$podaci_query['proizvodjacID']))) {
					$odgovor["poruka"] = "Uspešno ste dodali novi proizvod!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške pri pokušaju unosa nove knjige!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});
	Flight::route('POST /kupovina', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();
		$podaci_json = file_get_contents('php://input');
		$podaci = json_decode($podaci_json);

		if($podaci == null) {
		$odgovor["poruka"] = "Podaci nisu prosleđeni!";
		$json_odgovor = json_encode($odgovor);
		echo $json_odgovor;
		return false;
		}
		else {
			if(!property_exists($podaci,'proizvodID') || !property_exists($podaci,'korisnik') || !property_exists($podaci,'datum') ) {
				$odgovor["poruka"] = "Nisu uneti ispravni podaci!";
				$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
				echo $json_odgovor;
				return false;
			}
			else {
				$podaci_query = array();
				foreach($podaci as $k=>$v) {
					$v = "'". $v ."'";
					$podaci_query[$k] = $v;
				}
				if($db->insert("kupovina","proizvodID,kolicina,korisnik,datum",array($podaci_query['proizvodID'], $podaci_query['kolicina'], $podaci_query['korisnik'],$podaci_query['datum']))) {
					$odgovor["poruka"] = "Uspešno ste kupili proizvod! ";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
				else {
					$odgovor["poruka"] = "Došlo je do greške prilikom kupovine!";
					$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
					echo $json_odgovor;
					return false;
				}
			}
		}
	});

	Flight::route('DELETE /proizvod/@proizvodID', function($proizvodID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("proizvod", array("proizvodID"),array($proizvodID))) {
			$odgovor["poruka"] = "Proizvod je uspešno obrisan!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
		else {
			$odgovor["poruka"] = "Došlo je do greške pri pokušaju brisanja knjige!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
	});
	Flight::route('DELETE /kupovina/@kupovinaID', function($kupovinaID) {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if($db->delete("kupovina", array("kupovinaID"),array($kupovinaID))) {
			$odgovor["poruka"] = "Kupovina je otkazana!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
		else {
			$odgovor["poruka"] = "Došlo je do greške pri pokušaju otkazivanja kupovine!";
			$json_odgovor = json_encode($odgovor,JSON_UNESCAPED_UNICODE);
			echo $json_odgovor;
			return false;
		}
	});

	Flight::route('GET /vizuelizacija.json', function() {
		header("Content-Type: application/json; charset=utf-8");
		$db = Flight::db();

		if (!isset($_GET['proizvodjac'])) {
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", null, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			$JSONprikaz = '{  "cols": [{"label":"proizvod","type":"string"}, {"label":"Stanje","type":"number"}], "rows":[ ';
			foreach($niz as $key => $value) {
				$JSONprikaz = $JSONprikaz .'{"c":[{"v":"'. $value->proizvodNaziv .'"},{"v":'. $value->proizvodStanje .'}]},';
			}
			echo $JSONprikaz .']}';
			return false;
		}
		else {
			$proizvodjac = $_GET['proizvodjac'];
			$db->select(" proizvod ", ' * ', "proizvodjac", "proizvodjacID", "proizvodjacID", "proizvod.proizvodjacID=". $proizvodjac, null);
			$niz = array();
			while($red = $db->getResult()->fetch_object()) {
				$niz[] = $red;
			}
			$json_niz = json_encode($niz,JSON_UNESCAPED_UNICODE);
			$JSONprikaz = '{  "cols": [{"label":"proizvod","type":"string"}, {"label":"Stanje","type":"number"}], "rows":[ ';
			foreach($niz as $key => $value) {
				$JSONprikaz = $JSONprikaz .'{"c":[{"v":"'. $value->proizvodNaziv .'"},{"v":'. $value->proizvodStanje .'}]},';
			}
			echo $JSONprikaz .']}';
			return false;
		}
	});

	Flight::route('GET /lokacije.json', function(){
		header("Content-Type: application/json; charset=utf-8");

		echo  '{"marker":[
				  {
				    "latitude":"44.8065155",
				    "longitude":"20.4590829",
				    "naziv":"Suncokret1 - Kneza Miloša 43 "
				  },
				  {
				    "latitude":"44.8057246",
				    "longitude":"20.4741383",
				    "naziv":"Suncokret2 - Bulevar Kralja Aleksandra 53"
				  },
				  {
				    "latitude":"44.7812137",
				    "longitude":"20.4672414",
				    "naziv":"Suncokret3 - Bulevar Oslobođenja 219"
				  },
				  {
				    "latitude":"44.7915081",
				    "longitude":"20.478071",
				    "naziv":"Suncokret4 - Gospodara Vučića 78"
				  },
				  {
				    "latitude":"44.8132988",
				    "longitude":"20.4313796",
				    "naziv":"Suncokret5 - Bulevar Mihajla Pupina 17"
				  }
			]}';
		return false;
	});

	Flight::start();



                      // header('Content-Type: application/json; charset=utf-8_croatian_ci');
$table = $db_table;
$primaryKey = 'proizvodID';

/*$columns = array(
array(
        'db' => 'proizvodID',
        'dt' => 'DT_RowId',
        'formatter' => function( $d, $row ) {
            return $d;
        }
      ),
          array( 'db' => 'proizvodID', 'dt' => 0 ),
          array( 'db' => 'proizvodNaziv',  'dt' => 1 ),
          array( 'db' => 'brojSerije',   'dt' => 2 ),
          array( 'db' => 'proizvodTiraz',  'dt' => 3 ),
          array( 'db' => 'proizvodCena',  'dt' => 4 ),
          array( 'db' => 'proizvodStanje',  'dt' => 5 ),
          array( 'db' => 'proizvodjacID',   'dt' => 6 )
);
$sql_details = array(
    'user' => $$mysql_user,
    'pass' => $mysql_password,
    'db'   => $mysql_db,
    'host' => $mysql_server
);
require( 'DataTables-1.10.10/examples/server_side/scripts/ssp.class.php' );

*/
?>
