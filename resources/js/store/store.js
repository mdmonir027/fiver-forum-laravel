import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        categories: [],
        posts: [],
        post: [],
        replies: [],
        searchPosts: [],
        popularPost: []
    },
    getters: {
        categories(state) {
            return state.categories;
        },
        posts(state) {
            return state.posts;
        },
        post(state) {
            return state.post;
        },
        replies(state) {
            return state.replies;
        },
        searchPosts(state) {
            return state.searchPosts;
        },
        popularPost(state) {
            return state.popularPost;
        }
    },
    actions: {
        categories(data) {
            axios
                .get("/api/category")
                .then(response => data.commit("categories", response.data))
                .catch(error => false);
        },
        posts(data) {
            axios
                .get("/api/post")
                .then(response => data.commit("posts", response.data))
                .catch(error => false);
        },
        post(data, slug) {
            axios
                .get(`/api/post/${slug}`)
                .then(response => data.commit("post", response.data))
                .catch(error => false);
        },
        replies(data, slug) {
            axios
                .get(`/api/post/${slug}/reply`)
                .then(response => data.commit("replies", response.data))
                .catch(error => false);
        },
        searchPosts(data, search) {
            axios
                .get(`/api/search/${search}`)
                .then(response => data.commit("searchPosts", response.data))
                .catch(error => false);
        },
        popularPost(data) {
            axios
                .get("/api/post")
                .then(response => data.commit("popularPosts", response.data))
                .catch(error => false);
        }
    },
    mutations: {
        categories(state, data) {
            state.categories = data;
        },
        posts(state, data) {
            state.posts = data;
        },
        post(state, data) {
            state.post = data;
        },
        replies(state, data) {
            state.replies = data;
        },
        addReplies(state, reply) {
            state.replies.unshift(reply);
        },
        searchPosts(state, data) {
            state.searchPosts = data;
        },
        popularPosts(state, data) {
            data.sort((prev, currr) => {
                if (prev.replies_count > currr.replies_count) return -1;
                if (prev.replies_count < currr.replies_count) return 1;
                return 0;
            }, data[0]);
            state.popularPost = data;
        }
    }
});

export default store;
