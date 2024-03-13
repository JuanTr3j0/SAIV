<template>
    <!-- Content -->
    <div class="container-fluid " style="background: rgb(36, 34, 55)">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">              
              <div class="container-fluid mb-3">
                <img
                  src="https://www.csj.gob.sv/wp-content/uploads/2021/06/cropped-logocsj-1-180x180.png"
                  alt="user-avatar"
                  class="d-block rounded-3 mx-auto"
                  height="150"
                  width="150"
                  id="uploadedAvatar"
                />
              </div>
              <h3 class="mb-2 text-center"><strong>Bienvenida/o a SAIV</strong></h3>               
              <p>
                <small class="p">Sección de Atención Integral a Victimas de la Corte Suprema de Justicia para el registro y gestión de casos de violencia</small>
              </p>
              <p>

              </p>
              <div class="alert" :class="{'alert-info':alert.tipo===null, 'alert-warning':alert.tipo==='warning', 'alert-success':alert.tipo==='success'}" role="alert">
                <div class="text-center">
                  <i v-if="loading" class="bx bx-loader-alt bx-spin" ></i>                 
                  <span v-if="alert.tipo===null"> Ingresa tus credenciales por favor.</span>
                  <span v-if="alert.tipo==='success'"> {{alert.errores[0]}}</span>
                </div>                  
                <ul v-if="alert.tipo==='warning'">
                  <li v-for="item in alert.errores" :key="item">
                    {{item}}
                  </li>
                </ul>
              </div>
              <form v-on:submit.prevent="handledInicioSesion" class="form" autocomplete="off" >
                <div class="mb-3">
                  <div class="d-flex justify-content-between">
                    <label for="correo" class="fw-semibold d-block"><code>*</code>Correo</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input :disabled="loading"
                      v-model.trim="formulario.correo"
                      type="email"
                      class="form-control"
                      name="correo-usuario"
                      placeholder="Ingrese"                      
                    />
                  </div>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="fw-semibold d-block" for="usario-contrasena"><code>*</code>Contraseña</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input :disabled="loading"
                      type="password"
                      id="usario-contrasena"
                      class="form-control"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      v-model.trim="formulario.contrasena"                        
                    />
                  </div>
                </div>
                <!-- <div class="mb-3">
                  <div class="form-check">
                    <input :disabled="loading"
                      class="form-check-input" 
                      v-model="recuerdame"
                      type="checkbox" id="usuario-recuerdame" />
                    <label class="form-check-label" for="usuario-recuerdame">  </label>
                  </div>
                </div>                 -->
                <div class="mb-3 float-end">
                    <router-link :to="'/'" :disabled="loading" type="button" @click="resetForm" class="btn btn-secondary text-start"  style="margin: 3px;">
                      <i class="bx bx-arrow-back"></i> Inicio
                    </router-link>
                    <button :disabled="loading" type="button" @click="resetForm" class="btn btn-secondary text-start" style="margin: 3px;">
                      <i class="bx bx-reset"></i> Reset
                    </button>
                    <button  :disabled="loading" class="btn  btn-primary text-start block" type="submit" style="margin: 3px;">
                      <i class="bx" :class="{'bx-log-in':!loading, 'bx-spin bx-loader':loading}"></i> Acceder
                    </button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <!-- / Content -->
</template>
<script>
import { ref, reactive } from 'vue'
import store from '@/store/index'
import servicio from '@/services/otros'
import router from '@/router/index'
export default {
  setup() {
    //Constantes
    const recuerdame = ref(false);
    const loading = ref(false);
    const alert = ref({ tipo:null, errores:[] });
    const form = { 
      correo:"", 
      contrasena:"" 
    };
    const formulario = reactive(JSON.parse(JSON.stringify(form)));
    
    //Created 
    store.commit('headerSesion');
    //recuerdame.value = localStorage.getItem('recuerdame')??=false;
    
    //Methods
    const resetForm = () => {
      Object.assign(formulario, JSON.parse(JSON.stringify(form)));
      alert.value.errores = [];
      alert.value.tipo = null;
    };

    const handledInicioSesion = async () =>{
      loading.value = true;
      try {        
        const response = await servicio.post(formulario,'auth/iniciar/sesion');
        if(response._response!==null){
          if(response._response.status === 201){

            alert.value.tipo = 'success';
            alert.value.errores = ['Éxito!'];
            loading.value = true;

            const data = response._response.data;
            console.log(data.permisos)
            store.commit('sesion', data);            
            alert.value.errores = ['Iniciando Sesión'];

            router.push({ name: "perfil"})
          }
        }else if(response._error!==null){
          const status = response._error.response.status;
          console.log("Errores: "+response._error);
          if( status === 401 || status === 403) {
            
            alert.value.tipo = 'warning'; 
            alert.value.errores = [response._error.response.data.message];

          }

          if(status === 402 || status === 422){  

            alert.value.tipo = 'warning';  
            alert.value.errores = [];      
            if(typeof response._error.response.data.errors.correo !== 'undefined')
              obtenerErrores(response._error.response.data.errors.correo);
            if(typeof response._error.response.data.errors.contrasena !== 'undefined')
              obtenerErrores(response._error.response.data.errors.contrasena);
            
          }
        }
        loading.value = false;
      } catch (error) {
        alert.value.tipo = 'warning'; 
        alert.value.errores = [error];
        loading.value = false;        
      }
      
    };

    const obtenerErrores = (array) =>{
      if(typeof array !== 'undefined'){
        let _array = alert.value.errores;
        alert.value.errores = _array.length>0?_array.concat(array):[].concat(array);
      }
     
    }

    return {
      alert,
      loading,
      formulario,
      recuerdame,
      //Metodos
      handledInicioSesion,
      resetForm
    }
  },
}
</script>
<style scoped>
  /**DESKTOP */
  @media only screen and (min-width: 980px) {
    .fondo-login{
      background-color:#252138;; 
      padding-top: 25%; 
      padding-bottom: 15%; 
      padding-left: 15%; 
      padding-right: 15%; 
      border-radius: 1%;
    }
  }
  /**LAPTOP */
  @media only screen and (min-width: 768px) {
    .fondo-login{
      background-color:#252138;; 
      padding-top: 10%; 
      padding-bottom: 10%; 
      padding-left: 15%; 
      padding-right: 15%; 
      border-radius: 1%;
    }
  }
  /**PHONE */
  @media only screen and (min-width: 320px) {
    
  }
  @import '../assets/css/page-auth.css'
</style>