// let getForm = document.getElementById("getForm");

// getForm.addEventListener("submit", (event) =>{
//     event.preventDefault();
//     toPhpWithGet(event);
// });

// function toPhpWithGet(event){
//     let form = event.target;
//     const data = new FormData(form);

//     console.log(data.get("article"));
//     console.log(data.get("maxPrice"));

//     let url = "fetchGet.php?article="+data.get("article")+"&maxPrice="+data.get("maxPrice");
//     fetch(url)
//     .then((response)=>{
//         console.log(response);
//     });
// };

// let postForm = document.getElementById("postForm");

// postForm.addEventListener("submit", (event => {
//     event.preventDefault();
//     toPhpWithPost(event);
// }));

// function FormToDictionary(form){
//     const data = new FormData(form);
//     let formKeyValue = {};
//     for(const [name,value] of data){
//         formKeyValue[name] = value;
//     }
//     return formKeyValue;
// };

// function toPhpWithPost(event){
//     let form = event.target;
//     let jsonForm = FormToDictionary(form);
//     console.log(jsonForm);

//     let options = 
//     {
//         method: "POST",
//         cache: "no-cache",
//         headers: {"Content-type": "application/json", "Content-type": "text/css", "href": "assets/css/style.css"},   
//         body: JSON.stringify(jsonForm)
//     }
//     fetch("fetchPost.php", options)
//     .then(async(response)=>{
//         console.log(response);
//     });
// };

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
    });
};

searchFormulier.addEventListener("submit", (event) =>{
    searchPersoon(event);
});