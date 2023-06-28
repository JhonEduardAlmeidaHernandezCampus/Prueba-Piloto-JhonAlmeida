export default {
    changeSectionsJourney(){
        let showDataJourney = document.querySelector("#showDataJourney")
        let addDataJourney = document.querySelector("#addDataJourney")

        addDataJourney.addEventListener("click", (e) =>{
            document.querySelector("#formJourney").style.display = "flex";
            document.querySelector(".showJourney").innerHTML = null;
        })

        showDataJourney.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllJourney", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME JOURNEY</th>
                                            <th class="location">CHECK IN</th>
                                            <th class="location">CHECK OUT</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return `
                                        <tr>
                                        <td>${val.id}</td>
                                        <td>${val.name_journey}</td>
                                        <td>${val.check_in}</td>
                                        <td>${val.check_out}</td>
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
                        document.querySelector(".showJourney").innerHTML = plantilla;
                        document.querySelector("#formJourney").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormJourney(){
        let formJourney = document.querySelector("#formJourney")
        formJourney.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let data = Object.fromEntries(new FormData(e.target));
            data.name_journey = data.name_journey.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postJourney", config)).text()
            alert("Agregado Exitosamente");
            formJourney.reset();
        })
    },

    deleteInfo(){
        let btnUpdate = document.querySelectorAll("#delete");
        
        btnUpdate.forEach((val, id) =>{
            val.addEventListener("click", async(e) =>{
                let data = val.dataset.id;
                console.log(data);
                let config = {
                    method: "DELETE",
                    header: {"Content-Type": "application/json"},
                }
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteJourney/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getJourney/${idbtn}`, config)).json();
                document.querySelector("#journeyContent").innerHTML = `
                                                                        <form class="row contenedorForm g-3" id="newFormJourney">
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Journey</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].name_journey}" name="name_journey" required>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Check In</label>
                                                                                <input type="time" class="form-control" value="${info.MESSAGE[0].check_in}" name="check_in" required>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Check Out</label>
                                                                                <input type="time" class="form-control" value="${info.MESSAGE[0].check_out}" name="check_out" required>
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
        let newFormJourney = document.querySelector("#newFormJourney");
        
        newFormJourney.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));
            data.name_journey = data.name_journey.toLocaleUpperCase();

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putJourney/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormJourney.reset();
            window.location.reload();
        })
    }
}