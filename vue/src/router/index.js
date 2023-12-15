import { createRouter, createWebHistory } from 'vue-router'
import store from '@/store'

const routes = [
  { path: '/:pathMatch(.*)*', component: () => import('../views/PathNotFound') }, // 404
  {
    path: '/',
    name: 'index',
    component: () => import('../views/Index.vue'),
  },
  {
    path: '/testeo',
    name: 'testeF',
    component: () => import('../components/FullCalendar.vue'),
  },
  {
    path: '/acceso',
    name: 'acceso',
    component: () => import('../views/InicioSesionView.vue')
  },
  {
    path: '/saiv',
    name: 'app', 
    component: () => import('../views/App.vue'),
    children: [
      { path: '/:pathMatch(.*)*', component: () => import('../views/PathNotFound') }, // 404
      {
        path: '/saiv/usuarios',
        name: 'usuarios',
        component: () => import('../views/UsuariosView.vue'),
      },{
        path: '/saiv/casos',
        name: 'registroCasos',
        component: () => import('../views/CasosView.vue'),
      },{
        path: '/saiv/seguimiento/juridico',
        name: 'seguimientoJuridico',
        component: () => import('../views/SeguimientoJuridicoView'),
      },{
        path: '/saiv/ludoteca',
        name: 'ludoteca',
        component: () => import('../views/LudotecaView'),
      },{
        path: '/saiv/camara/gessell',
        name: 'camaraGessell',
        component: () => import('../views/CamaraGessellView.vue'),
      },{
        path: '/saiv/testeo',
        name: 'testeo',
        component: () => import('../views/AuxTest.vue'),
      },{
        path: '/saiv/perfil',
        name: 'perfil',
        component: () => import('../views/Perfil.vue'),
      },{
        path: '/saiv/oficina',
        name: 'oficina',
        component: () => import('../views/SeleccionarOficina.vue'),
      },{
        path: '/saiv/estadisticas',
        name: 'estadisticas',
        component: () => import('../views/EstadisticasView.vue'),
      },{
        path: '/bitacora/errores',
        name: 'bitacoraErrores',
        component: () => import('../views/BitacoraErrores.vue'),
      },
    ]
  }
]

const router = createRouter({
  linkActiveClass: "_active",
  //linkExactActiveClass: "exact-active",
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
