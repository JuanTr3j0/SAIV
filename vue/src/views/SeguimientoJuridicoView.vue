<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">SAIV{{store.state.USUARIO.oficina}} /</span> Seguimiento Jurídico
        </h4>
        <!-- Bordered Table -->
        <div class="card">
            <div class="card-body">                
                <TableVue ref="tablaSeguimientoJuridicoRef"
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
                        <tr v-for="(seguimiento, key) in data" :key="key">
                            <td class="text-nowrap fw-bold text-center">
                                {{seguimiento.tipoServicioFechaHora ?? 'No seleccionado'}}
                            </td>                                      
                            <td class="text-nowrap text-center">
                               {{seguimiento.tipoServicio ?? 'No seleccionado'}}
                            </td>              
                            <td class="text-nowrap fw-bold">
                                <span>{{seguimiento.codigo}}</span>
                            </td>         
                            <td class="text-nowrap text-center">
                                {{seguimiento.cierreExpedienteHoraFecha ?? 'No seleccionado'}}
                            </td>                                                             
                            <td class="text-nowrap text-center">
                                {{seguimiento.cierreExpediente ?? 'No seleccionado'}}
                            </td>                                                             
                            <td id="acciones" style="padding:0%;" class="text-center">
                                <AccionesTable 
                                :json="seguimiento"
                                :loading="loading" 
                                :showEditar="true"
                                :showBorrar="true"
                                :showVer="true" 
                                @handleClickVer="handleClickVer(seguimiento)"
                                @handleClickEditar="handleClickEditar(seguimiento)"
                                @handleClickBorrar="handleClickBorrar(seguimiento)"
                                />
                            </td>                          
                        </tr>
                    </template>
                </TableVue> 
            </div>
        </div>       
        <ModalVue 
            ref="modalSeguimientoJuridicoRef" 
            @handleActualizarDatosTabla="handleActualizarDatos"
        >
            <template v-slot:cardBody>
                <Transition name="fade">
                    <Form ref="formSeguimientoJuridicoRef"                    
                        :loading="loading"
                        :showVer="showVer ?? false"
                        v-show="intercambiarForm"
                    >
                        <template v-slot:codigo-caso>
                            <div class="col-md-6">
                                <label class=" fw-semibold d-block" for="caso-tipo-hecho">
                                    {{!showVer && !existKey() ? 'Busqueda y Selección del Caso': 'Código del Caso'}}
                                    <i class="bx bx-search bx-sm" v-if="!showVer && !existKey()"/>
                                </label>
                                <div class="col-md">
                                    <vSelectPaginationVue
                                    :loading="loadingSelect"
                                    :data="dataSelect"
                                    :url="'saiv/casos/indexSelect'"
                                    :links="linksSelect"
                                    :registros="registrosSelect"
                                    :disabled="existKey()"
                                    v-if="!showVer && !existKey()"
                                    v-model="codigoCaso"
                                    @setUrlSelect="setUrlSelect"
                                    @changeVariablesBusqueda="changeVariablesBusqueda"
                                    @resetUrlSelect="resetUrlSelect"
                                    />
                                    <label v-else class="form-control text-primary fw-bold">
                                        {{codigoCaso === null || typeof codigoCaso === 'undefined'? "No ingresado": codigoCaso.label}}
                                    </label>
                                </div>                                
                            </div>
                        </template>
                        <template v-slot:nuevo-button>
                            <button class="btn btn-dark m-1 justify-items-start" 
                                @click="cargarAgenda" :disabled="loading">
                                <i class="bx bx-calendar" style="font-size:20px"/> Agenda
                            </button> 
                            <button @click="handleChangedIntercambiarForm" type="button" class="btn btn-secondary m-1" :disabled="loading">
                                <i class='bx bx-transfer-alt bx-sm'></i> Ver Detalles del Caso
                            </button>
                        </template>
                    </Form>
                </Transition>
                <Transition name="fade">
                    <FormCasoVue :showVer="true" v-show="!intercambiarForm" ref="formCasoRef">
                        <template v-slot:codigo-caso>
                            <div class="row pb-2 pt-2 border border-2 border-primary rounded ">
                                <div class="col-md-6">
                                    <label class=" fw-semibold d-block" for="caso-tipo-hecho">
                                        {{!showVer && !existKey() ? 'Busqueda y Selección del Caso': 'Código del Caso'}}
                                        <i class="bx bx-search bx-sm" v-if="!showVer && !existKey()"/>
                                    </label>
                                    <div class="col-md">
                                        <vSelectPaginationVue
                                            :loading="loadingSelect"
                                            :data="dataSelect"
                                            :url="'saiv/casos/indexSelect'"
                                            :links="linksSelect"
                                            :registros="registrosSelect"
                                            :disabled="existKey()"
                                            v-if="!showVer && !existKey()"
                                            v-model="codigoCaso"
                                            @changeVariablesBusqueda="changeVariablesBusqueda"
                                            @resetUrlSelect="resetUrlSelect"
                                            @setUrlSelect="setUrlSelect"
                                        />
                                        <label v-else class="form-control text-primary fw-bold">
                                            {{codigoCaso === null || typeof codigoCaso === 'undefined'? "No ingresado": codigoCaso.label}}
                                        </label>
                                    </div>
                                   
                                </div>
                            </div>
                        </template>
                        <template v-slot:nuevo-button>
                            <button class="btn btn-dark m-1 justify-items-start" 
                                @click="cargarAgenda" :disabled="loading">
                                <i class="bx bx-calendar" style="font-size:20px"/> Agenda
                            </button> 
                            <button @click="handleChangedIntercambiarForm" type="button" class="btn btn-secondary m-1" :disabled="loading">
                                <i class='bx bx-transfer-alt bx-sm'></i> Volver al Seguimiento Jurídico
                            </button>
                        </template>
                    </FormCasoVue>
                </Transition>
            </template>
        </ModalVue>
        <ModalVue ref="modalBorrarRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="'El siguiente registro de Seguimiento Jurídico se borrara de la base de datos, ¿Continuar?'"
                    @continuar="borrarSeguimientoJuridico"
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
                        :title="'Seguimiento Jurídico'"
                    />
                </div>
            </template>
        </ModalVue>
        <ActividadCalendarVue
            ref="ActividadCalendarRef" 
            :modulo="'Seguimiento Juridico'"    
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

