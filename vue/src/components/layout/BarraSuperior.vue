<template>
    <nav
          class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar"
        >
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)" @click="store.state.SHOW_MENU =!store.state.SHOW_MENU">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">       

            <!-- User -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item lh-1">
                    <label
                        class="fw-semibold d-block"
                        href="#"
                        data-icon="octicon-star"
                        data-size="large"
                        data-show-count="true"
                    >
                    {{store.state.USUARIO.acceso??'Desconocido'}}
                 </label>
                </li> 
            </ul>          
            <!-- Place this tag where you want the button to render. -->
            <Popper class="popper-theme text-start" arrow :show="showPopper"> 
                <a class="nav-link dropdown-toggle hide-arrow" @click="showPopper=!showPopper;" @focus="falseShowPopper">
                    <div class="avatar avatar-online">
                        <!-- <img src="@/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> -->
                        <img src="https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div> 
                </a>            
               <template #content>
                   <button class="dropdown-item" href="#">
                       <div class="d-flex">
                           <!-- <div class="flex-shrink-0 me-3">
                               <div class="avatar avatar-online">
                               <img src="@/assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                               </div>
                           </div> -->
                           <div class="flex-grow-1 text-center">
                               <span class="fw-semibold d-block">
                                {{
                                    store.state.USUARIO.usuario??'Desconocido'
                                }}</span>
                               <small class="text-muted">{{store.state.USUARIO.correo??'Desconocido'}}</small>
                           </div>
                       </div>
                   </button>               
                   <div class="dropdown-divider"></div>               
                   <router-link :to="{name:'perfil'}" class="dropdown-item">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">Mi Perfil</span>
                    </router-link>                              
                   <div class="dropdown-divider"></div>               
                   <button class="dropdown-item" @click="cerrrarSesion">
                       <i class="bx bx-power-off me-2"></i>
                       <span class="align-middle">Cerrar Sesión</span>
                   </button>
               </template>
            </Popper>       
        </div>
    </nav>
</template>
<script>
import store from '@/store/index'
import Popper from "vue3-popper";
import crub from '@/services/crud';
import { ref } from "vue"
import router from '@/router';
export default {
    setup : () => {
        const showPopper = ref(false)
        const falseShowPopper = () =>{
            showPopper.value = false;
        }
        const cerrrarSesion = async()=>{
            await crub.obtener('auth/logout');
            localStorage.clear();
            router.push({ name: "acceso"});
        }
        return {
            cerrrarSesion,
            falseShowPopper,
            showPopper,
            store
        }
    }, 
    components: {
      Popper,
    },
    
}
</script>
<style scoped>
.popper-theme {
    --popper-theme-background-color: #ffffff;
    --popper-theme-background-color-hover: #ffffff;
    --popper-theme-text-color: #333333;
    --popper-theme-border-width: 1px;
    --popper-theme-border-style: solid;
    --popper-theme-border-color: #eeeeee;
    --popper-theme-border-radius: 7px;
    --popper-theme-padding: 3px;
    --popper-theme-box-shadow: 0 6px 30px -6px rgba(0, 0, 0, 0.25);
}
</style>