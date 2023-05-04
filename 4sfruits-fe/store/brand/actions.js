export default {
    async actGetBrand({commit}) {
        try {
            const brand = await this.$axios.$get('brand')
            commit('getBrand', brand.data)
        } catch (e) {
            console.log(e.message);
        }
    }
}