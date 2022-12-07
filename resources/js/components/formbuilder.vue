<template>
    <navbar> </navbar>

    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
        <!--begin::Toolbar-->
        <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">Csustom Feild Form </h1>
                <!--end::Title-->
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                    <!--begin::Item-->  
                    <li class="breadcrumb-item text-gray-600">
                        <router-link to="/dashboard" class="text-gray-600 text-hover-primary">Custom</router-link>
                    </li>
             
                    <li class="breadcrumb-item text-gray-600">Rooms</li>
                 
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
                  <div class="card-body p-9">
                  <div id="formio"></div>
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
  