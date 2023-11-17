<template>
    <div class="card">
        <div class="card-body">                
            <TableVue ref="tablaCamaraGessellProgramacionRef" 
                :columnas="columnas" 
                :url="urlTabla" 
                @handleChangedLoading="handleChangedLoading"
                @handleChangedData="handleChangedData"
            >                   
                <template v-slot:button >
                    <button class="btn btn-primary m-1 justify-items-start" 
                        @click="handleClickNuevo" :disabled="loading">
                        <i class="bx bx-plus" style="font-size:20px"/> 
                        Nuevo
                    </button> 
                </template> 
                <template v-slot:buttons>
                    <button class="btn btn-dark m-1 justify-items-start" 
                        @click="cargarAgenda" :disabled="loading">
                        <i class="bx bx-calendar" style="font-size:20px"/> Agenda
                    </button> 
                </template>
                <template v-slot:tbody>
                    <tr v-for="(programacion, key) in data" :key="key">
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{programacion.correlativo ?? 'No Ingresado'}}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{programacion.fecha ?? 'No Ingresado'}}</span>
                        </td> 
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{programacion.hora ?? 'No Ingresado'}}</span>
                        </td> 
                        <td class="text-nowrap fw-bold text-start-center">
                            <span>{{
                                    programacion.solicitadoPor===null || programacion.solicitadoPor === ""? 
                                'No Ingresado':programacion.solicitadoPor
                            }}</span>
                        </td> 
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{
                                programacion.nombres===null || programacion.nombres === ""? 
                                'No Ingresado':programacion.nombres
                            }}</span>
                        </td> 
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{
                                programacion.apellidos===null || programacion.apellidos === ""? 
                                'No Ingresado':programacion.apellidos
                            }}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{programacion.casoSaiv ? 'Si': 'No'}}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{programacion.realizada ? 'Si': 'No'}}</span>
                        </td>  
                        <td id="acciones" style="padding:0%;" class="text-center">
                            <AccionesTable 
                            :json="programacion"
                            :loading="loading" 
                            :showEditar="true"
                            :showBorrar="true"
                            :showVer="true" 
                            @handleClickVer="handleClickVer(programacion)"
                            @handleClickEditar="handleClickEditar(programacion)"
                            @handleClickBorrar="handleClickBorrar(programacion)"
                            />
                        </td> 
                    </tr>
                </template>
            </TableVue> 
        </div>
        <ModalVue 
            ref="modalCamaraGessellProgramacionRef" 
            @handleActualizarDatosTabla="handleActualizarDatos">
            <template v-slot:cardBody>
                <Form ref="formCamaraGessellProgramacionRef" :showVer="showVer">
                    <template v-slot:nuevo-button v-if="false">
                        <button @click="handleChangedIntercambiarForm" type="button" class="btn btn-secondary m-1" :disabled="loading" v-if="!showVer ?? true ">
                            <i class='bx bx-transfer-alt bx-sm'></i> Ver Detalles del Caso
                        </button>
                    </template>
                </Form>
            </template>
        </ModalVue>
        <ModalVue ref="modalBorrarRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="'El siguiente registro se borrara de la base de datos, ¿Continuar?'"
                    @continuar="borrarRegistro"
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
                        :title="'Cámara Gesell / Programación'"
                    />
                </div>
            </template>
        </ModalVue>
        <ActividadCalendarVue
            ref="ActividadCalendarRef" 
            :modulo="'Camara Gessell Programacion'"    
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
// Servicios
import store                from '@/store/index'
import servicio             from '@/services/crud'
//Component
import ModalVue             from '@/components/Modal.vue'
import TableVue             from '@/components/layout/Table.vue'
import Form                 from '@/components/camaraGessell/FormProgramacion.vue'
import AccionesTable        from '@/components/layout/AccionesTable.vue'
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
import FullCalendarVue      from '@/components/FullCalendar.vue';
import ActividadCalendarVue from '@/components/ActividadCalendar.vue'

const columnas = [
    {
        nombre:"Correlativo", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-sort-down'
    },
    {
        nombre:"Fecha", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Hora", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Solicitado Por", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"", style:"", sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Nombres Usuaria/o", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"", style:"", sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Apellidos Usuaria/o", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Caso SAIV"+store.state.USUARIO.oficina, 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Realizada", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"",
        sort:true,  sortIcon:'bx-minus' 
    },
    {   
        nombre:"Acciones",             
        class:"bg-primary text-white fw-bold text-center",          
        key:'acciones',                     
        style:"",   
    }
];

