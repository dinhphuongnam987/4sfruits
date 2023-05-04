<template>
  <div class="col-lg-4 col-md-6 text-center" v-if="product">
    <div class="single-product-item" @click="redirectProductDetail(product.id, product.slug)">
      <div class="product-image">
        <a><img :src="product.url_image" alt=""></a>
      </div>
      <h3>{{ product.name }}</h3>
      <p class="product-price"><span>Per {{ product.unit }}</span> {{ product.price }}$ </p>
      <a class="cart-btn"><i class="fas fa-shopping-cart"></i>View Detail </a>
    </div>
	</div>
</template>

<script>
export default {
  props: {
    product: {
      type: Object,
      default: null
    },
  },
  methods: {
    redirectProductDetail(id, slug) {
      this.$router.push({name: 'shop-slug', params: {slug: slug}, query: {product: id}})
    }
  },
}
</script>

<style>

</style>