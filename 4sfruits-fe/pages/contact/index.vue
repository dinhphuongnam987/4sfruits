<template>
  <div>
      <PreLoader :preLoader="preLoader" />
      <TheBreadCrumb name="Contact us" title="Get 24/7 Support"/>
      <ContactForm />
      <ContactFindLocation />
      <ContactMap />
  </div>
</template>

<script>
export default {
    layout: 'base',
    data() {
        return {
            preLoader: false
        }
    },
    created () {
        this.preLoader = true
    },
    mounted () {
        this.preLoader = false
    },
}
</script>

<style>

</style>