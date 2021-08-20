import Vue from 'vue'
import VueRouter from 'vue-router'
import Manager from "../components/Manager.vue";
import ListItems from "../components/items/index.vue";

Vue.use(VueRouter)

const routes = [
  {
    path: "/",
    name: "Home",
    component: Manager,
  },
  {
    path: "/list",
    name: "List",
    component: ListItems,
  },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
