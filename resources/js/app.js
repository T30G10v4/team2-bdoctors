import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

//---------FUNZIONALITA' DI VALIDAZIONE PASSWORD--------------

const regBtn = document.getElementById("reg-btn");
const pwdInput = document.getElementById("password");
const pwdConfirmInput = document.getElementById("password-confirm");

regBtn.addEventListener("click", (event) => {

  if (pwdInput.value === pwdConfirmInput.value) {

    //console.log("PASSWORD UGUALE");

    }   

    else
    {
       //console.log("PASSWORD NON UGUALE");
       event.preventDefault();
       const pwdCheck = document.getElementById("password-check");
       pwdCheck.innerHTML = "Not-matched Password";
    }  

});







//---------FUNZIONALITA' DI CONFERMA AL DELETE--------------

//prendiamo tutti i bottoni con la classe delete-btn
const deleteBtns = document.querySelectorAll(".delete-btn");

//per ognuno di questi bottoni assegniamo un evento click
deleteBtns.forEach((btn)=>{
    btn.addEventListener("click", (event) => {
        //prima di tutto impediamo l'attivarsi del form al click sul falso bottone delete(che invece dovrà aprire la finestra con il vero delete)
        event.preventDefault();
        //con il click quindi creo il Modal di bootsrap che abbiamo inserito nella pagina delete-modal che avrà al suo interno il vero DELETE
        const modal = new bootstrap.Modal(
            document.getElementById("deleteModal")
        );
        //infine assegniamo il vero submit di cancellazione al tasto di conferma
        document.getElementById("delete").addEventListener("click" , () => {
            btn.parentElement.submit();
        });
        modal.show();
    });
});


//---------FUNZIONALITA' DI AGGIORNAMENTO ANTEPRIMA IMMAGINE--------------
const coverImageInput = document.getElementById("photo");
const imagePreview = document.getElementById("image_preview");

if  (!coverImageInput || coverImageInput.value == ""){
    if(imagePreview){
        if( !coverImageInput && imagePreview.classList.contains('filled') ) { 
            imagePreview.classList.remove("d-none");
            console.log('removed d-none')  
        } else {
            if (coverImageInput && imagePreview) {

                coverImageInput.addEventListener("change", function () {
                    const uploadedFile = this.files[0];
                    console.log(uploadedFile);
                    if (uploadedFile) {
                        const reader = new FileReader();
                        reader.addEventListener("load", function () {
                            imagePreview.src = reader.result;
                        });
                        reader.readAsDataURL(uploadedFile);
        
                        imagePreview.classList.remove("d-none");
                        imagePreview.classList.add("filled");
        
                        console.log('removed d-none, add filled ')
                    };
                })
            }

            if(coverImageInput && coverImageInput.value == "" && imagePreview.classList.contains('filled'))
            {
                imagePreview.classList.remove("d-none");
                
                console.log("rimuovo d-none perchè input esiste, non è vuoto e ha filled ")
            //IN create e in edit se non caricato nessun file precedentemente
            }else if (coverImageInput && coverImageInput.value == "" && !imagePreview.classList.contains('filled')
             ){ 
                imagePreview.classList.add("d-none");
                console.log("add d-none perchè input esiste, ma è vuoto e filled false")
            }else{
                imagePreview.classList.add("d-none");
                console.log("add d-none (l'input esiste ma è vuoto) ")
            }

        }
    }
}


 

//---------FUNZIONALITA' DI AGGIORNAMENTO ANTEPRIMA CURRICULUM--------------
const curriculumInput = document.getElementById("curriculum_vitae");
const curriculumPreview = document.getElementById("curriculum_preview");

//situazione in create, e in show e in edit 
//quando il campo input non c'è O non c'è nessun file selezionato 
if  (!curriculumInput || curriculumInput.value == ""){
    if(curriculumPreview){
        if( !curriculumInput && curriculumInput.classList.contains('filled') ) { 

            //in show
            curriculumPreview.classList.remove("d-none");
            console.log('removed d-none')  
        } else { 
            if (curriculumInput && curriculumPreview) {

                curriculumInput.addEventListener("change", function () {
                    const uploadedFile = this.files[0];
                    if (uploadedFile) {
                        const reader = new FileReader();
                        reader.addEventListener("load", function () {
                            curriculumPreview.src = reader.result;
                        });
                        reader.readAsDataURL(uploadedFile);
            
                        curriculumPreview.classList.remove("d-none");
                        curriculumPreview.classList.add("filled");

                        console.log('removed d-none, add filled, true ')
                    }
                });
            }

            //in edit se ho caricato precedentemente un file NON FUNZIONA, LA CLASSE NON FILLED NON VIENE SALVATA
            if(curriculumInput && curriculumInput.value == "" && curriculumPreview.classList.contains('filled'))
            {
                curriculumPreview.classList.remove("d-none");
                
                console.log("rimuovo d-none perchè input esiste, non è vuoto e ha filled ")
            //IN create e in edit se non caricato nessun file precedentemente
            }else if (curriculumInput && curriculumInput.value == "" && !curriculumPreview.classList.contains('filled')
             ){ 
                curriculumPreview.classList.add("d-none");
                console.log("add d-none perchè input esiste, ma è vuoto e filled false")
            }else{
                curriculumPreview.classList.add("d-none");
                console.log("add d-none (l'input esiste ma è vuoto) ")
            }
        }
    }
}


