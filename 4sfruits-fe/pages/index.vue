<template>
  <div>
    <PreLoader :preLoader="preLoader" />
    <TheBanner />
    <FeaturesList />
    <ProductSection />
    <TheCartBanner />
    <TestTiMonailList />
    <AboutSection />
    <TheShopBanner />
    <NewsSection />
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
  async asyncData({store}) {
    try {
      await Promise.all([
        store.dispatch('product/actGetProductList'),
        store.dispatch('news/actGetNewsList')
      ])
    } catch (e) {
      console.log(e.message)
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
