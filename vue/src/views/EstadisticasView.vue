<template>
  <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light text-center">SAIV{{store.state.USUARIO.oficina}}  /</span> Estadísticas
    </h4>
    <div class="card">
      <div class="card-body">
        <div class="row border border-primary p-2 m-4 border-3 rounded">                
            <div class="col-md">
                <label for="select-estadisticas" class="fw-semibold d-block">Estadísticas</label>
                <select id="select-estadisticas" class="form-select" v-model="estadistica" @change="graficasHandleChange()">
                    <option :value="item" v-for="(item, index) in estadisticas" :key="item">{{ (index+1)+'. '+item }}</option>
                </select>
            </div>
            <div class="col-md">
                <label for="select-meses" class="fw-semibold d-block">Meses</label>
                <select id="select-meses" class="form-select" v-model="mes" @change="graficasHandleChange()">
                    <option :value="index" v-for="(item, index) in meses" :key="item">{{ item }}</option>
                </select>
            </div>
            <div class="col-md">
                <label for="select-periodos" class="fw-semibold d-block">Periodos</label>
                <select id="select-periodos" class="form-select" v-model="periodo" @change="graficasHandleChange()">
                    <option :value="item" v-for="item in periodos" :key="item">{{ item }}</option>
                </select>
            </div>                
          </div>
          <div class="row border border-primary  m-4 border-3 rounded">
            <div class="col-md-8 py-3 col-sm-12 text-center" v-auto-animate="{ duration: 250 }">
                <h3 class="text-primary fw-bold"> Gráfica</h3>
                <Bar :data="data" :options="options" v-if="options && data" :style="'min-height: 50; max-height: 500;'"/>
                <div v-else>
                    <i class="bx bxs-bar-chart-alt-2 bx-border" :class="loading?'bx-flashing':null" style="font-size:55px"></i>
                    <h5 class="mt-2">{{loading?'Cargando...':'No Grafica'}}</h5>
                </div>
            </div>
            <div class="col-md py-3">
                <h3 class="text-primary fw-bold text-center">Tabla</h3>
                <div class="table-responsive border border-primary rounded-3" style="max-height: 500px;">
                  <table class="table table-bordered table-striped m-0 table-sm " v-auto-animate="{ duration: 250 }">
                    <thead>
                      <tr>
                        <td v-for="(col, key) in tabla.columnas" :key="key" class="text-center text-nowrap fw-bold text-primary bg-label-primary">
                          {{ col }}
                        </td>
                      </tr>
                    </thead>
                    <tbody v-auto-animate="{ duration: 250 }">
                      <tr v-if="tabla.filas.length === 0">
                        <td class="text-center" :colspan="tabla.columnas.length">
                            <div>
                                <i class="bx bxs-data bx-border" :class="loading?'bx-flashing':null" style="font-size:55px"></i>
                                <h5 class="mt-2">{{loading?'Cargando...':'No Datos'}}</h5>
                            </div>
                        </td>
                      </tr>
                      <tr v-else v-for="(item, index) in tabla.filas" :key="index" v-auto-animate="{ duration: 250 }">
                        <td v-for="(item, indextd) in item.fila" :key="item" class=" fw-bold" :class="{'text-center text-wrap':indextd>0}">{{ item }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
      </div>
    </div>   
  </div>
</template>
 
<script>
import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
import servicios  from '@/services/crud'
import store      from '@/store'

 ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
 
 export default {
   name: 'BarChart',
   components: { Bar},
   data() {
     return {
      //Variables
      loading:true,
      servicios,
      store,

      // Variables Grafica
      showGrafica:false,
      data: null,
      options: null,
      // Arreglos y variables de opciones
      estadistica:"Tipos de Caso",
      periodo:"Todos",
      mes:0,
      estadisticas:[
        // ESTADISTICAS DE CASOS
        "Tipos de Caso",
        "Tipos de Caso por Mes",
        "Víctimas por Sexo",
        "Casos por Género",
        "Víctimas Sexo Femenino por Edad",
        "Casos por Municipio de Residencia Víctima",
        "Casos por Departamento de Ocurrencia",
        "Casos por Zona de Residencia de la Víctima",
        "Casos por Tipo de Violencia",
        "Casos por Modalidad de la Violencia",
        "Casos por Sabe Leer y Escribir",
        "Casos por Nacionalidad",
        "Casos por Nivel Escolaridad Víctima",
        "Casos por Ocupación",
        "Casos por Fuente de Ingresos",
        "Casos por Discapacidad Víctima",
        'Casos por Sabe Leer y Escribir',
        'Casos y Tiene Hijos Vivos',
        'Casos e Institución que Remite',
        'Casos y Tipo de Asistencia',
        'Casos y Circunstancia del Hecho',
        'Casos y Delitos del Código Penal',
        'Casos y Delitos LEIV',
        // ESTADISTICAS DE AGRESORES CASOS
        'Casos por Conocimiento o No del Agresor',
        'Casos por Relación Víctima con Agresor',
        'Número de Agresores por Caso',
        'Casos por Edad del Agresor',
        'Agresores por Municipio de Residencia',
        'Número de Agresores por Caso (NO FUNCIONA)',
        'Agresores por Relacion con la Víctima',
        'Ocupación Agresores',
        'Agresores con Formación Militar',
        'Agresores con Tipo de Armas',
        'Agresores Poseen Armas',
      ],
      meses:[
        "Todos",
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ],
      periodos:[
        "Todos"
      ],
      // Variables de la Tabla
      tabla:{
        columnas:[],
        filas:[],
      }
    }
   },
   async mounted() {
    this.loading = true;
    try{
      
      await this.graficasHandleChange();
      
      const _response = await this.servicios.obtener('saiv/estadisticas/periodos');
      this.periodos = _response ?? [];
      this.periodos.unshift('Todos');     

      this.loading = false;
    }catch(e){
      console.log(e);
      this.loading = false;
    }
   },
   watch:{
      periodos(nuevo){
        if(nuevo.length>2) {
          this.periodo = this.periodos[1]; this.graficasHandleChange();
        }
      }
   },
   methods: {
      async graficasHandleChange (){
        try {
          this.loading = true;
          this.options = this.data = null;

          this.tabla.columnas = this.tabla.filas = [];

          let response = await this.servicios.actualizarCrear(
          {
            "estadistica" : this.estadistica,
            "mes" : this.mes,
            "periodo": this.periodo,
          },'saiv/estadisticas/graficas');

        const json = response.json;

        this.options = json.options;
        this.data = json.data;
        this.tabla = json.tabla ?? {columnas:[],filas:[],};
        this.loading = false;
          
        } catch (error) {
          console.log(error)
        }
      }
   }
 }
 </script>
 <style scoped>
 table {
  width: 100%;
}

table, td {
  border-collapse: collapse;
}

thead {
  width: calc(100% - 17px); /* - 17px because of the scrollbar width */
  position: sticky;
  top: 0.001px;
  z-index: 3;
}

tbody {
  max-height: 500; /* e.g. */
}

 </style>