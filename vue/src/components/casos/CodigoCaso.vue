<template>
    <form>
        <div class="row pb-2 pt-2 border border-2 border-primary rounded ">
            <div class="col-md">
                <label class=" fw-semibold d-block text-primary" for="caso-tipo-hecho"> Codigo de Caso</label>
                <div class="col-md">
                    <label class="form-control border-2 border-primary fw-bold text-primary">
                        {{denuncia==='Seleccione'||denuncia===null?'???':denuncia+' '+zfill(correlativo, 3)+'-'+zfill(mes,2)+'-'+zfill(anio,4)}}
                    </label>
                </div>
            </div>
            <div class="col-md-2" v-if="!(showVer??false)">
                <label class=" fw-semibold d-block" for="caso-tipo-hecho"> Tipo de Caso</label>
                <div class="col-md-12">
                    <select :value="denuncia" @input="updateDenuncia" :disabled="(disabledTipoCaso?? false) "
                        class="form-select" id="caso-tipo-hecho" aria-label="Default select example">
                        <option value="" :selected="denuncia??'selected'">Seleccione</option>
                        <template v-for="(item, _key) in denuncias" :key="_key">
                            <option :value="item" :selected="item===denuncia?'selected':null">
                                {{item.substr(0,2)==='SD'?'Sin Denuncia':(item.substr(0,2)==='DI'?'Diligencia':'Denuncia')}}
                            </option>
                        </template>
                    </select>
                </div>
            </div>
            <div class="col-md-2" v-if="!(showVer??false)">
                <label class=" fw-semibold d-block" for="caso-correlativo">Correlativo</label>
                <div class="col-md">
                    <input :value="correlativo" @input="updateCorrelativo" 
                    type="text" class="form-control" id="caso-correlativo" placeholder="Auto Generado" />                    
                </div>                
            </div>
            <div class="col-md-2" v-if="!(showVer??false)">
                <label class=" fw-semibold d-block" for="caso-mes"><code>*</code> Mes</label>
                <div class="col-md">
                    <input :disabled="loading??false" :value="mes" @input="updateMes" maxlength="2" size="2"
                    type="number" min="1" max="12" class="form-control" id="caso-mes" placeholder="Ingrese" />
                </div>
            </div>
            <div class="col-md-2" v-if="!(showVer??false)">
                <label class=" fw-semibold d-block" for="caso-anio"><code>*</code> Año</label>
                <div class="col-md">
                    <input :disabled="loading??false" :value="anio" @input="updateAnio" maxlength="4" size="4"
                    type="number" class="form-control" id="caso-anio" placeholder="Ingrese" />
                </div>
            </div>
    
        </div>
    </form>
</template>
<script>
export default {
    props:['denuncias', 'codigo', 'denuncia', 'correlativo',  'mes',  'anio', 'showVer', 'loading', 'disabledTipoCaso'],
    data() {
        return {
            denunciaAux:null
        }
    },
    watch:{
        denuncia(nuevo){
            if(nuevo === 'Seleccione'){
                this.$emit('update:denuncia', null);
            }
        }
    },
    methods:{
        zfill:(number, width) => {
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
    },
    setup(props, {emit}) {
        const updateDenuncia = (event) => {
            emit('update:denuncia', event.target.value);
        };
        const updateCorrelativo = (event) => {
            emit('update:correlativo', event.target.value);
        };
        const updateMes = (event) => {
            emit('update:mes', event.target.value);
        };
        const updateAnio = (event) => {
            emit('update:anio', event.target.value);
        };
        return {
            updateDenuncia,
            updateCorrelativo,
            updateAnio,
            updateMes,
        }
        
    },
}
</script>