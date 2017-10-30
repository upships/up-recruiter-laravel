
/* Interface components */

Vue.component('toolbar', require('./components/Toolbar.vue'));
Vue.component('toolbar-item', require('./components/ToolbarItem.vue'));

/* Jobs components */

Vue.component('job-applications', require('./components/Job/Application/List.vue'));
Vue.component('job-application', require('./components/Job/Application/Item.vue'));

Vue.component('jobs-list', require('./components/Job/List.vue'));
Vue.component('jobs-item', require('./components/Job/Item.vue'));

/* Selections components */

Vue.component('selections-list', require('./components/Selection/List.vue'));
Vue.component('selections-item', require('./components/Selection/Item.vue'));

/* Profile Components */

Vue.component('selection-applications', require('./components/Selection/Application/List.vue'));
Vue.component('selection-application', require('./components/Selection/Application/Item.vue'));

Vue.component('profile-certificates', require('./components/Profile/Certificate/List.vue'));
Vue.component('profile-certificate', require('./components/Profile/Certificate/Item.vue'));

Vue.component('profile-works', require('./components/Profile/Work/List.vue'));
Vue.component('profile-work', require('./components/Profile/Work/Item.vue'));

Vue.component('profile-education', require('./components/Profile/Education/List.vue'));
Vue.component('profile-education-item', require('./components/Profile/Education/Item.vue'));

Vue.component('profile-coes', require('./components/Profile/Coe/List.vue'));
Vue.component('profile-coe', require('./components/Profile/Coe/Item.vue'));

Vue.component('profile-dp', require('./components/Profile/Dp/List.vue'));
Vue.component('profile-dp-item', require('./components/Profile/Dp/Item.vue'));

Vue.component('profile-extras', require('./components/Profile/Extra/List.vue'));
Vue.component('profile-extra', require('./components/Profile/Extra/Item.vue'));

Vue.component('profile-languages', require('./components/Profile/Language/List.vue'));
Vue.component('profile-language', require('./components/Profile/Language/Item.vue'));

Vue.component('profile-passports', require('./components/Profile/Passport/List.vue'));
Vue.component('profile-passport', require('./components/Profile/Passport/Item.vue'));

Vue.component('profile-seaman-books', require('./components/Profile/SeamanBook/List.vue'));
Vue.component('profile-seaman-book', require('./components/Profile/SeamanBook/Item.vue'));

Vue.component('profile-ships', require('./components/Profile/Ship/List.vue'));
Vue.component('profile-ship', require('./components/Profile/Ship/Item.vue'));

Vue.component('profile-coc', require('./components/Profile/Coc.vue'));