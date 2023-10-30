<template>
    <div class="card clearfix">  
        <div class="card-body">
            
            <div class="row py-1 gy-2 mt-1 border border-2 border-primary rounded-3">\
                <div class="col-md-12 mt-2">
                    <h3 class="align-text-bottom"><i class='bx bxs-certification bx-md'></i>
                        Histórico Registros Ludoteca 
                        {{ typeof codigoCasoAux === 'object' && codigoCasoAux !==null  ? codigoCasoAux.label : ''  }}
                    </h3>                            
                </div>
                <TableVue
                    ref="tablaHistoricoLudotecaRef" 
                    :columnas="columnas" 
                    :url="urlTabla" 
                    @handleChangedLoading="handleChangedLoading"
                    @handleChangedData="handleChangedData"
                >
                    <template v-slot:tbody>
                        <tr v-for="(ludoteca, key) in data" :key="key">
                            <td class="text-nowrap">
                                <span>{{ludoteca.adolecenteNino ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap">
                                <span>{{ludoteca.responsable ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap fw-bold text-center">
                                <span>{{ludoteca.tipoAtencionFechaHora?? ''}}</span>
                            </td>  
                            <td class="text-nowrap fw-bold">
                                <span>{{ludoteca.codigo ?? ''}}</span>
                            </td>  
                            <td class="text-nowrap">
                                <span>{{ludoteca.tipoAtencion?? ''}}</span>
                            </td>  
                            <td class="text-nowrap text-center">
                                <span>{{(ludoteca.proximaCita?? '')}}</span>
                            </td> 
                        </tr>
                    </template>
                </TableVue>
            </div>
            <ButtonsFormVue
                    :showVer = "showVer ?? false"
                    :loading = "loading"
                    :showSig = "false"
                    :showAnt = "false"
                    :showGuardar = "false"
                >
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button" />
                    </template>
            </ButtonsFormVue>
        </div>
    </div>
</template>
<script>
import { defineComponent, ref } from 'vue'

// Servicios
import store             from '@/store/index'

// Components
import TableVue from '@/components/layout/Table.vue'
import ButtonsFormVue from '../ButtonsForm.vue'

//Otras variables
const columnas = [
    {
        nombre:"Niña, Niño o Adolescente", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Responsable", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Fecha y Hora Atención", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-sort-down'
    },
    {
        nombre:"Caso SAIV"+store.state.USUARIO.oficina,
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {
        nombre:"Tipo Atención", 
        class:"text-center bg-label-primary text-white fw-bold",    
        key:"",   
        style:"", 
        sort:true,  sortIcon:'bx-minus'
    },
    {   
        nombre:"Próxima Cita",             
        class:"text-center bg-label-primary text-white fw-bold",          
        key:'acciones',                     
        style:"",   
        sort:true,  sortIcon:'bx-minus'
    },
]
const urlTabla  = 'saiv/ludoteca/historico/index';

export default defineComponent({
    props:['codigoCaso', 'showVer'],
    setup(props) {
        const data                       =  ref([])
        const loading                    =  ref(false)
        const codigoCasoAux              =  ref(props.codigoCaso ?? null)
        const tablaHistoricoLudotecaRef  =  ref(null)

        // Metodos
        const handleChangedLoading = _loading => {
            loading.value = _loading;
        };

        const handleChangedData = _data => {
            data.value = _data
        };

        const handleActualizarDatos = () => {
            loading.value = true;
            tablaHistoricoLudotecaRef.value.handleActualizarDatos();
            loading.value = false;
        };

        const handleActualizarFiltro = (_codigo) => {
            const key = typeof _codigo === 'object' ? _codigo.key : 'x';
            tablaHistoricoLudotecaRef.value.handleChangeFiltro(key);
        };

        const handleResetFiltro = () => tablaHistoricoLudotecaRef.value.handleChangeFiltro('x');

        return {
            //Variables
            loading,
            codigoCasoAux,

            //Constantes
            urlTabla,
            columnas,
            store,
            data,

            //Ref
            tablaHistoricoLudotecaRef,

            //Metodos
            handleResetFiltro,
            handleChangedData,
            handleChangedLoading,
            handleActualizarDatos,
            handleActualizarFiltro,
        }
    },
    components:{
        TableVue,
        ButtonsFormVue
    },
})
</script>
