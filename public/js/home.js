const base = window.location.href;
const paginationDiv = document.getElementById('pagination');
const auth = document.querySelector('meta[name="auth"]').getAttribute('content');
const _csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
var products_list_ids_temp = [];

window.onload = function() {
    load_products("home");
}

function load_products(section) {
    let url = base + `md/api/load/products/${section}`;
    fetch(url)
        .then(response => response.json())
        .then(function(data) {
            links = data.products.links;
            products = data.products.data;

            pagination(links)
            showProducts(products);
        })
        .catch(error => console.log(error));

}

function showProducts(products) {

    const divProduct = document.getElementById('products_list');
    let div = '';

    products.forEach(product => {
        products_list_ids_temp.push(product.id);
        div +=
            `<div class='product p-2'>
            <img src='${base}/storage/t_${product.image}'>
            <h5>${product.name}</h5>
            <p class="fs-5"><strong>$${product.price}</strong></p>
            <a class="btn-sm btn-primary" href="/product/${product.id}"><i class="fa-solid fa-eye"></i></a>`;
        if (auth == 1) {
            div += `<a class="btn-sm btn-light" id="favorite_1_${product.id}" onclick="addFavorites(${product.id}, 1)"><i class="fa-solid fa-heart"></i></a>`;
        } else {
            div += `<a class="btn-sm btn-light" id="favorite_1_${product.id}" onclick="alert()"><i class="fa-solid fa-heart"></i></a>`;
        }
        div += `<a href="#" class="btn-sm btn-success"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>`;
    });

    divProduct.innerHTML = div;
    if (auth == 1) {
        mark_user_favorites(products_list_ids_temp);
        products_list_ids_temp = [];
    }

}

function mark_user_favorites(products) {

    let url = base + 'md/api/load/user/favorites';
    var params = [1, products];

    fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _csrf
            },
            method: 'POST',
            body: JSON.stringify(params)

        })
        .then(response => response.json())
        .then(function(data) {
            if (data.count > 0) {
                data.objects.forEach(fav => {
                    document.getElementById(`favorite_1_${fav}`).classList.remove('btn-light');
                    document.getElementById(`favorite_1_${fav}`).removeAttribute('onclick');
                    document.getElementById(`favorite_1_${fav}`).classList.add('btn-danger')
                })
            }
        })
        .catch(error => console.log(error));
}

function pagination(links) {
    let pagi = '';
    links.forEach(link => {
        pagi += `
            <li class="page-item"><a class="page-link" href="" data-url="${link.url}">${link.label}</a></li>
        `
    });
    paginationDiv.innerHTML = pagi;
}

$('body').delegate('.page-link', 'click', function(e) {
    e.preventDefault();
    let url = this.dataset.url;
    if (url != 'null')
        fetch(url)
        .then(response => response.json())
        .then(function(data) {

            links = data.products.links;
            products = data.products.data;

            pagination(links)
            showProducts(products);
        })
        .catch(error => console.log(error));
})

function addFavorites(id, module) {
    let url = base + `md/api/favorites/add/${id}/${module}`;
    fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': _csrf
            },
            method: 'POST'
        })
        .then(response => response.json())
        .then(function(data) {
            document.getElementById(`favorite_${module}_${id}`).classList.remove('btn-light');
            document.getElementById(`favorite_${module}_${id}`).removeAttribute('onclick');
            document.getElementById(`favorite_${module}_${id}`).classList.add('btn-danger')
        })
        .catch(error => console.log(error));
}

function alert() {
    Swal.fire(
        'Oops?',
        'Por favor inicie sesión',
        'info'
    )
}
