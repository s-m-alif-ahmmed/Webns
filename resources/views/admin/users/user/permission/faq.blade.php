<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq" aria-expanded="true" aria-controls="faq">
            <label class="form-check-label" for="faq">
                FAQ
            </label>
        </button>
    </h2>
    <div id="faq" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="faq_all" value="faq_all" name="permission[faq_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="faq_all">FAQ All</label>
                </div>
            </div>
        </div>
    </div>
</div>



