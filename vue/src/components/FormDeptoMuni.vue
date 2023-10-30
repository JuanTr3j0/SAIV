<template>
    <div class="col-md-3 pt-sm-2 pt-md-0">
        <label class=" fw-semibold d-block" :for="'departamento-'+persona"> Departamento {{persona}}</label>
        <div class="col-md" v-if="(showVer??false) !== true">
            <select class="form-select" :value="departamento === null?'Seleccione':departamento" :id="'departamento-'+persona" aria-label="Default select example"
                @input="updatedDepartamento" :disabled="(showVer??false) || loading">
                <option :value="null" selected>Seleccione</option>
                <template v-for="(item, _key) in departamentos" :key="_key">
                    <option :value="item.key" :selected="item.key">{{item.departamento}}</option>
                </template>
            </select>
        </div>
        <label class="form-control text-primary fw-bold" v-else>
            {{getItem(departamentos, departamento, 'departamento')}}
        </label>
    </div>
    <div class="col-md-3 pt-sm-2 pt-md-0">
        <label class=" fw-semibold d-block" :for="'municipio-'+persona"> Municipio {{persona}}</label>
        <div class="col-md" v-if="(showVer??false) !== true">
            <select  class="form-select" :id="'municipio-'+persona" aria-label="Default select example" v-model="municipio_aux"
            :disabled="departamento===null || municipios.length===0 || (showVer??false) || loading" @input="updatedMunicipio" :value="municipio">
                <option :value="null" selected>Seleccione</option>
                <template  v-for="(item, _key) in municipios" :key="_key">
                    <option :value="item.key">{{item.municipio}}</option>
                </template>
            </select>
        </div>
        <label v-else class="form-control text-primary fw-bold">
            {{getItem(municipios, municipio, 'municipio')}}
        </label>
    </div>
</template>
<script>
import servicios from '@/services/crud'

import { onMounted, ref } from 'vue'
export default {
    props:['persona','departamento', 'municipio', 'departamentos', 'showVer', 'loading'],
    watch:{
        async departamento(nuevo, anterior){
            if(nuevo!==anterior){
                await this.cargarMunicipios(nuevo);
                let index = this.municipios.findIndex((item) => item.key === this.municipio);
                this.municipio_aux = (index === -1) ? null : this.municipio_aux = this.municipio;
            }
        },
        municipio(nuevo, anterior){
            if(nuevo === anterior)
                return;
            this.municipio_aux = this.municipio;
        }
    },
    setup(props, context){
        const municipios = ref([])
        const municipio_aux = ref(props.municipio)
        const departamento = ref(props.departamento)
        
        const updatedDepartamento = (event) => {           
            context.emit('update:municipio', municipio_aux.value);
            context.emit('update:departamento', event.target.value);
        };

        const updatedMunicipio = (event) => {
            context.emit('update:municipio', event.target.value);
        };

        const cargarMunicipios = async(_departamento)  => {
            const response = await servicios.obtener('saiv/opciones/municipios/'+_departamento);
            municipios.value = response.municipios  
            municipios.value ??= []
        };

        const getItem = (array, key, string) => {
            let _item = array.find(item => key === item.key);
            return typeof _item !== 'undefined' ? _item[string] : 'N/A';
        };

        onMounted(async () => {
            if(departamento.value!== null)
            {
                await cargarMunicipios(departamento.value);
            }
        })
        return { 
            cargarMunicipios,
            updatedDepartamento, 
            updatedMunicipio,
            getItem,
            municipios, 
            municipio_aux,
        }
    }
}
</script>
