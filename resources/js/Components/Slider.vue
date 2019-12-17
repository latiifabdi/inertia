<template>
	<div class="mt-16">
		<carousel>
		  <slide v-for="product in products" :key="product.name">
		  	<img
		  		width="350"
				height="350"
		  		loading="lazy"
		  		:src="product.image"
		  		style="height: 30rem; width: 100%; object-fit: cover;"
		  	>
		  </slide>
		</carousel>

	</div>
</template>

<script>
	import { Carousel, Slide } from 'vue-carousel';

	export default {
		props: ['products'],

		components: {
    		Carousel,
    		Slide
  		}
	}
</script>

<style>
	/*.VueCarousel-dot--active {
		background: red !important;
		padding: 0 !important;
		outline: none !important;
	}*/
</style>
