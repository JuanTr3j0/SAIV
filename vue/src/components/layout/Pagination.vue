<template>
    <div class="row">
        <div class="col-md-6">
            <nav aria-label="...">
                <span class="font-medium">Mostrando <strong>{{ current_page ?? 0 }}</strong> a <strong>{{ last_page ?? 0 }}</strong> de <strong>{{ total ?? 0 }}</strong> Registros.</span>
            </nav>
        </div>
        <div class="col-md-6">
            <nav aria-label="...">
                <ul class="pagination _pagination justify-content-end">
                    <template v-for="(link, key) in links" :key="key">
                        <li class="page-item mt-1" :class="[link.active&&!loading?'active':null, link.url&&!loading?'':'disabled']">
                            <button class="page-link" aria-disabled="true" @click="HandleClick(link)">
                                <strong v-if="linkLabel(link)==='Siguiente' || linkLabel(link)==='Anterior' ">
                                    <i class="tf-icon bx" :class="{'bx-chevrons-right':linkLabel(link)==='Siguiente', ' bx-chevrons-left':linkLabel(link)==='Anterior'}"></i>
                                </strong>
                                <strong v-else>{{linkLabel(link)}}</strong>
                            </button>
                        </li>
                    </template>
                </ul>
            </nav>
        </div>
    </div>
    
</template>
<script>
import { defineComponent } from 'vue'

export default defineComponent({
    props:[
        'links', 
        'total',
        'loading',
        'last_page',
        'current_page',
    ],
    setup(props, { emit }) {
        const linkLabel = (link) => {
            if(link.label.includes('ext'))
                return "Siguiente" 
            else if(link.label.includes('revious'))
                return "Anterior"
            else
                return link.label;
        }
        const HandleClick = (link) => {
            if(link.url)emit('PageChanged', link.url+"") 
        }

        return{
            HandleClick,
            linkLabel
        }
    }
})
</script>
<style scoped>
    ._pagination {   
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
</style>