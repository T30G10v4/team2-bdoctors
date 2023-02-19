import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
]);

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

const cvEdit = document.querySelector(".cv_edit");
const cvCreate = document.querySelector(".cv_create");

if  (!coverImageInput || coverImageInput.value == ""){
    if(imagePreview){
        if( !coverImageInput ) { 
            //in show
            imagePreview.classList.remove("d-none");
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
                    };
                })
            }

            if(coverImageInput && coverImageInput.value == "" && !cvCreate)
            {
                imagePreview.classList.remove("d-none"); 
            }
            //in edit
            else if (coverImageInput && coverImageInput.value == "" && cvEdit)
            { 
                imagePreview.classList.remove("d-none");
            }
            //in create
            else if (coverImageInput && coverImageInput.value == "" && cvCreate)
            {
                imagePreview.classList.add("d-none");
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
        if( !curriculumInput  ) {
            //in show
            curriculumPreview.classList.remove("d-none");
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
                    }
                })
            }


            //in edit se ho caricato precedentemente un file
            if(curriculumInput && curriculumInput.value == "" && !cvCreate) 
            {
                curriculumPreview.classList.remove("d-none");
            //in edit
            }
            else if(curriculumInput && curriculumInput.value == "" && cvEdit  ){ 
                curriculumPreview.classList.remove("d-none");
            }
            //in create
            else if (curriculumInput && curriculumInput.value == "" && cvCreate )
             { 
                curriculumPreview.classList.add("d-none");
            }
        }
    }
}


//---------FUNZIONALITA' DI VALIDAZIONE PASSWORD--------------

const regBtn = document.getElementById("reg-btn");
const pwdInput = document.getElementById("password");
const pwdConfirmInput = document.getElementById("password-confirm");

if(regBtn){
    regBtn.addEventListener("click", (event) => {
    
      if (pwdInput.value === pwdConfirmInput.value) {
        //console.log("PASSWORD UGUALI");
        }else{
           //console.log("PASSWORD NON UGUALI");
           event.preventDefault();
           const pwdCheck = document.getElementById("password-check");
           pwdCheck.innerHTML = "Not-matched Password";
        }  
    });
}

//---------FUNZIONALITA' DI PAGAMENTO--------------

const button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});