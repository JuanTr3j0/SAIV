// import the library
import 'mosha-vue-toastify/dist/style.css'
// import the styling for the toast
import { createToast } from 'mosha-vue-toastify';
import { Toast } from 'bootstrap';

const showIcon = true;
const position = 'bottom-right';
const timeout = 5000;
const transition = 'slide';

const danger = {
    showIcon: showIcon,
    position: position,
    timeout: timeout,
    type: 'danger',
    transition: 'bounce',
};
const warning = {
    showIcon: showIcon,
    position: position,
    timeout: timeout,
    type: 'warning',
    transition: transition,
};
const success = {
    showIcon: showIcon,
    position: position,
    timeout: timeout,
    type: 'success',
    transition: 'zoom',
};
const info = {
    
    position: position,
    timeout: timeout,
    type: 'info',
    transition: 'zoom',
};

export default{
    toasPeticionesHttp: (json , error, ok) =>{
        if(ok){
            if( typeof json.mensaje !== 'undefined')createToast({ title: 'Mensaje', description: json.mensaje}, success);
            if( typeof json.aviso !== 'undefined')createToast({ title: 'Aviso', description: json.aviso}, warning);
            // if( typeof json.error !== 'undefined')createToast({ title: 'Error', description: json.error}, danger);
        }
        error ??= false;
        if (error) {
            Toast('Error desconocido', error)
        } 
    },   
    info : (informacion) =>{
        createToast({ title: 'Información', description: informacion}, info);
    },
    mensaje : (mensaje) =>{
        createToast({ title: 'Mensaje', description: mensaje}, success);
    },
    aviso(aviso){
        createToast({ title: 'Aviso', description: aviso}, warning);
    },
    error(error){
        createToast({ title: 'Error', description: error}, error);
    }
}