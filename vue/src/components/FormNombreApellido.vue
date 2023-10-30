<template>  
    <FormInputVue
        :titulo = "'Primer Nombre'"
        :id = "'caso-primer-nombre-'+guidGenerator()"
        :clases = "'col-md-3'"
        :showVer = "showVer"
        :loading = "loading" 
        :value = "primerNombre"
        @update:value="updatePrimerNombre"
    />
    <FormInputVue
        :titulo="'Segundo Nombre'"
        :id="'caso-segundo-nombre-'+guidGenerator()"
        :clases="'col-md-3'"
        :showVer="showVer"
        :loading = "loading" 
        :value="segundoNombre"
        @update:value="updateSegundoNombre"
    />
    <FormInputVue
        :titulo="'Primer Apellido'"
        :id="'caso-primer-apellido-'+guidGenerator()"
        :clases="'col-md-3'"
        :showVer="showVer"
        :loading = "loading" 
        :value="primerApellido"
        @update:value="updatePrimerApellido"
    />
    <FormInputVue
        :titulo="'Segundo Apellido'"
        :id="'caso-segundo-apellido-'+guidGenerator()"
        :clases="'col-md-3'"
        :showVer="showVer"
        :loading = "loading" 
        :value="segundoApellido"
        @update:value="updateSegundoApellido"
    />    
</template>
<script>
import FormInputVue from '@/components/FormInput.vue'
export default{
    components:{FormInputVue},
    props:['persona', 'primerNombre', 'segundoNombre', 'primerApellido', 'segundoApellido', 'showVer', 'loading'],
    setup(props,{emit}) {
        const updatePrimerNombre = (value) => {
            emit('update:primerNombre', value);
        };
        const updateSegundoNombre = (value) => {
            emit('update:segundoNombre', value);
        };
        const updatePrimerApellido = (value) => {
            emit('update:primerApellido', value);
        };
        const updateSegundoApellido = (value) => {
            emit('update:segundoApellido', value);
        };
        const guidGenerator = () => {
            var S4 = function() {
                return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
            };
            return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
        }

        return{
            updatePrimerNombre,
            updateSegundoNombre,
            updatePrimerApellido,
            updateSegundoApellido,
            guidGenerator
        }
    }
}
</script>