import store            from '@/store/index'
import servicio         from '@/services/crud'
import servicios_otros  from '@/services/otros'

// Component
import FormCasoVue          from '@/components/casos/FormCaso.vue';
import ModalVue             from '@/components/Modal.vue'
import TableVue             from '@/components/layout/Table.vue'
import Form                 from '@/components/seguimiento_juridico/Form.vue'  
import vSelectPaginationVue from '@/components/V2_SelectPagination.vue';  
import AccionesTable        from '@/components/layout/AccionesTable.vue'
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
import FullCalendarVue      from '@/components/FullCalendar.vue';
import ActividadCalendarVue from '@/components/ActividadCalendar.vue'

const columnas = [
    { nombre:"Fecha Servicio",    sort:true,  sortIcon:'bx-sort-down', class:"text-center bg-label-primary text-white fw-bold", key:"tipoServicioFechaHora",       style:"", },
    { nombre:"Servicio",          sort:true,  sortIcon:'bx-minus', class:"text-center bg-label-primary text-white fw-bold", key:"tipoServicio",                style:"", },
    { nombre:"Codigo",            sort:true,  sortIcon:'bx-minus', class:"text-center bg-label-primary text-white fw-bold",       key:"codigo",                      style:"", },
    { nombre:"Fecha Cierre Exp.", sort:true,  sortIcon:'bx-minus', class:"text-center bg-label-primary text-white fw-bold", key:"cierreExpedienteHoraFecha",   style:"", },
    { nombre:"Razón Cierre Exp.", sort:true,  sortIcon:'bx-minus', class:"text-center bg-label-primary text-white fw-bold", key:"cierreExpediente",            style:"", },
    { nombre:"Acciones",          sort:false,  sortIcon:'bx-minus', class:"bg-primary text-white fw-bold text-center",       key:'acciones',                    style:"", }
];

const urlTabla  = 'saiv/seguimiento/juridico/index';

