
require('./bootstrap');
window.Vue = require('vue');

// event for handling events
window.EventBus = new Vue();


// icon component

// Vue.component('app-home', require('./components/Welcome').default);


new Vue({
    render: h => h(App),

}).$mount('#app')
