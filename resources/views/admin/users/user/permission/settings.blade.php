<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settings" aria-expanded="true" aria-controls="settings">
            <label class="form-check-label" for="settings">
                Settings
            </label>
        </button>
    </h2>
    <div id="settings" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="settings_all" value="settings_all" name="permission[settings_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="settings_all">Settings All</label>
                </div>
            </div>
        </div>
    </div>
</div>



