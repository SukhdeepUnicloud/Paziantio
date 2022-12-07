<template>
    <navbar></navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">All Registerd Users</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Home</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Users</li>
                    <!--end::Item-->
                    
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        <!--begin::Actions-->
        
        </div>
        <!--end::Toolbar-->
        <!--begin::Main-->
        <div class="d-flex flex-row flex-column-fluid align-items-stretch">
            <!--begin::Content-->
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1" style="display: none !important;">
                                <i class="fa fa-search"></i>
                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <!--begin::Filter-->
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Filter
                                </button>
                                <!--begin::Menu 1-->
                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <!--begin::Header-->
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Separator-->
                                    <div class="separator border-gray-200"></div>
                                    <!--end::Separator-->
                                    <!--begin::Content-->
                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Role:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                <option></option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Analyst">Analyst</option>
                                                <option value="Developer">Developer</option>
                                                <option value="Support">Support</option>
                                                <option value="Trial">Trial</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Two Step
                                                Verification:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-user-table-filter="two-step" data-hide-search="true">
                                                <option></option>
                                                <option value="Enabled">Enabled</option>
                                            </select>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Actions-->
                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                        <!--end::Actions-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                                <!--end::Menu 1-->
                                <!--end::Filter-->
                                <!--begin::Export-->
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                            <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Export
                                </button>
                                <!--end::Export-->
                                <!--begin::Add user-->
                                <button type="button" class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#kt_modal_add_user">
                                    <i class="fa fa-plus"></i>Add User
                                </button>
                                <!--end::Add user-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                                </div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                            <!--begin::Modal - Adjust Balance-->
                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Export Users</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="fs-6 fw-semibold form-label mb-2">Select
                                                        Roles:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="role" data-control="select2" data-placeholder="Select a role" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="Administrator">Administrator</option>
                                                        <option value="Analyst">Analyst</option>
                                                        <option value="Developer">Developer</option>
                                                        <option value="Support">Support</option>
                                                        <option value="Trial">Trial</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10">
                                                    <!--begin::Label-->
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Select
                                                        Export Format:</label>
                                                    <!--end::Label-->
                                                    <!--begin::Input-->
                                                    <select name="format" data-control="select2" data-placeholder="Select a format" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                        <option value="cvs">CVS</option>
                                                        <option value="zip">ZIP</option>
                                                    </select>
                                                    <!--end::Input-->
                                                </div>
                                                <!--end::Input group-->
                                                <!--begin::Actions-->
                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Submit</span>
                                                        <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                                <!--end::Actions-->
                                            </form>
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - New Card-->
                            <!--begin::Modal - Add task-->
                            <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                                <!--begin::Modal dialog-->
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <!--begin::Modal content-->
                                    <div class="modal-content">
                                        <!--begin::Modal header-->
                                        <div class="modal-header" id="kt_modal_add_user_header">
                                            <!--begin::Modal title-->
                                            <h2 class="fw-bold">Add User</h2>
                                            <!--end::Modal title-->
                                            <!--begin::Close-->
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </div>
                                            <!--end::Close-->
                                        </div>
                                        <!--end::Modal header-->
                                        <!--begin::Modal body-->
                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <!--begin::Form-->
                                            <!--begin::Input group=-->
                                            <div class="fv-row mb-8">
                                                <!--begin::Email-->
                                                <input type="text" placeholder="Name" name="name" autocomplete="off" class="form-control bg-transparent" v-model="item.name" />
                                                <!--end::Email-->

                                                <div v-for="(errorArray, index) in errors" :key="index">
                                                    <div class="text-danger" v-if="errorArray.name != null">
                                                        The Name Field is Required
                                                    </div>
                                                </div>

                                            </div>

                                            <!--begin::Input group=-->
                                            <div class="fv-row mb-8">
                                                <!--begin::Email-->
                                                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" v-model="item.email" />
                                                <!--end::Email-->
                                                <div v-for="(errorArray, index) in errors" :key="index">
                                                    <div class="text-danger" v-if="errorArray.email != null">
                                                        The Email Field is Required
                                                    </div>
                                                </div>

                                            </div>

                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Role</label>

                                            <div class="fv-row mb-8">
                                                <!--begin::Email-->
                                                <div class="col-lg-8 fv-row">
                                                    <div class="form-check form-check-custom form-check-solid">

                                                        <input class="form-check-input" type="checkbox" value="Admin" name="role" v-model="this.item.role"/>
                                                        <label class="form-check-label" for="flexCheckboxLg">

                                                            Admin

                                                        </label>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                                <div class="col-lg-8 fv-row mt-2">
                                                    <div class="form-check form-check-custom form-check-solid">

                                                        <input class="form-check-input" type="checkbox" value="Owner" name="role" />
                                                        <label class="form-check-label" for="flexCheckboxLg">

                                                            Owner

                                                        </label>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                                <div class="col-lg-8 fv-row mt-2">
                                                    <div class="form-check form-check-custom form-check-solid">

                                                        <input class="form-check-input" type="checkbox" value="Manager" name="role" />
                                                        <label class="form-check-label" for="flexCheckboxLg">

                                                            Manager

                                                        </label>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                                <div class="col-lg-8 fv-row mt-2">
                                                    <div class="form-check form-check-custom form-check-solid">

                                                        <input class="form-check-input" type="checkbox" value="Therapist" name="role" />
                                                        <label class="form-check-label" for="flexCheckboxLg">

                                                            Therapist

                                                        </label>&nbsp;&nbsp;

                                                    </div>
                                                </div>
                                                <div class="col-lg-8 fv-row mt-2">
                                                    <div class="form-check form-check-custom form-check-solid">

                                                        <input class="form-check-input" type="checkbox" value="Patient" name="role" />
                                                        <label class="form-check-label" for="flexCheckboxLg">

                                                            Patient

                                                        </label>&nbsp;&nbsp;

                                                    </div>
                                                </div>

                                            </div>
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-8" data-kt-password-meter="true">
                                                <!--begin::Wrapper-->
                                                <div class="mb-1">
                                                    <!--begin::Input wrapper-->
                                                    <div class="position-relative mb-3">
                                                        <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" v-model="item.password" />
                                                        <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                                            <i class="bi bi-eye-slash fs-2"></i>
                                                            <i class="bi bi-eye fs-2 d-none"></i>
                                                        </span>

                                                        <div v-for="(errorArray, index) in errors" :key="index">
                                                            <div class="text-danger" v-if="errorArray.password != null">
                                                                The Password Field is Required
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!--end::Input wrapper-->
                                                    <!--begin::Meter-->
                                                    <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                        </div>
                                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                        </div>
                                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2">
                                                        </div>
                                                        <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px">
                                                        </div>
                                                    </div>
                                                    <!--end::Meter-->
                                                </div>
                                                <!--end::Wrapper-->
                                                <!--begin::Hint-->
                                                <div class="text-muted">Use 8 or more characters with a
                                                    mix of
                                                    letters, numbers & symbols.
                                                </div>
                                                <!--end::Hint-->
                                            </div>
                                            <!--end::Input group=-->
                                            <!--end::Input group=-->
                                            <div class="fv-row mb-8">
                                                <!--begin::Repeat Password-->
                                                <input placeholder="Repeat Password" name="confirm_password" type="password" autocomplete="off" class="form-control bg-transparent" v-model="item.confirm_password" />
                                                <!--end::Repeat Password-->

                                                <div v-for="(errorArray, index) in errors" :key="index">
                                                    <div class="text-danger" v-if="errorArray.confirm_password != null">
                                                        The Repeat Password Field is Required
                                                    </div>
                                                </div>

                                            </div>

                                            <!--begin::Actions-->
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit" @click="save">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            <!--end::Actions-->
                                            <!--end::Form-->
                                        </div>
                                        <!--end::Modal body-->
                                    </div>
                                    <!--end::Modal content-->
                                </div>
                                <!--end::Modal dialog-->
                            </div>
                            <!--end::Modal - Add task-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-dashed fs-6 gy-5" id="datatable">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">User</th>
                                        <th class="min-w-125px">Role</th>
                                        <th class="min-w-125px">Last login</th>
                                        <th class="min-w-125px">Two-step</th>
                                        <th class="text-end min-w-100px">Actions</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    <!--begin::Table row-->
                                    <tr v-for="users in allUsers" :key="users.id">
                                        <!--begin::User=-->
                                        <td class="d-flex align-items-center">
                                            <!--begin:: Avatar -->
                                            <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                <a href="../../demo19/dist/apps/user-management/users/view.html">
                                                    <div class="symbol-label">
                                                        <img class="w-100"   :src="'./assets/app/public/user_profiles/'+users.id+'/users/avatar/'+users.image+''" alt="image" />
                                                        
                                                    </div>
                                                </a>
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::User details-->
                                            <div class="d-flex flex-column">
                                                <a href="../../demo19/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">
                                                    {{ users.name }} 
                                                </a>
                                                <span>{{ users.email }}</span>
                                            </div>
                                            <!--begin::User details-->
                                        </td>
                                        <!--end::User=-->
                                        <!--begin::Role=-->
                                        <td><span> {{ users.role }} </span></td>
                                        <!--end::Role=-->
                                        <!--begin::Last login=-->
                                        <td>
                                            <div class="badge badge-light fw-bold">Yesterday</div>
                                        </td>
                                        <!--end::Last login=-->
                                        <!--begin::Two step=-->
                                        <td v-if="users.two_factor == 1"> 
                                            <div class="badge badge-light-success fw-bold">Enabled</div> 
                                        </td>
                                        <td v-else>
                                            <div class="badge badge-light-danger fw-bold">Disabled</div>    
                                        </td>
                                        <!--end::Two step=-->
                                        <!--begin::Action=-->
                                        <td class="text-end">
                                            <div v-if="users.user_status == 1">
                                                <button class="btn btn-sm btn-danger" v-on:click="changeAccountStatus(0, users.id)">Deactivate</button>
                                                <button class="btn btn-sm btn-danger ms-1" @click="deleteUser(users.id)">Delete</button>
                                            </div>
                                            <div v-else>
                                                <button class="btn btn-sm btn-success" v-on:click="changeAccountStatus(1, users.id)">Activate</button>
                                                <button class="btn btn-sm btn-danger ms-1" @click="deleteUser(users.id)">Delete</button>
                                            </div>
                                        </td>
                                        <!--end::Action=-->
                                    </tr>
                                    <!--end::Table row-->

                                    <!--end::Table row-->
                                </tbody>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Main-->
        
    </div>
    <!--end::Wrapper-->

    <div class="container-xxl">
        <dashboard_footer> </dashboard_footer>
    </div>
