<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#career" aria-expanded="true" aria-controls="career">
            <label class="form-check-label" for="career">
                Career
            </label>
        </button>
    </h2>
    <div id="career" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="career_all" value="career_all" name="permission[career_all]"
                        {{-- {{ (json_decode($user->permission) && in_array('career_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="career_all">Career All</label>
                </div>
            </div>

            <div class="row mx-1">
                <ul>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="career_department" value="career_department"
                                   name="permission[career_all][career_department]" data-checkem-parent="permission[career_all]"
                                {{ (json_decode($user->permission) && in_array('career_department', json_decode($user->permission, true)['career_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="career_department">Career Department All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_manage" id="department_manage"
                                        name="permission[career_all][career_department][department_manage]" data-checkem-parent="permission[career_all][career_department]"
                                        {{ (json_decode($user->permission) && in_array('department_manage', json_decode($user->permission, true)['career_all']['career_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_manage"> Manage Department</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_detail" id="department_detail"
                                           name="permission[career_all][career_department][department_detail]" data-checkem-parent="permission[career_all][career_department]"
                                        {{ (json_decode($user->permission) && in_array('department_detail', json_decode($user->permission, true)['career_all']['career_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_detail">Department Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_create" id="department_create"
                                           name="permission[career_all][career_department][department_create]" data-checkem-parent="permission[career_all][career_department]"
                                        {{ (json_decode($user->permission) && in_array('department_create', json_decode($user->permission, true)['career_all']['career_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_create">Department Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_edit" id="department_edit"
                                           name="permission[career_all][career_department][department_edit]" data-checkem-parent="permission[career_all][career_department]"
                                        {{ (json_decode($user->permission) && in_array('department_edit', json_decode($user->permission, true)['career_all']['career_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_edit">Department edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_delete" id="department_delete"
                                           name="permission[career_all][career_department][department_delete]" data-checkem-parent="permission[career_all][career_department]"
                                        {{ (json_decode($user->permission) && in_array('department_delete', json_decode($user->permission, true)['career_all']['career_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_delete">Department Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="career_designation" value="career_designation"
                                   name="permission[career_all][career_designation]" data-checkem-parent="permission[career_all]"
                                {{ (json_decode($user->permission) && in_array('career_designation', json_decode($user->permission, true)['career_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="career_designation">Career Designation All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_manage" id="designation_manage"
                                           name="permission[career_all][career_designation][designation_manage]" data-checkem-parent="permission[career_all][career_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_manage', json_decode($user->permission, true)['career_all']['career_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_manage">Manage Designation</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_detail" id="designation_detail"
                                           name="permission[career_all][career_designation][designation_detail]" data-checkem-parent="permission[career_all][career_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_detail', json_decode($user->permission, true)['career_all']['career_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_detail">Designation Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_create" id="designation_create"
                                           name="permission[career_all][career_designation][designation_create]" data-checkem-parent="permission[career_all][career_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_create', json_decode($user->permission, true)['career_all']['career_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_create">Designation Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_edit" id="designation_edit"
                                           name="permission[career_all][career_designation][designation_edit]" data-checkem-parent="permission[career_all][career_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_edit', json_decode($user->permission, true)['career_all']['career_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_edit">Designation edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_delete" id="designation_delete"
                                           name="permission[career_all][career_designation][designation_delete]" data-checkem-parent="permission[career_all][career_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_delete', json_decode($user->permission, true)['career_all']['career_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_delete">Designation Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="job_post_all" value="job_post_all" name="permission[career_all][job_post_all]" data-checkem-parent="permission[career_all]"
                                {{ (json_decode($user->permission, true) && is_array(json_decode($user->permission, true)['career_all'] ?? [] ? 'checked' : '') && in_array('job_post_all', json_decode($user->permission, true)['career_all'])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="job_post_all">Career Job Post All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_manage" value="job_post_manage" name="permission[career_all][job_post_all][job_post_manage]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_manage', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_manage">Manage Job Post</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_detail" value="job_post_detail" name="permission[career_all][job_post_all][job_post_detail]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_detail', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_detail">Job Post Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_preview" value="job_post_preview" name="permission[career_all][job_post_all][job_post_preview]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_preview', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_preview">Job Post Preview</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_create" value="job_post_create" name="permission[career_all][job_post_all][job_post_create]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_create', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_create">Job Post Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_edit" value="job_post_edit" name="permission[career_all][job_post_all][job_post_edit]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_edit', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_edit">Job Post edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_status" value="job_post_status" name="permission[career_all][job_post_all][job_post_status]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_status', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_status">Job Post Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_post_delete" value="job_post_delete" name="permission[career_all][job_post_all][job_post_delete]" data-checkem-parent="permission[career_all][job_post_all]"
                                        {{ (json_decode($user->permission) && in_array('job_post_delete', json_decode($user->permission, true)['career_all']['job_post_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_post_delete">Job Post Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="job_application_all" value="job_application_all" name="permission[career_all][job_application_all]" data-checkem-parent="permission[career_all]"
                                {{ (json_decode($user->permission, true) && is_array(json_decode($user->permission, true)['career_all'] ?? [] ? 'checked' : '') && in_array('job_application_all', json_decode($user->permission, true)['career_all'])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="job_application_all">Career Job Application All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_manage" value="job_application_manage" name="permission[career_all][job_application_all][job_application_manage]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_manage', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_manage">Manage Job Application</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_detail" value="job_application_detail" name="permission[career_all][job_application_all][job_application_detail]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_detail', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_detail">Job Application Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_delete" value="job_application_delete" name="permission[career_all][job_application_all][job_application_delete]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_delete', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_delete">Job Application Delete</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_download" value="job_application_download" name="permission[career_all][job_application_all][job_application_download]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_download', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_download">Job Application Download</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_name" value="job_application_name" name="permission[career_all][job_application_all][job_application_name]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_name', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_name">Job Application Name</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_email" value="job_application_email" name="permission[career_all][job_application_all][job_application_email]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_email', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_email">Job Application Email</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_checked" value="job_application_checked" name="permission[career_all][job_application_all][job_application_checked]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_checked', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_checked">Job Application Checked</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_shortlisted" value="job_application_shortlisted" name="permission[career_all][job_application_all][job_application_shortlisted]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_shortlisted', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_shortlisted">Job Application Shortlisted</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_interview_call" value="job_application_interview_call" name="permission[career_all][job_application_all][job_application_interview_call]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_interview_call', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_interview_call">Job Application Interview Call</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_rejected" value="job_application_rejected" name="permission[career_all][job_application_all][job_application_rejected]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_rejected', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_rejected">Job Application Rejected</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="job_application_hired" value="job_application_hired" name="permission[career_all][job_application_all][job_application_hired]" data-checkem-parent="permission[career_all][job_application_all]"
                                        {{ (json_decode($user->permission) && in_array('job_application_hired', json_decode($user->permission, true)['career_all']['job_application_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="job_application_hired">Job Application Hired</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

