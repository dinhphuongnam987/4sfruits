<template>
    <div class="col-md-5">
        <div class="single-product-img">
            <img :src="image" alt="">
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: {
            type: String,
            default: ''
        },
    },
}
</script>

<style>

</style>