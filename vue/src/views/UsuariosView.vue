<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-2">
            <span class="text-muted fw-light">Administración /</span> Usuarias/os
        </h4>
        <!-- Bordered Table -->
        <div class="card">
            <div class="card-body">                
                <TableVue
                    ref="tablaUsuarios"
                    :columnas="columnas" 
                    :url="urlTabla" 
                    @handleChangedLoading="handleChangedLoading"
                    @handleChangedData="handleChangedData">
                    <template v-slot:button>
                        <button class="btn btn-primary m-1 justify-items-start" 
                            :disabled="loading" @click="$refs.modalUsuarioRef.showModal();$refs.formUsuarioRef.resetForm();">
                            <i class="bx bx-plus" style="font-size:20px"/> Nuevo
                        </button> 
                    </template>
                    <template v-slot:tbody>
                        <tr v-for="(usuario, key) in data" :key="key">
                            <td class="text-start-center text-nowrap fw-bold">
                                {{usuario.name}}
                            </td>
                            <td class="text-start-center">
                                <span class="badge bg-label-primary me-1">
                                    {{usuario.email}}
                                </span>
                            </td>
                            <td class="text-start-center">
                                <span class="badge bg-label-secondary me-1">
                                    {{usuario.oficina ?? 'No ingresado'}}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge  me-1" :class="usuario.tipoUsuario ? (usuario.tipoUsuario=== 'Super Administrador'?'bg-label-success':'bg-label-secondary'): 'bg-label-danger'">
                                    {{usuario.tipoUsuario ?? 'Desconocido'}}
                                </span>
                            </td>
                            <!--td class="">
                                <span class="badge bg-label-primary me-1 " v-for="permisos in todosPermisos(usuario.permisos)" :key="permisos">
                                    {{ #usuario.tipoUsuario=== 'Super Administrador' || usuario.tipoUsuario=== 'Administrador'?'Todos los permisos':permisos }}
                                </span>
                            </td-->
                            <td class="text-center">
                                <span class="badge me-1" :class="usuario.estado==='Activo'?'bg-success':'bg-danger'">
                                    {{usuario.estado}}
                                </span>
                            </td>
                            <td style="padding:0%;" class="text-center">
                                <AccionesTable v-show="usuario.tipoUsuario !=='Super Administrador'"
                                    :loading="loading" 
                                    :showVer="true" 
                                    :showEditar="true" 
                                    :showEstado="true" 
                                    :estado="usuario.estado"
                                    @handleClickVer="handleClickVer(usuario)"
                                    @handleClickEditar="handleClickEditar(usuario)"
                                    @handleClickEstado="handleClickEstado(usuario)"
                                />
                            </td>                            
                        </tr>
                    </template>
                </TableVue>
                <!--/ Bordered Table -->
            </div>
        </div>
        <Modal ref="modalUsuarioRef" @handleActualizarDatosTabla="handleActualizarDatos">
            <template v-slot:cardBody>
                <FormUsuario ref="formUsuarioRef" :showVer="showVer" @handleActualizarDatosTabla="handleActualizarDatos"/>
            </template>
        </Modal>
        <Modal ref="modalAdvertenciaRef" :clases="'modal-centered'">
            <template v-slot:cardBody>
                <AdvertenciaVue ref="advertenciaRef" 
                    :mensaje="mensajeAdvertencia"
                    @continuar="handleClickEstadoCambiar"
                />                
            </template>
        </Modal> 
    </div>
</template>
<script>
import { defineComponent, ref } from 'vue'

import Modal            from '@/components/Modal.vue'
import TableVue         from '@/components/layout/Table.vue'
import FormUsuario      from '@/components/usuarios/FormUsuario.vue'
import AccionesTable    from '@/components/layout/AccionesTable.vue'
import AdvertenciaVue   from '@/components/layout/Advertencia.vue'

import servicio         from '@/services/crud'
const columnas = [
    {nombre:"Usuario",  class:"text-center bg-primary text-white fw-bold",                      style:"",   key:'usuario'},
    {nombre:"Correo",   class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'correo'},
    {nombre:"Oficina",  class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'oficina'},
    {nombre:"Tipo Usuario", class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'estado'},
    //{nombre:"Permisos", class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'estado'},
    {nombre:"Estado",   class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'estado'},
    {nombre:"Acciones", class:"text-center bg-label-primary text-white fw-bold text-center",    style:"",   key:'acciones'},
]

export default defineComponent({
    components: {
        Modal,
        TableVue,
        FormUsuario,
        AccionesTable,
        AdvertenciaVue,
    },
    setup() {
        // Variables
        const data = ref([]);
        const loading = ref(true);
        const showVer = ref(false);
        const mensajeAdvertencia = ref(null);
        
        // Ref
        const modalAdvertenciaRef = ref(null);
        const advertenciaRef = ref(null);
        const formUsuarioRef = ref(null);
        const modalUsuarioRef = ref(null);
        const tablaUsuarios = ref(null);

        const handleChangedData = _data => {
            data.value = _data
        }

        const handleChangedLoading = _loading => {
            loading.value = _loading;
        }

        const searchModulo = (_modulo, _array) => {
            return _array.filter( item => item.search(_modulo) !== -1).length; 
        };

        const permisosArray = (_modulo, _cant_permisos,  _array) =>{
            
            if( searchModulo(_modulo, _array) === _cant_permisos )
                return [_modulo+' Todos los Permisos'];
            else 
                return _array.filter(item => item.search(_modulo)!==-1);
        }

        const todosPermisos = _array =>{
            var arrayTodosPermisos = [];
            const todosPermisos = ' Todos los Permisos';
           
            arrayTodosPermisos = 
                permisosArray('Casos', 6, JSON.parse(JSON.stringify(_array)))
            .concat( 
                permisosArray('Ludoteca', 5, JSON.parse(JSON.stringify(_array))))
            .concat(
                permisosArray('Seguimiento Juridico', 5, JSON.parse(JSON.stringify(_array))))
            .concat(
                permisosArray('Camara Gessell', 5, JSON.parse(JSON.stringify(_array))));
            
            if(arrayTodosPermisos.length === 0) 
               return arrayTodosPermisos = ['Sin Permisos'];

            if(
                arrayTodosPermisos.includes('Casos'+todosPermisos) &&
                arrayTodosPermisos.includes('Ludoteca'+todosPermisos) &&
                arrayTodosPermisos.includes('Seguimiento Juridico'+todosPermisos) &&
                arrayTodosPermisos.includes('Camara Gessell'+todosPermisos)
            )
                return arrayTodosPermisos = ['Todos los Permisos']

            return arrayTodosPermisos;
        }
        const handleActualizarDatos = () => {
            loading.value = true;
            tablaUsuarios.value.handleActualizarDatos();
            loading.value = false;
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
        const handleClickEstado = (json) => {
            advertenciaRef.value.setJson(json); 
            mensajeAdvertencia.value = (json.estado === 'Activo'?'Desactivar':'Activar')+' el Usuario "'+ json.email+'", ¿Continuar?';
            modalAdvertenciaRef.value.showModal(); 
        };

        const handleClickEstadoCambiar = async _key =>{
            if(typeof _key !== 'undefined'){
                cargando(true)                
                const _response = await servicio.borrar('auth/estado/'+_key);
                tablaUsuarios.value.handleActualizarDatos();
                cargando(false)
            }
        }

        const cargarRegistro = async (json) => {
            try {
                if(typeof json.key === 'undefined')
                    return;

                cargando(true);
                formUsuarioRef.value.resetForm();
                const _response = await servicio.obtener('auth/obtener/'+json.key);
                cargando(false);
                
                if (typeof _response === 'undefined')
                    return;
                    
                formUsuarioRef.value.editForm(_response);
                modalUsuarioRef.value.showModal();
                
            } catch (error) {
                console.log('Error -> '+ error);
            }
        };

        return {
            // Variables
            data,
            loading,
            showVer,
            columnas,
            mensajeAdvertencia,
            urlTabla:'auth/index',

            // Ref
            tablaUsuarios,
            formUsuarioRef,
            advertenciaRef,
            modalUsuarioRef,
            modalAdvertenciaRef,
            
            // Metodos
            fetch,
            todosPermisos,
            handleChangedData,
            handleChangedLoading,
            handleActualizarDatos,
            handleClickEstadoCambiar,

            // Metodos Tabla
            handleClickEstado,
            handleClickEditar,
            handleClickVer,
        }
    },

})
</script>
