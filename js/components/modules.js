export default {
    async showFormModules(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThemes", config)).json();
            document.querySelector("#modulesContent").innerHTML =`
                                                                <h3>MODULES</h3>
                                                                <ul class="breadcrumbs">
                                                                    <li><a href="#" id="addDataModules">Add</a></li>
                                                                    <li class="divider">/</li>
                                                                    <li><a href="#" id="showDataModules">Show Data</a></li>
                                                                </ul>
                                                                <div class="contPrint">
                                                                    <form class="row contenedorForm g-3" id="formModules">
                                                                        <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Name Module</label>
                                                                            <input type="text" class="form-control" name="name_module" required>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Start Date</label>
                                                                            <input type="date" class="form-control" name="start_date" required>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">End Date</label>
                                                                            <input type="date" class="form-control" name="end_date" required>
                                                                        </div>
                                                                        <div class="col-5">
                                                                            <label for="inputEmail4" class="form-label">Description</label>
                                                                            <input type="text" class="form-control" name="description" required>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <label for="inputEmail4" class="form-label">Duration Days</label>
                                                                            <input type="number" class="form-control" name="duration_days" required>
                                                                        </div>
                                                                        <div class="col-2 selectorValue">
                                                                            <label for="inputEmail4" class="form-label">ID Theme</label>
                                                                            <select name="id_theme">
                                                                                ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                                                            <option value="${val.Code}">${val.name_theme}</option>
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
                                                                this.saveFormModules();
                                                                this.changeSectionsModules();
        
    },

    changeSectionsModules(){
        let showDataModules = document.querySelector("#showDataModules");
        let addDataModules = document.querySelector("#addDataModules");

        addDataModules.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThemes", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3" id="formModules">
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Name Module</label>
                                    <input type="text" class="form-control" name="name_module" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" required>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">End Date</label>
                                    <input type="date" class="form-control" name="end_date" required>
                                </div>
                                <div class="col-5">
                                    <label for="inputEmail4" class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description" required>
                                </div>
                                <div class="col-2">
                                    <label for="inputEmail4" class="form-label">Duration Days</label>
                                    <input type="number" class="form-control" name="duration_days" required>
                                </div>
                                <div class="col-2 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Theme</label>
                                    <select name="id_theme">
                                        ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                    <option value="${val.Code}">${val.name_theme}</option>
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

        showDataModules.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllModules", config)).json(); 
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME MODULE</th>
                                            <th class="location">START DATE</th>
                                            <th class="location">END DATE</th>
                                            <th class="location">DESCRIPTION</th>
                                            <th class="location">DURATE DAYS</th>
                                            <th class="location">NAME THEME</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val)=>{
                                        return  `
                                                    <tr>
                                                        <td>${val.id}</td>
                                                        <td>${val.name_module}</td>
                                                        <td>${val.start_date}</td>
                                                        <td>${val.end_date}</td>
                                                        <td>${val.description}</td>
                                                        <td>${val.duration_days}</td>
                                                        <td>${val.name_theme}</td>
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
                            document.querySelector(".contPrint").innerHTML = plantilla;
                        
                        this.deleteInfo();
                        this.showUpdate()
        });
    },

    saveFormModules(){
        let formModules = document.querySelector("#formModules")
        formModules.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postModules", config)).text()
            alert("Agregado Exitosamente");
            formModules.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteModules/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThemes", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getModules/${idbtn}`, config)).json();
                document.querySelector("#modulesContent").innerHTML = `
                                                                    <h3>MODULES</h3>
                                                                    <ul class="breadcrumbs">
                                                                        <li><a href="#" id="addDataModules">Add</a></li>
                                                                        <li class="divider">/</li>
                                                                        <li><a href="#" id="showDataModules">Show Data</a></li>
                                                                    </ul>
                                                                    <div class="contPrint">
                                                                        <form class="row contenedorForm g-3" id="newFormModule">
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Module</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_module}" name="name_module" required>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Start Date</label>
                                                                                <input type="date" class="form-control" value="${info.MESSAGE[0].start_date}" name="start_date" required>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">End Date</label>
                                                                                <input type="date" class="form-control" value="${info.MESSAGE[0].end_date}" name="end_date" required>
                                                                            </div>
                                                                            <div class="col-5">
                                                                                <label for="inputEmail4" class="form-label">Description</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].description}" name="description" required>
                                                                            </div>
                                                                            <div class="col-2">
                                                                                <label for="inputEmail4" class="form-label">Duration Days</label>
                                                                                <input type="number" class="form-control" value="${info.MESSAGE[0].duration_days}" name="duration_days" required>
                                                                            </div>
                                                                            <div class="col-2 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Theme</label>
                                                                                <option value="${peticion.MESSAGE[0].Code}">${peticion.MESSAGE[0].name_theme}</option>
                                                                                <select name="id_theme">
                                                                                    ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                                                                <option value="${val.Code}">${val.name_theme}</option>
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
        let newFormModule = document.querySelector("#newFormModule");
        
        newFormModule.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putModules/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormModule.reset();
            window.location.reload();
        })
    }
}