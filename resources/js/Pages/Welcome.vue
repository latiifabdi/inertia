<template>
	<layout :url="url()">
		<div class="mt-6 bg-gray-700 w-full" style="height: 28rem;">
		</div>
		<featured :features="products" />
		<new-arrivals :arrivals="products"></new-arrivals>

		<slider :products="products" />

		<custom-footer></custom-footer>

	</layout>
		
</template>

<script>
	import Layout from '@/Shared/Layout'
	import Featured from '@/Components/Featured'
	import NewArrivals from '@/Components/NewArrivals'
	import Slider from '@/Components/Slider'
	import CustomFooter from '@/Components/CustomFooter'
	export default {
		components: {
    		Layout,
    		Featured,
    		NewArrivals,
    		Slider,
    		CustomFooter,
  		},

  		props: ['products'],

		created() {
			console.log('hello welcome')
		},

		methods: {
			url() {
      			return location.pathname.substr(1)
   			},
		}
	}
</script>