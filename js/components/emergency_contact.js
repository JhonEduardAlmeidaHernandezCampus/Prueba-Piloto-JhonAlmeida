export default {
    async showFormEmergencyContact(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
            document.querySelector("#emergencyContactContent").innerHTML =  `
                                                                                <h3>EMERGENCY CONTACT</h3>
                                                                                <ul class="breadcrumbs">
                                                                                    <li><a href="#" id="addDataEmergencyContact">Add</a></li>
                                                                                    <li class="divider">/</li>
                                                                                    <li><a href="#" id="showDataEmergencyContact">Show Data</a></li>
                                                                                </ul>
                                                                                <div class="contPrint">
                                                                                    <form class="row contenedorForm g-3" id="formEmergencyContact">
                                                                                        <div class="col-2 selectorValue">
                                                                                        <label for="inputEmail4" class="form-label">ID Staff</label>
                                                                                            <select name="id_staff">
                                                                                                ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                        <option value="${val.Code}">${val.doc}</option>
                                                                                                                                        `
                                                                                                                                        })}
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Cellphone</label>
                                                                                            <input type="text" class="form-control" name="cel_number" required>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Relationship</label>
                                                                                            <input type="text" class="form-control" name="relationship" required>
                                                                                        </div>
                                                                                        <div class="col-3">
                                                                                            <label for="inputEmail4" class="form-label">Full Name</label>
                                                                                            <input type="text" class="form-control" name="full_name" required>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="inputEmail4" class="form-label">Email</label>
                                                                                            <input type="email" class="form-control" name="email" required>
                                                                                        </div>
                                                                                        <div class="col-12 mt-3">
                                                                                        <button type="submit" class="btn">Save</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            `;
                                                                            this.saveFormEmergencyContact();
                                                                            this.changeSectionsEmergencyContact();
        
    },

    changeSectionsEmergencyContact(){
        let showDataEmergencyContact = document.querySelector("#showDataEmergencyContact");
        let addDataEmergencyContact = document.querySelector("#addDataEmergencyContact");

        addDataEmergencyContact.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3">
                                <div class="col-2 selectorValue">
                                <label for="inputEmail4" class="form-label">ID Staff</label>
                                    <select name="id_staff">
                                        ${peticion.MESSAGE.map((val) =>{ return `
                                                                                <option value="${val.Code}">${val.doc}</option>
                                                                                `
                                                                                })}
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Cellphone</label>
                                    <input type="text" class="form-control" name="cel_number" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Relationship</label>
                                    <input type="text" class="form-control" name="relationship" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="full_name" required>
                                </div>
                                <div class="col-4">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-12 mt-3">
                                <button type="submit" class="btn">Save</button>
                                </div>
                            </form>
                            `;
                            document.querySelector(".contPrint").innerHTML = plantilla;

        })

        showDataEmergencyContact.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllEmergencyContact", config)).json();  
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">CC STAFF</th>
                                            <th class="location">FIRST NAME STAFF</th>
                                            <th class="location">FIRST SURNAME STAFF</th>
                                            <th class="location">CELL NUMBER</th>
                                            <th class="location">RELATIONSHIP</th>
                                            <th class="location">FULL NAME</th>
                                            <th class="location">EMAIL</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return  `
                                                    <tr>
                                                        <td>${val.Code}</td>
                                                        <td>${val.doc}</td>
                                                        <td>${val.first_name}</td>
                                                        <td>${val.first_surname}</td>
                                                        <td>${val.cel_number}</td>
                                                        <td>${val.relationship}</td>
                                                        <td>${val.full_name}</td>
                                                        <td>${val.email }</td>
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
                            document.querySelector(".contPrint").innerHTML = plantilla;
            
            this.deleteInfo();
            this.showUpdate()
        });
    },

    saveFormEmergencyContact(){
        let formEmergencyContact = document.querySelector("#formEmergencyContact")
        formEmergencyContact.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postEmergencyContact", config)).text()
            alert("Agregado Exitosamente");
            formEmergencyContact.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteEmergencyContact/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getEmergencyContact/${idbtn}`, config)).json();
                document.querySelector("#emergencyContactContent").innerHTML =`
                                                                                <h3>EMERGENCY CONTACT</h3>
                                                                                <div class="contPrint">
                                                                                    <form class="row contenedorForm g-3" id="newFormEmergencyContact">
                                                                                        <div class="col-2 selectorValue">
                                                                                        <label for="inputEmail4" class="form-label">ID Staff</label>
                                                                                            <select name="id_staff">
                                                                                            <option value="${info.MESSAGE[0].id}">${info.MESSAGE[0].doc}</option>
                                                                                                ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                        <option value="${val.id}">${val.doc}</option>
                                                                                                                                        `
                                                                                                                                        })}
                                                                                            </select>
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
                                                                                            <label for="inputEmail4" class="form-label">Full Name</label>
                                                                                            <input type="text" class="form-control" value="${info.MESSAGE[0].full_name}" name="full_name" required>
                                                                                        </div>
                                                                                        <div class="col-4">
                                                                                            <label for="inputEmail4" class="form-label">Email</label>
                                                                                            <input type="email" class="form-control" value="${info.MESSAGE[0].email}" name="email" required>
                                                                                        </div>
                                                                                        <div class="col-12 mt-3">
                                                                                            <button type="submit" id="${idbtn}" class="btnUpdate btn">Update</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                                `
                                                                                this.updateInfo();
            })
        });
    },

    updateInfo(){
        let newFormEmergencyContact = document.querySelector("#newFormEmergencyContact");
        
        newFormEmergencyContact.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putEmergencyContact/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormEmergencyContact.reset();
            window.location.reload();
        })
    }
}