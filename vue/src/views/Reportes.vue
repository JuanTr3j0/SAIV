<template>
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">SAIV{{ store.state.USUARIO.oficina }} /</span> Reportes
        </h4>
        <div class="card">

            <div class="card-body" style="display: 100% !important;" v-auto-animate="{ duration: 250 }">
                <div class="row">

                    <div class="col-md-4 m-1 border border-black border-primary rounded border-3"
                        v-for="item in cardReportesJson" :key="reporteName">
                        <CardReporte :reporteName="item.reporteName" :icon="item.iconsReporte"/>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
import CardReporte from '@/components/CardReporte.vue';
import store from '@/store'
import { onMounted, ref } from 'vue';
import servicio from '@/services/crud'
import otros from '@/services/otros';

export default {
    components: {
        CardReporte
    },
    data() {
        return {
            cardReportesJson: [{
                "iconsReporte":'bx-burst-hover',
                "reporteName": 'Casos'
            },
            {
                "iconsReporte":'bx-burst-hover',
                "reporteName": 'Jurídico'
            },
            {
                "iconsReporte":'bx-burst-hover',
                "reporteName": 'Ludoteca'
            },
            {
                "iconsReporte":'bx-burst-hover',
                "reporteName": 'Gesell'
            },
        ],
            //  reporteNames: [], // Ejemplo de nombres de reportes
            oficina: 'Oficina Central' // Ejemplo de oficina
        };
    },
    setup(props) {
        const periodo = ref(null);
        const opciones = ref(["prueba"])
        const periodos = ref([])
        const select = ref(null);
        const loading = ref(false);
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
        const reportesJson = ref([
            {

                "periodos": periodos.value,
                "tipos": [
                    "MENSUAL",
                    "PRIMER TRIMESTRE",
                    "SEGUNDO TRIMESTRE",
                    "TERCER TRIMESTRE",
                    "ANUAL",
                ],
                "tipo": "ANUAL",
                "mes": "ENERO",
                "periodo": null,
            }
        ])

        onMounted(async () => {
            loading.value = true;
            await cargarPeriodos();
            loading.value = false;
        });

        const cargarPeriodos = async () => {
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

            let nombreArchivo = "REPORTE_" + reporte.name.toUpperCase() + "_" + (reporte.tipo === 'MENSUAL' ? reporte.mes : reporte.tipo) + "_" + reporte.periodo;

            try {
                await otros.descargarArchivo('saiv/descargar/excel/reporte/' + reporte.name.toUpperCase() + '/' + reporte.tipo + '/' + meses.value.findIndex(reporte.mes) + 1 + '/' + reporte.periodo, nombreArchivo + '.xls')
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