
let searchInput = document.getElementById("searchInput");
let links = document.querySelectorAll(".product-link");

searchInput.addEventListener("keyup", function(){

    let value = searchInput.value.toLowerCase();

    links.forEach(function(link){

        let text = link.innerText.toLowerCase();

        if(text.includes(value)){
            link.style.display = "block";
        }
        else{
            link.style.display = "none";
        }

    });

});