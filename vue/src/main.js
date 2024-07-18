import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// //Font Awesome Icons
// /* import the fontawesome core */
// import { library } from '@fortawesome/fontawesome-svg-core'

// /* import font awesome icon component */
// import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

// /* import specific solid icons */
// import {  faMagnifyingGlass, faEye 
// } from '@fortawesome/free-solid-svg-icons'

// /* import specific solid icons */
// import { faTrashCan } from '@fortawesome/free-regular-svg-icons'

// /* add icons to the library */
// library.add(
//     faMagnifyingGlass, faEye,
//     faTrashCan, 
// )

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';
import { autoAnimatePlugin } from '@formkit/auto-animate/vue'


createApp(App)
    .use(store)
    .use(router)
    .use(autoAnimatePlugin)
    .component('v-select', vSelect)/*.component('font-awesome-icon', FontAwesomeIcon)*/
.mount('#app')

