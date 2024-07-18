<template>
    <!-- Modal -->
    <div class="modal fade" ref="modalArchivos" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog modal-center">
        <form class="modal-content">
            <div class="modal-header">
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item d-flex align-items-center">
                        <div class="row">
                            <div class="col-md-10">
                                <i class="bx bx-file me-2"></i>
                                <span>
                                    
                                </span>
                            </div>
                            <div class="col-md-2 float-end text-center row">
                                <button class="btn btn-sm btn-primary m-1">
                                    <i class="bx bx-download"></i>
                                </button>
                                <button class="btn btn-sm btn-danger m-1">
                                    <i class="bx bx-x"></i>
                                </button>
                            </div>
                        </div>                    
                    </li>                    
                </ul>
            </div>
        </form>
        </div>
    </div>
</template>
<script>
import { defineComponent, ref} from 'vue'
import { Modal } from 'bootstrap';
import servicios from '@/services/crud'
export default defineComponent({
    props: ['archivos', 'titulo'],
    setup(props) {
        const modalArchivos = ref(null);
        const archivosP = ref(props.archivos);
        const tituloP = ref(props.titulo);
        const archivos = ref([]);
       
        const showModal = () =>{
            new Modal(modalArchivos.value).show();
        };
        
        const cargarArchivos = (json) =>{
            archivos.value = json;
            archivos ??=[];
        }

        return {
            tituloP,
            archivosP,
            modalArchivos,
            showModal,
            cargarArchivos
        }
    }
}) 
</script>