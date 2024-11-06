function createArticle (){
    const article = {
        code: prompt('Saississez le code'),
        description: prompt('Saisissez la description'),
    }
    xCode.value=article.code;
    xdescription.value=article.description;
}

function createArticle2 (){
    const code = prompt('Saississez le code')
    const description = prompt('Saississez la description')
    const article={
        code: code,
        description: description,
    }
    xCode.value=article.code;
    xdescription.value=article.description;
}

function createArticle3 (){
    const code = prompt('Saississez le code')
    const description = prompt('Saississez la description')
    const article={code,description}
    xCode.value=article.code;
    xdescription.value=article.description;
}

function createlisteArticles (){
    let code= '';
    let description= '';
    let index= 1;
    let encore= true;
    let articles = [];
    while(encore==true) {
        code=prompt('saisir le code');
        description= prompt('saisir la description');
        const article  = {
            id: index= index++,
            code: code,
            description: description,


        }
        articles.push(article);
        encore= confirm('Voulez-vous créer un autre article');
    }
    console.log(articles);

    


}