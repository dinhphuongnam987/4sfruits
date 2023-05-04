<template>
  	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>{{ title }}</p>
						<h1>{{ name }}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->
</template>

<script>
export default {
	props: {
		name: {
			type: String,
			default: ''
		},
		title: {
			type: String,
			default: ''
		}
	}
}
</script>

<style>

</style>