<template>
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="cart-table-wrap">
                <table class="cart-table">
                    <thead class="cart-table-head">
                        <tr class="table-head-row">
                            <th class="product-remove"></th>
                            <th class="product-image">Product Image</th>
                            <th class="product-name">Name</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-body-row" v-for="(item, index) in cart" :key="index">
                            <td class="product-remove"><a @click="deleteProduct(index)"><i class="far fa-window-close"></i></a></td>
                            <td class="product-image"><img :src="item.productImg" alt=""></td>
                            <td class="product-name">{{ item.name }}</td>
                            <td class="product-price">{{ item.price }}$</td>
                            <td class="product-quantity"><input type="number" :placeholder="item.qty" :value="item.qty" @input="updateCart($event, item.id)" min=1 max=10></td>
                            <td class="product-total">{{ item.sub_total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <Order :cart="cart" />
    </div>
</template>

<script>
export default {
    created () {
        this.storage()
    },
    data() {
        return {
            cart: [],
            qty: 1,
            subTotal: 0
        }
    },
    methods: {
        storage() {
            if(process.browser) {
                if(localStorage.getItem('cart') !== null ) {
                    this.cart = JSON.parse(localStorage.getItem('cart'))
                }
            }
        },
        updateCart($event, id) {
            this.qty = parseInt($event.target.value)
            this.cart.map(item => {
                if(item.id == id) {
                    item.qty = parseInt(this.qty)
                    item.sub_total = this.qty * item.price
                    return item
                }
            })
        },
        deleteProduct(index) {
            this.cart.splice(index, 1)
            if(this.cart.length > 0) {
                localStorage.setItem('cart', JSON.stringify(this.cart))
            } else {
                localStorage.removeItem('cart')
                localStorage.removeItem('cartBill')
            }
            
        }
    },
}
</script>

<style>

</style>