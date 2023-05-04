export default {
    getNewsList(state, newsList) {
        newsList.data.map(news => {
            news.created_at = this.$dayjs(news.created_at).format('YYYY/MM/DD')
            return news
        })
        this.state.newsList = newsList
    }
}