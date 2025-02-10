import axios from 'axios'
import store from '@/store'
import toast from './toast'
export default{
    datosTabla: async (params, url) => {  
        try {
            let cargando = true
            let data = []
            let links = []
            let total = 0
            let page = 0
            let current_page = 1;
            let last_page = null;
            let _json = null;
            let _error = null;
            let ok = false;
            await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: store.state.HEADERS,
                redirect: 'follow', // manual, *follow, error
                referrerPolicy: 'no-referrer', // no-referrer, *no-referrer-when-downgrade, origin, origin-when-cross-origin, same-origin, strict-origin, strict-origin-when-cross-origin, unsafe-url
                body: JSON.stringify(params) // body data type must match "Content-Type" header
            })       
            .then(response => {
                ok = response.ok;
                if(response.status === 401){
                    localStorage.clear();
                    router.push({ name: "acceso"})
                }else if(response.status === 'undefined'){
                    router.push({ name: "/saiv/acceso"})
                }
                return response.json() 
            })
            .then(response => {   
                page            = response.page;
                data            = response.data;
                total           = response.total;
                links           = response.links;
                current_page    = response.current_page;
                last_page       = response.last_page;
                _json = response; 
            }). catch(error => {_error = error; cargando= false; })
    
            toast.toasPeticionesHttp(_json, _error, ok)
            
            cargando = false;
            return {
                total:total, 
                data: data, 
                page:page,
                links:links,
                cargando:cargando, 
                current_page:current_page,
                last_page:last_page
            }            
        } catch (error) {
            toast.toasPeticionesHttp(null, error, false);
            cargando = false;
        }
    },
    archivos: async (name_file, file, key, url) => {
    
        let _error = null;
        let _response = null;
    
        // Función para convertir un archivo a base64
        const convertToBase64 = (file) => {
            return new Promise((resolve, reject) => {
                const reader = new FileReader();
                reader.onloadend = () => resolve(reader.result);
                reader.onerror = reject;
                reader.readAsDataURL(file);
            });
        };
    
        try {
            // Convertir el archivo a base64
            const fileBase64 = await convertToBase64(file);
    
            // Crear el objeto JSON a enviar
            const dataToSend = {
                key: key,
                archivo: fileBase64,
                nombre: name_file
            };
    
            const response = await fetch(store.state.URL_SERVER + url, {
                method: 'POST',
                headers: {
                    ...store.state.HEADERS,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(dataToSend)
            });
    
            _response = response;
            const data = await response.json();
    
            // Manejo de errores basado en la respuesta
            if (!response.ok) {
                _error = data;
            }
    
            toast.toasPeticionesHttp(data, _error, response.status === 200);
    
            return { data, error: _error, status: response.status };
    
        } catch (error) {
            _error = error;
            console.error("Error en la carga de archivo:", error);
            toast.toasPeticionesHttp(null, _error, false);
            return { data: null, error: _error, status: null };
        }
    },    
    descargarArchivo: async (url, _nombre) => {
        await axios({
            url: store.state.URL_SERVER+url,
            method: 'GET',
            headers: store.state.HEADERS,
            responseType: 'blob',
        }).then((response) => {
            var fileURL = window.URL.createObjectURL(new Blob([response.data]));
            var fileLink = document.createElement('a');
        
            fileLink.href = fileURL;
            fileLink.setAttribute('download', _nombre);
            document.body.appendChild(fileLink);
        
            fileLink.click();
        });
    },
    post: async (json, url) =>{
        try {
            let _error = null;
            let _response = null;
            await axios.post(store.state.URL_SERVER+url, 
                json, { method:"POST", headers: JSON.stringify(store.state.HEADERS) }
            )
            .then( function( response ){
                _response = response;
            }.bind(this))
            .catch( function( error ){
                _error = error;
            }.bind(this));
            return { _response:_response, _error:_error }
        }catch(e) {
            console.log(e)
        }
    }
}