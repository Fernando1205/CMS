<div class="col-md-4">
    <div class="panel shadow">
        <div class="header">
            <h2 class="titlte"><i class="fa-solid fa-home"></i> Dashboard</h2>
        </div>
        <div class="inside">
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="dashboard" name="dashboard"
                    {{ keyValueJson($user->permissions,'dashboard') ? 'checked' : '' }}>
                <label class="form-check-label" for="dashboard">Puede ver el dashboard</label>
            </div>
        </div>
    </div>
</div>
