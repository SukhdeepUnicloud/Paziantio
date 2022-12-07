<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
           <!--begin::Toolbar-->
           <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">Add Role</h1>
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
                <router-link to="/all_role" class="btn btn-primary btn-sm align-self-center">All Role</router-link>
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
                            <h3 class="fw-bold m-0">Role Details</h3>
                        </div>
                        
                    </div>
                    <!--begin::Card header-->
                    <form @submit.prevent="save">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Add Role</label>
                            <div class="col-lg-8">
                                <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                <input required type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="" v-model="this.role.name" />
                              

                                <div v-for="(errorArray, index) in notifmsg" :key="index">
								<div class="text-danger" v-if="errorArray.name != null">
									This Role Already Created
								</div>
							</div>


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
            notifmsg: '',
            user: [],
            role: {
                name: "",
                
            }
        }
    },
    methods: {
        save() {
            axios.post('/api/addrole', this.role).then(() => {
                alert('Role Create Successfully');
                console.log('saved');
                this.$router.push({
                    name: 'all_role'
                });

            }).catch(error => {
                this.notifmsg = error.response.data;
            })
        }
    },
    mounted() {
        console.log('Component mounted.')
        document.title = "Physio App | Add Role ";  
    }
}
</script>

