<template>
    <div class="single-latest-news" v-if="news" @click="readMore(news.id, news.slug)">
        <a>
            <div class="latest-news-bg">
                <img :src="news.url_image" alt="" style="height: 100%; width: 100%">
            </div>
        </a>
        <div class="news-text-box">
            <h3><a> {{ news.title }}</a></h3>
            <p class="blog-meta">
                <span class="author"><i class="fas fa-user"></i> {{ news.user }}</span>
                <span class="date"><i class="fas fa-calendar"></i>{{ news.created_at }}</span>
            </p>
            <p class="excerpt">{{ news.description }}</p>
            <a class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        news: {
            type: Object,
            default: null,
        }
    },
    methods: {
        readMore(id, slug) {
            this.$router.push({name: 'news-slug', params: {slug: slug}, query: {post: id}})
        }
    },
}
</script>

<style>

</style>