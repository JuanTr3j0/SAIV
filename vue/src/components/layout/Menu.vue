<template>   
    <!-- Menu -->
    <aside  class="layout-menu menu-vertical menu bg-menu-theme collapse-horizontal ">
        <div class="app-brand">
            <a href="javascript:void(0);" class="app-brand-link border border-2 my-3  border-primary rounded py-2 px-4 mx-auto">
                <span class="app-brand-logo demo">
                <img
                    src="https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png"
                    alt="user-avatar"
                    class="d-block rounded-3 mx-auto"
                    height="60"
                    width="60"
                    id="uploadedAvatar"
                    />
                </span>
                <span class="app-brand-text  menu-text fw-bolder ms-2" style="font-size:22px">SAIV{{store.state.USUARIO.oficina}}</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none" @click="store.state.SHOW_MENU =!store.state.SHOW_MENU">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>
        <div class="menu-inner-shadow"></div>
        <ul class="menu-inner py-1 scrollbar" style="overflow-y: auto;">
            <template v-for="(item, key) in menu">
                <template v-if="item.acceso.includes(store.state.USUARIO.acceso)">
                    <li class="menu-header small text-uppercase text-start " v-if="item.tipo==='encabezado'" :key="key">
                        <span class="menu-header-text">{{item.text}}</span>
                    </li>
                    <li class="menu-item" v-if="item.tipo==='item'" :key="key">
                        <router-link :to="item.url" class="menu-link">
                            <i v-if="typeof item.icono !=='undefined'" :class="item.icono"></i>
                            <i v-else class="menu-icon tf-icons bx bx-table"></i>
                            <div data-i18n="Tables">{{item.text}}</div>
                        </router-link>
                    </li>
                </template>
            </template>
        </ul>
    </aside>
    <!-- / Menu -->
</template>
<script>
import { defineComponent } from 'vue'
import store from '@/store/index'

export default defineComponent({
    setup:() => {
        const nivel_0 = ['Super Administrador'];
        const nivel_2 = ['Administrador','Super Administrador'];
        const nivel_3 = ['Usuaria/o','Super Administrador', 'Administrador'];
        return{
            menu:[
                { 
                    tipo:"encabezado",    
                    text:"Usuario", 
                    acceso:nivel_3
                },
                { 
                    tipo:"item",          
                    text:"Perfil",                  
                    url:"/saiv/perfil", 
                    icono:"bx bx-user bx-sm  bx-burst-hover mx-2", 
                    acceso:nivel_3
                },                
                { 
                    tipo:"encabezado",    
                    text:"SIAV"+store.state.USUARIO.oficina,
                    acceso:nivel_3
                },
                { 
                    tipo:"item",          
                    text:"Registro Casos",          
                    url:"/saiv/casos", 
                    icono:"bx bxs-box bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                {   
                    tipo:"item",          
                    text:"Seguimiento Jurídico",    
                    url:"/saiv/seguimiento/juridico",  
                    icono:'bx bxs-building-house bx-sm mx-2 bx-burst-hover',
                    acceso:nivel_3
                },
                { 
                    tipo:"item",
                    text:"Atención Ludoteca",
                    url:"/saiv/ludoteca",
                    icono:"bx bxs-calendar-event bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                {
                    tipo:"item",
                    text:"Camára Gessell",
                    url:"/saiv/camara/gessell",
                    icono:"bx bxs-food-menu bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                { 
                    tipo:"item",
                    text:"Estadisticas",
                    url:"/saiv/estadisticas",
                    icono:"bx bxs-bar-chart-alt-2 bx-sm bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                /*{ 
                    tipo:"item",
                    text:"Programación Camára Gessell",
                    url:"/saiv/camara/gessell/programacion",
                    icono:"bx bxs-food-menu bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                { 
                    tipo:"item",
                    text:"Menores de Edad Camára Gessell",
                    url:"/saiv/camara/gessell/menores/edad",
                    icono:"bx bxs-food-menu bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_3
                },
                
                { 
                    tipo:"item",
                    text:"Observatorio de Violencia",
                    url:"#",
                    icono:'bx bx-line-chart bx-sm mx-2',
                    acceso:nivel_3
                },
                { 
                    tipo:"item",          
                    text:"Reportes",       
                    url:"#",
                    icono:'bx bxs-report bx-sm mx-2',
                    acceso:nivel_3
                },*/
                { 
                    tipo:"encabezado",    
                    text:"Administración",      
                    acceso:nivel_2 
                },
                { 
                    tipo:"item",          
                    text:"Usuarias/os",                
                    url:"/saiv/usuarios", 
                    icono:"bx bx-group bx-sm  bx-burst-hover mx-2",
                    acceso:nivel_2
                },
                { 
                    tipo:"item",          
                    text:"Bitácora Errores",                
                    url:"/bitacora/errores",
                    icono:'bx bxs-bug bx-sm mx-2  bx-burst-hover', 
                    acceso:nivel_2
                },
            ],
            store
        }        
    },
})
</script>

<style scoped>
._active{
    color: #696cff;
    background-color: rgba(105, 108, 255, 0.16) !important;
    font-weight: 600;    
}
._active:hover{
    color: #696cff;
    background-color: #c3c4f7c9 !important;
    font-weight: 600;    
}
._active:focus{
    color: #696cff;
    background-color: rgba(105, 108, 255, 0.16) !important;
    font-weight: 600;
}
._active::after{
    content: "";
    position: absolute;
    left: 0;
    width: 0.35rem;
    height: 2.47rem;
    border-radius: 0.385rem 0 0 0.385rem;
    background: #696cff;
}
</style>