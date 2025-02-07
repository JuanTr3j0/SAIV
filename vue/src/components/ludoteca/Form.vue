<template>
    <div class="card clearfix">  
        <div class="card-body">
            <form action="">
                <div class="row py-1 gy-2 mt-1 border border-2 border-primary rounded-3">
                    <div class="col-md-12 mt-2">
                        <h3 class="align-text-bottom"><i class='bx bxs-certification bx-md'></i>Ludoteca</h3>                            
                    </div>
                    <slot name="codigo-caso"/>
                    <div class="col-md">
                        <label class="fw-semibold d-block">Tipo de violencia</label>
                        <labelShowVer
                            v-if="(showVer ?? false)"
                            :value="formulario.tipoViolencia.length > 0 ? formulario.tipoViolencia : 'No Ingresado'"
                        /> 
                        <v-select
                            v-else
                            multiple
                            placeholder="Seleccione"
                            :options="opciones === null ? []:opciones.tiposViolencia"
                            :style="vue_style_select"
                            :loading="loading"         
                            :disabled="loading"                               
                            v-model="formulario.tipoViolencia"
                        />
                    </div>
                    <label class="fw-semibold d-block">
                        <i class='bx bx-caret-right'></i> Nombre del Niña, Niño o Adolescente
                    </label>
                    <FormNombreApellidoVue
                        :showVer="showVer ?? false"
                        :loading="loading" 
                        :primerNombre="formulario.ninoAdolecente.primerNombre" 
                        :segundoNombre="formulario.ninoAdolecente.segundoNombre" 
                        :primerApellido="formulario.ninoAdolecente.primerApellido" 
                        :segundoApellido="formulario.ninoAdolecente.segundoApellido"
                        @update:primerNombre ="value=>updateCampoValue(value, 'ninoAdolecente', 'primerNombre')"
                        @update:segundoNombre ="value=>updateCampoValue(value, 'ninoAdolecente', 'segundoNombre')"
                        @update:primerApellido ="value=>updateCampoValue(value, 'ninoAdolecente', 'primerApellido')"
                        @update:segundoApellido ="value=>updateCampoValue(value, 'ninoAdolecente', 'segundoApellido')"
                    ></FormNombreApellidoVue>
                    <div class="col-md-6">                                                                                                                                                                                <label class="fw-semibold d-block" for="fecha-nacimiento">Fecha de Nacimiento</label>
                        <div class="row">
                            <div class="col-md-6 my-1">
                                <FormInputVue
                                    :id="id+'-fecha-nacimiento'"
                                    :titulo="'Fecha:'"
                                    :loading="loading"
                                    :showVer="showVer"
                                    :type="'date'"
                                    :clases="['input-group']"
                                    v-model:value="formulario.ninoAdolecente.fechaNacimiento"
                                />
                            </div>
                            <div class="col-md-6 my-1">
                                <div class="input-group">
                                    <span class="input-group-text fw-bold text-primary">Edad:</span>
                                    <label class="form-control text-primary fw-bold">
                                        {{ getEdadString(formulario.ninoAdolecente.fechaNacimiento) }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <FormSelectOpcionVue
                        :id="'escolaridad'" :nombre="'Escolaridad'"
                        :opciones="opciones === null ? []: opciones.escolaridad"
                        :clases="['col-md-6', 'col-md-auto']" 
                        :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.responsable.nivelEducacion"                                          
                    ></FormSelectOpcionVue>
                    <label class="fw-semibold d-block">
                        <i class='bx bx-caret-right'></i> Nombre de la Madre o Responsable
                    </label>
                    <FormNombreApellidoVue
                        :showVer="showVer ?? false"
                        :loading="loading" 
                        :primerNombre="formulario.responsable.primerNombre" 
                        :segundoNombre="formulario.responsable.segundoNombre" 
                        :primerApellido="formulario.responsable.primerApellido" 
                        :segundoApellido="formulario.responsable.segundoApellido"
                        @update:primerNombre ="value=>updateCampoValue(value, 'responsable', 'primerNombre')"
                        @update:segundoNombre ="value=>updateCampoValue(value, 'responsable', 'segundoNombre')"
                        @update:primerApellido ="value=>updateCampoValue(value, 'responsable', 'primerApellido')"
                        @update:segundoApellido ="value=>updateCampoValue(value, 'responsable', 'segundoApellido')"
                    ></FormNombreApellidoVue>   
                    <FormSelectOpcionVue
                        :id="id+'parentesco-responsable'" :nombre="'Parentesco Responsable'"
                        :opciones="opciones === null ? []: opciones.parentescoResponsable"
                        :clases="['col-md-3']" 
                        :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.parentescoResponsable"  
                        @change="if(formulario.parentescoResponsable !== 'Otro') formulario.parentescoResponsableOtro = null;"                                        
                    ></FormSelectOpcionVue>
                    <Transition name="fade"> 
                        <FormInputVue
                            v-show="formulario.parentescoResponsable === 'Otro'"
                            :id="id+'-dui-responsable'"
                            :titulo="'Parentesco Responsable Otro (Especifique):'"
                            :loading="loading"
                            :showVer="showVer"
                            :clases="['col-md-3']"
                            v-model:value="formulario.parentescoResponsableOtro"
                        />      
                    </Transition>         
                    <FormInputVue
                        :id="id+'-dui-responsable'"
                        :titulo="'Dui de Responsable'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-3']"
                        v-model:value="formulario.responsable.dui"
                     
                    />
                    <div class="row mt-2">
                        <FormSelectOpcionVue
                            :id="id+'-area-residencial'" :nombre="'Area Residencial'"
                            :opciones="opciones === null ?[]:opciones.zonaResidencial"
                            :clases="['col-md-3']" 
                            :loading="loading" :showVer="showVer ?? false"
                            v-model:opcion="formulario.responsable.areaResidencial"                                          
                        ></FormSelectOpcionVue>
                        <FormInputVue
                            :id="id+'-telefono-movil-responsable'"
                            :titulo="'Tel. Móvil'"
                            :loading="loading"
                            :showVer="showVer"
                            :clases="['col-md-3']"
                            v-model:value="formulario.responsable.telefonoMovil"
                        />                    
                        <FormSelectOpcionVue
                            id="'tel-empresa-movil'" :nombre="'Empresa Tel. Móvil'"
                            :opciones="opciones === null ?[]:opciones.empresaMovil"
                            :clases="['col-md-3']" :loading="loading" :showVer="showVer ?? false"
                            v-model:opcion="formulario.responsable.empresaMovil"
                        ></FormSelectOpcionVue>
                        <FormInputVue
                            :id="id+'-telefono-casa-responsable'"
                            :titulo="'Tel. Casa'"
                            :loading="loading"
                            :showVer="showVer"
                            :clases="['col-md-3']"
                            v-model:value="formulario.responsable.telefonoCasa"
                        />     
                    </div>
                    <label class="fw-semibold d-block">
                        <i class='bx bx-caret-right'></i> Tipos de Atención a Menores 
                    </label>    
                    <div class="row">
                        <div class="col-md">
                            <FormSelectOpcionVue
                                id="id+'-tipo-atencion'" :nombre="'Tipo Atención:'"
                                :opciones="opciones === null ?[]:opciones.tipoAtencion"
                                :clases="['input-group', 'my-2']" 
                                :loading="loading" 
                                :showVer="showVer ?? false"
                                v-model:opcion="formulario.tipoAtencion"
                            /> 
                        </div>
                        <div class="col-md">
                            <FormInputVue
                                :id="id+'-telefono-casa-responsable'"
                                :titulo="'Fecha y Hora:'"
                                :loading="loading"
                                :showVer="showVer"
                                :type="'datetime-local'"
                                :clases="['input-group', 'my-2']"
                                v-model:value="formulario.tipoAtencion_fecha_hora"
                            />          
                        </div>
                    </div>
                    <label class="fw-semibold d-block">
                        <i class='bx bx-caret-right'></i> Orientación a Madres o Responsables 
                    </label>    
                    <div class="row">
                        <div class="col-md">
                            <FormSelectOpcionVue
                                id="id+'-tipo-orientacion'" :nombre="'Orientación:'"
                                :opciones="opciones === null ?[]:opciones.orientacionResponsable"
                                :clases="['input-group', 'my-2']" 
                                :loading="loading" 
                                :showVer="showVer ?? false"
                                v-model:opcion="formulario.orientacionResponsable"
                            /> 
                        </div>
                        <div class="col-md">
                            <FormInputVue
                                :id="id+'-orientacion-responsable-fecha-hora'"
                                :titulo="'Fecha y Hora:'"
                                :loading="loading"
                                :showVer="showVer"
                                :type="'datetime-local'"
                                :clases="['input-group', 'my-2']"
                                v-model:value="formulario.orientacionResponsables_fecha_hora"
                            />          
                        </div>
                    </div>
                    <FormInputVue
                        :id="id+'-proxima-cita'"
                        :titulo="'Próxima Cita:'"
                        :loading="loading"
                        :showVer="showVer"
                        :type="'datetime-local'"
                        :clases="['col-md-6', 'my-2']"
                        v-model:value="formulario.proximaCita"
                    />  
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
import FormSelectOpcionVue      from '@/components/FormSelectOpcion.vue';
import FormNombreApellidoVue    from '@/components/FormNombreApellido.vue'
import ButtonsFormVue           from '@/components/ButtonsForm.vue';
import FormInputVue             from '@/components/FormInput.vue';
import labelShowVer             from '@/components/labelShowVer.vue';
import AlertVue                 from '@/components/Alert.vue';

import servicios from '@/services/crud';
import store from '@/store';

import { defineComponent, ref, reactive, onMounted, watch, props } from 'vue'
export default defineComponent({
    props:['showVer', 'caso'],
    setup(props){
        // Variables
        const id = ref('ludoteca-');
        const vue_style_select = ref('--vs-font-size: 0.9375rem;')
        const loading = ref(false);
        const tipoAlert = ref(null);
        const opciones = ref(null);
        const mensajesAlert = ref(null);
        const form = {
            key:null,
            codigoCaso:null,
            tipoViolencia:[],
            ninoAdolecente:{
                key:null,
                dui:null,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                fechaNacimiento:null,
                nivelEducacion:null,
                areaResidencial:null,
                telefonoMovil:null,
                empresaMovil:null,
                telefonoCasa:null,
            },
            responsable:{
                key:null,
                dui:null,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                fechaNacimiento:null,
                nivelEducacion:null,
                areaResidencial:null,
                telefonoMovil:null,
                empresaMovil:null,
                telefonoCasa:null,
            },
            parentescoResponsable:null,
            parentescoResponsableOtro:null,
            tipoAtencion:null,
            tipoAtencion_fecha_hora:null,
            orientacionResponsables:null,
            orientacionResponsables_fecha_hora:null,
            proximaCita:null,            
        };
        const formulario = reactive(JSON.parse(JSON.stringify(form)));

        // Metodos
        function resetForm() {
            tipoAlert.value                 = null;
            mensajesAlert.value             = null;
            loading.value                   = false;
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
        };

        function editForm(_form) {
            Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
        };

        const existKey = () => { return formulario.key !== null };
        const handleChangeCodigoCaso = _CodigoCaso => formulario.codigoCaso = _CodigoCaso;
        const handleChangeLoading = _loading => loading.value = _loading; 
        const guardar = async() =>{
            try {
                loading.value = true;                
                const responseSeguimiento = await servicios.actualizarCrear(formulario, 'saiv/ludoteca/guardar');
                if(responseSeguimiento.ok)
                {
                    if(responseSeguimiento.json.error){
                        tipoAlert.value = 'warning';
                        mensajesAlert.value = responseSeguimiento.json.error;
                    }else{
                        formulario.ninoAdolecente.key   = responseSeguimiento.json.ninoAdolecenteKey;
                        formulario.responsable.key      = responseSeguimiento.json.responsableKey;
                        formulario.key                  = responseSeguimiento.json.key;
                        tipoAlert.value                 = null;
                        mensajesAlert.value             = null;
                    }
                }
                loading.value = false;
            } catch (error) {                
                console.log('¡Ups ocurrió un error!, no se pudo guardar el registro ludoteca');
                console.log(error)
                loading.value = false;
            }
        }; 

        onMounted(async ()=>{
            loading.value  = true;
            let response = await servicios.obtener('saiv/opciones/ludoteca/index');
            opciones.value = response;
            opciones.value??=null;
            loading.value = false;
        })

        // Watch para detectar cambios en 'caso' (prop del componente)
        watch(() => props.caso, (nuevoValor, viejoValor) => {

            Object.assign(formulario.responsable, JSON.parse(JSON.stringify(form.responsable)));
            Object.assign(formulario.ninoAdolecente, JSON.parse(JSON.stringify(form.responsable)));
           
            if (nuevoValor === null || nuevoValor.responsable.key === null)
                return
            else{
                let responsable = nuevoValor.responsable
                let dui = typeof responsable.dui === 'object'? responsable.dui.label: responsable.dui
                formulario.responsable.dui             = dui            
                formulario.responsable.telefonoCasa    = responsable.telefonoCasa  
                formulario.responsable.empresaMovil    = responsable.empresa  
                formulario.responsable.primerNombre    = responsable.primerNombre   
                formulario.responsable.telefonoMovil   = responsable.telefonoMovil  
                formulario.responsable.segundoNombre   = responsable.segundoNombre  
                formulario.responsable.primerApellido  = responsable.primerApellido 
                formulario.responsable.nivelEducacion  = responsable.nivelEducacion 
                formulario.responsable.segundoApellido = responsable.segundoApellido
                formulario.responsable.fechaNacimiento = responsable.fechaNacimiento
                formulario.responsable.areaResidencial = responsable.zonaResidencial
                
                let nino = nuevoValor.victima
                formulario.ninoAdolecente.telefonoCasa    = nino.telefonoCasa  
                formulario.ninoAdolecente.empresaMovil    = nino.empresa  
                formulario.ninoAdolecente.primerNombre    = nino.primerNombre   
                formulario.ninoAdolecente.telefonoMovil   = nino.telefonoMovil  
                formulario.ninoAdolecente.segundoNombre   = nino.segundoNombre  
                formulario.ninoAdolecente.primerApellido  = nino.primerApellido 
                formulario.ninoAdolecente.nivelEducacion  = nino.nivelEducacion ?? 'Seleccione'
                formulario.ninoAdolecente.segundoApellido = nino.segundoApellido
                formulario.ninoAdolecente.fechaNacimiento = nino.fechaNacimiento
                formulario.ninoAdolecente.areaResidencial = nino.zonaResidencial  
            }

        });
        
        return {
            // Variables
            vue_style_select,
            mensajesAlert,
            formulario,
            tipoAlert,
            opciones,
            loading,
            id,

            //Metodos
            handleChangeCodigoCaso,
            handleChangeLoading,
            resetForm,
            editForm,
            existKey,
            guardar,
        }
    },
    components: {
        AlertVue,
        FormInputVue,
        labelShowVer,
        ButtonsFormVue,
        FormSelectOpcionVue,
        FormNombreApellidoVue,
    },
    methods: {
        //Metodos
        getEdadString(fechaNacimiento){
            if(fechaNacimiento === null) {
                return '?';
            }
            let edad = this.calcularEdad(fechaNacimiento);
            return edad > 0  && edad < 120? edad +' Años ' : '?';
        },
        getEdadInt(fechaNacimiento){
            let edad = this.calcularEdad(fechaNacimiento);
            return edad > 0 && edad < 120 ? edad : 0;
        },       
        calcularEdad(setFechaNacimiento){
            if(setFechaNacimiento===null || typeof setFechaNacimiento === "undefined")
                return null;
    
            let fechaArray = setFechaNacimiento.split('-');
            let hoy = new Date()
            let fechaNacimiento_aux = new Date(fechaArray[0], fechaArray[1]-1, fechaArray[2])
            let edad_aux = hoy.getFullYear() - fechaNacimiento_aux.getFullYear()
            let diferenciaMeses = hoy.getMonth() - fechaNacimiento_aux.getMonth()
            
            if (
                diferenciaMeses < 0 ||
                (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento_aux.getDate())
            ) {
                edad_aux--
            }
            return edad_aux;
        }, 
        updateCampoValue(value, key_0, key_1)  {
            this.formulario[key_0][key_1] = value;
        },
    },
})
</script>
