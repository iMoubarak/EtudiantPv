//ouvert
let caret_bas_typedonnee = document.querySelector('.caret_bas_typedonnee')
let caret_bas_section = document.querySelector('.caret_bas_section')
let caret_bas_niveau_etude = document.querySelector('.caret_bas_niveau_etude')
let caret_bas_periode = document.querySelector('.caret_bas_periode')


let typedonnee_menu = document.querySelector('.typedonnee_menu')
let section_menu = document.querySelector('.sect')
let niveau_etude_menu = document.querySelector('.niveau_etude');
let periode_menu = document.querySelector('.periode')



//fermer
let button_menu_fermer = document.querySelector('.button_menu_fermer')
let button_menu_fermer_section = document.querySelector('.button_menu_fermer_section')
let button_menu_fermer_niveau_etude = document.querySelector('.button_menu_fermer_niveau_etude')
let button_menu_fermer_periode = document.querySelector('.button_menu_fermer_periode')


caret_bas_typedonnee.addEventListener('click',ouvrir_typedonnee_menu)
button_menu_fermer.addEventListener('click',fermer_typedonnee)

//-----Fonction d'ouverture de menu

function ouvrir_typedonnee_menu()
{
    typedonnee_menu.style.display = "block"
    caret_bas_typedonnee.style.display = "none"
    button_menu_fermer.style.display = "block"
}
        //Section

//-------Fonction de fermeture button
function fermer_typedonnee()
{
    button_menu_fermer.style.display = "none"
    caret_bas_typedonnee.style.display = "block"
    typedonnee_menu.style.display = "none"
    section_menu.style.display = "none"
}
let etudiant = {
    nom:"Illa",
    prenom:"Moubarak",
    mat:"60507",
    note:15
}
try {
    let search_button = document.querySelector('.input_search')
    let icon_search = document.querySelector('.icon_search')
    icon_search.addEventListener('click' ,ouvrir_recherche => {
        search_button.style.display = "block"
        search_button.focus
    })
} catch (error) {

}
let stockage = window.localStorage;
if(stockage.getItem("style")!=undefined)
    document.getElementById('lien').setAttribute('href',stockage.getItem('style'))
else
    stockage.setItem("style",'../style.css')

function switcher()
{
    let stylerecent = document.getElementById('lien').getAttribute('href').trim()
    if(stylerecent == ('../style.css'))
    {
        document.getElementById('lien').setAttribute('href','../style1.css')
        stockage.setItem("style",'../style1.css')
    }
    else
    {
        document.getElementById('lien').setAttribute('href','../style.css')
        stockage.setItem("style",'../style.css')
    }

}   
