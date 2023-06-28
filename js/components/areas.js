export default {
    changeSectionsAreas(){
        let showDataArea = document.querySelector("#showDataArea")
        let addDataArea = document.querySelector("#addDataArea")

        addDataArea.addEventListener("click", (e) =>{
            document.querySelector("#formArea").style.display = "flex";
            document.querySelector(".showArea").innerHTML = null;
        })

        showDataArea.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/SkylAb-117/Prueba-Piloto-JhonAlmeida/uploads/getAllAreas", config)).json();

            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">AREAS</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.Code}</td>
                                        <td>${val.Name}</td>
                                        <td class="contBut">
                                            <button data-id="${val.Code}" id="update" class="btnSelectModi">M</button> 
                                            <button data-id="${val.Code}" id="delete" class="btnSelectDel">X</button>
                                        </td>
                                        </tr>
                                        `
                                    }).join("")}
                                    </tbody>
                                </table>
                            </div>
                            `;
                        document.querySelector(".showArea").innerHTML = plantilla;
                        document.querySelector("#formArea").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormAreas(){
        let formArea = document.querySelector("#formArea")
        formArea.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            data.name_area = data.name_area.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/SkylAb-117/Prueba-Piloto-JhonAlmeida/uploads/postAreas", config)).text()
            alert("Agregado Exitosamente");
            formArea.reset();
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
    
                let peticion = await (await fetch (`http://localhost/SkylAb-117/Prueba-Piloto-JhonAlmeida/uploads/deleteAreas/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/SkylAb-117/Prueba-Piloto-JhonAlmeida/uploads/getAreas/${idbtn}`, config)).json();
                document.querySelector("#areasContent").innerHTML =   `
                                                                            <h3>AREAS</h3>
                                                                            
                                                                            <form class="row contenedorForm g-3" id="newFormAreas">
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Area</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].Name}" name="name_area" required>
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
        let newFormAreas = document.querySelector("#newFormAreas");
        
        newFormAreas.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));
            data.name_area = data.name_area.toLocaleUpperCase();

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/SkylAb-117/Prueba-Piloto-JhonAlmeida/uploads/putAreas/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormAreas.reset();
            window.location.reload();
        })
    }
}