<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#press_release" aria-expanded="true" aria-controls="press_release">
            <label class="form-check-label" for="press_release">
                Press Release
            </label>
        </button>
    </h2>
    <div id="press_release" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="press_release_all" value="press_release_all" name="permission[press_release_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="press_release_all">Press Release All</label>
                </div>
            </div>
        </div>
    </div>
</div>



