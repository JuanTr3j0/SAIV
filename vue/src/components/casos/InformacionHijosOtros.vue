<template>
    <div class="row">
        <slot name="header"/>
        <div class="col-md-12">
            <h4 class="fw-bold"><i class='bx bxs-right-arrow' ></i> Hijos Vivos</h4>
            <div class="container-fluid p-2 my-1 mx-auto">
                <div class="col-md-12">
                    <h5 class="fw-bold text-primary">¿Tiene hijos vivos?</h5>
                </div>
                <div class="col-md-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" :name="id+'-inlineRadioOptions'"  
                        :disabled="showVer ?? false"
                        :id="id+'-inlineRadio1'" value="Si" @input="(event) => updateCampo(event, 'hijosVivos')"
                        :checked="persona.hijosVivos === 'Si'">
                        <label class="form-check-label fw-bold text-primary"  :for="id+'inlineRadio1'">Si</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input 
                        class="form-check-input" type="radio" 
                        :name="id+'-inlineRadioOptions'" 
                        :id="id+'-inlineRadio2'"
                        :disabled="showVer ?? false"
                        :checked="persona.hijosVivos === 'No'"
                        value="No" @input="(event) => updateCampo(event, 'hijosVivos')"> 
                        <label class="form-check-label fw-bold text-primary"  :for="id+'inlineRadio2'">No</label>
                    </div>
                </div>
            </div>
            <Transition name="fade">
                <div class="border border-primary mb-2 clearfix" v-show="persona.hijosVivos === 'Si'">
                    <table class="table-responsive table table-bordered table-striped m-0 table-sm">
                        <thead>
                            <tr>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">N°</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Nombres</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Sexo</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Edad</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Grado de Escolaridad</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">¿Vive Con Ella?</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Discapacidad</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;" v-show="!(showVer ?? false)">Acción</th>
                            </tr>
                        </thead>
                        <tbody v-auto-animate>
                            <tr v-if="persona.hijos.length<1">
                                <td colspan="8" class="text-center"><i class="bx bxs-data bx-md"></i><h5 class="mt-2"> No Datos</h5></td>
                            </tr>
                            <tr v-else v-for="(item, key) in persona.hijos" :key="item">
                                <td class="text-center fw-bold">{{(key+1)}}</td>
                                <td>
                                    <input :readonly="showVer ?? false" :disabled = "loading" 
                                        v-model="item.nombres"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        type="text" 
                                        class="form-control" :id="id+'-nombres-'+(key+1)" 
                                        placeholder="Ingrese" 
                                    />
                                </td>
                                <td>
                                    <select
                                        v-model="item.sexo"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        class="form-select"  
                                        :id="id" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">                                            
                                        <template v-for="item in ['F', 'M']" :key="item" >
                                            <option :value="item" :selected="item===item.sexo">{{item}}</option>
                                        </template>
                                    </select>
                                </td>
                                <td>
                                    <input :readonly="showVer ?? false" :disabled = "loading" 
                                        v-model="item.edad"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        type="number" min="0" max="120"
                                        class="form-control" :id="id+'-edad-'+(key+1)" 
                                        placeholder="0" 
                                    />
                                </td>
                                <td>
                                    <select
                                        v-model="item.gradoEscolar"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        class="form-select" 
                                        :id="id+'-escolaridad-'+(key+1)" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">
                                        <option :selected="typeof item.gradoEscolar!=='string'">
                                            Seleccione
                                        </option>
                                        <template v-for="_item in opciones === null? []:opciones.nivel_educacion" :key="_item">
                                            <option :value="_item" :selected="_item===item.gradoEscolar">{{_item}}</option>
                                        </template>
                                    </select>
                                </td>
                                <td>
                                    <select
                                        v-model="item.viveConElla"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        class="form-select" 
                                        :id="id+'vive-con-ella'" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">
                                        <template v-for="item in ['Si', 'No']" :key="item">
                                            <option :value="item" :selected="item===item.viveConElla">{{item}}</option>
                                        </template>
                                    </select>
                                </td>
                            
                                <td>
                                    <select
                                        v-model="item.discapacidad"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        class="form-select"  
                                        :id="id+'-discapacidad'" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">
                                        <template v-for="item in ['Si', 'No']" :key="item">
                                            <option :value="item" :selected="item===item.discapacidad">{{item}}</option>
                                        </template>
                                    </select>
                                </td>
                                <td class="text-center" v-show="!(showVer ?? false)">
                                    <Popper class="popper-theme text-start" arrow>
                                        <button type="button" class="btn btn-sm btn-danger rounded-3 m-1" :disabled="loading" title="Eliminar"><i class="bx bx-trash"></i></button>
                                        <template #content="{ close }">
                                            <div class="dropdown-header">
                                                <h6 class="text-wrap text-nowrap "><strong>Esta acción no se podra revertir,<br> ¿Continuar?</strong></h6>
                                            </div>
                                            <button type="button" class="dropdown-item text-start-center" @click="handledEliminarItem('hijos', key); close();" :disabled="loading">
                                                <i class="bx bx-check"></i> Continuar
                                            </button>
                                            <button type="button" class="dropdown-item text-start-center" @click="close();" :disabled="loading">
                                                <i class="bx bx-x"></i> Cancelar
                                            </button>
                                        </template>
                                    </Popper>
                                </td>
                            </tr>
                        </tbody>
                        <thead v-if="persona.hijos.length>0">
                            <tr>
                                <th colspan="2" class="text-end bg-label-primary text-white fw-bold">Total</th>
                                <th class="text-center bg-label-primary text-white fw-bold">
                                    F:{{countArray(persona.hijos, 'sexo', 'F')}} | 
                                    M:{{countArray(persona.hijos, 'sexo', 'M')}}
                                </th>
                                <th colspan="2" class="text-center bg-label-primary text-white fw-bold"></th>
                                <th class="text-center bg-label-primary text-white fw-bold">
                                    Si:{{countArray(persona.hijos, 'viveConElla', 'Si')}} |
                                    No:{{countArray(persona.hijos, 'viveConElla', 'No')}} 
                                </th>
                                <th class="text-center bg-label-primary text-white fw-bold">
                                    Si:{{countArray(persona.hijos, 'discapacidad', 'Si')}} |
                                    No:{{countArray(persona.hijos, 'discapacidad', 'No')}} 
                                </th>
                                <th class="text-center bg-label-primary text-white fw-bold"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </Transition>     
            <Transition name="fade">
                <button type="button" class="btn btn-primary" @click="handledAgregarHijo" v-show="!(showVer ?? false) && persona.hijosVivos === 'Si'">
                    <i class="bx bx-plus"></i> Agregar Hijo
                </button>
            </Transition>  
            <Transition name="fade">
                <div class="container-fluid alert-primary my-2 pt-3 pb-1 rounded-3" 
                    v-if="persona.hijos.length>0">
                    <h5 class="fw-bold text-primary mb-0">Información</h5>
                    <ul v-auto-animate class="mt-2">
                        <li v-if="countArray(persona.hijos, 'sexo', 'F')">
                            Total hijas: <strong>{{countArray(persona.hijos, 'sexo', 'F')}}</strong>.
                        </li>
                        <li v-if="countArray(persona.hijos, 'sexo', 'M')">
                            Total hijos: <strong>{{countArray(persona.hijos, 'sexo', 'M')}}</strong>.
                        </li>
                        <li v-if="countArray(persona.hijos, 'viveConElla', 'Si')">
                            Total hijos/as convivientes: <strong>{{countArray(persona.hijos, 'viveConElla', 'Si')}}</strong>.
                        </li>
                        <li v-if="countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'F')">
                            Total hijas con discapacidad: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'F')}}</strong>.
                        </li>
                        <li v-if="countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'M')">
                            Total hijos con discapacidad: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'M')}}</strong>.
                        </li>
                        <li v-if="countArray(persona.hijos, 'discapacidad', 'Si')">
                            Total discapacitados/as: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si')}}</strong>.
                        </li>
                        <li v-if="persona.otrasPersonas.length>0">
                            Otras personas que conviven en la misma casa: <strong>{{persona.otrasPersonas.length}}</strong>.
                        </li>
                    </ul>
                </div>
            </Transition>         
        </div>
        <hr class="mt-3">
        <div class="col-md-12">
            <h4 class="fw-bold mt-2"><i class='bx bxs-right-arrow'></i> Otras Personas Convivientes</h4>
            <div class="container-fluid p-2 my-1 mx-auto">
                <div class="col-md-12">
                    <h5 class="fw-bold text-primary">¿Tiene otras personas convivientes?</h5>
                </div>
                <div class="col-md-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" :name="id+'-inlineRadioOptions1'" 
                        :id="id+'-inlineRadio3'" value="Si" @input="(event) => updateCampo(event, 'otrasPersonasConvivientes')"
                        :disabled="showVer ?? false"
                        :checked="persona.otrasPersonasConvivientes === 'Si'">
                        <label class="form-check-label fw-bold text-primary"  :for="id+'-inlineRadio3'">Si</label>
                    </div> 
                    <div class="form-check form-check-inline">
                        <input 
                        class="form-check-input" type="radio" 
                        :name="id+'-inlineRadioOptions1'" 
                        :id="id+'-inlineRadio4'"
                        :disabled="showVer ?? false"
                        :checked="persona.otrasPersonasConvivientes === 'No'"
                        value="No" @input="(event) => updateCampo(event, 'otrasPersonasConvivientes')"> 
                        <label class="form-check-label fw-bold text-primary"  :for="id+'-inlineRadio4'">No</label>
                    </div>
                </div>
            </div>
            <Transition name="fade">
                <div class="border border-primary mb-2 clearfix" v-show="persona.otrasPersonasConvivientes === 'Si'">
                    <table class="table-responsive table table-bordered table-striped m-0 table-sm">
                        <thead>
                            <tr>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">N°</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Nombres</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Sexo</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Edad</th>
                                <th class="text-center bg-label-primary text-white fw-bold" style="text-transform: none;">Relación con Víctima</th>
                                <th class="text-center bg-label-primary text-white fw-bold" v-show="!(showVer ?? false)"  style="text-transform: none;">Acción</th>
                            </tr>
                        </thead>
                        <tbody v-auto-animate>
                            <tr v-if="persona.otrasPersonas.length<1">
                                <td colspan="6" class="text-center"><i class="bx bxs-data bx-md"></i><h5 class="mt-2"> No Datos</h5></td>
                            </tr>
                            <tr v-else v-for="(item, key) in persona.otrasPersonas" :key="item">
                                <td class="text-center fw-bold">{{(key+1)}}</td>
                                <td>
                                    <input :readonly="showVer ?? false" :disabled = "loading" 
                                        v-model="item.nombres"
                                        @update="updateCampoValue('otrasPersonas', persona.otrasPersonas)"
                                        type="text" 
                                        class="form-control" :id="id+'-nombres-'+(key+1)" 
                                        placeholder="Ingrese" 
                                    />
                                </td>
                                <td>
                                    <select
                                        v-model="item.sexo"
                                        @update="updateCampoValue('otrasPersonas', persona.otrasPersonas)"
                                        class="form-select"  
                                        :id="id" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">                                            
                                        <template v-for="item in ['F', 'M']" :key="item" >
                                            <option :value="item" :selected="item===item.sexo">{{item}}</option>
                                        </template>
                                    </select>
                                </td>
                                <td>
                                    <input :readonly="showVer ?? false" :disabled = "loading" 
                                        v-model="item.edad"
                                        @update="updateCampoValue('otrasPersonas', persona.otrasPersonas)"
                                        type="number" min="0" max="120"
                                        class="form-control" :id="id+'-edad-'+(key+1)" 
                                        placeholder="0" 
                                    />
                                </td>
                                <td>
                                    <select
                                        v-model="item.relacionVictima"
                                        @update="updateCampoValue('hijos', persona.hijos)"
                                        class="form-select" 
                                        :id="id+'-relacion-victima-'+(key+1)" aria-label="Default select"
                                        :disabled="(showVer ?? false) || loading || opciones === null">
                                        <option>Seleccione</option>
                                        <template v-for="_item in opciones === null? []:opciones.relacionVictima" :key="_item">
                                            <option :value="_item" :selected="_item===item.relacionVictima">{{_item}}</option>
                                        </template>
                                    </select>
                                </td>
                                <td class="text-center" v-show="!(showVer ?? false)">
                                    <Popper class="popper-theme text-start" arrow>
                                        <button type="button" class="btn btn-sm btn-danger rounded-3 m-1" :disabled="loading" title="Eliminar"><i class="bx bx-trash"></i></button>
                                        <template #content="{ close }">
                                            <div class="dropdown-header">
                                                <h6 class="text-wrap text-nowrap "><strong>Esta acción no se podra revertir,<br> ¿Continuar?</strong></h6>
                                            </div>
                                            <button type="button" class="dropdown-item text-start-center" @click="handledEliminarItem('otrasPersonas', key);close();" :disabled="loading">
                                                <i class="bx bx-check"></i> Continuar
                                            </button>
                                            <button type="button" class="dropdown-item text-start-center" @click="close();" :disabled="loading">
                                                <i class="bx bx-x"></i> Cancelar
                                            </button>
                                        </template>
                                    </Popper>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>                
            </Transition>
            <Transition name="fade">
                <button type="button" class="btn btn-primary" 
                    @click="handledAgregarOtraPersona" v-show="!(showVer ?? false) && persona.otrasPersonasConvivientes === 'Si'">
                    <i class="bx bx-plus"></i> Agregar Persona
                </button>
            </Transition>
            <!-- <div class="container-fluid alert-primary my-2 pt-3 pb-1 rounded-3" v-if="persona.hijos.length>0">
                <h5 class="fw-bold text-primary mb-0">Información</h5>
                <ul v-auto-animate class="mt-2">
                    <li v-if="countArray(persona.hijos, 'sexo', 'F')">Total hijas: <strong>{{countArray(persona.hijos, 'sexo', 'F')}}</strong>.</li>
                    <li v-if="countArray(persona.hijos, 'sexo', 'M')">Total hijos: <strong>{{countArray(persona.hijos, 'sexo', 'M')}}</strong>.</li>
                    <li v-if="countArray(persona.hijos, 'viveConElla', 'Si')">Total hijos/as convivientes: <strong>{{countArray(persona.hijos, 'viveConElla', 'Si')}}</strong>.</li>
                    <li v-if="countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'F')">Total hijas con discapacidad: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'F')}}</strong>.</li>
                    <li v-if="countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'M')">Total hijos con discapacidad: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si', 'sexo', 'M')}}</strong>.</li>
                    <li v-if="countArray(persona.hijos, 'discapacidad', 'Si')">Total discapacitados/as: <strong>{{countArray(persona.hijos, 'discapacidad', 'Si')}}</strong>.</li>
                    <li v-if="persona.otrasPersonas.length>0">Otras personas que conviven en la misma casa: <strong>{{persona.otrasPersonas.length}}</strong>.</li>
                </ul>
            </div>
            <div class="container-fluid alert-primary my-2 pt-3 pb-1 rounded-3" v-if="persona.otrasPersonas.length>0">
                <h5 class="fw-bold text-primary mb-0">Información</h5>
                <ul v-auto-animate class="mt-2">
                    <li v-if="(persona.otrasPersonas.length+persona.hijos.length)>0">
                        Total personas en riesgo: <strong>{{persona.otrasPersonas.length+persona.hijos.length}}</strong>.
                    </li>
                    <li v-if="(handleCalcularEdad('hijos', 'menor')+handleCalcularEdad('otrasPersonas', 'menor'))>0">
                        Total menores de edad:  <strong>{{handleCalcularEdad('hijos', 'menor')+handleCalcularEdad('otrasPersonas', 'menor')}}</strong>.
                    </li>
                    <li v-if="(handleCalcularEdad('hijos', 'mayor')+handleCalcularEdad('otrasPersonas', 'mayor'))>0">
                        Total tercera de edad: <strong>{{handleCalcularEdad('hijos', 'mayor')+handleCalcularEdad('otrasPersonas', 'mayor')}}</strong>.
                    </li>
                </ul>
            </div> -->
            <Transition name="fade">
                <div class="container-fluid alert-primary my-2 pt-3 pb-1 rounded-3" v-if="persona.otrasPersonas.length>0">
                    <h5 class="fw-bold text-primary mb-0">Información</h5>
                    <ul v-auto-animate class="mt-2">
                        <li v-if="(persona.otrasPersonas.length+persona.hijos.length)>0">
                            Total personas en riesgo: <strong>{{persona.otrasPersonas.length+persona.hijos.length}}</strong>.
                        </li>
                        <li v-if="(handleCalcularEdad('hijos', 'menor')+handleCalcularEdad('otrasPersonas', 'menor'))>0">
                            Total menores de edad:  <strong>{{handleCalcularEdad('hijos', 'menor')+handleCalcularEdad('otrasPersonas', 'menor')}}</strong>.
                        </li>
                        <li v-if="(handleCalcularEdad('hijos', 'mayor')+handleCalcularEdad('otrasPersonas', 'mayor'))>0">
                            Total tercera de edad: <strong>{{handleCalcularEdad('hijos', 'mayor')+handleCalcularEdad('otrasPersonas', 'mayor')}}</strong>.
                        </li>
                    </ul>
                </div>
            </Transition>
        </div>
        <slot name="footer" />
        <br>
    </div>
