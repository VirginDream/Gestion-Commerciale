<div>
<h2>Rechercher</h2>
  <input type="text" name="text" id="text" />
  <hr/>
  <div id="list"></div>
</div> 
<script>
    let text = document.getElementById("text");
    let list = document.getElementById("list");

    text.addEventListener("keyup",(event) => {
        let valeur = event.target.value;
        if(valeur){
        let data = new FormData();
        data.append('mot', valeur);

        fetch ("test1.php?action=autocomplete",{
            method: "POST",
            body: data,

        })
        .then(response => response.json())
        .then (dataR =>{
            let html = "";
            dataR.forEach((item) =>{
                html += `
                <p> ${item.designation}</p>
                `;
            })
            list.innerHTML = html;



        }); 
        }else{
            list.innerHTML = "";
        }
    });
    list.addEventListener('click', ()=>{
        text.value=event.target.innerHTML;
        list.innerHTML = "";
    });

        

    
    


</script>


<ul class="mh30 w70">
<?php
                $html="";
                foreach($roles as $role){
                    $id=$role->getId();
                    $code=$role->getCode();
                    $user_roles=$user->getRoles();
                    $selected=(in_array($code,$user_roles))?"checked":"";
                    $html.="<li><input type=checkbox  id='$id' name='roles[]  value='$code' $checked >$code</li>";
                }
                echo $html;
            
            ?>



</ul>