<template>
    <client-only>
        <div class="col-lg-8" v-if="newsContent">
            <div class="single-article-section">
                <div class="single-article-text">
                    <div class="single-artcile-bg">
                        <img :src="newsContent.url_image" alt="" style="width: 100%; height: 100%;">
                    </div>
                    <p class="blog-meta">
                        <span class="author"><i class="fas fa-user"></i> {{ newsContent.user }}</span>
                        <span class="date"><i class="fas fa-calendar"></i>{{ newsContent.created_at }}</span>
                    </p>
                    <h2>{{ newsContent.title }}</h2>
                    <p>{{ newsContent.description }}</p>
                </div>
            </div>
        </div>
    </client-only>
</template>

<script>
export default {
    props: {
        newsContent: {
            type: Object,
            default: null,
        }
    },
}
</script>

<style>

</style>