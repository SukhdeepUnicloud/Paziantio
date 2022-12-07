<template>
	<navbar></navbar>

	<div class="wrapper d-flex flex-column flex-row-fluid container-xxl" id="kt_wrapper">
		

		<div class="content flex-row-fluid" id="kt_content">
			<!--begin::Basic info-->
			<div class="card mb-5 mb-xl-10">
								<!--begin::Card header-->
								<div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
									<!--begin::Card title-->
									<div class="card-title m-0">
										<h3 class="fw-bold m-0">Profile Details</h3>
									</div>
									<!--end::Card title-->
								</div>
								<!--begin::Card header-->
								<!--begin::Content-->
								<div id="kt_account_settings_profile_details" class="collapse show">
									<!--begin::Form-->
									<form @submit="formSubmit" enctype="multipart/form-data">
										<!--begin::Card body-->
										<div class="card-body border-top p-9">
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Image input-->
													<div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('assets/media/svg/avatars/blank.svg')">
														<!--begin::Preview existing avatar-->
														
														<!--end::Preview existing avatar-->
														<!--begin::Label-->
													
														<img class="image-input-wrapper w-125px h-125px"  :src="'./assets/app/public/user_profiles/'+loggedUser.id+'/users/avatar/'+loggedUser.image+''" alt="image" />
														<label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar" data-kt-initialized="1">
															<i class="bi bi-pencil-fill fs-8"></i>
															<!--begin::Inputs-->
															<input  type="file" class="form-control" v-on:change="onChange">
															<input type="hidden" name="avatar_remove">
															<!--end::Inputs-->
														</label>
														<!--end::Label-->
														<!--begin::Cancel-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-kt-initialized="1">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Cancel-->
														<!--begin::Remove-->
														<span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar" data-kt-initialized="1">
															<i class="bi bi-x fs-2"></i>
														</span>
														<!--end::Remove-->
													</div>
													<!--end::Image input-->
													<!--begin::Hint-->
													<div class="form-text">Allowed file types: png, jpg, jpeg.</div>
													<!--end::Hint-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->
											<!--begin::Input group-->
											<div class="row mb-6">
												<!--begin::Label-->
												<label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
												<!--end::Label-->
												<!--begin::Col-->
												<div class="col-lg-8">
													<!--begin::Row-->
													<div class="row">
														<!--begin::Col-->
														<div class="col-lg-6 fv-row fv-plugins-icon-container">
															<input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="First name"  v-model="loggedUser.firstname">
															<div v-for="(errorArray, index) in errors" :key="index">
															<div class="text-danger" v-if="errorArray.firstname	 != null">
															{{errorArray.firstname	}}
															</div>
															</div>
													</div>
														<!--end::Col-->
														<!--begin::Col-->
														<div class="col-lg-6 fv-row fv-plugins-icon-container">
															<input type="text"  class="form-control form-control-lg form-control-solid" placeholder="Last name" v-model="loggedUser.lastname">
															<div v-for="(errorArray, index) in errors" :key="index">
															<div class="text-danger" v-if="errorArray.firstname	 != null">
															{{errorArray.lastname	}}
															</div>
															</div>
														</div>
														<!--end::Col-->
													</div>
													<!--end::Row-->
												</div>
												<!--end::Col-->
											</div>
											<!--end::Input group-->

											<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Phone</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="Phone" v-model="loggedUser.phone">
										<div v-for="(errorArray, index) in errors" :key="index">
															<div class="text-danger" v-if="errorArray.phone	 != null">
															{{errorArray.phone	}}
															</div>
															</div>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">
									<span class="required">Mobile</span>
									<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
										aria-label="Phone number must be active" data-kt-initialized="1"></i>
								</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row fv-plugins-icon-container">
									<input type="tel" class="form-control form-control-lg form-control-solid"
										placeholder="Mobile" v-model="loggedUser.mobile">
										
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Street</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="Street" v-model="loggedUser.street">
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Street No</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="Street No" v-model="loggedUser.street_no">
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Postalcode</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="Street No" v-model="loggedUser.postalcode">
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">City</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="City" v-model="loggedUser.city">
										<div v-for="(errorArray, index) in errors" :key="index">
															<div class="text-danger" v-if="errorArray.city	 != null">
															{{errorArray.city	}}
															</div>
															</div>
								</div>
								<!--end::Col-->
							</div>
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label fw-semibold fs-6">Country</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">
									<input type="text" class="form-control form-control-lg form-control-solid"
										placeholder="Country" v-model="loggedUser.country">
										<div v-for="(errorArray, index) in errors" :key="index">
															<div class="text-danger" v-if="errorArray.country	 != null">
															{{errorArray.country	}}
															</div>
															</div>
								</div>
								<!--end::Col-->
							</div>
							<!--end::Input group-->
							<div class="row mb-6">
								<!--begin::Label-->
								<label class="col-lg-4 col-form-label required fw-semibold fs-6">Two Factor
									Authentication</label>
								<!--end::Label-->
								<!--begin::Col-->
								<div class="col-lg-8 fv-row">


									<div class="form-check form-check-custom form-check-solid">

										<div v-if="this.loggedUser.two_factor == 1">

											<input class="form-check-input" type="radio"
												v-model="this.loggedUser.two_factor" value="1" name="two_factor"
												checked />
											<label class="form-check-label" for="flexCheckboxLg">
												Yes
											</label>&nbsp;&nbsp;

										</div>

										<div v-else>

											<input class="form-check-input" type="radio"
												v-model="this.loggedUser.two_factor" value="1" name="two_factor" />
											<label class="form-check-label" for="flexCheckboxLg">
												Yes
											</label>&nbsp;&nbsp;

										</div>

										<div v-if="this.loggedUser.two_factor == 0">

											<input class="form-check-input" type="radio"
												v-model="this.loggedUser.two_factor" value="0" name="two_factor"
												checked />
											<label class="form-check-label" for="flexCheckboxLg">
												No
											</label>

										</div>

										<div v-else>

											<input class="form-check-input" type="radio"
												v-model="this.loggedUser.two_factor" value="0" name="two_factor" />
											<label class="form-check-label" for="flexCheckboxLg">
												No
											</label>

										</div>
									</div>	
								
									</div>
									</div>
										</div>
										<!--end::Card body-->
										<!--begin::Actions-->
										<div class="card-footer d-flex justify-content-end py-6 px-9">
									
											<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Update</button>
										</div>
										<!--end::Actions-->
									<input type="hidden"></form>
									<!--end::Form-->
								</div>
								<div id="kt_account_settings_deactivate" class="collapse show">
    <!--begin::Form-->
    <div class="card-body border-top p-9">
        <!--begin::Notice-->
        <div
            class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
            <!--begin::Icon-->
            <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10"
                        fill="currentColor" />
                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                        fill="currentColor" />
                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
            <!--end::Icon-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack flex-grow-1">
                <!--begin::Content-->
                <div class="fw-semibold">
                    <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>
                    <div class="fs-6 text-gray-700">For extra security, this requires you to confirm
                        your email or phone number when you reset you sign password.
                        <br />
                        <a class="fw-bold" href="#">Learn more</a>
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Notice-->
        <div class="row mb-6">

            <div class="col-lg-6">
                <!--begin::Row-->
                <div class="row">
                    <!--begin::Col-->
                    <div class="col-lg-12 fv-row">
                        <input type="password" name="password"
                            class="form-control form-control-lg form-control-solid"
                            placeholder="Enter Your Password For deactivate Account"
                            v-model="this.item.password" />

                        <!--end::Col-->

                        <div v-for="(errorArray, index) in errors" :key="index">
                            <div class="text-danger" v-if="errorArray.password != null">
                                The Password Field is Required
                            </div>
                        </div>

                        <div v-for="(errorArray, index) in errors" :key="index">
                            <div class="text-danger" v-if="errorArray.agree != null">
                                The Agree Field is Required
                            </div>
                        </div>

                        <div v-for="(errorArray, index) in errors" :key="index">
                            <div class="text-danger" v-if="errorArray.error != null">
                                You Entered Wrong Password
                            </div>
                        </div>

                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Col-->
            </div>
            <!--begin::Form input row-->
            <div class="form-check form-check-solid fv-row mt-4">
                <input name="agree" class="form-check-input" type="checkbox" value="yes"
                    v-model="this.item.agree" />
                <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my
                    account deactivation</label>
            </div>
            <!--end::Form input row-->
        </div>
        <!--end::Card body-->
        <!--begin::Card footer-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button id="kt_account_deactivate_account_submit" type="submit"
                class="btn btn-danger fw-semibold" @click="deactivateAcc">Deactivate
                Account</button>
        </div>
        <!--end::Card footer-->
    </div>
    <!--end::Content-->
