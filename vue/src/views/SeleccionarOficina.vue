


<template>
     <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light text-center">Seleccionar Oficina </span>
        </h4>
        <!-- Bordered Table -->
     

        <div class="row">
            <CardOficina title="Chalatenango" imageSrc="https://saiv.solidar-suisse-sv.org/assets/img/chalatenango.png" />
            <CardOficina title="San Salvador" imageSrc="https://saiv.solidar-suisse-sv.org/assets/img/san-salvador.png" />
            <CardOficina title="Soyapango" imageSrc="https://saiv.solidar-suisse-sv.org/assets/img/soyapango.png" />
            <CardOficina title="Ciudad Delgado" imageSrc="https://saiv.solidar-suisse-sv.org/assets/img/delgado.png" />
        </div>
    </div>
</template>

<script>
import CardOficina from '@/components/layout/CardOficina.vue';

export default {
  components: {
    CardOficina
  },
  data() {
    return {
      
    };
  }
};
</script>
<style scoped>
    .card {
  transition: box-shadow 0.3s, background-color 0.3s;
  background-color: #125363; /* Fondo de color inicial */
  color: #fff; /* Color de texto blanco para contrastar con el fondo */
  border-radius: 15px; /* Ajusta el radio del borde para dar una forma atractiva */
  position: relative;
  overflow: hidden;
  box-shadow: 0 0 29px 0 rgba(0, 0, 0, 0.08);
  margin-bottom: 30px; /* Espacio entre las tarjetas */
}

.card:hover {
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  background-color: rgb(23, 107, 133); /* Fondo de color al pasar el cursor */
}

.center-img {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}

.center-img img {
  width: 100%; /* Ajusta el ancho de la imagen para cubrir completamente el contenedor */
  height: auto; /* Altura automática para mantener la proporción original */
  border-radius: 15px; /* Ajusta el radio del borde para dar una forma atractiva */
}

.card-body {
  text-align: center;
  padding: 20px; /* Ajusta el espacio alrededor del texto */
  border-radius: 15px; /* Ajusta el radio del borde para dar una forma atractiva */
}

.card-title {
  font-weight: 700;
  font-size: 24px;
  color: #fff; /* Color de texto blanco para el título */
}

</style>