const base = window.location.href;

window.onload = function() {
    load_products("home");
}

function load_products(section) {
    let url = base + `md/api/load/products/${section}`;
    fetch(url)
        .then(response => response.json())
        .then(function(data) {
            products = data.products.data;
            showProducts(products);
        })
        .catch(error => console.log(error))
}

function showProducts(products) {

    const divProduct = document.getElementById('products_list');
    var div = '';

    products.forEach(product => {
        div +=
            `<div class='product p-2'>
                <img src='${base}/storage/t_${product.image}'>
                <h5>${product.name}</h5>
                <p class="fs-5"><strong>$${product.price}</strong></p>
                <a href="" class="btn-sm btn-primary"><i class="fa-solid fa-eye"></i></a>
                <a href="" class="btn-sm btn-danger"><i class="fa-solid fa-heart"></i></a>
                <a href="" class="btn-sm btn-success"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>`
    });

    divProduct.innerHTML = div;
}