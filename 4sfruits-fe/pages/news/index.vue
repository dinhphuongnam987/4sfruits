<template>
  <div>
    <TheBreadCrumb name="News Article" title="Organic Information"/>
    <PreLoader :preLoader="preLoader" />

    <!-- News -->
    <div class="latest-news mt-150 mb-150">
      <div class="container">
          <NewsList :newsList="newsList" />
          
          <!-- Pagination -->
          <div class="row">
              <div class="col-lg-12 text-center">
                <div class="pagination-wrap" v-if="totalPage > 1">
                  <ul>
                    <li v-if="prev" @click="getPrevPage">
                      <a>Prev</a>
                    </li>
                    <li v-for="currentPage in totalPage" :key="currentPage" @click="choosePage(currentPage)">
                      <a class="active" v-if="currentPage == newsList.current_page">
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
    <!-- End news -->
  </div>
</template>

<script>
export default {
  layout: 'base',
  data() {
    return {
      newsList: {},
      preLoader: false
    }
  },
  async fetch() {
    try {
      this.preLoader = true
      let response = await this.$axios.$get('post', {
        params: {
          limit: 3
        }
      })
      
      if(response.status == true) {
        this.newsList = response.data
        this.preLoader = false
      }
    } catch (e) {
      console.log(e.message);
    }
  },
  computed: {
		totalPage() {
			return Math.ceil(this.newsList.total / this.newsList.per_page)
		},
		prev() {
			return this.newsList.current_page > 1
		},
		next() {
			return this.newsList.current_page < this.totalPage
		},
		active() {
			return true
		}
	},
  methods: {
    async choosePage(currentPage) {
			try {
				this.preLoader = true
        const response = await this.$axios.$get('post?page='+currentPage, {
          params: {
            limit: 3
          }
        })
        if(response.status === true) {
          this.newsList = response.data
          this.preLoader = false
        }
			} catch (e) {
				console.log(e.message);
			}
		},
		async getNextPage() {
			try {
				this.preLoader = true
				const response = await this.$axios.$get(this.newsList.next_page_url, {
          params: {
            limit: 3
          }
        })

				if(response.status == true) {
					this.newsList = response.data
					this.preLoader = false
				}
			} catch (e) {
				console.log(e.message);
			}
		},
		async getPrevPage() {
			try {
				this.preLoader = true
				const response = await this.$axios.$get(this.newsList.prev_page_url, {
          params: {
            limit: 3
          }
        })

				if(response.status == true) {
					this.preLoader = false
					this.newsList = response.data
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