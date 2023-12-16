const searchFormulier = document.getElementById("searchForm");

function searchPersoon(event){
    event.preventDefault();
    let form = event.target;
    const data = new FormData(form);
    let url = "searchNaw.php?searchPersoon="+data.get("searchPersoon");
    fetch(url)
    .then(async (response)=>{
        console.log(response);
        let json = await response.json();
        console.log(json);
        showPerson(json);
    });
};

searchFormulier.addEventListener("submit", (event) =>{
    searchPersoon(event);
});

function showPerson(json){
    let person = json[0];
    document.getElementById("nawItem__id").textContent = person.id;
    document.getElementById("nawItem__name").textContent = person.naam;
    document.getElementById("nawItem__street").textContent = person.straat;
    document.getElementById("nawItem__huisnr").textContent = person.huisnummer;
    document.getElementById("nawItem__postcode").textContent = person.postcode;
    document.getElementById("nawItem__email").textContent = person.email;
};