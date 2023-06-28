export default {
    changeSectionsTeamEducators(){
        let showDataTeamEducators = document.querySelector("#showDataTeamEducators")
        let addDataTeamEducators = document.querySelector("#addDataTeamEducators")

        addDataTeamEducators.addEventListener("click", (e) =>{
            document.querySelector("#formTeamEducators").style.display = "flex";
            document.querySelector(".showTeamEducators").innerHTML = null;
        })

        showDataTeamEducators.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllTeamEducators", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">TEAM EDUCATORS</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.name_rol}</td>
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
                            document.querySelector(".showTeamEducators").innerHTML = plantilla;
                            document.querySelector("#formTeamEducators").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormTeamEducators(){
        let formTeamEducators = document.querySelector("#formTeamEducators")
        formTeamEducators.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            data.name_rol = data.name_rol.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postTeamEducators", config)).text()
            alert("Agregado Exitosamente");
            formTeamEducators.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteTeamEducators/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getTeamEducators/${idbtn}`, config)).json();
                console.log(info);
                document.querySelector("#teamEducatorsContent").innerHTML = `
                                                                        <h3>TEAM EDUCATORS</h3>
                                                                        
                                                                        <form class="row contenedorForm g-3" id="newFormTeamEducators">
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Rol</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_rol}" name="name_rol" required>
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
        let newFormTeamEducators = document.querySelector("#newFormTeamEducators");
        
        newFormTeamEducators.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));
            data.name_rol = data.name_rol.toLocaleUpperCase();

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putTeamEducators/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormTeamEducators.reset();
            window.location.reload();
        })
    }
}