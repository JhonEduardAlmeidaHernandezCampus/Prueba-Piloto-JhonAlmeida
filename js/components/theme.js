export default {
    async showFormTheme(){
        let config = {
            method: "GET",
            header: {"Content-Type": "application/json"}
        }

        let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllChapters", config)).json();
            document.querySelector("#themesContent").innerHTML =`
                                                                <h3>THEMES</h3>
                                                                <ul class="breadcrumbs">
                                                                    <li><a href="#" id="addDataTheme">Add</a></li>
                                                                    <li class="divider">/</li>
                                                                    <li><a href="#" id="showDataTheme">Show Data</a></li>
                                                                </ul>
                                                                <div class="contPrint">
                                                                    <form class="row contenedorForm g-3" id="formTheme">
                                                                        <div class="col-2 selectorValue">
                                                                            <label for="inputEmail4" class="form-label">ID Chapter</label>
                                                                            <select name="id_chapter">
                                                                                ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                                                            <option value="${val.Code}">${val.name_chapter}</option>
                                                                                                                            `
                                                                                                                            })}
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <label for="inputEmail4" class="form-label">Name Theme</label>
                                                                            <input type="text" class="form-control" name="name_theme" required>
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
                                                                this.saveFormTheme();
                                                                this.changeSectionsTheme();
        
    },

    changeSectionsTheme(){
        let showDataTheme = document.querySelector("#showDataTheme");
        let addDataTheme = document.querySelector("#addDataTheme");

        addDataTheme.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }
    
            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllChapters", config)).json();
            let plantilla = `
                            <form class="row contenedorForm g-3" id="formTheme">
                                <div class="col-2 selectorValue">
                                    <label for="inputEmail4" class="form-label">ID Chapter</label>
                                    <select name="id_chapter">
                                        ${peticion.MESSAGE.map((val, id) =>{ return `
                                                                                    <option value="${val.id}">${val.name_chapter}</option>
                                                                                    `
                                                                                    })}
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="inputEmail4" class="form-label">Name Theme</label>
                                    <input type="text" class="form-control" name="name_theme" required>
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

        showDataTheme.addEventListener("click", async() => {

            let config = {
                method: "GET",
                header: {"Content-Type": "application/json"}
            }

            let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllThemes", config)).json(); 
            let plantilla = `
                            <div class="cont">
                                <table class="showTable">
                                    <thead>
                                        <tr>
                                            <th class="id">ID</th>
                                            <th class="location">NAME CHAPTER</th>
                                            <th class="location">NAME THEME </th>
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
                                                        <td>${val.Name}</td>
                                                        <td>${val.name_theme}</td>
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

    saveFormTheme(){
        let formTheme = document.querySelector("#formTheme")
        formTheme.addEventListener("submit", async(e) =>{
            e.preventDefault();
            let data = Object.fromEntries(new FormData(e.target));
            
            let config = {
                method: 'POST',
                header: {"Content-Type":"application/json"},
                body: JSON.stringify(data)
            }

            let peticion = await (await fetch ("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/postThemes", config)).text()
            alert("Agregado Exitosamente");
            formTheme.reset();
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
    
                let peticion = await (await fetch (`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/deleteThemes/${data}`, config)).text()
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

                let peticion = await (await fetch("http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getAllChapters", config)).json();
                let info = await ( await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/getThemes/${idbtn}`, config)).json();
                document.querySelector("#themesContent").innerHTML = `
                                                                        <h3>THEMES</h3>
                                                                        <ul class="breadcrumbs">
                                                                            <li><a href="#" id="addDataChapter">Add</a></li>
                                                                            <li class="divider">/</li>
                                                                            <li><a href="#" id="showDataChapter">Show Data</a></li>
                                                                        </ul>
                                                                        <div class="contPrint">
                                                                            <form class="row contenedorForm g-3" id="newFormTheme">
                                                                                <div class="col-2 selectorValue">
                                                                                    <label for="inputEmail4" class="form-label">ID Chapter</label>
                                                                                    <select name="id_chapter">
                                                                                    <option value="${info.MESSAGE[0].Code}">${info.MESSAGE[0].name_module}</option>
                                                                                        ${peticion.MESSAGE.map((val) =>{ return `
                                                                                                                                    <option value="${val.Code}">${val.name_chapter}</option>
                                                                                                                                    `
                                                                                                                                    })}
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-3">
                                                                                    <label for="inputEmail4" class="form-label">Name Theme</label>
                                                                                    <input type="text" class="form-control" value="${info.MESSAGE[0].name_theme}" name="name_theme" required>
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
        let newFormTheme = document.querySelector("#newFormTheme");
        
        newFormTheme.addEventListener("submit", async(e) =>{
            e.preventDefault();

            let btnUpdate = document.querySelector(".btnUpdate");
            let id = btnUpdate.id;

            let data = Object.fromEntries(new FormData(e.target));

            let config = {
                method: "PUT",
                header: {"Content-Type": "application/json"},
                body:JSON.stringify(data)
            }

            let res = await (await fetch(`http://localhost/Prueba-Piloto-JhonAlmeida/uploads/putThemes/${id}`, config)).text();
            alert("Actualizado Exitosamente");
            newFormTheme.reset();
            window.location.reload();
        })
    }
}