/**
 * plugins/index.js
 *
 * Automatically included in `./src/main.js`
 */

import router             from '@/route'
import store              from '@/store'
import http               from "@/plugins/http";
import helpers            from "@/plugins/helpers";


/*For All CSS & SCSS*/
import '@fortawesome/fontawesome-free/css/all.min.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@/assets/scss/main.scss'

/*For All CSS & SCSS*/

// Bootstrap JS (for modal, dropdown, tooltip, etc.)
import 'bootstrap/dist/js/bootstrap.bundle.min.js'



export function registerPlugins (app) {
    app.use(router).use(store)
    app.config.globalProperties.$helpers = helpers;
    app.config.globalProperties.$http = http;
}
