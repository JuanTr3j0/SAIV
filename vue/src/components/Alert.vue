<template>
    <div 
        v-if="alert!==null && mensajesAlert!==null"
        class="container rounded-3 my-2 border border-2 alert-dismissible" role="alert"
        :class="['alert-'+alert??'alert-info', 'border-'+alert??'border-warning']">
        <div>
            <ul class="my-1" v-auto-animate v-if="Array.isArray( mensajesAlert)">
                <li v-for="item in mensajesAlert" :key="item">
                    <strong>{{item}}</strong>
                </li>                  
            </ul> 
            <span v-else>{{mensajesAlert}}</span>      
        </div>
        <div class="float-end" v-show="false">
            <button type="button" class="btn btn-sm" :class="['btn-outline-'+alert??'btn-outline-info']"> <i class="bx bx-sm bx-x"></i></button>
        </div>    
    </div>
</template>
<script>
import {defineComponent, ref} from "vue"
export default defineComponent({
    props:['mensajesAlert', 'alert']
})
</script>