<template>
	<section class="container mx-auto mt-12">
		<h1 class="font-semibold text-center mt-4">New Arrivals</h1>
		<div class="arrivals mt-8">
			<div v-for="product in arrivals">
				<inertia-link :href="'/products/' + product.id">
					<img
						width="350"
						height="350"
						loading="lazy"
						class="mt-8 image bg-gray-400 rounded-lg shadow-lg"
						:src="product.image"
					/>
				</inertia-link>

				<h2 class="mt-1 font-semibold text-gray-800">{{product.name}}:</h2>
				<span class="mt-1 text-gray-600">¥{{(product.price / 100).toFixed(2)}}</span>
			</div>
		</div>

	</section>
</template>

<script>
	export default {
		props: ['arrivals'],
	}
</script>

<style>
	.arrivals {
		display: grid;
		grid-template-columns: 1fr 1fr 1fr;
		grid-gap: 20px;
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
