<div class="col-md-4 d-flex">
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
                <input type="checkbox" class="form-check-input" id="users_edit" name="users_edit"
                    {{ keyValueJson($user->permissions,'users.edit') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_edit">Puede editar los usuarios</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_destroy" name="users_destroy"
                    {{ keyValueJson($user->permissions,'users.destroy') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_destroy">Puede eliminar usuarios</label>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="users_permissions" name="users_permissions"
                    {{ keyValueJson($user->permissions,'users.permissions') ? 'checked' : '' }}>
                <label class="form-check-label" for="users_permissions">Puede administrar permisos de los usuarios</label>
            </div>
        </div>
    </div>
</div>
