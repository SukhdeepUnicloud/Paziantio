<template>
  <navbar> </navbar>

  <!--begin::Wrapper-->
  <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
      <!--begin::Toolbar-->
      <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
          <!--begin::Page title-->
          <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
              <!--begin::Title-->
              <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{$t("add_feature")}}</h1>
              <!--end::Title-->
             <!--begin::Breadcrumb-->
             <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-gray-600">
                      <router-link to="/dashboard" class="text-gray-600 text-hover-primary">{{$t("Home")}}</router-link>
                  </li>
                  <!--end::Item-->
                  <!--begin::Item-->
                  <li class="breadcrumb-item text-gray-600">{{$t("feature")}}</li>
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

              <!--end::Filter-->
              <!--begin::Button-->
              <router-link to="/all_feature" class="btn btn-primary btn-md align-self-center">{{$t("all_feature")}}</router-link>
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
                          <h3 class="fw-bold m-0">{{$t("feature_detail")}}</h3>
                      </div>
                      
                      <button v-on:click="datas()" class="btn btn-success btn-sm"> Click me</button>
                  </div>
            
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
          allfeatures: [],
          feature: {
              name: "",
              description: ""          
          },
          errors: null,
      }
  },
  methods: {
    datas()
    {
      return toastr.info('Hellow Deep');
    },


      save() {
          axios.post('/api/addfeature', this.feature).then(() => {
            
              toast.success(`Hey! I'm here`);
              console.log('saved');
              this.$router.push({
                  name: 'all_feature'
              });

          }).catch(error => {
              this.errors = error.response.data;
          })
      }
  },
  mounted() {
      console.log('Component mounted.')
      document.title = "Physio App | Add Feature ";  
  }
}
</script>
