<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#queries" aria-expanded="true" aria-controls="queries">
            <label class="form-check-label" for="queries">
                Queries
            </label>
        </button>
    </h2>
    <div id="queries" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="queries_all" value="queries_all" name="permission[queries_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="queries_all">Queries All</label>
                </div>
            </div>
        </div>
    </div>
</div>



