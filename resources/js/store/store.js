import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        categories: [],
        posts: [],
    },
    getters: {
        categories(state) {
            return state.categories;
        },
        posts(state) {
            return state.posts;
        },
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
        },
        posts(data) {
            axios.get('/api/post')
                .then(response => {
                    data.commit('posts', response.data)
                })
                .catch(error => {
                    console.log(error)
                })
        },
    },
    mutations: {
        categories(state, data) {
            state.categories = data
        },
        posts(state, data) {
            state.posts = data
        },

    },
})

export default store;
