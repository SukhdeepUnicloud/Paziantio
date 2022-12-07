<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{ $t("add_company") }}</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">{{ $t("Home") }}</router-link>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">{{ $t("company") }}</li>
                    <!--end::Item-->
                 
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-1">
                <!--begin::Button-->
                <router-link to="/all_companies" class="btn btn-primary btn-md align-self-center">{{ $t("all_company") }}</router-link>
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
                            <h3 class="fw-bold m-0">{{ $t("company_details") }}</h3>
                        </div>
                        <!--end::Card title-->
                       
                    </div>
                    <!--begin::Card header-->
                    <form @submit="formSubmit" enctype="multipart/form-data">
                    <!--begin::Card body-->
                    <div class="card-body p-9">
                        <!--begin::Row-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Name</label>
                            <div class="col-lg-8">
                                <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                <input type="text" v-model="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Full name" />
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
                                <textarea v-model="description" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" rows="4" cols="50"> </textarea>
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
                            <label class="col-lg-4 fw-semibold text-muted required">Address Street</label>
                            <div class="col-lg-8">
                                <input type="text" v-model="address_street" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address Street" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.address_street != null">
                                    {{errorArray.address_street}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Address Street No</label>
                            <div class="col-lg-8">
                                <input type="text" v-model="address_street_no" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address Street No" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.address_street_no != null">
                                    {{errorArray.address_street_no}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Address Postal Code</label>
                            <div class="col-lg-8">
                                <input type="text" v-model="address_street_postalcode" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address Postal Code" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.address_street_postalcode != null">
                                    {{errorArray.address_street_postalcode}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Address City</label>
                            <div class="col-lg-8">
                                <input type="text" v-model="address_city" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Address City" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.address_city != null">
                                    {{errorArray.address_city}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Phone </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="phone" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Phone" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.phone != null">
                                    {{errorArray.phone}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Vat No </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="vat_no" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Vat No" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.vat_no != null">
                                    {{errorArray.vat_no}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Tax No </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="tax_no" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Tax No" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.tax_no != null">
                                    {{errorArray.tax_no}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                      
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Logo </label>
                            <div class="col-lg-8">
                                <input type="file" class="form-control" v-on:change="onChange">
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.logo != null">
                                    {{errorArray.logo}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Website </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="website" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Website" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.website != null">
                                    {{errorArray.website}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Company Type </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="company_type"  class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Company Type" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.company_type != null">
                                    {{errorArray.company_type}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Register </label>
                            <div class="col-lg-8">
                                <input type="text" v-model="register" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Register" />
                                <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.register != null">
                                    {{errorArray.register}}
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Input group-->
                        
                        
                        
                    
                        <!--end::Notice-->
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
            allUsers: [],
                file: "",
                success: "",
                name: "",
                description: "",
                address_street: "",
                address_street_no: "",
                address_street_postalcode: "",
                address_city:"",
                phone:"",
                vat_no:"",
                tax_no:"",
                logo:"",
                website:"",
                company_type:"",
                register:"",
                errors: null,
        }
    },
    methods: {
        onChange(e) {
                this.file = e.target.files[0];
            },
            formSubmit(e) {
                e.preventDefault();
                let existingObj = this;
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data'
                    }
                }
                let data = new FormData();
                data.append('file', this.file);
                data.append('name', this.name);
                data.append('description',this.description);
                data.append('address_street',this.address_street);
                data.append('address_street_no',this.address_street_no);
                data.append('address_street_postalcode',this.address_street_postalcode);
                data.append('address_city',this.address_city);
                data.append('phone',this.phone);
                data.append('vat_no',this.vat_no);
                data.append('tax_no',this.tax_no);
                data.append('website',this.website);
                data.append('company_type',this.company_type);
                data.append('register',this.register);
                axios.post('/api/addcompany', data,config)
                    .then(()=>{
                        alert('Company Create Successfully')
                this.$router.push({
                    name: 'all_companies'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
            }
       
    },
    mounted() {
        console.log('Component mounted.')
        document.title = "Physio App | Add Company";  
    }
}
</script>

