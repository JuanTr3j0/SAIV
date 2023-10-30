<template>
    <div :class="clases ?? []">
        <span class="input-group-text fw-bold text-primary" v-if="(clases??[]).includes('input-group')"><code v-if="obligatorio ?? false">*</code>{{nombre}}</span>
        <label class=" fw-semibold d-block" :for="id" v-else><code v-if="obligatorio ?? false">*</code>{{nombre}}</label>
        <template v-if="(showVer??false) !== true">
            <select
                class="form-select" 
                :value="opcion ?? 'Seleccione'" 
                :id="id" 
                aria-label="Default select"
                @input="updatedOpcion" 
                :disabled="(showVer ?? false) || loading || opciones.length < 1 || disabled">
                <option :value="null" selected>Seleccione</option>
                <template v-for="item in opciones" :key="item">
                    <option 
                    :value="typeof item === 'object' ? item.key: item"
                    :selected="typeof item  === 'object' ? item.key === opcion : item===opcion">
                    {{typeof item === 'object'?item.opcion : item}}
                </option>
                </template>
            </select>
        </template>
        <label v-else class="form-control text-primary fw-bold">
            {{getItem(opciones, opcion)}}
        </label>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
export default defineComponent({
    props:[
        'tipo',
        'clases', 
        'opciones', 
        'nombre', 
        'id', 
        'opcion', 
        'showVer', 
        'loading', 
        'obligatorio', 
        'disabled'
    ],
    setup(props, { emit }) {
        const updatedOpcion = (event) => {
            let value = event.target.value === 'Seleccione' ? null : event.target.value;
            emit('update:opcion', value);
        }
        const getItem = (array, opcion) => {
            if(typeof opcion === 'undefined' || opcion === null) 
                return 'No Ingresado';
    
            if((array??[]).length===0)
                return 'Error Opciones no Cargadas...';
                
            let itemOpcion  = array[0];
                
            if (typeof itemOpcion === 'string')
                return opcion;

            if (typeof itemOpcion === 'object')
                return array.find(item=> item.key === opcion).opcion;
        };
        return{
            updatedOpcion,
            getItem
        }
    },
})
</script>
