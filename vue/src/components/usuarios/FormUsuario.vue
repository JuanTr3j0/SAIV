<template>
    <div class="border border-2 border-light mx-0 p-1 rounded">
      <form>
          <div class="p-1 clearfix"> 
            <div class="container-fluid border border-2 border-primary rounded-3">
              <div class="col-md mt-2">
                  <h3 class="my-2"> <i class="bx bx-user bx-md"></i> Usuaria/o</h3>
              </div>
              <div class="row">
                <FormInput
                  :id="'usuario'"
                  :obligatorio="true"
                  :loading="loading"
                  :clases="'col-md-6  mb-2'"
                  :showVer ="showVer"
                  :disabled="loading"
                  :titulo="'Usuaria/o'"
                  v-model:value="formulario.usuario"
                />
                <FormInput
                  :id="'usuario-email'"
                  :obligatorio="true"
                  :loading="loading"
                  :clases="'col-md-6  mb-2'"
                  :showVer ="showVer"
                  :type="'email2'"
                  :disabled="loading"
                  :titulo="'Correo'"
                  v-model:value="formulario.correo"
                />
                <FormSelectOpcion
                  :id="'usuario-oficina'"
                  :obligatorio = "true"
                  :nombre = "'Oficina'"
                  :clases = "['col-md-6', 'mb-2']"
                  :opciones = "opciones === null?[]:opciones.oficinas"
                  :showVer = "showVer"
                  :loading = "loading"
                  v-model:opcion = "formulario.oficina"
                />
                <FormSelectOpcion
                  :id="'usuario-tipo-usuario'"
                  :obligatorio = "true"
                  :nombre = "'Tipo'"
                  :clases = "['col-md-6', 'mb-2']"
                  :opciones = "['Usuaria/o', 'Administrador']"
                  :showVer = "showVer"
                  :loading = "loading"
                  v-model:opcion = "formulario.tipo_usuario"
                  @change="if(formulario.tipo_usuario!=='Usuaria/o') resetPermisos();"
                />
                <FormInput
                  v-show="!showVer"
                  :id="'usuario-contrasena'"
                  :obligatorio="true"
                  :loading="loading"
                  :clases="'col-md-6  mb-2'"
                  :showVer ="showVer"
                  :type="'password'"
                  :disabled="loading"
                  :titulo="'Contraseña'"
                  v-model:value="formulario.contraseña"
                />
           
                <FormInput
                  v-show="!showVer"
                  :id="'usuario-repetir-contrasena'"
                  :obligatorio="true"
                  :clases="'col-md-6  mb-2'"
                  :loading="loading"
                  :showVer ="showVer"
                  :type="'password'"
                  :disabled="loading"
                  :titulo="'Repetir Contraseña'"
                  v-model:value="formulario.repetir_contraseña"
                />
              </div>
              <div class="row m-2 border border-secondary border-2 rounded-2" v-if="false">
                <h5 class="mt-3"><i class="bx bx-caret-right"></i> Permisos de Usuaria/o</h5>
                <div class=" mb-2 clearfix" >
                  <table class="table-responsive table table-bordered border border-secondary table-striped mx-0 table-sm mb-3">
                    <thead>
                      <tr>
                          <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Modulos</th>
                          <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Permisos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr v-for="item in formulario.permisos" :key="item" :class="{'table-primary':item.permisos.findIndex(item => item.bool)!=-1}">
                        <td class="text-center fw-bold" :class="{'text-primary':item.permisos.findIndex(item => item.bool)!=-1}">
                          {{item.modulo}}
                        </td>
                        <td class="text-start-center fw-bold">
                          <div class="form-check form-check-inline mt-3" v-for="itemP in item.permisos" :key="itemP.name">
                              <input v-model="itemP.bool" class="form-check-input" type="checkbox" :id="'defaultCheck'+itemP.name+item.modulo" :disabled="formulario.tipo_usuario==='Administrador' || showVer"/>
                              <label class="form-check-label" :for="'defaultCheck'+itemP.name+item.modulo" :class="{'text-primary':itemP.bool}"> {{itemP.name}} </label>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div> 
              <div class="px-2">
                <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
              </div>              
            </div>   
            <div class="mt-3 float-end">
              <button :disabled="loading" type="button" class="btn btn-secondary m-1" data-bs-dismiss="modal">
                <i class="bx bx-exit"></i> Salir
              </button>
              <button :disabled="loading" type="button" class="btn btn-secondary m-1">
                <i class="bx bx-reset"></i> Reset
              </button>
              <button :disabled="loading" type="button" class="btn btn-primary m-1" @click="handledClickGuardar">
                <i class="bx" :class="{'bx-save':!loading, 'bx-spin bx-loader':loading}"></i> Guardar
              </button>
            </div>
          </div>
      </form>
    </div>
  </template>
  <script>
  import servicios  from '@/services/crud';
  
  import { reactive, ref, onMounted } from 'vue'
  
  // Components
  import FormInput          from '@/components/FormInput.vue'
  import FormSelectOpcion   from '@/components/FormSelectOpcion.vue'
  import AlertVue           from '@/components/Alert.vue';
  export default {
    name:"FormUsuarioComponent",
    props:['showVer'],
    components:{
      FormSelectOpcion,
      FormInput,
      AlertVue
    },
    setup(props, { emit }) {
      // Variables
      const loading = ref(false);
      const opciones = ref(null);
      const crud = [
        {name:'Crear', bool:false}, {name:'Ver', bool:false }, 
        {name:'Editar', bool:false}, {name:'Borrar', bool:false},
      ];
      const form = {
        key:null,
        usuario:null,
        correo:null,
        tipo_usuario:'Usuaria/o',
        oficina:null,
        contraseña:null,
        repetir_contraseña:null,
        estado:null,
        permisos:[
          {
            modulo:'Casos',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Subir Archivos', bool:false},
              {name:'Bajar Archivos', bool:false},
            ])
          },
          {
            modulo:'Ludoteca',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          },
          {
            modulo:'Seguimiento Juridico',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          },
          {
            modulo:'Camara Gessell',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          }
        ]
      };
      const formulario = reactive(JSON.parse(JSON.stringify(form)));
      const tipoAlert = ref(null);
      const mensajesAlert = ref(null);
  
      // Metodos
      function resetForm() {
        tipoAlert.value     = null;
        mensajesAlert.value = null;
        loading.value       = false;
        Object.assign(formulario, JSON.parse(JSON.stringify(form)));
      };
  
      function editForm(_form) {
        Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
      };
      const resetPermisos = () =>{
        formulario.permisos = [
          {
            modulo:'Casos',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Subir Archivos', bool:false},
              {name:'Bajar Archivos', bool:false},
            ])
          },
          {
            modulo:'Ludoteca',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          },
          {
            modulo:'Seguimiento Juridico',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          },
          {
            modulo:'Camara Gessell',
            permisos:JSON.parse(JSON.stringify([...crud])).concat([
              {name:'Agenda', bool:false},
            ])
          }
        ];
      }
      const handledClickGuardar = async() =>{
      
  // Código para enviar la solicitud
  
        loading.value = true;                
        try {
            const _response = await servicios.actualizarCrear(formulario, 'auth/registro');
            if(_response.ok)
            {
                if(_response.json.error){
                  tipoAlert.value = 'warning';
                  mensajesAlert.value = _response.json.error;
                }else{
                  formulario.key = _response.json.key;
                  tipoAlert.value = mensajesAlert.value = null;
                }
              emit('handleActualizarDatosTabla');
            }
            loading.value = false;      
        } catch (error) {                
            console.log('¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento');
            loading.value = false;
        }
      }; 
  
      onMounted(async() => {
        opciones.value = await servicios.obtener('auth/opciones');
      });
  
      return {
        // Variables
        opciones,
        loading,
        formulario,
        tipoAlert,
        mensajesAlert,
  
        // Metodos
        editForm,
        resetForm,
        handledClickGuardar,
        resetPermisos,
      }
    }
  }

  </script>
  