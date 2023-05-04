export default {
    addCart(state, cart) {
        this.state.cart = Object.assign({}, cart)
    }
}