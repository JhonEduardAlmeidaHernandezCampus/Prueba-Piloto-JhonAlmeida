export default {
    changeSectionsCountries(){
        let showDataCountries = document.querySelector("#showDataCountries")
        let addDataCountries = document.querySelector("#addDataCountries")

        addDataCountries.addEventListener("click", (e) =>{
            document.querySelector("#formCountries").style.display = "flex";
            document.querySelector(".showCountries").innerHTML = null;
        })

        showDataCountries.addEventListener("click", async(e) =>{
            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllCountry", config)).json();
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">COUNTRIES</th>
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
                            document.querySelector(".showCountries").innerHTML = plantilla;
                            document.querySelector("#formCountries").style.display = "none";

                        this.deleteInfo();
                        this.showUpdate();
        })
    },

    saveFormCountries(){
        let formCountries = document.querySelector("#formCountries")
        formCountries.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            data.name_country = data.name_country.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postCountry", config)).text()
            alert("Agregado Exitosamente");
            formCountries.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteCountry/${data}`, config)).text()
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

                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getCountry/${idbtn}`, config)).json();
                document.querySelector("#countriesContent").innerHTML = `
                                                                        <h3>COUNTRIES</h3>
                                                                        
                                                                        <form class="row contenedorForm g-3" id="newFormCountries">
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Area</label>
                                                                                <input type="text" class="form-control" value="${info.MESSAGE[0].Name}" name="name_country" required>
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
        let newFormCountries = document.querySelector("#newFormCountries");
        
        newFormCountries.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));
            data.name_country = data.name_country.toLocaleUpperCase();

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putCountry/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormCountries.reset();
            window.location.reload();
        })
    }
}