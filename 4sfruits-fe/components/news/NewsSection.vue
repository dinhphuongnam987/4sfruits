<template>
    <!-- latest news -->
	<div class="latest-news pt-150 pb-150">
		<div class="container">

			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Our</span> News</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

            <NewsList :newsList="newsList" />
			<div class="row">
				<div class="col-lg-12 text-center">
					<a class="boxed-btn" @click="moreNews">More News</a>
				</div>
			</div>
		</div>
	</div>
	<!-- end latest news -->
</template>

<script>
export default {
	computed: {
		newsList() {
			return this.$store.state.newsList
		}
	},
    methods: {
        moreNews() {
            this.$router.push({name: 'news'})
        }
    },
}
</script>

<style>

</style>