#! /usr/bin/php
<?php

include('config.php');
#creation des bdd's
	# user
	# produits

function err_msg($str, $action)
{
	echo "\033[1;91mError: ".$str."\033[0m\n";
	if ($action == "exit")
		exit(1);
}

function info_msg($str)
{
	echo "\033[1;92m".$str."\033[0m\n";
}

echo "Creation des bases de donnees\n";

if (!file_exists("db"))
	if (mkdir("db") === false)
		err_msg("impossible de creer le dossier db", "exit");


# Creation des users
$db_user = array();

$root_user = array(
	"login" => "root",
	"pwd" => hash("whirlpool", "superRoot"),
	"privilege" => 3,
);

$basic_user = array(
	"login" => "johndoe",
	"pwd" => hash("whirlpool", "1234"),
	"privilege" => 0,
);

echo "Creation des users root et johndoe\n";

$db_user[] = $root_user;
$db_user[] = $basic_user;
$db_user = serialize($db_user);
if (file_put_contents(USER_DB, $db_user) === false)
	err_msg("impossible d'ecrire dans le fichier ".USER_DB."","exit");

info_msg("Done.");


# Creation des produits

echo "Creation de la base de donnees produits\n";

$db_pdt = array();

$db_pdt[] =	array(
		"product" => "42sh",
		"type" => "Le celebre shell qui vous fera quitter votre etat larvaire pour acceder a l'humanite",
		"price" => "100",
		"cat1"  => "projet",
		"img" => "",
	);

$db_pdt[] =	array(
		"product" => "Piscine PHP",
		"type" => "Votre sesame pour valider la piscine PHP",
		"price" => "70",
		"cat1"  => "projet",
		"img" => "",
	);
$db_pdt[] =	array(
		"product" => "RT",
		"type" => "Montrez aux gens toute l'etendue de votre creativite",
		"price" => "120",
		"cat1"  => "projet",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "ROOT_ME app_system",
		"type" => "Plus aucun systeme ne vous resistera apres ce projet",
		"price" => "150",
		"cat1"  => "projet",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "20% XP",
		"type" => "Besoin d'un petit coup de pouce ?",
		"price" => "90",
		"cat1"  => "xp",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "40% XP",
		"type" => "Tiens prend un haricot magique",
		"price" => "150",
		"cat1"  => "xp",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "100wallets",
		"type" => "Qui a dit que les wallets ne faisaient pas le bonheur ?",
		"price" => "20",
		"cat1"  => "wallet",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "400wallets",
		"type" => "Il y a certaines choses qui ne s'achetent pas .. Non non bulshit tout s'achete",
		"price" => "50",
		"cat1"  => "wallet",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "404 sleep not found",
		"type" => "Toi aussi devient un zombie codeur",
		"price" => "60",
		"cat1"  => "achievement",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "Maitre quenelier",
		"type" => "Tu passes du cote obscur de la force jeune padawan",
		"price" => "60",
		"cat1"  => "achievement",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "+10 downvotes",
		"type" => "Vous allez enfin pouvoir recompenser les kevins, troll nazis ...",
		"price" => "30",
		"cat1"  => "social",
		"img" => "",
	);
$db_pdt[] = array(
		"product" => "Soudoyer le correcteur",
		"type" => "Un petit billet dans la poche, et ni vu ni connu",
		"price" => "90",
		"cat1"  => "social",
		"img" => "",
	);





$db_pdt = serialize($db_pdt);
if (file_put_contents(PDT_DB, $db_pdt) === false)
	err_msg("impossible d'ecrire dans le fichier".PDT_DB , "exit");

info_msg("Done");

?>
