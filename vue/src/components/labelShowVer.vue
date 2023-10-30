<template>
    <label class="form-control fw-bold text-primary">
        {{getValueLabel(value) ?? "No Ingresado"}}
    </label>
</template>
<script>
import { defineComponent } from 'vue'
export default defineComponent({
    props:[
        'value',
    ],
    setup() {
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
            getValueLabel
        }
    },
})
</script>