const urlTabla  = 'saiv/camara/gessell/programacion/index';

import { defineComponent, ref } from 'vue'
export default defineComponent({
    components:{
        Form,
        ModalVue,
        TableVue,
        AccionesTable,
        AdvertenciaVue,
        FullCalendarVue,
        ActividadCalendarVue,
    },
    setup(props) {
        //Variables
        const intercambiarForm  = ref(true);
        const mensajeBorrar     = ref(null);
        const codigoCaso        = ref(null);
        const tipoCaso          = ref('Todos');
        const loading           = ref(false);
        const showVer           = ref(false);
        const data              = ref([]);
        
        // Ref
        const tablaCamaraGessellProgramacionRef = ref(null);
        const modalCamaraGessellProgramacionRef = ref(null);
        const formCamaraGessellProgramacionRef  = ref(null);
        const modalBorrarRef                    = ref(null);
        const advertenciaRef                    = ref(null);
        const formCasoRef                       = ref(null);
        const fullcalendarRef                   = ref(null);
        const modalAgendaRef                    = ref(null);
        const ActividadCalendarRef              = ref(null);

        // Metodos
        const handleChangedLoading = _loading => {
           // loading.value = _loading;
        };

        const handleChangedData = async (_data) => {
            data.value = _data
        };

        const handleActualizarDatos = () => {
            loading.value = true;
            tablaCamaraGessellProgramacionRef.value.handleActualizarDatos();
            formCamaraGessellProgramacionRef.value.resetForm();
            loading.value = false;
        };

        const handleClickNuevo = () => {
            showVer.value = null;
            formCamaraGessellProgramacionRef.value.resetForm();
            modalCamaraGessellProgramacionRef.value.showModal();
        };

        //Metodos Agenda
        const cargarAgenda = async() =>{
            try {
                modalCamaraGessellProgramacionRef.value.hideModal();
                ActividadCalendarRef.value.hideModal()
                cargando(true);
                fullcalendarRef.value.renderCalendar(false);
                modalAgendaRef.value.showModal();
                const fullCalendarEvents = await servicio.obtener('saiv/camara/gessell/programacion/fullcalendar/evenst');
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

        const cargando = _loading => loading.value = _loading;

        // Acciones Tabla
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
        const cargarRegistro = async (json) => {
            try {
                if(typeof json.key === 'undefined')
                    return;

                cargando(true);
                formCamaraGessellProgramacionRef.value.resetForm();
                const programacion = await servicio.obtener('saiv/camara/gessell/programacion/obtener/'+json.key);
                cargando(false);
                
                if (typeof programacion === 'undefined')
                    return;
                    
                codigoCaso.value = programacion.codigoCaso;
                formCamaraGessellProgramacionRef.value.editForm(programacion);
                modalCamaraGessellProgramacionRef.value.showModal();
                
            } catch (error) {
                console.log('Error -> '+ error);
            }
        };

        const borrarRegistro = async(_key) => {
             if(typeof _key !== 'undefined'){
                cargando(true)                
                await servicio.borrarCaso({key:_key}, 'saiv/camara/gessell/programacion/borrar');
                tablaCamaraGessellProgramacionRef.value.handleActualizarDatos();
                cargando(false)
            }
        }
        return {
            // Constantes
            mensajeBorrar,
            urlTabla, 
            columnas,
            store,

            // Variables
            intercambiarForm,
            codigoCaso,
            tipoCaso,
            loading,
            showVer,
            data,
            
            // Ref
            tablaCamaraGessellProgramacionRef,
            modalCamaraGessellProgramacionRef,
            formCamaraGessellProgramacionRef,
            ActividadCalendarRef,
            fullcalendarRef,
            modalBorrarRef,
            advertenciaRef,
            modalAgendaRef,
            formCasoRef,

            // Metodos
            handleActualizarDatos,
            handleChangedLoading,
            handleClickAgendaVer,
            handleChangedData,
            handleClickNuevo,
            borrarRegistro,
            
            // Metodos Tabla
            handleClickBorrar,
            handleClickEditar,
            handleClickVer,
            
            //Metodos Agenda
            cargarAgenda,
            ocultarAgenda,
            nuevaActividad,
            handleClickAgendaItem,
        }
    },
});
</script>