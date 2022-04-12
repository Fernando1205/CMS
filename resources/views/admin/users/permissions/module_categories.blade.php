<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-folder"></i> Categorias</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="categories_index" name="categories_index"
                    {{ keyValueJson($user->permissions,'categories.index') ? 'checked' : '' }}>
                <label class="form-check-label" for="categories_index">Puede ver las categorias</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="categories_create" name="categories_create"
                    {{ keyValueJson($user->permissions,'categories.create') ? 'checked' : '' }}>
                <label class="form-check-label" for="categories_create">Puede crear categorias</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="categories_edit" name="categories_edit"
                    {{ keyValueJson($user->permissions,'categories.edit') ? 'checked' : '' }}>
                <label class="form-check-label" for="categories_edit">Puede editar las categorias</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="categories_destroy" name="categories_destroy"
                    {{ keyValueJson($user->permissions,'categories.destroy') ? 'checked' : '' }}>
                <label class="form-check-label" for="categories_destroy">Puede eliminar categorias</label>
            </div>
        </div>
    </div>

</div>
