<div class="col-md-4 d-flex">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-images"></i> Sliders</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="slider.index" name="slider.index"
                    {{ keyValueJson($user->permissions,'slider.index') ? 'checked' : '' }}>
                <label class="form-check-label" for="slider.index">Puede actualizar slider</label>
            </div>
        </div>
    </div>

</div>
