const btnsDelete = document.querySelectorAll('.product-delete');
const formDeleteProduct = document.querySelector('#formDeleteProduct');

btnsDelete.forEach(element => {
    element.addEventListener('click', (e) => {

        e.preventDefault();

        let title, text, icon, confirm, url;
        let action = element.dataset.action;
        let idProduct = element.dataset.product;

        if (action == 'delete') {
            title = '¿Esta seguro de eliminar el producto?'
            text = "Recuerda que esta acción no podrá ser revertida"
            icon = 'warning';
            confirm = 'Si, Borrar';
            url = `/admin/products/${idProduct}`;
        } else if (action == 'restore') {
            title = '¿Esta seguro de restaurar el producto?'
            text = "Recuerda que esta acción no podrá ser revertida"
            icon = 'info';
            confirm = 'Si, Restaurar';
            url = `/admin/products/restore/${idProduct}`;
        }

        Swal.fire({
            title: title,
            text: text,
            icon: icon,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirm
        }).then((result) => {
            if (result.isConfirmed) {
                deleteProduct(url);
            }
        });
    })
});

function deleteProduct(url) {
    formDeleteProduct.setAttribute('action', url);
    formDeleteProduct.submit();
}