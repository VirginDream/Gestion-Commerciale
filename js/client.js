var clients=[
    {id:1,numClient:'CLT001',nomClient:'Jeanne Dupont',adresse:'Rouen',telephone:'06-70-65-45-32'},
    {id:2,numClient:'CLT002',nomClient:'Paul Mirabel',adresse:'Paris',telephone:'06-70-65-32-32'},
    {id:3,numClient:'CLT003',nomClient:'Olivier Verino',adresse:'Nice',telephone:'06-70-65-45-32'},
    {id:4,numClient:'CLT004',nomClient:'Laura Laune',adresse:'Marseille',telephone:'06-33-29-45-32'},
    {id:5,numClient:'CLT005',nomClient:'Nathalie Portman',adresse:'Fréjus',telephone:'06-70-65-45-32'},
    {id:6,numClient:'CLT006',nomClient:'Raymond Devos',adresse:'Toulouse',telephone:'06-55-65-45-32'},
]
showListClient();
function showListClient(){
    let html="";
    clients.forEach(function(client){
        html+=`
        <tr>
            <td><input type="checkbox" id="${client.id}" name="choix" onclick="onlyOne(this)"></td>
            <td class="center">${client.id}</td>
            <td class="center"><label for="${client.id}">${client.numClient}</label></td>
            <td class="left"><label for="${client.id}">${client.nomClient}</label></td>
            <td class="right">${client.adresse}</td>
            <td class="right">${client.telephone}</td>
        
        </tr>
 `;
})
    tbody_client.innerHTML=html;
    tfoot_th_client.innerHTML=`Vous avez ${clients.length} clients`

}
function afficher(){
    let client_id=getIdChecked('choix');
    if(client_id==0){
        alert("Veuillez cocher un client!");
        return;

    }
    let client=find(client_id);
    //console.log(article);
    remplirModal(client)
    protection(true);
    showModal.click()
}
function remplirModal(objet){
    id.value=objet.id
    numClient.value=objet.numClient
    nomClient.value=objet.nomClient
    adresse.value=objet.adresse
    telephone.value=objet.telephone
}

function modifier(){
    let client_id=getIdChecked('choix');
    if(client_id==0){
        alert("Veuillez cocher un client!");
        return;

    }
    let client=find(client_id);
    //console.log(article);
    remplirModal(client)
    protection(false);
    showModal.click()
}

function supprimer(){
    let client_id=getIdChecked('choix');
    if(client_id==0){
        alert("Veuillez cocher un article!");
        return;

    }
    let client=find(client_id);
    //console.log(article);
    remplirModal(client)
    protection(false);
    showModal.click()
}
function find(client_id){
    let objet={id:"",numClient:"",nomClient:"",adresse:"",telephone:""};
    for(i=0;i<clients.length;i++){
        if(clients[i].id==client_id){
            objet=clients[i];
        }
    }
    return objet;

}
function protection(etat){
    id.disabled=true;
    numClient.disabled=etat;
    nomClient.disabled=etat;
    adresse.disabled=etat;
    telephone.disabled=etat;
}
function creer(){
let client={id:"0",numClient:"",nomClient:"",adresse:"",telephone:""};
    //console.log(article);
    remplirModal(client)
    protection(false);
    showModal.click()
}
function supprimer(){
    let client_id=getIdChecked('choix');
    if(client_id==0){
        alert("Veuillez cocher une ligne")
        return;
    }else{
        let client=find(client_id);
        confirm(`Voulez-vous supprimer le client ${client.nomClient} `)
    }
    }

    function imprimer(){
        window.print();
    }

    function quitter(){
        document.location.href="index.html";
    }