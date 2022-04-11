<div class="col-md-4">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-boxes-stacked"></i> Productos</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="products_index" name="products_index"
                    {{ keyValueJson($user->permissions,'products.index') ? 'checked' : '' }}>
                <label class="form-check-label" for="products_index">Puede ver los productos</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="products_store" name="products_store"
                    {{ keyValueJson($user->permissions,'products.store') ? 'checked' : '' }}>
                <label class="form-check-label" for="products_store">Puede crear productos</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="products_edit" name="products_edit"
                    {{ keyValueJson($user->permissions,'products.edit') ? 'checked' : '' }}>
                <label class="form-check-label" for="products_edit">Puede editar productos</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="products_gallery" name="products_gallery"
                    {{ keyValueJson($user->permissions,'products.gallery') ? 'checked' : '' }}>
                <label class="form-check-label" for="products_gallery">Puede agregar imagenes a los productos</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="gallery_destroy" name="gallery_destroy"
                    {{ keyValueJson($user->permissions,'gallery.destroy') ? 'checked' : '' }}>
                <label class="form-check-label" for="gallery_destroy">Puede eliminar imagenes a los productos</label>
            </div>
        </div>
    </div>
</div>
