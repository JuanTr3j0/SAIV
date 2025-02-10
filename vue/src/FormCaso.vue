<template>
<div>
    <Tabs :tabs="tabs">
        <template v-slot:hecho-violento>
            <small class="text-light fw-semibold">Codigo</small>
            <codigoCasoVue
                :denuncias="opciones === null ?[]:opciones.denuncia"
                v-model:correlativo="formulario.correlativo"
                v-model:anio="formulario.anio"
                v-model:mes="formulario.mes"
                v-model:denuncia="formulario.denuncia"
            ></codigoCasoVue> 
            <small class="text-light fw-semibold">Formulario</small>
            <form>
                <div class="row p-2 pb-4 border border-2 border-primary rounded-3">
                    
                    <div class="col-md">
                        <h3 class="my-2">Información del Hecho de Violencia</h3>
                    </div>
                    <div class="col-md-12 row my-2">
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-fecha-hecho"><code>*</code> Fecha del Hecho</label>
                            <div class="col-md-12">
                                <input v-model="formulario.fechaHecho" type="date" class="form-control" id="caso-fecha-hecho" placeholder="Ingrese" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-hora-hecho"> Hora del Hecho</label>
                            <div class="col-md-12">
                                <input type="time" v-model="formulario.horaHecho" class="form-control" id="caso-hora-hecho" placeholder="Desconocida" />
                            </div>
                        </div> 
                        <div class="col-md-6">                       
                            <label for="formFileMultipleCaso" class="fw-semibold d-block">Subir Archivos</label>
                            <input class="form-control" type="file" v-on:change="handleSubidaArchivos" ref="archivosCasos" id="formFileMultipleCaso" multiple />                      
                        </div>
                    </div>
                    <FormDeptoMuniVue 
                        :persona="'caso'"
                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                        v-model:departamento="formulario.departamentoOcurrencia" 
                        v-model:municipio="formulario.municipioOcurrencia" 
                    ></FormDeptoMuniVue>
                    <div class="col-md row my-0 gy-3">
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-tipos-violencia-hecho"> Tipos de Violencia</label>
                            <div class="col-md-">
                                <select  v-model="formulario.tiposViolencia"  
                                    class="form-select" id="caso-tipo-violencia-hecho" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.tiposViolencia" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-modalidad-violencia-hecho"> Modalidad de Violencia</label>
                            <div class="col-md-">
                                <select v-model="formulario.modalidadViolencia"  
                                    class="form-select" id="caso-modalidad-violencia-hecho" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.modalidadViolencia" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>                    
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-codigo-penal-hecho"> Delitos Codigo Penal</label>
                            <div class="col-md-">
                                <select v-model="formulario.delitoCodigoPenal"  
                                    class="form-select" id="caso-codigo-penal-hecho" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.delitoCodigoPenal" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-institucion-remite-hecho"> Institución que Remite</label>
                            <div class="col-md-">
                                <select v-model="formulario.institucionRemitente"  
                                    class="form-select" id="caso-institucion-remite-hecho" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.institucionRemitente" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-institucion-remite-otra-hecho"><code>*</code> Expecifique Institución que Remite</label>
                            <div class="col-md">
                                <input v-model="formulario.victima.institucionRemitenteOtra" :disabled="formulario.institucionRemitente!=='Otra.'"
                                type="text" class="form-control" id="caso-institucion-remite-otra-hecho" placeholder="Ingrese" />
                            </div>
                        </div>                  
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-segundo-nombre"> Tipo Asistencia</label>
                            <div class="col-md-12">
                                <v-select multiple placeholder="Seleccione" :style="vue_style_select" class="style-chooser" 
                                    v-model="formulario.tipoAsistencia" :options="opciones===null?[]:opciones.tipoAsistencia"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-institucion-remitira-hecho"> Juzgado / Institución Donde se Remitira</label>
                            <div class="col-md-12">
                                <v-select multiple placeholder="Seleccione" :style="vue_style_select" :id="'caso-institucion-remitira-hecho'"
                                    v-model="formulario.institucionSeRemite" :options="opciones===null?[]:opciones.institucionSeRemitira"/>
                            </div>
                        </div>                        
                    </div>                    
                </div> 
                <div class="mt-3 float-end">
                    <button type="button" class="btn btn-secondary mx-1" data-bs-dismiss="modal"><i class="bx bx-exit"></i> Salir</button>
                    <button type="button" class="btn btn-secondary mx-1" @click="resetForm"><i class="bx bx-reset"></i> Reset</button>
                    <button type="button" class="btn btn-primary mx-1" @click="anterior('hecho-violento')"><i class="bx bx-arrow-to-left"></i> Anterior</button>
                    <button type="button" class="btn btn-primary mx-1" @click="guardar(); Toast(`Toast with counter`);" :disabled="loading">
                        <i class="bx" :class="{'bx-save':!loading, 'bx-spin bx-loader':loading}"></i> Guardar
                    </button>
                </div>
            </form>
        </template>
        <template v-slot:victima>
            <small class="text-light fw-semibold">Codigo</small>
            <codigoCasoVue
                :denuncias="opciones === null ?[]:opciones.denuncia"
                v-model:correlativo="formulario.correlativo"
                v-model:anio="formulario.anio"
                v-model:mes="formulario.mes"
                v-model:denuncia="formulario.denuncia"
            ></codigoCasoVue> 
            <small class="text-light fw-semibold">Formulario</small>
            <form>
                <div class="row  py-2 border border-2 border-primary rounded-3">
                    <div class="col-md mt-2">
                        <h3>Información de Víctima</h3>
                    </div>
                    <FormNombreApellidoVue 
                        :persona="'victima'"
                        v-model:primerNombre="formulario.victima.primerNombre" 
                        v-model:segundoNombre="formulario.victima.segundoNombre" 
                        v-model:primerApellido="formulario.victima.primerApellido" 
                        v-model:segundoApellido="formulario.victima.segundoApellido"
                    ></FormNombreApellidoVue>
                    <FormDeptoMuniVue 
                        :persona="'victima'"
                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                        v-model:departamento="formulario.victima.departamento" 
                        v-model:municipio="formulario.victima.municipio" 
                    ></FormDeptoMuniVue>
                    <div class="gy-3 p-2 mt-0 row">
                        <div class="col-md-12">
                            <label class=" fw-semibold d-block" for="caso-direccion-victima'">
                                <code>*</code> Dirección / Domicilio
                            </label>
                            <div class="col-md">
                                <input id="caso-direccion-victima" v-model="formulario.victima.direccion" type="text" class="form-control" placeholder="Ingrese"/>
                            </div>
                        </div> 
                        <div class="col-md">
                            <label class=" fw-semibold d-block" for="caso-telefono-movil-victima"><code>*</code> Tel. Movil</label>
                            <div class="col-md">
                                <div class="input-group input-group-merge">
                                    <span id="caso-telefono-movil-victima-span" class="input-group-text">   
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input 
                                        v-model="formulario.victima.telefonoMovil"
                                        type="text"
                                        id="caso-telefono-movil-victima"
                                        class="form-control phone-mask"
                                        placeholder="0000-0000"
                                        aria-label="0000-0000"
                                        aria-describedby="caso-telefono-movil-victima"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md">
                            <label class=" fw-semibold d-block" for="caso-telefono-casa-victima">Tel. Casa</label>
                            <div class="col-md">
                                <div class="input-group input-group-merge">
                                    <span id="caso-telefono-casa-victima" class="input-group-text">   
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input
                                        type="text"
                                        id="caso-telefono-casa-victima"
                                        v-model="formulario.victima.telefonoCasa"
                                        class="form-control phone-mask"
                                        placeholder="0000-0000"
                                        aria-label="0000-0000"
                                        aria-describedby="caso-telefono-casa-victima"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-empresa-victima">Empresa</label>
                            <div class="col-md-12">
                                <div class="input-group input-group-merge">
                                    <span id="caso-empresa-victima" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input
                                        v-model="formulario.victima.empresa"
                                        type="text"
                                        id="caso-empresa-victima"
                                        class="form-control"
                                        placeholder="Ingrese"
                                        aria-label="Ingrese"
                                        aria-describedby="caso-empresa-victima"
                                    />
                                </div>
                            </div>
                        </div>                        
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-ocupacion-victima"><code>*</code> Ocupacion</label>
                            <div class="col-md">
                                <select v-model="formulario.ocupacionVictima" @change="handleChangedResetOcupacionVictima" 
                                    class="form-select" id="caso-ocupacion-victima" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.ocupacionVictima" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="-municipio"><code>*</code> Otro Ocupacion</label>
                            <div class="col-md">
                                <input
                                    v-model="formulario.ocupacionVictimaOtro"
                                    type="text"
                                    @value="(formulario.ocupacionVictima === 'Otro.' ? formulario.ocupacionVictima:formulario.ocupacionVictima=null)"
                                    :disabled="formulario.ocupacionVictima !== 'Otro.'"
                                    id="basic-icon-default-company"
                                    class="form-control"
                                    placeholder="Ingrese"
                                    aria-label="Ingrese"
                                    aria-describedby="basic-icon-default-company2"
                                />
                            </div>
                        </div>                    
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="-municipio"><code>*</code> Discapacidad</label>
                            <div class="col-md">
                                <select v-model="formulario.discapacidadVictima" class="form-select" id="-municipio" aria-label="Default select example">
                                    <option :value="null" selected>Seleccione</option>
                                    <template v-for="(item, _key) in opciones === null ?[]:opciones.discapacidadVictima" :key="_key">
                                        <option :value="item">{{item}}</option>
                                    </template>
                                </select>
                            </div>
                        </div>  
                        <div class="col-md-2">
                            <label class=" fw-semibold d-block" for="caso-primer-nombre"><code>*</code> Fecha Nacimiento</label>
                            <div class="col-md-12">
                                <input v-model="formulario.victima.fechaNacimiento" type="date" class="form-control" id="caso-primer-nombre" placeholder="Ingrese" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class=" fw-semibold d-block" for="caso-segundo-nombre"> Edad</label>
                            <div class="col-md-12">
                                <input :value="getEdadString(formulario.victima.fechaNacimiento)" type="text" class="form-control" disabled id="caso-segundo-nombre" placeholder="Desconocida" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label class=" fw-semibold d-block" for="caso-segundo-nombre"><code>*</code> Dui</label>
                            <div class="col-md-12">
                                <input v-model="formulario.victima.dui" type="text" class="form-control" id="caso-segundo-nombre" placeholder="99999999-9" :disabled="getEdadInt(formulario.victima.fechaNacimiento)<18"/>
                            </div>
                        </div>    
                    </div>
                    <div class="col-md-3 border border-primary rounded mt-3 mx-md-3 mx-sm-1 bg-label-primary">
                        <div class="form-check m-1 text-primary ">
                            <input class="form-check-input border border-primary" type="checkbox" :checked="formulario.agresores.length>0"
                             id="defaultCheck-Agresores" @click="agregarQuitarAgresores" />
                            <label class="form-check-label fw-semibold d-block" for="defaultCheck-Agresores"> Añadir Agresores al Caso </label>
                        </div>
                    </div> 
                </div>
                <div class="float-end">
                    <button type="button" class="btn btn-secondary mx-1 mt-2" data-bs-dismiss="modal"><i class="bx bx-exit"></i> Salir</button>
                    <button type="button" class="btn btn-secondary mx-1 mt-2" @click="resetForm"><i class="bx bx-reset"></i> Reset</button>
                    <button type="button" class="btn btn-primary mx-1 mt-2" @click="siguiente('victima')"><i class="bx bx-arrow-to-right"></i> Siguiente</button>
                </div>  
            </form>
        </template>
        <template v-slot:responsable>
            <small class="text-light fw-semibold">Codigo</small>
            <codigoCasoVue
                :denuncias="opciones === null ?[]:opciones.denuncia"
                v-model:correlativo="formulario.correlativo"
                v-model:anio="formulario.anio"
                v-model:mes="formulario.mes"
                v-model:denuncia="formulario.denuncia"
            ></codigoCasoVue> 
            <small class="text-light fw-semibold">Formulario</small>
            <form>
                <div class="row py-2 border border-2 border-primary rounded-3">
                    <div class="col-md">
                        <h3>Información de Responsable</h3>
                    </div>
                    <!--div class="divider divider-primary text-start-center d-block">
                        <div class="divider-text"><strong>Nombre Responsable</strong></div>
                    </div-->
                    <FormNombreApellidoVue 
                        :persona="'responsable'"
                        v-model:primerNombre="formulario.responsable.primerNombre" 
                        v-model:segundoNombre="formulario.responsable.segundoNombre" 
                        v-model:primerApellido="formulario.responsable.primerApellido" 
                        v-model:segundoApellido="formulario.responsable.segundoApellido"
                    ></FormNombreApellidoVue>
                    <FormDeptoMuniVue 
                        :persona="'responsable'"
                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                        v-model:departamento="formulario.responsable.departamento" 
                        v-model:municipio="formulario.responsable.municipio" 
                    ></FormDeptoMuniVue>
                    <div class="col-md-12 row gy-2 mt-0 pt-0 mb-4">
                        <div class="col-md-12 mt-0">
                            <label class=" fw-semibold d-block" for="caso-direccion-responsable'"><code>*</code> Dirección / Domicilio</label>
                            <div class="col-md">
                                <input id="caso-direccion-responsable" class="form-control" placeholder="Ingrese"/>
                            </div>
                        </div>                                
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-telefono-movil-responsable"><code>*</code> Tel. Movil</label>
                            <div class="col-md">
                                <div class="input-group input-group-merge">
                                    <span id="caso-telefono-movil-responsable" class="input-group-text">   
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input 
                                        v-model="formulario.responsable.telefonoMovil"
                                        type="text"
                                        id="caso-telefono-movil-responsable"
                                        class="form-control phone-mask"
                                        placeholder="0000-0000"
                                        aria-label="0000-0000"
                                        aria-describedby="caso-telefono-movil-responsable"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class=" fw-semibold d-block" for="caso-telefono-casa-responsable">Tel. Casa</label>
                            <div class="col-md">
                                <div class="input-group input-group-merge">
                                    <span id="caso-telefono-casa-responsable" class="input-group-text">   
                                        <i class="bx bx-phone"></i>
                                    </span>
                                    <input
                                        type="text"
                                        id="caso-telefono-casa-responsable" v-model="formulario.responsable.telefonoCasa"
                                        class="form-control phone-mask" placeholder="0000-0000"
                                        aria-label="0000-0000" aria-describedby="caso-telefono-casa-responsable"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class=" fw-semibold d-block" for="caso-empresa-responsable">Empresa</label>
                            <div class="col-md-12">
                                <div class="input-group input-group-merge">
                                    <span id="caso-empresa-responsable" class="input-group-text"><i class="bx bx-buildings"></i></span>
                                    <input
                                        v-model="formulario.responsable.empresa"
                                        type="text" id="caso-empresa-responsable"
                                        class="form-control" placeholder="Ingrese"
                                        aria-label="Ingrese" aria-describedby="caso-empresa-responsable"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class=" fw-semibold d-block" for="caso-primer-nombre"><code>*</code> Fecha Nacimiento</label>
                            <div class="col-md-12">
                                <input v-model="formulario.responsable.fechaNacimiento" type="date" class="form-control" id="caso-primer-nombre" placeholder="Ingrese" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class=" fw-semibold d-block" for="caso-responsable-edad"> Edad</label>
                            <div class="col-md-12">
                                <input :value="getEdadString(formulario.responsable.fechaNacimiento)" type="text" class="form-control" disabled id="caso-responsable-edad" placeholder="Desconocida" />
                            </div>
                        </div>                      
                        <div class="col-md-4">
                            <label class=" fw-semibold d-block" for="caso-segundo-nombre"><code>*</code> Dui</label>
                            <div class="col-md-12">
                                <input v-model="formulario.responsable.dui" type="text" class="form-control" id="caso-segundo-nombre" placeholder="99999999-9" :disabled="getEdadInt(formulario.responsable.fechaNacimiento)<18"/>
                            </div>
                        </div>                                          
                    </div>             
                </div>
                <div class="float-end">
                    <button type="button" class="mt-2 btn btn-secondary mx-1"><i class="bx bx-exit"></i> Salir</button>
                    <button type="button" class="mt-2 btn btn-secondary mx-1" @click="resetForm"><i class="bx bx-reset"></i> Reset</button>
                    <button type="button" class="mt-2 btn btn-primary mx-1" @click="anterior('responsable')"><i class="bx bx-arrow-to-left"></i> Anterior</button>
                    <button type="button" class="mt-2 btn btn-primary mx-1" @click="siguiente('responsable')"><i class="bx bx-arrow-to-right"></i> Siguiente</button>
                </div> 
            </form>
        </template>
        <template v-slot:agresores>
            <div class="py-1 px-2">  
                <small class="text-light fw-semibold">Codigo</small>
                <codigoCasoVue
                    :denuncias="opciones === null ?[]:opciones.denuncia"
                    v-model:correlativo="formulario.correlativo"
                    v-model:anio="formulario.anio"
                    v-model:mes="formulario.mes"
                    v-model:denuncia="formulario.denuncia"
                ></codigoCasoVue>   
                <div class="demo-inline-spacing mt-3 ">                
                    <div class="list-group mt-0 pt-1 list-group-horizontal-md text-md-center">
                        <a v-for = "(item, _key) in formulario.agresores" :key="_key" 
                        class="list-group-item list-group-item-action border border-primary" 
                            :class="{ 'active':item.selected }" :id="'agresor-' + (_key+1)+'-list-item'"
                            @click="selectAgresores(_key)"
                            href="#">
                            Agresor
                            <span class="badge badge-center bg-label-primary text-center">{{(_key+1)}}</span>
                        </a>                            
                        <button class="list-group-item list-group-item-action border border-primary text-primary" @click="agregarAgresor">
                            <i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div> 
                <div class="tab-content px-0 mt-0">
                    <small class="text-light fw-semibold">Formulario</small>  
                    <template v-for = "(item, _key) in formulario.agresores" :key="_key">  
                        <Transition name="fade">
                            <div class="tab-pane border border-2 border-primary rounded-3 p-2 fade" :class="{'show':item.selected, 'active':item.selected}" :id="'horizontal-agresor-'+(_key+1)" v-show="item.selected" >
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <h3 class="mx-1">Información del Agresor #{{(_key+1)}}</h3>
                                    </div>
                                    <div class="col-md">
                                        <div class="float-md-end mx-3">
                                            <button type="button" class="btn btn-small btn-icon btn-danger" @click="quitarAgresor(item)" title="Eliminar"> <i class="tf-icons bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-3 p-2">
                                    <FormNombreApellidoVue 
                                        :persona="'agresor-'+_key"
                                        v-model:primerNombre="item.primerNombre" 
                                        v-model:segundoNombre="item.segundoNombre" 
                                        v-model:primerApellido="item.primerApellido" 
                                        v-model:segundoApellido="item.segundoApellido"
                                    ></FormNombreApellidoVue>                        
                                    <div class="col-md-3 mt-0">
                                        <label class=" fw-semibold d-block" :for="'caso-primer-edad-'+_key">Edad</label>
                                        <div class="col-md-12">
                                            <input v-model="item.edadAgresor" type="number" min="0" max="120"
                                                class="form-control" :id="'caso-primer-edad-'+_key" placeholder="Ingrese" :disabled="item.edadDesconocida"/>
                                        </div>
                                    </div>
                                    <div class="col-md-9 mt-0 px-2">
                                        <label class=" fw-semibold d-block" for="caso-tipos-violencia-hecho"> Tipos de Violencia</label>
                                        <div class="col-md-">
                                            <v-select multiple v-model="formulario.tiposViolencia"  
                                                class="form-select" id="caso-tipo-violencia-hecho" aria-label="Default select example">
                                                <option :value="null" selected>Seleccione</option>
                                                <template v-for="(item, _key) in opciones === null ?[]:opciones.tiposViolencia" :key="_key">
                                                    <option :value="item">{{item}}</option>
                                                </template>
                                            </v-select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                            @change="item.edadAgresor = item.edadDesconocida ? null :item.edadAgresor" 
                                            v-model="item.edadDesconocida" type="checkbox" :checked="item.edadDesconocida" :id="'defaultCheck-Agresor'+_key"/>
                                            <label class="form-check-label fw-semibold d-block" :for="'defaultCheck-Agresor'+_key"> Edad Desconocida</label>
                                        </div>
                                    </div>                                     
                                    <FormDeptoMuniVue 
                                        :persona="'agresor-'+_key"
                                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                                        v-model:departamento="item.departamento" 
                                        v-model:municipio="item.municipio" 
                                    ></FormDeptoMuniVue> 
                                    <div class="col-md-6">
                                        <label class=" fw-semibold d-block" for="caso-direccion-victima'"><code>*</code> Dirección / Domicilio</label>
                                        <div class="col-md">
                                        <input id="caso-direccion-victima" class="form-control" placeholder="Ingrese"/>
                                        </div>
                                    </div>                                                        
                                </div> 
                            </div>       
                        </Transition>
                    </template>
                </div>
                <div class=" float-end">                    
                    <button type="button" class="mt-2 btn btn-secondary mx-1" data-bs-dismiss="modal"><i class="bx bx-exit"></i> Salir</button>
                    <button type="button" class="mt-2 btn btn-secondary mx-1" @click="resetForm"><i class="bx bx-reset"></i> Reset</button>
                    <button type="button" class="mt-2 btn btn-primary mx-1" @click="anterior('agresores')"><i class="bx bx-arrow-to-left"></i> Anterior</button>
                    <button type="button" class="mt-2 btn btn-primary mx-1" @click="siguiente('agresores')"><i class="bx bx-arrow-to-right"></i> Siguiente</button>
                </div> 
            </div>
        </template>
    </Tabs>  
