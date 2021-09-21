
const deleteForm = document.querySelectorAll('.delete-post');

deleteForm.forEach(element => {
    element.addEventListener('submit', function(e) {
        // controllo se clicca ok o annulla 
        const risposta = confirm('Sei sicuro di cancellare il post?');

        if(!risposta){
            e.preventDefault();
        }
    })
});