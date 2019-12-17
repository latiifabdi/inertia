<template>
  <main class="bg-white text-gray-900 min-h-screen pt-6">
    <header class="container mx-auto">
      <div class="flex justify-between items-center">
        <div class="#">
             <inertia-link href="/" class="font-semibold text-gray-900">Logo here</inertia-link>
        </div>
        <div class="#">
            <inertia-link href="/"
                :class="isUrl('') ? 'font-semibold text-gray-900' : ''"
                class="mr-6"
                >Home</inertia-link>
             <inertia-link
                href="/collection/all"
                :class="isUrl('collection/all') ? 'font-semibold text-gray-900' : ''"
                class="text-gray-700" preserve-state
              >
                Catelog
            </inertia-link>
        </div>

        <div>
          <inertia-link href="/about" :class="isUrl('/about') ? 'font-semibold text-gray-900' : ''"  class="mr-6 text-gray-700">About</inertia-link>
          <inertia-link href="/contact"  :class="isUrl('/contact') ? 'font-semibold text-gray-900' : ''" class="mr-6 text-gray-700">Contact</inertia-link>

          <inertia-link href="/carts"  :class="isUrl('/carts') ? 'font-semibold text-gray-900' : ''" class="text-gray-700">
              Carts ( {{ itemCount }} )
          </inertia-link>

        </div>
      </div>
    </header>

    <div class="pb-24">
      <slot />
    </div>


  </main>
</template>

<script>

  import store from '@/store'

  export default {
    props: {
      url: String,
    },

    computed: {
      itemCount() {
        return store.state.carts.length
      }
    },
    methods: {
      isUrl(...urls) {
        if (urls[0] === '') {
          return this.url === ''
        }

        return urls.filter(url => this.url.startsWith(url)).length
      },
    }
  }
</script>
