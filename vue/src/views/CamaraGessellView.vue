<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">
            <span class="text-muted fw-light text-center">
                SAIV{{store.state.USUARIO.oficina}} /
            </span> {{itemBoolean ? 'Cámara Gesell / Programación':'Cámara Gesell / Atención a Menores'}}
        </h4>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                <li class="nav-item mx-2">
                    <button type="button" class="nav-link border border-primary" :class="{'active':itemBoolean}" @click="itemBoolean = true">
                        <i class="bx bxs-book-bookmark me-1 bx-sm bx-flashing bx-tada-hover"></i> Programación 
                    </button>
                </li>
                <li class="nav-item mx-2">
                    <button type="button" class="nav-link border border-primary" :class="{'active':!itemBoolean}" @click="itemBoolean = false">
                        <i class="bx bx-user-pin me-1 bx-sm bx-flashing bx-tada-hover"></i> Atención a Menores
                    </button>
                </li>
                </ul>
            </div>
        </div>
        <ProgramaciónView
            v-if="itemBoolean"
        />
        <AtencionMenoresView
            v-if="!itemBoolean"
        />
    </div>
</template>
<script>
import store from "@/store";
import ProgramaciónView from "./ProgramacionView.vue";
import AtencionMenoresView from "./AtencionMenoresView.vue";
import { ref } from 'vue';
export default {
    components:{
        ProgramaciónView,
        AtencionMenoresView
    },
    setup() {
        const itemBoolean = ref(true);
        return {
            itemBoolean,
            store
        }
    },
}
</script>