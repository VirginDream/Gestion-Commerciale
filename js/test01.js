let html="";
articles.forEach(function(article){
    html`
    <tr>
        <td>$(article.id)</td>
        <td>$(article.code)</td>
        <td>$(article.designation)</td>
        <td>$(article.pu)</td>

    
    </tr>
    `
})

tbody.article.innerHTML=html
tfoot_td_article.innerhtml