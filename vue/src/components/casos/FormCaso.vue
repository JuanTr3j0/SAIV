<template>
<div>   
    <Tabs :tabs="tabs" @selectedTab="selectedTab">        
        <template v-slot:victima>
            <small class="text-light fw-semibold">Codigo</small>
            <CodigoCasoVue
                :showVer="showVer ?? false"
                :disabledTipoCaso="formulario.key !== null"
                :denuncias="opciones === null ?[]:opciones.denuncia"
                v-model:correlativo="formulario.correlativo"
                v-model:anio="formulario.anio"
                v-model:mes="formulario.mes"
                v-model:denuncia="formulario.denuncia"
                v-if="ocultarCodigo"
            ></CodigoCasoVue>
            <slot v-else name="codigo-caso"/> 
            <small class="text-light fw-semibold">Formulario</small>
            <form autocomplete="false">
                <div class="row py-1 gy-2 mt-1 border border-2 border-primary rounded-3">
                    <div class="col-md-6 mt-2">
                        <h3>Información de Víctima</h3>                            
                    </div> 
                    <div class="col-md-6">                            
                        <div class="input-group border-primary flex justify-content-end">
                            <span class="input-group-text border-primary bg-primary text-white">Fecha Registro</span>
                            <input :readonly="showVer ?? false" :disabled = "loading" 
                                v-model="formulario.fechaRegistro" 
                                type="datetime-local" class="form-control border-primary bg-primary text-white" id="fecha-registro" placeholder="Ingrese" 
                            />
                        </div>     
                    </div>                    
                    <VictimaResponsableVue
                        ref="victimaFormRef"
                        :showVer="showVer ?? false"
                        :loading="loading"
                        :tipo="'Víctima'"
                        :opciones="opciones"
                        v-model:victima = "formulario.victima"
                        v-model:responsable = "formulario.responsable"                      
                        :vue_style_select="vue_style_select"
                    />                   
                    <div class="col-md-12">
                        <div class="row col-md-3 border border-primary rounded mx-sm-1 bg-label-primary">
                            <div class="form-check m-1 text-primary">
                                <input :readonly="showVer ?? false" :disabled = "loading || (showVer ?? false)" :class="{'disabled':loading || (showVer ?? false)}" class="form-check-input border border-primary" type="checkbox" :checked="formulario.agresores.length>0"
                                id="defaultCheck-Agresores" @click="agregarQuitarAgresores" />
                                <label class="form-check-label fw-semibold d-block" for="defaultCheck-Agresores"> Añadir Agresores al Caso </label>
                            </div>
                        </div> 
                    </div>
                    <div class="col-md-12">
                        <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                    </div>
                </div>
                <ButtonsFormCasosVue
                    :showVer="showVer ?? false"
                    @handleActualizarDatosTabla="() => $emit('handleActualizarDatosTabla')"
                    :loading="loading"
                    :showAnt="false"
                    @resetForm="resetForm"
                    @siguiente="siguiente('victima')"
                    @anterior="anterior('victima')"
                    @guardar="guardar"
                    nuevo-button
                >
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button"/>
                    </template> 
                </ButtonsFormCasosVue>
            </form>
        </template>
        <template v-slot:hecho-violento>
            <small class="text-light fw-semibold">Codigo</small>
            <CodigoCasoVue
                :disabledTipoCaso="formulario.key !== null"
                :showVer="showVer ?? false"
                :key="formulario.key"
                :denuncias="opciones === null ?[]:opciones.denuncia"
                v-model:correlativo="formulario.correlativo"
                v-model:anio="formulario.anio"
                v-model:mes="formulario.mes"
                v-model:denuncia="formulario.denuncia"
                v-if="ocultarCodigo"
            ></CodigoCasoVue>
            <slot v-else name="codigo-caso"/>
            <small class="text-light fw-semibold mb-2">Formulario</small>
            <form>
                <div class="row pt-2 pb-4 border border-2 border-primary rounded-3 gy-2 mt-1">                    
                    <div class="col-md-12">
                        <h3 class="my-3">Información del Hecho de Violencia</h3>
                        <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                    </div>
                    <FormInputVue
                        :titulo="'Fecha del Hecho'"
                        :id="'caso-fecha-hecho'"
                        :type="'date'"
                        :clases="'col-md-3'"
                        :showVer="showVer"
                        :loading="loading"
                        :disabled = "loading"
                        v-model:value="formulario.fechaHecho"
                    />                     
                    <FormInputVue
                        :titulo="'Hora del Hecho'"
                        :id="'caso-hora-hecho'"
                        :type="'time'"
                        :clases="'col-md-3'"
                        :showVer="showVer"
                        :loading="loading"
                        :disabled = "loading"
                        v-model:value="formulario.horaHecho"
                    />
                    <FormSelectOpcionVue
                        :id="'caso-circustancia-hecho'" :nombre="'Circunstancia del Hecho'"
                        :opciones="opciones === null ? []:opciones.circunstanciaDelHecho"
                        :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.circunstanciaDelHecho"
                    ></FormSelectOpcionVue>                   
                    <FormDeptoMuniVue 
                        :showVer="showVer ?? false"
                        :persona="'Ocurrencia'"
                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                        v-model:departamento="formulario.departamentoOcurrencia" 
                        v-model:municipio="formulario.municipioOcurrencia" 
                    ></FormDeptoMuniVue>

                    <div class="col-md-6">
                        <label class=" fw-semibold d-block" for="caso-segundo-nombre"> Tipos de violencia(multiple)</label>
                        <div class="col-md-12">
                            <LabelShowVer :value="formulario.tipoViolencia" v-if="showVer"/>
                            <v-select multiple placeholder="Seleccione" :style="vue_style_select" class="style-chooser" 
                                :disabled="showVer ?? false" v-if="!showVer"
                                v-model="formulario.tiposViolencia" :options="opciones===null?[]:opciones.tiposViolencia"/>
                        </div>
                    </div>

                    <FormSelectOpcionVue
                        :id="'caso-tipos-violencia-hecho'" :nombre="'Tipos de Violencia'"
                        :opciones="opciones === null ? []:opciones.tiposViolencia"
                        :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.tiposViolencia"
                    ></FormSelectOpcionVue> 

                    <FormSelectOpcionVue
                        :id="'caso-modalidad-violencia-hecho'" :nombre="'Modalidad de Violencia'"
                        :opciones="opciones === null ? []:opciones.modalidadViolencia"
                        :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.modalidadViolencia"
                    ></FormSelectOpcionVue>                
                    <FormSelectOpcionVue
                        :id="'caso-codigo-penal-hecho'" :nombre="'Delitos Codigo Penal'"
                        :opciones="opciones === null ? []:opciones.delitoCodigoPenal"
                        :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.delitoCodigoPenal"
                        @change="formulario.delitoCodigoPenalOtro=formulario.delitoCodigoPenal==='Otro'?formulario.delitoCodigoPenalOtro: null"
                    ></FormSelectOpcionVue>        
                    <Transition name="fade">
                        <div class="col-md-6" v-show="formulario.delitoCodigoPenal==='Otro'">
                            <label class=" fw-semibold d-block" for="caso-codigo-penal-hecho-otro">Delitos Codigo Penal Otro (Expecifique)</label>
                            <div class="col-md"> 
                                <input :readonly="showVer ?? false" v-model="formulario.delitoCodigoPenalOtro" :disabled="loading||formulario.delitoCodigoPenal!=='Otro'"
                                type="text" class="form-control" id="caso-codigo-penal-hecho-otro" placeholder="Ingrese" />
                            </div>
                        </div>  
                    </Transition>        
                    <FormSelectOpcionVue
                        :id="'caso-institucion-que-remite'" :nombre="'Institución que Remite'"
                        :opciones="opciones === null ? []:opciones.institucionRemitente"
                        :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.institucionRemitente"
                        @change="()=>{formulario.institucionRemitenteOtra = (formulario.institucionRemitente==='Otra' ? formulario.institucionRemitenteOtra:null)}"
                    ></FormSelectOpcionVue>               
                    <Transition name="fade">
                        <div class="col-md-6" v-show="formulario.institucionRemitente==='Otra'">
                            <label class=" fw-semibold d-block" for="caso-institucion-remite-otra-hecho">Otra Institución que Remite (Expecifique)</label>
                            <div class="col-md">
                                <input :readonly="showVer ?? false" v-model="formulario.institucionRemitenteOtra" :disabled="loading||formulario.institucionRemitente!=='Otra'"
                                type="text" class="form-control" id="caso-institucion-remite-otra-hecho" placeholder="Ingrese" />
                            </div>
                        </div>  
                    </Transition>
                    <div class="col-md-6">
                        <label class=" fw-semibold d-block" for="caso-segundo-nombre"> Tipo Asistencia</label>
                        <div class="col-md-12">
                            <LabelShowVer :value="formulario.tipoAsistencia" v-if="showVer"/>
                            <v-select multiple placeholder="Seleccione" :style="vue_style_select" class="style-chooser" 
                                :disabled="showVer ?? false" v-if="!showVer"
                                v-model="formulario.tipoAsistencia" :options="opciones===null?[]:opciones.tipoAsistencia"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class=" fw-semibold d-block" for="caso-institucion-remitira-hecho"> Juzgado o Institución a dónde se Remite</label>
                        <div class="col-md-12">
                            <LabelShowVer :value="formulario.institucionSeRemite" v-if="showVer"/>
                            <v-select multiple placeholder="Seleccione" :style="vue_style_select" :id="'caso-institucion-remitira-hecho'"
                                :disabled="showVer ?? false" v-if="!showVer"
                                v-model="formulario.institucionSeRemite" :options="opciones===null?[]:opciones.institucionSeRemitira"/>
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <label class=" fw-semibold d-block" for="caso-delitos-leiv">Delitos LEIV</label>
                        <div class="col-md-12">
                            <LabelShowVer :value="formulario.delitoLeivs" v-if="showVer"/>
                            <v-select multiple placeholder="Seleccione" v-if="!showVer"
                                :id="'caso-delitos-leiv'"
                                :style="vue_style_select"
                                :disabled="showVer ?? false"
                                :options="opciones===null?[]:opciones.delitosLeivs"
                                v-model="formulario.delitoLeivs" 
                            />
                        </div>
                    </div>               
                </div> 
                <ButtonsFormCasosVue
                    :showVer="showVer ?? false"
                    @handleActualizarDatosTabla="() => $emit('handleActualizarDatosTabla')"
                    :loading="loading"
                    @resetForm="resetForm"
                    @siguiente="siguiente('hecho-violento')"
                    @anterior="anterior('hecho-violento')"
                    @guardar="guardar"
                >
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button"/>
                    </template> 
                </ButtonsFormCasosVue>                
            </form>
        </template>
        <template v-slot:agresores>
            <div class="py-1 px-2">  
                <small class="text-light fw-semibold">Codigo</small>
                <CodigoCasoVue
                    :disabledTipoCaso="formulario.key !== null"
                    :showVer="showVer ?? false"
                    :denuncias="opciones === null ?[]:opciones.denuncia"
                    v-model:correlativo="formulario.correlativo"
                    v-model:anio="formulario.anio"
                    v-model:mes="formulario.mes"
                    v-model:denuncia="formulario.denuncia"
                    v-if="ocultarCodigo"
                ></CodigoCasoVue> 
                <slot v-else name="codigo-caso"/>
                <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>              
                <div class="list-group mt-1 pt-1 list-group-horizontal-md text-md-center">
                    <template v-for = "(item, _key) in formulario.agresores" :key="_key">
                        <Transition name="fade"  >
                            <button class="list-group-item list-group-item-action border border-primary" 
                                :class="{ 'active':item.selected }" :id="'agresor-' + (_key+1)+'-list-item'"
                                @click="selectAgresores(_key)">
                                    Agresor
                                <span class="badge badge-center bg-label-primary text-center">{{(_key+1)}}</span>
                            </button>                        
                        </Transition>
                    </template>
                    <button class="list-group-item list-group-item-action border border-primary text-primary" @click="agregarAgresor" :disabled="formulario.agresores.length>6" v-if="!(showVer??false)">
                            Agregar <span class="badge badge-center bg-label-primary text-center"><i class="bx bx-plus"></i></span>
                    </button>
                </div>               
                <div class="tab-content px-0 mt-0">
                    <small class="text-light fw-semibold">Formulario</small>  
                    <template v-for = "(item, _key) in formulario.agresores" :key="_key">  
                        <Transition name="fade"  >
                            <div class="tab-pane border border-2 border-primary rounded-3 p-2 fade" :class="{'show':item.selected, 'active':item.selected}" :id="'horizontal-agresor-'+(_key+1)" v-show="item.selected" >
                                <div class="row mt-2">
                                    <div class="col-md">
                                        <h3 class="mx-1">Información del Agresor {{(_key+1)}}</h3>
                                    </div>
                                    <div class="col-md" v-if="!(showVer??false)">
                                        <div class="float-md-end mx-3">
                                            <button type="button" class="btn btn-small btn-icon btn-danger" @click="quitarAgresor(item)" title="Eliminar"> <i class="tf-icons bx bx-trash"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-3 p-1">
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check mt-1">
                                            <input :disabled = "loading || (showVer ?? false)" class="form-check-input" 
                                            @change="item.edad = (item.edadDesconocida ? null :item.edad)" 
                                            v-model="item.edadDesconocida" type="checkbox" :checked="item.edadDesconocida" :id="'defaultCheck-Edad'+_key"/>
                                            <label class="form-check-label fw-semibold d-block" :for="'defaultCheck-Edad'+_key"> Edad Desconocida</label>
                                        </div>
                                    </div> 
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check mt-1">
                                            <input :disabled = "loading || (showVer ?? false)" class="form-check-input" 
                                            @change="nombreAgresorDesconocido(item.nombreDesconocido, item)" 
                                            v-model="item.nombreDesconocido" type="checkbox" :checked="item.nombreDesconocido" :id="'defaultCheck-Agresor-Nombre'+_key"/>
                                            <label class="form-check-label fw-semibold d-block" :for="'defaultCheck-Agresor-Nombre'+_key"> Nombre Desconocido</label>
                                        </div>
                                    </div>                                    
                                    <FormNombreApellidoVue
                                        :showVer="(showVer ?? false) || item.nombreDesconocido" 
                                        :persona="'agresor-'+_key"
                                        v-model:primerNombre="item.primerNombre" 
                                        v-model:segundoNombre="item.segundoNombre" 
                                        v-model:primerApellido="item.primerApellido" 
                                        v-model:segundoApellido="item.segundoApellido"
                                    ></FormNombreApellidoVue>   
                                            
                                    <FormDeptoMuniVue 
                                        :key="'agresor'+_key"
                                        :showVer="showVer ?? false"
                                        :persona="'Residencia'"
                                        :departamentos="(opciones===null?[]:opciones.departamentos)"
                                        v-model:departamento="item.departamento" 
                                        v-model:municipio="item.municipio" 
                                    ></FormDeptoMuniVue>
                                    <FormInputVue
                                        :titulo="'Edad'"
                                        :id="'caso-edad-agresor-'+_key"
                                        :clases = "'col-md-3'"
                                        :type="'number'"
                                        :min="0" 
                                        :max="120"
                                        :showVer ="showVer"
                                        :loading = "loading" 
                                        :disabled ="loading || item.edadDesconocida"
                                        v-model:value="item.edad"
                                    /> 
                                    <FormSelectOpcionVue
                                        :id="'agresor-formacion-militar-policial-'+_key" 
                                        :nombre="'Tiene Formación Militar o Policial'"
                                        :opciones="['No se Sabe', 'Si', 'No']"
                                        :clases="['col-md-6']" 
                                        :loading="loading" :showVer="showVer ?? false"
                                        v-model:opcion="item.formacionMilitarPolicial"
                                    ></FormSelectOpcionVue> 
                                    <FormSelectOpcionVue
                                        :id="'agresor-posee-arma-'+_key" 
                                        :nombre="'Posee Armas'"
                                        :opciones="['No se Sabe', 'Si', 'No']"
                                        :clases="['col-md-6']" 
                                        :loading="loading" :showVer="showVer ?? false"
                                        v-model:opcion="item.poseeArma"
                                    ></FormSelectOpcionVue> 
                                    <FormSelectOpcionVue
                                        :id="'agresor-tipo-arma-'+_key" 
                                        :nombre="'Tipo de Arma'"
                                        :opciones="opciones===null?[]:opciones.tipoArma"
                                        :clases="['col-md-6']" 
                                        :loading="loading" :showVer="showVer ?? false"
                                        v-model:opcion="item.tipoArma"
                                        @change="()=>{item.tipoArmaOtro = (item.tipoArma!=='Otra' || item.tipoArma===null)
                                        ?null:item.tipoArmaOtro;}"
                                    ></FormSelectOpcionVue>   
                                    <Transition name="fade"> 
                                    <FormInputVue
                                        v-show="item.tipoArma==='Otra'"
                                        :titulo="'Otro Tipo de Arma (Especifique)'"
                                        :id="'agresor-tipo-arma-otra-'+_key"
                                        :clases = "'col-md-6'"
                                        :showVer ="showVer"
                                        :loading = "loading" 
                                        :disabled ="loading || item.tipoArma!=='Otra'"
                                        v-model:value="item.tipoArmaOtro"
                                    />                                 
                                    </Transition>   
                                    <FormSelectOpcionVue
                                        :id="'caso-relacion-agresor-victima-'+item.key" 
                                        :nombre="'Relación con la Víctima'"
                                        :opciones="opciones === null ? []:opciones.relacionVictimaAgresor"
                                        :clases="['col-md-6']" 
                                        :loading="loading" 
                                        :showVer="showVer"
                                        v-model:opcion="item.relacionVictimaAgresor"
                                        @change=" if(item.relacionVictimaAgresor!=='Otra' || item.relacionVictimaAgresor===null) item.otraRelacionVictima = null;"
                                    ></FormSelectOpcionVue>
                                    <Transition name="fade">
                                    <FormInputVue
                                        v-show="item.relacionVictimaAgresor==='Otra'"
                                        :titulo="'Otra Relación Victima (Especifique)'"
                                        :id="'caso-otra-relacion-'+_key"
                                        :clases = "'col-md-6'"
                                        :showVer ="showVer"
                                        :loading = "loading" 
                                        :disabled ="loading || item.relacionVictimaAgresor!=='Otra'"
                                        v-model:value="item.otraRelacionVictima"
                                    />                                       
                                    </Transition>
                                    <FormSelectOpcionVue
                                        :id="'caso-ocupacion-agresor-'+_key" 
                                        :nombre="'Ocupación Agresor'"
                                        :opciones="opciones === null ? []:opciones.ocupacionAgresor"
                                        :clases="['col-md-6']" 
                                        :loading="loading" 
                                        :showVer="showVer"
                                        v-model:opcion="item.ocupacion"
                                        @change=" if(item.ocupacion!=='Otro') item.ocupacionOtro = null;"
                                    ></FormSelectOpcionVue> 
                                    <Transition name="fade">                                        
                                    <FormInputVue
                                        v-show="item.ocupacion==='Otro'"
                                        :titulo="'Otra Ocupación Agresor (Especifique)'"
                                        :id="'caso-ocupacion-agresor-otro-'+_key"
                                        :clases = "'col-md-6'"
                                        :showVer ="showVer"
                                        :loading = "loading" 
                                        :disabled ="loading || item.ocupacion!=='Otro'"
                                        v-model:value="item.ocupacionOtro"
                                    />                                       
                                    </Transition>
                                    <FormInputVue
                                        :titulo="'Dirección / Domicilio'"
                                        :id="'caso-direccion-agresor-'+_key"
                                        :clases="'col-md-4'"
                                        :showVer="showVer"
                                        :loading = "loading" 
                                        v-model:value="item.direccion"
                                    />
                                    <FormSelectOpcionVue
                                        :id="'agresor-zona-residencial-agresor-'+_key" :nombre="'Zona Residencial'"
                                        :opciones="opciones === null ? []:opciones.zona_residencial"
                                        :clases="['col-md-2']" :loading="loading" :showVer="showVer ?? false"
                                        v-model:opcion="item.zonaResidencial"
                                    ></FormSelectOpcionVue>                                    
                                    <FormInputVue
                                        :titulo="'Lugar de Trabajo'"
                                        :id="'caso-lugar-trabajo-'+_key"
                                        :clases="'col-md-6'"
                                        :showVer="showVer"
                                        :loading = "loading"
                                        v-model:value="item.lugarTrabajo"
                                    />
                                    <FormInputVue
                                        :titulo="'Dirección de Trabajo'"
                                        :id="'caso-direccion-trabajo-'+_key"
                                        :clases="'col-md-6'"
                                        :showVer="showVer"
                                        :loading="loading" 
                                        v-model:value="item.direccionTrabajo"
                                    />
                                </div> 
                            </div>       
                        </Transition>
                    </template>
                </div>
                <ButtonsFormCasosVue
                    :showVer="showVer ?? false"
                    @handleActualizarDatosTabla="() => $emit('handleActualizarDatosTabla')"
                    :loading="loading"
                    @resetForm="resetForm"
                    @siguiente="siguiente('agresores')"
                    @anterior="anterior('agresores')"
                    @guardar="guardar">                
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button"/>
                    </template> 
                </ButtonsFormCasosVue>  
            </div>
        </template>
        <template v-slot:archivos>
            <div class="py-1 px-2">
                <small class="text-light fw-semibold">Codigo</small>
                <CodigoCasoVue
                    :disabledTipoCaso="formulario.key !== null"
                    :showVer="showVer ?? false"
                    :denuncias="opciones === null ?[]:opciones.denuncia"
                    v-model:correlativo="formulario.correlativo"
                    v-model:anio="formulario.anio"
                    v-model:mes="formulario.mes"
                    v-model:denuncia="formulario.denuncia"
                    v-if="ocultarCodigo"
                ></CodigoCasoVue> 
                <slot v-else name="codigo-caso"/>
                <small class="text-light fw-semibold">Archivos</small>
                <div class="row  py-2 border border-2 border-primary rounded-3">
                    <div class="col-md-12 mt-2">
                        <h3>Archivos del caso</h3>
                        <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                    </div>                    
                    <div class="col-md-12" v-show="!(showVer??false)">    
                        <form ref="formArchivosRef">
                            <label  v-if="!(showVer??false)" for="formFileMultipleCaso" class="fw-semibold d-block">Seleccionar Archivos</label>
                            <input  v-if="!(showVer??false)" :readonly="showVer ?? false" accept="application/msexcel, application/msword, application/pdf, application/rtf, image/*"
                                class="form-control btn-outline-primary" 
                                type="file" v-on:change="handleSubidaArchivos" 
                                ref="archivosCasos" 
                                id="formFileMultipleCaso" multiple 
                                :disabled = "loading"
                            />                      
                        </form>                   
                    </div>                                      
                    <div class="col-md-6 p-2 mt-3" v-if="!(showVer??false)">
                        <h5>Archivos (Seleccionados)</h5>
                        <ul class="list-group-archivos list-group border border-1 border-primary" v-auto-animate>
                            <li class="list-group-item" v-for="item in archivosCasoArray" :key="item.name">
                                <strong>{{item.name}}</strong>
                            </li>
                            <h5 class="text-wrap text-nowrap mt-2 text-center" v-show="archivosCasoArray.length===0">
                                <strong><i class="bx bx-md bx-no-entry text-danger"></i> No existen archivos.</strong>
                            </h5> 
                        </ul>
                    </div>                      
                    <div class="p-2 mt-3" :class="!(showVer??false) ? 'col-md-6': 'col-md-12'">
                        <h5>Archivos (Servidor)</h5>
                        <ul class="list-group-archivos list-group border border-1 border-primary" v-auto-animate>
                            <li class="list-group-item" v-for="item in formulario.archivosCasos" :key="item.key">
                                <div><strong>{{item.nombre_original}}</strong></div> 
                                <div>                    
                                    <button class="btn btn-sm btn-success rounded-3 m-1" :disabled="loading"
                                        @click="$emit('handledDescargarArchivo', item.key, item.nombre_original)">
                                        Descargar <i class="bx bx-download"></i>
                                    </button>
                                    <Popper class="popper-theme text-start" arrow v-if="!(showVer??false)">
                                        <button class="btn btn-sm btn-danger rounded-3 m-1" :disabled="loading">
                                            Eliminar <i class="bx bx-x"></i>
                                        </button>
                                        <template #content="{ close }">
                                            <div class="dropdown-header">
                                                <h6 class="text-wrap text-nowrap "><strong>Esta acción no se podra revertir,<br> ¿Continuar?</strong></h6>
                                            </div>
                                            <button class="dropdown-item text-start-center" @click="handledBorrarArchivo(item.key);close();" :disabled="loading">
                                                <i class="bx bx-check"></i> Continuar
                                            </button>
                                            <button class="dropdown-item text-start-center" @click="close();" :disabled="loading">
                                                <i class="bx bx-x"></i> Cancelar
                                            </button>
                                        </template>
                                    </Popper>
                                </div>
                            </li> 
                            <h5 class="text-wrap text-nowrap mt-2 text-center" v-show="formulario.archivosCasos.length===0">
                                <strong><i class="bx bx-md bx-no-entry text-danger"></i> No existen archivos.</strong>
                            </h5> 
                        </ul>
                    </div>
                    <div class="col-md-12 mt-3" v-if="mensajeArchivos!==null">
                        <h6 class="text-primary"><i class="bx bx-spin bx-loader"></i> {{mensajeArchivos}}...</h6>
                    </div>  

                <div>
                    <label for="" class="fw-semibold d-block">Observaciones: </label>
                    <textarea type="text" class="form-control"></textarea>
                </div>                    
                </div>
                <ButtonsFormCasosVue
                    :showVer="showVer ?? false"
                    @handleActualizarDatosTabla="() => $emit('handleActualizarDatosTabla')"
                    :loading="loading"
                    :showSig="false"
                    @resetForm="resetForm"
                    @siguiente="siguiente('agresores')"
                    @anterior="anterior('agresores')"
                    @guardar="guardar"
                > 
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button"/>
                    </template>
                </ButtonsFormCasosVue>
            </div>
        </template>
    </Tabs>  
