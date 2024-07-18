<template>
    <div class="card p-2">
        <div class="border border-primary border-3 rounded-2 text-center p-3">
            <h4 v-if="titulo ?? false">
                <strong>{{titulo}}</strong>
            </h4>
            <div class="container-fluid p-1 mt-3" >
                <h5>Archivos (Servidor)</h5>
                <ul class="list-group border border-1 border-primary text-start" v-auto-animate>
                    <li class="list-group-item" v-for="item in archivos" :key="item.key">
                        <div><strong>{{item.nombre_original}}</strong></div> 
                        <div>                                    
                            <button class="btn btn-sm btn-success rounded-3 m-1" :disabled="loading"
                                @click="$emit('handledDescargarArchivo', item.key, item.nombre_original)">
                                Descargar <i class="bx bx-download"></i>
                            </button>
                            <Popper class="popper-theme text-start" arrow>
                                <button class="btn btn-sm btn-danger rounded-3 m-1" :disabled="loading">
                                    Eliminar <i class="bx bx-x"></i>
                                </button>
                                <template #content="{ close }">
                                    <div class="dropdown-header">
                                        <h6 class="text-wrap text-nowrap "><strong>Esta acción no se podra revertir,<br> ¿Continuar?</strong></h6>
                                    </div>
                                    <button class="dropdown-item text-start-center" @click="handledBorrarArchivo(item.key);close();" :disabled="loading">
                                         <i class="bx bx-check"></i> Continuar
                                    </button>
                                    <button class="dropdown-item text-start-center" @click="close();" :disabled="loading">
                                        <i class="bx bx-x"></i> Cancelar
                                    </button>
                                </template>
                            </Popper>
                        </div>
                    </li> 
                    <h5 class="text-wrap text-nowrap mt-2 text-center" v-show="archivos.length===0">
                        <strong><i class="bx bx-md bx-no-entry text-danger"></i> No existen archivos.</strong>
                    </h5>
                </ul>
            </div>
        </div>
        <div class="container-fluid text-end">
            <button type="button" class="btn btn-secondary m-1 mt-3" :disabled="loading"
                data-bs-dismiss="modal">
                <i class="bx bx-exit"></i> Salir
            </button>
        </div>
    </div>
</template>
<script>
import { defineComponent, ref } from 'vue'
import Popper from "vue3-popper";
export default defineComponent({
    props:['loading'],
    setup:(props, {emit})=>{
        const titulo = ref(null)
        const key = ref(null)
        const archivos = ref([])
        const cargarArchivos = (_archivos) => archivos.value = _archivos;
        const cargarTitulo = (_titulo) => titulo.value = _titulo;
        const cargarKey = (_key) => key.value = _key;
        const handledBorrarArchivo = (key_archivo) => emit('handledBorrarArchivo', key.value, key_archivo)
        return {
            archivos,
            titulo,
            key,
            handledBorrarArchivo,
            cargarArchivos,
            cargarTitulo,
            cargarKey
        }
    },components: {
      Popper,
    },
})
</script>
<style scoped>
.list-group{
    max-height: 300px;
    min-height: 150px;
    margin-bottom: 10px;
    overflow-y:scroll;
    -webkit-overflow-scrolling: touch;
}
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