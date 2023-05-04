<template>
    <div class="row" v-if="productList">
        <ProductItem v-for="product in productList" :key="product.id" :product=product />
    </div>
</template>

<script>
export default {
    props: {
        productList: null
    },
}
</script>
