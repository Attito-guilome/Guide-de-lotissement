<?php 

$tcpdf='./TCPDF-main/examples/tcpdf_include.php';

//============================================================+
// Nom du fichier   : .php
// debuter       : 09-04-2021
//
// Description :tableau  XHTML + CSS        
//
// Auteurs: Sangan N'goran Guillaume & Kouadio Jaures
//
// (c) Copyright:
//              Nyusu
//               nyusu.net LTD
//               www.nyusu.net
//               info@nyusu.net
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: XHTML + CSS
 * @author Nicola Asuni
 * @since 2010-05-25
 */


// Include the main TCPDF library (search for installation path).
require_once($tcpdf);
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------
$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
// set font
$pdf->SetFont('helvetica', '', 10);
// algorithme

if (isset($_GET['id_loti']))
{
     $pdo= new PDO('mysql:host=localhost;dbname=test','root','');
    //Recuperation du plus petit element de la base
    $req="SELECT num_ilot FROM  ilot  WHERE ilot.id_loti=:aid_loti ORDER BY num_ilot DESC LIMIT 1";
    $stmt=$pdo->prepare($req);
    $stmt->bindParam(':aid_loti',$_GET['id_loti'],PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindColumn('num_ilot', $bfin_id);
    $ligne=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

   //Recuperation du plus grand element de la base
    $req="SELECT num_ilot FROM ilot WHERE ilot.id_loti=:aid_loti LIMIT 1";
    $stmt=$pdo->prepare($req);
    $stmt->bindParam(':aid_loti',$_GET['id_loti'],PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindColumn('num_ilot', $bdeb_id);
    $ligne=$stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    $num_d=$bdeb_id;
    $num_f=$bfin_id;
    // requete MYSQL
    $pdo= new PDO('mysql:host=localhost;dbname=test','root','');
    $requete="SELECT loti,situ,c_fonc,num_ilot,deb_lot,fin_lot,n_pr_attrib FROM lotissement INNER JOIN ilot ON lotissement.id_loti=ilot.id_loti INNER JOIN lot ON lot.id_ilot=ilot.id_ilot INNER JOIN attestation ON attestation.id_attes=lot.id_attes INNER JOIN attributaire ON attributaire.id_attrib=lot.id_attrib INNER JOIN piece ON piece.id_attrib=attributaire.id_attrib WHERE lotissement.id_loti=:aid_loti ORDER BY num_ilot";
    $stmt=$pdo->prepare($requete);
    $stmt->bindParam(':aid_loti',$_GET['id_loti'],PDO::PARAM_INT);
    $stmt->execute();
    $stmt->bindColumn('loti', $aloti);
    $stmt->bindColumn('situ', $asitu);
    $stmt->bindColumn('c_fonc', $ac_fonc);
    $stmt->bindColumn('num_ilot', $anum_ilot);
    $stmt->bindColumn('deb_lot', $adeb_lot);
    $stmt->bindColumn('fin_lot', $afin_lot);
    $stmt->bindColumn('n_pr_attrib', $an_pr_attrib);

    while ($ligne=$stmt->fetch(PDO::FETCH_ASSOC))
    {
       

        while ($adeb_lot<=$afin_lot)
        {   
            
            $html = '
                        <!-- EXAMPLE OF CSS STYLE -->
                        <style>
                        td {
                             border: 1px solid black;
                            }
                        .center
                             {
                              text-align:center;
                            }
                            .couleur
                            {
                             background-color:lightgray;
                             }
                            </style>';
            $html.='<table style="padding: 5.9px;" class="table table-bordered border-secondary">';
         $html .= '<tr class="couleur">
            <td colspan="4">LOTISSEMENT : '.$aloti.'</td>
            <td colspan="5">SITUATION GEOGRAPHIQUE : '.$asitu.'</td>
        </tr>
        <tr class="couleur">
             <td colspan="4">ARRETE : </td>
            <td colspan="2">TF : </td>
            <td colspan="3">CIRCONSCRIPTION FONCIERE : '.$ac_fonc.'</td>
        </tr>';
        $pdf->AddPage('L', 'A4');
            // creation d'une page
            $compteur=0;
            while ($compteur<3 && $adeb_lot<=$afin_lot) 
            {
             
                
                 $r=$adeb_lot?$adeb_lot:' ';
                
                
                $html.='
         <tr class="couleur">
            <td colspan="2">ILOT : '.$anum_ilot.'</td>
            <td colspan="2">LOT : '.$r.' </td>
            <td colspan="2">SUPERFICIE :</td>
            <td colspan="3">AFFECTATION :</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="3">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="3">'.$an_pr_attrib.'</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""></td>
        </tr>
        <tr class="center">
            <td colspan="3"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="3"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="3"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>';
          
        // a ne pas toucher
                    $adeb_lot++;

                    if((($adeb_lot-1)==$afin_lot||$afin_lot==0)&&$compteur<3)
                    {
                        $ligne=$stmt->fetch(PDO::FETCH_ASSOC) ;
                    }
                    $compteur++;
                
        // a ne pas toucher
                
            }
$html.='</table>';
            //creation d'une page ici
             $pdf->writeHTML($html, true, false, true, false, '');
        }
    }
       
}
// add a page





//Close and output PDF document
  $pdf->SetTitle($aloti);
  $pdf->Output( $aloti, 'I');
  $stmt->closeCursor();

//============================================================+
// END OF FILE
//============================================================+
?>