<template>
    <div class="container-xxl container-p-y">
      <div class="misc-wrapper text-center mt-5" style="">
        <h2 class="mb-2 mx-2">¡Página no encontrada!</h2>
        <p class="mb-4 mx-2">Vaya, la URL solicitada no se encontró en este servidor.</p>
        <button type="button" class="btn btn-primary" onclick="history.back()"> <i class="bx bx-arrow-back bx-sm bx-tada-hover"></i> Regresar</button>
        <div class="mt-3">
          <img
            src="../assets/img/illustrations/page-misc-error-light.png"
            alt="page-misc-error-light"
            width="500"
            class="img-fluid"
            data-app-dark-img="illustrations/page-misc-error-dark.png"
            data-app-light-img="illustrations/page-misc-error-light.png"
          />
        </div>
      </div>
    </div>
</template>