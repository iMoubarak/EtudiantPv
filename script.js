
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



