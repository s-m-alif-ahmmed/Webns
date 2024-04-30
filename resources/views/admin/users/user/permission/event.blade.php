<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#event" aria-expanded="true" aria-controls="event">
            <label class="form-check-label" for="event">
                Event
            </label>
        </button>
    </h2>
    <div id="event" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="event_all" value="event_all" name="permission[event_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="event_all">Event All</label>
                </div>
            </div>
        </div>
    </div>
</div>


