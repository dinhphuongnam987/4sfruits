<template>
    <!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item" v-for="logo in brand" :key="logo.id">
							<img :src="logo.url_logo" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo carousel -->
</template>

<script>
export default {
	computed: {
		brand() {
			return this.$store.state.brand
		}
	}
}
</script>

<style>

</style>