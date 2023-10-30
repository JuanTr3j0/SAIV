<template>
    <div class="card">
        <div class="card-body">                
            <TableVue ref="tablaCamaraGessellAtencionMenoresRef" 
                :columnas="columnas" 
                :url="urlTabla" 
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
                    <tr v-for="(menoresEdad, key) in data" :key="key">
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{menoresEdad.correlativo ?? 'No Ingresado'}}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{menoresEdad.fecha ?? 'No Ingresado'}}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{menoresEdad.horaIngreso ?? 'No Ingresado'}}</span>
                        </td>  
                        <td class="text-nowrap fw-bold text-center">
                            <span>{{menoresEdad.horaSalida ?? 'No Ingresado'}}</span>
                        </td>
                        <td id="acciones" style="padding:0%;" class="text-center">
                            <AccionesTable 
                                :json="menoresEdad"
                                :loading="loading" 
                                :showEditar="true"  
                                :showBorrar="true"
                                :showVer="true" 
                                @handleClickVer="handleClickVer(menoresEdad)"
                                @handleClickEditar="handleClickEditar(menoresEdad)"
                                @handleClickBorrar="handleClickBorrar(menoresEdad)"
                            />
                        </td> 
                    </tr>
                </template>
            </TableVue> 
        </div>
        <ModalVue ref="modalCamaraGessellAtencionMenoresRef" @handleActualizarDatosTabla="handleActualizarDatos">
            <template v-slot:cardBody>
                <Form :showVer="showVer" ref="formCamaraGessellAtencionMenoresRef">
                    <template v-slot:nuevo-button v-if="false">
                        <button @click="handleChangedIntercambiarForm" type="button" class="btn btn-secondary m-1" :disabled="loading" v-if="!showVer ?? true">
                            <i class='bx bx-transfer-alt bx-sm'></i> Ver Detalles del Caso
                        </button>
                    </template>
                </Form>
            </template>
        </ModalVue>
        <ModalVue ref="modalBorrarRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="'El siguiente registro se borrara de la base de datos, ¿continuar?'"
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
                        :title="'Cámara Gessell / Atención a Menores'"
                    />
                </div>
            </template>
        </ModalVue>
        <ActividadCalendarVue
            ref="ActividadCalendarRef" 
            :modulo="'Cámara Gessell Atencion de Menores'"    
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
// Componentes
import ModalVue             from '@/components/Modal.vue'
import TableVue             from '@/components/layout/Table.vue'
import Form                 from '@/components/camaraGessell/AtencionMenoresEdad.vue'
import AccionesTable        from '@/components/layout/AccionesTable.vue'
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
import FullCalendarVue      from '@/components/FullCalendar.vue';
import ActividadCalendarVue from '@/components/ActividadCalendar.vue'

const columnas = [
    {
        nombre:"Correlativo", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", sort:true,  sortIcon:'bx-sort-down'
    },
    {
        nombre:"Fecha", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Hora Ingreso", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Hora Salida", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", sort:true,  sortIcon:'bx-minus'
    },{   
        nombre:"Acciones",             
        class:"bg-primary text-white fw-bold text-center",          
        key:'acciones',                     
        style:"",   
    }
];

const urlTabla  = 'saiv/camara/gessell/atencion/menores/index';

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
    setup(){

        //Variables
        const data              = ref([]);
        const showVer           = ref(false);
        const loading           = ref(false);
        const tipoCaso          = ref('Todos');
        const codigoCaso        = ref(null);
        const mensajeBorrar     = ref(null);
        const intercambiarForm  = ref(true);
        
        // Ref
        const tablaCamaraGessellAtencionMenoresRef  = ref(null);
        const modalCamaraGessellAtencionMenoresRef  = ref(null);
        const formCamaraGessellAtencionMenoresRef   = ref(null);
        const ActividadCalendarRef                  = ref(null);
        const fullcalendarRef                       = ref(null);
        const modalAgendaRef                        = ref(null);
        const advertenciaRef                        = ref(null);
        const modalBorrarRef                        = ref(null);
        const formCasoRef                           = ref(null);

        // Metodos
        const handleChangedLoading = _loading => {
           loading.value = _loading;
        };

        const handleChangedData = async (_data) => {
            data.value = _data
        };

        const handleActualizarDatos = () => {
            loading.value = true;
            formCamaraGessellAtencionMenoresRef.value.resetForm();
            tablaCamaraGessellAtencionMenoresRef.value.handleActualizarDatos();
            loading.value = false;
        };

        const handleClickNuevo = () => {
            showVer.value = false;
            formCamaraGessellAtencionMenoresRef.value.resetForm();
            modalCamaraGessellAtencionMenoresRef.value.showModal();
        };
        
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
                formCamaraGessellAtencionMenoresRef.value.resetForm();
                const _response = await servicio.obtener('saiv/camara/gessell/atencion/menores/obtener/'+json.key);
                cargando(false);
                
                if (typeof _response === 'undefined')
                    return;

                codigoCaso.value = _response.codigoCaso;
                formCamaraGessellAtencionMenoresRef.value.editForm(_response);
                modalCamaraGessellAtencionMenoresRef.value.showModal();
                
            } catch (error) {
                console.log('Error -> '+ error);
            }
        }
        const borrarRegistro = async(_key) => {
             if(typeof _key !== 'undefined'){
                cargando(true)                
                await servicio.borrarCaso({key:_key}, 'saiv/camara/gessell/atencion/menores/borrar');
                tablaCamaraGessellAtencionMenoresRef.value.handleActualizarDatos();
                cargando(false)
            }
        }

        //Metodos Agenda
        const cargarAgenda = async() =>{
            try {
                modalCamaraGessellAtencionMenoresRef.value.hideModal();
                ActividadCalendarRef.value.hideModal()

                cargando(true);

                fullcalendarRef.value.renderCalendar(false);
                modalAgendaRef.value.showModal();

                const fullCalendarEvents = await servicio.obtener('saiv/camara/gessell/atencion/menores/fullcalendar/evenst');
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
        return {
            // Constantes
            urlTabla, 
            columnas,
            store,

            // Variables
            intercambiarForm,
            mensajeBorrar,
            codigoCaso,
            tipoCaso,
            loading,
            showVer,
            data,

            // Ref
            tablaCamaraGessellAtencionMenoresRef,
            modalCamaraGessellAtencionMenoresRef,
            formCamaraGessellAtencionMenoresRef,
            ActividadCalendarRef,
            fullcalendarRef,
            advertenciaRef,
            modalAgendaRef,
            modalBorrarRef,
            formCasoRef,

            // Metodos
            handleActualizarDatos,
            handleChangedLoading,
            handleChangedData,
            handleClickNuevo,
            handleClickBorrar,
            borrarRegistro,
            
            // Metodos Tabla
            handleClickVer,
            handleClickEditar,
            handleClickBorrar,
            
            // Metodos Agenda
            cargarAgenda,
            handleClickAgendaVer,
            ocultarAgenda,
            nuevaActividad,
            handleClickAgendaItem,
        }
    },
});
</script>