export default {
    async showFormAdminArea(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticionArea = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllAreas", config)).json();
        let peticionStaff = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
        let peticionPosition = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllPosition", config)).json();
        let peticionJourney = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllJourney", config)).json();
            document.querySelector("#adminAreaContent").innerHTML = `
                                                                    <h3>ADMIN AREA</h3>
                                                                    <ul class="breadcrumbs">
                                                                        <li><a href="#" id="addDataAdminArea">Add</a></li>
                                                                        <li class="divider">/</li>
                                                                        <li><a href="#" id="showDataAdminArea">Show Data</a></li>
                                                                    </ul>
                                                                    <div class="contPrint">
                                                                        <form class="row contenedorForm" id="formAdminArea">
                                                                            <div class="col-3 selectorValue">
                                                                            <label for="inputEmail4" class="form-label">ID Area</label>
                                                                                <select name="id_area">
                                                                                    ${peticionArea.MESSAGE.map((val, id) =>{ return `
                                                                                                                                    <option value="${val.Code}">${val.Name}</option>
                                                                                                                                    `
                                                                                                                                    })}
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Staff</label>
                                                                                    <select name="id_staff">
                                                                                        ${peticionStaff.MESSAGE.map((val, id) =>{ return    `
                                                                                                                                            <option value="${val.Code}">${val.doc}</option>
                                                                                                                                            `
                                                                                                                                            })}
                                                                                    </select>
                                                                            </div>
                                                                            <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Position</label>
                                                                                    <select name="id_position">
                                                                                        ${peticionPosition.MESSAGE.map((val, id) =>{ return `
                                                                                                                                            <option value="${val.id}">${val.name_position}</option>
                                                                                                                                            `
                                                                                                                                            })}
                                                                                    </select>
                                                                            </div>
                                                                            <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Journey</label>
                                                                                    <select name="id_journey">
                                                                                        ${peticionJourney.MESSAGE.map((val, id) =>{ return  `
                                                                                                                                            <option value="${val.id}">${val.name_journey}</option>
                                                                                                                                            `
                                                                                                                                            })}
                                                                                    </select>
                                                                            </div>
                                                                            <div class="col-12 mt-3">
                                                                                <button type="submit" class="btn">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    `;
                                                                    this.saveFormAdminArea();
                                                                    this.changeSectionsAdminArea();
        
    },

    changeSectionsAdminArea(){
        let showDataAdminArea = document.querySelector("#showDataAdminArea");
        let addDataAdminArea = document.querySelector("#addDataAdminArea");

        addDataAdminArea.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticionArea = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllAreas", config)).json();
            let peticionStaff = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
            let peticionPosition = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllPosition", config)).json();
            let peticionJourney = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllJourney", config)).json();
            let plantilla = `
                            <form class="row contenedorForm" id="formAdminArea">
                                <div class="col-3 selectorValue">
                                <label for="inputEmail4" class="form-label">ID Area</label>
                                    <select name="id_area">
                                        ${peticionArea.MESSAGE.map((val, id) =>{ return `
                                                                                        <option value="${val.Code}">${val.Name}</option>
                                                                                        `
                                                                                        })}
                                    </select>
                                </div>
                                <div class="col-3 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Staff</label>
                                        <select name="id_staff">
                                            ${peticionStaff.MESSAGE.map((val, id) =>{ return    `
                                                                                                <option value="${val.Code}">${val.doc}</option>
                                                                                                `
                                                                                                })}
                                        </select>
                                </div>
                                <div class="col-3 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Position</label>
                                        <select name="id_position">
                                            ${peticionPosition.MESSAGE.map((val, id) =>{ return `
                                                                                                <option value="${val.id}">${val.name_position}</option>
                                                                                                `
                                                                                                })}
                                        </select>
                                </div>
                                <div class="col-3 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Journey</label>
                                        <select name="id_journey">
                                            ${peticionJourney.MESSAGE.map((val, id) =>{ return  `
                                                                                                <option value="${val.id}">${val.name_journey}</option>
                                                                                                `
                                                                                                })}
                                        </select>
                                </div>
                                <div class="col-12 mt-3">
                                <button type="submit" class="btn">Save</button>
                                </div>
                            </form>
                            `;
                            document.querySelector(".contPrint").innerHTML = plantilla;

        })

        showDataAdminArea.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllAdminArea", config)).json();          
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME AREA</th>
                                            <th class="location">CC</th>
                                            <th class="location">FIRST NAME STAFF</th>
                                            <th class="location">SECOND NAME STAFF</th>
                                            <th class="location">POSITION</th>
                                            <th class="location">JOURNEY</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return  `
                                                    <tr>
                                                        <td>${val.CodeAdmin}</td>
                                                        <td>${val.name_area}</td>
                                                        <td>${val.doc}</td>
                                                        <td>${val.first_name}</td>
                                                        <td>${val.first_surname}</td>
                                                        <td>${val.name_position}</td>
                                                        <td>${val.name_journey}</td>
                                                        <td class="contBut">
                                                            <button data-id="${val.CodeAdmin}" id="update" class="btnSelectModi">M</button> 
                                                            <button data-id="${val.CodeAdmin}" id="delete" class="btnSelectDel">X</button>
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

    saveFormAdminArea(){
        let formAdminArea = document.querySelector("#formAdminArea")
        formAdminArea.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postAdminArea", config)).text()
            alert("Agregado Exitosamente");
            formAdminArea.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteAdminArea/${data}`, config)).text()
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

                let peticionArea = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllAreas", config)).json();
                let peticionStaff = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllStaff", config)).json();
                let peticionPosition = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllPosition", config)).json();
                let peticionJourney = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllJourney", config)).json();
                let info = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAdminArea/${idbtn}`, config)).json();
                document.querySelector("#adminAreaContent").innerHTML = `
                                                                        <h3>ADMIN AREA</h3>
                                                                        
                                                                        <div class="contPrint">
                                                                            <form class="row contenedorForm" id="newFormAdminArea">
                                                                                <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Area</label>
                                                                                    <select name="id_area">
                                                                                    <option value="${info.MESSAGE[0].code_area}">${info.MESSAGE[0].name_area}</option>
                                                                                        ${peticionArea.MESSAGE.map((val) =>{ return `
                                                                                                                                        <option value="${val.Code}">${val.Name}</option>
                                                                                                                                        `
                                                                                                                                        })}
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-3 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Staff</label>
                                                                                        <select name="id_staff">
                                                                                        <option value="${info.MESSAGE[0].code_staff}">${info.MESSAGE[0].Cc_staff}</option>
                                                                                            ${peticionStaff.MESSAGE.map((val, id) =>{ return    `
                                                                                                                                                <option value="${val.Code}">${val.doc}</option>
                                                                                                                                                `
                                                                                                                                                })}
                                                                                        </select>
                                                                                </div>
                                                                                <div class="col-3 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Position</label>
                                                                                        <select name="id_position">
                                                                                        <option value="${info.MESSAGE[0].id_position}">${info.MESSAGE[0].name_position}</option>
                                                                                            ${peticionPosition.MESSAGE.map((val, id) =>{ return `
                                                                                                                                                <option value="${val.id}">${val.name_position}</option>
                                                                                                                                                `
                                                                                                                                                })}
                                                                                        </select>
                                                                                </div>
                                                                                <div class="col-3 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Journey</label>
                                                                                        <select name="id_journey">
                                                                                        <option value="${info.MESSAGE[0].id_journey}">${info.MESSAGE[0].name_journey}</option>
                                                                                            ${peticionJourney.MESSAGE.map((val, id) =>{ return  `
                                                                                                                                                <option value="${val.id}">${val.name_journey}</option>
                                                                                                                                                `
                                                                                                                                                })}
                                                                                        </select>
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
        let newFormAdminArea = document.querySelector("#newFormAdminArea");
        
        newFormAdminArea.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putAdminArea/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormAdminArea.reset();
            window.location.reload();
        })
    }
}