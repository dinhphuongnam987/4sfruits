<template>
	<div class="row" v-if="newsList">
		<div class="col-lg-4 col-md-6" v-for="news in newsList.data" :key="news.id">
			<NewsItem :news="news" />
		</div>
	</div>
</template>

<script>
export default {
	props: {
		newsList: {
			type: Object,
			default: null
		}
	}
}
</script>

<style>

</style>