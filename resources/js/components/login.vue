<template>
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<!--begin::Body-->
		<div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
			<!--begin::Form-->
			<div class="d-flex flex-center flex-column flex-lg-row-fluid">
				<!--begin::Wrapper-->
				<div class="w-lg-500px p-10">
					<!--begin::Form-->

					<!--begin::Heading-->
					<div class="text-center mb-11">
						<!--begin::Title-->
						<h1 class="text-light fw-bolder mb-3">Sign In</h1>
						
					</div>
				
					<!--begin::Separator-->
				
					<div v-for="(errorArray, index) in errors" :key="index">
						<div class="text-danger mb-4 ml-4" v-if="errorArray.error != null">
							The provided credentials are incorrect.
						</div>
					</div>

					<form>
						<!--end::Separator-->
						<!--begin::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<input id="email" placeholder="Email" type="email" class="form-control bg-transparent"
								name="email" autocomplete="email" v-model="this.email" />
							<!--end::Email-->

							<div v-for="(errorArray, index) in errors" :key="index">
								<div class="text-danger" v-if="errorArray.email != null">
									The Email Field is Required
								</div>
							</div>

						</div>
						<!--end::Input group=-->
						<div class="fv-row mb-3">
							<!--begin::Password-->
							<input id="password" type="password" placeholder="password"
								class="form-control bg-transparent" name="password" autocomplete="current-password"
								v-model="this.password" />
							<!--end::Password-->

							<div v-for="(errorArray, index) in errors" :key="index">
								<div class="text-danger" v-if="errorArray.password != null">
									The Password Field is Required
								</div>
							</div>

						</div>
						<!--end::Input group=-->
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
							<div></div>
							<!--begin::Link-->
							<router-link to="/forget_password">Forgot Password ?</router-link>
							<!--end::Link-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Submit button-->
						<div class="d-grid mb-10">
							<button type="submit" class="btn btn-primary" @click="login">
								<!--begin::Indicator label-->
								<span class="indicator-label">Sign In</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->
						<!--begin::Sign up-->
						<div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?

							<router-link to="/register">
								<span class="link-primary fw-semibold">Sign Up</span>
							</router-link>
						</div>

					</form>


					<!--end::Sign up-->

					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Form-->
			<!--begin::Footer-->
			
			<!--end::Footer-->
		</div>
		<!--end::Body-->
		<!--begin::Aside-->
		<div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
			style="background-image: url(assets/media/misc/auth-bg.png)">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
				<!--begin::Logo-->
				<a href="../../demo1/dist/index.html" class="mb-0 mb-lg-12">
					<img alt="Logo" src="assets/media/logos/custom-1.png" class="h-60px h-lg-75px" />
				</a>
				<!--end::Logo-->
				<!--begin::Image-->
				<img class="d-none d-lg-block mx-auto w-275px w-md-50 w-xl-500px mb-10 mb-lg-20"
					src="assets/media/misc/auth-screens.png" alt="" />
				<!--end::Image-->
				<!--begin::Title-->
				<h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center mb-7">Fast, Efficient and
					Productive</h1>
				<!--end::Title-->
				<!--begin::Text-->
				<div class="d-none d-lg-block text-white fs-base text-center">In this kind of post,
					<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the blogger</a>introduces a person
					they’ve interviewed
					<br />and provides some background information about
					<a href="#" class="opacity-75-hover text-warning fw-bold me-1">the interviewee</a>and their
					<br />work following this is a transcript of the interview.
				</div>
				<!--end::Text-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Aside-->
	</div>

</template>

<script>
import axios from 'axios';

export default {
	data() {
		return {

			email: "",
			password: "",
			errors: ""


		}
	},
	methods: {

		login(e) {
			e.preventDefault()
			axios.get('/sanctum/csrf-cookie').then(response => {

				axios.post('/api/loginUser', {

					email: this.email,
					password: this.password

				})
					.then(response => {

						if (response.data.two_factor_auth == 0) {

							if(response.data.user_status == 1)
							{
								this.$router.push({ name: 'dashboard' });
							}

							else
							{
								this.$router.push({ name: 'deactivate' });
							}
							

						}
						else  {
							if(response.data.user_status == 1)
							{
								this.$router.push({ name: 'two_factor_auth' });
							}

							else
							{
								this.$router.push({ name: 'deactivate' });
							}
							
						}
					})
					.catch(error => {
						this.errors = error.response.data;
					});

			})

		}
	},
	mounted() {
		console.log('Component mounted.');
	}
}

</script>