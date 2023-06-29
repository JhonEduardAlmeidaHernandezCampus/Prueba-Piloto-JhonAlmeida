export default {
    async showFormRegion(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllCountry", config)).json();
            document.querySelector("#regionsContent").innerHTML =   `
                                                                    <h3>REGIONS</h3>
                                                                    <ul class="breadcrumbs">
                                                                        <li><a href="#" id="addDataRegion">Add</a></li>
                                                                        <li class="divider">/</li>
                                                                        <li><a href="#" id="showDataRegion">Show Data</a></li>
                                                                    </ul>
                                                                    <div class="contPrint">
                                                                        <form class="row contenedorForm g-3" id="formRegion">
                                                                            <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Name Region</label>
                                                                            <input type="text" class="form-control" name="name_region" required>
                                                                            </div>
                                                                            <div class="col-3 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Country</label>
                                                                                <select name="id_country">
                                                                                    ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                <option value="${val.Code}">${val.Name}</option>
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
                                                                    this.saveFormRegion();
                                                                    this.changeSectionsRegion();
        
    },

    changeSectionsRegion(){
        let showDataRegion = document.querySelector("#showDataRegion");
        let addDataRegion = document.querySelector("#addDataRegion");

        addDataRegion.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllCountry", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3" id="formRegion">
                                <div class="col-3">
                                <label for="inputEmail4" class="form-label">Name Region</label>
                                <input type="text" class="form-control" name="name_region" required>
                                </div>
                                <div class="col-3 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Country</label>
                                    <select name="id_country">
                                        ${peticion.MESSAGE.map((val) =>{ return `
                                                                                    <option value="${val.Code}">${val.Name}</option>
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

        showDataRegion.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllRegion", config)).json();  
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">COUNTRY</th>
                                            <th class="location">REGION</th>
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

    saveFormRegion(){
        let formRegion = document.querySelector("#formRegion")
        formRegion.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postRegion", config)).text()
            alert("Agregado Exitosamente");
            formRegion.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteRegion/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllCountry", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getRegion/${idbtn}`, config)).json();
                document.querySelector("#regionsContent").innerHTML = `
                                                                            <h3>REGIONS</h3>
                                                                            <div class="contPrint">
                                                                                <form class="row contenedorForm g-3" id="newFormRegion">
                                                                                    <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Region</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].name_region}" name="name_region" required>
                                                                                    </div>
                                                                                    <div class="col-3 selectorValue">
                                                                                        <label for="inputEmail4" class="form-label">ID Country</label>
                                                                                        <select name="id_country">
                                                                                        <option value="${info.MESSAGE[0].id}">${info.MESSAGE[0].name_country}</option>
                                                                                            ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                        <option value="${val.Code}">${val.Name}</option>
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
        let newFormRegion = document.querySelector("#newFormRegion");
        
        newFormRegion.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putRegion/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormRegion.reset();
            window.location.reload();
        })
    }
}