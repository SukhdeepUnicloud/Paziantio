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
                            <label class="col-lg-4 fw-semibold text-muted required">Select Table Where You Want to Add</label>
                            <div class="col-lg-8">
                              <h3>Data Tables</h3>
                                <span v-for="tables in alltables" :key="tables.name">
                                <label class="upper" :for="tables">{{tables}}  <input type="radio" name="table" :id="tables" :value="tables" v-model="myvalue.tablename"></label>&nbsp;
                                </span>
                           
                            </div>
                         </div>
                         <div class="row mb-7">
                           
                            <label class="col-lg-4 fw-semibold text-muted required">Select Colum you Want to Add</label>
                            <div class="col-lg-8">
                            
                              
                                <span >
                              </span>

                                <span v-for="mydatas in mykey"  :key="mydatas.name">
                                <label :for="mydatas.key">{{mydatas.key}}  <input type="checkbox" :id="mydatas.key" :value="mydatas.key" v-model="myvalue.tablecolum"></label>&nbsp;
                                </span>
                            </div>
                         </div>


                      </div>
                      
                      <!--end::Card body-->
                      <!--begin::Card Footer-->
                      <div class="card-footer d-flex justify-content-end py-6 px-9">
                         <button type="submit" class="btn btn-primary">Submit </button>
                      </div>
                   </form> 
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                     
                     <thead>
                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                           <th class="min-w-125px">Name {{ValidData}} </th>
                           <th class="min-w-125px">Email</th>
                           <th class="min-w-125px">Phone</th>
                           <th class="min-w-125px">City</th>
                           <th class="min-w-125px">Phone</th>
                           <th class="min-w-125px">Gender</th>
                           <th class="min-w-125px">Age</th>
                        </tr>
                     </thead>
                     <tbody class="text-gray-600 fw-semibold">
                        <tr v-for="users in getdata" :key="users.id">
                           <td><span> {{users.data.name}}</span></td>
                           <td><span> {{users.data.email}}</span></td>
                           <td><span> {{users.data.phone}}</span></td>
                           <td><span> {{users.data.city}}</span></td>
                  
                      
                          </tr>
                     </tbody>
                  </table>

           
                  
                      
                    
                        

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
                colums:[],
                formname:[],
                alltables:[],
                mykey:[],
                myvalue:{
                    tablename:"",
                    tablecolum:[]
                }
                
             
            }
        },
        methods: {
            save() {
                axios.post('/api/createTableColumns', this.myvalue).then(
                  alert('Coloums Add Sucessfully')
                ).catch(error => {
        this.errors = error.response.data;
    })
            },
            
    
        },
        async mounted() {
    
        document.title = "Pazientio App | Edit Locations";  
        let access_token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7Il9pZCI6IjYzODg3ZmYwOGM0NGRmODg0NTYwNTc1MiIsInJvbGVzIjpbIjU1Y2Q1YzNjYTUxYTk2YmVmOTllZjU1MSJdfSwiZm9ybSI6eyJfaWQiOiI1NTNkYjk0ZTcyZjcwMmU3MTRkZDk3NzkiLCJwcm9qZWN0IjoiNTUzZGI5MmY3MmY3MDJlNzE0ZGQ5Nzc4In0sInByb2plY3QiOnsiX2lkIjoiNTUzZGI5MmY3MmY3MDJlNzE0ZGQ5Nzc4In0sImlhdCI6MTY2OTg5MDUyNiwiZXhwIjoxNzA2MTc4NTI2fQ.85xI1RxfvcA2SUoPV-g_tBv_TR0T9Uh0TozYxp232oE';
        const result = await axios.get("https://vbhpcbywdjdtqwe.form.io/applicationtesting/submission/", {
            headers: {
                'x-jwt-token': access_token
            }
          })
         
          this.getdata=result.data;
          const RegistedUser = result.data;
          this.datacolum = RegistedUser[0].data;
          const keys = Object.keys(this.datacolum);
          this.colums = keys;  
          const getTables = await axios.get("/api/getalltables/");
          this.alltables = getTables.data;
          const formname = await axios.get("https://vbhpcbywdjdtqwe.form.io/form/638ddb6cfe415dd611474601/", {
            headers: {
                'x-jwt-token': access_token
            }
          })
          this.formname = formname.data;
          this.mykey = this.formname.components;
     

    
    }
    }
 </script>
 <style>
.upper{text-transform: uppercase;}
</style>