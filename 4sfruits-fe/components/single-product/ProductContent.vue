<template>
    <client-only>
        <div class="col-md-7" v-if="product">
            <div class="single-product-content">
                <h3>{{ product.name }}</h3>
                <p class="single-product-pricing"><span>Per {{ product.unit }}</span> {{ product.price }}$</p>
                <p>{{ product.description }}</p>
                <div class="single-product-form">
                    <form action="index.html">
                        <input type="number" :value="this.qty" @input="getQty" min=1 max=10>
                    </form>
                    <a class="cart-btn" @click="addCart"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                </div>
                <h4>Share:</h4>
                <ul class="product-share">
                    <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href=""><i class="fab fa-twitter"></i></a></li>
                    <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </client-only>
</template>

<script>
export default {
    props: {
        product: {
            type: Object,
            default: null
        }
    },
    data() {
        return {
            qty: 1,
        }
    },
    methods: {
        getQty(e) {
            this.qty = e.target.value
        },
        addCart() {
            let product = {
                'id': this.product.id,
                'productImg': this.product.url_image,
                'name': this.product.name,
                'price': this.product.price,
                'qty': parseInt(this.qty),
                'sub_total': this.qty * this.product.price
            }

            if(localStorage.getItem('cart') !== null) {
                var cart = JSON.parse(localStorage.getItem('cart'))

                cart.map(item => {
                    if(item.id == product.id) {
                        item.qty += product.qty
                        item.sub_total += product.sub_total
                        return item
                    }
                })

                if(cart[0].id !== product.id) {
                    cart.unshift(product)
                }

                localStorage.setItem('cart', JSON.stringify(cart))             
            } else {
                localStorage.setItem('cart', JSON.stringify([product]))
            }

            this.showNoti()

            this.reloadPage()
        },
        showNoti() {
            this.$notify({
                group: 'foo',
                type: 'success',
                title: 'Add Success',
                text: 'Add to cart successfully! View shopping cart and payment'
            })
        },
        reloadPage() {
            window.location.reload()
        }
    },
}
</script>

<style>

</style>