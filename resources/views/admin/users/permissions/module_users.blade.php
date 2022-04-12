<div class="col-md-4">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-users"></i> Usuarios</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_index" name="users_index"
                    {{ keyValueJson($user->permissions,'users.index') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_index">Puede ver los usuarios</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_create" name="users_create"
                    {{ keyValueJson($user->permissions,'users.create') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_create">Puede crear usuarios</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_edit" name="users_edit"
                    {{ keyValueJson($user->permissions,'users.edit') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_edit">Puede editar los usuarios</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_destroy" name="users_destroy"
                    {{ keyValueJson($user->permissions,'users.destroy') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_destroy">Puede eliminar usuarios</label>
            </div>
        </div>
    </div>
</div>
