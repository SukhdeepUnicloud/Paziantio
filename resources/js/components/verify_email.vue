<!-- <style>body { background-image: url('assets/media/auth/bg5.jpg'); } [data-theme="dark"] body { background-image: url('assets/media/auth/bg5-dark.jpg'); }</style> -->
<template>

	<div class="d-flex flex-column flex-root" id="kt_app_root">


		<!--begin::Page bg image-->

		<!--end::Page bg image-->
		<!--begin::Authentication - Signup Welcome Message -->
		<div class="d-flex flex-column flex-center flex-column-fluid">
			<!--begin::Content-->
			<div class="d-flex flex-column flex-center text-center p-10">
				<!--begin::Wrapper-->
				<div class="card card-flush w-lg-650px py-5">
					<div class="card-body py-15 py-lg-20">
						<!--begin::Logo-->
					
						<!--end::Logo-->
						<!--begin::Title-->
						<h1 class="fw-bolder text-gray-900 mb-5">This email <span style="color:grey">{{email}}</span> is verify now  </h1>
						<!--end::Title-->
						<!--begin::Action-->
					
						<!--end::Action-->
						<!--begin::Link-->
						<div class="mb-11">


							<router-link to="/login" class="btn btn-sm btn-primary">login Now</router-link>


						</div>
						<!--end::Link-->
						<!--begin::Illustration-->
						<div class="mb-0">
							<img src="assets/media/auth/please-verify-your-email.png"
								class="mw-100 mh-300px theme-light-show" alt="" />
							<img src="assets/media/auth/please-verify-your-email-dark.png"
								class="mw-100 mh-300px theme-dark-show" alt="" />
						</div>
						<!--end::Illustration-->
					</div>
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
		</div>
		<!--end::Authentication - Signup Welcome Message-->
	</div>
</template>

<script>
import axios from 'axios';

export default {
	data() {
		return {
			error: "",
            email: this.$route.params.email //this is the id from the browser
		}
	},
	methods: {
		save() {
			axios.post('/api/verifyUser', this.$route.params.email).then((response) => {

				console.log('saved');

				if (response.data.verification == "yes") {
					this.$router.push({ name: 'dashboard' });
				}
				
			}).catch(error => {
				this.errors = error.response.data;
			})

		}
	},
	async mounted() {
    let myid = this.$route.params.id;
    const result = await axios.get("/api/update_status/1");
    this.post=result.data;
    console.log(result);

//console.log(myid)
}
}

</script>
