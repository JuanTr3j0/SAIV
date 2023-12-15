<!-- CardComponent.vue -->
<template>
    <div class="col-md-3">
      <div class="card">
        <!-- Agrega la imagen aquí -->
        <div class="card-body m-2">
          <h5 class="card-title">{{ title }}</h5>
          <img :src="imageSrc" class="card-img-top" alt="Card Image">
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      title: {
        type: String,
        required: true
      },
      imageSrc: {
        type: String,
        required: true
      }
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
height: 50%; /* Altura automática para mantener la proporción original */
border-radius: 15px; /* Ajusta el radio del borde para dar una forma atractiva */
}

.card-img-top{
    max-width: 12rem; 
    max-height: 12rem;
    object-fit: contain;
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