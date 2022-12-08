import './bootstrap';
import { createApp } from 'vue';

import * as VueRouter from 'vue-router';
import { createI18n } from 'vue-i18n'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
const app = createApp({})
const options = {
    position: 'top-center',
    duration : 2000,
    theme: "toasted"
};

import messages from '@intlify/vite-plugin-vue-i18n/messages'
const i18n = createI18n({
    legacy: false,
    globalInjection: true,
    locale: "en",
    fallbackLocale: "en",
    availableLocales: ["en", "de"],
    messages: messages,
});



import navbar from './components/navbar.vue'
import login from './components/login.vue'
import register from './components/register.vue'
import verify from './components/verify.vue'
import two_factor_auth from './components/two_factor_auth.vue'
import forget_password from './components/forget_password.vue'
import confirm_password from './components/confirm_password.vue'
import success_password from './components/success_password.vue'
import dashboard from './components/dashboard.vue'
import dashboard_footer from './components/footer.vue'
import all_users from './components/all_users.vue'
import user_profile from './components/view_profile.vue'
import settings from './components/edit_profile.vue'
import deactivate from './components/account_deactivate.vue'
import verify_email from './components/verify_email.vue'
import add_treatment from './components/add_treatment_model.vue'
import add_location from './components/locations/add_locations.vue'
import all_locations from './components/locations/all_locations.vue'
import edit_locations from './components/locations/edit_locations.vue'
import add_company from './components/company/add_company.vue'
import all_companies from './components/company/all_companies.vue'
import edit_company from './components/company/edit_company.vue'
import add_room from './components/rooms/add_room.vue'
import all_rooms from './components/rooms/all_rooms.vue'
import edit_rooms from './components/rooms/edit_rooms.vue'
import add_feature from './components/features/add_feature.vue'
import all_feature from './components/features/all_feature.vue'
import edit_feature from './components/features/edit_feature.vue'
import edit_info from './components/settings.vue'
import image from './components/image.vue'
import add_role from './components/roles/add_role.vue'
import all_role from './components/roles/all_role.vue'
import edit_role from './components/roles/edit_role.vue'
import Formio from './components/custom.vue'
import Create_Form from './components/formbuilder.vue'
import fetch_user from './components/fetch_user.vue'
import Form_data from './components/formdata.vue'




const routes = [
    {
        name:'Form_data',
        path:'/Form_data',
        component:Form_data   

    },
    {
        name:'fetch_user',
        path:'/fetch_user',
        component:fetch_user   

    },
    {
        name:'Create_Form',
        path:'/Create_Form',
        component:Create_Form   

    },
    {
        name:'Formio',
        path:'/Formio',
        component:Formio

    },
    {
        name:'image',
        path:'/image',
        component:image
    },
    {
        path: '/login',
        component: login,
        name: "login",
    },
    {
        path: '/register',
        component: register,
        name: "register"
    },
    {
        path: '/verify',
        component: verify,
        name: "verify"
    },
    {
        path: '/two_factor_auth',
        component: two_factor_auth,
        name: "two_factor_auth"
    },
    {
        path: '/forget_password',
        component: forget_password,
        name: "forget_password"
    },
    {
        path: '/confirm_password/:token/:email',
        component: confirm_password,
        name: "confirm_password"
    },
    {
        path: '/success_password',
        component: success_password,
        name: "success_password"
    },
    {
        path: '/dashboard/',
        component: dashboard,
        name: "dashboard"
    },
    {
        path: '/all_users',
        component: all_users,
        name: "all_users"
    },
    {
        path: '/profile',
        component: user_profile,
        name: "profile"
    },
    {
        path: '/settings',
        component: settings,
        name: "settings"
    },
    {
        path: '/deactivate',
        component: deactivate,
        name: "deactivate"
    },
    {
        path: '/add_company',
        component: add_company,
        name: "add_company"
    },
    {
        path: '/add_location',
        component: add_location,
        name: "add_location"
    },
    {
    name:'all_locations',
    path:'/all_locations',
    component:all_locations
    },
    {
    nam:'edit_locations',
    path:'/edit_locations/:uuid',
    component:edit_locations
    },
    {
        name:'verify_email',
        path:'/verify_email/:email',
        component:verify_email
    },
   
    {
        path: '/add_room',
        component: add_room,
        name: "add_room"
    },
    {
        path: '/add_feature',
        component: add_feature,
        name: "add_feature"
    },
    {
        path: '/add_treatment',
        component: add_treatment,
        name: "add_treatment"
    },
    {
        path:'/all_companies',
        name:'all_companies',
        component:all_companies
    },
    {
        nam:'edit_company',
        path:'/edit_company/:uuid',
        component:edit_company
        },
    {
        path: '/all_rooms',
        component: all_rooms,
        name: "all_rooms"

    },
    {
        path:'/edit_rooms/:uuid',
        name:'edit_rooms',
        component:edit_rooms
    },
    {
        path: '/all_feature',
        component: all_feature,
        name: "all_feature"

    },
    {
        path:'/edit_feature/:uuid',
        name:'edit_feature',
        component:edit_feature
    },
    {
        path: '/edit_info',
        component: edit_info,
        name: "edit_info"
        
    },
    {
        path: '/add_role',
        component: add_role,
        name: "add_role"
    },
    {
    name:'all_role',
    path:'/all_role',
    component:all_role
    },
    {
    nam:'edit_role',
    path:'/edit_role/:uuid',
    component:edit_role
    },
];
const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/'),
    routes,
});
app.use(router);
app.use(i18n);
app.use(Toast, options);
app.component('login', login);
app.component('register', register);
app.component('navbar', navbar);
app.component('dashboard_footer', dashboard_footer);


app.mount('#app');