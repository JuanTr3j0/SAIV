<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">SAIV{{store.state.USUARIO.oficina}}  /</span> Registro de Casos
        </h4>
        <!-- Bordered Table -->
        <div class="card">
            <div class="card-body">                            
                <TableVue
                    ref="tablaCasosRef"
                    :columnas = "columnas" 
                    :url = "urlTabla"
                    :periodos = "periodos"
                    :titleFiltro = "'Tipo de Denuncia'"
                    :arrayFiltro = "['Todos', 'Denuncia', 'Sin Denuncia', 'Diligencia']"
                    :titleOficinas = "'Oficinas'"
                    :arrayOficinas = "opcionesOficinas ?? []"
                    @handleChangedLoading="handleChangedLoading"
                    @handleChangedData="handleChangedData"
                >
                    <template v-slot:button >
                        <button class="btn btn-primary m-1 justify-items-start" 
                            @click="handleClickNuevo" :disabled="loading">
                            <i class="bx bx-plus" style="font-size:20px"/> Nuevo
                        </button> 
                    </template>
                    <template v-slot:tbody>
                        <tr v-for="(caso, key) in data" :key="key">
                            <td id="acciones" style="padding:0%;" class="text-center">
                                <AccionesTable 
                                :json="caso"
                                :loading="loading" 
                                :showArchivos="true"
                                :showEditar="true"
                                :showBorrar="true"
                                :showVer="true" 
                                @handleClickVer="handleClickVer(caso)"
                                @handleClickArchivos="handleClickArchivos(caso)"
                                @handleClickEditar="handleClickEditar(caso)"
                                @handleClickBorrar="handleClickBorrar(caso)"
                                />
                            </td>  
                            <td class="text-nowrap fw-bold">
                                <span>{{caso.codigo}}</span>
                            </td>
                            <td class="text-nowrap fw-bold">
                                <span>{{caso.fechaRegistro}}</span>
                            </td>
                            <td class="text-nowrap">
                                {{caso.tiposViolencia ?? '-'}}
                            </td> 
                            <td class="text-nowrap">
                                {{caso.modalidadViolencia ?? '-'}}
                            </td> 
                            <td class="text-nowrap">
                                {{caso.institucionRemitente ?? '-'}}
                            </td>                          
                            <td class="text-nowrap">
                                {{getValueLabel(caso.institucionDondeSeRemite) ?? '-'}}
                            </td>                          
                            <td class="text-nowrap">
                                {{caso.fechaHecho ?? 'No ingresado'}}
                            </td>                
                            <td class="text-nowrap">
                                {{caso.departamento ?? '-'}}
                            </td>                          
                            <td class="text-nowrap">
                                {{caso.municipio ?? '-'}}
                            </td>                          
                                            
                        </tr>
                    </template>
                </TableVue>
                <!--/ Bordered Table -->
            </div>
        </div>
        <Modal ref="modalArchivosCasosRef" :size="''">
            <template v-slot:cardBody>
                <ArchivosVue ref="ArchivosCasosRef"
                    @handledDescargarArchivo="handledDescargarArchivo" 
                    @handledBorrarArchivo="handledBorrarArchivo"
                    :loading="loading"
                />
            </template>
        </Modal>
        <Modal ref="modalCasoRef" @handleActualizarDatosTabla="handleActualizarDatos">
            <template v-slot:cardBody>
                <FormCaso ref="formCasoRef" 
                    @handleActualizarDatosTabla="handleActualizarDatos" 
                    @handledDescargarArchivo="handledDescargarArchivo" 
                    @handledBorrarArchivo="handledBorrarArchivoCaso"
                    :loading="loading"
                    :showVer="showVer ?? false"
                />
            </template>
        </Modal>
        <Modal ref="modalCasoBorrarRef">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="'El siguiente caso se borrara de la base de datos, ¿continuar?'"
                    @continuar="borrarCaso"
                />
            </template>
        </Modal>       
    </div>
</template>
<script>
import { defineComponent, ref, onMounted } from 'vue'

import Modal                from '@/components/Modal.vue'
import ArchivosVue          from '@/components/Archivos.vue'
import TableVue             from '@/components/layout/Table.vue'
import FormCaso             from "@/components/casos/FormCaso.vue"
import modalArchivos        from '@/components/ModalArchivos.vue'
import AdvertenciaVue       from '@/components/layout/Advertencia.vue'
import AccionesTable        from '@/components/layout/AccionesTable.vue'
import FormSelectOpcionVue  from '@/components/FormSelectOpcion.vue';

