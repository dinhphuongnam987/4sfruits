export default {
    async actGetMenuList({commit}) {
        try {
            const menuList = await this.$axios.$get('menu')
            commit('getMenuList', menuList.data)
        } catch (e) {
            console.log(e.message);
        }
    }
}