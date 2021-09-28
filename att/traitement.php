<?php
session_start();
// inclusion des classes
require 'fonction.php';
require 'class_lotissement.php';
require 'class_attestation.php';
require 'class_attributaire.php';
require 'class_lot.php';
require 'class_piece.php';
require 'class_ilot.php';
//require 'class_pdf.php';
$ob=new Http();
if(isset($_POST['btn']) && $_POST['btn']=='btn_guide')
{
	$loti=$_POST['lotissement'];
	$situ=$_POST['sitGeo'];
	$arrete=$_POST['arrete'];
	$tf=$_POST['tf'];
	$c_fonc=$_POST['circFonc'];
	$objloti=new lotissement('\N',$loti,$situ,$arrete,$tf,$c_fonc);
	if($objloti->e_lotissement())
	{
		header('Location:../accueil.php');
	}
}
if(isset($_GET['name']) && $_GET['value']=='Suppr')
{
	$objloti=new lotissement();
	if ($objloti->s_lotissement($_GET['id_loti'])) {
		echo'<script type="text/javascript">alert("Votre guide a ete supprime");</script>';
		header('Location:../accueil.php');
	}
}

if(isset($_POST['btn']) && $_POST['btn']=='btn_enr')
{
	$num_ilot=$_POST['ilot'];
	$deb_lot=$_POST['lotDebut'];
	$fin_lot=$_POST['lotFin'];
	$reserve=strtoupper($_POST['reserve']);
	$id_loti=$_POST['id_guide'];

	//Creation de variables de session
	$_SESSION['ilot']=$_POST['ilot'];
	$_SESSION['lotFin']=$_POST['lotFin'];

	//attestation
	$attes= new attestation('\N',' ',' ');
	$r1=$attes->e_attestation();

	//attribuaire
	$attrib= new attributaire('\N',$reserve,' ',' ');
	$r2=$attrib->e_attributaire();

	//ilot
	$ilot=new ilot('\N',$id_loti,$num_ilot);
	$r3=$ilot->e_ilot();

	//lot
	$lot=new lot('\N',$r2,$r3,$r1,$deb_lot,$fin_lot);
	$lot->e_lot();

	// enregistrement lot
	do {
		$lot=new lot('\N',$r2,$r3,$r1,$deb_lot);
		$lot->e_ligne_lot();
		$deb_lot++;
	} while ($deb_lot<= $fin_lot);

	// piece
	$piece= new piece('\N',$r2,' ',' ',' ');
	$piece->e_piece();
	header('Location:../saisirIlot.php');
}
if (isset($_POST['btn']) && $_POST['btn']=='btn_modif_guide')
{
	$loti=$_POST['lotissement'];
	$situ=$_POST['sitGeo'];
	$arrete=$_POST['arrete'];
	$tf=$_POST['tf'];
	$c_fonc=$_POST['circFonc'];
	$id_loti=$_POST['a_m_id_loti'];
	$ob=new lotissement('\N',$loti,$situ,$arrete,$tf,$c_fonc);
	$ob->m_lotissement($id_loti);
	header('Location:../accueil.php');
}

if(isset($_POST['btn']) && $_POST['btn']=='btn_mod')
{
	$num_ilot=$_POST['ilot'];
	$deb_lot=$_POST['lotDebut'];
	$fin_lot=$_POST['lotFin'];
	$reserve=strtoupper($_POST['reserve']);
	// recuperation identifiant
	$id_ilot=$_POST['id_ilot'];
	$id_lot=$_POST['id_lot'];
	$id_attrib=$_POST['id_attrib'];
	$id_loti=$_POST['id_loti'];
	$loti=$_POST['loti'];

	//attribuaire
	$attrib= new attributaire();
	$attrib->m_attributaire($id_attrib,$reserve);

	//ilot
	$ilot=new ilot();
	$ilot->m_ilot($id_ilot,$num_ilot);

	//lot
	$lot=new lot();
	$lot->m_lot($id_lot,$deb_lot,$fin_lot);
	header('Location:../voir_Lot.php?id_loti='.$id_loti.'&loti='.$loti.'');
}
if(@$ob->btn && $ob->btn=='attributaire')
{
	$reserve=$ob->nom.' '.$ob->prenom;
	$attrib= new attributaire('\N',$reserve,$ob->adresse,$ob->telephone);
	$id_attrib=$attrib->e_attributaire();
	$ilot_attribuer=explode(',',$ob->ilot_attribuer);
	for($i=0;$i<count($ilot_attribuer);$i++)
	{
		$lot=new lot();
		$lot->m_ligne_lot($ilot_attribuer[$i],$id_attrib);
	}
}
?>
