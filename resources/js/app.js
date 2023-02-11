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
        modal.show()
    });
});

//---------FUNZIONALITA' DI AGGIORNAMENTO ANTEPRIMA IMMAGINE--------------

const coverImageInput = document.getElementById("photo");
const imagePreview = document.getElementById("image_preview");

if (coverImageInput && imagePreview) {
    coverImageInput.addEventListener("change", function () {
        const uploadedFile = this.files[0];
        if (uploadedFile) {
            const reader = new FileReader();
            reader.addEventListener("load", function () {
                imagePreview.src = reader.result;
            });
            reader.readAsDataURL(uploadedFile);
        }
    });
}

//---------FUNZIONALITA' DI AGGIORNAMENTO ANTEPRIMA CURRICULUM--------------
const curriculumInput = document.getElementById("curriculum_vitae");
const curriculumPreview = document.getElementById("curriculum_preview");


    if (curriculumInput && curriculumPreview) {
        curriculumInput.addEventListener("change", function () {
            const uploadedFile = this.files[0];
            if (uploadedFile) {
                const reader = new FileReader();
                reader.addEventListener("load", function () {
                    curriculumPreview.src = reader.result;
                });
                reader.readAsDataURL(uploadedFile);
            }
        });
    };







