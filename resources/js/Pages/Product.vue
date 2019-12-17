<template>
    <layout :url="url()">
        <div class="mt-6 border-t">
            <div class="container mx-auto mt-8">
                <div class="flex items-start">
                    <div class="w-1/3 mr-8">
                        <img
                            loading="lazy"
                            width="400"
                            height="350"
                            :src="product.image"
                            class="mb-8 mt-8 bg-gray-400 rounded-lg shadow"
                            style="object-fit: cover;"
                        >

                        <inertia-link
                            :href="'/carts/' + product.id"
                            class="mt-4 px-12 py-3 rounded-lg shadow bg-indigo-700 hover:bg-indigo-400 text-white"
                        >
                            Add to cart
                        </inertia-link>


                        <!-- <inertia-link :href="/carts"
                            style="outline: none;"
                            @click.prevent="addToCart(product)"
                             class="mt-2 px-8 py-2 rounded-lg shadow bg-indigo-700 hover:bg-indigo-400 text-white"
                        >
                            Add to Cart
                        </button> -->
                    </div>
                    <div class="w-2/3 mt-8 font-semibold text-gray-900">
                        <h2>{{ product.name }}</h2>
                    </div>

                    <inertia-link href="/carts">Cart</inertia-link>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>

    import Layout from '@/Shared/Layout'

    import store from '@/store'

    export default {
        components: {
            Layout,
        },

        created() {
            console.log('hello')
        },

        props: ['product'],

        methods: {
            url() {
                return location.pathname.substr(1)
            },

            addToCart(payload) {
                store.commit('addToCart', payload)

            }
        }
    }
</script>

