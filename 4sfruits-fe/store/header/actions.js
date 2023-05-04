export default {
    async actGetHeaderLogo({commit}) {
        try {
            const header = await this.$axios.$get('header')
            commit('getHeaderLogo', header.data.logo)
        } catch (e) {
            console.log(e.message);
        }
    }
}