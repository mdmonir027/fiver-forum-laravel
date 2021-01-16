import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        categories: []
    },
    getters: {
        categories(state) {
            return state.categories;
        }
    },
    actions: {
        categories(data) {
            axios.get('/api/category')
                .then(response => {
                    data.commit('categories', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        }
    },
    mutations: {
        categories(state, data) {
            state.categories = data
        }
    },
})

export default store;
