<template>
    <div>
        <div style="min-height: 70px;" class="border border-3 border-warning alert alert-danger text-white text-center text-warning text-wrap ">
            <i class='bx bx-pull-left bx-lg bxs-error bx-flashing text-warning'></i>
            <h5 class="text-warning fw-bold fa-2xl">{{mensaje}}</h5>        
        </div>
        <div class=" float-end">
            <button type="button" class="btn btn-secondary m-1" :disabled="loading ?? false"
                data-bs-dismiss="modal">
                <i class="bx bx-sm bx-exit bx-flashing-hover"></i> Salir</button>
            <button type="button" class="btn btn-danger m-1" data-bs-dismiss="modal"
                @click="()=>{$emit('continuar', json.key);}" :disabled="loading ?? false">
                <i class="bx bx-sm bx-flashing-hover" :class="{'bx-check ':!loading, 'bx-spin bx-loader':loading}"></i> Continuar
            </button>
        </div>
    </div>
</template>
<script>
import { defineComponent, ref } from 'vue'
export default defineComponent({
    props:[
        'mensaje',
        'loading'
    ],
    setup:(props, {emit})=>{
        const json = ref(null)
        const setJson = (_json) =>{
            json.value = _json;
        }
        
        return {
            json,
            setJson
        }
    }
    
})
</script>