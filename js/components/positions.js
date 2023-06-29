export default {
    changeSectionsPosition(){
        let showDataPosition = document.querySelector("#showDataPosition")
        let addDataPosition = document.querySelector("#addDataPosition")

        addDataPosition.addEventListener("click", (e) =>{
            document.querySelector("#formPosition").style.display = "flex";
            document.querySelector(".showPosition").innerHTML = null;
        })

        showDataPosition.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllPosition", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME POSITION</th>
                                            <th class="location">ARL</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.name_position}</td>
                                        <td>${val.arl}</td>
                                        <td class="contBut">
                                            <button data-id="${val.id}" id="update" class="btnSelectModi">M</button> 
                                            <button data-id="${val.id}" id="delete" class="btnSelectDel">X</button>
                                        </td>
                                        </tr>
                                        `
                                    }).join("")}
                                    </tbody>
                                </table>
                            </div>
                            `;
                        document.querySelector(".showPosition").innerHTML = plantilla;
                        document.querySelector("#formPosition").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormPosition(){
        let formPosition = document.querySelector("#formPosition")
        formPosition.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postPosition", config)).text()
            alert("Agregado Exitosamente");
            formPosition.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deletePosition/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getPosition/${idbtn}`, config)).json();
                document.querySelector("#positionsContent").innerHTML = `
                                                                            <form class="row contenedorForm" id="newFormPosition">
                                                                                <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Position</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_position}" name="name_position" required>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Arl</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].arl}" name="arl" required>
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
        let newFormPosition = document.querySelector("#newFormPosition");
        
        newFormPosition.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putPosition/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormPosition.reset();
            window.location.reload();
        })
    }
}