import otros_servicio   from '@/services/otros'
import servicio         from '@/services/crud'
import store            from '@/store'

const columnas = [
{nombre:"Acciones",                 class:"bg-primary text-white fw-bold text-center",        sort:false, sortIcon:'bx-minus', key:'acciones'},
    {nombre:"Codigo",                   class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-sort-down', key:"codigo"},
    {nombre:"Fecha Registro",           class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"fechaRegistro"},
    {nombre:"Violencia",                class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"tiposViolencia"},
    {nombre:"Mod. Violencia",           class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"modalidadViolencia"},
    {nombre:"Instit. Que Remite",       class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"institucionRemitente"},
    {nombre:"Instit. Dónde se Remite",  class:"text-center bg-label-primary text-white fw-bold",  sort:false, sortIcon:'bx-minus', key:"institucionDondeSeRemite"},
    {nombre:"Fecha Hecho",              class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"fechaHecho"},
    {nombre:"Departamento",             class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"departamento"},
    {nombre:"Municipio",                class:"text-center bg-label-primary text-white fw-bold",  sort:true,  sortIcon:'bx-minus', key:"municipio"},
    
]

export default defineComponent({
    name:'casosView',
    components: {
        Modal,
        FormCaso,
        TableVue,
        ArchivosVue,
        modalArchivos,
        AccionesTable,
        AdvertenciaVue,
        FormSelectOpcionVue,
    },
    setup() {
        const data  = ref([]);
        const loading = ref(true);
        const showVer = ref(false);
        const tipoCaso = ref('Todos');
        const modalCasoRef = ref(null);
        const formCasoRef  = ref(null);
        const tablaCasosRef = ref(null);
        const advertenciaRef = ref(null);
        const ArchivosCasosRef = ref(null);
        const modalCasoBorrarRef = ref(null);
        const modalCasoArchivosRef = ref(null);
        const modalArchivosCasosRef = ref(null);
        const periodos = ref([]);
        const opcionesOficinas = ref(null);

        onMounted(async () => {
            loading.value = true;
            await cargarPeriodos();
            loading.value = false; 
            opcionesOficinas.value = await servicio.obtener('auth/opciones');
        });

        const cargarPeriodos = async() => {
            try{
                const response = await servicio.obtener('saiv/casos/periodos');
                periodos.value = response ?? [];
            }catch(error){
                console.log(error);
            }
        }

        const cargando = (bool) => loading.value = bool;

        const handleChangedData = _data => {
            data.value = _data
        };

        const handleChangedLoading = _loading => {
            loading.value = _loading;
        };

        const handleClickNuevo = () => {
            showVer.value = false;
            formCasoRef.value.resetForm();
            modalCasoRef.value.showModal();
        };
        
        
        const handledDescargarArchivo = async (_key, _nombre) => {
            try{
                await otros_servicio.descargarArchivo('saiv/archivos/descargar/'+_key, _nombre)
            }catch (error) {
                console.log(error);
            }
        };
        
        //Acciones de la Tabla
        const handleClickVer =  (json) => {showVer.value  = true; cargarCaso(json)};
        const handleClickEditar = (json) => {showVer.value  = false; cargarCaso(json)};
        const handleClickBorrar = (json) => {advertenciaRef.value.setJson(json); modalCasoBorrarRef.value.showModal(); }

        // Cargo archivos en el modal
        const handleClickArchivos = (json) => cargarArchivos(json);
        const cargarArchivos = async(json) =>{
            if(typeof json.key !== 'undefined'){
                cargando(true)
                const caso = await servicio.obtener('saiv/casos/obtener/'+json.key);
                ArchivosCasosRef.value.cargarArchivos(caso.archivosCasos);
                ArchivosCasosRef.value.cargarKey(caso.key);
                ArchivosCasosRef.value.cargarTitulo(caso===null?'':'Codigo: '+caso.denuncia+' '+zfill(caso.correlativo, 3)+'-'+zfill(caso.mes,2)+'-'+zfill(caso.anio,4));
                modalArchivosCasosRef.value.showModal();
                cargando(false)
            }
        }

        const handledBorrarArchivo = async(key_caso, key_archivo) => {
            try {

                if(typeof key_archivo !== 'undefined' && typeof key_caso !== 'undefined'){
                    cargando(true)
                    await servicio.borrar('saiv/archivos/caso/eliminar/'+key_archivo);
                    const caso = await servicio.obtener('saiv/casos/obtener/'+key_caso);
                    ArchivosCasosRef.value.cargarArchivos(caso.archivosCasos);
                    cargando(false)
                }
            } catch (error) {
                console.log(error)
            }
        }

        const handledBorrarArchivoCaso = async(key_caso, key_archivo) => {
            try {
                console.log('archivo -> '+key_archivo)
                if(typeof key_archivo !== 'undefined' && typeof key_caso !== 'undefined'){
                    cargando(true)
                    await servicio.borrar('saiv/archivos/caso/eliminar/'+key_archivo);
                    const caso = await servicio.obtener('saiv/casos/obtener/'+key_caso);
                    formCasoRef.value.cargarArchivos(caso.archivosCasos);
                    cargando(false)
                }
            } catch (error) {
                console.log(error)
            }
        }
        
        const cargarCaso = async (json) => {
            if(typeof json.key !== 'undefined'){
                cargando(true)
                formCasoRef.value.resetForm();
                let caso = await servicio.obtener('saiv/casos/obtener/'+json.key);
                for (let index = 0; index < caso.agresores.length; index++) {
                    const element = caso.agresores[index];
                    caso.agresores[index].edadDesconocida = parseInt(element.edadDesconocida) === 1;
                    caso.agresores[index].nombreDesconocido = parseInt(element.nombreDesconocido) === 1;
                    
                }
                const _caso = caso;
                formCasoRef.value.editForm(_caso);
                formCasoRef.value.visibleTab('agresores', _caso.agresores.length > 0);
                formCasoRef.value.visibleTab('responsables', _caso.responsable.key!== null);
                modalCasoRef.value.showModal();
                cargando(false)
            }
        }
        const handleActualizarDatos = () => {
            cargando(true)
            tablaCasosRef.value.handleActualizarDatos();
            cargando(false)
        }

        const borrarCaso = async(_key) => {
             if(typeof _key !== 'undefined'){
                cargando(true)                
                await servicio.borrarCaso({key:_key}, 'saiv/casos/borrar');
                tablaCasosRef.value.handleActualizarDatos();
                cargando(false)
            }
        }

        const zfill = (number, width) => {
            if(number !== null){
                var numberOutput = Math.abs(number); /* Valor absoluto del número */
                var length = number.toString().length; /* Largo del número */ 
                var zero = "0"; /* String de cero */  
                
                if (width <= length) {
                    if (number < 0) {
                        return ("-" + numberOutput.toString()); 
                    } else {
                        return numberOutput.toString(); 
                    }
                } else {
                    if (number < 0) {
                        return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
                    } else {
                        return ((zero.repeat(width - length)) + numberOutput.toString()); 
                    }
                }
            }else return "?";
        }

        const getValueLabel = _value =>{
            if(_value === null  || typeof _value === 'undefined')
                return "No Ingresado";

            if(typeof _value === 'string')
                return _value;
                
            if(Array.isArray(_value)){
                if(_value.length===0)
                    return;

                var cadena = '';
                let array = _value;
                for (let index = 0; index < array.length; index++) {
                    const element = array[index];
                    if(typeof element === 'string')
                        cadena += element;
                    else if(typeof element === 'object')
                        cadena += element.opcion;
                    cadena += (array.length-1===index ? '':', ');
                }
                return cadena += '.';
            }
        };
        return {
            //Ref Components
            formCasoRef,
            modalCasoRef,
            modalCasoArchivosRef,
            tablaCasosRef,
            ArchivosCasosRef,
            modalArchivosCasosRef,
            modalCasoBorrarRef,
            advertenciaRef,

            // Variables
            data,
            showVer,
            loading,
            columnas,
            tipoCaso,
            urlTabla:'saiv/casos/index',
            periodos,
            opcionesOficinas,

            // Metodos
            borrarCaso,
            getValueLabel,
            handleClickNuevo,
            handleChangedData,
            handleChangedLoading,
            handledBorrarArchivo,
            handleActualizarDatos,
            handledDescargarArchivo,
            handledBorrarArchivoCaso,

            // Metodos AccionesTable
            handleClickArchivos,
            handleClickVer,
            handleClickEditar,
            handleClickBorrar,

            //store
            store
        };
    },
})
</script>
