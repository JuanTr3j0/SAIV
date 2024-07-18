<template>
     <div class="row gy-2 pb-3">
        <!-- <div class="col-md-12 mt-2">
            <h3>Información de Víctima</h3>
            <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
        </div>                     --> 
        <slot name="header"/>        
        <FormInputVue
            :titulo="'Fecha Nacimiento'"
            :id="id+'-fechaNacimiento'"
            :type="'date'"
            :clases="'col-md-2'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.fechaNacimiento"
            @update:value="(value) => updateCampoValue(value, 'fechaNacimiento')"
        />
        <div class="col-md-2" >                            
            <label class=" fw-semibold d-block">Edad</label>       
            <label class="form-control fw-bold text-primary">{{getEdadString(persona.fechaNacimiento)??'N/A'}}</label>
        </div>
        <FormInputVue
            :titulo = "'Dui'"
            :id = "id+'-dui'"
            :clases = "'col-md-2'"
            :showVer ="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.dui"
            @update:value="(value) => updateCampoValue(value, 'dui')"
            @blur="verificarCasosRelacionados"
        />   
        <div class="col-md-6">
            <label class=" fw-semibold d-block" for="caso-tipo-hecho">
                {{!showVer && !existKey() ? 'Dui': 'Código del Caso'}}
                <i class="bx bx-search bx-sm" v-if="!showVer && !existKey()"/>
            </label>
            <div class="col-md">
                <vSelectPaginationVue
                    :loading="loadingSelect"
                    :data="dataSelect"
                    :url="urlPersonaDui"
                    :links="linksSelect"
                    :registros="registrosSelect"
                    :disabled="existKey()"
                    v-if="!showVer && !existKey()"
                    v-model="persona.dui"
                    @setUrlSelect="setUrlSelect"
                    @changeVariablesBusqueda="changeVariablesBusqueda"
                    @resetUrlSelect="resetUrlSelect"
                />
                    <label v-else class="form-control text-primary fw-bold">
                        {{codigoCaso === null || typeof codigoCaso === 'undefined'? "No ingresado": codigoCaso.label}}
                    </label>
            </div>                                
        </div>  
        <FormDeptoMuniVue
            :showVer="showVer ?? false"
            :persona="'Residencia'"
            :departamentos="(opciones===null?[]:opciones.departamentos)"
            :departamento="persona.departamento" 
            :municipio="persona.municipio" 
            @update:departamento ="value=>updateCampoValue(value, 'departamento')"
            @update:municipio ="value=>updateCampoValue(value, 'municipio')"
        ></FormDeptoMuniVue>  
        <FormNombreApellidoVue
            :showVer="showVer ?? false" 
            :persona="tipo"
            :primerNombre="persona.primerNombre" 
            :segundoNombre="persona.segundoNombre" 
            :primerApellido="persona.primerApellido" 
            :segundoApellido="persona.segundoApellido"
            @update:primerNombre ="value=>updateCampoValue(value, 'primerNombre')"
            @update:segundoNombre ="value=>updateCampoValue(value, 'segundoNombre')"
            @update:primerApellido ="value=>updateCampoValue(value, 'primerApellido')"
            @update:segundoApellido ="value=>updateCampoValue(value, 'segundoApellido')"
        ></FormNombreApellidoVue>  
        <FormSelectOpcionVue
            v-show="id!=='victima'"
            :id="id+'-relacion-victima'" :nombre="'Relación con Víctima'"
            :opciones="opciones === null ? []:opciones.relacionVictima"
            :clases="[persona.relacionVictima === 'Otra'?'col-md-6':'col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.relacionVictima"
            @update:opcion="value=>updateCampoValue(value, 'relacionVictima')"
        ></FormSelectOpcionVue>
        <Transition name="fade">
            <FormInputVue v-show="persona.relacionVictima === 'Otra'"
            :titulo="'Otra/o Relación con Víctima (Especifique)'"
            :id="id+'-relacion-victima-otra'"
            :clases="'col-md-3'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.relacionVictimaOtra"
            :disabled="persona.relacionVictima !== 'Otra'"
            @update:value="(value) => updateCampoValue(value, 'relacionVictimaOtra')"
            />       
        </Transition>    
        <FormSelectOpcionVue
            :id="id+'-sexo'" :nombre="'Sexo'"
            :opciones="opciones === null ? []:opciones.sexo"
            :clases="['col-md-3']" :loading="loadingSelect|loading" 
            :showVer="showVer ?? false"
            :opcion="persona.sexo"
            @change="()=>{persona.embarazada = (persona.sexo === 'Femenino' ? persona.embarazada:null);}"
            @update:opcion="value=>updateCampoValue(value, 'sexo')"
        ></FormSelectOpcionVue>   
        <FormSelectOpcionVue
            :id="id+'-genero'" :nombre="'Género'"
            :opciones="opciones === null ? []:opciones.genero"
            :clases="['col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.genero"
            @update:opcion="value=>updateCampoValue(value, 'genero')"
        ></FormSelectOpcionVue>               
        <FormSelectOpcionVue
            :id="id+'-estado-familiar'" :nombre="'Estado Familiar'"
            :opciones="opciones === null ? []:opciones.estado_familiar"
            :clases="['col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.estadoFamiliar"
            @update:opcion="value=>updateCampoValue(value, 'estadoFamiliar')"
        ></FormSelectOpcionVue>               
        <FormSelectOpcionVue
            :id="id+'-sabe-leer-escribir'" :nombre="'¿Sabe Leer y Escribir?'"
            :opciones="opciones === null ? []:opciones.sabe_escribir_leer"
            :clases="['col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.sabeEscribirLeer"
            @update:opcion="value=>updateCampoValue(value, 'sabeEscribirLeer')"
        ></FormSelectOpcionVue>               
        <FormSelectOpcionVue
            :id="id+'-nacionalidad'" :nombre="'Nacionalidad'"
            :opciones="opciones === null ? []:opciones.nacionalidad"
            :clases="[persona.nacionalidad === 'Otra'?'col-md-2':'col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.nacionalidad"
            @change="persona.nacionalidadOtra = persona.nacionalidad === 'Otra'?null:persona.nacionalidadOtra"
            @update:opcion="value=>updateCampoValue(value, 'nacionalidad')"
        ></FormSelectOpcionVue>          
        <Transition name="fade">
            <FormInputVue v-show="persona.nacionalidad === 'Otra'"
                :titulo="'Otra Nacionalidad (Especifique)'"
                :id="id+'-nacionalidad-otra'"
                :clases="'col-md-4'"
                :showVer="showVer"
                :loading = "loadingSelect|loading" 
                :value="persona.nacionalidadOtra"
                :disabled="persona.nacionalidad !== 'Otra'"
                @update:value="(value) => updateCampoValue(value, 'nacionalidadOtra')"
            />
        </Transition>    
        <Transition name="fade">
            <FormSelectOpcionVue v-show="persona.sexo==='Femenino'"
                :id="id+'-embarazada'" :nombre="'Embarazada'"
                :opciones="opciones === null ? []:opciones.embarazada"
                :clases="['col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
                :opcion="persona.embarazada" :disabled="persona.sexo!=='Femenino'"
                @update:opcion="value=>updateCampoValue(value, 'embarazada')"
            ></FormSelectOpcionVue> 
        </Transition>   
        <FormSelectOpcionVue
            :id="id+'-nivel-educacion'" :nombre="'Nivel de Educación'"
            :opciones="opciones === null ? []:opciones.nivel_educacion"
            :clases="['col-md-3']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.nivelEducacion"
            @update:opcion="value=>updateCampoValue(value, 'nivelEducacion')"
        ></FormSelectOpcionVue> 
        <FormSelectOpcionVue
            :id="id+'-discapacidad'" :nombre="'Discapacidad'"
            :opciones="opciones === null ? []:opciones.discapacidad"
            :clases="['col-md-6']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.discapacidad"
            @update:opcion="value=>updateCampoValue(value, 'discapacidad')"
        ></FormSelectOpcionVue>                   
        <FormSelectOpcionVue
            :id="id+'-ocupacion'" :nombre="'Ocupación'"
            :opciones="opciones === null ?[]:opciones.ocupacion"
            :clases="['col-md-6']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.ocupacion"
            @update:opcion="value=>updateCampoValue(value, 'ocupacion')"
            @change="handleChangedReset('ocupacion', 'ocupacionOtra')"
        ></FormSelectOpcionVue>  
        <Transition name="fade">
            <FormInputVue v-show="persona.ocupacion === 'Otra'"
                :titulo="'Otra Ocupación (Especifique)'"
                :id="id+'-ocupacion-otra'"
                :clases="'col-md-6'"
                :showVer="showVer"
                :loading = "loadingSelect|loading" 
                :value="persona.ocupacionOtra"
                :disabled="persona.ocupacion !== 'Otra'"
                @update:value="(value) => updateCampoValue(value, 'ocupacionOtra')"
            />
        </Transition>              
        <FormSelectOpcionVue
            :id="id+'-lugar-residencia-victima'" :nombre="'Propietario/a Lugar de Residencia Víctima'"
            :opciones="opciones === null ?[]:opciones.propietario_residencia"
            :clases="['col-md-6']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.propietarioResidencia"
            @update:opcion="value=>updateCampoValue(value, 'propietarioResidencia')"
            @change="handleChangedReset('propietarioResidencia', 'propietarioResidenciaOtro')"
        ></FormSelectOpcionVue> 
        <Transition name="fade">
            <FormInputVue v-show="persona.propietarioResidencia === 'Otro'"
                :titulo="'Otra/o Propietaria/o Lugar de Residencia Víctima (Especifique)'"
                :id="id+'-lugar-residencia-otra'"
                :clases="'col-md-6'"
                :showVer="showVer"
                :loading = "loadingSelect|loading" 
                :value="persona.propietarioResidenciaOtro"
                :disabled="persona.propietarioResidencia !== 'Otro'"
                @update:value="(value) => updateCampoValue(value, 'propietarioResidenciaOtro')"
            />
        </Transition>     
        <div class="col-md-6">
            <label class=" fw-semibold d-block" :for="id+'-fuente-ingreso'">Fuente de Ingresos</label>
            <LabelShowVer v-if="showVer" :value="persona.fuenteIngresos"/>
            <div class="col-md-12" v-if="!showVer">
                <v-select multiple placeholder="Seleccione" :style="vue_style_select" :id="id+'-fuente-ingreso'"
                    :disabled="showVer ?? false"
                    v-model="persona.fuenteIngresos" :options="opciones===null?[]:opciones.fuente_ingreso"
                    />
            </div>
        </div>  
        <Transition name="fade">
            <FormInputVue v-show="persona.fuenteIngresos.includes('Otra')"
                :titulo="'Otra Fuente de Ingresos (Especifique)'"
                :id="id+'-fuente-ingreso-otra'"
                :clases="'col-md-6'"
                :showVer="showVer"
                :loading = "loadingSelect|loading" 
                :disabled="!persona.fuenteIngresos.includes('Otra')"
                :value="persona.fuenteIngresosOtro"
                @input="(event) => updateCampo(event, 'fuenteIngresosOtro')"
            /> 
        </Transition>  
        <FormInputVue
            :titulo="'Dirección / Domicilio'"
            :id="id+'-direccion'"
            :clases="'col-md-4'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.direccion" 
            @input="(event) => updateCampo(event, 'direccion')"
        /> 
        <FormSelectOpcionVue
            :id="id+'-zona-residencial'" :nombre="'Zona Residencial'"
            :opciones="opciones === null ? []:opciones.zona_residencial"
            :clases="['col-md-2']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.zonaResidencial"
            @update:opcion="value=>updateCampoValue(value, 'zonaResidencial')"
        ></FormSelectOpcionVue>  
        <FormInputVue
            :titulo="'Tel. Móvil'"
            :id="id+'-telefono-movil'"
            :clases="'col-md-2'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.telefonoMovil"
            @input="(event) => updateCampo(event, 'telefonoMovil')"
        />  
        <FormSelectOpcionVue
            :id="id+'-tel-empresa-movil'" :nombre="'Empresa Tel. Móvil'"
            :opciones="opciones === null ? []:opciones.empresa_movil"
            :clases="['col-md-2']" :loading="loadingSelect|loading" :showVer="showVer ?? false"
            :opcion="persona.empresa"
            @update:opcion="value=>updateCampoValue(value, 'empresa')"
        ></FormSelectOpcionVue>  
        <FormInputVue
            :titulo="'Tel. Casa'"
            :id="id+'-tel-casa'"
            :clases="'col-md-2'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.telefonoCasa"
            @input="(event) => updateCampo(event, 'telefonoCasa')"
        />          
        <FormInputVue
            :titulo="'Lugar de Trabajo'"
            :id="id+'-lugar-trabajo'"
            :clases="'col-md-6'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.lugarTrabajo"
            @update:value="(value) => updateCampoValue(value, 'lugarTrabajo')"
        />
        <FormInputVue
            :titulo="'Direccion de Trabajo'"
            :id="id+'-direccion-trabajo'"
            :clases="'col-md-6'"
            :showVer="showVer"
            :loading = "loadingSelect|loading" 
            :value="persona.direccionTrabajo"
            @update:value="(value) => updateCampoValue(value, 'direccionTrabajo')"
        />
        <slot name="footer"/>   
        <div class="col-md-12 my-auto">
            <div class="row" v-if="(casosRelacionados??[]).length>0">
                <ul class="alert-danger m-2 clearfix rounded-3 pt-2">
                    <strong>Informacion:</strong>
                    <li  v-for="item in casosRelacionados" :key="item.denuncia">
                        <strong>La víctima tiene {{item.cantidad}} casos {{item.denuncia}}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
