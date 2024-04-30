<div class="accordion-item">
    <h2 class="accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#blogs_all" aria-expanded="true" aria-controls="blogs_all">
            <label class="form-check-label" for="blogs_all">Blog</label>
        </button>
    </h2>
    <div id="blogs_all" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
        <div class="accordion-body">

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="blogs_all" value="blogs_all" name="permission[blogs_all]"
                    {{--                                                            {{ (json_decode($user->permission) && in_array('blogs_all', json_decode($user->permission, true) ?? [])) ? 'checked' : '' }} --}}
                />
                <label class="form-check-label" for="blogs_all">Blogs All</label>
            </div>
            <div class="row mx-1">
                <ul class="row d-flex col-12">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="blog_categories" value="blog_categories" name="permission[blogs_all][blog_categories]" data-checkem-parent="permission[blogs_all]"
                                {{ (json_decode($user->permission) && in_array('blog_categories', json_decode($user->permission, true)['blogs_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="blog_categories">Blog Categories All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="manage_category" id="manage_category" name="permission[blogs_all][blog_categories][manage_category]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('manage_category', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="manage_category">Manage Category</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_detail" id="category_detail" name="permission[blogs_all][blog_categories][category_detail]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_detail', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_detail">Category Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_number" id="category_number" name="permission[blogs_all][blog_categories][category_number]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_number', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_number">Category ID</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_create" id="category_create" name="permission[blogs_all][blog_categories][category_create]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_create', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_create">Category Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_edit" id="category_edit" name="permission[blogs_all][blog_categories][category_edit]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_edit', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_edit">Category Edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_status" id="category_status" name="permission[blogs_all][blog_categories][category_status]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_status', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_status">Category Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="category_delete" id="category_delete" name="permission[blogs_all][blog_categories][category_delete]" data-checkem-parent="permission[blogs_all][blog_categories]"
                                        {{ (json_decode($user->permission) && in_array('category_delete', json_decode($user->permission, true)['blogs_all']['blog_categories'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="category_delete">Category Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="blog_tags" value="blog_tags" name="permission[blogs_all][blog_tags]" data-checkem-parent="permission[blogs_all]"
                                {{ (json_decode($user->permission) && in_array('blog_tags', json_decode($user->permission, true)['blogs_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="blog_tags">Blog Tags All</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="manage_tag" id="manage_tag" name="permission[blogs_all][blog_tags][manage_tag]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('manage_tag', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="manage_tag">Manage Tag</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_detail" id="tag_detail" name="permission[blogs_all][blog_tags][tag_detail]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_detail', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_detail">Tag Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_number" id="tag_number" name="permission[blogs_all][blog_tags][tag_number]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_number', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_number">Tag ID</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_create" id="tag_create" name="permission[blogs_all][blog_tags][tag_create]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_create', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_create">Tag Create</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_edit" id="tag_edit" name="permission[blogs_all][blog_tags][tag_edit]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_edit', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_edit">Tag Edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_status" id="tag_status" name="permission[blogs_all][blog_tags][tag_status]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_status', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_status">Tag Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="tag_delete" id="tag_delete" name="permission[blogs_all][blog_tags][tag_delete]" data-checkem-parent="permission[blogs_all][blog_tags]"
                                        {{ (json_decode($user->permission) && in_array('tag_delete', json_decode($user->permission, true)['blogs_all']['blog_tags'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="tag_delete">Tag Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="blogs" value="blogs" name="permission[blogs_all][blogs]" data-checkem-parent="permission[blogs_all]"
                                {{ (json_decode($user->permission) && in_array('blogs', json_decode($user->permission, true)['blogs_all'] ?? [])) ? 'checked' : '' }} />
                            <label class="form-check-label" for="user_department">Blogs</label>
                        </div>
                        <ul class="row d-flex col-12">
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="manage_blog" id="manage_blog" name="permission[blogs_all][blogs][manage_blog]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('manage_blog', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="manage_blog">Manage Blog</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_detail" id="blog_detail" name="permission[blogs_all][blogs][blog_detail]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_detail', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_detail">Blog Detail</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_number" id="blog_number" name="permission[blogs_all][blogs][blog_number]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_number', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_number">Blog ID</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_create" id="blog_create" name="permission[blogs_all][blogs][blog_create]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_create', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_create"> Blog Create </label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_edit" id="blog_edit" name="permission[blogs_all][blogs][blog_edit]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_edit', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_edit">Blog Edit</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_status" id="blog_status" name="permission[blogs_all][blogs][blog_status]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_status', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_status">Blog Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_popular_status" id="blog_popular_status" name="permission[blogs_all][blogs][blog_popular_status]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_popular_status', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_popular_status">Blog Popular Status</label>
                                </div>
                            </li>
                            <li class="col-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" value="blog_delete" id="blog_delete" name="permission[blogs_all][blogs][blog_delete]" data-checkem-parent="permission[blogs_all][blogs]"
                                        {{ (json_decode($user->permission) && in_array('blog_delete', json_decode($user->permission, true)['blogs_all']['blogs'] ?? [])) ? 'checked' : '' }} />
                                    <label class="form-check-label" for="blog_delete">Blog Delete</label>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
