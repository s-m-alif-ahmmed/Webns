<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#users" aria-expanded="true" aria-controls="users">
            <label class="form-check-label" for="users">
                Users
            </label>
        </button>
    </h2>
    <div id="users" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="row ms-1">
                <div class="form-check col-md-12">
                    <input class="form-check-input" type="checkbox" id="users_all" value="users_all" name="permission[users_all]"
                        {{--                                                                {{ (json_decode($user->permission) && in_array('users_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                    />
                    <label class="form-check-label" for="users_all">Users All</label>
                </div>
            </div>

            <div class="row mx-1">
                <ul>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="user_department" value="user_department" name="permission[users_all][user_department]" data-checkem-parent="permission[users_all]"
                                {{ (json_decode($user->permission) && in_array('user_department', json_decode($user->permission, true)['users_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="user_department">User Department All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_manage" id="department_manage" name="permission[users_all][user_department][department_manage]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_manage', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_manage"> Manage Department</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_detail" id="department_detail" name="permission[users_all][user_department][department_detail]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_detail', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_detail">Department Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_number" id="department_number" name="permission[users_all][user_department][department_number]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_number', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_number">Department ID </label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_create" id="department_create" name="permission[users_all][user_department][department_create]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_create', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_create">Department Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_edit" id="department_edit" name="permission[users_all][user_department][department_edit]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_edit', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_edit">Department edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_status" id="department_status" name="permission[users_all][user_department][department_status]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_status', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_edit"> Department Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="department_delete" id="department_delete" name="permission[users_all][user_department][department_delete]" data-checkem-parent="permission[users_all][user_department]"
                                        {{ (json_decode($user->permission) && in_array('department_delete', json_decode($user->permission, true)['users_all']['user_department'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="department_delete">Department Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="user_designation" value="user_designation" name="permission[users_all][user_designation]" data-checkem-parent="permission[users_all]"
                                {{ (json_decode($user->permission) && in_array('user_designation', json_decode($user->permission, true)['users_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="user_designation">User Designation All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_manage" id="designation_manage" name="permission[users_all][user_designation][designation_manage]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_manage', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_manage">Manage Designation</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_detail" id="designation_detail" name="permission[users_all][user_designation][designation_detail]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_detail', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_detail">Designation Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_number" id="designation_number" name="permission[users_all][user_designation][designation_number]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_number', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_number">Designation ID</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_create" id="designation_create" name="permission[users_all][user_designation][designation_create]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_create', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_create">Designation Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_edit" id="designation_edit" name="permission[users_all][user_designation][designation_edit]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_edit', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_edit">Designation edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_status" id="designation_status" name="permission[users_all][user_designation][designation_status]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_status', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_status">Designation Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="designation_delete" id="designation_delete" name="permission[users_all][user_designation][designation_delete]" data-checkem-parent="permission[users_all][user_designation]"
                                        {{ (json_decode($user->permission) && in_array('designation_delete', json_decode($user->permission, true)['users_all']['user_designation'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="designation_delete">Designation Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="employ_all" value="employ_all" name="permission[users_all][employ_all]" data-checkem-parent="permission[users_all]"
                                {{ (json_decode($user->permission, true) && is_array(json_decode($user->permission, true)['users_all'] ?? [] ? 'checked' : '') && in_array('employ_all', json_decode($user->permission, true)['users_all'])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="employ_all">Users All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_manage" value="employ_manage" name="permission[users_all][employ_all][employ_manage]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_manage', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_manage">Manage User</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_detail" value="employ_detail" name="permission[users_all][employ_all][employ_detail]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_detail', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_detail">User Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_create" value="employ_create" name="permission[users_all][employ_all][employ_create]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_create', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_create">User Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_edit" value="employ_edit" name="permission[users_all][employ_all][employ_edit]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_edit', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_edit">User edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_permission" value="employ_permission" name="permission[users_all][employ_all][employ_permission]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_permission', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_permission">User Permission</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_password" value="employ_password" name="permission[users_all][employ_all][employ_password]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_password', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_password">User Change Password</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_restriction" value="employ_restriction" name="permission[users_all][employ_all][employ_restriction]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_restriction', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_restriction">User Restriction</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="employ_delete" value="employ_delete" name="permission[users_all][employ_all][employ_delete]" data-checkem-parent="permission[users_all][employ_all]"
                                        {{ (json_decode($user->permission) && in_array('employ_delete', json_decode($user->permission, true)['users_all']['employ_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="employ_delete">User Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="team_all" value="team_all" name="permission[users_all][team_all]" data-checkem-parent="permission[users_all]"
                                {{ (json_decode($user->permission, true) && is_array(json_decode($user->permission, true)['users_all'] ?? [] ? 'checked' : '') && in_array('team_all', json_decode($user->permission, true)['users_all'])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="team_all">Team All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="team_manage" value="team_manage" name="permission[users_all][team_all][team_manage]" data-checkem-parent="permission[users_all][team_all]"
                                        {{ (json_decode($user->permission) && in_array('team_manage', json_decode($user->permission, true)['users_all']['team_all'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="team_manage">Manage Team</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
