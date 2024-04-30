<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="true" aria-controls="pages">
            <label class="form-check-label" for="pages">
                Pages
            </label>
        </button>
    </h2>
    <div id="pages" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="pages_all" value="pages_all" name="permission[pages_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="pages_all">Pages All</label>
                </div>
            </div>
        </div>
    </div>
</div>



