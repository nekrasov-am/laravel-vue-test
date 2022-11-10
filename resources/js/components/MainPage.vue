<template>
    <div class="nav-bar"></div>
    <div class="cart">Cart({{ cart.length }})</div>
    <ul>
        <li v-for="product in products" :key="product.id">
            <product-display :product="product" @add-to-cart="updateCart"></product-display>
        </li>
    </ul>
    <button class="button"
            :class="{ disabledButton: (cart.length === 0) }"
            :disabled="cart.length === 0"
            v-on:click="checkOut">
        Check Out
    </button>
</template>

<script>
    export default {
		data() {
			return {
				cart: [],
				products: []
			}
		},
		methods: {
			updateCart(id) {
				this.cart.push(id)
			},
			checkOut() {
				this.axios.post('http://127.0.0.1:8000/api/products/buy', {
					cart: this.cart
                }).then((response) => {
					this.cart = [];
				})
            }
		},
        mounted() {
			this.axios.get('http://127.0.0.1:8000/api/products').then((response) => {
				this.products = response.data;
			})
        }
    }
</script>
