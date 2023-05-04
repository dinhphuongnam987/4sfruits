<template>
    <div class="col-lg-4">
        <div class="total-section">
            <table class="total-table">
            <thead class="total-table-head">
                <tr class="table-total-row">
                <th>Total</th>
                <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr class="total-data">
                    <td><strong>Subtotal: </strong></td>
                    <td>{{ bill.sub_total }}</td>
                    </tr>
                    <tr class="total-data">
                    <td><strong>Shipping: </strong></td>
                    <td>{{ bill.ship }}$</td>
                    </tr>
                    <tr class="total-data">
                    <td><strong>Total: </strong></td>
                    <td>{{ bill.total }}$</td>
                </tr>
            </tbody>
            </table>
            <div class="cart-buttons">
                <a  class="boxed-btn black" @click="checkOut">Check Out</a>
            </div>
        </div>

        <div class="coupon-section">
            <h3>Apply Coupon</h3>
            <div class="coupon-form-wrap">
            <form action="index.html">
                <p><input type="text" placeholder="Use code 4SFRUITS to get 10% off." @input="getCoupon"></p>
                <p><input type="submit" value="Apply" @click.prevent="applyCoupon" /></p>
            </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        cart: {
            type: Array,
            default: null
        }
    },
    data() {
        return {
            ship: 45,
            coupon: '',
            statusCoupon: false
        }
    },
    computed: {
        subTotal() {
            let subTotal = 0
            this.cart.forEach(item => {
                subTotal += item.sub_total
            })
            return subTotal
        },
        total() {
            return this.subTotal + this.ship
        },
        bill() {
            if(this.statusCoupon !==  true) {
                return {
                    'sub_total': this.subTotal,
                    'ship': this.ship,
                    'total': this.total
                }
            } else {
                return {
                    'sub_total': this.subTotal,
                    'ship': this.ship,
                    'total': this.total * [(100 - 10)/100]
                }
            }
        }
    },
    methods: {
        checkOut() {
            this.cartBill = this.bill

            if(this.cart.length > 0) {
                localStorage.setItem('cart', JSON.stringify(this.cart))
                localStorage.setItem('cartBill', JSON.stringify(this.cartBill))
                this.$router.push({name: 'check-out'})  
            }  else {
                this.$notify({
                    group: 'foo',
                    type: 'warn',
                    text: 'You have no item in your cart! Please go back to the shop'
                })
            }
        },
        getCoupon(e) {
            this.coupon = e.target.value
        },
        applyCoupon() {
            if(this.coupon == '4SFRUITS') {
                this.statusCoupon = true
            }
        }
    },
}
</script>

<style>

</style>