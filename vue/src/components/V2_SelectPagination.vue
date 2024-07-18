<template>
    <v-select
        :value = "value"
        :options = "data"
        :loading = "loading"
        :disabled = "disabled ?? false"
        :filterable = "false"
        @search = "onSearch"
        @input = "e => inputValue(e)"
        placeholder="Seleccione o Digité"
    >
        <template v-slot:list-footer>
            <li class="pagination">
                <template v-for="(link, key) in links" :key="key">
                    <button @click="HandleClick(link)" type="button"
                        :class="[link.active&&!loading?'active':null, link.url&&!loading?'':'disabled']"
                        class="btn btn-primary mx-2" 
                        v-if="linkLabel(link)==='Siguiente' || linkLabel(link)==='Anterior'">
                            <strong>
                                <i class="tf-icon bx" :class="{'bx-chevrons-right' : linkLabel(link)==='Siguiente', 'bx-chevrons-left':linkLabel(link)==='Anterior'}"></i>
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
import { defineComponent, ref } from 'vue'
export default defineComponent({
    props:[
        'url', 
        'filtro', 
        'value', 
        'registros', 
        'links', 
        'data', 
        'loading',
        'disabled'
    ],
    setup(props, {emit}) { 
        const url = ref(props.url)
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
                emit('setUrlSelect', link.url);
            }
        }

        const inputValue = (event) => {
            let value = event.target.value === 'Seleccione' ? null : event.target.value;
            emit('input:value', value);
        }

        const onSearch = async (query) => {
            emit('changeVariablesBusqueda', query);
            emit('resetUrlSelect');
        }

        return {
            HandleClick,
            inputValue,
            linkLabel,
            onSearch,
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
