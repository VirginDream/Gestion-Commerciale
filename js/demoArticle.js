var articles=[
    {id:1,code:'BB001',designation:'Biere Castel',pu:4.50},
    {id:2,code:'BB002',designation:'Biere Phoenix',pu:4.50},
    {id:3,code:'BJ001',designation:'Jus ananas',pu:2.50},
    {id:4,code:'BJ002',designation:'Jus pomme',pu:4.50},
    {id:5,code:'BA001',designation:'Rhum Charette',pu:14.50},
    {id:6,code:'BA002',designation:'William peel',pu:15.50},


]

showListArticle();
function showListArticle(){
//   let html="";
//   let article={};
//   for(i=0;i<articles.length;i++){
//       article=articles[i];
 //      let btn1=`<button class="bg-green" onclick="afficher(${article.id})">Afficher</button>`
 //      let btn2=`<button class="bg-navy" onclick="modifier(${article.id})">Modifier</button>`
 //      let btn3=`<button class="bg-red" onclick="supprimer(${article.id})">Supprimer</button>`
//       /html+=`
//       <tr>
//           <td>${article.id}</td>
//           <td>${article.code}</td>
//           <td>${article.designation}</td>
//           <td>${article.pu}</td>
//           <td class="center flex-space-between">${btn1} ${btn2} ${btn3}</td>
//       </tr>
//       `;
//   }
//   tbody_article.innerHTML=html;
//foot_td_article.innerHTML= `<h2> Vous avez ${articles.length} articles </h2>


let html='';
articles.forEach(function(article){
    let btn1=`<button class="bg-green" onclick="afficher(${article.id})">Afficher</button>`
    let btn2=`<button class="bg-navy" onclick="modifier(${article.id})">Modifier</button>`
    let btn3=`<button class="bg-red" onclick="supprimer(${article.id})">Supprimer</button>`
    html+=`
    
    <tr>
        <td>${article.id}</td>
        <td>${article.code}</td>
        <td>${article.designation}</td>
        <td>${article.pu}</td>
         <td class="center flex-space-between">${btn1} ${btn2} ${btn3}</td>

    
    </tr>
    `;
})
    tbody_article.innerHTML=html;
tfoot_td_article.innerHTML= `<h3> Vous avez ${articles.length} articles </h3>`
}

    tbody_article.innerHTML=html;
tfoot_td_article.innerHTML= `<h3> Vous avez ${articles.length} articles </h3>`

function afficher(article_id){
    
    let article=chercherArticle(article_id);
    console.log(article);
    //------Mise à jour------
    id.value=article.id
    designation.value=article.designation
    numArticle.value=article.code
    prixUnitaire.value=article.pu
    showModal.click();
    //-----Desactiver les saisies-----

    id.disabled=true;
    designation.disabled=true
    numArticle.disabled=true
    prixUnitaire.disabled=true
    showModal.click();true
}
function modifier(article_id){
    let article=chercherArticle(article_id);
    console.log(article);
    //------Mise à jour------
    id.value=article.id
    designation.value=article.designation
    numArticle.value=article.code
    prixUnitaire.value=article.pu
    showModal.click();
    //-----Desactiver les saisies-----

    id.disabled=true;
    designation.disabled=false
    numArticle.disabled=false
    prixUnitaire.disabled=false
    showModal.click();true
}
function supprimer(article_id){
    let article=chercherArticle(article_id);
    console.log(article);
    //------Mise à jour------
    id.value=article.id
    designation.value=article.designation
    numArticle.value=article.code
    prixUnitaire.value=article.pu
    showModal.click();
    //-----Desactiver les saisies-----

    id.disabled=true;
    designation.disabled=true
    numArticle.disabled=true
    prixUnitaire.disabled=true
    showModal.click();
    confirm("Suppression de article_id="+article_id);
}

function creer(){
    //------Mise à jour------
    id.value=""
    designation.value=""
    numArticle.value=""
    prixUnitaire.value=""
    
    //-----Desactiver les saisies-----

    id.disabled=true;
    designation.disabled=false;
    numArticle.disabled=false;
    prixUnitaire.disabled=false;
    showModal.click();
}

function chercherArticle(article_id){
    let article={id:"",code:"",designation:"",pu:""}
    for(i=0;i<articles.length;i++){
        if(articles[i].id==article_id){
            article=articles[i]
        }
    }
    return article;
}
