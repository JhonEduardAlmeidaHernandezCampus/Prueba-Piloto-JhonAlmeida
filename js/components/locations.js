export default {
    changeSections(){
        let showDataLocations = document.querySelector("#showDataLocations")
        let addDataLocations = document.querySelector("#addDataLocations")

        addDataLocations.addEventListener("click", (e) =>{
            document.querySelector("#formLocations").style.display = "flex";
            document.querySelector(".showLocations").innerHTML = null;
        })

        showDataLocations.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllLocations", config)).json();
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
                        document.querySelector(".showLocations").innerHTML = plantilla;
                        document.querySelector("#formLocations").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveForm(){
        let formLocations = document.querySelector("#formLocations")
        formLocations.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }
            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postLocations", config)).text()
            alert("Agregado Exitosamente");
            formLocations.reset();
            window.location.reload();
        })
    },

    deleteInfo(){
        let btnUpdate = document.querySelectorAll("#delete");
        
        btnUpdate.forEach((val, id) =>{
            val.addEventListener("click", async(e) =>{
                let data = val.dataset.id;
                
                let config = {
                    method: "DELETE",
                    header: {"Content-Type": "application/json"},
                }
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteLocations/${data}`, config)).text()
                alert("Eliminado Exitosamente");
                window.location.reload();
            })
        })
    },

    showUpdate(){
        let btnUpdate = document.querySelectorAll("#update");
        btnUpdate.forEach((val,id) => {
            
            val.addEventListener("click",  async(e)=>{
                
                let idbtn = val.dataset.id;

                let config = {
                    method: "GET",
                    header: {"Content-Type": "application/json"},
                }

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getLocations/${idbtn}`, config)).json();
                document.querySelector("#locationsContent").innerHTML = `
                                                                            <h3>LOCATIONS</h3>
                                                                            
                                                                            <form class="row contenedorForm g-3" id="newFormLocations">
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Location</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].name}" name="name_location" required>
                                                                                </div>
                                                                                <div class="col-12 mt-3">
                                                                                    <button type="submit" id="${idbtn}" class="btnUpdate btn">Update</button>
                                                                                </div>
                                                                            </form>
                                                                        `;
                                                                        this.updateInfo();
            })
        });
    },

    updateInfo(){
        let newFormLocations = document.querySelector("#newFormLocations");
        
        newFormLocations.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putLocations/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            window.location.reload();
        })
    }
}