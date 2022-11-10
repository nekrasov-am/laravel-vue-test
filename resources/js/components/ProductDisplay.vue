<template>
    <div class="product-display">
        <div class="product-container">
            <div class="product-image">
                <img v-bind:src="image">
            </div>
            <div class="product-info">
                <h1>{{ title }}</h1>

                <p v-if="inStock">In Stock</p>
                <p v-else>Out of Stock</p>

                <p>Shipping: {{ shipping }}</p>
                <ul>
                    <li v-for="detail in this.product.details">{{ detail }}</li>
                </ul>

                <div
                        v-for="(variant, index) in this.product.variants"
                        :key="variant.id"
                        @mouseover="updateVariant(index)"
                        class="color-circle"
                        :style="{ backgroundColor: variant.color }">
                </div>

                <button
                        class="button"
                        :class="{ disabledButton: !inStock }"
                        :disabled="!inStock"
                        v-on:click="addToCart">
                    Add to Cart
                </button>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
		props: ['product'],
		data() {
			return {
				selectedVariant: 0
			}
		},
		methods: {
			addToCart() {
				this.product.variants[this.selectedVariant].quantity--;
				this.$emit('add-to-cart', this.product.variants[this.selectedVariant].id);
			},
			updateVariant(index) {
				this.selectedVariant = index
			}
		},
		computed: {
			title() {
				return this.product.brand + ' ' + this.product.name
			},
			image() {
				return this.product.variants[this.selectedVariant].image
			},
			inStock() {
				return this.product.variants[this.selectedVariant].quantity
			},
			shipping() {
				return 'Free'
			}
		}
    }
</script>
