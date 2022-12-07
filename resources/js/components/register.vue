<template>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-up -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <!--begin::Image-->
                    <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="assets/media/auth/agency.png" alt="" />
                    <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                        src="assets/media/auth/agency-dark.png" alt="" />
                    <!--end::Image-->
                    <!--begin::Title-->
                    <h1 class="text-light fs-2qx fw-bold text-center mb-7">Fast, Efficient and Productive</h1>
                    <!--end::Title-->
                    <!--begin::Text-->
                    <div class="text-light fs-base text-center fw-semibold">In this kind of post,
                        <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person
                        theyve interviewed
                        <br />and provides some background information about
                        <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their
                        <br />work following this is a transcript of the interview.
                    </div>
                    <!--end::Text-->
                </div>
                <!--end::Content-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <!--begin::Wrapper-->
                <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
                    <!--begin::Content-->
                    <div class="w-md-400px">
                        <!--begin::Form-->

                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Sign Up</h1>

                        </div>

                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Name" name="name" autocomplete="off"
                                class="form-control bg-transparent" v-model="item.name" />
                            <!--end::Email-->

                            <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.name != null">
                                    The Name Field is Required
                                </div>
                            </div>

                        </div>

                  
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="text" placeholder="Email" name="email" autocomplete="off"
                                class="form-control bg-transparent" v-model="item.email" />
                            <!--end::Email-->
                            <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.email != null">
                                    The Email Field is Required
                                </div>
                            </div>

                        </div>
                    
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="form-label required">Select Role</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select v-model="item.role" class="form-select form-select-lg form-select-solid"
                                data-control="select2" data-placeholder="Select..." data-allow-clear="true"
                                data-hide-search="true">
                             
                                <option v-for="roles in All_roles" :value="roles.name">{{ roles.name }}</option>
                            </select>
                            <!--end::Input-->

                            <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.role != null">
                                    The Role Field is Required
                                </div>
                            </div>
                        </div>

                        <!--begin::Input group-->
                        <div class="fv-row mb-8" data-kt-password-meter="true">
                            <!--begin::Wrapper-->
                            <div class="mb-1">
                                <!--begin::Input wrapper-->
                                <div class="position-relative mb-3">
                                    <input class="form-control bg-transparent" type="password" placeholder="Password"
                                        name="password" autocomplete="off" v-model="item.password" />
                                    <span
                                        class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                        data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>

                                    <div v-for="(errorArray, index) in errors" :key="index">
                                        <div class="text-danger" v-if="errorArray.password != null">
                                            The Password Field is Required
                                        </div>
                                    </div>

                                </div>

                                <!--end::Input wrapper-->
                                <!--begin::Meter-->
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                                <!--end::Meter-->
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Hint-->
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.
                            </div>
                            <!--end::Hint-->
                        </div>
                        <!--end::Input group=-->
                        <!--end::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Repeat Password-->
                            <input placeholder="Repeat Password" name="confirm_password" type="password"
                                autocomplete="off" class="form-control bg-transparent"
                                v-model="item.confirm_password" />
                            <!--end::Repeat Password-->

                            <div v-for="(errorArray, index) in errors" :key="index">
                                <div class="text-danger" v-if="errorArray.confirm_password != null">
                                    The Repeat Password Field is Required
                                </div>
                            </div>

                        </div>

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary" @click="save">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign up</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">Already have an Account?
                            <router-link to="/login">
                                <span class="link-primary fw-semibold">Sign in</span>
                            </router-link>
                        </div>

                        <!--end::Sign up-->
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->

            </div>
            <!--end::Body-->

        </div>
        <!--end::Authentication - Sign-up-->
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            errors: "",
            All_roles: [],
            item: {
                name: "",
                email: "",
                role: "",
                password: "",
                confirm_password: ""
            }
        }
    },
    methods: {
        save() {
            axios.post('/api/registerUser', this.item).then(() => {
                // console.log('saved');
                this.$router.push({
                    name: 'verify'
                });
            }).catch(error => {
                this.errors = error.response.data;
            })
        },
        getregister_roles: function () {
            axios.get('/api/Register_roles').then((response) => {

                this.All_roles = response.data;

            }).catch(error => {
                this.errors = error.response.data;
            })
        },
    },
    mounted() {
        console.log(this.getregister_roles());
        console.log('Component mounted.')

    }
}
</script>
<!--begin::Page bg image-->

<style>
body {
    background-image: url('assets/media/auth/bg10.jpeg');
}

[data-theme="dark"] body {
    background-image: url('assets/media/auth/bg10-dark.jpeg');
}
</style>
<!--end::Page bg image-->
