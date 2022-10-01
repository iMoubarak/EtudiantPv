
let matricule = document.forms['ConnexionForm']['mat']
let password = document.forms['ConnexionForm']['passwd']
let connexionErreur = document.querySelector('.connexionErreur')
let carac = "60507"
function valid() {
    if(matricule.value != carac)
    {
        matricule.style.border = "1px solid red"
        connexionErreur.style.display = "block"
        connexionErreur.innerHTML = "Ce numéro de matricule n'existe pas !"
        matricule.focus
        return false
    }
    if(password.value != "1234")
    {
        password.style.border = "1px solid red"
        connexionErreur.style.border = "block"
        password.focus
        connexionErreur.innerHTML = "Mot de passe incorrect !"
        return false
    }
        return true;
}
let stockage = window.localStorage;
if(stockage.getItem("style")!=undefined)
    document.getElementById('lien').setAttribute('href',stockage.getItem('style'))
else
    stockage.setItem("style",'style.css')

function switcher()
{
    let stylerecent = document.getElementById('lien').getAttribute('href').trim()
    if(stylerecent == ('style.css'))
    {
        document.getElementById('lien').setAttribute('href','style1.css')
        stockage.setItem("style",'style1.css')
    }
    else
    {
        document.getElementById('lien').setAttribute('href','style.css')
        stockage.setItem("style",'style.css')
    }

}


