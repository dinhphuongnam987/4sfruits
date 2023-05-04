export default {
    async actGetProductList({commit}, page) {
        try {
            const response = await this.$axios.$get('product')
            
            if(response.status == true) {
                commit('getProductList', response.data)
            }
        } catch (e) {
            console.log(e.message);
        }
    },
    async actGetProduct({commit}, id) {
        try {
            const response = await this.$axios.$get('product-detail', {
                params: {
                    id: id
                }
            })
            if(response.status == true) {
                commit('getProduct', response.data)
            }
        } catch (e) {
            console.log(e.message);
        }
    }
}