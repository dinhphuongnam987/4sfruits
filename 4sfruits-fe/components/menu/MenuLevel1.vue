<template>
        <nav class="main-menu">
            <ul>
                <li class="current-list-item"
                    v-for="menu in menuList" :key="menu.id">
                    <!-- <a @click="redirectPage(menu.slug)"> {{ menu.name }} </a> -->
                    <!-- <router-link :to="{name: menu.slug}" custom v-slot="{ navigate }">
                        <a @tap="navigate" @keypress.enter="navigate" role="link">{{ menu.name }}</a>
                    </router-link> -->
                    <NuxtLink :to="{name: menu.slug}">{{ menu.name }}</NuxtLink>
                    <MenuLevel2 v-if="menu.menu_child" :menuChild = menu.menu_child />
                </li>

                <li>
                    <client-only>
                        <div class="header-icons">
                            <a class="shopping-cart" @click="redirectCart">
                                <i class="fas fa-shopping-cart">
                                    <span v-show="count">
                                        ( {{ count }} )
                                    </span>
                                </i>
                            </a>
                            <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        </div>
                    </client-only>
                </li>
            </ul>
        </nav>
</template>

<script>
export default {
    data() {
        return {
            menuList: this.$store.state.menuList,
            count: 0
        }
    },
    created() {
        this.storage();
    },
    methods: {
        storage() {
            if (process.browser) {
                if(JSON.parse(localStorage.getItem('cart')) !== null) {
                    this.count = JSON.parse(localStorage.getItem('cart')).length
                }
            }
        },
        redirectCart() {
            this.$router.push({name: 'cart'})
        },
        redirectPage(slug) {
            this.$router.push({name: slug})
        }
    },
}
</script>

<style>

</style>