// Conexion service
import servicios_otros          from '@/services/otros'
import servicios                from '@/services/crud'
import store                    from '@/store/index'

// Component
import FormNombreApellidoVue    from '@/components/FormNombreApellido.vue'
import vSelectPaginationVue     from '@/components/V2_SelectPagination.vue'
import FormSelectOpcionVue      from '@/components/FormSelectOpcion.vue'
import FormDeptoMuniVue         from '@/components/FormDeptoMuni.vue'
import LabelShowVer             from '@/components/labelShowVer.vue'
import FormInputVue             from '@/components/FormInput.vue'

import { defineComponent, ref, toRefs } from 'vue'
export default defineComponent({
    props:[
        'persona',
        'id',
        'showVer',
        'loading',
        'opciones',
        'tipo',
        'vue_style_select'
    ],
    data(){
        return{
            servicios
        }
    },
    methods:{      
        verificarCasosRelacionados: async function(){
            this.casosRelacionados = await this.servicios.obtener('saiv/casos/cantidad/'+persona.key+'/'+persona.victima.dui);
            this.casosRelacionados??=[];           
        },
        updateCampo(event, key)  {
            let _persona = this.persona;
            _persona[key] = event.target.value;
            this.$emit('update:persona', _persona);
        },
        updateCampoValue(value, key)  {
            let _persona = this.persona;
            _persona[key] = value;
            this.$emit('update:persona', _persona);
        },
        handleChangedReset(_key, _key_otro){            
            if(this.persona[_key] !=='Otra') {
                let _persona = this.persona;
                _persona[_key_otro] = null;
                this.$emit('update:persona', _persona);
            }
        },
        getEdadString(fechaNacimiento){
            if(fechaNacimiento === null) {
                return ;
            }
            let edad = this.calcularEdad(fechaNacimiento);
            return edad > 0  && edad < 120? edad +' Años ' : null
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
    },
    watch:{
        'persona.fuenteIngresos'(nuevo){
            if(nuevo.includes('Otra'))
                return;
            
            let _persona = this.persona;
            _persona.fuenteIngresosOtro = null;
            this.$emit('update:persona', _persona);
        },
        loading(nuevo){
            this.handleChangedLoadingVueSelect(nuevo)
        }
    },
    components:{
        FormNombreApellidoVue,
        vSelectPaginationVue,
        FormSelectOpcionVue,
        FormDeptoMuniVue,
        LabelShowVer,
        FormInputVue,
    },
    setup(props) {
        //Invocacion de los props recibidos
        const { persona } = toRefs(props);

        // Paginacion Select Variables
        const registrosSelect   = ref(null)    
        const busquedaSelect    = ref(null)
        const loadingSelect     = ref(false)
        const linksSelect       = ref([])
        const dataSelect        = ref([])
        const showVer           = ref(false)
        
        const urlPersonaDui     = ref(store.state.URL_SERVER + 'saiv/persona/dui/index')
        const urlSelect         = ref(urlPersonaDui.value)

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

        // Metodos que se utilizan en el select paginacion
        const changeVariablesBusqueda = busqueda => {  
            //Obtenemos el valor a buscar en la base datos
            busquedaSelect.value = busqueda ??  busquedaSelect.value;              
            fetchSelect();
        }

        //Metodo de busqueda 
        const handleChangedLoadingVueSelect = (loading) => {
            loadingSelect.value = loading
        } 

        const resetUrlSelect = () => {
            urlSelect.value = urlPersonaDui.value;
        }

        const setUrlSelect = url => {
            urlSelect.value = url;
            fetchSelect(); 
        }

        const existKey = () => {
            return persona.value.id === null; 
        }
        
        //Metodos del formulario para la informacion personal
        const casosRelacionados = ref([]);

        const reset = () =>{
            casosRelacionados.value = [];
        }

        return {

            //Metodos usados en select vue
            handleChangedLoadingVueSelect,

            //Variables usadas en el select paginate
            registrosSelect,
            busquedaSelect,
            urlPersonaDui,
            loadingSelect,
            linksSelect,
            dataSelect,
            urlSelect,
            existKey,
            showVer,

            //Variables usadas en el formulario
            changeVariablesBusqueda,
            casosRelacionados,
            resetUrlSelect,
            setUrlSelect,
            reset,
        }
    }
})
</script>
    <style scoped>
    .fade-enter-active,
    .fade-leave-active {
        transition: opacity 1.2s ease;
    }

    .fade-enter-from,
    .fade-leave-to {
        opacity: 0;
    }
</style>