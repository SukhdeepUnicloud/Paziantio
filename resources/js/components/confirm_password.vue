<template>
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
					<a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve
					interviewed
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
					<div class=" mb-10">
						<!--begin::Title-->
						<h1 class="text-dark fw-bolder mb-3">Setup New Password</h1>
						<!--end::Title-->
						<!--begin::Link-->
						<div class="text-gray-500 fw-semibold fs-6">Have you already reset the password ?
							<router-link to="/login" class="link-primary fw-bold">Sign in</router-link>
						</div>
						<!--end::Link-->
					</div>
					<p></p>

					<input type="text" class="form-control" name="token" v-model="item.token">

					<input id="email" class="form-control" type="email"   v-model="item.email" autofocus>


					<div v-for="(errorArray, index) in errors" :key="index">
						<div class="text-danger" v-if="errorArray.email != null">
							The Email Field is Required
						</div>
					</div>

					<p></p>
					<input id="password" placeholder='Password' type="password" class="form-control" name="password"
						autocomplete="new-password" v-model="item.password">

					<p></p>

					<div v-for="(errorArray, index) in errors" :key="index">
						<div class="text-danger" v-if="errorArray.password != null">
							The Password Field is Required
						</div>
					</div>


					<input id="password-confirm" placeholder='Confirm Password' type="password" class="form-control"
						name="password_confirmation" autocomplete="new-password" v-model="item.confirm_password">

					<div v-for="(errorArray, index) in errors" :key="index">
						<div class="text-danger" v-if="errorArray.confirm_password != null">
							The Confirm Password Field is Required
						</div>
					</div>
					<p></p>
					<div class="row mb-0">
						<div class="col-md-6 ">
							<button type="submit" class="btn btn-primary" @click="save">
								Update Password
							</button>
						</div>
					</div>

					<!--begin::Link-->
					<p></p>
					<div class="text-gray-500 fw-semibold fs-6">If you not received email sent again ?
						<router-link to="/forget_password" class="btn btn-link link-primary" @click="sendMail">Send Email</router-link>
					</div>
				</div>
				<!--end::Content-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Body-->
	</div>
</template>
<script>
import axios from 'axios';

export default {
	data() {
		return {

			errors: "",			
			item: {
				token: "",
				email: "",
				password: "",
				confirm_password: ""
			}
		}
	},
	methods: {
		save() {
			axios.post('/api/update_password', this.item).then(response => {
				if(response.data==1)
				{
					alert('Password Update Successfully')
				}
				else
				{
					alert('Detail NoT Matched')
				}

	})
.catch(error => {
this.errors = error.response.data;
});
		},
		sendMail() {
			axios.post('/api/forgetPassword', this.item).then(() => {



			})
		}
	},
	mounted() {
		console.log('Component mounted.')
	}
}

</script>