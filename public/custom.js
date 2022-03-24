//----------------------------------------------------------------------------------------------
//   fetch- de get() islemi CRUD - [R]

const table = document.getElementById("productTable");

function getUserList() {
    fetch("http://127.0.0.1:8000/api/products")
        .then(response => response.json())
        .then(data => {

            let products = data.data
//3
//             data.each(function() {
//                 table.innerHTML += `<tr>
//                   <td ><input type="text"  value="${this.name}"></td>
//                   <td><input type="text"  value="${this.description}"></td>
//                   <td><input type="text"  value="${this.slug}"></td>
//                   <td>
//                     <button class="btn btn-warning" onclick="updateUser(${this.id})">Güncelle</button>
//                     <button class="btn btn-danger" onclick="deleteUser(${this.id})">Sil</button>
//                   </td> `
//             })

//2
            // for (product of products) {
            //     // console.log(product)
            //     table.innerHTML += `<tr>
            //       <td ><input type="text"  value="${product.name}"></td>
            //       <td><input type="text"  value="${product.description}"></td>
            //       <td><input type="text"  value="${product.slug}"></td>
            //       <td>
            //         <button class="btn btn-warning" onclick="updateUser(${product.id})">Güncelle</button>
            //         <button class="btn btn-danger" onclick="deleteUser(${product.id})">Sil</button>
            //       </td> `
            // }


//1
            products.forEach((item) => {
                table.innerHTML += `<tr data-id="${item.id}">
                  <td ><input type="text"  value="${item.name}"></td>
                  <td ><input type="text"  value="${item.category_id}"></td>
                  <td><input type="text"  value="${item.description}"></td>
                  <td><input type="text"  value="${item.brands_id}"></td>
                  <td><input type="text"  value="${item.slug}"></td>
                  <td>
                    <button class="btn btn-warning" onclick="updateUser(${item.id})">Güncelle</button>
                    <button class="btn btn-danger" onclick="deleteUser(${item.id})">Sil</button>
                  </td> `
            })
        })
}

getUserList();

//------------------------------------------------------------------------------------------------------


//create
function createUser() {
    let data = {
        name: document.getElementById("name").value,
        category_id: document.getElementById("category_id").value,
        description: document.getElementById("description").value,
        brands_id: document.getElementById("brands_id").value,
        slug: document.getElementById("slug").value,
    };
    fetch("http://127.0.0.1:8000/api/products", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response => response.json())
        .then(data => {
            // console.log(data);
            data = data.data;
            // console.log(data);
            table.innerHTML += `
       <tr data-id="${data.id}">
                 <td ><input type="text"  value="${data.name}"></td>
                  <td ><input type="text"  value="${data.category_id}"></td>
                  <td><input type="text"  value="${data.description}"></td>
                  <td><input type="text"  value="${data.brands_id}"></td>
                  <td><input type="text"  value="${data.slug}"></td>
                  <td>
                    <button class="btn btn-warning" onclick="updateUser(${data.id})">Güncelle</button>
                    <button class="btn btn-danger" onclick="deleteUser(${data.id})">Sil</button>
                  </td>
       `
        })
        .catch((error) => {
            console.log("Hata cixdi", error);
        })
        .finally(
            document.getElementById("name").value = '',
            document.getElementById("category_id").value = '',
            document.getElementById("description").value = '',
            document.getElementById("brands_id").value = '',
            document.getElementById("slug").value = '',
        )
}

//------------------------------------------------------------------------------------------------------


// update
function updateUser(id) {
    let allData = document.querySelector(`[data-id="${id}"]`)
    let data = {
        name: allData.children[0].children[0].value,
        category_id: allData.children[1].children[0].value,
        description: allData.children[2].children[0].value,
        brands_id: allData.children[3].children[0].value,
        slug: allData.children[4].children[0].value,
    }
    fetch("http://127.0.0.1:8000/api/products/"+id, {
        method: "PUT",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
        .then(response =>response.json())
        .then(veri=>console.log("guncellendi",veri))
        .catch((error=>console.log(error)))
}
//
//

//------------------------------------------------------------------------------------------------------


// // delete
function deleteUser(id) {

    fetch("http://127.0.0.1:8000/api/products/"+id, {
        method: "DELETE",
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(response => response.json())
        // .then(response =>console.log(response))
        .then(data=>{
            const removed = document.querySelector(`[data-id="${id}"]`)
          //  console.log(removed)
            removed.remove()
          //  console.log("silindi ",data)
        })
        .catch((error)=>console.log(error));
}
