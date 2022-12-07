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
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">All Role</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Home</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Role</li>
                    <!--end::Item-->
                 
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Daterange-->
           
                <!--end::Daterange-->
                
                <!--begin::Button-->
                <router-link to="/add_role" class="btn btn-primary btn-sm align-self-center">Add Role</router-link>
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
    
                                            <th class="min-w-125px">Name</th>
                                            <th class="min-w-125px">Role Status</th>
                                            <th class="min-w-125px">On Register</th>
                                            <th class="min-w-125px">Actions</th>
                                            <th class="min-w-125px">Status</th>
                                            <th>On Register User</th>
    
                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <!--begin::Table row-->
    
                                        <tr v-for="role in All_role">
                                            <!--begin::Checkbox-->
    
                                            <td><span> {{ role.name }} </span></td>
                                            <td><span v-if="role.role_status=='1'" class="badge badge-success">Acive Role</span>
                                                <span v-if="role.role_status=='0'" class="badge badge-danger">Deactivate Role</span></td>
                                                <td><span v-if="role.on_register=='yes'" class="badge badge-success">Show Role</span>
                                                <span v-if="role.on_register=='no'" class="badge badge-danger">Hide Role</span></td>
                                                <td class="text-right"><router-link :to="'/edit_role/' + role.uuid" class="btn btn-sm btn-primary">Edit</router-link>&nbsp;<button class="btn btn-sm btn-danger" @click="deleteRole(role.uuid)">Delete </button></td>
                                            <td class="text-right"><button v-if="role.role_status=='0'" class="btn btn-sm btn-success" @click="ActiveRole(role.uuid)">Active </button>&nbsp;<button v-if="role.role_status=='1'" class="btn btn-sm btn-info" @click="DeactiveRole(role.uuid)">Deactive </button></td>
                                            <td class="text-right"><button v-if="role.on_register=='no'" class="btn btn-sm btn-warning" @click="ShowRegister(role.uuid)">Yes </button>&nbsp;<button v-if="role.on_register=='yes'" class="btn btn-sm btn-info" @click="HideRegister(role.uuid)">No </button></td>

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
    
                features: [],
                All_role: [],
           
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
                axios.get('/api/roles').then((response) => {
    
                    this.All_role = response.data;
    
                }).catch(error => {
                    this.errors = error.response.data;
                })
            },
            deleteRole(uuid)
        {
            axios.post('/api/deleteRole/'+uuid).then(()=>{
                this.$router.push({
                    name: 'add_role'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
        ActiveRole(uuid)
        {
            axios.post('/api/activeRole/'+uuid).then(()=>{
                alert('Role Is Active Now');
                this.$router.push({
                    name: 'add_role'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
        DeactiveRole(uuid)
        {
            axios.post('/api/deactiveRole/'+uuid).then(()=>{
                alert('Role Is Deactive Now');
                this.$router.push({
                    name: 'add_role'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
        ShowRegister(uuid)
        {
            axios.post('/api/ShowRole/'+uuid).then(()=>{
                alert('Role Is Deactive Now');
                this.$router.push({
                    name: 'add_role'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
        HideRegister(uuid)
        {
            axios.post('/api/HideRole/'+uuid).then(()=>{
                alert('Role Is Hide While Register User');
                this.$router.push({
                    name: 'add_role'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        },
        },
        mounted() {
    
            console.log(this.loadData());
            console.log(this.getUsers());
            document.title = "Physio App | All Feature";  
        }
    }
    </script>
    