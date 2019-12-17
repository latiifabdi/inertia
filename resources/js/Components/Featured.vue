<template>
	<div class="mt-12 container mx-auto text-gray-900">
		<h1 class="text-center font-semibold text-2xl">Featured Collection</h1>

		<div class="featured">
			<div v-for="product in features">
				<inertia-link :href="'/products/' + product.id">
					<img
						width="350"
						height="350"
						loading="lazy"
						class="mt-8 image bg-gray-400 rounded-lg shadow-lg"
						:src="product.image"
					/>
				</inertia-link>

				<h2 class="mt-1 font-semibold text-gray-800">{{product.name}}</h2>
				<span class="mt-1 text-gray-600">{{(product.price / 100).toFixed(2)}}</span>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		props: ['features'],
	}
</script>

<style scoped>
	.featured {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-gap: 20px;
	}

	@media(max-width: 700px) {
		.featured {
			display: grid;
			grid-template-columns: 1fr;
			grid-gap: 20px;
			padding-left: 60px;
		}
	}

	.v-lazy-image {
	  filter: blur(10px);
	  transition: filter 0.7s;
	}
	.v-lazy-image-loaded {
	  filter: blur(0);
	}

	.image {
		width: 350px;
		height: 350px;
		object-fit: cover;
	}

</style>
