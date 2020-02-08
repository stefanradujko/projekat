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
require "admin/template/header.php";
?>
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


<!-- <?php
require "admin/template/footer.php";
?> -->
