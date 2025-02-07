<template>
    <div :class="clases ?? []">
      <span class="input-group-text fw-bold text-primary" v-if="(clases ?? []).includes('input-group')">
        <code v-if="obligatorio ?? false">*</code>{{ titulo }}
      </span>
      <label class="fw-semibold d-block" :for="id" v-else>
        <code v-if="obligatorio ?? false">*</code>{{ titulo }}
      </label>
      <template v-if="(showVer ?? false) !== true">
        <div :class="((type ?? 'text') == 'password')? icon_input_password?'input-group':'' :''">
          <input 
          autocomplete="off"
          :id="id ?? ''" 
          :readonly="showVer ?? false" 
          :disabled="(loading ?? false) || (disabled ?? false)" 
          :type="((type ?? 'text') == 'password')? icon_input_password?'password':'text' :type"
          :value="value" 
          @input="updateValue"
          class="form-control" 
          placeholder="Ingrese" 
          v-if="(showVer ?? false) !== true"
          :min="min ?? 0"
          :max="max ?? 200"
          v-bind="getMask(titulo) ? { 'v-mask': getMask(titulo) } : {}"
          />
          <button v-if="type === 'password'" type="button" class="btn btn-outline-secondary" id="togglePassword" @click = changeClickIconInputPassword()>
              <i :class='"bx "+ (icon_input_password?"bxs-hide":"bxs-show")'></i>
          </button>
        </div>
        
      </template>       
      <label v-else class="form-control fw-bold text-primary">
        {{ getValueFormat(value) }}
      </label>
    </div>
  </template>
  
  <script>
  import { defineComponent, ref } from 'vue';
  import { mask } from 'vue-the-mask';
  
  export default defineComponent({
    props: [
      'id',
      'type',
      'value',
      'loading',
      'disabled',
      'showVer',
      'clases',
      'titulo',
      'obligatorio',
      'min',
      'max',
      'mask'
    ],
    methods: {
      getValueFormat(_value) {
        if (_value === null)
          return 'No Ingresado';
        
        if (typeof _value === 'undefined')
          return 'Valor Indefinido';
        
        if (typeof _value === 'string' && _value.trim() === '')
          return 'No Ingresado';
        
        if (this.type === 'datetime-local')
          return new Date(_value).toLocaleString(undefined, {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
          });
  
        if (this.type === 'date')
          return new Date(_value).toLocaleDateString(undefined, {
            day: '2-digit',
            month: '2-digit',
            year: 'numeric',
          });
        
        if (this.type === 'time')
          return new Date('1994-11-22T' + _value).toLocaleTimeString(undefined, {
            hour: '2-digit',
            minute: '2-digit',
          });
  
        return _value;
      },
      getMask(title) {
        switch (title) {
          case 'Dui':
            return '########-#';
          case 'Tel. Casa':
            return '####-####';
            case 'Tel. Móvil':
            return '####-####';
          default:
            return '';
        }
      }
    },
    setup(props, { emit }) {
      
      const icon_input_password = ref(true) 

      const changeClickIconInputPassword = () => icon_input_password.value = !icon_input_password.value; 

      const updateValue = (event) => {
        emit('update:value', event.target.value);
      };

      return {
        //VARIABLES
        icon_input_password,
        //FUNCIONES
        updateValue,
        changeClickIconInputPassword
      };
    },
    directives: {
      mask
    }
  });
  </script>
  