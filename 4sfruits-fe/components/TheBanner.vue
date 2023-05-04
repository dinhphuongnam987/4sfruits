<template>
  	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Fresh & Organic</p>
							<h1>Delicious Seasonal Fruits</h1>
							<div class="hero-btns">
								<a class="boxed-btn" @click="redirectShop()">Fruit Collection</a>
								<a class="bordered-btn" @click="redirectContact()">Contact Us</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->
</template>

<script>
export default {
	methods: {
		redirectShop() {
			this.$router.push({name: 'shop'})
		},
		redirectContact() {
			this.$router.push({name: 'contact'})
		}
	},
}
</script>

<style>

</style>