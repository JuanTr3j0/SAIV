<template>
    <div class="card clearfix">  
        <div class="card-body">
            <form action="">
                <div class="row py-1 gy-2 mt-1 border border-2 border-primary rounded-3">
                    <div class="col-md-12 mt-2">
                        <h3 class="align-text-bottom"><i class='bx bxs-certification bx-md ' ></i>Seguimiento Jurídico</h3>                            
                    </div>                    
                    <slot name="codigo-caso"/>  
                    <!--Forman Parte de las Opciones de Atención Brindada-->
                    <FormSelectOpcionVue  v-show="atencionBrindadaSubMenu.length>0"
                        :id="id+'-atencion-brindada-sub-menu'" 
                        :nombre="'Atención Brindada (Sub Menú)'"
                        :opciones="atencionBrindadaSubMenu"
                        :clases="['col-md-2']" :loading="false" :showVer="showVer ?? false"
                        v-model:opcion="formulario.atencionBrindadaSubMenu"
                        @change="
                            handleShowAtencionBrindadaOtro(); 
                            if(formulario.atencionBrindadaSubMenu === null)
                                formulario.atencionBrindadaOtro = null;
                        "
                    ></FormSelectOpcionVue>                   
                    <FormInputVue
                        :id="id+'-familia-demanda-otro'"
                        :titulo="'Atención Brindada Otro (Especifique)'"
                        :loading="loading"
                        :showVer="showVer"
                        :clases="['col-md-4']"
                        v-model:value="formulario.atencionBrindadaOtro"
                        v-show="showAtencionBrindadaOtro"
                    />
                    <!-------------------------------------------------->              
                    <FormSelectOpcionVue
                        :id="id+'-tipo-servicio'" :nombre="'Servicio que Remite'"
                        :opciones="opciones === null ? []:opciones.servicioQueRemite"
                        :clases="['col-md']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.servicioQueRemite"                                          
                    ></FormSelectOpcionVue>
                    <FormSelectOpcionVue
                        :id="id+'-atencion-brindada'" 
                        :nombre="'Atención Brindada'"
                        :opciones="opciones === null ? [] : opciones.atencionBrindada"
                        :clases="['col-md']" 
                        :loading="loading" 
                        :showVer="showVer ?? false"
                        v-model:opcion="formulario.atencionBrindada"
                        @change="
                        if(!existInArrayAtencionBrindada(formulario.atencionBrindadaSubMenu))
                            formulario.atencionBrindadaSubMenu=null;
                        "                                                 
                    ></FormSelectOpcionVue>
                    
                    <div class="col-md-12">
                        <label class=" fw-semibold d-block" :for="id+'-servicio'">Tipo de Servicio</label>
                        <div class="row">
                            <div class="col-md-6">
                                <FormSelectOpcionVue
                                    :id="id+'-tipo-servicio'" 
                                    :nombre="'Servicio:'"
                                    :opciones="opciones === null ? [] : opciones.tipoServicio"
                                    :clases="['input-group']" :loading="loading" :showVer="showVer ?? false"
                                    v-model:opcion="formulario.tipoServicio"                                             
                                ></FormSelectOpcionVue>                                
                            </div>
                            <div class="col-md-6">
                                <FormInputVue
                                    :id="id+'-tipo-servicio-fecha-hora'"
                                    :titulo="'Fecha:'"
                                    :loading="loading"
                                    :showVer="showVer"
                                    :type="'datetime-local'"
                                    :clases="['input-group']"
                                    v-model:value="formulario.tipoServicioFechaHora"
                                />
                            </div>
                        </div>                        
                    </div>                   
                    <FormSelectOpcionVue
                        :id="'-tipo-violencia'" :nombre="'Tipo de Violencia'"
                        :opciones="opciones === null ? []:opciones.tipoViolencia"
                        :clases="[(showVer ?? false)?'col-md-6':'col-md-5']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.tipoViolencia"                                                 
                    ></FormSelectOpcionVue>
                    <div class="col-md-1" v-if="!(showVer ?? false)">
                         &nbsp&nbsp&nbsp
                        <button
                            type="button"
                            class="btn btn-primary btn-block"
                            :disabled="formulario.codigoCaso === null || loading"
                            @click="actualizarOpcion('tipoViolencia', formulario.tipoViolencia)">
                            <i class="bx" :class="loading ? 'bx-loader bx-spin bx-sm':'bx-save bx-sm'"/> 
                        </button>
                    </div>
                    <FormSelectOpcionVue
                    :id="id+'-modalidad-violencia'" :nombre="'Modalidad de Violencia'"
                    :opciones="opciones === null ? []:opciones.modalidadViolencia"
                        :clases="[(showVer ?? false)?'col-md-6':'col-md-5']" :loading="loading" :showVer="showVer ?? false"
                        v-model:opcion="formulario.modalidadViolencia"                                                 
                    ></FormSelectOpcionVue>
                    <div class="col-md-1" v-if="!(showVer ?? false)">
                         &nbsp&nbsp&nbsp
                        <button
                            type="button"
                            class="btn btn-primary btn-block"
                            :disabled="formulario.codigoCaso === null || loading"
                            @click="actualizarOpcion('modalidadViolencia', formulario.modalidadViolencia)">
                            <i class="bx" :class="loading ? 'bx-loader bx-spin bx-sm':'bx-save bx-sm'"/> 
                        </button>
                    </div>
                    <FormSelectOpcionVue
                        :id="id+'-violencia-sede-diligencia'"
                        :nombre="'Sede Judicial en que se Realizara la Diligencia'"
                        :opciones="opciones === null ? []:opciones.sedeJudicialDiligencia"
                        :clases="['col-md-12', 'mb-3']"
                        :loading="loading" :showVer="showVer ?? false"  
                        v-model:opcion="formulario.sedeJudicialDiligencia"
                    ></FormSelectOpcionVue>
                    <h4><i class='bx bxs-right-arrow'></i> Procesos</h4>
                    <TabsVue :tabs="tabs0" @selectedTab="selectedTab0">                           
                        <template v-slot:violencia-intrafamiliar>
                            <div class="row gy-2 border-primary border-2 rounded-3 pb-2 border">
                                <div class="col-md-12">
                                    <label class=" fw-semibold d-block" :for="id+'-fechaNacimiento'">Medidas de Protección</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <FormInputVue
                                                :id="id+'-medidas-proteccion-desde'"
                                                :titulo="'Desde:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'date'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.medidasProteccionDesde"
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            <FormInputVue
                                                :id="id+'-medidas-proteccion-desde'"
                                                :titulo="'Hasta:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'date'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.medidasProteccionHasta"
                                            />
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group">
                                                <span class="input-group-text fw-bold text-primary">Duración:</span>
                                                <span class="input-group-text fw-bold text-primary">
                                                    {{calcularDiasFechas(formulario.medidasProteccionDesde, formulario.medidasProteccionHasta)}} Dias
                                                </span>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="col-md-12">
                                    <label class=" fw-semibold d-block" :for="id+'-audiencia-preliminar-fecha'">Audiencia Preliminar Juzgado</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <FormInputVue
                                                :id="id+'-audiencia-preliminar-fecha'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.audienciaPreliminar"
                                            />
                                        </div>
                                        <div class="col-md-8">
                                            <FormSelectOpcionVue
                                                :id="'-audiencia-preliminar-resolucion'" 
                                                :nombre="'Resolución Obtenida:'"
                                                :opciones="opciones === null ? []:opciones.audienciaPreliminarResolucion"
                                                :clases="['input-group']" :loading="loading" 
                                                :showVer="showVer ?? false"
                                                v-model:opcion="formulario.audienciaPreliminarResolucion"                                                 
                                            ></FormSelectOpcionVue>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class=" fw-semibold d-block" :for="id+'-audiencia-publica-fecha'">Audiencia Pública</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <FormInputVue
                                                :id="id+'-audiencia-publica-fecha'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.audienciaPublica"
                                            />
                                        </div>
                                        <div class="col-md-8">
                                            <FormSelectOpcionVue
                                                :id="'-audiencia-publica-resolucion'" 
                                                :nombre="'Resolución Obtenida:'"
                                                :opciones="opciones === null ? []:opciones.audienciaPublicaResolucion"
                                                :clases="['input-group']" :loading="loading" 
                                                :showVer="showVer ?? false"
                                                v-model:opcion="formulario.audienciaPublicaResolucion"                                                 
                                            ></FormSelectOpcionVue>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-slot:familia>
                            <div class="row gy-2 border-primary border-2 rounded-3 pb-2 border">
                                <FormSelectOpcionVue
                                    :id="id+'-familia-demanda'" 
                                    :nombre="'Demanda'"
                                    :opciones="opciones === null ? []: opciones.familiaDemanda"
                                    :clases="['col-md-4']" :loading="loading" :showVer="showVer ?? false"  
                                    v-model:opcion="formulario.familiaDemanda"   
                                    @change="resetVariablesForm('familiaDemanda', 'familiaDemandaOtro', 'Otro')"                                         
                                ></FormSelectOpcionVue>
                                <FormInputVue
                                    :id="id+'-familia-demanda-otro'"
                                    :titulo="'Otro Tipo Demanda (Especifique)'"
                                    :loading="loading"
                                    :showVer="showVer"
                                    :clases="['col-md-4']"
                                    v-model:value="formulario.familiaDemandaOtro"
                                    v-show="formulario.familiaDemanda === 'Otro'"
                                />
                                <div class="col-md-12">
                                    <label class="fw-semibold d-block" :for="id+'-procuraduria-fecha-hora'">Procuraduría General de la República</label>
                                    <div class="row">
                                        <div class="col-md-4 my-md-auto">
                                            <FormInputVue
                                                :id="id+'-procuraduria-fecha-hora'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.familiaProcuraduriaGeneralHoraFecha"
                                            />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <label v-if="showVer ?? false" class="form-control fw-bold text-primary">
                                                    {{formulario.familiaProcuraduriaGeneralAcuerdo === null || formulario.familiaProcuraduriaGeneralAcuerdo.trim() === ''?'No Ingresado':formulario.familiaProcuraduriaGeneralAcuerdo}}
                                                </label>
                                                <template v-else>
                                                    <span class="input-group-text fw-bold text-primary">Acuerdo Obtenido:</span>
                                                    <textarea
                                                        v-model="formulario.familiaProcuraduriaGeneralAcuerdo"
                                                        class="form-control"  
                                                        cols="20" rows="2" 
                                                        placeholder="Ingrese Acuerdo"
                                                    ></textarea>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-semibold d-block" :for="id+'-juzgado-fecha-hora'">Juzgado de Familia Audiencia Preliminar</label>
                                    <div class="row">
                                        <div class="col-md-4 my-md-auto">
                                            <FormInputVue
                                                :id="id+'-juzgado-fecha-hora'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.familiaAudienciaPreliminarHoraFecha"
                                            />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <label v-if="showVer ?? false" class="form-control fw-bold text-primary">
                                                    {{formulario.familiaAudienciaPreliminarResolucion === null || formulario.familiaAudienciaPreliminarResolucion.trim() === ''?'No Ingresado':formulario.familiaAudienciaPreliminarResolucion}}
                                                </label>
                                                <template v-else>
                                                    <span class="input-group-text fw-bold text-primary">Resolución Obtenida:</span>
                                                    <textarea
                                                        v-model="formulario.familiaAudienciaPreliminarResolucion"
                                                        class="form-control"
                                                        cols="20" rows="2" 
                                                        placeholder="Ingrese descripción"
                                                    ></textarea>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="fw-semibold d-block" :for="id+'-audiencia-sentencia-fecha-hora'">Juzgado de Familia Audiencia de Sentencia</label>
                                    <div class="row">
                                        <div class="col-md-4 my-md-auto">
                                            <FormInputVue
                                                :id="id+'-audiencia-sentencia-fecha-hora'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.familiaAudienciaSentenciaHoraFecha"
                                            />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group">
                                                <label v-if="showVer ?? false" class="form-control fw-bold text-primary">
                                                    {{formulario.familiaAudienciaSentenciaResolucion === null || formulario.familiaAudienciaSentenciaResolucion.trim() === ''?'No Ingresado':formulario.familiaAudienciaSentenciaResolucion}}
                                                </label>
                                                <template v-else>
                                                    <span class="input-group-text fw-bold text-primary">Resolución Obtenida:</span>
                                                    <textarea                                                        
                                                        v-model="formulario.familiaAudienciaSentenciaResolucion"
                                                        class="form-control"
                                                        cols="20" rows="2" 
                                                        placeholder="Ingrese descripción">
                                                    </textarea>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-slot:violencia-contra-mujer>
                            <div class="row gy-2 border-primary border-2 rounded-3 pb-2 border">
                                <div class="col-md-8">
                                    <label class="fw-semibold d-block" for="">Delitos LEIV </label>                                                                 
                                    <labelShowVer
                                        v-if="(showVer ?? false)"
                                        :value="formulario.violenciaMujerDelitosLeiv"
                                    /> 
                                    <v-select
                                    v-else
                                        multiple
                                        placeholder="Seleccione"
                                        :options="opciones === null ? []:opciones.delitosLeivs"
                                        :style="vue_style_select"
                                        :loading="loading"                                        
                                        v-model="formulario.violenciaMujerDelitosLeiv"
                                    />                                            
                                </div>                                     
                                <div class="col-md-1">
                                    &nbsp&nbsp&nbsp
                                    <button
                                        v-if="!(showVer ?? false)"
                                        type="button"
                                        class="btn btn-primary btn-block mb-2"
                                        :disabled="formulario.codigoCaso === null || loading"
                                        @click="actualizarOpcion('delitosLeivs', formulario.violenciaMujerDelitosLeiv)">
                                        <i class="bx" :class="loading ? 'bx-loader bx-spin bx-sm':'bx-save bx-sm'"/> 
                                    </button>
                                </div>                       
                                <FormSelectOpcionVue
                                    :id="id+'-delito-codigo-penal'"
                                    :nombre="'Delitos del Código Penal:'"
                                    :opciones="opciones === null ? []:opciones.delitoCodigoPenal"
                                    :clases="['col-md-8']"
                                    :loading="loading"
                                    :showVer="showVer ?? false"
                                    v-model:opcion="formulario.violenciaMujerCodigoPenal"
                                    @change="() => formulario.violenciaMujerCodigoPenalOtro =
                                        formulario.violenciaMujerCodigoPenal === 'Otro' ? formulario.violenciaMujerCodigoPenalOtro:null"
                                ></FormSelectOpcionVue> 
                                <div class="col-md-1">
                                    &nbsp &nbsp &nbsp
                                    <button v-show="formulario.violenciaMujerCodigoPenal!=='Otro'"
                                        v-if="!(showVer ?? false)"
                                        type="button"
                                        class="btn btn-primary btn-block"
                                        :disabled="formulario.codigoCaso === null || loading"
                                        @click="actualizarOpcion('codigoPenal', formulario.violenciaMujerCodigoPenal)">
                                        <i class="bx" :class="loading ? 'bx-loader bx-spin bx-sm':'bx-save bx-sm'"/> 
                                    </button>
                                </div>
                                <Transition name="fade">
                                    <div class="col-md-8" v-show="formulario.violenciaMujerCodigoPenal==='Otro'">
                                        <label class=" fw-semibold d-block" for="caso-codigo-penal-hecho-otro">Delitos Codigo Penal Otro (Expecifique)</label>
                                        <div class="col-md"> 
                                            <input :readonly="showVer ?? false" v-model="formulario.violenciaMujerCodigoPenalOtro" :disabled="loading||formulario.violenciaMujerCodigoPenal!=='Otro'"
                                            type="text" class="form-control" id="caso-codigo-penal-hecho-otro" placeholder="Ingrese" />
                                        </div>
                                    </div>  
                                </Transition>
                                <Transition name="fade">
                                    <div class="col-md-1" v-show="formulario.violenciaMujerCodigoPenal==='Otro'">
                                        &nbsp &nbsp &nbsp
                                        <button
                                            v-if="!(showVer ?? false)"
                                            type="button"
                                            class="btn btn-primary btn-block"
                                            :disabled="formulario.codigoCaso === null || loading || formulario.violenciaMujerCodigoPenal!=='Otro'"
                                            @click="actualizarOpcion('codigoPenalOtro', formulario.violenciaMujerCodigoPenalOtro)">
                                            <i class="bx" :class="loading ? 'bx-loader bx-spin bx-sm':'bx-save bx-sm'"/> 
                                        </button>
                                    </div>
                                </Transition> 
                                <FormSelectOpcionVue
                                    :id="id+'-violencia-diligencia'"
                                    :nombre="'Diligencia'"
                                    :opciones="opciones === null ? []:opciones.violenciaMujerDiligencia"
                                    :clases="['col-md-8']"
                                    :loading="loading" :showVer="showVer ?? false"    
                                    v-model:opcion="formulario.violenciaMujerDiligencia"
                                ></FormSelectOpcionVue>                                
                                <FormSelectOpcionVue
                                    :id="id+'-violencia-resolucion'"
                                    :nombre="'Resolución Obtenida'"
                                    :opciones="opciones === null ? []:opciones.violenciaMujerResolucion"
                                    :clases="['col-md-8']"
                                    :loading="loading" :showVer="showVer ?? false"
                                    v-model:opcion="formulario.violenciaMujerResolucion"
                                ></FormSelectOpcionVue>
                            </div>
                        </template>
                        <template v-slot:derecho-niñes-adolescencia>
                            <div class="row gy-2 border-primary border-2 rounded-3 pb-2 border">
                                <FormSelectOpcionVue
                                    :id="id+'-derechos-ninos-adolecentes'" :nombre="'Derechos de la Niñez y Adolescencia'"
                                    :opciones="opciones === null ? []: opciones.derechoNinesAdolecencia"
                                    :clases="['col-md-6']" :loading="loading" :showVer="showVer ?? false"  
                                    v-model:opcion="formulario.derechoNinesAdolecencia"   
                                    @change="{
                                        // resetVariablesForm(variableObservada, variableReset, OpcionRequerida)
                                        resetVariablesForm('derechoNinesAdolecencia', 'derechoNinesAdolecenciaAutoVulneraciónDeDerechos', 'Auto Vulneración a Derechos');
                                        resetVariablesForm('derechoNinesAdolecencia', 'derechoNinesAdolecenciaVulneracion', 'Vulneración a Derechos');
                                        resetVariablesForm('derechoNinesAdolecencia', 'derechoNinesAdolecenciaOtro', 'Otro');
                                    }"                                         
                                ></FormSelectOpcionVue>
                                <FormInputVue
                                    :id="id+'-derechos-niñez-adolescencia'"
                                    :titulo="'Derechos de la Niñez y Adolescencia Otro (Especifique)'"
                                    :loading="loading"
                                    :showVer="showVer"
                                    :clases="['col-md']"
                                    v-model:value="formulario.derechoNinesAdolecenciaOtro"
                                    v-show="formulario.derechoNinesAdolecencia === 'Otro'"
                                />   
                                <FormSelectOpcionVue
                                    :id="id+'-derecho-nines-adolescencia-auto-vulneracion'"
                                    :nombre="'Auto Vulneración a Derechos'"
                                    :opciones="opciones === null ? [] : opciones.derechoNinesAdolecenciaAutoVulneraciónDerechos"
                                    :clases="['col-md-6','mb-3']" :loading="loading" :showVer="showVer ?? false"
                                    v-model:opcion="formulario.derechoNinesAdolecenciaAutoVulneraciónDeDerechos"      
                                    v-show="formulario.derechoNinesAdolecencia === 'Auto Vulneración a Derechos'"                                           
                                />                                
                                <FormSelectOpcionVue
                                    :id="id+'-derecho-nines-adolescencia-vulneracion'" 
                                    :nombre="'Vulneración a Derechos'"
                                    :opciones="opciones === null ? [] : opciones.derechoNinesAdolecenciaVulneracion"
                                    :clases="['col-md-6','mb-3']" :loading="loading" :showVer="showVer ?? false"
                                    v-model:opcion="formulario.derechoNinesAdolecenciaVulneracion" 
                                    v-show="formulario.derechoNinesAdolecencia === 'Vulneración a Derechos'"                                                
                                />                                
                                <FormSelectOpcionVue
                                    :id="id+'-institucion-refiere'" 
                                    :nombre="'Institución a la que se Refiere'"
                                    :opciones="opciones === null ? [] : opciones.institucionALaQueSeRefiere"
                                    :clases="['col-md-6','mb-3']" :loading="loading" :showVer="showVer ?? false"
                                    v-model:opcion="formulario.institucionALaQueSeRefiere"                                                 
                                />                                
                            </div>
                        </template>
                        <template v-slot:referencia-servicios-saiv>
                            <div class="row gy-2 border-primary border-2 rounded-3 pb-2 border">
                                <div class="col-md-12">
                                    <label class=" fw-semibold d-block" :for="id+'-referencia-servicios-saiv'">
                                        Referencia a Servicios en la SAIV{{store.state.USUARIO.oficina}}
                                    </label>
                                    <div class="row">
                                        <div class="col-md">
                                            <FormSelectOpcionVue
                                                :id="id+'-referencia-servicios-saiv'"
                                                :nombre="'Referencia:'"
                                                :opciones="opciones === null ? []:opciones.referenciaServicios"
                                                :clases="['input-group']"
                                                :loading="loading" :showVer="showVer ?? false"
                                                v-model:opcion="formulario.referenciaServicios"
                                            ></FormSelectOpcionVue>
                                        </div>
                                        <div class="col-md">
                                            <FormInputVue
                                                :id="id+'-referencia-servicios-saiv-fecha-hora'"
                                                :titulo="'Fecha:'"
                                                :loading="loading"
                                                :showVer="showVer"
                                                :type="'datetime-local'"
                                                :clases="['input-group']"
                                                v-model:value="formulario.referenciaServiciosHoraFecha"
                                            />                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </TabsVue>
                    <h4><i class='bx bxs-right-arrow'></i> Cierre de Expediente</h4>
                    <div class="row">
                        <FormInputVue
                            :id="id+'-cierre-expediente-fecha-hora'"
                            :titulo="'Fecha:'"
                            :loading="loading"
                            :showVer="showVer"
                            :type="'datetime-local'"
                            :clases="['col-md-6']"
                            v-model:value="formulario.cierreExpedienteHoraFecha"
                        /> 
                        <FormSelectOpcionVue
                            :id="id+'-razon-cierre-expediente'" 
                            :nombre="'Razón del Cierre'"
                            :opciones="opciones === null ? [] : opciones.cierreExpediente"
                            :clases="['col-md-6','mb-3']" :loading="loading" :showVer="showVer ?? false"
                            v-model:opcion="formulario.cierreExpediente"                                                 
                        />
                    </div>
                    <div class="px-2">
                        <AlertVue :mensajesAlert="mensajesAlert" :alert="tipoAlert"></AlertVue>
                    </div> 
                </div>
                <ButtonsFormVue
                    :showVer="showVer ?? false"
                    :loading="loading"
                    :showSig="false"
                    :showAnt="false"
                    @guardar="guardar"
                >
                    <template v-slot:nuevo-button>
                        <slot name="nuevo-button" />
                    </template>
                </ButtonsFormVue>
            </form>
        </div> 
    </div>
