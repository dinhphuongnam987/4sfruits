<template>
  <div>
    <TheBreadCrumb title="See more Details" name="Single Product" />
    <SingleProduct :product="product" />
  </div>
</template>

<script>
export default {
  layout: "base",
  data() {
    return {
      id: this.$route.query.product,
    };
  },
  computed: {
    product() {
      return this.$store.state.product;
    },
  },
  async fetch() {
    try {
      await this.$store.dispatch("product/actGetProduct", this.id);
    } catch (e) {
      console.log(e.message);
    }
  },
};
</script>

<style>
</style>