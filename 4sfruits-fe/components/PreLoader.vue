<template>
    <!--PreLoader-->
    <div class="loader" v-if="preLoader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
</template>

<script>
export default {
    props: {
        preLoader: {
            type: Boolean,
            default: false
        }
    }
}
</script>

<style>

</style>