</template>

<style>
.image-input-placeholder { 
    background-image: url('assets/media/svg/files/blank-image.svg'); 
} 
[data-theme="dark"] .image-input-placeholder { 
    background-image: url('assets/media/svg/files/blank-image-dark.svg'); 
}

/* Datatable Pagination CSS Start */
.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: #fff !important;
    border: 1px solid #f4f6fa !important;
    background: #009ef7 !important;
    border-radius: 12px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    color: #009ef7 !important;
    border: 1px solid #f4f6fa !important;
    background: #f4f6fa !important;
    border-radius: 12px !important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
    color: #a9a9a9 !important;
    background: transparent !important;
    border: none !important;
}
i.bi, i[class*=" fa-"], i[class*=" fonticon-"], i[class*=" la-"], i[class^=fa-], i[class^=fonticon-], i[class^=la-] {
    color: inherit;
}

/* Datatable CSS Start */
table.dataTable thead>tr>th.sorting:after, table.dataTable thead>tr>th.sorting_asc:after {
    display:none !important;
}
div.dataTables_wrapper div.dataTables_info {
    padding: 1.4rem 0;
}
.dataTables_wrapper .dataTables_filter {
    float: left;
    position: relative;
}
i.fa.fa-search {
    position: absolute;
    margin-left: 1.5rem;
    line-height: 2.5;
    color: #a1a5b7;
    font-size: 18px;
}
.dataTables_wrapper .dataTables_filter input {
    outline: none;
    border: 1px solid #f2f3f3;
    border-radius: 10px;
    padding: 10px 10px 10px 3.5rem;
    background-color: #f2f3f3;
    font-weight: 500;
    font-size: 1.1rem;
    margin-left: 0px !important;
}
input[type="search"]::placeholder {
    color: #a1a5b7;
}
.table-responsive {
    margin-top: -70px;
}

