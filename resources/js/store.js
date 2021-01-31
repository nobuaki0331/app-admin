import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    token: 'XPhsWe3LMobdRER5hUF3OZWt7dug9IkgX9RhSAiNBN8EYWR9H7dtD1g73kSL',
    message: 'hoge',
  },
  getters: {
    hogege: state => state.message.toUpperCase()
  },
  mutations: {
    updateMessage(state) {
      state.message = 'hhhhhhhhhhhhhh'
    },
  },
})
