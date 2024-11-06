<div id="login-container">
    <div id="login-content" class="form-container">
        <h1 class="titre bg-dark text-light"><?=strtoupper($title)?></h1>
        <form action="index.php?url=security&action=login" method="POST">
        <div class="line-input">
            <label for="username" class="lab30 text-light text-center" >IDENTIFIANT</label>
            <input type="text " id="username" value="" name="username" class="form-control w70">
        </div>
        <div class="line-input my-2">
            <label for="password" class="lab30 text-light text-center" >PASSWORD</label>
            <input type="password" id="password" value="" name="password" class="form-control w70">
        </div>
        <div class="line-button">
            <button class="btn btn-md btn-secondary text-light" onclick="quitter()">Quitter</button>
            <p class="text-danger"><?=$message?></p>
            <button class="btn btn-md btn-secondary text-light">Se Connecter</button>
        </div>
    </div>
</div>



        </form>


<script>
    function quitter(){
        document.location.href="index.php";
    }
</script>
        