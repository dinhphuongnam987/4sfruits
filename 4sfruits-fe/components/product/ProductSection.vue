<template>
    <!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<ProductList :productList="productList" />
		</div>
	</div>
	<!-- end product section -->
</template>

<script>
export default {
	async fetch () {
		try {
			await this.$store.dispatch('product/actGetProductList')
		} catch (e) {
			console.log(e.message);
		}
	},
	computed: {
		productList() {
			return this.$store.state.productList
		}
	},
}
</script>