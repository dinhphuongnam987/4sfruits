<template>
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a @click="redirectHome">
								<img :src="logo" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<MenuLevel1 />
						<!-- menu end -->
						
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
</template>

<script>
export default {
	computed: {
		logo() {
			return this.$store.state.logo
		}	
	},
	methods: {
		redirectHome() {
			this.$router.push({name: 'index'})
		}
	},
}
</script>

<style>

</style>