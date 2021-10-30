<?php
require './att/traitement.php';


 if(!empty($_GET['id_loti']))
 {
  $_SESSION['id']=$_GET['id_loti'];
  $_SESSION['loti']=$_GET['loti'];

 }
 // creation d'objet
$ob=new ilot();
$ob2=new lot();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" type="text/css" href="autocomplete/monstyle.css">
<link rel="stylesheet" href="themify-icons/themify-icons.css">


    <title>Document</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}

</style>

<body>
    <div class="content">
        <div class="container">
            <div class="bg-red position-fixed h-100 w-400px" style="padding: 0 15px;background-color: white;box-shadow: 0 0 10px;z-index:1" id="gauche">
             <!-- masquer le menu -->
             <div  style="position:absolute;top:40;right:50;z-index:" id="feremer"><i class="ti ti-close" title="masquer le formulaire"></i></div>
            <!-- fin masquer le formulaire -->
            <div class="flex-2" style="height: 100%;">
                        <form  action='./att/traitement.php' method="POST" autocomplete="off" style="box-shadow: 0 0 0px;padding: 10px 15px; border:1px solid rgba(128, 128, 128, 0.486);;border-radius:5px;">
                            <div style="display: flex;flex-wrap: wrap;gap: 5px;">
                                <div style="width: 100%;margin-bottom: 20px;">
                                    <label for="" style="display: block;margin-bottom: 10px;">ILOT</label>
                                    <input type="text" style="width: 100% ;height:45px;"  name="ilot" value="<?php echo $ob->num_ilot($_SESSION['id'])+1;?>">
                                </div>
                                <div style="flex:1;margin-bottom: 20px;">
                                    <label for="" style="display: block;margin-bottom: 10px;">LOT DEBUT</label>
                                    <input type="text"  style="width: 100%;height:45px;" name="lotDebut" value="<?php echo $ob2->fin_lot($_SESSION['id'])+1; ?>" id="zero">
                                </div>
                                <div style="flex:1;margin-bottom: 20px;">
                                    <label for="" style="display: block;margin-bottom: 10px;">LOT FIN </label>
                                    <input type="text"  style="width: 100%;height:45px;" name="lotFin" id="foc">
                                </div>
                                <div style="width: 100%;margin-bottom: 10px;">
                                    <label for="" style="display: block;margin-bottom: 10px;">RESERVE ETAT</label>
                                    <input type="text" style="width: 100%;height:45px;" name="reserve" id="autocomplete" class="form-select">
                                    <ul id="list">
                                        <li><a href="#">Commencer a ecrire</a></li>
                                    </ul>
                                </div>
                                <input type="hidden" name="id_guide" value="<?php echo @$_SESSION['id']; ?>">
                                <input type="hidden" name="loti" value="<?php echo @$_SESSION['loti']; ?>">
                                <div style="width: 30%;text-align: right;width: 100%">
                                    <button type="submit" style="height:45px;width: 100%" name="btn" value="btn_enr" id="valider">Enregistrer</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
            <div class="item m-l  position-fixed w-100" style="right: 0;background-color:;">

                <div class="menu flex-2" style=" box-shadow: 0 0 10px; background-color:g; margin-left: 400px;" >
           <!--  afficher le formulaire-->
                <span id="afform"><i class="ti ti-shift-right" title="Afficher le formulaire"></i>&nbsp</span>
                <!-- fin afficher le formulaire -->
                <div style="width: 300px; text-align:left"><?= $_SESSION['loti']; ?></div>
                   <ul class="cacherr" id="cacherr">
                        <li style="" id="afficheer" class="afficheer"><i class="ti ti-menu"></i></li>
                        <ul class="lienne" style="position:absolute">
                            <li><a  href="accueil.php" class="liens"><i class="ti ti-home"></i> Acceuil</a></li>
                            <li><a href="attributaire.php?id_loti=<?= $_SESSION['id'] ?>&loti=<?= $_SESSION['loti'] ?>" class="liens"><i class=""></i> Attribuer</a></li>
                            <li><a href="./att/class_pdf.php?id_loti=<?= $_SESSION['id'] ?>"target="_blank" class="liens"><i class="ti ti-printer"></i> Imprimer</a></li>
                        </ul>
                    </ul>
                   <div class="flex" id="masquer">
                       <div class="enfant"><a href="accueil.php" style="display: inline-block;height: 100%;width: 100%;padding: 10px;" class="home"><i class="ti ti-home"></i> Acceuil</a></div>
                       <div class="enfant"><a href="attributaire.php?id_loti=<?= $_SESSION['id'] ?>&loti=<?= $_SESSION['loti'] ?>" style="display: inline-block;height: 100%;width: 100%;padding: 10px;" class="home"><i class=""></i> Attribute</a></div>
                       <div class="enfant"><a  href="./att/class_pdf.php?id_loti=<?= $_SESSION['id'] ?>"target="_blank" style="display: inline-block;height: 100%;width: 100%;padding: 10px;" class="home"><i class="ti ti-printer"></i> Imprimer</a></div>
                    <div>
                </div>
                   </div>
                </div>
               
            </div>
            <div class="contenu ">
                <div class="cont">
                <table class="tableeau" >
                    <thead>
                        <tr>

                        <th scope="col">ILOT</th>
                        <th scope="col">LOT DEBUT</th>
                        <th scope="col">LOT FIN</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
              <tbody>
                <?php
                $ob->join_ilot_lot($_SESSION['id']);?>
                 </tbody>
            </table>
                </div>
           
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
  (function()
    {
      var doc=document.getElementById('foc');
      window.onload=doc.focus();
      var v=document.getElementById('zero');
      var sang=v.value;
      doc.onkeyup=function(){
        var doc2=document.getElementById('zero');
        var fin=document.getElementById('fin');
        var d=document.getElementById('foc');

        if(d.value && d.value==0)
        {
          doc2.value=d.value;
        }
        else if (!d.value) {
          doc2.value=sang//variable globale;
        }
      };
      //window on load
      window.onload=function()
      {
        var gauche=document.querySelector('#gauche');
        var ca=getComputedStyle(gauche,null).display;
           gauche.style.display="block";
           var w=parseInt(getComputedStyle(gauche,null).width);
           var borderr=getComputedStyle(gauche,null).border;
         gauche.style.display=ca;
        //  alert(borderr);
         if(borderr=="0px none rgb(0, 0, 0)" && ca=="block")
         {
            document.body.style.overflow="hidden";
            // alert('on ne scool pas');
         }
         else if(borderr=="0px none rgb(0, 0, 0)" && ca=="none")
         {
            //  alert('onscrool');
             document.body.style.overflow="auto";
         }
         else if(borderr=="" && ca=="block")
         {
            //  alert('on scrool');
             document.body.style.overflow="auto";
         }
      }
      var res=document.querySelector('#afficheer');
      res.addEventListener('click',function(){
          var ff=document.querySelector('.lienne');
          if(getComputedStyle(ff,null).display=="none")
          {
              ff.style.display="block";
          }
          else{
            ff.style.display="none";
          }
      },false);
      document.addEventListener('click',function(e){
        var ff=document.querySelector('.lienne');
          if(e.target.className!='ti ti-menu'&&getComputedStyle(ff,null).display=="block")
          {
            ff.style.display="none";
          }
      },false);

      var fermer=document.querySelector('#feremer');
      fermer.addEventListener('click',function(e)
      {
         var gauche=document.querySelector('#gauche');
         gauche.style.display="none";
        gauche.style.animationName='slidein';
        gauche.style.animationDirection='reverse';
         var larg=document.querySelector('[class="menu flex-2"]');
         var cont=document.querySelector('[class="cont"]');
         larg.style.marginLeft="0px";
         cont.style.marginLeft="0px";
        var afform=document.querySelector('#afform');
        afform.style.display='block';
        document.body.style.overflow='initial';


      },false);
      
      var afform=document.querySelector('#afform');
      afform.addEventListener('click',function(e){
        var larg=document.querySelector('[class="menu flex-2"]');
        var gauche=document.querySelector('#gauche');
        gauche.style.animationName='slidein';
        gauche.style.animationDirection='alternate';
         var cont=document.querySelector('[class="cont"]');
         larg.style.marginLeft="400px";
         cont.style.marginLeft="400px";
         if(getComputedStyle(gauche,null).width=='100%')
         {
             document.body.style.overflow='hidden';
         }
         gauche.style.display="block";
         this.style.display='none';
      },false);
    //   window.onresize
    window.onresize=function()
    {
        var gauche=document.querySelector('#gauche');
        var ca=getComputedStyle(gauche,null).display;
           gauche.style.display="block";
           var w=parseInt(getComputedStyle(gauche,null).width);
           var borderr=getComputedStyle(gauche,null).border;
         gauche.style.display=ca;
        //  alert(borderr);
         if(borderr=="0px none rgb(0, 0, 0)" && ca=="block")
         {
            document.body.style.overflow="hidden";
            // alert('on ne scool pas');
         }
         else if(borderr=="0px none rgb(0, 0, 0)" && ca=="none")
         {
            //  alert('onscrool');
             document.body.style.overflow="auto";
         }
         else if(borderr=="" && ca=="block")
         {
            //  alert('on scrool');
             document.body.style.overflow="auto";
         }

    }
    
    document.querySelector('[type="submit"]').addEventListener('click',function(e){
        this.className="active";
        
    },);
    var maform=document.querySelectorAll('input');
    for(var i=0;i<maform.length;i++)
    {

        maform[i].addEventListener('keydown',function(e){
            if(e.keyCode==13)
            {
               document.querySelector('[type="submit"]').click();

            }
            // document.querySelector('bouton').click();
    },false);
    }
    })();
</script>
<script src="autocomplete/ajax.js"></script>
<script type="text/javascript" src="autocomplete/monjs.js"></script>
</html>