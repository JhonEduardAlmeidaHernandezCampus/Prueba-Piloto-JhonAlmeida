export default {
    changeSectionsPersonalReference(){
        let showDataPersonalReference = document.querySelector("#showDataPersonalReference")
        let addDataPersonalReference = document.querySelector("#addDataPersonalReference")

        addDataPersonalReference.addEventListener("click", (e) =>{
            document.querySelector("#formPersonalReference").style.display = "flex";
            document.querySelector(".showPersonalReference").innerHTML = null;
        })

        showDataPersonalReference.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllPersonalReference", config)).json();
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
                                        <td>${val.relationship}</td>
                                        <td>${val.occupation}</td>
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
                            document.querySelector(".showPersonalReference").innerHTML = plantilla;
                            document.querySelector("#formPersonalReference").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormPersonalReference(){
        let formPersonalReference = document.querySelector("#formPersonalReference")
        formPersonalReference.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            data.full_name = data.full_name.toLocaleUpperCase();
            data.relationship = data.relationship.toLocaleUpperCase();
            data.occupation = data.occupation.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postPersonalReference", config)).text()
            alert("Agregado Exitosamente");
            formPersonalReference.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deletePersonalReference/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getPersonalReference/${idbtn}`, config)).json();
                console.log(info);
                document.querySelector("#personalReferenceContent").innerHTML = `
                                                                                    <h3>WORK REFERENCE</h3>
                                                                                    <form class="row contenedorForm g-3" id="newFormPersonalReference">
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Full Name</label>
                                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].full_name}" name="full_name" required>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Cellphone</label>
                                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].cel_number}" name="cel_number" required>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Relationship</label>
                                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].relationship}" name="relationship" required>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Occupation</label>
                                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].occupation}" name="occupation" required>
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
        let newFormPersonalReference = document.querySelector("#newFormPersonalReference");
        
        newFormPersonalReference.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));
            data.full_name = data.full_name.toLocaleUpperCase();
            data.relationship = data.relationship.toLocaleUpperCase();
            data.occupation = data.occupation.toLocaleUpperCase();

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putPersonalReference/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormPersonalReference.reset();
            window.location.reload();
        })
    }
}