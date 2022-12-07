<template>
    <navbar> </navbar>
    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
       <!--begin::Toolbar-->
       <div class="toolbar d-flex flex-stack flex-wrap py-4 gap-2" id="kt_toolbar">
          <!--begin::Page title-->
          <div class="page-title d-flex flex-column align-items-start me-3 gap-1">
             <!--begin::Title-->
             <h1 class="d-flex text-dark fw-bold m-0 fs-3">Form Submission Data </h1>
             <!--end::Title-->
             <!--begin::Breadcrumb-->
             <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7">
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">
                   <a href="../../demo19/dist/index.html" class="text-gray-600 text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-gray-600">Form</li>
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
                <!--begin::Card body-->
                <div class="card-body p-9">
                   <form @submit.prevent="save">
                      <!--begin::Card body-->
                      <div class="card-body p-9">
                         <!--begin::Row-->
                         <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted required">Name</label>
                            <div class="col-lg-8">
                               <!-- <span class="fw-bold fs-6 text-gray-800">Max Smith</span> -->
                                
                                  
                           
                               <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" v-model="this.colums" />
                            </div>
                         </div>
                         <!--end::Row-->
                      </div>
                      <!--end::Card body-->
                      <!--begin::Card Footer-->
                      <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <button type="submit" class="btn btn-primary">Submit </button>
                      </div>
                   </form>
                   <!--end::Card Footer-->
                   <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                      <thead>
                         <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                            <th class="min-w-125px">Name</th>
                            <th class="min-w-125px">Email</th>
                            <th class="min-w-125px">Country</th>
                            <th class="min-w-125px">City</th>
                            <th class="min-w-125px">Phone</th>
                            <th class="min-w-125px">Gender</th>
                            <th class="min-w-125px">Age</th>
                         </tr>
                      </thead>
                      <tbody class="text-gray-600 fw-semibold">
                         <tr v-for="users in RegistedUser" :key="users.id">
                            <td><span> {{users.data.name}}</span></td>
                            <td><span> {{users.data.email}}</span></td>
                            <td><span> {{users.data.country}}</span></td>
                            <td><span> {{users.data.city}}</span></td>
                            <td><span> {{users.data.phoneNumber}}</span></td>
                            <td><span> {{users.data.gender}}</span></td>
                            <td><span> {{users.data.age}}</span></td>
                         </tr>
                      </tbody>
                   </table>
              
                   <div class="row">
        <div class="col-md-6">
    
           
           
         
        </div>
        <div class="col-md-6">
        </div>
    </div>
                           
                </div>
                
                <!--end::Card body-->
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
                users:[],
                getColumns:[],
                RegistedUser: [],
             
            }
        },
        methods: {
            save() {
                axios.post('/api/createTableColumns', this.colums).then((response) => {
        alert('Your Feilds Are Created Sucessfully');
        console.log(response.data);
    
    }).catch(error => {
        this.errors = error.response.data;
    })
            },
            
    
        },
        async mounted() {
    
        document.title = "Pazientio App | Edit Locations";  
        let access_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7Il9pZCI6IjYzODg3ZmYwOGM0NGRmODg0NTYwNTc1MiIsInJvbGVzIjpbIjU1Y2Q1YzNjYTUxYTk2YmVmOTllZjU1MSJdfSwiZm9ybSI6eyJfaWQiOiI1NTNkYjk0ZTcyZjcwMmU3MTRkZDk3NzkiLCJwcm9qZWN0IjoiNTUzZGI5MmY3MmY3MDJlNzE0ZGQ5Nzc4In0sInByb2plY3QiOnsiX2lkIjoiNTUzZGI5MmY3MmY3MDJlNzE0ZGQ5Nzc4In0sImlhdCI6MTY2OTg5MDUyNiwiZXhwIjoxNzA2MTc4NTI2fQ.85xI1RxfvcA2SUoPV-g_tBv_TR0T9Uh0TozYxp232oE';
        const result = await axios.get("https://vbhpcbywdjdtqwe.form.io/feedbackform/submission/", {
            headers: {
                'x-jwt-token': access_token
            }
          })
          const RegistedUser = result.data;
          this.datacolum = RegistedUser[0].data;
          const keys = Object.keys(this.datacolum);
          this.colums = keys;     
          const addcoulums =  this.colums;    
          let myid = 'roles';
          const getColumns = await axios.get("/api/getTableColumns/"+myid);
          this.coloums= getColumns.data 
      
    
    }
    }
 </script>