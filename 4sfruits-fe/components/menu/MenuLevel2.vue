<template>
    <ul class="sub-menu">
        <li v-for="child in menuChild" :key="child.id">
            <a @click="redirectPage(child.slug)"> {{ child.name }} </a>
        </li>  
    </ul>
</template>

<script>
export default {
    props: {
        menuChild: {
            type: Object,
            default: null,
        },
    },
    methods: {
        redirectPage(slug) {
            this.$router.push({name: slug})
        }
    },
}
</script>

<style>

</style>