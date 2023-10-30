<template>
    <div class="nav-align-top">
        <ul class="nav nav-tabs" role="tablist">
            <template v-for="(item, _key) in tabs" :key="_key">
                <Transition name="fade">
                    <li class=" nav-item border  border-end-0 border-start- 0border-bottom-0 border-primary border-2  rounded-3 fondo-animado " v-show="item.visible">
                        <button style="animation-duration: 2.5s;" type="button" class="btn" :class="item.selected?'active fw-bold bg-primary text-white':'btn-outline-primary'" role="tab"
                            @click="selectedTab(item.tag)"
                            :aria-selected="item.selected">
                            <i class="tf-icons" :class="item.icon"></i> {{item.nombre}}
                        </button>
                    </li>
                </Transition>
            </template>
        </ul>
        <div class="tab-content border border-1 border-gray mb-2">
            <template v-for="(item, _key) in tabs" :key="_key">
                <Transition name="fade">
                    <div class="tab-pane fade" :class="{'show':item.selected,'active':item.selected}" 
                        :id="'navs-justified-'+item.tag" role="tabpanel" v-show="item.selected">
                        <slot :name="item.tag" />
                    </div>
                </Transition>
            </template> 
        </div> 
    </div>
</template>
<script>
import { defineComponent } from "vue"
export default defineComponent({
    props:['tabs','guardar'],
    setup(props, { emit }) {
        const selectedTab = (tab) => {
            emit('selectedTab', tab);
        };
        return{
            selectedTab
        }
    }
})
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 1.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.nav-link.active {
    font-weight: bold;
    color: #696CFF !important;
	background: linear-gradient(180deg, #9395e2, #ffffff) !important;
	background-size: 400% 400%;
	-webkit-animation: gradient 15s ease infinite;
	        animation: gradient 15s ease infinite;
}

.nav-link {
    font-weight: bold;
    color: rgb(0, 0, 0) !important;
	background: linear-gradient(-165deg, #7577df, #ffff) !important;
	background-size: 400% 400%;
	-webkit-animation: gradient 15s ease infinite;
	        animation: gradient 15s ease infinite;
}

@-webkit-keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>