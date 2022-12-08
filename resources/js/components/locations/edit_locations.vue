<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">Edit {{location.name}} Location </h1>
                <!--end::Title-->
 <!--begin::Breadcrumb-->
 <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Home</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Location</li>
                    <!--end::Item-->
                 
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Daterange-->
                <router-link to="/all_locations" class="btn btn-primary btn-sm align-self-center">All Location</router-link>                <!--end::Daterange-->
                <!--begin::Filter-->
                <!--end::Filter-->
                <!--begin::Button-->
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
                            <h3 class="fw-bold m-0">{{location.name}} Details</h3>
                        </div>
                        <!--end::Card title-->
                        
                    </div>
                    <!--begin::Card header-->
                    <form @submit.prevent="save">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Name</label>
                            <div class="col-lg-8">
                                <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.name" />
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Description</label>
                            <div class="col-lg-8">
                                <textarea class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="4" cols="50" v-model="this.location.description"> </textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Address Street</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.address_street" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Address Street No</label>
                            <div class="col-lg-8">
                                <input type="text" name="address_street_no" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.address_street_no" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Address Postal Code</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.address_postalcode" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Address City</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.address_city" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Phone </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.location.phone" />
                            </div>
                        </div>
                        <!--end::Input group-->
                        
                    </div>
                    <!--end::Card body-->
                    <!--begin::Card Footer-->
					<div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="submit" class="btn btn-primary" >Update Location </button>
                    </div>

                </form>
                    <!--end::Card Footer-->

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
            all_locations: [],
        
            location: {
                name: "",
                description: "",
                address_street: "",
                address_street_no: "",
                address_postalcode: "",
                address_city: "",
                phone: ""           
            }
        }
    },
    methods: {
        save() {
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
            axios.post('/api/updateLocation/'+ this.$route.params.uuid,this.location,config).then(() => {
                toastr.success('Update Successfully');
                console.log('saved');
                this.$router.push({
                    name: 'all_locations'
                });
            }).catch(error => {
                this.errors = error.response.data;
            })

        }
    },
    async mounted() {
    console.log('Component mounted.')
    document.title = "Pazientio App | Edit Locations";  
    let myid = this.$route.params.uuid;
    const result = await axios.get("/api/editLocation/"+myid);
    this.location=result.data;
    console.log(result);
console.log(myid)
}
    
}
</script>
