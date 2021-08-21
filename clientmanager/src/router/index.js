import Vue from 'vue'
import VueRouter from 'vue-router'
import Manager from "../components/Manager.vue";
import ListItems from "../components/items/index.vue";
import addItems from "../components/items/add.vue";
import addCategorias from "../components/categorias/add.vue";

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
  {
    path: "/add",
    name: "Add",
    component: addItems,
  },
  {
    path: "/create",
    name: "create",
    component: addCategorias,
  },
];

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
