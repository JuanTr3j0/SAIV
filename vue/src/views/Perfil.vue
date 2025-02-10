<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Usuario /</span> Perfil
        </h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Detalles del perfil</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="/assets/img/logo-csj.png"
                                alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4 disabled" tabindex="0">
                                    <span class="d-none d-sm-block">Subir nueva foto</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg" disabled />
                                </label>
                                <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" disabled>
                                    <i class="bx bx-reset d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block"> Cancelar</span>
                                </button>
                                <div class="spinner-border text-primary mx-4" role="status" v-if="loading">
                                    <span class="visually-hidden">Cargando...</span>
                                </div>
                                <p class="text-muted mb-0">Permitido JPG o PNG. Tamaño máximo de 800K</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <form autocomplete="off">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="fw-semibold d-block" for="caso-fecha-hecho">Usuario</label>
                                    <input class="form-control" type="text" v-model="store.state.USUARIO.usuario"
                                        autofocus />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">Correo</label>
                                    <input class="form-control" type="text" v-model="store.state.USUARIO.correo" readonly />
                                </div>
                                <FormSelectOpcionVue :id="'usuario-tipo-usuario'" :obligatorio="true"
                                    :nombre="'Tipo Usuario'" :clases="['col-md-6', 'mb-2']"
                                    :opciones="['Usuaria/o', 'Administrador']" :loading="loading"
                                    v-model:opcion="formulario.tipo_usuario" />
                            </div>
                            <div class="row">
                                <FormInputVue :id="'usuario-contrasena'" :obligatorio="true" :loading="loading"
                                    :clases="'col-md-6  mb-2'" :showVer="false" :type="'password'" :disabled="loading"
                                    :titulo="'Contraseña'" v-model:value="formulario.contraseña" />
                                <FormInputVue :id="'usuario-repetir-contrasena'" :obligatorio="true"
                                    :clases="'col-md-6  mb-2'" :loading="loading" :type="'password'" :disabled="loading"
                                    :titulo="'Repetir Contraseña'" v-model:value="formulario.repetir_contraseña" />
                            </div>
                            <div class="mt-2">
                                <button type="button" class="btn btn-primary me-2">
                                    <i class="bx bx-save"></i> Guardar</button>
                                <button type="button" class="btn btn-outline-secondary">
                                    <i class="bx bx-reset"></i> Cancelar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

               
                <div class="card">
                    <h5 class="card-header">Desactivar Cuenta</h5>
                    <div class="card-body">
                        <div class="mb-3 col-12 mb-0">
                            <div class="alert alert-warning">
                                <h6 class="alert-heading fw-bold mb-1">¿Estás segura/o de que quieres desactivar tu cuenta?
                                </h6>
                                <p class="mb-0">Una vez que desactivar tu cuenta, no hay vuelta atrás. Por favor, esté
                                    seguro.</p>
                            </div>
                        </div>
                        <form id="formAccountDeactivation" onsubmit="return false">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="accountActivation"
                                    id="accountActivation" />
                                <label class="form-check-label" for="accountActivation">Confirmo la desactivación de mi
                                    cuenta</label>
                            </div>
                            <button disabled type="submit" class="btn btn-danger deactivate-account"> <i
                                    class="bx bx-x-circle bx-sm"></i> Desactivar cuenta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
// Servicios
import store from '@/store/index'
import router from '@/router'

// Components
import FormSelectOpcionVue from '@/components/FormSelectOpcion.vue'
import FormInputVue from '@/components/FormInput.vue'

// Vue
import { defineComponent, ref } from 'vue'

export default defineComponent({
    components: {
        FormSelectOpcionVue,
        FormInputVue
    },
    mounted() {
        if (localStorage.getItem('access_token') === null) {
            store.commit('headerSesion');
            router.push({ name: "acceso" });
        } else
            store.commit('headerSesionOk');
        this.loading = false;
    },
    setup() {
        const loading = ref(true);
        const formulario = ref(
            {
                usuario: null,
                correo: null,
                foto: null,
                contraseña: null,
                repetir_contraseña: null,
                oficina: null,
            }
        );
        return {
            store,
            loading,
            formulario,
        }
    }
})
</script>
