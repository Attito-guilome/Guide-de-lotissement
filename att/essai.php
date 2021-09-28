<?php
if (isset($_GET['id_loti']))
{
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
        while ($adeb_lot<$afin_lot)
         {
                $pdf->AddPage('L', 'A4');
$html = <<<EOF
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
    
    
</style>


<table style="padding: 5.3px;" class="table table-bordered border-secondary">
        <tr class="couleur">
            <td colspan="4">LOTISSEMENT: $aloti</td>
            <td colspan="5">SITUATION GEOGRAPHIQUE: $asitu</td>
        </tr>
        <tr class="couleur">
             <td colspan="4">ARRETE:</td>
            <td colspan="2">TF:</td>
            <td colspan="3">CIRCONSCRIPTION FONCIERE: $ac_fonc</td>
        </tr>
         <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT: $adeb_lot</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""></td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
EOF;
$a=$adeb_lot+1;
 $html .= <<<EOF
        <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT:$a</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
EOF;
$a=$adeb_lot+2;
 $html .= <<<EOF
        <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT: $a</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>

      </table>
EOF;
/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// ---------------------------------------------------------
            $adeb_lot+=3;
        }
    }
    $stmt->closeCursor();
}
// add a page





//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');











// A recuperer

 while ($ligne=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        
        while ($adeb_lot<=$afin_lot)
        {
            $comp=0;
            $deb=$adeb_lot;
            $fin=$afin_lot;
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
            $html.='<table style="padding: 5.3px;" class="table table-bordered border-secondary">';

            $html .= '<tr class="couleur">
            <td colspan="4">LOTISSEMENT: '.$aloti.'</td>
            <td colspan="5">SITUATION GEOGRAPHIQUE: '.$asitu.'</td>
        </tr>
        <tr class="couleur">
             <td colspan="4">ARRETE:</td>
            <td colspan="2">TF:</td>
            <td colspan="3">CIRCONSCRIPTION FONCIERE: '.$ac_fonc.'</td>
        </tr>';
            while ($comp<3 || $deb<=$fin) 
            {
                if($deb>0)
                {
                  $comp++; 
                  $html='
         <tr class="couleur">
            <td colspan="2">ILOT: '.$anum_ilot.'</td>
            <td colspan="2">LOT: '.$adeb_lot.'</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">'.$an_pr_attrib.'</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""></td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>'; 
                }
            elseif ($deb=0) {
                $comp++;
                $html='
         <tr class="couleur">
            <td colspan="2">ILOT: '.$anum_ilot.'</td>
            <td colspan="2">LOT: '.$adeb_lot.'</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">'.$an_pr_attrib.'</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""></td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>'; 
            }
            $deb++;
    }
            $html.='</table>';
            $deb_lot+=3;
            $pdf->AddPage('L', 'A4');
            $pdf->writeHTML($html, true, false, true, false, '');
    }
        
        }
        
    }



















    while ($adeb_lot<=$afin_lot)
         {
                $pdf->AddPage('L', 'A4');
                $a=$adeb_lot;
            if($adeb_lot==$afin_lot)
                $a=0;
$html = <<<EOF
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
    
    
</style>


<table style="padding: 5.3px;" class="table table-bordered border-secondary">
        <tr class="couleur">
            <td colspan="4">LOTISSEMENT: $aloti</td>
            <td colspan="5">SITUATION GEOGRAPHIQUE: $asitu</td>
        </tr>
        <tr class="couleur">
             <td colspan="4">ARRETE:</td>
            <td colspan="2">TF:</td>
            <td colspan="3">CIRCONSCRIPTION FONCIERE: $ac_fonc</td>
        </tr>
         <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT: $adeb_lot</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""></td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
EOF;
$a=$adeb_lot+1;
if($adeb_lot==$afin_lot)
$a=0;
 $html .= <<<EOF
        <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT:$a</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
EOF;
$a=$adeb_lot+2;
if($adeb_lot==$afin_lot)
    $a=0;
 $html .= <<<EOF
        <tr class="couleur">
            <td colspan="2">ILOT: $anum_ilot</td>
            <td colspan="2">LOT: $a</td>
            <td colspan="2">SUPERFICIE:</td>
            <td colspan="3">AFFECTATION:</td>
        </tr>
         <tr class="center">
            <td colspan="3">ATTRIBUTAIRES</td>
            <td colspan="2">ATTESTATION</td>
            <td rowspan="2">ADRESSE & CONTACT</td>
            <td colspan="3">PIECES</td>
        </tr>
        <tr class="center">
            <td colspan="">N<sup>0</sup></td>
            <td colspan="2">NOM & PRENOM</td>
            <td colspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
            <td rowspan="">NATURE</td>
            <td rowspan="">N<sup>0</sup></td>
            <td rowspan="">DATE</td>
        </tr>
        <tr class="center">
            <td colspan="">1</td>
            <td colspan="2">$an_pr_attrib</td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">2</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">3</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>
        <tr class="center">
            <td colspan="">4</td>
            <td colspan="2"> </td>
            <td colspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
            <td rowspan=""> </td>
        </tr>

      </table>
EOF;
/* NOTE:
 * *********************************************************
 * You can load external XHTML using :
 *
 * $html = file_get_contents('/path/to/your/file.html');
 *
 * External CSS files will be automatically loaded.
 * Sometimes you need to fix the path of the external CSS.
 * *********************************************************
 */

// define some HTML content with style


// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// ---------------------------------------------------------
            $adeb_lot+=3;
        }