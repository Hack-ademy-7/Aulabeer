 // recuperar el button de submit
 let deleteButtons = document.getElementsByClassName("btnDelete");
// console.log(deleteButtons)
for (btn of deleteButtons){
    // en caso positivo recupero el form
    let form = btn.parentElement
    // asociar el evento del click al boton
    btn.addEventListener('click', (e) => {
    // parar el comportamiento por defecto (submit)
    e.preventDefault()
    // enseñar un alert de confirmación 
    if (confirm('Are you sure to delete this brewery?')) {
        // lanzo el submit sobre ese form
        form.submit()
    }
})
}
 
