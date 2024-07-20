<template>
    <v-select
        :value = "value"
        :options = "data"
        :loading = "loading"
        :filterable = "false"
        :disabled="disabled ?? false"
        @search = "onSearch"
        @input = "e => inputValue(e)"
        placeholder="Seleccione"
    >
        <template v-slot:list-footer>
            <li  class="pagination">
                <template v-for="(link, key) in links" :key="key">
                    <button @click="HandleClick(link)" type="button"
                        :class="[link.active&&!loading?'active':null, link.url&&!loading?'':'disabled']"
                        class="btn btn-primary mx-2" 
                        v-if="linkLabel(link)==='Siguiente' || linkLabel(link)==='Anterior'"                    >
                            <strong>
                                <i class="tf-icon bx" :class="{'bx-chevrons-right':linkLabel(link)==='Siguiente', ' bx-chevrons-left':linkLabel(link)==='Anterior'}"></i>
                            </strong>
                    </button>
                    <button @click="HandleClick(link)" type="button"
                        :class="['disabled']"
                        class="btn btn-outline-primary mx-2 " 
                        v-if="linkLabel(link)==='1'">
                        <strong>
                            {{registros}}
                        </strong>
                    </button>
                </template>
            </li>
        </template>
    </v-select>  
</template>
<script>
import { defineComponent, onMounted, ref } from 'vue'

import pagination       from '@/components/layout/Pagination.vue'
import servicios        from '@/services/otros'
import store            from '@/store'

export default defineComponent({
    props:['url', 'filtro', 'value', 'disabled'],
    components: {
        pagination,
    },
    setup(props, {emit}) {
        const pageSize = ref(props.pageSize ??10)
        const loading = ref(true)
        const data = ref([])
        const url = ref(store.state.URL_SERVER + props.url)
        const links = ref([])
        const busqueda = ref(null);
        const registros = ref(null);
        const filtro = ref(props.filtro ?? null);

        const fetch = async() => {
            loading.value = true;
            ///emit('handleChangedLoading', loading.value)
            const result = await servicios.datosTabla({
                filtro:filtro.value, 
                busqueda:busqueda.value, 
                porPagina: parseInt(pageSize.value),
            }, url.value);

            data.value = result.data;
            links.value = result.links;
            loading.value = result.cargando;
            registros.value = result.current_page+'/'+result.last_page;
            console.log(result.current_page+'/'+result.last_page)
            ///emit('handleChangedLoading',loading.value)
        }

        const linkLabel = (link) => {
            if(link.label.includes('ext'))
                return "Siguiente"
            else if(link.label.includes('revious'))
                return "Anterior"
            else
                return link.label;
        }

        const HandleClick = async(link) => {
            if(link.url)
            {
                url.value = link.url;
                await fetch();
            }
        }

        const inputValue = (event) => {
            let value = event.target.value === 'Seleccione' ? null : event.target.value;
            emit('input:value', value);
        }
        
        onMounted(() => {
           fetch(); 
        });

        const onSearch = async (query) => {
            busqueda.value = query;
            loading.value  = true;
            
            url.value = store.state.URL_SERVER + props.url;
            await fetch();
            
            loading.value  = false;
        }

        return {
            HandleClick,
            inputValue,
            linkLabel,
            onSearch,
            
            data,
            links,
            loading,
            registros,
        }

    },
})
</script>
<style scoped>
.pagination {
  display: flex;
  margin: 0.25rem 0.25rem 0;
}
.pagination button {
  flex-grow: 1;
}
.pagination button:hover {
  cursor: pointer;
}
</style>
