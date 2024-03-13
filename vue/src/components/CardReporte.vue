<template>

              
                    <div 
                        v-for="reporte in reportesJson" :key="reporte.name" v-auto-animate="{ duration: 250 }">
                        <div class="m-3 text-center">
                            <i class='bx bxs-report text-primary' style="font-size: 5rem;"></i>
                            <h1 class="strong text-primary">Reportes {{ reporteName }}</h1>
                        </div>
                        <div class="input-group input-group mb-2">
                            <span
                                class="input-group-text border-primary bg-primary fw-bold text-white text-center border-white"
                                for="tipo-caso">Seleccionar<i class='bx bxs-label'></i>
                            </span>
                            <select class="form-select bg-label-primary border-primary text-white" :disabled="loading"
                                id="table-opciones-id" v-model="reporte.tipo" @change="() => { }">
                                <template v-for="item in reporte.tipos" :key="item">
                                    <option class=" bg-label-primary text-white fw-bold">{{ item }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="input-group input-group mb-2" v-if="reporte.tipo === 'MENSUAL'">
                            <span
                                class="input-group-text border-primary bg-primary fw-bold text-white text-center border-white"
                                for="tipo-caso">
                                Meses<i class='bx bxs-label'></i>
                            </span>
                            <select class="form-select bg-label-primary border-primary text-white" id="table-opciones-id"
                                :disabled="loading" v-model="reporte.mes" @change="handleChangePeriodo();">
                                <template v-for="item in meses" :key="item">
                                    <option class=" bg-label-primary text-white fw-bold">{{ item }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="input-group input-group mb-2">
                            <span
                                class="input-group-text border-primary bg-primary fw-bold text-white text-center border-white"
                                for="tipo-caso">
                                Periodos<i class='bx bxs-label'></i>
                            </span>
                            <select class="form-select bg-label-primary border-primary text-white" id="table-opciones-id"
                                v-model="reporte.periodo" @change="handleChangePeriodo();" :disabled="loading">
                                <template v-for="item in (periodos ?? [])" :key="item">
                                    <option class=" bg-label-primary text-white fw-bold">{{ item }}</option>
                                </template>
                            </select>
                        </div>
                        <div class="row px-2 mb-3">
                            <button type="button" class="btn-primary mt-2 mb-1 btn btn-block"
                                @click="descargarExcel(reporte)" style="width: 100%;" :disabled="loading">
                                <i class='bx bxs-download' :class="loading ? 'bx-spin bx-loader-alt' : ' bxs-download'"></i> {{
                                    loading ? 'Espere...' : 'Descargar' }}</button>
                        </div>
                    </div>
            

</template>

<script>
import store from '@/store'
import { onMounted, ref } from 'vue';
import servicio from '@/services/crud'
import otros from '@/services/otros';

export default {
    name: "CardReporte",
    props:{
        icon:{
            require:true,
        },
        reporteName:{
            type: String,
            required: true
        }
    },
    setup(props) {
        const periodo = ref(null);
        const opciones = ref(["prueba"])
        const periodos = ref([])
        const select = ref(null);
        const loading = ref(false);
        const nombreReporte =ref('');
        const meses = ref([
            "ENERO",
            "FEBRERO",
            "MARZO",
            "ABRIL",
            "MAYO",
            "JUNIO",
            "JULIO",
            "AGOSTO",
            "SEPTIEMBRE",
            "OCTUBRE",
            "NOVIEMBRE",
            "DICIEMBRE"
        ])
        onMounted(async () => {
            loading.value = true;
            await cargarPeriodos();
            loading.value = false;
          
        });
        const reportesJson = ref([
            {
                "name": props.reporteName,
                "periodos": periodos.value,
                "tipos": [
                    "MENSUAL",
                    "PRIMER TRIMESTRE",
                    "SEGUNDO TRIMESTRE",
                    "TERCER TRIMESTRE",
                    "CUARTO TRIMESTRE",
                    "ANUAL",
                ],
                "tipo": "ANUAL",
                "mes": "ENERO",
                "periodo": null,
            }
        ])

  


        const cargarPeriodos = async () => {
     
            console.log(props.reporteName)
            try {
                const response = await servicio.obtener('saiv/casos/periodos');
                periodos.value = response ?? [];
                reportesJson.value[0].periodo = periodos.value.length > 0 ? periodos.value[0] : null
            } catch (error) {
                console.log(error);
            }
        };

        const handleChangePeriodo = async () => {

        }

        const descargarExcel = async (reporte) => {
            loading.value = true;
console.log("modulo: "+reporte.name)
console.log(meses.value.findIndex(mes => mes === reporte.mes) + 1)
            let nombreArchivo = "REPORTE_" + reporte.name.toUpperCase() + "_" + (reporte.tipo === 'MENSUAL' ? reporte.mes : reporte.tipo) + "_" + reporte.periodo;
            try {
                await otros.descargarArchivo('saiv/descargar/excel/reporte/' + reporte.name.toUpperCase() + '/' + reporte.tipo + '/' + (parseInt(meses.value.findIndex(mes => mes === reporte.mes)) + 1) + '/' + reporte.periodo, nombreArchivo + '.xls')
                loading.value = false
            } catch (error) {
                console.log(error)
            } finally {
                loading.value = false
            }
        }

        return {
            opciones,
            periodos,
            periodo,
            select,
            loading,
            meses,
            store,
            reportesJson,

            handleChangePeriodo,
            descargarExcel
        };
    },
    watch: {
        periodos(nuevo) {

            if (nuevo ?? [].length === 0) {
                this.periodo = null;
            }

            if ((nuevo ?? []).length > 0)
                this.periodo = this.periodos[0];

            this.handleChangePeriodo();

        },
    },


}
</script>