import { defineComponent, ref, onMounted } from 'vue';
export default defineComponent({
    watch:{
        codigoCaso: async function(nuevo){
            this.handleChangeCodigoCaso(nuevo);
            this.formSeguimientoJuridicoRef.handleChangeLoading(true)
            this.formCasoRef.resetForm();
            
            if(nuevo!== null)
                await this.cargarCaso(nuevo);
            else{
                this.formSeguimientoJuridicoRef.handleChangeDelitosLeiv(null);
                this.formSeguimientoJuridicoRef.handleChangeTipoViolencia(null);
                this.formSeguimientoJuridicoRef.handleChangeDelitosCodPenal(null);
                this.formSeguimientoJuridicoRef.handleChangeModalidadViolencia(null);
            }
            this.formSeguimientoJuridicoRef.handleChangeLoading(false)
        }
    },
    setup(props) {
        // Variables
        const loading           = ref(false);
        const formLoading       = ref(false);
        const data              = ref([]);
        const showVer           = ref (false);
        const tipoCaso          = ref('Todos');
        const intercambiarForm  = ref(true);
        const codigoCaso        = ref(null);

        // Referencias
        const modalSeguimientoJuridicoRef   = ref(null);
        const formSeguimientoJuridicoRef    = ref(null);
        const tablaSeguimientoJuridicoRef   = ref(null);
        const ActividadCalendarRef          = ref(null);
        const modalBorrarRef                = ref(null);
        const fullcalendarRef               = ref(null);
        const advertenciaRef                = ref(null);
        const modalAgendaRef                = ref(null);
        const formCasoRef                   = ref(null);
        
        // Metodos
        const existKey = () => {
            if(formSeguimientoJuridicoRef.value === null) 
                return false;
            return formSeguimientoJuridicoRef.value.existKey()
        };
        const handleChangedLoading = _loading => {
            loading.value = _loading;
        };
        const handleChangedData = async (_data) => {
            data.value = _data
        };

        const handleActualizarDatos = () => {
            loading.value = true;
            tablaSeguimientoJuridicoRef.value.handleActualizarDatos();
            formSeguimientoJuridicoRef.value.resetForm();
            loading.value = false;
        };

        const handleChangedIntercambiarForm = _showVer => {
            intercambiarForm.value = !intercambiarForm.value;
        };
        const handleClickNuevo = () => {
            codigoCaso.value = null;
            showVer.value = false;
            formCasoRef.value.resetForm();
            formSeguimientoJuridicoRef.value.resetForm();
            modalSeguimientoJuridicoRef.value.showModal();
        };
        
        // Modifico la variable 'codigoCaso' del Formulario Seguimiento Jurídico 
        const handleChangeCodigoCaso = _codigoCaso => {
            formSeguimientoJuridicoRef.value.handleChangeCodigoCaso(_codigoCaso);
        };
        onMounted(() => {
            formCasoRef.value.handledocultarCodigo(false);
            fetchSelect();
        });
        const cargarCaso = async (json) => {
            if(typeof json.key !== 'undefined'){
                formCasoRef.value.resetForm();
                cargandoForm(true);
                let caso = await servicio.obtener('saiv/casos/obtener/'+json.key);
                cargandoForm(false);
                for (let index = 0; index < caso.agresores.length; index++) {
                    const element = caso.agresores[index];
                    caso.agresores[index].edadDesconocida = parseInt(element.edadDesconocida) === 1;
                    caso.agresores[index].nombreDesconocido = parseInt(element.nombreDesconocido) === 1;                    
                }
                const _caso = caso;

                formCasoRef.value.editForm(_caso);
                formCasoRef.value.visibleTab('agresores', _caso.agresores.length > 0);
                formCasoRef.value.visibleTab('responsables', _caso.responsable.key !== null);

                formSeguimientoJuridicoRef.value.handleChangeTipoViolencia(_caso.tiposViolencia);
                formSeguimientoJuridicoRef.value.handleChangeModalidadViolencia(_caso.modalidadViolencia);
                formSeguimientoJuridicoRef.value.handleChangeDelitosLeiv(_caso.delitoLeivs);
                formSeguimientoJuridicoRef.value.handleChangeDelitosCodPenal(_caso.delitoCodigoPenal); 
            }
        };
        const resetFormCaso = () => formCasoRef.value.resetForm();
        const cargando = _loading => loading.value = _loading;
        const cargandoForm = _loading => formLoading.value = _loading;
        //Metodos Agenda
        const cargarAgenda = async() =>{
            try {
                modalSeguimientoJuridicoRef.value.hideModal();
                ActividadCalendarRef.value.hideModal()
                cargando(true);
                fullcalendarRef.value.renderCalendar(false);
                modalAgendaRef.value.showModal();
                const fullCalendarEvents = await servicio.obtener('saiv/seguimiento/juridico/fullcalendar/evenst');
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
            modalAgendaRef.value.hideModal();
            ActividadCalendarRef.value.resetForm();
            ActividadCalendarRef.value.editForm(_json);
            ActividadCalendarRef.value.showModal()
        }

        // Paginacion Select Variables
        const registrosSelect   = ref(null);    
        const busquedaSelect    = ref(null);
        const loadingSelect     = ref(false)
        const linksSelect       = ref([])
        const dataSelect        = ref([])
        const urlSelect         = ref(store.state.URL_SERVER + 'saiv/casos/indexSelect')

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

        // Metodos de las acciones de la tabla de datos
        const handleClickVer =  json => {
            intercambiarForm.value = true; 
            showVer.value = true; 
            cargarRegistro(json)
        };
        const handleClickEditar = json => {
            intercambiarForm.value = true; 
            showVer.value = false; 
            cargarRegistro(json);
            
        };
        const cargarRegistro = async (json) => {
            try {
                if(typeof json.key === 'undefined')
                    return;

                cargando(true);
                formSeguimientoJuridicoRef.value.resetForm();
                const seguimiento_juridico = await servicio.obtener('saiv/seguimiento/juridico/obtener/'+json.key);
                cargando(false);
                
                if (typeof seguimiento_juridico === 'undefined')
                    return;

                codigoCaso.value = seguimiento_juridico.codigoCaso;
                formSeguimientoJuridicoRef.value.editForm(seguimiento_juridico);
                formSeguimientoJuridicoRef.value.setSubAtencionBrindada(seguimiento_juridico.atencionBrindadaSubMenu); 
                formSeguimientoJuridicoRef.value.setAtencionBrindadaOtro(seguimiento_juridico.atencionBrindadaOtro); 
                modalSeguimientoJuridicoRef.value.showModal();
                
            } catch (error) {
                console.log('Error -> '+ error);
            }
        }
        const handleClickBorrar = (json) => {advertenciaRef.value.setJson(json); modalBorrarRef.value.showModal(); }

        const borrarSeguimientoJuridico = async _key => {
            if(typeof _key !== 'undefined'){
                cargando(true)                
                await servicio.borrarCaso({key:_key}, 'saiv/seguimiento/juridico/borrar');
                tablaSeguimientoJuridicoRef.value.handleActualizarDatos();
                cargando(false)
            }
        }
        return {
            // Variables
            intercambiarForm,
            formLoading,
            codigoCaso,
            urlTabla,
            columnas,
            tipoCaso,
            loading,
            showVer,
            store,
            data,

            //Variables Select Paginacion
            registrosSelect,
            busquedaSelect,
            loadingSelect,
            linksSelect,
            dataSelect,
            urlSelect,
            
            // Ref
            modalSeguimientoJuridicoRef,
            tablaSeguimientoJuridicoRef,
            formSeguimientoJuridicoRef,
            ActividadCalendarRef,
            modalBorrarRef,
            fullcalendarRef,
            modalAgendaRef,
            advertenciaRef,
            formCasoRef,

            // Metodos
            handleChangedIntercambiarForm,
            borrarSeguimientoJuridico,
            changeVariablesBusqueda,
            handleChangeCodigoCaso,
            handleActualizarDatos,
            handleChangedLoading,
            handleChangedData,
            handleClickNuevo,
            resetUrlSelect,
            resetFormCaso,
            setUrlSelect,
            cargandoForm,
            cargarAgenda,
            cargarCaso,
            existKey,
            
            //Metodos Agenda
            handleClickAgendaItem,
            handleClickAgendaVer,
            nuevaActividad,
            ocultarAgenda,

            // Metodos de las acciones de la tabla
            handleClickBorrar,
            handleClickEditar,
            handleClickVer,
        }
    },
    components:{
        vSelectPaginationVue,
        ActividadCalendarVue,
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