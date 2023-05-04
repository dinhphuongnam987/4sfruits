export default {
    async actGetNewsList({commit}) {
        try {
            const newsList = await this.$axios.$get('post', {
                params: {
                    limit: 3
                }
            })
            commit('getNewsList', newsList.data)
        } catch (e) {
            console.log(e.message);
        }
    }
}