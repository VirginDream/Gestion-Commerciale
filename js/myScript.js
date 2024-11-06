function imprimer(){
    window.print('');
}

function activerMenuContextuel(event){
    event.preventDefault();
        contextmenu.style.top = `${event.pageY}px`;
        contextmenu.style.left = `${event.pageX}px`;
        contextmenu.style.display="block"
}

document.addEventListener('click', (event) => {
    contextmenu.style.display="none";
 })



function quitter(){
    document.location.href="index.php";
} 

function touche(event) {
    if (event.keyCode == 13) {
      chercher();

    }
  }
function showLoader(){
    attente.style.visibility = 'visible';
}

function hideLoader(){
    attente.style.visibility = 'hidden';
}

function previewImage(image_changed,id_view_image){
    const image=image_changed.files[0];
    let view_image=document.getElementById(id_view_image);
    if(image){
        view_image.src=URL.createObjectURL(image);


}
}



function onlyOne(checkbox){
    let checkboxes=document.getElementsByName(checkbox.name)
    console.log(checkboxes);
    checkboxes.forEach(function(item){
        if(item!=checkbox){
            item.checked=false;
        }
})
}
function getIdChecked(nameElement){
    let elements=document.getElementsByName(nameElement);
    let article_id=0;
    elements.forEach(function(item){
        if(item.checked==true){
            article_id=item.id;
            stop; 
        }
    })
    return article_id
}

function sousMenu(parent){
    let sous_menu= parent.children[1]
    let enfants=document.querySelectorAll(".niveau-h2");
    for(i=0;i<enfants.length;i++){
        if(enfants[i]!==sous_menu){
            enfants[i].classList.add('hide');

        }else{
            //sous_menu.classList.toggle('hide');
            enfants[i].classList.toggle('hide');
        }
    }
   }

//function sousMenu(parent) {
//   let allSousMenus = document.getElementsByClassName('niveau-h2');
//   console.log(allSousMenus);
//   let sousMenu = parent.children[1];
//   Array.from(allSousMenus).forEach(element => {
//       if (element !== sousMenu) {
//           element.classList.add('hide');
//         }
//   });
//   sousMenu.classList.toggle('hide');
// } 

function getIdChecked(nameElement){
    let elements=document.getElementsByName(nameElement);
    let client_id=0;
    elements.forEach(function(item){
        if(item.checked==true){
            client_id=item.id;
            stop; 
        }
    })
    return client_id
}

function getIdChecked(nameElement){
    let elements=document.getElementsByName(nameElement);
    let client_id=0;
    elements.forEach(function(item){
        if(item.checked==true){
            client_id=item.id;
            stop; 
        }
    })
    return client_id
}

function popupCenter(url, title, w, h) {
    var left = (screen.width/2)-(w/2);
    var top = (screen.height/2)-(h/2);
    return window.open(url, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 

