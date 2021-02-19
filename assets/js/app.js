window.addEventListener('load',()=>{
    let borrar = document.getElementById("#borrar");
    borrar.addEventListener('click',
    (evento)=>{
            let confirmar;
            confirmar = confirm("Estas Seguro que desea eliminar esta contenido?");
            if(!confirmar){
                evento.preventDefault();
            }
    }) 
})