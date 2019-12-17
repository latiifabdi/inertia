<template>
	<layout :url="url()">
		<div class="mt-6 border-t">
			<div class="container mx-auto mt-8">
				<h1 class="text-center font-semibold text-3xl">Products</h1>

				<div class="featured">
					<div v-for="product in products">
						<inertia-link :href="'/products/' + product.id">
							<img
								loading="lazy"
								width="350"
								height="300"
								:src="product.image"
								class="mt-8 bg-gray-400 rounded-lg shadow"
								style="width: 350px; height: 300px; object-fit: cover;"

							>
						</inertia-link>

						<h2 class="mt-1 font-semibold text-gray-800">{{product.name}}</h2>
						<span class="mt-1 text-gray-600">¥19.99</span>
					</div>
				</div>
			</div>
		</div>
	</layout>
</template>

<script>
	import Layout from '@/Shared/Layout'

	export default {
		components: {
			Layout,
		},
		props: ['products'],

		mounted() {
			console.log(this.products[0])
		},

		methods: {
			url() {
      			return location.pathname.substr(1)
   			},
		}
	}
</script>

<style scoped>
	.featured {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-gap: 20px;
	}
</style>
