function ajax(requet,file,parametre,fonction){
    var xhr = new XMLHttpRequest();
    xhr.open(requet,file);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // xhr.reponseText;
        fonction(xhr.responseText||xhr.responseXML);        
}
};
var form = new FormData();
for (var cle in parametre)
{
	form.append(cle,parametre[cle]);
}
   xhr.send(form);
}
