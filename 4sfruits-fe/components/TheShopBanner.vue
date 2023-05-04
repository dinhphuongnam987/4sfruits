<template>
    <!-- shop banner -->
	<section class="shop-banner">
    	<div class="container">
        	<h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
            <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
            <a class="cart-btn btn-lg" @click="showNow()">Shop Now</a>
        </div>
    </section>
	<!-- end shop banner -->
</template>

<script>
export default {
    methods: {
        showNow() {
            this.$router.push({name: 'shop'})
        }
    },
}
</script>

<style>

</style>