export default {
    changeSectionsLevels(){
        let showDataLevels = document.querySelector("#showDataLevels")
        let addDataLevels = document.querySelector("#addDataLevels")

        addDataLevels.addEventListener("click", (e) =>{
            document.querySelector("#formLevels").style.display = "flex";
            document.querySelector(".showLevels").innerHTML = null;
        })

        showDataLevels.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllLevels", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME LEVEL</th>
                                            <th class="location">GROUP LEVEL</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.name_level}</td>
                                        <td>${val.group_level}</td>
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
                            document.querySelector(".showLevels").innerHTML = plantilla;
                            document.querySelector("#formLevels").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormLevels(){
        let formLevels = document.querySelector("#formLevels")
        formLevels.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postLevels", config)).text()
            alert("Agregado Exitosamente");
            formLevels.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteLevels/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getLevels/${idbtn}`, config)).json();
                document.querySelector("#levelsContent").innerHTML = `
                                                                        <h3>TEAM EDUCATORS</h3>

                                                                        <form class="row contenedorForm" id="newFormLevels">
                                                                            <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Name Level</label>
                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].name_level}" name="name_level" required>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Group Level</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].group_level}" name="group_level" required>
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
        let newFormLevels = document.querySelector("#newFormLevels");
        
        newFormLevels.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putLevels/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormLevels.reset();
            window.location.reload();
        })
    }
}