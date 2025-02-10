<template>
    <div class="container-fluid flex-grow-1 container-p-y">
<<<<<<< HEAD
        <h4 class="fw-bold py-3 mb-2">
            <span class="text-muted fw-light text-center">
                SAIV{{store.state.USUARIO.oficina}} /
            </span> {{itemBoolean ? 'Cámara Gesell / Programación':'Cámara Gesell / Atención a Menores'}}
        </h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item mx-2">
                    <button type="button" class="nav-link border border-primary" :class="{'active':itemBoolean}" @click="itemBoolean = true">
                        <i class="bx bxs-book-bookmark me-1 bx-sm bx-flashing bx-tada-hover"></i> Programación 
                    </button>
                </li>
                <li class="nav-item mx-2">
                    <button type="button" class="nav-link border border-primary" :class="{'active':!itemBoolean}" @click="itemBoolean = false">
                        <i class="bx bx-user-pin me-1 bx-sm bx-flashing bx-tada-hover"></i> Atención a Menores
                    </button>
                </li>
                </ul>
            </div>
        </div>
        <ProgramaciónView
            v-if="itemBoolean"
        />
        <AtencionMenoresView
            v-if="!itemBoolean"
        />
    </div>
</template>
<script>
import store from "@/store";
import ProgramaciónView from "./ProgramacionView.vue";
import AtencionMenoresView from "./AtencionMenoresView.vue";
import { ref } from 'vue';
export default {
    components:{
        ProgramaciónView,
        AtencionMenoresView
    },
    setup() {
        const itemBoolean = ref(true);
        return {
            itemBoolean,
            store
        }
    },
}
</script>
=======
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">SAIV{{store.state.USUARIO.oficina}} /</span> Atención psicológica
        </h4>
        <!-- Bordered Table -->
        <div class="card">
            <div class="card-body">                
                <TableVue ref="tablaLudotecaRef" 
                    :columnas="columnas" 
                    :url="urlTabla" 
                    :titleFiltro="'Tipo de Denuncia'"
                    :arrayFiltro="['Todos', 'Denuncia', 'Sin Denuncia']"
                    @handleChangedLoading="handleChangedLoading"
                    @handleChangedData="handleChangedData"
                >
                    <template v-slot:button >
                        <button class="btn btn-primary m-1 justify-items-start" 
                            @click="handleClickNuevo" :disabled="loading">
                            <i class="bx bx-plus" style="font-size:20px"/> Nuevo
                        </button> 
                    </template> 
                    <template v-slot:buttons>
                        <button class="btn btn-dark m-1 justify-items-start" 
                            @click="cargarAgenda" :disabled="loading">
                            <i class="bx bx-calendar" style="font-size:20px"/> Agenda
                        </button> 
                    </template>
                    <template v-slot:tbody>
                        <tr v-for="(ludoteca, key) in data" :key="key">
                            <td class="text-nowrap">
                                <span>{{ludoteca.adolecenteNino ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap">
                                <span>{{ludoteca.responsable ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap fw-bold text-center">
                                <span>{{ludoteca.tipoAtencionFechaHora?? ''}}</span>
                            </td>  
                            <td class="text-nowrap fw-bold">
                                <span>{{ludoteca.codigo ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap">
                                <span>{{ludoteca.tipoAtencion?? ''}}</span>
                            </td>  
                            <td class="text-nowrap text-center">
                                <span>{{(ludoteca.proximaCita?? '')}}</span>
                            </td>  
                            <td id="acciones" style="padding:0%;" class="text-center">
                                <AccionesTable 
                                :json="ludoteca"
                                :loading="loading" 
                                :showEditar="true"
                                :showBorrar="true"
                                :showVer="true" 
                                @handleClickVer="handleClickVer(ludoteca)"
                                @handleClickEditar="handleClickEditar(ludoteca)"
                                @handleClickBorrar="handleClickBorrar(ludoteca)"
                                />
                            </td> 
                        </tr>
                    </template>
                </TableVue> 
            </div>
        </div>

        <ModalVue ref="modalAtencionPsicologicaRef" @handleActualizarDatosTabla="handleActualizarDatos">
            <template v-slot:cardBody>
                <Transition name="fade">
                    <Form
                        ref="formAtencionPsicologicaRef"                    
                        :loading="loading"
                        :showVer="showVer"
                        v-show="intercambiarForm === 0"
                    >
                        <template v-slot:codigo-caso>
                            <div class="col-md-6">
                                <label class="fw-semibold d-block">
                                    {{!showVer || !existKey()? 'Busqueda y Selección del Casos': 'Código del Caso'}}
                                    <i class="bx bx-search bx-sm" v-if="!showVer"/>
                                </label>
                                <div class="col-md">
                                    <vSelectPaginationVue
                                        :loading="loadingSelect"
                                        :data="dataSelect"
                                        :url="'saiv/casos/indexSelect'"
                                        :links="linksSelect"
                                        :registros="registrosSelect"
                                        :disabled="existKey()"
                                        v-model="codigoCaso"
                                        @setUrlSelect="setUrlSelect"
                                        @changeVariablesBusqueda="changeVariablesBusqueda"
                                        @resetUrlSelect="resetUrlSelect"
                                        v-if="!showVer && !existKey()"
                                    />
                                    <label v-else class="form-control fw-bold btn-block text-primary bx-flashing-hover" @click="handleChangedIntercambiarForm(1)">
                                        {{codigoCaso === null || typeof codigoCaso === 'undefined'? "No ingresado": codigoCaso.label}}
                                         <i class="ml-auto bx bxs-pointer"></i>
                                    </label>
                                </div>
                            </div>
                        </template>
                        <template v-slot:nuevo-button>
        
                            <Transition name="fade">
                                <button
                                    @click="handleChangedIntercambiarForm(1)" 
                                    type="button" 
                                    class="btn btn-warning m-1" 
                                    :disabled="loading" 
                                    v-if="!showVer ?? true"
                                >
                                    <i class='bx bx-transfer-alt bx-sm'></i> Ver Detalles del Caso
                                </button>
                            </Transition>
                        </template>
                    </Form>
                </Transition>
                <Transition name="fade">
                    <FormCasoVue :showVer="true" v-show="intercambiarForm === 1" ref="formCasoRef">
                        <template v-slot:codigo-caso>
                            <div class="row pb-2 pt-2 border border-2 border-primary rounded ">
                                <div class="col-md-6">
                                    <label class="fw-semibold d-block">
                                        {{!showVer ? 'Busqueda y Selección del Caso': 'Código del Caso'}}
                                        <i class="bx bx-search bx-sm" v-if="!showVer"/>
                                    </label>
                                    <div class="col-md">
                                        <vSelectPaginationVue
                                            :loading="loadingSelect"
                                            :data="dataSelect"
                                            :url="'saiv/casos/indexSelect'"
                                            :links="linksSelect"
                                            :registros="registrosSelect"
                                            :disabled="existKey()"
                                            v-model="codigoCaso"
                                            @setUrlSelect="setUrlSelect"
                                            @changeVariablesBusqueda="changeVariablesBusqueda"
                                            @resetUrlSelect="resetUrlSelect"
                                            v-if="!showVer && !existKey()"
                                        />
                                        <label v-else class="form-control fw-bold btn-block text-primary bx-flashing-hover" @click="handleChangedIntercambiarForm(0)">
                                            {{codigoCaso === null || typeof codigoCaso === 'undefined'? "No ingresado": codigoCaso.label}}
                                            <i class="ml-auto bx bxs-pointer"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-slot:nuevo-button>
                            <button @click="handleChangedIntercambiarForm(0)" type="button" class="btn btn-primary m-1" :disabled="loading" v-if="!showVer ?? true">
                                <i class='bx bx-transfer-alt bx-sm'></i> Volver al Seguimiento Jurídico
                            </button>
                        </template>
                    </FormCasoVue>
                </Transition>
                <Transition name="fade">
                    <historicoLudotecaVue :showVer="true" v-show="intercambiarForm === 2" ref="formHistoricoRef" :codigoCaso="codigoCaso">
                        <template v-slot:nuevo-button>
                            <button @click="handleChangedIntercambiarForm(0)" type="button" class="btn btn-primary m-1" :disabled="loading" v-if="!showVer ?? true">
                                <i class='bx bx-transfer-alt bx-sm'></i> Volver al Seguimiento Jurídico
                            </button>
                        </template>
                    </historicoLudotecaVue>
                </Transition>
            </template>
        </ModalVue>
        <ModalVue ref="modalBorrarRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="mensajeBorrar"
                    @continuar="borrarLudoteca"
                />
            </template>
        </ModalVue>  
        <ModalVue ref="modalAgendaRef" >
            <template v-slot:cardBody>
                <div class="border border-primary border-3 rounded-2">
                    <FullCalendarVue
                        @nuevaActividad="nuevaActividad"
                        @handleClickAgendaVer="handleClickAgendaVer"
                        @handleClickAgendaItem="handleClickAgendaItem"
                        ref="fullcalendarRef"
                        :title="'Ludoteca'"
                    />
                </div>
            </template>
        </ModalVue>
        <ActividadCalendarVue
            ref="ActividadCalendarRef" 
            :modulo="'Ludoteca'"    
        >
            <template v-slot:nuevo-button>
                <button class="btn btn-dark m-1 justify-items-start" 
                    @click="cargarAgenda" :disabled="loading">
                    <i class="bx bx-calendar" style="font-size:20px"/> Agenda
                </button> 
            </template>
        </ActividadCalendarVue>
    </div>
</template>
<script>
import { defineComponent, ref, onMounted } from 'vue';
// Servicios
import store                from '@/store/index'
import servicio             from '@/services/crud'
import servicios_otros      from '@/services/otros'

// Components
import FormCasoVue          from '@/components/casos/FormCaso.vue';
import ModalVue             from '@/components/Modal.vue'
import TableVue             from '@/components/layout/Table.vue'
import Form                 from '@/components/atencionPsicologica/Form.vue'
import vSelectPaginationVue from '@/components/V2_SelectPagination.vue';  
import AccionesTable        from '@/components/layout/AccionesTable.vue'
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
import FullCalendarVue      from '@/components/FullCalendar.vue';
import ActividadCalendarVue from '@/components/ActividadCalendar.vue'
import historicoLudotecaVue    from '@/components/ludoteca/historicoLudoteca.vue';

const columnas = [
    {
        nombre:"Niña, Niño o Adolescente", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Responsable", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Fecha y Hora Atención", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-sort-down'
    },
    {
        nombre:"Caso SAIV"+store.state.USUARIO.oficina,
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Tipo Atención", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {   
        nombre:"Próxima Cita",             
        class:"text-center bg-label-primary text-white fw-bold",          
        key:'acciones',                     
        style:"",   
        sort:true,  sortIcon:'bx-minus'
    },
    {   
        nombre:"Acciones",             
        class:"bg-primary text-white fw-bold text-center",          
        key:'acciones',                     
        style:"",   
        sort:false,  sortIcon:'bx-minus'
    }
];

const urlTabla  = 'saiv/ludoteca/index';

export default defineComponent({
    watch:{
        codigoCaso: async function(nuevo){
            this.handleChangeCodigoCaso(nuevo);
            this.formAtencionPsicologicaRef.handleChangeLoading(true)
            this.formCasoRef.resetForm();
            
            if(nuevo !== null)
                await this.cargarCaso(nuevo); 

            this.formAtencionPsicologicaRef.handleChangeLoading(false)
        }
    },
    setup(props) {
        // Variables
        const loading           = ref(false);
        const showVer           = ref(false);
        const data              = ref([]);
        const tipoCaso          = ref('Todos');
        const codigoCaso        = ref(null);
        const intercambiarForm  = ref(0);
        const mensajeBorrar     = ref('Borrar el Registro, ¿Continuar?');  

        // Ref
        const modalAtencionPsicologicaRef      = ref(null);
        const ActividadCalendarRef  = ref(null);
        const tablaLudotecaRef      = ref(null);
        const formCasoRef           = ref(null);
        const formAtencionPsicologicaRef       = ref(null);
        const advertenciaRef        = ref(null);
        const modalBorrarRef        = ref(null);
        const fullcalendarRef       = ref(null);     
        const modalAgendaRef        = ref(null);     
        const formHistoricoRef      = ref(null);

        // Metodos
        const handleChangedLoading = _loading => {
            loading.value = _loading;
        };

        const handleChangedData = _data => {
            data.value = _data
        };

        const handleClickNuevo = () => {
            codigoCaso.value = null;
            showVer.value = null;
            intercambiarForm.value = 0;
            formHistoricoRef.value.handleResetFiltro();
            formCasoRef.value.resetForm();
            formAtencionPsicologicaRef.value.resetForm();
            modalAtencionPsicologicaRef.value.showModal();
        };

        const handleActualizarDatos = () => {
            loading.value = true;
            tablaLudotecaRef.value.handleActualizarDatos();
            loading.value = false;
        };

        const handleChangedIntercambiarForm = (_intercambiarForm) => {
            intercambiarForm.value = _intercambiarForm;
        };

        const existKey = () => {
            if(formAtencionPsicologicaRef.value === null) 
                return false;
            return formAtencionPsicologicaRef.value.existKey()
        };

        const handleChangeLoading = _loading => loading.value = _loading; 
        const cargando = _loading => loading.value = _loading; 

        const cargarCaso = async (json) => {
            if(typeof json.key !== 'undefined'){
                formCasoRef.value.resetForm();
                formAtencionPsicologicaRef.value.handleChangeLoading(true);
                
                let caso = await servicio.obtener('saiv/casos/obtener/'+json.key);
                for (let index = 0; index < caso.agresores.length; index++) {
                    const element = caso.agresores[index];
                    caso.agresores[index].edadDesconocida = parseInt(element.edadDesconocida) === 1;
                    caso.agresores[index].nombreDesconocido = parseInt(element.nombreDesconocido) === 1;
                    
                }

                formAtencionPsicologicaRef.value.handleChangeLoading(false);

                const _caso = caso;
                formCasoRef.value.editForm(_caso);
                formCasoRef.value.visibleTab('agresores', _caso.agresores.length > 0);
                formCasoRef.value.visibleTab('responsables', _caso.responsable.key!== null);
            }
        };

        const handleChangeCodigoCaso = _codigoCaso => {
            formAtencionPsicologicaRef.value.handleChangeCodigoCaso(_codigoCaso);
        };

        // Paginacion Select Variables        
        const registrosSelect   = ref(null);     
        const busquedaSelect    = ref(null);
        const loadingSelect     = ref(false)
        const dataSelect        = ref([])
        const urlSelect         = ref(store.state.URL_SERVER + 'saiv/casos/indexSelect')
        const linksSelect       = ref([])

        // Peticion al servidor Select Paginacion
        const fetchSelect = async() => {

            loadingSelect.value = true;
            const result = await servicios_otros.datosTabla({
                busqueda:busquedaSelect.value, 
                porPagina: 10,
            }, urlSelect.value);

            dataSelect.value      = result.data;
            linksSelect.value     = result.links;
            registrosSelect.value = result.current_page+'/'+result.last_page;
            loadingSelect.value   = result.cargando;
        }        

        // Metodos que se utilizan en el Select Paginacion
        const changeVariablesBusqueda = busqueda => {   
            busquedaSelect.value = busqueda ??  busquedaSelect.value;      
            fetchSelect(); 
        }
        const resetUrlSelect = () => {
            urlSelect.value = store.state.URL_SERVER + 'saiv/casos/indexSelect';
        }
        const setUrlSelect = url => {
            urlSelect.value = url;
            fetchSelect(); 
        }

        onMounted(() => {
            formCasoRef.value.handledocultarCodigo(false);
            fetchSelect();  
        })

        // Metodos de las acciones de la tabla de datos
        const handleClickVer =  json => {
           // intercambiarForm.value = true; 
            showVer.value = true;
            cargarRegistro(json)
        };
        const handleClickEditar = json => {
           // intercambiarForm.value = true; 
            showVer.value = false; 
            cargarRegistro(json);            
        };
        const handleClickBorrar = (json) => {
            advertenciaRef.value.setJson(json); 
            mensajeBorrar.value = 'Borrar el Registro "'+ json.codigo+'" ¿Continuar?';
            modalBorrarRef.value.showModal(); 
        }
        const borrarLudoteca = async(_key) => {
            if(typeof _key !== 'undefined'){
                cargando(true)                
                await servicio.borrarCaso({key:_key}, 'saiv/ludoteca/borrar');
                tablaLudotecaRef.value.handleActualizarDatos();
                cargando(false)
            }
        }
        const cargarRegistro = async (json) => {
            try {

                if(typeof json.key === 'undefined')
                    return;

                intercambiarForm.value = 0;
                formHistoricoRef.value.handleResetFiltro();
                cargando(true);
                formAtencionPsicologicaRef.value.resetForm();
                const ludoteca = await servicio.obtener('saiv/ludoteca/obtener/'+json.key);
                cargando(false);
                
                if (typeof ludoteca === 'undefined')
                    return;

                codigoCaso.value = ludoteca.codigoCaso;
                formAtencionPsicologicaRef.value.editForm(ludoteca);
                // formSeguimientoJuridicoRef.value.setSubAtencionBrindada(seguimiento_juridico.atencionBrindadaSubMenu); 
                // formSeguimientoJuridicoRef.value.setAtencionBrindadaOtro(seguimiento_juridico.atencionBrindadaOtro); 
                modalAtencionPsicologicaRef.value.showModal();
                
            } catch (error) {
                console.log('Error -> '+ error);
            }
        }

        //Metodos Agenda
        const cargarAgenda = async() =>{
            try {
                modalAtencionPsicologicaRef.value.hideModal();
                ActividadCalendarRef.value.hideModal()
                cargando(true);
                fullcalendarRef.value.renderCalendar(false);
                modalAgendaRef.value.showModal();
                const fullCalendarEvents = await servicio.obtener('saiv/agenda/ludoteca/fullcalendar/evenst');
                fullcalendarRef.value.setEvents(fullCalendarEvents);
                fullcalendarRef.value.renderCalendar(true);
                cargando(false);
            } catch (error) {
                cargando(false);
                console.log(error);
            }
        }
        const ocultarAgenda = () => {
            modalAgendaRef.value.hideModal();
        }

        const nuevaActividad = () =>{
            modalAgendaRef.value.hideModal();
            ActividadCalendarRef.value.resetForm();
            ActividadCalendarRef.value.showModal();
        }

        const handleClickAgendaVer = (json) => {
            modalAgendaRef.value.hideModal();
            handleClickVer(json);
        }

        const handleClickAgendaItem = _json =>{
            console.log(_json)
            modalAgendaRef.value.hideModal();
            ActividadCalendarRef.value.resetForm();
            ActividadCalendarRef.value.editForm(_json);
            ActividadCalendarRef.value.showModal()
        }
        
        return {
            // Ref
            ActividadCalendarRef,
            modalAtencionPsicologicaRef,
            tablaLudotecaRef,
            formHistoricoRef,
            fullcalendarRef,
            formAtencionPsicologicaRef,
            advertenciaRef,
            modalBorrarRef,
            modalAgendaRef,
            formCasoRef,

            // Variables
            intercambiarForm,
            mensajeBorrar,
            codigoCaso,
            urlTabla,
            columnas,
            tipoCaso,
            showVer,
            loading,
            store,
            data,

            //Variables Select Paginacion
            registrosSelect,
            busquedaSelect,
            loadingSelect,
            linksSelect,
            dataSelect,
            urlSelect,

            // Metodos Select Paginacion
            changeVariablesBusqueda,
            resetUrlSelect,
            setUrlSelect,

            // Metodos
            handleChangedIntercambiarForm,
            handleChangeCodigoCaso,
            handleActualizarDatos,
            handleChangedLoading,
            handleChangeLoading,
            handleChangedData,
            handleClickBorrar,
            handleClickEditar,
            handleClickNuevo,
            borrarLudoteca,
            handleClickVer,
            cargarAgenda,
            cargarCaso,
            existKey,

            //Metodos Agenda
            ocultarAgenda,
            nuevaActividad,
            handleClickAgendaVer,
            handleClickAgendaItem,
        }
    },
    components:{
        vSelectPaginationVue,
        ActividadCalendarVue,
        historicoLudotecaVue,
        FullCalendarVue,
        AdvertenciaVue,
        AccionesTable,
        FormCasoVue,
        ModalVue,
        TableVue,
        Form,
    }
});
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.3s ease-out;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>
>>>>>>> origin/new-modules
