<template>
    <navbar></navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">All Company</h1>
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Home</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Company</li>
                    <!--end::Item-->
                </ul>
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">             
                <router-link to="/add_company" class="btn btn-primary btn-md align-self-center"><i class="fa fa-plus"></i>Add Company</router-link>
                
                <!--begin::Filter-->
                <div class="me-2">
                    <!--begin::Menu-->
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
                    <!--begin::Card body-->
                    <div class="card-body py-4">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="compny_datatable">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-125px">Logo</th>
                                    <th class="min-w-125px">Street</th>
                                    <th class="min-w-125px">Street No</th>
                                    <th class="min-w-125px">Postalcode</th>
                                    <th class="min-w-125px">City</th>
                                    <th class="text-end min-w-50px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                                <!--begin::Table row-->
                                <tr v-for="companies in All_companies">
                                    <!--begin::Checkbox--> <td><span> {{ companies.name }} </span></td>  
                                    <td>
                                        <span><div  class="cursor-pointer symbol symbol-30px symbol-md-40px">
                                            <img  :src="'./assets/app/public/company_profiles/'+companies.uuid+'/users/avatar/'+companies.logo+''" alt="image" />
                                            <!-- <img :key="companies.logo" v-bind:scr="'storage/app/'+ +''" > -->
                                        </div></span>
                                    </td>
                                    <td><span> {{ companies.address_street }} </span></td>
                                    <td><span> {{ companies.address_street_postalcode }} </span></td>
                                    <td><span> {{ companies.address_city }} </span></td>
                                    <td><span> {{ companies.phone }} </span></td>
                                    <td><router-link :to="'/edit_company/' + companies.uuid" class="btn btn-sm btn-primary">Edit</router-link>&nbsp;<button class="btn btn-sm btn-danger" @click="deleteLocations(companies.uuid)">Delete </button></td>
                                </tr>
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

    </div>
    <!--end::Wrapper-->

    <div class="container-xxl">
        <dashboard_footer> </dashboard_footer>
    </div>
</template>

<style>
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
            logo: "",
            companies: [],
            All_companies: [],
            image_src: '/img/obr1.jpg',
            
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
            axios.get('/api/companies').then((response) => {
                this.All_companies = response.data;
                // console.log(response.data);
                setTimeout(() => {
                    $("#compny_datatable").DataTable({
                        // "searching": false,
                        // select: true,
                        language: {
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
        deleteLocations(uuid){
            axios.post('/api/deleteCompany/'+uuid).then(()=>{
                this.$router.push({
                    name: 'all_companies'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
        }, 
    },
    mounted() {
        console.log(this.loadData());
        console.log(this.getUsers());
        document.title = "Physio App | All Locations";  
    }    
}
</script>
    