<template>
    <link href="assets-dashboard/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-column flex-column-fluid">
            <!--begin::Header-->
            <navbar></navbar>
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
                <!--begin::Toolbar-->
                <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                        <!--begin::Title-->
                        <h1 class="d-flex text-dark fw-bold m-0 fs-3">All Rooms</h1>
                      <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Home</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Rooms</li>
                    <!--end::Item-->
                 
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center py-1">
                        <!--begin::Daterange-->
                                <router-link to="/add_room" class="btn btn-primary btn-sm align-self-center">Add Rooms</router-link>
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <!--end::Svg Icon-->
                        <!--end::Daterange-->
                        <!--begin::Filter-->
                        <div class="me-2">
                            <!--begin::Menu-->
                  
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_633e7b1056a6d">
                                <!--begin::Header-->
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Menu separator-->
                                <div class="separator border-gray-200"></div>
                                <!--end::Menu separator-->
                                <!--begin::Form-->
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Status:</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <div>
                                            <select class="form-select form-select-solid" data-kt-select2="true" data-placeholder="Select option" data-dropdown-parent="#kt_menu_633e7b1056a6d" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Member Type:</label>
                                        <!--end::Label-->
                                        <!--begin::Options-->
                                        <div class="d-flex">
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="checkbox" value="1" />
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                <span class="form-check-label">Customer</span>
                                            </label>
                                            <!--end::Options-->
                                        </div>
                                        <!--end::Options-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-semibold">Notifications:</label>
                                        <!--end::Label-->
                                        <!--begin::Switch-->
                                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                            <label class="form-check-label">Enabled</label>
                                        </div>
                                        <!--end::Switch-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </div>
                            <!--end::Menu 1-->
                            <!--end::Menu-->
                        </div>
                        <!--end::Filter-->
                        <!--begin::Button-->
    
                        <!--end::Button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Main-->
                <div class="d-flex flex-row flex-column-fluid align-items-stretch">
                    <!--begin::Content-->
                    
                    <div class="content flex-row-fluid" id="kt_content">
                        
                        <!--begin::Card-->
                        <div class="card">
                            
                            <!--begin::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-4">
                                <!--begin::Table-->
                              
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">

                                    
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
    
                                            <th class="min-w-125px">Company</th>
                                            <th class="min-w-125px">Location</th>
                                            <th class="min-w-125px">Name</th>
                                            <th class="min-w-125px">Description</th>
                                            <th class="min-w-125px">Capacity</th>
                                            <th class="text-end min-w-50px">Actions</th>
    
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <!--begin::Table row-->
    
                                        <tr v-for="rooms in All_rooms">
                                            <!--begin::Checkbox-->
                                            <td><span> {{rooms.cname}}</span></td>
                                            <td><span> {{rooms.locname}}</span></td>
                                            <td><span> {{ rooms.name }} </span></td>
                                            <td><span> {{ rooms.description }} </span></td>
                                            <td><span> {{ rooms.capacity }} </span></td>
                                        
                                            <td><router-link :to="'/edit_rooms/' + rooms.uuid" class="btn btn-sm btn-primary">Edit</router-link>&nbsp;<button class="btn btn-sm btn-danger" @click="deleteRooms(rooms.uuid)">Delete </button></td>
                                            

                                        </tr>
                                        <!--end::Table row-->
    
                                        <!--end::Table row-->
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Main-->
                <!--begin::Footer-->
               <dashboard_footer></dashboard_footer>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
 

    </template>
    
    <script>
    import axios from 'axios';
    
    export default {
        data() {
            return {
    
                rooms: [],
                All_rooms: [],
              
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
                axios.get('/api/rooms').then((response) => {
    
                    this.All_rooms = response.data;
    
                }).catch(error => {
                    this.errors = error.response.data;
                })
            },
            deleteRooms(uuid)
        {
            axios.post('/api/deleteRooms/'+uuid).then(()=>{
                
                this.$router.push({
                    name: 'all_rooms'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
           
        
    
        },
        mounted() {
    
            console.log(this.loadData());
            console.log(this.getUsers());
            document.title = "Physio App | All Rooms";  
        }
    }
    </script>
    