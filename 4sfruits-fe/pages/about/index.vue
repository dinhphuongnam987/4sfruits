<template>
  <div>
      <PreLoader :preLoader="preLoader" />
      <TheBreadCrumb name="About Us" title="We sale fresh fruits"/>
      <AboutFeatured />
      <TheShopBanner />
      <AboutTeam />
      <TestTiMonailList />
  </div>
</template>

<script>

export default {
	layout: 'base',
  data() {
    return {
      preLoader: false,
    }
  },
  created() {
    this.preLoader = true
  },
  mounted() {
    this.preLoader = false
  }
  
}
</script>

<style>

</style>