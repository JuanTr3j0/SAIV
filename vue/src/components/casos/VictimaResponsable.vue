<template>    
    <TabsVue :tabs="tabs" @selectedTab="selectedTab">
        <template v-slot:informacion-victima>  
                  
            <InformacionPersonalVue
                :id="'victima'" 
                ref="victimaRef"
                :persona="victima" 
                :showVer="showVer" 
                :loading="loading"
                :opciones="opciones"
                :tipo="tipo"
                :vue_style_select="vue_style_select"
                @update:persona="value => updateValue('victima', value)"
            />
        </template>
        <template v-slot:otras-personas-victima>
            <InformacionHijosOtrosVue
                :id="'victima'" 
                :persona="victima" 
                :showVer="showVer" 
                :loading="loading"
                :opciones="opciones"
                :tipo="tipo"
                :vue_style_select="vue_style_select"
                @update:persona="value => updateValue('victima', value)"
            />
        </template>
        <template v-slot:informacion-responsable>            
            <InformacionPersonalVue
                :id="'responsable'" 
                ref="responsableRef"
                :persona="responsable" 
                :showVer="showVer" 
                :loading="loading"
                :opciones="opciones"
                :tipo="tipo"
                :vue_style_select="vue_style_select"
                @update:persona="value => updateValue('responsable', value)"
            />
        </template>
        <template v-slot:otras-personas-responsable>
            <InformacionHijosOtrosVue
                :id="'responsable'"                
                :persona="responsable" 
                :showVer="showVer" 
                :loading="loading"
                :opciones="opciones"
                :tipo="tipo"
                :vue_style_select="vue_style_select"
                @update:persona="value => updateValue('responsable', value)"
            />
        </template>
    </TabsVue>       
</template>
<script>
import { defineComponent, ref } from 'vue';

import InformacionPersonalVue   from './InformacionPersonal.vue';
import InformacionHijosOtrosVue from './InformacionHijosOtros.vue';

import TabsVue from '@/components/Tabs.vue';

export default defineComponent({
    props:[
        'victima',
        'responsable',
        'id',
        'showVer',
        'loading',
        'opciones',
        'tipo',
        'vue_style_select'
    ],
    components:{       
        TabsVue,
        InformacionPersonalVue,
        InformacionHijosOtrosVue,
    },    
    setup(props, {emit}){
        const victimaRef = ref(null);
        const responsableRef = ref(null);
        const tabs = ref([{
                nombre:'Información (Víctima)', 
                icon:' bx bx-user', 
                tag:'informacion-victima', 
                selected:true, 
                visible:true
            },{
                nombre:'Hijos y Otros (Víctima)', 
                icon:' bx bx-group', 
                tag:'otras-personas-victima', 
                selected:false, 
                visible:true
            },{
                nombre:'Información (Responsable)', 
                icon:' bx bx-user', 
                tag:'informacion-responsable', 
                selected:false, 
                visible:true
            },{
                nombre:'Hijos y Otros (Responsable)', 
                icon:' bx bx-group', 
                tag:'otras-personas-responsable', 
                selected:false, 
                visible:true
            }]
        );       
        const reset = () => {
            selectedTab('informacion-victima');
            victimaRef.value.reset();
            responsableRef.value.reset();
        };

        const selectedTab = (tag) => {
            tabs.value = tabs.value.map((item) => { item.selected = item.tag===tag; return item; });
        };
        const updateValue = (_key, _value) => {
            emit('update:'+_key, _value);
        };
        return {
            // Ref
            victimaRef,
            responsableRef,
            //Variables
            tabs,
            // Metodos
            reset,
            selectedTab,
            updateValue        
        }
    }
});
</script>
