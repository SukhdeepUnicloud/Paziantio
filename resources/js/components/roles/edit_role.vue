<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">Edit Role </h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="../../demo19/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
                        
                    </li>
                    <!--end::Item-->
               
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
    
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
                            <h3 class="fw-bold m-0">Role Details</h3>
                            
                        </div>
                        <!--end::Card title-->
                        <!--begin::Action-->
                       
                        <!--end::Action-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Card body-->
                    <form @submit.prevent="save">
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Role</label>
                            <div class="col-lg-8">
                                <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.role.name" />
                            </div>
                        </div>
                        <!--end::Row-->

                        
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
     
            uuid: this.$route.params.uuid,
            role: {
                name: "",
              
               
            }
        }
    },
    methods: {
        save() {
            const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
            axios.post('/api/updateRole/'+ this.$route.params.uuid,this.role,config).then(() => {
                alert('Upadate Successfully');
                console.log('saved');
                this.$router.push({
                    name: 'all_role'
                });
            }).catch(error => {
                this.errors = error.response.data;
            })

        }
    },
    async mounted() {
    console.log('Component mounted.')
    document.title = "Pazientio App | Edit Role";  
    let myid = this.$route.params.uuid;
   const result = await axios.get("/api/editRole/"+myid);
    this.role=result.data;
     console.log(result);
console.log(myid);
}
    
}
</script>
