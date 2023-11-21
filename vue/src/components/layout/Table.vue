<template>
    <div>
        <div class="row mb-1">
            <div class="col-12 d-inline-flex mb-2">
                <slot name="button" />
                <button class="btn btn-primary m-1 justify-items-start" @click="handleActualizarDatos">
                    <i class="bx bx-flip-horizontal" :class="loading?'bx-spin bx-loader-alt':' bx-refresh'" style="font-size:20px"/> Actualizar
                </button>   
                <slot name="buttons" />
                <div class="spinner-border text-primary ms-auto" role="status" v-if="loading">
                    <span class="visually-hidden">Cargando...</span>
                </div>
            </div>            
            <div class="col-sm-12 col-md-12 m-1 col-lg-4">
                <div class="input-group ">                  
                    <input
                    type="search" class="form-control" 
                    v-on:keyup.enter="handleActualizarDatos"
                    placeholder="Busqueda" aria-label="Busqueda" 
                    v-model="busqueda" aria-describedby="button-addon2"
                    >
                    <button class="btn btn-primary" type="button" @click="handleResetUrl();handleActualizarDatos();" :disabled="loading">
                        <i class=" bx bx-search"></i>
                    </button>
                </div>
            </div>       
            <slot name="col"/>
            <div class="col-sm-12 col-md-12 m-1 col-lg-3" v-if="(arrayFiltro ?? false) && (titleFiltro ?? false) ">
                <div class="input-group border-primary flex justify-content-end">
                    <span class="input-group-text border-primary bg-primary text-white text-center border-white" for="tipo-caso">{{titleFiltro}}<i class=' bx bxs-label' ></i></span>
                    <select class="form-select bg-primary text-white" id="tipo-caso" v-model="tipoFiltro" @change="handleChangeFiltro(tipoFiltro)" >                                     
                        <template v-for="item in arrayFiltro" :key="item" >
                            <option class=" bg-primary text-white" :value="item">{{item}}</option>
                        </template>
                    </select>
                </div>   
            </div>

            <div class="col-sm-12 col-md-12 m-1 col-lg-3" v-if="(arrayOficinas ?? false) && (titleOficinas ?? false) ">
                <div class="input-group border-primary flex justify-content-end">
                    <span class="input-group-text border-primary bg-primary text-white text-center border-white" for="tipo-oficina">{{titleOficinas}}<i class=' bx bxs-label' ></i></span>
                    <select class="form-select bg-primary text-white" id="tipo-oficina" v-model="tipoOficina" @change="handleChangeOficina(tipoOficina)" >                                     
                        <option class="bg-primary text-white">Todas</option>
                        <template v-for="item in arrayOficinas === null || typeof arrayOficinas === 'undefined' ? [] : arrayOficinas.oficinas" :key="item.key" >
                            <option class="bg-primary text-white" :value="item.key">{{item.opcion}}</option>
                        </template>
                    </select>
                </div>   
            </div>
            
        </div>
        <div class="row" v-auto-animate>
            <div class="ms-md-auto ms-lg-auto col-sm-auto col-md-auto col-lg-2 my-1" v-if = "(periodos ?? []).length>0">
                <div class="input-group input-group-sm">
                    <span class="input-group-text border-primary bg-primary fw-bold text-white text-center border-white" for="tipo-caso">
                        Periodo<i class='bx bxs-label'></i>
                    </span>
                    <select class="form-select bg-label-primary border-primary text-white" id="table-opciones-id" v-model="periodo" @change="handleChangePeriodo();">                             
                        <template v-for="item in (periodos ?? [])" :key="item" >
                            <option class=" bg-label-primary text-white fw-bold">{{item}}</option>
                        </template>
                    </select>
                </div>   
            </div>
            <div class="col-sm-auto col-md-auto col-lg-3 my-1" :class="{'ms-md-auto ms-lg-auto col-sm-auto':!(periodos??[]).length>0}">
                <div class="input-group input-group-sm">
                    <span class="input-group-text border-primary bg-primary fw-bold text-white
                        text-center border-white" for="tipo-caso">Mostrar Registros<i class=' bx bxs-label' ></i>
                    </span>
                    <select class="form-select bg-label-primary border-primary text-white" id="table-opciones-id"
                        v-model="pageSize" @change="handleResetUrl(); handleActualizarDatos(); ">                                     
                        <template v-for="item in [5, 10, 15, 20, 25, 30, 50, 100]" :key="item" >
                            <option class=" bg-label-primary text-white fw-bold font-weight-bold" :value="item" :selected="item===pageSize">{{item}}</option>
                        </template>
                    </select>
                </div>   
            </div>
        </div>
        <div class=" border border-primary rounded-3 overflow-auto tableFixHead">
            <table class="table table-responsive table-bordered table-striped m-0">
                <thead>
                    <tr>
                        <td v-for="(col, key) in columnasProp ?? []" :key="key" style="{{col.style}}" :class="col.class" class="text-nowrap">
                            {{col.nombre}} 
                            <button type="button" :disabled="loading" 
                                class="btn btn-xs btn-primary border border-primary rounded-1"
                                v-if="(col.sort ?? false)" @click="handlechangeSort(col);">
                                <i class="bx" :class="[col.sortIcon, col.sortIcon!=='bx-minus'?'bx-flashing':'']"></i> 
                            </button>
                        </td>
                    </tr>
                </thead>
                <tbody v-auto-animate="{ duration: 200 }">
                    <tr v-if="data.length === 0">
                        <td :colspan="columnasProp.length+''" class="text-center">
                            <div>
                                <i class="bx bxs-data" :class="loading?'bx-tada':null" style="font-size:55px"></i>
                                <h5 class="mt-2">{{loading?'Cargando...':'No Datos'}}</h5>
                            </div>
                        </td>
                    </tr>
                    <slot v-else name="tbody"/>
                </tbody>
            </table>        
        </div>
        <Pagination  
            :links="links"
            :loading="loading"
            :current_page = "current_page"
            :last_page = "last_page"
            :total = "total"
            @PageChanged="HandlePageChanged"
        />
    </div>
