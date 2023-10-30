<template>
    <div class="card clearfix">  
        <div class="card-body">
            <form action="">
                <div class="row py-1 gy-2 mt-1 border border-2 border-primary rounded-3">
                    <div class="col-md-12 mt-2">
                        <h3 class="align-text-bottom"><i class='bx bxs-certification bx-md'></i>Camara Gessell / Programación</h3>                            
                    </div>
                    <FormInputVue
                        :id="id+'correlativo'"
                        :titulo="'Correlativo'"
                        :type="'number'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-3']"
                        v-model:value="formulario.correlativo"
                    />
                    <FormInputVue
                        :id="id+'fecha'"
                        :titulo="'Fecha'"
                        :type="'date'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-3']"
                        v-model:value="formulario.fecha"
                    />
                    <FormInputVue
                        :id="id+'hora'"
                        :titulo="'Hora'"
                        :type="'time'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-3']"
                        v-model:value="formulario.hora"
                    />
                    <FormInputVue
                        :id="id+'hora'"
                        :titulo="'Solicitado Por'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-12']"
                        v-model:value="formulario.solicitadoPor"
                    />
                    <FormInputVue
                        :id="id+'nombres'"
                        :titulo="'Nombres Usuaria/o'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-6']"
                        v-model:value="formulario.nombres"
                    />
                    <FormInputVue
                        :id="id+'apellidos'"
                        :titulo="'Apellidos Usuaria/o'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-6']"
                        v-model:value="formulario.apellidos"
                    />
                    <FormSelectOpcionVue
                        :id="id+'realizada'"
                        :nombre="'Realizada'"
                        :opciones="[{key:1, opcion:'Si'}, {key:0, opcion:'No'}]"
                        :clases="['col-md-2']" 
                        :loading="loading" 
                        :showVer="showVer ?? false"
                        v-model:opcion="formulario.realizada"
                    />
                    <FormSelectOpcionVue
                        :id="id+'caso-saiv'"
                        :nombre="'Caso SAIV'+store.state.USUARIO.oficina"
                        :opciones="[{key:1, opcion:'Si'}, {key:0, opcion:'No'}]"
                        :clases="['col-md-2']" 
                        :loading="loading" 
                        :showVer="showVer ?? false"
                        v-model:opcion="formulario.casoSaiv"
                        @change="if(formulario.casoSaiv !== 'true') formulario.codigoCaso = null;"
                    />
                    <div class="col-md-4" v-show="formulario.casoSaiv">
                        <label class=" fw-semibold d-block">
                            {{!showVer?'Busqueda y Selección del Caso': 'Código del Caso'}}
                            <i class="bx bx-search bx-sm" v-if="!showVer"/>
                        </label>
                        <V1_SelectPaginationVue v-if="!(showVer ?? false)"
                            :url="'saiv/casos/indexSelect'"
                            :disabled="(showVer ?? false)"
                            v-model="formulario.codigoCaso"
                        />
                        <label v-else class="fw-semibold d-block text-primary form-control">
                            {{(formulario.codigoCaso === null ? 'No Ingresado': formulario.codigoCaso.label )}}
                        </label>
                    </div>
                    <br>
                    <div class="px-2">
                        <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                    </div> 
                </div>
                <ButtonsFormVue
                    :showVer="showVer ?? false"
                    :loading="loading"
                    :showSig="false"
                    :showAnt="false"
                    @guardar="guardar"
                >
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button" />
                    </template>
                </ButtonsFormVue>
            </form>
        </div>
    </div>
</template>
<script>

// Component
import V1_SelectPaginationVue   from '@/components/V1_SelectPagination.vue';
import FormSelectOpcionVue      from '@/components/FormSelectOpcion.vue';
import ButtonsFormVue           from '@/components/ButtonsForm.vue';
import FormInputVue             from '@/components/FormInput.vue';
import AlertVue                 from '@/components/Alert.vue';
// Servicios
import servicios from '@/services/crud';
import store from '@/store';

import { defineComponent, ref, reactive } from "vue"
export default defineComponent({    
    props:['showVer'], 
    components:{
        V1_SelectPaginationVue,
        FormSelectOpcionVue,
        ButtonsFormVue,
        FormInputVue,
        AlertVue,
    },
    setup(props) {
        // Variables
        const id = ref('camara-gessell-programacion-');
        const loading = ref(false);
        const tipoAlert = ref(null);
        const mensajesAlert = ref(null);
        const form = {
            key:null,
            correlativo:null,
            fecha:null,
            hora:null,
            solicitadoPor:null,
            nombres:null,
            apellidos:null,
            casoSaiv:null,
            realizada:null,
            codigoCaso:null,
        };
        const formulario = reactive(JSON.parse(JSON.stringify(form)));
        function editForm(_form) {
            Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
        };
        // Metodos
        function resetForm() {
            tipoAlert.value     = null;
            mensajesAlert.value = null;
            loading.value       = false;
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
        };
        
        const handleChangeLoading = _loading => loading.value = _loading; 
        const guardar = async() =>{
            try {
                loading.value = true;                
                const _response = await servicios.actualizarCrear(formulario, 'saiv/camara/gessell/programacion/guardar');
                if(_response.ok)
                {
                    if(_response.json.error){
                        tipoAlert.value = 'warning';
                        mensajesAlert.value = _response.json.error;
                        return;
                    }
                    
                    formulario.key = _response.json.key;
                    formulario.correlativo = _response.json.correlativo;
                    tipoAlert.value = mensajesAlert.value = null;
                    
                }
                loading.value = false;                
            } catch (error) {                
                console.log('¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento');
                loading.value = false;
            }
        }; 
        return{
            // Constantes
            store,

            // Variables
            formulario,
            mensajesAlert,
            tipoAlert,
            loading,
            id,

            // Metodos
            handleChangeLoading,
            resetForm,
            editForm,
            guardar
        }
    }
});
</script>