import Vue from 'vue'
import store from './store'
import App from './components/App'

Vue.component('app-section', {
	props: ['data', 'auth'],
	template: '<App :data="data" :auth="auth"/>',
	components: { App }
})

new Vue({
	el: '#app',
	store
})