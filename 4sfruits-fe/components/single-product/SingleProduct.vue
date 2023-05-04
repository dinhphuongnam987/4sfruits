<template>
	<!-- single product -->
	<div class="single-product mt-150 mb-150" v-if="product">
		<div class="container">
			<div class="row">
				<ProductImage :image="product.url_image" />
				<ProductContent :product="product" />
			</div>
		</div>
	</div>
	<!-- end single product -->
</template>

<script>
export default {
	props: {
		product: {
			type: Object,
			default: null,
		},
	},
}
</script>

<style>

</style>