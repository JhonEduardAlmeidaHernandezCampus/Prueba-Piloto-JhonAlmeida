// let formLocations = document.querySelector("#formLocations")
// formLocations.addEventListener("submit", async(e) =>{
//     e.preventDefault();
//     let data = Object.fromEntries(new FormData(e.target))

//     let config = {
//         method: "POST",
//         header: {"Content-Type": "application/json"},
//         body: JSON.stringify(data)
//     }

//     let peticion = await(await fetch("script/locations.php", config)).text();
// })