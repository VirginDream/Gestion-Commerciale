const nbre=12;
var p=0;
carroussel_content.style.width=(800*nbre)+"px";
for(i=1;i<=nbre;i++){
    div=document.createElement('div');
    div.style.backgroundImage=`url("./img/Image${i}.jpg")`;
    div.className="photo";
    carroussel_content.appendChild(div);
}
afficherMasquerFleche();
g.onclick=function(){
    p++
    carroussel_content.style.translate=(p*800)+"px"
    afficherMasquerFleche();
    p_id.innerHTML=p;
}

d.onclick=function(){
    p--
    carroussel_content.style.translate=(p*800)+"px"
    afficherMasquerFleche();
    p_id.innerHTML=p;
}

function afficherMasquerFleche(){
    if(p==0){
        g.style.display="none"
    }else{
        g.style.display="block"
    }
    if(p==-nbre+1){
        d.style.display="none"
    }else{;
        d.style.display="block"
    }
    nbre.innerHTML=p;

}