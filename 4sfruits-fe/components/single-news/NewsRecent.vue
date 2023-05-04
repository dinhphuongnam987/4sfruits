<template>
    <div class="col-lg-4" v-if="newsRecent">
        <div class="sidebar-section">
            <div class="recent-posts">
                <h4>Recent Posts</h4>
                <ul>
                    <li v-for="news in newsRecent" :key="news.id">
                        <a @click="redirectSingleNews(news.id, news.slug)">{{ news.title }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        newsRecent: {
            type: Array,
            default: null
        }
    },
    methods: {
        redirectSingleNews(id, slug) {
            this.$router.push({name: 'news-slug', params: {slug: slug}, query: {post: id}})
        }
    },
}
</script>

<style>

</style>