</div>    
</template>
<script>
import { reactive, ref, onMounted } from 'vue'

import servicios    from '@/services/crud';
import otros        from '@/services/otros';

import Popper                   from "vue3-popper";

import Tabs                     from '@/components/Tabs.vue';
import AlertVue                 from '@/components/Alert.vue';
import FormInputVue             from '@/components/FormInput.vue';
import LabelShowVer             from '@/components/labelShowVer.vue';
import CodigoCasoVue            from '@/components/casos/CodigoCaso.vue';
import FormDeptoMuniVue         from '@/components/FormDeptoMuni.vue';
import ButtonsFormCasosVue      from '@/components/ButtonsForm.vue';
import FormSelectOpcionVue      from '@/components/FormSelectOpcion.vue';
import FormNombreApellidoVue    from '@/components/FormNombreApellido.vue';
import VictimaResponsableVue    from '@/components/casos/VictimaResponsable.vue'

export default {
    components: {
        Tabs,
        Popper,
        AlertVue,
        LabelShowVer,
        FormInputVue,
        CodigoCasoVue,
        FormDeptoMuniVue,
        ButtonsFormCasosVue,
        FormSelectOpcionVue,
        FormNombreApellidoVue,
        VictimaResponsableVue,
    },
    // watch: {
    //     'formulario.victima.fechaNacimiento'(nuevo){
    //         this.visibleTab('responsable', this.getEdadInt(nuevo)<18 && this.getEdadInt(nuevo)>=1);
    //     }
    // },
    setup(props, { emit }) {
        const form = {
            key:null,
            fechaRegistro:null,
            circunstanciaDelHecho:null,
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
                empresa:null,
                lugarTrabajo:null,
                direccionTrabajo:null,
                otraNacionalidad:null,
                ocupacion:null,
                ocupacionOtra:null,
                zonaResidencial:null,
                sexo:null,
                genero:null,
                sabeEscribirLeer:null,
                nivelEducacion:null,
                estadoFamiliar:null,
                nacionalidad:null,
                nacionalidadOtra:null,
                embarazada:null,
                propietarioResidencia:null,
                propietarioResidenciaOtro:null,
                discapacidad:'Ninguna',
                hijos:[],
                otrasPersonas:[],
                fuenteIngresos:[],
                fuenteIngresosOtro:null,
                relacionVictima:null, 
                relacionVictimaOtra:null, 
                hijosVivos:'No',
                otrasPersonasConvivientes:'No',
            },
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
                empresa:null,
                lugarTrabajo:null,
                direccionTrabajo:null,
                otraNacionalidad:null,
                ocupacion:null,
                ocupacionOtra:null,
                zonaResidencial:null,
                sexo:null,
                genero:null,
                sabeEscribirLeer:null,
                nivelEducacion:null,
                estadoFamiliar:null,
                nacionalidad:null,
                nacionalidadOtra:null,
                embarazada:null,
                propietarioResidencia:null,
                propietarioResidenciaOtro:null,
                discapacidad:'Ninguna',
                hijos:[],
                otrasPersonas:[],
                fuenteIngresos:[],
                fuenteIngresosOtro:null,
                relacionVictima:null, 
                relacionVictimaOtra:null, 
                hijosVivos:'No',
                otrasPersonasConvivientes:'No',
            }, 
            fechaHecho:null,
            horaHecho:null,
            agresores:[
                /**Objetos */
            ],
            tiposViolencia:null,
            modalidadViolencia:null,
            delitoCodigoPenal:null,
            delitoCodigoPenalOtro:null,
            delitoLeivs:[],
            departamentoOcurrencia:null,
            municipioOcurrencia:null,
            institucionRemitente:null,
            institucionRemitenteOtra:null,
            institucionSeRemite:[
                /**String */
            ],
            tipoAsistencia:[
                /**String */
            ],
            archivosCasos:[]
        };
        const victimaFormRef = ref(null);
        const formArchivosRef = ref(null)
        const archivosCasoArray = ref([])
        const mensajesAlert = ref(null)
        const tipoAlert  = ref(null)
        const formulario = reactive(JSON.parse(JSON.stringify(form)));
        const opciones = ref(null);
        const loading = ref(true);
        const mensajeArchivos = ref(null);
        const archivosCasos = ref(null);
        const ocultarCodigo = ref(true);
       
        const tabs = ref([{
                nombre:'Info. Víctima', 
                icon:' bx bx-user bx-sm', 
                tag:'victima', 
                selected:true, 
                visible:true
            },{
                nombre:'Info. Hecho', 
                icon:'bx bx-id-card bx-sm', 
                tag:'hecho-violento', 
                selected:false, 
                visible:true
            },{
                nombre:'Info. Agresor', 
                icon:'bx bxs-group bx-sm', 
                tag:'agresores', 
                selected:false, 
                visible:false
            },{
                nombre:'Archivos', 
                icon:' bx bx-file bx-sm', 
                tag:'archivos', 
                selected:false, 
                visible:true
            }]
        );

        function resetForm() {
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
            resetTabs();
            let date = new Date();
            formulario.mes = date.getMonth() + 1;
            formulario.anio = date.getFullYear();
            mensajesAlert.value = null
            tipoAlert.value  = null
            formArchivosRef.value.reset();
            mensajeArchivos.value = null;
            archivosCasos.value = null;
            archivosCasoArray.value = [];
            victimaFormRef.value.reset();
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
        };

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
        };
        
        const agregarAgresor = () =>{
            let agresor = {
                key:null,
                edad:null,
                edadDesconocida:false,
                primerNombre:null,
                segundoNombre:null,
                primerApellido:null,
                segundoApellido:null,
                municipio:null,
                departamento:null,
                direccion:null,
                ocupacion:'Desconocida',
                ocupacionOtro:null,
                relacionVictimaAgresor:'Ninguna, desconocido',
                otraRelacionVictima:null,
                selected:false,
                nombreDesconocido:false,
                zonaResidencial:null,
                poseeArma:'No se Sabe',
                tipoArma:'No Tiene / No se Sabe',
                tipoArmaOtro:null,
                formacionMilitarPolicial:'No se Sabe',  
                lugarTrabajo:null,
                direccionTrabajo:null,
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
            return edad > 0 && edad < 120 ? edad : 0;
        }

        const handleChangedResetOcupacionVictima = () =>{
            if(formulario.victima.ocupacion !=='Otra') 
                formulario.victima.ocupacionOtra = null;
        }       
        
        const resetTabs = () => {
            selectedTab('victima');
            visibleTab('agresores', false);
            visibleTab('responsables', false);
        };
        const isvisibleTab = (_tag) => {
            const tab = tabs.value.find((item) => item.tag===_tag);
            return tab.visible;
        };

        const visibleTab = (tag, _visible) => {
            tabs.value = tabs.value.map((item) => { if(item.tag===tag) item.visible=_visible; return item; });           
        };
        const selectedTab = (tag) => {
            tabs.value = tabs.value.map((item) => { item.selected = item.tag===tag; return item; });
        };
        const tabIsSelected = (_tag) => {
            const tab = tabs.value.find((item) => item.tag===_tag);
            console.log(tab.nombre)
            return tab.selected;
        };
        const siguiente = (_tag) => {
            selectedTab(_tag);
            const edadVictima_bool = variablesSiguienteAnterior().edadVictima_bool;
            const longitudAgresores_bool = variablesSiguienteAnterior().longitudAgresores > 0;
          
            
            if(tabIsSelected('victima')){
                selectedTab('hecho-violento');
            }else if(tabIsSelected('hecho-violento')){
                if(isvisibleTab('agresores')){
                    selectedTab('agresores');
                    return;
                }
                if(isvisibleTab('archivos')){
                    selectedTab('archivos');
                    return;
                }
               
            
            }else if(tabIsSelected('agresores')){
                selectedTab('archivos'); 
            }           
        }
        
        
        const variablesSiguienteAnterior = () => {
            const edadVictima = getEdadInt(formulario.victima.fechaNacimiento);
            const edadVictima_bool = edadVictima<18 && edadVictima>0;
            const longitudAgresores = formulario.agresores.length;
            return { edadVictima_bool: edadVictima_bool, longitudAgresores: longitudAgresores, }
        }
        
        const anterior = (_tag) => {
            const edadVictima_bool = variablesSiguienteAnterior().edadVictima_bool;
            const longitudAgresores = variablesSiguienteAnterior().longitudAgresores;

            //selectedTab(_tag);
             if(tabIsSelected('hecho-violento')){
                selectedTab('victima');        
            }else if(tabIsSelected('agresores')){
                
                if(!edadVictima_bool)
                selectedTab('hecho-violento')    
                    //selectedTab('responsable')
                // else 
                //     selectedTab('hecho-violento')    
            }else if(tabIsSelected('archivos')){
                //selectedTab('agresores')                    
                if(longitudAgresores>0)
                    selectedTab('agresores')
                else selectedTab('hecho-violento')   
            }        
        }

        const handleSubidaArchivos = async() => {
            archivosCasoArray.value = archivosCasos.value.files ?? [];
        }

        function wait(ms) {
            return new Promise( (resolve) => {setTimeout(resolve, ms)});
        }

        const cargarDocumentos = async(key) => {
            const archivos = archivosCasos.value.files;
            const longitud = archivos.length;
            for(let i = 0; i<longitud; i++){
                const item = archivos[i];

                mensajeArchivos.value = 'Cargando Archivo ('+(i+1)+'/'+longitud+')..';
                
                let formData = new FormData();
                formData.append( 'archivo', item);
                formData.append( 'key', key);
                
                const json = await otros.archivos(formData, 'saiv/archivos/cargar/caso');
                mensajeArchivos.value = json.data.mensaje;
                await wait(2 * 1000);
            }
        }

        const guardar = async() =>{
            try {
                loading.value = true;                
                const responseCaso = await servicios.actualizarCrear(formulario, 'saiv/casos/guardar');                
                if(responseCaso.ok){
                    if(responseCaso.json.error){
                        tipoAlert.value = 'warning';
                        mensajesAlert.value = responseCaso.json.error;
                    }else{
                        // Cargar los archivos en el servidor
                        await cargarDocumentos(responseCaso.json.key);
                        formulario.key              = responseCaso.json.key;
                        formulario.correlativo      = responseCaso.json.correlativo;
                        mensajesAlert.value         = responseCaso.json.mensaje;
                        archivosCasos.value.files   = null;
                        archivosCasoArray.value     = [];
                        tipoAlert.value             = null;
                        mensajesAlert.value         = null;

                        // Obtener los archivos asociados a este caso
                        const caso = await servicios.obtener('saiv/casos/obtener/'+formulario.key);
                        formulario.archivosCasos    = caso.archivosCasos;
                        mensajeArchivos.value       = null;

                        // Reset el input de archivos
                        formArchivosRef.value.reset();
                    }
                }
                loading.value = false;
                
            } catch (error) {                
                console.log('¡Ups ocurrio un error!, no se pudo guardar el caso');
                loading.value = false;
            }
        };
        const handledBorrarArchivo = (key_archivo) => emit('handledBorrarArchivo', formulario.key, key_archivo)
        const cargarArchivos = (_archivos) => formulario.archivosCasos = _archivos;
        const nombreAgresorDesconocido = (_bool, item) => {
            if(!_bool){
                return;
            }
            item.primerNombre = null;
            item.primerApellido = null;
            item.segundoNombre = null;
            item.segundoApellido = null;
        }
        const handledocultarCodigo=(bool)=>{
            bool ??=false;
            ocultarCodigo.value = bool;
        }
        return {
            // Ref
            victimaFormRef,
            formArchivosRef,

            // Variables
            form,
            tabs, 
            loading,
            opciones,
            tipoAlert,
            formulario,
            mensajesAlert,
            ocultarCodigo,
            archivosCasos,
            mensajeArchivos,    
            archivosCasoArray,
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
            selectedTab,
            quitarAgresor,
            getEdadString,
            cargarArchivos,
            agregarAgresor,
            selectAgresores,
            handledBorrarArchivo,
            handleSubidaArchivos,
            handledocultarCodigo,
            agregarQuitarAgresores,
            nombreAgresorDesconocido,
            handleChangedResetOcupacionVictima,
        };
    },
    props:['showVer']
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

.list-group-archivos{
    max-height: 300px;
    min-height: 300px;
    margin-bottom: 10px;
    overflow-y:scroll;
    -webkit-overflow-scrolling: touch;
}
.popper-theme {
    --popper-theme-background-color: #ffffff;
    --popper-theme-background-color-hover: #ffffff;
    --popper-theme-text-color: #333333;
    --popper-theme-border-width: 1px;
    --popper-theme-border-style: solid;
    --popper-theme-border-color: #eeeeee;
    --popper-theme-border-radius: 7px;
    --popper-theme-padding: 3px;
    --popper-theme-box-shadow: 0 6px 30px -6px rgba(0, 0, 0, 0.25);
}
</style>