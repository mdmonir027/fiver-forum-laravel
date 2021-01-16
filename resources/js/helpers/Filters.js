import Vue from 'vue'

Vue.filter('str_limit', (value, length = 0) => {
    return value.substring(0, length) + '...'
})
