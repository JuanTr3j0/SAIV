<template>
    <div>
        <ModalVue ref="modalAgendaRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <div class="border border-2 border-light mx-0 p-1 rounded">
                    <form>
                        <div class="card-body p-2 clearfix">
                            <div class="container-fluid border border-2 border-primary rounded-3">
                                <div class="row">
                                    <div class="col-md mt-2">
                                        <h3 class="my-2"> <i class="bx bx-calendar bx-md bx-tada-hover"></i> Agenda / Actividad</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md mb-2">
                                        <label class=" fw-bold"><code>*</code>Titulo</label>
                                        <textarea
                                            :id="'agenda-titulo'"
                                            class=" form-control"
                                            :disabled = "loading || (showVer ?? false)"
                                            v-model="formulario.titulo"
                                            cols="20" rows="2" 
                                            placeholder="Ingrese"
                                        />
                                    </div>
                                </div>
                                <div class="row">
                                    <FormInput
                                    :id="'agenda-fecha-inicio'"
                                    :obligatorio="true"
                                    :loading="loading"
                                    :type="'datetime-local'"
                                    :clases="'col-md-12  mb-2'"
                                    :showVer ="showVer"
                                    :disabled="loading"
                                    :titulo="'Fecha Inicio'"
                                    v-model:value="formulario.fecha_inicio"
                                    />
                                    <FormInput
                                    :id="'agenda-fecha-final'"
                                    :loading="loading"
                                    :clases="'col-md-12  mb-2'"
                                    :type="'datetime-local'"
                                    :showVer ="showVer"
                                    :disabled="loading"
                                    :titulo="'Fecha Final (Opcional)'"
                                    v-model:value="formulario.fecha_final"
                                    />
                                </div>
                            </div>
                            <div class="px-2">
                                <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                            </div>
                            <ButtonsFormVue
                                :showVer="showVer ?? false"
                                :loading="loading"
                                :showSig="false"
                                :showAnt="false"
                                :showReset="false"
                                @guardar="handledClickGuardar"
                            >
                                <template v-slot:nuevo-button>
                                    <slot name="nuevo-button" />
                                    <button class="btn btn-danger" type="button" v-if="formulario.key!==null" @click="handleClickBorrar(formulario)"> 
                                        <i class="bx bxs-trash-alt bx-tada-hover"></i> Eliminar
                                    </button>
                                </template>
                            </ButtonsFormVue> 
                        </div>
                    </form>
                </div>
            </template> 
        </ModalVue>   
        <ModalVue ref="modalBorrarRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="'El siguiente registro de Agenda se borrara de la base de datos, ¿Continuar?'"
                    @continuar="borrarActividadAgenda"
                />
            </template>
        </ModalVue>  
    </div>
</template>
<script>
import servicios         from '@/services/crud'
// Components
import ModalVue             from '@/components/Modal.vue';
import FormInput            from '@/components/FormInput.vue'
import AlertVue             from '@/components/Alert.vue';
import ButtonsFormVue       from '@/components/ButtonsForm.vue';
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
// Vue
import { reactive, ref, defineComponent } from 'vue';
export default defineComponent({
    props:[
        'modulo'
    ],
    components:{
        ModalVue,
        FormInput,
        AlertVue,
        ButtonsFormVue,
        AdvertenciaVue,
    },
    setup(props, {emit}) {
        const form = {
            key:null,
            titulo:null,
            modulo:props.modulo ?? null,
            fecha_inicio:null,
            fecha_final:null,
        };
        const formulario    = reactive(JSON.parse(JSON.stringify(form)));
        const loading       = ref(false);
        const showVer       = ref(false);
        const tipoAlert     = ref(null);
        const mensajesAlert = ref(null);
        
        // Ref
        const modalAgendaRef = ref(null);
        const advertenciaRef = ref(null);
        const modalBorrarRef = ref(null);
        
        function resetForm() {
            tipoAlert.value     = null;
            mensajesAlert.value = null;
            loading.value       = false;
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
        };

        function editForm(_form) {
            Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
            formulario.modulo = props.modulo;
        };

        const showModal = () => modalAgendaRef.value.showModal();
        const hideModal = () => modalAgendaRef.value.hideModal();

        const handledClickGuardar = async() =>{
            loading.value = true;                
            try {
                const _response = await servicios.actualizarCrear(formulario, 'saiv/agenda/guardar');
                if(_response.ok)
                {
                    if(_response.json.error){
                        tipoAlert.value = 'warning';
                        mensajesAlert.value = _response.json.error;
                    }else{
                        formulario.key = _response.json.key;
                        tipoAlert.value = mensajesAlert.value = null;
                    }
                }
                loading.value = false;      
            } catch (error) {    
                console.log(error);            
                console.log('¡Ups ocurrio un error!, no se guardo el registro.');
                loading.value = false;
            }
        };
        const handleClickBorrar = (_json) => {
            modalAgendaRef.value.hideModal();
            advertenciaRef.value.setJson(_json); 
            modalBorrarRef.value.showModal(); 
        }
        const borrarActividadAgenda = async _key =>{
            if(typeof _key !== 'undefined'){
                loading.value = true;              
                const _response = await servicios.borrarCaso({key:_key}, 'saiv/agenda/borrar');
                if(typeof _response !== 'undefined' && typeof _response._json !== 'undefined'){
                    if(_response.ok && _response._json.borrado){
                        resetForm();
                    }
                }
                loading.value = false;            
            }
            modalAgendaRef.value.showModal();
        };
        return{
            // Variables
            mensajesAlert,
            formulario,
            tipoAlert,
            loading,
            showVer,

            //Ref
            modalAgendaRef,
            advertenciaRef,
            modalBorrarRef,

            // Metodos
            editForm,
            showModal,
            hideModal,
            resetForm,
            handleClickBorrar,
            handledClickGuardar,
            borrarActividadAgenda,
        }
  },
})
</script>