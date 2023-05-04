<template>
    <div class="col-lg-4">
        <div class="order-details-wrap">
            <table class="order-details">
                <thead>
                    <tr>
                        <th>Your order Details</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody class="order-details-body">
                    <tr>
                        <td>Product</td>
                        <td>Total</td>
                    </tr>
                    <tr v-for="(item, index) in cart" :key="index">
                        <td>{{ item.name }}</td>
                        <td>{{ item.sub_total }}$</td>
                    </tr>
                </tbody>
                <tbody class="checkout-details">
                    <tr>
                        <td>Subtotal</td>
                        <td>{{ cartBill.sub_total }}$</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td>{{ cartBill.ship }}$</td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td>{{ cartBill.total }}$</td>
                    </tr>
                </tbody>
            </table>
            <a class="boxed-btn" @click="placeOrder">Place Order</a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cart: {
            type: Array,
            default: null
        },
        cartBill: {
            type: Object,
            default: null
        }
    },
    methods: {
        placeOrder() {
            this.$emit('placeOrder')
        }
    },
}
</script>

<style>

</style>