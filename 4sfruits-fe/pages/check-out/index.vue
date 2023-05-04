<template>
    <div>
        <TheBreadCrumb />
        <!-- check out section -->
        <div class="checkout-section mt-150 mb-150" v-if="cartBill">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                            <div class="card single-accordion">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Billing Address
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="index.html">
                                            <p>
                                                <input type="text" placeholder="Name" :value="info.name" @blur="getName($event)">
                                                <small v-if="error.name.length > 0" style="color: red"> {{ error.name }}</small>
                                            </p>
                                            <p>
                                                <input type="email" placeholder="Email" :value="info.email" @blur="getEmail($event)">
                                                <small v-if="error.email.length > 0" style="color: red"> {{ error.email }}</small>
                                            </p>
                                            <p>
                                                <input type="text" placeholder="Address" :value="info.address" @blur="getAddress($event)">
                                                <small v-if="error.address.length > 0" style="color: red"> {{ error.address }}</small>
                                            </p>
                                            <p>
                                                <input type="tel" placeholder="Phone" :value="info.phone" @blur="getPhone($event)">
                                                <small v-if="error.phone.length > 0" style="color: red"> {{ error.phone }}</small>
                                            </p>
                                            <p>
                                                <textarea name="bill" id="bill" cols="30" rows="10" placeholder="Say Something" :value="info.description" @blur="getDescription($event)"></textarea>
                                                <small v-if="error.description.length > 0" style="color: red"> {{ error.description }}</small>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>

                        </div>
                    </div>

                    <OrderDetail :cart="cart" :cartBill="cartBill" @placeOrder="placeOrder" />
                </div>
            </div>
        </div>

        <div v-else class="mt-5 mb-5">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <h3>You have no item in your cart! Please go back to the shop</h3>
                </div>
            </div>
        </div>
        <!-- end check out section -->
    </div>
</template>

<script>

export default {
    layout: 'base',
    mounted() {
        this.storage()
    },
    data() {
        return {
            cart: [],
            cartBill: null,
            error: {
                name: '',
                email: '',
                address: '',
                phone: '',
                description: ''
            },
            info: {
                name: '',
                email: '',
                address: '',
                phone: null,
                description: '',
            },
        }
    },
    methods: {
        storage() {
            if(process.browser) {
                if(localStorage.getItem('cart') !== null) {
                    this.cart = JSON.parse(localStorage.getItem('cart'))
                    this.cartBill = JSON.parse(localStorage.getItem('cartBill'))
                }

                if(localStorage.getItem('info') !== null) {
                    this.info = JSON.parse(localStorage.getItem('info'))
                    this.error.name = false
                    this.error.email = false
                    this.error.address = false
                    this.error.phone = false
                    this.error.description = false
                }

            }
        },
        getName($event) {
            let name = $event.target.value
            let regex = /^[a-zA-Z ]{2,30}$/;
            if(!(name.length > 0)) {
                this.error.name = 'Your name is empty. Please re-enter name.'
            } else if(regex.test(name) == false) {
                this.error.name = 'Please enter a correct name format.'
            } else {
                this.error.name = false
            }
            this.info.name = name
        },
        getEmail($event) {
            let email = $event.target.value
            let regex = /\S+@\S+\.\S+/;
            if(!(email.length > 0)) {
                this.error.email = 'Your email is empty. Please re-enter email.'
            } else if(regex.test(email) == false) {
                this.error.email = 'Please enter a correct email format.'
            } else {
                this.error.email = false
            }
            this.info.email = email
        },
        getAddress($event) {
            let address = $event.target.value
            let regex = /^[a-z0-9\s,'-]*$/i
            if(!(address.length > 0)) {
                this.error.address = 'Your address is empty. Please re-enter address.'
            } else if(regex.test(address) == false) {
                this.error.address = 'Please enter a correct address format.'
            } else {
                this.error.address = false
            }
            this.info.address = address
        },
        getPhone($event) {
            let phone = $event.target.value
            let regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/
            if(!(phone.length > 0)) {
                this.error.phone = 'Your phone is empty. Please re-enter phone.'
            } else if(regex.test(phone) == false) {
                this.error.phone = 'Please enter a correct phone format.'
            } else {
                this.error.phone = false
            }
            this.info.phone = phone
        },
        getDescription($event) {
            let description = $event.target.value
            let regex = /^[a-z0-9\s,'-]*$/i
            if(!(description.length > 0)) {
                this.error.description = 'Your description is empty. Please re-enter description.'
            } else if(regex.test(description) == false) {
                this.error.description = 'Please enter a correct description format.'
            } else {
                this.error.description = false
            }
            this.info.description = description
        },
        placeOrder() {
            if(this.error.name !== false) {
                this.error.name = 'Please fill in the information and enter a correct name format'
            }
            if(this.error.email !== false) {
                this.error.email = 'Please fill in the information and enter a correct email format'
            }
            if(this.error.address !== false) {
                this.error.address = 'Please fill in the information and enter a correct address format'
            }
            if(this.error.phone !== false) {
                this.error.phone = 'Please fill in the information and enter a correct phone format'
            }
            if(this.error.description !== false) {
                this.error.description = 'Please fill in the information and enter a correct description format'
            }

            if
            (
                this.error.name == false 
                && this.error.email == false
                && this.error.address == false
                && this.error.phone == false
                && this.error.description == false
                && this.cartBill.sub_total > 0
            ) 
            {
                localStorage.setItem('info', JSON.stringify(this.info))
                localStorage.removeItem('cart')
                localStorage.removeItem('cartBill ')
                this.$router.push({name: 'thank-you', query: {name: 'check-out'}})
            }

        },
        reloadPage() {
            window.location.reload()
        }
    },
    destroyed() {
        this.reloadPage()
    },
}
</script>