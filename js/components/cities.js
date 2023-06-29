export default {
    async showFormCities(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllRegion", config)).json();
            document.querySelector("#citiesContent").innerHTML =   `
                                                                    <h3>CITIES</h3>
                                                                    <ul class="breadcrumbs">
                                                                        <li><a href="#" id="addDataCities">Add</a></li>
                                                                        <li class="divider">/</li>
                                                                        <li><a href="#" id="showDataCities">Show Data</a></li>
                                                                    </ul>
                                                                    <div class="contPrint">
                                                                        <form class="row contenedorForm g-3" id="formCities">
                                                                            <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Name City</label>
                                                                            <input type="text" class="form-control" name="name_city" required>
                                                                            </div>
                                                                            <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Region</label>
                                                                                <select name="id_region">
                                                                                        ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                <option value="${val.Code}">${val.name_region}</option>
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
                                                                    this.saveFormCities();
                                                                    this.changeSectionsCities();
        
    },

    changeSectionsCities(){
        let showDataCities = document.querySelector("#showDataCities");
        let addDataCities = document.querySelector("#addDataCities");

        addDataCities.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllRegion", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3">
                                <div class="col-3">
                                <label for="inputEmail4" class="form-label">Name City</label>
                                <input type="text" class="form-control" name="name_city" required>
                                </div>
                                <div class="col-3 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Region</label>
                                    <select name="id_region">
                                            ${peticion.MESSAGE.map((val) =>{ return `
                                                                                    <option value="${val.Code}">${val.name_region}</option>
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

        showDataCities.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllCities", config)).json();  
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">COUNTRY</th>
                                            <th class="location">REGION</th>
                                            <th class="location">CITY</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return  `
                                                    <tr>
                                                        <td>${val.Code}</td>
                                                        <td>${val.name_country}</td>
                                                        <td>${val.name_region}</td>
                                                        <td>${val.name_city}</td>
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

    saveFormCities(){
        let formCities = document.querySelector("#formCities")
        formCities.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postCities", config)).text()
            alert("Agregado Exitosamente");
            formCities.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteCities/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllRegion", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getCities/${idbtn}`, config)).json();
                document.querySelector("#citiesContent").innerHTML =`
                                                                        <h3>CITIES</h3>
                                                                        <div class="contPrint">
                                                                            <form class="row contenedorForm g-3" id="newFormCities">
                                                                                <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name City</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_city}" name="name_city" required>
                                                                                </div>
                                                                                <div class="col-3 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Region</label>
                                                                                    <select name="id_region">
                                                                                    <option value="${info.MESSAGE[0].id}">${info.MESSAGE[0].name_region}</option>
                                                                                            ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                    <option value="${val.id}">${val.name_region}</option>
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
        let newFormCities = document.querySelector("#newFormCities");
        
        newFormCities.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putCities/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormCities.reset();
            window.location.reload();
        })
    }
}