<template>
    <layout :url="url()">
        <div class="mt-6 bg-gray-100 min-h-screen">
            <div class="container mx-auto mt-8">
                <h1 class="text-center mt-6 font-semibold text-2xl">Checkout</h1>

                <div class="flex">
                    <div class="w-3/4">
                        <div class="mt-16 flex">

                            <div class="w-1/2 mr-4">
                                <input type="text" v-model="name" placeholder="Your Name" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                            <div class="w-1/2">
                                <input type="email" v-model="email" placeholder="Your email address" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                        </div>

                        <div class="mt-12 flex">

                            <div class="w-1/2 mr-4">
                                <input type="text" v-model="country" placeholder="Country" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                            <div class="w-1/2">
                                <input type="email" v-model="city" placeholder="City" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                        </div>

                        <div class="mt-12 flex">

                            <div class="w-1/2 mr-4">
                                <input type="text" v-model="phoneNumber" placeholder="Phone Number" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                            <div class="w-1/2">
                                <input type="email" v-model="address" placeholder="Address" class="rounded shadow  text-gray-900 py-2 px-4 w-full">
                            </div>

                        </div>

                    </div>

                    <div class="w-1/3 mt-6 ml-32">
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

                <button
                    :disabled="loading"
                    class="w-1/3 py-3 text-center bg-teal-400  rounded-lg text-white font-bold"
                    @click.prevent="openStripe"
                >

                    Pay Now

                </button>

                <Spinner v-show="loading" />

            </div>
        </div>
    </layout>
</template>

<script>
    import Layout from '@/Shared/Layout'
    import Spinner from '@/Shared/Spinner'

    export default {
        components: {
            Layout,
            Spinner
        },

        props: ['subTotal', 'total'],

        data() {
            return {
                email: '',
                country: '',
                name: '',
                city: '',
                address: '',
                phoneNumber: '',
                loading: false,
                stripeToken: '',

            }
        },

        created() {
           this.stripe = StripeCheckout.configure({
              key: 'pk_test_ffTSWCCD4hs1iVII4fsqpRPe',
              locale: 'auto',
              token: token => {
                console.log(token)
                this.stripeToken = token.id;
                this.email = token.email;

                this.submit()
              }
            });
        },

        methods: {
            url() {
                return location.pathname.substr(1)
            },

            openStripe() {
                this.stripe.open({
                    name: 'The best store in the world',
                    description: '2 widgets',
                    amount: this.totalPrice(),
                    email: this.email
                })
            },

            totalPrice() {
                return this.total * 100
            },

            submit() {
                this.$inertia.post('/checkout', {
                    email: this.email,
                    name: this.name,
                    country: this.country,
                    city: this.city,
                    address: this.address,
                    phoneNumber: this.phoneNumber,
                    token: this.stripeToken
                })
            }
        }

    }
</script>




