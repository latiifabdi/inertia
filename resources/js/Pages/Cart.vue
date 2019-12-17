<template>
    <layout :url="url()">
        <div class="mt-6 border-t">
            <div class="container mx-auto mt-8">
                <h1 class="text-center font-semibold text-3xl">Carts</h1>

                <div class="flex items-start">
                    <div class="featured mr-16 4/5">
                        <div v-for="product in products">
                            <inertia-link :href="'/products/' + product.id">
                                <img
                                    loading="lazy"
                                    width="350"
                                    height="300"
                                    :src="product.attributes.image"
                                    class="mt-8 bg-gray-400 rounded-lg shadow"
                                    style="width: 350px; height: 300px; object-fit: cover;"

                                >
                            </inertia-link>

                            <h2 class="mt-1 font-semibold text-gray-800">{{product.name}}</h2>
                            <span class="mt-1 text-gray-600">¥19.99</span>
                        </div>
                    </div>

                    <div class="mt-6 ml-32 w-1/5">
                        <div class="flex flex-col border-t-8 border-teal-400 rounded-lg px-4 py-4 pb-8 shadow  bg-gray-100">
                            <div class="">
                                <h2 class="font-bold text-center mt-2 mb-8">Cart Summery</h2>

                                <div class="mb-6 flex items-center justify-between">
                                    <p class="text-sm">Sub Total</p>
                                    <p class="font-bold">${{subTotal}}</p>
                                </div>
                                <div class="mb-6 flex items-center justify-between">
                                    <p class="text-sm">Shipping</p>
                                    <p class="font-bold">$5.00</p>
                                </div>

                                 <div class="mb-12 flex items-center justify-between">
                                    <p class="text-sm">Total</p>
                                    <p class="font-bold">${{total + 5.00}}</p>
                                </div>

                                <inertia-link
                                    href="/checkout"
                                    class="mt-32 text-center ml-10 px-12 py-3 rounded-lg shadow bg-teal-400 hover:bg-teal-700 text-white"
                                >
                                    Checkout
                                </inertia-link>

                            </div>
                        </div>
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
        props: ['products', 'subTotal', 'total'],

        mounted() {
            console.log(this.products)
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
        grid-template-columns: 1fr 1fr;
        grid-gap: 20px;
    }
</style>
