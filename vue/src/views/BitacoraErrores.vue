<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">Bitácora /</span> Errores
        </h4>
        <!-- Bordered Table -->
        <div class="card">
            <div class="card-body">   
                <TableVue ref="tablaBitacoraRef"
                    :columnas="columnas" 
                    :url="urlTabla" 
                    @handleChangedLoading="handleChangedLoading"
                    @handleChangedData="handleChangedData"
                >
                    <template v-slot:tbody>
                        <tr v-for="(caso, key) in data" :key="key">                            
                            <td class="text-nowrap fw-bold">
                                {{caso.fechaCreacion ?? 'No seleccionado'}}
                            </td> 
                            <td class="text-nowrap fw-bold">
                                {{caso.usuario ?? 'No seleccionado'}}
                            </td> 
                            <td class="text-nowrap fw-bold">
                                {{caso.archivo ?? 'No seleccionado'}}
                            </td> 
                            <td class="text-justify">
                                {{caso.error ?? 'No seleccionado'}}
                            </td>                                                
                        </tr>
                    </template>
                </TableVue>
            </div>
        </div>
    </div>
</template>
<script>
import { ref, defineComponent } from 'vue'
import TableVue from '@/components/layout/Table.vue'

const urlTabla  = 'saiv/bitacora/errores/controller/index';
const columnas = [
    {
        nombre:"Fecha Creación", 
        class:"text-center bg-primary text-white fw-bold",    
        key:"",   
        style:"", 
    },
    {
        nombre:"Usuario", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
    },
    {
        nombre:"Archivo PHP", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
    },
    {
        nombre:"Error", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
    },
];
export default defineComponent({
    components:{
        TableVue,
    },
    setup(){
        //Variables
        const loading   = ref(false);
        const data      = ref([]);

        //Ref
        const tablaBitacoraRef = ref(null);
        
        //Metodos
        const handleActualizarDatos = () => {
            loading.value = true;
            tablaBitacoraRef.value.handleActualizarDatos();
            loading.value = false;
        };
        const handleChangedData = async (_data) => {
            data.value = _data
        };

        return{
            //Constantes
            urlTabla, 
            columnas,

            //Variable
            loading,
            data,

            //Ref
            tablaBitacoraRef,

            //Metodos
            handleActualizarDatos,
            handleChangedData,
        }
    }
})
</script>