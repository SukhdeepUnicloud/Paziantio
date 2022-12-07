<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{ $t("add_room") }} </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="../../demo19/dist/index.html" class="text-gray-600 text-hover-primary">{{ $t("Home") }}</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">{{ $t("room") }}</li>
                    <!--end::Item-->
 
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <router-link to="/all_rooms" class="btn btn-primary btn-md align-self-center">{{$t("all_room")}}</router-link> 
                <!--end::Button-->
            </div>
            <!--end::Actions-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Main-->
        <div class="d-flex flex-row flex-column-fluid align-items-stretch">
            <!--begin::Content-->
            <div class="content flex-row-fluid" id="kt_content">
                <!--begin::details View-->
                <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                    <!--begin::Card header-->
                    <div class="card-header cursor-pointer">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">{{$t("room_details")}}</h3>
                        </div>
                        <!--end::Card title-->
                     
                    </div>
                    <!--begin::Card header-->
                    <form @submit.prevent="save">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">
								<span class="required">Company</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
									title="Country of origination"></i>
							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
                                <div>
                                    <td><span> </span></td>
                                   
                                </div>
                                
								<select aria-label="Select a Country" data-control="select2"
									data-placeholder="Select Company"
									class="form-select form-select-solid form-select-lg fw-semibold" v-model="this.rooms.company_id">
									<option v-for="companies in All_companies" :value="companies.uuid" :key="companies.id">{{ companies.name }}</option>
								</select>
                               
							</div>
							<!--end::Col-->

						</div>


                        <div class="row mb-7">
							<!--begin::Label-->
							<label class="col-lg-4 col-form-label fw-semibold fs-6">
								<span class="required">Locations</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
									title="Country of origination"></i>
							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-8 fv-row">
                                <div>
                                    <td><span> </span></td>
                                   
                                </div>
                                
								<select aria-label="Select a Country" data-control="select2"
									data-placeholder="Select Locations"
									class="form-select form-select-solid form-select-lg fw-semibold" v-model="this.rooms.location_id">

									<option v-for="locations in All_locations" :value="locations.uuid" :key="locations.id">{{ locations.name }}</option>
								</select>
                                
							</div>
							<!--end::Col-->

						</div>
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Name</label>
                            <div class="col-lg-8">
                                <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                <input type="text"  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.rooms.name" />

                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.name != null">
                                    {{errorArray.name}}
                                </div>
                                </div>

                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Description</label>
                            <div class="col-lg-8">
                                <textarea  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="4" cols="50" v-model="this.rooms.description"> </textarea>
                                
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.description != null">
                                    {{errorArray.description}}
                                </div>
                                </div>
                                
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Capacity </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.rooms.capacity" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.capacity != null">
                                    {{errorArray.capacity}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                     
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card Footer-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" id="">Submit </button>
                    </div>
                    <!--end::Card Footer-->
                </form>
                </div>
                <!--end::details View-->              
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

<script>
import axios from 'axios';

export default {
    data() {
        return {
        user: [],
        companies: [],
        All_companies: [],
        locations: [],
        All_locations: [],
            rooms: {
                company_id:"",
                location_id:"",
                name: "",
                description: "",
                capacity: ""
            },
            errors: null,
            
        }
    },
    methods: {
        save() {
            axios.post('/api/addrooms', this.rooms).then(() => {
                alert('Room Create Successfully');
                console.log('saved');
                this.$router.push({
                    name: 'all_rooms'
                });
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        getCompanies: function () {
            axios.get('/api/companies').then((response) => {
                this.All_companies = response.data;
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        getLocations: function () {
            axios.get('/api/locations').then((response) => { 
                this.All_locations = response.data;   
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
    },
    mounted() {
        console.log(this.getCompanies());
        console.log(this.getLocations());
        console.log('Component mounted.')
        document.title = "Physio App | Add Rooms";  
    }
}
</script>
