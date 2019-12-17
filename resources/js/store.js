import Vuex from 'vuex'


const store = new Vuex.Store({
  state: {
    count: 0,
    carts: [],
  },
  mutations: {
    increment (state) {
      state.count++
    },
    addToCart(state, payload) {
        state.carts.push(payload)
    }
  }
})


export default store
