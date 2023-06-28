export default {
    async showFormChapter(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThematicUnits", config)).json();
            document.querySelector("#chaptersContent").innerHTML =  `
                                                                    <h3>CHAPTER</h3>
                                                                    <ul class="breadcrumbs">
                                                                        <li><a href="#" id="addDataChapter">Add</a></li>
                                                                        <li class="divider">/</li>
                                                                        <li><a href="#" id="showDataChapter">Show Data</a></li>
                                                                    </ul>
                                                                    <div class="contPrint">
                                                                        <form class="row contenedorForm g-3" id="formChapter">
                                                                            <div class="col-2 selectorValue">
                                                                                <label for="inputEmail4" class="form-label">ID Thematic Units</label>
                                                                                <select name="id_thematic_units">
                                                                                    ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                                                                <option value="${val.id}">${val.name_thematics_units}</option>
                                                                                                                                `
                                                                                                                                })}
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-3">
                                                                                <label for="inputEmail4" class="form-label">Name Chapter</label>
                                                                                <input type="text" class="form-control" name="name_chapter" required>
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
                                                                            <div class="col-12 mt-3">
                                                                            <button type="submit" class="btn">Save</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    `;
                                                                    this.saveFormChapter();
                                                                    this.changeSectionsChapter();
        
    },

    changeSectionsChapter(){
        let showDataChapter = document.querySelector("#showDataChapter");
        let addDataChapter = document.querySelector("#addDataChapter");

        addDataChapter.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThematicUnits", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3">
                                <div class="col-2 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Thematic Units</label>
                                    <select name="id_thematic_units">
                                        ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                    <option value="${val.id}">${val.name_thematics_units}</option>
                                                                                    `
                                                                                    })}
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Name Chapter</label>
                                    <input type="text" class="form-control" name="name_chapter" required>
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
                                <div class="col-12 mt-3">
                                <button type="submit" class="btn">Save</button>
                                </div>
                            </form>
                            `;
                            document.querySelector(".contPrint").innerHTML = plantilla;
        })

        showDataChapter.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllChapters", config)).json(); 
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME THEMATIC UNIT</th>
                                            <th class="location">NAME CHAPTER</th>
                                            <th class="location">START DATE</th>
                                            <th class="location">END DATE</th>
                                            <th class="location">DESCRIPTION</th>
                                            <th class="location">DURATE DAYS</th>
                                            <th class="location">OPTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tableBody">
                                    ${peticion.MESSAGE.map((val, id)=>{
                                        return  `
                                                    <tr>
                                                        <td>${val.Code}</td>
                                                        <td>${val.NameThematic}</td>
                                                        <td>${val.name_chapter}</td>
                                                        <td>${val.start_date}</td>
                                                        <td>${val.end_date}</td>
                                                        <td>${val.description}</td>
                                                        <td>${val.duration_days}</td>
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

    saveFormChapter(){
        let formChapter = document.querySelector("#formChapter")
        formChapter.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            data.name_chapter = data.name_chapter.toLocaleUpperCase();
            data.description = data.description.toLocaleUpperCase();
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postChapters", config)).text()
            alert("Agregado Exitosamente");
            formChapter.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteChapters/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThematicUnits", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getChapters/${idbtn}`, config)).json();
                document.querySelector("#chaptersContent").innerHTML = `
                                                                        <h3>CHAPTER</h3>
                                                                        <ul class="breadcrumbs">
                                                                            <li><a href="#" id="addDataChapter">Add</a></li>
                                                                            <li class="divider">/</li>
                                                                            <li><a href="#" id="showDataChapter">Show Data</a></li>
                                                                        </ul>
                                                                        <div class="contPrint">
                                                                            <form class="row contenedorForm g-3" id="newFormChapter">
                                                                                <div class="col-2 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Thematic Units</label>
                                                                                    <select name="id_thematic_units">
                                                                                        ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                                                                    <option value="${val.id}">${val.name_thematics_units}</option>
                                                                                                                                    `
                                                                                                                                    })}
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Chapter</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].name_chapter}" name="name_chapter" required>
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
        let newFormChapter = document.querySelector("#newFormChapter");
        
        newFormChapter.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putChapters/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormChapter.reset();
            window.location.reload();
        })
    }
}