</template>
<script>
import { defineComponent } from 'vue'
import FormSelectOpcionVue from '@/components/FormSelectOpcion.vue';
import Popper from "vue3-popper";

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
    watch:{
        'persona.hijosVivos'(nuevo){
            if(nuevo !== 'No')
                return;
            this.updateCampoValue([], 'hijos');
        },
        'persona.otrasPersonasConvivientes'(nuevo){
            if(nuevo !== 'No')
                return;
            this.updateCampoValue([], 'otrasPersonas');
        },
    },
    methods:{
        countArray(_array, _key, _value){
            const array = _array.filter(word =>word[_key] === _value);
            return array.length;
        },
        countArray(_array, _key0, _value0, _key1, _value1){
            const array = _array.filter(word =>word[_key0] === _value0 && word[_key1] === _value1);
            return array.length;
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
        handledAgregarHijo(){
            let _persona = this.persona;
            _persona.hijos.push(
                {
                    nombres:null,
                    sexo:'F',
                    edad:null,
                    gradoEscolar:null,
                    viveConElla:'No',
                    discapacidad:'No',
                }
            );
            this.$emit('update:persona', _persona);
        },
        handledAgregarOtraPersona(){
            let _persona = this.persona;
            _persona.otrasPersonas.push(
                {
                    nombres:null,
                    sexo:'F',
                    edad:null,
                    relacionVictima:null,
                }
            );
            this.$emit('update:persona', _persona);
        },
        handledEliminarItem(_array, _key){
            let _persona = this.persona;
            let _item = _persona[_array][_key];
            _persona[_array] = _persona[_array].filter(item=>item!==_item);
            this.$emit('update:persona', _persona);
        },
        handleCalcularEdad(array, _edad){
            const _persona = this.persona;
            const _edadArray = _persona[array].map(value => {                
                if(isNaN(value.edad) || value.edad===0 || value.edad===null || value.edad==='')
                    return;
                return value.edad <18 ? 'menor' :value.edad >= 60 ? 'mayor': 'media';
            });
            const _array = _edadArray.filter(item => item === _edad);
            return _array.length;
        }
    },
    components:{
        FormSelectOpcionVue,
        Popper
    }
})
</script>
<style>
.popper-theme {
    --popper-theme-background-color: #ffffff;
    --popper-theme-background-color-hover: #ffffff;
    --popper-theme-text-color: #333333;
    --popper-theme-border-width: 1px;
    --popper-theme-border-style: solid;
    --popper-theme-border-color: #eeeeee;
    --popper-theme-border-radius: 7px;
    --popper-theme-padding: 3px;
    --popper-theme-box-shadow: 0 6px 30px -6px rgba(0, 0, 0, 0.25);
}
</style>