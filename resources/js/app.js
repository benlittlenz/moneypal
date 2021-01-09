import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import '~/plugins'
import '~/components'

import { MonthPicker } from 'vue-month-picker'
import { MonthPickerInput } from 'vue-month-picker'
import vClickOutside from 'v-click-outside'
import moment from 'moment'

Vue.prototype.moment = moment

Vue.use(vClickOutside)
Vue.use(MonthPicker)
Vue.use(MonthPickerInput)

Vue.config.productionTip = false
Vue.directive('click-outside', {
  bind: function (el, binding, vnode) {
    el.clickOutsideEvent = function (event) {
      // here I check that click was outside the el and his children
      if (!(el == event.target || el.contains(event.target))) {
        // and if it did, call method provided in attribute value
        vnode.context[binding.expression](event);
      }
    };
    document.body.addEventListener('click', el.clickOutsideEvent)
  },
  unbind: function (el) {
    document.body.removeEventListener('click', el.clickOutsideEvent)
  },
});
window.Bus = new Vue();
Vue.component('flash-message', require('./components/FlashMessage').default);

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
