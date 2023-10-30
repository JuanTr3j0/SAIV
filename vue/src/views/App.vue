<template>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar" :class="{'layout-menu-expanded active':store.state.SHOW_MENU}">
    <div class="layout-container" >
      <!-- Menu -->     
        <MenuVue></MenuVue>
      <!-- / Menu -->
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <BarraSuperiorVue />
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <router-view v-slot="{ Component }">
            <transition name="scale" mode="out-in">
              <component :is="Component" />
            </transition>
          </router-view>
          <!-- / Content -->
          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0 justify-content-end"> Desarrollado por
                <a href="https://bitzide.com/" target="_blank" class="footer-link fw-bolder">Bitzide Logic</a>
              </div>
            </div>
          </footer>
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->
</template>
<script>
import { defineComponent } from 'vue'
import MenuVue from '@/components/layout/Menu.vue'
import BarraSuperiorVue from '@/components/layout/BarraSuperior.vue'
import store from '@/store/index'
import router from '@/router'

if(localStorage.getItem('access_token') === null){
  store.commit('headerSesion');
  router.push({ name: "acceso"});
}else
  store.commit('headerSesionOk');

export default defineComponent({
    components: {
      MenuVue,
      BarraSuperiorVue
    },
    setup() {
      return{
        store
      }
    },
})
</script>
<style scoped>
.scale-enter-active,
.scale-leave-active {
  transition: all 0.5s ease;
}
.scale-enter-from,
.scale-leave-to {
  opacity: 0;
  transform: scale(0.9);
}


/* Las animaciones de entrada y salida pueden usar */
/* funciones de espera y duración diferentes.      */
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}
</style>