</style>

<script>
import axios from 'axios'; 
// Bootstrap and jQuery libraries
import "jquery/dist/jquery.min.js";
// Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import "datatables.net-buttons/js/dataTables.buttons.js"
import "datatables.net-buttons/js/buttons.colVis.js"
import "datatables.net-buttons/js/buttons.flash.js"
import "datatables.net-buttons/js/buttons.html5.js"
import "datatables.net-buttons/js/buttons.print.js"
import $ from "jquery";

export default {
    data() {
        return {
            user: [],
            allUsers: [],
            item: {
                name: "",
                email: "",
                role: "",
                password: "",
                confirm_password: ""
            }
        }
    },
    methods: {
        loadData: function () {
            axios.get('/api/getCurrentUser').then((response) => {
                this.user = response.data;
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        getUsers: function () {
            axios.get('/api/users').then((response) => {
                this.allUsers = response.data;
                // console.log(response.data);
                setTimeout(() => {
                    $("#datatable").DataTable({
                        // "searching": false,
                        // select: true,
                        language: {
                            // search: "_INPUT_",
                            search: '<i class="fa fa-search"></i>',
                            searchPlaceholder: "Search user",
                            paginate: {
                                next: '<i class="fas fa-angle-right"></i>', 
                                previous: '<i class="fas fa-angle-left"></i>' 
                            }
                        },
                        lengthMenu: [
                            [10, 25, 50, -1],
                            [10, 25, 50, "All"],
                        ],
                        pageLength: 10,
                        dom: '<"float-left"B><"float-right"f>rt<"row"<"col-sm-4"l><"col-sm-4"i><"col-sm-4"p>>',
                        pagingType: 'full_numbers',
                        processing: true,
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                        
                        // pageLength: 5,
                        // processing: true,
                        // dom: 'Bfrtip',
                        // buttons: ['copy', 'csv', 'print']
                    });
                }, 1000);
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        deleteUser(id) {
            axios.post('/api/deleteUser/' + id).then(() => {
                console.log('saved');
                location.reload();
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        changeAccountStatus(status, id) {
            axios.post('/api/changeAccountStatus/' + status + '/' + id).then((response) => {
                console.log('saved');
                location.reload();
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
		save() {
            axios.post('/api/registerUser', this.item).then(() => {
                console.log('saved');
                this.$router.push({
                    name: 'users'
                });
            }).catch(error => {
                this.errors = error.response.data;
            })
        }
    },
    mounted() {
        console.log(this.loadData());
        console.log(this.getUsers());
    }
}
</script>
