export default {
    changeSectionsWorkReferences(){
        let showDataWorkReferences = document.querySelector("#showDataWorkReferences")
        let addDataWorkReferences = document.querySelector("#addDataWorkReferences")

        addDataWorkReferences.addEventListener("click", (e) =>{
            document.querySelector("#formWorkReferences").style.display = "flex";
            document.querySelector(".showWorkReferences").innerHTML = null;
        })

        showDataWorkReferences.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllWorkReference", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">FULL NAME</th>
                                            <th class="location">CELL NUMBER</th>
                                            <th class="location">POSITION</th>
                                            <th class="location">COMPANY</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.full_name}</td>
                                        <td>${val.cel_number}</td>
                                        <td>${val.position}</td>
                                        <td>${val.company}</td>
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
                            document.querySelector(".showWorkReferences").innerHTML = plantilla;
                            document.querySelector("#formWorkReferences").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormWorkReferences(){
        let formWorkReferences = document.querySelector("#formWorkReferences")
        formWorkReferences.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postWorkReference", config)).text()
            alert("Agregado Exitosamente");
            formWorkReferences.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteWorkReference/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getWorkReference/${idbtn}`, config)).json();
                document.querySelector("#workReferenceContent").innerHTML = `
                                                                                <h3>WORK REFERENCE</h3>
                                                                                <form class="row contenedorForm g-3" id="newFormWorkReferences">
                                                                                    <div class="col-3">
                                                                                        <label for="inputEmail4" class="form-label">Full Name</label>
                                                                                        <input type="text" class="form-control" value="${info.MESSAGE[0].full_name}" name="full_name" required>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <label for="inputEmail4" class="form-label">Cellphone</label>
                                                                                        <input type="text" class="form-control" value="${info.MESSAGE[0].cel_number}" name="cel_number" required>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <label for="inputEmail4" class="form-label">Position</label>
                                                                                        <input type="text" class="form-control" value="${info.MESSAGE[0].position}" name="position" required>
                                                                                    </div>
                                                                                    <div class="col-3">
                                                                                        <label for="inputEmail4" class="form-label">Company</label>
                                                                                        <input type="text" class="form-control" value="${info.MESSAGE[0].company}" name="company" required>
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
        let newFormWorkReferences = document.querySelector("#newFormWorkReferences");
        
        newFormWorkReferences.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putWorkReference/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormWorkReferences.reset();
            window.location.reload();
        })
    }
}