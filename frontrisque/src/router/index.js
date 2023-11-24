import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import ActifView from '@/components/ActifView'
import AddActifView from '@/components/AddActifView'
import RisqueToAddView from '@/components/RisqueToAddView'
import PTRView from '@/components/PTRView'
import PTRToAddView from '@/components/PTRToAddView'
import RisqueView from '@/components/RisqueView'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/actifview',
      name: 'ActifView',
      component: ActifView
    },
    {
      path: '/addactifview',
      name: 'AddActifView',
      component: AddActifView
    },
    {
      path: '/risquetoaddview',
      name: 'RisqueToAddView',
      component: RisqueToAddView
    },
    {
      path: '/risqueview',
      name: 'RisqueView',
      component: RisqueView
    },
    {
      path: '/ptrview',
      name: 'PTRView',
      component: PTRView
    },
    {
      path: '/ptrtoaddview',
      name: 'PTRToAddView',
      component: PTRToAddView
    }
  ]
})
