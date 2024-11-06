var articles=[
    {id:1,code:'BB001',designation:'Biere Castel',pu:4.50,pr:2.50},
    {id:2,code:'BB002',designation:'Biere Phoenix',pu:4.50,pr:3.50},
    {id:3,code:'BJ001',designation:'Jus ananas',pu:2.50,pr:1.50},
    {id:4,code:'BJ002',designation:'Jus pomme',pu:4.50,pr:3.50},
    {id:5,code:'BA001',designation:'Rhum Charette',pu:14.50 ,pr:10.50},
    {id:6,code:'BA002',designation:'William peel',pu:15.50, pr:10},
]
showListArticle();
function showListArticle(){
    let html="";
    articles.forEach(function(article){
        html+=`
        <tr>
            <td><input type="checkbox" id="${article.id}" name="choix" onclick="onlyOne(this)"></td>
            <td class="center">${article.id}</td>
            <td class="center"><label for="${article.id}">${article.code}</label></td>
            <td class="left"><label for="${article.id}">${article.designation}</label></td>
            <td class="right">${article.pu}</td>
            <td class="right">${article.pr}</td>
        
        </tr>
 `;
})
    tbody_article.innerHTML=html;
    tfoot_th_article.innerHTML=`Vous avez ${articles.length} articles`

}
function afficher(){
    let article_id=getIdChecked('choix');
    if(article_id==0){
        alert("Veuillez cocher un article!");
        return;

    }
    let article=find(article_id);
    //console.log(article);
    remplirModal(article)
    protection(true);
    showModal.click()
} 
function remplirModal(objet){
    id.value=objet.id
    numArticle.value=objet.code
    designation.value=objet.designation
    prixUnitaire.value=objet.pu
    prixRevient.value=objet.pr
}

function modifier(){
    let article_id=getIdChecked('choix');
    if(article_id==0){
        alert("Veuillez cocher un article!");
        return;

    }
    let article=find(article_id);
    //console.log(article);
    remplirModal(article)
    protection(false);
    showModal.click()
}

function supprimer(){
    let article_id=getIdChecked('choix');
    if(article_id==0){
        alert("Veuillez cocher un article!");
        return;

    }
    let article=find(article_id);
    //console.log(article);
    remplirModal(article)
    protection(false);
    showModal.click()
}
function find(article_id){
    let objet={id:"",code:"",designation:"",pu:"",pr:""};
    for(i=0;i<articles.length;i++){
        if(articles[i].id==article_id){
            objet=articles[i];
        }
    }
    return objet;

}
function protection(etat){
    id.disabled=true;
    numArticle.disabled=etat;
    designation.disabled=etat;
    prixUnitaire.disabled=etat;
    prixRevient.disabled=etat;
}
function creer(){
let article={id:0,code:'',designation:'',pu:'',pr:''}
    //console.log(article);
    remplirModal(article)
    protection(false);
    showModal.click()
}
function supprimer(){
    let article_id=getIdChecked('choix');
    if(article_id==0){
        alert("Veuillez cocher une ligne")
        return;
    }else{
        let article=find(article_id);
        confirm(`Voulez-vous supprimer l'article ${article.code} - ${article.designation} - ${article.pu}€ `)
    }
    }

    function imprimer(){
        window.print();
    }

    function quitter(){
        document.location.href="index.html";
    }