function FormToDictionary(form){
    const data = new FormData(form);
    let formKeyValue = {};
    for(const [name,value] of data){
        formKeyValue[name] = value;
    }
    return formKeyValue;
};

let imageForm = document.getElementById("imageForm");

imageForm.addEventListener("submit", (event) => {
    event.preventDefault();
    uploadFormFile(event);
});

function uploadFormFile(event){
    let form = event.target;
    let options = 
    {
        method: "POST",
        body: new FormData(form)
    };

    fetch("imagerecieve.php", options)
    .then(async(response)=>{
        console.log(response);
    });
};