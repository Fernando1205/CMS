<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-clipboard-list"></i> Ordenes</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="config.orders" name="config.orders"
                    {{ keyValueJson($user->permissions,'config.orders') ? 'checked' : '' }}>
                <label class="form-check-label" for="config.orders">Puede ver el listado de ordenes</label>
            </div>
        </div>
    </div>

</div>
