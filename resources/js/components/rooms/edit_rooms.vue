<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">Add Room </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="../../demo19/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Room</li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-500">Overview</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
             
                <!--begin::Filter-->
          
                <!--begin::Button-->
                <router-link to="/all_rooms" class="btn btn-primary btn-sm align-self-center">All Rooms</router-link> 
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
                            <h3 class="fw-bold m-0">Room Details</h3>
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
                                <input type="text"  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.rooms.name" />
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Description</label>
                            <div class="col-lg-8">
                                <textarea  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="4" cols="50" v-model="this.rooms.description"> </textarea>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Capacity </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="rooms.capacity" />
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
            all_locations: [],
            rooms: {
                name: "",
                description: "",
                capacity: ""
            }
        }
    },
    methods: {
        save() {
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
            axios.post('/api/updateRooms/'+ this.$route.params.uuid,this.rooms,config).then(() => {
                toastr.success('Update Successfully');
                this.$router.push({
                    name: 'all_rooms'
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
    const result = await axios.get("/api/editRooms/"+myid);
    this.rooms=result.data;
    console.log(result);
console.log(myid);
}
}
</script>
