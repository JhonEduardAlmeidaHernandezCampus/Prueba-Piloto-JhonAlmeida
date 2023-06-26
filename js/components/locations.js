export default{
    changeSections(){
        let showDataLocations = document.querySelector("#showDataLocations")
        let addDataLocations = document.querySelector("#addDataLocations")

        addDataLocations.addEventListener("click", (e) =>{
            document.querySelector("#formLocations").style.display = "flex";
            document.querySelector("#show").innerHTML = null;
        })

        showDataLocations.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/SpUkM01-094/Prueba-Piloto-JhonAlmeida/uploads/getLocations", config)).json();

            let plantilla = `
                            <div class="cont">
                            <table class="showTable">
                                <thead>
                                    <tr>
                                        <th class="id">ID</th>
                                        <th class="location">LOCATION</th>
                                        <th class="location">OPTIONS</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody">
                                ${peticion.MESSAGE.map((val, id)=>{
                                    return `
                                    <tr>
                                    <td>${val.code}</td>
                                    <td>${val.name}</td>
                                    <td class="contBut">
                                        <button data-id="${val.code}" id="update" class="btnSelectModi">M</button> 
                                        <button data-id="${val.code}" id="delete" class="btnSelectDel">X</button>
                                    </td>
                                    </tr>
                                    `
                                }).join("")}
                                </tbody>
                            </table>
                            </div>
                            `;
                        document.querySelector("#show").innerHTML = plantilla;
                        document.querySelector("#formLocations").style.display = "none";

                        this.deleteInfo();
        })
    },

    saveForm(){
        let formLocations = document.querySelector("#formLocations")
        formLocations.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            data.name_location = data.name_location.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/SpUkM01-094/Prueba-Piloto-JhonAlmeida/uploads/postLocations", config)).text()
            alert("Agregado Exitosamente");
            formLocations.reset();
        })
    },

    deleteInfo(){
        let btnDelete = document.querySelectorAll("#delete");
        
        btnDelete.forEach((val, id) =>{
            val.addEventListener("click", async(e) =>{

                let data = val.dataset.id;
                
                let config = {
                    method: "DELETE",
                    header: {"Content-Type":"application/json"},
                }
    
                let peticion = await (await fetch (`http://localhost/SpUkM01-094/Prueba-Piloto-JhonAlmeida/uploads/deleteLocations/${data}`, config)).text()
                alert(peticion);
                window.location.reload();
            })
        })
    }
}