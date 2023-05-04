<template>
	<div>
		<TheBreadCrumb name="Shop" title="Fresh and Organic" />
		<PreLoader :preLoader="preLoader" />
		<!-- products -->
		<div class="product-section mt-150 mb-150">
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<div class="product-filters">
							<ul>
								<li @click="getProductAll" >All</li>
								<li v-for="category in categories" :key="category.id" @click="getProductCat(category.id), getCategoryId(category.id)" >
									{{ category.name }}
								</li>
							</ul>
						</div>
					</div>
				</div>

				<ProductList :productList="productList.data" />

				<!-- Pagination -->
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="pagination-wrap" v-if="totalPage > 1">
							<ul>
								<li v-if="prev" @click="getPrevPage">
									<a>Prev</a>
								</li>
								<li v-for="currentPage in totalPage" :key="currentPage" @click="choosePage(currentPage)">
									<a class="active" v-if="currentPage == productList.current_page">
										{{ currentPage }}	
									</a>
									<a v-else>{{ currentPage }}</a>
								</li>
								<li v-if="next" @click="getNextPage">
									<a>Next</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end products -->
	</div>
</template>

<script>
export default {
    layout: 'base',
	data() {
		return {
			id: 1,
			categories : {},
			productList: {},
			categoryId: null,
			preLoader: false
		}
	},
	computed: {
		totalPage() {
			return Math.ceil(this.productList.total / this.productList.per_page)
		},
		prev() {
			return this.productList.current_page > 1
		},
		next() {
			return this.productList.current_page < this.totalPage
		},
		active() {
			return true
		}
	},
	async fetch() {
		try {
			this.preLoader = true
			const response = await this.$axios.$get('product-category/all');

			if(response.status == true) {
				this.categories = response.data.cats
				this.productList = response.data.products
				this.preLoader = false
			}
		} catch (e) {
			console.log(e.message);
		}
	},
	methods: {
		async getProductAll() {
			try {
				this.preLoader = true
				const response = await this.$axios.$get('product-category/all');
				
				if(response.status == true) {
					this.productList = response.data.products
					this.preLoader = false
				}
			} catch (e) {
				console.log(e.message);
			}
		},
		async getProductCat(id) {
			try {
				this.preLoader = true
				const response = await this.$axios.$get('product-category/'+id);
				
				if(response.status == true) {
					this.productList = response.data.products
					this.preLoader = false
				}
			} catch (e) {
				console.log(e.message);
			}
		},
		getCategoryId(id) {
			this.categoryId = id;
		},
		async choosePage(currentPage) {
			try {
				this.preLoader = true
				if(this.productList.path === 'http://be-4sfruits.herokuapp.com/api/v1/product-category/all') {
					const response = await this.$axios.$get('product-category/all?page='+currentPage)
					if(response.status === true) {

						this.productList = response.data.products
						this.preLoader = false
					}
					console.log(this.productList.path);
				} 
				else {
					const response = await this.$axios.$get('product-category/'+this.categoryId+'?page='+currentPage)
					if(response.status === true) {

						this.productList = response.data.products
						this.preLoader = false
					}
				}
			} catch (e) {
				console.log(e.message);
			}
		},
		async getNextPage() {
			try {
				this.preLoader = true
				const response = await this.$axios.$get(this.productList.next_page_url)

				if(response.status == true) {
					this.productList = response.data.products
					this.preLoader = false
				}
			} catch (e) {
				console.log(e.message);
			}
		},
		async getPrevPage() {
			try {
				this.preLoader = true
				const response = await this.$axios.$get(this.productList.prev_page_url)

				if(response.status == true) {
					this.preLoader = false
					this.productList = response.data.products
				}
			} catch (e) {
				console.log(e.message);
			}
		}
	},
}
</script>

<style>

</style>