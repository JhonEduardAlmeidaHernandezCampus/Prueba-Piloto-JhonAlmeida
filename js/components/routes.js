export default {
    changeSectionsRoutes(){
        let showDatRoute = document.querySelector("#showDataRoute")
        let addDatRoute = document.querySelector("#addDataRoute")

        addDatRoute.addEventListener("click", (e) =>{
            document.querySelector("#formRoute").style.display = "flex";
            document.querySelector(".showRoute").innerHTML = null;
        })

        showDatRoute.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllRoutes", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME ROUTE</th>
                                            <th class="location">START DATE</th>
                                            <th class="location">END DATE</th>
                                            <th class="location">DESCRIPTION</th>
                                            <th class="location">DURATE MONTH</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.name_route}</td>
                                        <td>${val.start_date}</td>
                                        <td>${val.end_date}</td>
                                        <td>${val.description}</td>
                                        <td>${val.duration_month}</td>
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
                        document.querySelector(".showRoute").innerHTML = plantilla;
                        document.querySelector("#formRoute").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormRoute(){
        let formRoute = document.querySelector("#formRoute")
        formRoute.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postRoutes", config)).text()
            alert("Agregado Exitosamente");
            formRoute.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteRoutes/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getRoutes/${idbtn}`, config)).json();
                document.querySelector("#routeContent").innerHTML = `
                                                                        <h3>ROUTES</h3>
                                                                        <form class="row contenedorForm g-3" id="newFormRoute">
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Route</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_route}" name="name_route" required>
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
                                                                                <label for="inputEmail4" class="form-label">Duration Month</label>
                                                                                <input type="number" class="form-control" value="${info.MESSAGE[0].duration_month}" name="duration_month" required>
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
        let newFormRoute = document.querySelector("#newFormRoute");
        
        newFormRoute.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putRoutes/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormRoute.reset();
            window.location.reload();
        })
    }
}