</template>
<script>
import { defineComponent, ref, reactive, onMounted } from 'vue'

import FormSelectOpcionVue  from '@/components/FormSelectOpcion.vue';
import labelShowVer         from '@/components/labelShowVer.vue';
import ButtonsFormVue       from '@/components/ButtonsForm.vue';
import FormInputVue         from '@/components/FormInput.vue';
import AlertVue             from '@/components/Alert.vue';
import TabsVue              from '@/components/Tabs.vue';

import servicios from '@/services/crud';
import store from '@/store';

export default defineComponent({    
    props:['showVer'],
    watch:{
        'formulario.atencionBrindada' : async function(nuevo){
            this.atencionBrindadaSubMenu = await servicios.obtener('saiv/opciones/seguimiento/juridico/atencionBrindada/'+nuevo);
            this.handleShowAtencionBrindadaOtro();
        },  
    },
    setup() {
        const form = {
            key:null,
            codigoCaso:null,        
            atencionBrindada:null,
            atencionBrindadaSubMenu:null,
            atencionBrindadaOtro:null,
            codigoCaso:null,
            tipoServicioFechaHora:null,
            tipoServicio:null,
            tipoViolencia:null,
            modalidadViolencia:null,
            servicioQueRemite:null,
            medidasProteccionDesde:null,
            medidasProteccionHasta:null,
            audienciaPreliminar:null,
            audienciaPreliminarResolucion:null,
            audienciaPublica:null,
            audienciaPublicaResolucion:null,
            familiaProcuraduriaGeneralHoraFecha:null,
            familiaProcuraduriaGeneralAcuerdo:null,
            familiaAudienciaPreliminarHoraFecha:null,
            familiaAudienciaPreliminarResolucion:null,
            familiaAudienciaSentenciaHoraFecha:null,
            familiaAudienciaSentenciaResolucion:null,
            familiaDemanda:null,
            familiaDemandaOtro:null,
            violenciaMujerDiligencia:null,
            violenciaMujerCodigoPenal:null,
            violenciaMujerCodigoPenalOtro:null,
            violenciaMujerDelitosLeiv:[],
            sedeJudicialDiligencia:null,
            violenciaMujerSedeJuzgadoDepartamento:null,
            violenciaMujerSedeJuzgadoMunicipio:null,
            violenciaMujerResolucion:null,
            derechoNinesAdolecencia:null,
            derechoNinesAdolecenciaOtro:null,
            derechoNinesAdolecenciaAutoVulneraciónDeDerechos:null,
            derechoNinesAdolecenciaVulneracion:null,
            referenciaServicios:null,
            referenciaServiciosHoraFecha:null,
            institucionALaQueSeRefiere:null,
            cierreExpediente:null,
            cierreExpedienteHoraFecha:null,
        };
        const opciones = ref(null);
        const tipoAlert = ref(null);
        const mensajesAlert = ref(null);
        const loading = ref(false);
        const atencionBrindadaSubMenu = ref([]);
        const showAtencionBrindadaOtro = ref(false);
        const formulario = reactive(JSON.parse(JSON.stringify(form)));
        const tabs = ref([
            {
                nombre:'Seguimiento Jurídico', 
                icon:'bx bxs-building-house bx-sm', 
                tag:'seguimiento-juridico', 
                selected:true, 
                visible:true
            }
        ]);
        const tabs0 = ref([
            {
                nombre:'Violencia Intrafamiliar', 
                icon:'bx bx-cube-alt', 
                tag:'violencia-intrafamiliar', 
                selected:true, 
                visible:true
            },
            {
                nombre:'Familia', 
                icon:'bx bx-cube-alt', 
                tag:'familia', 
                selected:false, 
                visible:true
            },
            {
                nombre:'Violencia Contra la Mujer', 
                icon:'bx bx-cube-alt', 
                tag:'violencia-contra-mujer', 
                selected:false, 
                visible:true
            },
            {
                nombre:'Derechos de la Niñez y Adolescencia', 
                icon:'bx bx-cube-alt', 
                tag:'derecho-niñes-adolescencia', 
                selected:false, 
                visible:true
            },
            {
                nombre:'Referencia a Servicios en la SAIV'+store.state.USUARIO.oficina, 
                icon:'bx bx-cube-alt', 
                tag:'referencia-servicios-saiv', 
                selected:false, 
                visible:true
            },
        ]);
        
        const existKey = () => { return formulario.key !== null };
        const selectedTab = (tag) => {
            tabs.value = tabs.value.map((item) => { item.selected = item.tag===tag; return item; });
        };        
        const selectedTab0 = (tag) => {
            tabs0.value = tabs0.value.map((item) => { item.selected = item.tag===tag; return item; });
        };      
        const calcularDiasFechas = (fecha_1, fecha_2) =>{
           
            if(fecha_1 === null || fecha_2 === null)
                return '?';

            let fechaInicio = new Date(fecha_1).getTime();
            let fechaFin    = new Date(fecha_2).getTime();
            let diff = fechaFin - fechaInicio;
            let dias = diff/(1000*60*60*24);
            if(isNaN(dias) || parseInt(dias) < 0)
                return '?';
            else
                return dias;
        };
        // Cargar datos desde el caso
        const handleChangeTipoViolencia       = opcion => formulario.tipoViolencia              = opcion; 
        const handleChangeModalidadViolencia  = opcion => formulario.modalidadViolencia         = opcion; 
        const handleChangeDelitosLeiv         = opcion => formulario.violenciaMujerDelitosLeiv  = opcion; 
        const handleChangeDelitosCodPenal     = opcion => formulario.violenciaMujerCodigoPenal  = opcion;

        const handleShowAtencionBrindadaOtro = () => {            

            if(formulario.atencionBrindada === null || atencionBrindadaSubMenu.value.length === 0){
                showAtencionBrindadaOtro.value = false; 
                return;
            }
            
            let _find = atencionBrindadaSubMenu.value.find(item=>item.key === formulario.atencionBrindadaSubMenu); 

            if(_find === null || typeof _find === 'undefined'){
                showAtencionBrindadaOtro.value = false;
                return;
            }
            if(_find.opcion === 'Otro'){
                showAtencionBrindadaOtro.value = true;  
                return;
            }            
            formulario.atencionBrindadaOtro = null;
            showAtencionBrindadaOtro.value = false;        
        };

        const handleChangeCodigoCaso = _CodigoCaso => formulario.codigoCaso = _CodigoCaso;

        const existInArrayAtencionBrindada = (_value) =>{
            let _objeto = atencionBrindadaSubMenu.value.find(item => item.key === _value);
            return typeof _objeto !== 'object';
        }

        onMounted(async() => {
            loading.value  = true;
            let response = await servicios.obtener('saiv/opciones/seguimiento/juridico/index');
            opciones.value = response;
            opciones.value??=null;
            loading.value = false;
        });

        function editForm(_form) {
            Object.assign(formulario, JSON.parse(JSON.stringify(_form)));
        };

        const resetVariablesForm = (variableObservada, variableReset, OpcionRequerida) => {
            if(formulario[variableObservada] === OpcionRequerida)
                return;
            formulario[variableReset] = null;
        };
        
        function resetForm() {
            tipoAlert.value                 = null;
            mensajesAlert.value             = null;
            loading.value                   = false;
            atencionBrindadaSubMenu.value   = [];
            showAtencionBrindadaOtro.value  = false;
            selectedTab0('violencia-intrafamiliar');
            Object.assign(formulario, JSON.parse(JSON.stringify(form)));
        };


        const actualizarOpcion = async (_tipo, _opcion) => {
            if( 
                typeof formulario.codigoCaso === null || _tipo === null || _opcion===null || 
                typeof formulario.codigoCaso === 'undefined' || typeof _tipo === 'undefined' || typeof _opcion==='undefined'
            ) return;

            loading.value = true;                
            const responseOpcion = await servicios.actualizarCrear({casoKey: formulario.codigoCaso.key, tipo:_tipo, opcion:_opcion}, 'saiv/seguimiento/juridico/OpcionesCasos');
            if(responseOpcion.ok)
            {
                if(responseOpcion.json.error){
                    tipoAlert.value = 'warning';
                    mensajesAlert.value = responseOpcion.json.error;
                }else{
                    tipoAlert.value = mensajesAlert.value = null;
                }
            }
            loading.value = false;          
        };
        const guardar = async() =>{
            loading.value = true;                
            try {
                const responseSeguimiento = await servicios.actualizarCrear(formulario, 'saiv/seguimiento/juridico/guardar');
                if(responseSeguimiento.ok)
                {
                    if(responseSeguimiento.json.error){
                        tipoAlert.value = 'warning';
                        mensajesAlert.value = responseSeguimiento.json.error;
                    }else{
                        formulario.key = responseSeguimiento.json.key;
                        tipoAlert.value = mensajesAlert.value = null;
                    }
                }
                loading.value = false;      
            } catch (error) {                
                console.log('¡Ups ocurrio un error!, no se pudo guardar el registro seguimiento');
                loading.value = false;
            }
        }; 
        const handleChangeLoading = _loading => loading.value = _loading; 
        const setSubAtencionBrindada = (_value) => formulario.atencionBrindadaSubMenu = _value;
        const setAtencionBrindadaOtro = (_value) => formulario.atencionBrindadaOtro = _value;

        
        return {
            // Variables
            id:'seguimiento-juridico',
            tabs,
            tabs0,
            store,
            loading,
            opciones,
            tipoAlert,
            formulario,
            mensajesAlert,
            vue_style_select:"--vs-font-size: 0.9375rem;",
            atencionBrindadaSubMenu,
            showAtencionBrindadaOtro,

            // Metodos
            guardar,
            existKey,
            editForm,
            resetForm,
            selectedTab,
            selectedTab0,
            actualizarOpcion,
            calcularDiasFechas,
            resetVariablesForm,
            handleChangeLoading,
            handleChangeCodigoCaso,
            existInArrayAtencionBrindada,
            handleShowAtencionBrindadaOtro,
            
            // Setter
            setSubAtencionBrindada,
            setAtencionBrindadaOtro,

            // Metodos que cambian deacuerdo al caso
            handleChangeTipoViolencia,
            handleChangeModalidadViolencia,
            handleChangeDelitosLeiv,
            handleChangeDelitosCodPenal,
        }
    },
    components:{
        TabsVue,
        AlertVue,
        labelShowVer,
        FormInputVue,
        ButtonsFormVue,
        FormSelectOpcionVue,
    },
})
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