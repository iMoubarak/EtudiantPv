
let caret_bas_typedonnee = document.querySelector('.caret_bas_typedonnee')
let caret_bas_section = document.querySelector('.caret_bas_section')

let typedonnee_menu = document.querySelector('.typedonnee_menu')
let section_menu = document.querySelector('.sect')




let button_menu_fermer = document.querySelector('.button_menu_fermer')
let button_menu_fermer_section = document.querySelector('.button_menu_fermer_section')


caret_bas_typedonnee.addEventListener('click',ouvrir_typedonnee_menu)
button_menu_fermer.addEventListener('click',fermer_typedonnee)

//-----Fonction d'ouverture de menu

function ouvrir_typedonnee_menu()
{
    typedonnee_menu.style.display = "block"
    caret_bas_typedonnee.style.display = "none"
    button_menu_fermer.style.display = "block"
}

caret_bas_section.addEventListener('click',ouvrir_section_menu => {
    caret_bas_section.style.display = "none"
    button_menu_fermer_section.style.display = "block"
    section_menu.style.display = "block"

})
button_menu_fermer_section.addEventListener('click', fermer_section_menu => {
    caret_bas_section.style.display = "block"
    button_menu_fermer_section.style.display = "none"
    section_menu.style.display = "none"

})
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
let search_button = document.querySelector('.input_search')
let icon_search = document.querySelector('.icon_search')
icon_search.addEventListener('click' ,ouvrir_recherche => {
    search_button.style.display = "block"
    search_button.focus
})
