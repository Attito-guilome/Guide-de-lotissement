
  (function(){
    var donne=document.querySelector('#autocomplete');
    var list=document.querySelector('#list');
    donne.addEventListener('input',function(e){
    list.style.display='block';
    ajax('POST','./autocomplete/ajax.php',{valeu:'recuperer'},function(tableau){
      tableau=JSON.parse(tableau);
      var valeur='<li id="ajouter" ><a href="#" onclick="mario(this)">Ajouter la valeur saisie</a></li>';
      for(var t in tableau)
      {
        var verif=false;
        for(var i=0;i<e.target.value.length;i++)
        {
          var masc=e.target.value.toUpperCase();
          if( masc[i]!=tableau[t][i])
          {
            verif=true;
          }
        }
        if(verif==false)
        {
          valeur+='<li class="valeur" ><a href="#" class="exist" onclick="grimpeur(this)">'+tableau[t]+'</li>';
        }
      }
      document.querySelector('#list').innerHTML=valeur;
    });
    
     
    },false);
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.querySelector('#list');
      
        if (elmnt != x && elmnt != donne) {
        x.style.display="none";
    } else if( elmnt == donne)
        {
          x.style.display="block";
        }
  }
    document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
  })();

  var ajout=document.querySelector('#ajouter');
  function mario(valeur)
  {
    var don=document.querySelector('#autocomplete');
    ajax('POST','./autocomplete/ajax.php',{valeur:don.value.toUpperCase()},function(donne){});
  }
  function grimpeur(valeur)
  {
    var don=document.querySelector('#autocomplete');
    // ajax('POST','ajax.php',{valeur:don.value},function(donne){});
    don.value=valeur.textContent.toUpperCase();
  }
