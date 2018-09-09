Nova.booting((Vue, router) => {
    Vue.component('index-rating', require('./components/IndexField'));
    Vue.component('detail-rating', require('./components/DetailField'));
    Vue.component('form-rating', require('./components/FormField'));
})
