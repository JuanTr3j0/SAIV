<template>
    <div style="margin:0%">
        <Popper class="popper-theme text-start" arrow >
            <button  type="button" class="btn p-0 dropdown-toggle hide-arrow border px-3 btn-primary" :disabled="loading">
                <i class="bx bx-dots-horizontal-rounded" v-if="!loading"/>
                <div class="spinner-grow spinner-grow-sm" role="status" v-else>
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </button>
            <template #content="{ close }">
                <template v-for="(item, key) in getBotones()" :key="key">
                    <button class="dropdown-item text-start-center " v-if="item.show" :key="item.nombre" @click="handleClick(item.metodo);close();">
                        <i class="bx me-1" :class="item.icon" :style="item.style"></i> 
                        {{item.nombre}}
                    </button>
                </template>
            </template>
        </Popper>
    </div>
</template>
<script>
import { defineComponent, ref } from 'vue'
import Popper from "vue3-popper";
export default defineComponent({
    props:[
        'loading',
        'estado',
        'json',
        'showVer',
        'showArchivos',
        'showEditar',
        'showBorrar',
        'showEstado',
    ],
    data(){
        return{
            style: 'font-size:20px; ', 
            botones:[],
        }
    },
    methods: {
       getBotones: function(){
        return this.botones = [
                {   nombre:'Ver', 
                    icon:'bx-show ', 
                    show:this.showVer ?? false, 
                    metodo:'handleClickVer',
                    style: this.style
                },
                {   nombre:'Archivos', 
                    icon:'bx-file-find', 
                    show:this.showArchivos ?? false, 
                    metodo:'handleClickArchivos',
                    style: this.style
                },
                { 
                    nombre:'Editar', 
                    icon:'bx-edit-alt', 
                    show:this.showEditar ?? false, 
                    metodo:'handleClickEditar',
                    style: this.style 
                },
                { 
                    nombre: this.estado ==='Activo'?'Desactivar':'Activar', 
                    icon:this.estado!=='Activo'?'bx-check':'bx-x', 
                    show:this.showEstado ?? false,  
                    metodo:'handleClickEstado',
                    style: this.style
                },
              
                { 
                    nombre:'Imprimir', 
                   
                    icon:'bx bxs-file-pdf', 
                    show:this.showBorrar ?? false, 
                    metodo:'handleClickImprimir',
                    style: this.style
                },
                { 
                    nombre:'Borrar', 
                    icon:'bx-trash', 
                    show:this.showBorrar ?? false, 
                    metodo:'handleClickBorrar',
                    style: this.style
                }
            ];
        }
    },
    setup(props, { emit }) {

        const json = ref (props.json);

        const handleClick = (metodo) => {
            emit(metodo, json);
        };
        
        return{
            handleClick,
        }
    },
    components: {
      Popper,
    },
})
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