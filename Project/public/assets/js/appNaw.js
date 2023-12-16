function formToDictionary(form){
    const data = new FormData(form);
    let formKeyValue = {};
    for(const [name, value] of data){
        formKeyValue[name] = value;
    }
    return formKeyValue;
};

let nawForm = document.getElementById("nawForm");


nawForm.addEventListener("submit", (event) => {
    addPerson(event);
});

function addPerson(event){
    event.preventDefault();
    let form = event.target;
    let jsonForm = formToDictionary(form);
    console.log(jsonForm);

    let options = 
    {
        method: "POST",
        cache: "no-cache",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(jsonForm)
    };

    fetch("nawSave.php", options)
    .then(async(response) => {
        console.log(response);
        let json = await response.json();
        console.log(json);
    });
};