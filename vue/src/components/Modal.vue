<template>
    <div class="modal fade show " ref="ModalRef" id="modalCenter" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-keyboard="false">
      <div class="modal-dialog" :class="clases ?? 'modal-xl'">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="$emit('handleActualizarDatosTabla');"/>
          </div>
          <div class="container-fluid mb-2">
            <slot name="cardBody"></slot>
          </div>
        </div>
      </div>
    </div>
</template>
<script>
 
import { defineComponent} from 'vue'
import { Modal } from 'bootstrap';
export default defineComponent({
  props:['size', 'clases'],
  methods: {
    data(){
      return{
        modal:null
      }
    },
    showModal(){     
      this.modal ??= new Modal(this.$refs.ModalRef);
      this.modal.show();
    },
    hideModal(){
      if(this.modal !== null && typeof this.modal !== 'undefined')
        this.modal.hide();
    }
  },
})
</script>
