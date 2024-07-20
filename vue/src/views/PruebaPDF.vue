<template>
  <div class="container-fluid flex-grow-1 container-p-y">

    <div>
      <button class="btn" @click="generatePDF">Generar PDF</button>
      <div id="content" ref="content" style="background-color: white;">
        <div class="d-flex justify-content-between align-items-center ">
          <div>
            <img src="../../public/assets/img/logo-csj.png" alt="" width="100" srcset="">
          </div>
          <div class="text-center">
            <p style="font-size: x-large;">Sección de Atención Integral a Victimas Chalatenango</p>
            <p style="font-size: large;">Expediente de usuaria</p>
          </div>
          <div>
            <img src="../../public/assets/img/logo-csj.png" alt="" width="100" srcset="">
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import jsPDF from 'jspdf';
import html2canvas from 'html2canvas';

export default {
  name: 'PDFGenerator',
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/saiv/casos/obtener/4');
        this.info = response.data; // Ajusta esto según la estructura de la respuesta
      } catch (error) {
        console.error('Error al obtener los datos:', error);
      }
    },
    generatePDF() {
      const content = this.$refs.content;

      html2canvas(content).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const pdf = new jsPDF();
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
        pdf.save('documento.pdf');
      });
    },
    mounted() {
      this.fetchData();
    }
  }


}

</script>

<style scoped>
#content {
  padding: 20px;
  margin-top: 20px;
}

button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}
</style>