</template>

<script>
import { defineComponent, ref, onMounted } from 'vue'

import store from '@/store/index'
import Pagination from '@/components/layout/Pagination.vue'
import servicios  from '@/services/otros'
import FormSelectOpcionVue from '../FormSelectOpcion.vue'

export default defineComponent({
    props: [  
        'arrayFiltro',
        'titleFiltro',
        'titleOficinas',
        'arrayOficinas',
        'classTable',
        'columnas',
        'periodos',
        'url',
    ],
    watch:{
        periodos(nuevo){

            if(nuevo??[].length === 0){
                this.periodo = null;
            }

            if((nuevo ?? []).length > 0)
                this.periodo = this.periodos[0];

            this.handleChangePeriodo();

        },
    },
    setup(props, { emit }) {
        const pageSize          = ref(10)
        const columnasProp      = ref(props.columnas)
        const pageSizeBoolean   = ref(false)
        const loading           = ref(true)
        const data              = ref([])
        const urlOriginal       = ref(store.state.URL_SERVER + props.url)
        const url               = ref(store.state.URL_SERVER + props.url)
        const links             = ref([])
        const busqueda          = ref(null);
        const busquedaBoolean   = ref(false);
        const filtro            = ref(null);
        const oficina           = ref(null);
        const tipoFiltro        = ref('Todos');
        const tipoOficina       = ref('Todas');
        const current_page      = ref(null);
        const last_page         = ref(null);
        const total             = ref(null);
  
        const periodo = ref(null);   
        
        const handleChangePeriodo = async() =>{
            handleResetUrl();
            await fetch();
        }     

        const fetch = async() => {
            loading.value = true;
            emit('handleChangedLoading',loading.value);

            const columnsSort = columnasProp.value.map(item =>{ return {columna: item.nombre, sort: item.sort, order: getSortToOrder(item.sortIcon)}});

            const result = await servicios.datosTabla({
                periodo:periodo.value,
                filtro:filtro.value, 
                busqueda:busqueda.value, 
                porPagina: parseInt(pageSize.value),
                oficina: oficina.value,
                ordenColumnas: columnsSort
            }, url.value);

            data.value = result.data;
            links.value = result.links;
            loading.value = result.cargando;
            current_page.value = result.current_page;
            last_page.value = result.last_page;
            total.value = result.total;

            emit('handleChangedData', data.value)
            emit('handleChangedLoading',loading.value)
        }

        const HandlePageChanged = async(_url) => {
            url.value = _url;
            await fetch();
        }

        const getSortToOrder = sortIcon =>{
            if (typeof sortIcon === 'undefined'||sortIcon === null)
                return null;
            let order = null;
            if(sortIcon === 'bx-sort-down')
                order = 'Desc';
            else if(sortIcon === 'bx-sort-up')
                order = 'Asc';
            else 
                order =  null;
            return order;
        }

        const handleActualizarDatos = async() => {
            await fetch();
        }

        const handleChangeFiltro = async(_filtro) => {
            filtro.value = _filtro;
            await fetch();
        }

        
        const handleChangeOficina = async(_oficina) => {
            oficina.value = _oficina;
            await fetch();
        }
        const handleResetUrl = () => {
            url.value = urlOriginal.value;
        }

        onMounted(() => {
            fetch();
        })

        const handlechangeSort = col => {
            if(!col.sort)
                return;
            
            columnasProp.value.forEach(item => {
                if(col.nombre!==item.nombre)
                    item.sortIcon = 'bx-minus';
            });

            if(col.sortIcon === 'bx-minus')
                col.sortIcon = 'bx-sort-down';

            else if(col.sortIcon === 'bx-sort-down')
                col.sortIcon = 'bx-sort-up';

            else if(col.sortIcon === 'bx-sort-up')
                col.sortIcon = 'bx-minus';

            handleActualizarDatos();
        }

        return {
            // Variables
            url,
            data,
            links,
            periodo,
            loading,
            busqueda,
            pageSize,
            tipoOficina,
            tipoFiltro,
            columnasProp,
            busquedaBoolean,
            pageSizeBoolean,
            current_page,
            last_page,
            total,

            // Metodos
            handleResetUrl,
            handlechangeSort,
            HandlePageChanged,
            handleChangeFiltro,
            handleChangeOficina,
            handleChangePeriodo,
            handleActualizarDatos,
        }
    },
    components: {
        Pagination,
        FormSelectOpcionVue
    },
})
</script>
<style  scoped>
    /* th:first-child{
        position:sticky;
        left:0px;
    }
    td:first-child
    {
        position:sticky;
        left:0px;
    } */
    .tableFixHead{
        position: relative;
        top: 0;
        min-height: 350px; 
        max-height: 650px; 
        width: 100%;
        z-index: 0;
        background-color: rgb(249, 250, 251);
    }
    table { 
        z-index: 2;
        border-collapse: collapse; 
        width: 100%; 
    }
</style>