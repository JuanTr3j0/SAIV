<template>
    <div class="col-md-3">
                <div class="card">
                    <!-- Agrega la imagen aquí -->
                    <div class="card-body m-2">
                        <h5 class="card-title">Card 1</h5> 
                        <img src="https://saiv.solidar-suisse-sv.org/assets/img/chalatenango.png" class="card-img-top" alt="Card Image">
                    </div>
                   
                </div>
            </div>
</template>

<script>

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