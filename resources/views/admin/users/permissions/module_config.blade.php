<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-gear"></i> Configuración</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="settings.index" name="settings.index"
                    {{ keyValueJson($user->permissions,'settings.index') ? 'checked' : '' }}>
                <label class="form-check-label" for="settings.index">Puede modificar las configuraciones</label>
            </div>
        </div>
    </div>

</div>
