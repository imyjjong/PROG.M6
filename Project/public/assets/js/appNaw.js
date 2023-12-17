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

function onclick(){
    document.getElementById("email").value = "";
    document.getElementById("email").style.color = "white";
}

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
    .then(response => response.json())
    .then(data => {
        if(false === data.success){
            const email = document.getElementById("email");
            email.value = "";
            email.value = "email al in gebruik";
            email.blur("1rem");
            email.style.color = "red";
            email.onclick = function(){
                onclick();
            }
            return false;
        }
        console.log('ur data blah blah:' + data.id);
    })
    .catch(error => console.error(error))
    
};