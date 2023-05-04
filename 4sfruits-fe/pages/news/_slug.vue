<template>
	<div>
		<TheBreadCrumb title="ORGANIC INFORMATION" name="News Article"/>
		<PreLoader :preLoader="preLoader"/>
		<!-- single article section -->
		<div class="mt-150 mb-150">
			<div class="container">
				<div class="row">
					<NewsContent :newsContent="newsContent"/>
					<NewsRecent :newsRecent="newsRecent"/>
				</div>
			</div>
		</div>
		<!-- end single article section -->
	</div>
</template>

<script>
export default {
	layout: 'base',
	data() {
		return {
			preLoader: false,
			id: this.$route.query.post,
			newsContent: {},
			newsRecent: []
		}
	},
	async fetch() {
		try {
			this.preLoader = true
			const [newsContent, newsRecent] = await Promise.all([
				await this.$axios.$get('post/detail', {
					params: {
						id: this.id
					}
				}),
				await this.$axios.$get('post/recent')
			])

			if(newsContent.status == true && newsRecent.status == true) {
				newsContent.data.created_at = this.$dayjs(newsContent.data.created_at).format('YYYY/MM/DD')
				this.newsContent = newsContent.data

				this.newsRecent = newsRecent.data

				this.preLoader = false
			}
		} catch (e) {
			console.log(e.message)
		}
		
	}
}
</script>

<style>

</style>