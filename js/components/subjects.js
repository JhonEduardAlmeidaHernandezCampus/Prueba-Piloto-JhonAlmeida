export default {
    changeSectionsSubjects(){
        let showDataSubjects = document.querySelector("#showDataSubjects")
        let addDataSubjects = document.querySelector("#addDataSubjects")

        addDataSubjects.addEventListener("click", (e) =>{
            document.querySelector("#formSubjects").style.display = "flex";
            document.querySelector(".showSubjects").innerHTML = null;
        })

        showDataSubjects.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllSubjects", config)).json();

            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">SUBJECTS</th>
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
                        document.querySelector(".showSubjects").innerHTML = plantilla;
                        document.querySelector("#formSubjects").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormSubjects(){
        let formSubjects = document.querySelector("#formSubjects")
        formSubjects.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postSubjects", config)).text()
            alert("Agregado Exitosamente");
            formSubjects.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteSubjects/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getSubjects/${idbtn}`, config)).json();
                document.querySelector("#subjectContent").innerHTML =   `
                                                                            <h3>SUBJECTS</h3>
                                                                            
                                                                            <form class="row contenedorForm g-3" id="newFormSubjects">
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Subject</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].Name}" name="name_subject" required>
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
        let newFormSubjects = document.querySelector("#newFormSubjects");
        
        newFormSubjects.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putSubjects/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormSubjects.reset();
            window.location.reload();
        })
    }
}