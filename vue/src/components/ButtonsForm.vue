<template>
    <div class="mt-3 float-end">
        <slot name="nuevo-button"/>
        <button type="button" class="btn btn-primary m-1" v-if="!showVer ?? true"
            @click="metodoEmit('guardar');" :disabled="loading">
            <i class="bx" :class="{'bx-save':!loading, 'bx-spin bx-loader':loading}"></i> Guardar
        </button>
        <button type="button" class="btn btn-secondary m-1" :disabled="loading" v-if="(!showVer ?? true) && (showReset ?? true) && false"
        @click="metodoEmit('resetForm')">
        <i class="bx bx-reset"></i> Reset</button>
        <button type="button" class="btn btn-primary m-1" v-show="showAnt ?? true"
        @click="metodoEmit('anterior')">
        <i class="bx bx-arrow-to-left"></i> Anterior</button>
        <button type="button" class="btn btn-primary m-1" v-show="showSig ?? true"
        @click="metodoEmit('siguiente')">
        <i class="bx bx-arrow-to-right"></i> Siguiente</button>
        <button type="button" class="btn btn-secondary m-1" :disabled="loading"
            @click="$emit('handleActualizarDatosTabla')"
            data-bs-dismiss="modal">
            <i class="bx bxs-exit"></i> Salir</button>
    </div>
</template>
<script>
import { defineComponent,} from 'vue'
export default defineComponent({
    props:[
        'loading',
        'showReset',
        'showSig', 
        'showAnt',    
        'showVer'   
    ],
    setup(props, { emit }) {

        const metodoEmit = (metodo) =>{
            emit(metodo);
        }
        return{
            metodoEmit
        }
    }
})
</script>