</div>
<!--end::Deactivate Account-->
								<!--end::Content-->
							</div>
		</div>

	</div>

	<div class="container-xxl">
		<dashboard_footer> </dashboard_footer>
	</div>
</template>
<script>
import axios from 'axios';

export default {
	data() {
		return {
			saving: false,
			loggedUser: {
        image: "",
		firstname: "",
		lastname:"",
		phone:"",
		mobile:"",
		street:"",
		street_no:"",
		postalcode:"",
		city:"",
		country:"",
		two_factor:"",
        },
		
			
			loggedUser: [],
			item: {

				'password': '',
				'agree': ''
			},
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
                data.append('firstname', this.loggedUser.firstname);
                data.append('lastname',this.loggedUser.lastname);
                data.append('phone',this.loggedUser.phone);
                data.append('mobile',this.loggedUser.mobile);
                data.append('street',this.loggedUser.street);
                data.append('street_no',this.loggedUser.street_no);
                data.append('postalcode',this.loggedUser.postalcode);
                data.append('city',this.loggedUser.city);
                data.append('country',this.loggedUser.country);
                data.append('two_factor',this.loggedUser.two_factor);
				axios.post('/api/editProfile/' +this.loggedUser.id,data,config)
                    .then(()=>{
                        alert('Profile Detail Update Successfully')
                this.$router.push({
                    name: 'profile'
                });
            }).catch(error=>{
                this.errors = error.response.data;
            })
            },
		currentUserData: function () {
			axios.get('/api/currentUserInfo').then((response) => {

				this.loggedUser = response.data;

			}).catch(error => {
				this.errors = error.response.data;

			})
		},
		deactivateAcc() {

			axios.post('/api/deactivateProfile', this.item).then(() => {

				console.log('saved');

				this.$router.push({ name: 'login' });

			}).catch(error => {
				this.errors = error.response.data;
			})

		}


	},
	mounted() {
		console.log(this.currentUserData());
	}
}
</script>