</div>    
</template>
<script>
import { reactive, ref, onMounted } from 'vue'
import Tabs from '@/components/Tabs.vue'
import servicios from '@/services/crud'
import otros from '@/services/otros'
import FormDeptoMuniVue from '@/components/FormDeptoMuni.vue'
import FormNombreApellidoVue from '@/components/FormNombreApellido.vue'
import codigoCasoVue from '@/components/Casos/CodigoCaso.vue'

import toast from '@/services/toast'

export default {
    components: {
        Tabs,
        codigoCasoVue,
        FormDeptoMuniVue,
        FormNombreApellidoVue,
    },
    watch: {
        'formulario.victima.fechaNacimiento'(nuevo){
            this.visibleTab('responsable', this.getEdadInt(nuevo)<18 && this.getEdadInt(nuevo)>=1);
        }
    },
    setup() {
        const form = {
            key:null,
            denuncia:null,
            mes:null,
            correlativo:null,
            anio:null,
            victima:{
                key:null,
                dui:null,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                departamento:null,
                municipio:null,
                direccion:null,
                telefonoMovil:null,    
                telefonoCasa:null,     
                fechaNacimiento:null,
                empresa:null
            },
            ocupacionVictima:null,
            ocupacionVictimaOtro:null,
            responsable:{
                key:null,
                dui:null,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                departamento:null,
                municipio:null,
                direccion:null,
                telefonoMovil:null,
                telefonoCasa:null,
                fechaNacimiento:null,
                empresa:null
            }, 
            fechaHecho:null,
            horaHecho:null,
            discapacidadVictima:null,
            agresores:[],
            tiposViolencia:null,
            modalidadViolencia:null,
            delitoCodigoPenal:null,
            departamentoOcurrencia:null, //Nuevo
            municipioOcurrencia:null,
            institucionRemitente:null,
            institucionRemitenteOtra:null,
            institucionSeRemite:[
                /**String */
            ],
            tipoAsistencia:[
                /**String */
            ],
            tiposViolencia:[
                /**String */
            ],
            archivosCasos:[]
        };

        const formulario = reactive(JSON.parse(JSON.stringify(form)));
        const opciones = ref(null);
        const loading = ref(true);

        function resetForm() {
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
            resetTabs();
        };

        function editForm(_form) {
            Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
            resetTabs();
        };

        const getEdad = (setFechaNacimiento) => {
            if(setFechaNacimiento!==null){
                let fechaArray = setFechaNacimiento.split('-');
                let hoy = new Date()
                let fechaNacimiento_aux = new Date(fechaArray[0], fechaArray[1]-1, fechaArray[2])
                let edad_aux = hoy.getFullYear() - fechaNacimiento_aux.getFullYear()
                let diferenciaMeses = hoy.getMonth() - fechaNacimiento_aux.getMonth()
                if (
                    diferenciaMeses < 0 ||
                    (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento_aux.getDate())
                ) {
                    edad_aux--
                }

                return edad_aux;
            }return null;
        }

        onMounted(() => {
            loading.value=true;
            cargarOpciones ();
            let date = new Date();
            formulario.mes = date.getMonth() + 1;
            formulario.anio = date.getFullYear();
            loading.value=false;
        });

        const cargarOpciones = async () => {
            let response = await servicios.obtener('saiv/opciones/index');
            opciones.value = response;
            opciones.value??=null;
        }  
        
        const agregarAgresor = () =>{
            let agresor = {
                key:null,
                edad:null,
                edadDesconocida:false,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                nombreDesconocido:false,
                municipio:null,
                departamento:null,
                direccion:null,
                ocupacion:null,
                ocupacionOtro:null,
                relacionVictimaAgresor:null,
                selected:false,
                nombreDesconocido:false,
            };

            formulario.agresores.push(agresor);
            if(formulario.agresores.length === 1)
                selectAgresores(0);
        }

        const selectAgresores = (_index) => {
            if(formulario.agresores.length > 0){
                let lista = formulario.agresores;
                lista = lista.map((item, index) => { item.selected = index===_index; return item})
                Object.assign(formulario.agresores, lista);
            }
        }

        const agregarQuitarAgresores = () => {
            const longitud_bool = formulario.agresores.length > 0;
            if(longitud_bool) {
                formulario.agresores = [];
                selectedTab('victima');
            }else {agregarAgresor(); /*selectedTab('agresores');*/}

            visibleTab('agresores', formulario.agresores.length > 0)
        }

        const quitarAgresor = (_item) => {
            const _formulario = formulario.agresores.filter(item => item !== _item);
            formulario.agresores = _formulario;
            
            selectAgresores(0);

            const longitud_bool = formulario.agresores.length === 0;
            if(longitud_bool){
                selectedTab('victima');
                visibleTab('agresores', !longitud_bool);
            }
        }

        const getEdadString = (fechaNacimiento) => {
            let edad = getEdad(fechaNacimiento);
            return edad > 0  && edad < 120? edad +' Años ' : null
        }

        const getEdadInt = (fechaNacimiento) => {
            let edad = getEdad(fechaNacimiento);
            return edad > 0 && edad < 120? edad : 0
        }

        const handleChangedResetOcupacionVictima = () =>{
            let ocupacion = formulario.ocupacionVictima;
            formulario.ocupacionVictimaOtro = ocupacion !=='Otro' ? null:ocupacion;
        }

        const tabs = ref([{
                nombre:'Info. Víctima', 
                icon:' bx bx-user', 
                tag:'victima', 
                selected:true, 
                visible:true
            },{
                nombre:'Info. Responsable', 
                icon:' bx bx-user', 
                tag:'responsable', 
                selected:false, 
                visible:false
            },{
                nombre:'Info. Agresor', 
                icon:' bx bx-user', 
                tag:'agresores', 
                selected:false, 
                visible:false
            },{
                nombre:'Info. Hecho', 
                icon:' bx bx-user', 
                tag:'hecho-violento', 
                selected:false, 
                visible:true
            }]
        );
        const resetTabs = () => {
            selectedTab('victima');
            visibleTab('agresores', false);
            visibleTab('responsables', false);
        };
        const visibleTab = (tag, _visible) => {
            tabs.value = tabs.value.map((item) => { if(item.tag===tag) item.visible=_visible; return item; });           
        };
        const selectedTab = (tag) => {
            tabs.value = tabs.value.map((item) => { item.selected = item.tag===tag; return item; });
        };
        const tabIsSelected = (_tag) => {
            const tab = tabs.value.find((item) => item.tag===_tag);
            return tab.selected;
        };
        const siguiente = (_tag) => {
            selectedTab(_tag);
            const edadVictima_bool = variablesSiguienteAnterior().edadVictima_bool;
            const longitudAgresores_bool = variablesSiguienteAnterior().longitudAgresores > 0;
          
            if(tabIsSelected('victima')){
                if(edadVictima_bool){
                    selectedTab('responsable');
                }else{ if(longitudAgresores_bool){
                        selectedTab('agresores');
                    } else 
                        selectedTab('hecho-violento');
                }
            }else if(tabIsSelected('responsable')){
                if(longitudAgresores_bool)
                    selectedTab('agresores');
                else selectedTab('hecho-violento');  
            }else if(tabIsSelected('agresores')){
                selectedTab('hecho-violento'); 
            }           
        }
        const variablesSiguienteAnterior = () => {
            const edadVictima = getEdadInt(formulario.victima.fechaNacimiento);
            const edadVictima_bool = 
                edadVictima<18 && 
                edadVictima>0;
            const longitudAgresores = formulario.agresores.length;
            return {edadVictima_bool: edadVictima_bool, longitudAgresores: longitudAgresores,}
        }
        const anterior = (_tag) => {
            const edadVictima_bool = variablesSiguienteAnterior().edadVictima_bool;
            const longitudAgresores = variablesSiguienteAnterior().longitudAgresores;

            selectedTab(_tag);

            if(tabIsSelected('responsable')){
                selectedTab('victima');        
            }else if(tabIsSelected('agresores')){
                if(edadVictima_bool)
                    selectedTab('responsable')
                else selectedTab('victima')            
            }else if(tabIsSelected('hecho-violento')){
                if(longitudAgresores>0)
                    selectedTab('agresores')
                else if(edadVictima_bool)
                    selectedTab('responsable')
                else selectedTab('victima')   
            } 
        }

        const archivosCasos = ref(null)
        const handleSubidaArchivos = async() => {
            console.log("selected file", archivosCasos.value.files); 
            console.log("selected file longitud", archivosCasos.value.files.length);           
        }

        function wait(ms) {
            return new Promise( (resolve) => {setTimeout(resolve, ms)});
        }

        const cargarDocumentos = async(key) => {
            const archivos = archivosCasos.value.files;
            const longitud = archivos.length;
            for(let i = 0; i<longitud; i++){
                const item = archivos[i];

                //toast.info('Cargando Archivo '+item.name+' ('+(i+1)+'/'+longitud+')...')
                toast.info('Cargando Archivo ('+(i+1)+'/'+longitud+')...')
                
                let formData = new FormData();
                formData.append( 'archivo', item);
                formData.append( 'key', key);
                
                const json = await otros.archivos(formData, 'saiv/archivos/cargar/caso');
                console.log(json)
                await wait(2 * 1000);
            }
        }

        const guardar = async() =>{
            try {
                loading.value = true;                
                const responseCaso = await servicios.actualizarCrear(formulario, 'saiv/casos/guardar');                
                if(responseCaso.ok){
                    if(responseCaso.json.error){
                        console.log(responseCaso.json.error);
                    }else{
                        cargarDocumentos(responseCaso.json.key);
                        formulario.key          = responseCaso.json.key;
                        formulario.correlativo  = responseCaso.json.correlativo;
                        formulario.key = responseCaso.json.key;
                        console.log('Se guardo el registro con exito!')
                    }
                }
                loading.value = false;
                
            } catch (error) {                
                console.log('¡Ups ocurrio un error!, no se pudo guardar el caso.');
                loading.value = false;
            }
        };
        return {
            // Variables
            form,
            tabs,           
            loading,
            archivosCasos,
            opciones,
            formulario,
            vue_style_select:"--vs-font-size: 0.9375rem;",
            // Metodos
            guardar,
            getEdad,
            editForm,
            anterior,
            siguiente,
            resetForm,
            visibleTab,
            getEdadInt,
            quitarAgresor,
            getEdadString,
            agregarAgresor,
            selectAgresores,
            handleSubidaArchivos,
            agregarQuitarAgresores,
            handleChangedResetOcupacionVictima,
        };
    },
};
</script>
<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 1.5s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>