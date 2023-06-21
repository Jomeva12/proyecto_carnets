$(function () {
   
    crearRol()
    crearHora()
    llenarcomboRol()
    llenarTablaUsuarios()
    tablaCitasUser() 
    llenarTablaRol()
    llenarTablaHorarios()
    tablaCitasAdmin()
    tablaCitasAdminBuscar()
    EditarUsuario()
    consultaCodigo()
    actualizarDiasHabiles()
    getDiaAll()

    crearFechaRestriccion()
    listarRestricciones()
    eliminarRestriccion()

    $("#bloqueAsignarCita").hide()
    crearUsuario()
    previsualizarFoto()
    asignarCita()
    asignarCitabyUser()
    $("#previsualizar").hide()
    CancelarCitaUser()

})

function getUrlVal() {
    var val = [], hash;
    var dir = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < dir.length; i++) {
      hash = dir[i].split('=');
      val.push(hash[0]);
      val[hash[0]] = hash[1];
    }
    return val;
  }
  function tablaCitasUser() {
      if ($("#idUsuario").val()!=null) {
          
    
     let datos = {
      id: $("#idUsuario").val()
    }
 
    
    $.ajax({
      url: '../php/listarCitasUser.php',
      type: 'POST',
      data: datos,
      success: function (response) {

          var Opt,estadoCita=""
          
        let plantilla = "";
        let citas = JSON.parse(response); 
        citas.forEach(r => {
            combrobarFechaNow(r.fecha2)
            var Opt,estadoCita=""
if (r.estado=="Asignada") {

    Opt=  `<button class="btn btn-danger cancelarCita"><i class="fa fa-close"></i> Cancelar</button>`
    estadoCita= `<span class="badge badge-warning">Asignada</span>`
}else if (r.estado=="Cancelada") {
    estadoCita= `<span class="badge badge-secondary">Cancelada</span>`
    Opt=  ``

}else if (r.estado=="Cumplida") {
    estadoCita= `<span class="badge badge-success">Cumplida</span>`
    Opt=  ``
}

          plantilla += `
          <tr>               
          <td>${r.id}</td>
          <td>${r.fecha1}</td>
          <td>${r.fecha2}</td>
          <td>${r.hora}</td>
          <td>${estadoCita}</td>
          <td>${Opt}</td>
        </tr>
      `  
        })
        $("#tablacitas").html(plantilla)
  
      }
    });
}
  }
  function tablaCitasAdmin() {
      if ($("#txtShearch").val()!=null) {
          
    
    let datos = {
      id: $("#txtShearch").val()
    }
    
    $.ajax({
      url: '../php/consultartCitasAdmin.php',
      type: 'POST',
      data: datos,
      success: function (response) {
        var Opt,estadoCita=""
        
        let plantilla = "";
        let citas = JSON.parse(response); 
        citas.forEach(r => {           
          
            if (r.nombreDeestado=="Asignada") {
                Opt=  `<button class="btn btn-danger cancelarCita"><i class="fa fa-close"></i> Cancelar</button>`
                estadoCita= `<span class="badge badge-warning">Asignada</span>`
            }else if (r.nombreDeestado=="Cancelada") {
                estadoCita= `<span class="badge badge-secondary">Cancelada</span>`
                Opt=  ``
            
            }else if (r.nombreDeestado=="Cumplida") {
                estadoCita= `<span class="badge badge-success">Cumplida</span>`
                Opt=  ``
            
            }

          plantilla += `
          <tr>               
          <td>${r.idCita}</td>
          // <td>${r.fechaDeProgramacion}</td>
          <td>${r.fechaDeCita}</td>
          <td>${r.nombres}</td>
          <td>${r.hora}</td>
          <td>${r.codigo}</td>
          <td>${estadoCita}</td>
          <td>${Opt}</td>
        </tr>
      `
  
        })
        $("#tablacitas").html(plantilla)
        
      }
    });
}
  }
  function tablaCitasAdminBuscar() {
    $("#txtShearch").keyup(function(e){
        console.log( $("#txtShearch").val())
 
    let datos = {
      letra: $("#txtShearch").val()
    }
    
    $.ajax({
      url: '../php/consultartCitasAdmin.php',
      type: 'POST',
      data: datos,
      success: function (response) {
        $("#tablacitas").html("")
        var Opt,estadoCita=""
        console.log( response)
        let plantilla = "";
        let citas = JSON.parse(response); 
        citas.forEach(r => {           
          
            if (r.nombreDeestado=="Asignada") {
                Opt=  `<button class="btn btn-danger cancelarCita"><i class="fa fa-close"></i> Cancelar</button>`
                estadoCita= `<span class="badge badge-warning">Asignada</span>`
            }else if (r.nombreDeestado=="Cancelada") {
                estadoCita= `<span class="badge badge-secondary">Cancelada</span>`
                Opt=  ``
            
            }else if (r.nombreDeestado=="Cumplida") {
                estadoCita= `<span class="badge badge-success">Cumplida</span>`
                Opt=  ``
            
            }

          plantilla += `
          <tr>               
          <td>${r.idCita}</td>
          // <td>${r.fechaDeProgramacion}</td>
          <td>${r.fechaDeCita}</td>
          <td>${r.nombres}</td>
          <td>${r.hora}</td>
          <td>${r.codigo}</td>
          <td>${estadoCita}</td>
          <td>${Opt}</td>
        </tr>
      `
  
        })
        $("#tablacitas").html(plantilla)
        
      }
    });
})
  }
function combrobarFechaNow(fecha){

}
function crearRol() {
    $("#guardarRol").click(function (e) {
        e.preventDefault()
        var nombreRol = $("#rol").val()
        var datos = {
            rol: nombreRol
        }

        $.post('../php/crearRol.php', datos, function (response) {
            
            $("#rol").val("")
           
            llenarTablaRol()
        })
    })
}
function CancelarCitaUser() {
    $("#tablacitas").on('click','.cancelarCita',function (e) {
        var cita = $(this).closest('tr').find('td:eq(0)').text();
        var fecha = $(this).closest('tr').find('td:eq(2)').text()
        var hora = $(this).closest('tr').find('td:eq(3)').text()
         var datos = {
            idcita: cita
         }
         if (confirm("Desea Cancelar la cita para el día "+fecha+" a las "+hora+"?")) {
          $.post('../php/EliminarCitaUser.php', datos, function (response) {
           tablaCitasUser() 
           tablaCitasAdmin()
        })   
         }else{

         }

        
    })
}
function asignarCita() {
   let hora=""
   //getFecha
   var fecha=""
   $("#fecha").on("change", function (e) { 

          fecha = $("#fecha").val()
          restriccionesParaCitas(fecha)       

})
    $("#selectHorario").on("change", function (e) {
        hora = $("#selectHorario")
            .find(":selected")
            .attr("idcita");           

    })

    $("#guardarCita").click(function (e) {
        e.preventDefault()
        var datos = {
             idUsuario :$("#idUsuario").val(),
             fechaDeCita : $("#fecha").val(),
             Estado : "1",
             horas : hora
        }
        var exist = {
            idUsuario:$("#idUsuario").val()        
       }
         
       $.post('../php/ConsultaSiExisteCitaAsig.php', exist, function (response) {
        if (response=="Asignada") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Parece que tiene una cita asignada!',
               
              })

        }else{
            $.post('../php/crearCita.php', datos, function (response) {
                let plantilla=' <option value="Seleccione" disabled selected>Seleccione Hora</option>'
                if (response=="error") {
                  Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salió mal!',
                    footer: '<a href="">Por que veo este mensaje?</a>'
                  })  
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Cita asignada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                      })
     $("#formCitas").trigger("reset");
               $("#selectHorario").empty()
               $("#selectHorario").html(plantilla)
    
                }
                
              
            })

        }

    })



       
    })
}

function crearHora() {
    $("#guardarHoraas").click(function (e) {
        e.preventDefault()
        var hora = $("#horario").val()
        var datos = {
            hora: hora
        }

        $.post('../php/crearHorario.php', datos, function (response) {
           
            $("#horario").val("")
            llenarTablaHorarios()
        })
    })
}
function llenarcomboRol() {
    $.ajax({
        url: "../php/listarRol.php",
        type: "GET",
        contentType: false,
        processData: false,
        success: function (response) {
            let plantilla = "";
            const roles = JSON.parse(response);
            roles.forEach((r) => {
              
                plantilla += `
                  <option value=${r.id}>${r.rol}</option>    `;

            });
            $("#selectRol").append(plantilla);

        },
    });
}
function llenarTablaRol() {
    $.ajax({
        url: "../php/listarRol.php",
        type: "GET",
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
            let plantilla = "";
            const roles = JSON.parse(response);
            roles.forEach((r) => {
                              plantilla += `
                <tr>               
                <td>${r.id}</td>
                <td>${r.rol}</td>               
              </tr> `;

            });
            $("#tablaRoll").html(plantilla);

        },
    });
}
function llenarTablaHorarios() {
    $.ajax({
        url: "../php/listarHorariosTodos.php",
        type: "GET",
        contentType: false,
        processData: false,
        success: function (response) {
            let plantilla = "";
            const Horarios = JSON.parse(response);
            Horarios.forEach((r) => {
                              plantilla += `
                <tr>               
                <td>${r.id}</td>
                <td>${r.horas}</td>
               
              </tr> `;

            });
            $("#tablaHorarios").html(plantilla);

        },
    });
}
function llenarTablaUsuarios() {
    $.ajax({
        url: "../php/listarAllUsers.php",
        type: "GET",
        contentType: false,
        processData: false,
        success: function (response) {
           
            let plantilla = "";
            var urlPhoto=""
            const usuarios = JSON.parse(response);
            usuarios.forEach((r) => {

                if (r.foto=="") {
                    urlPhoto="./img/sinFoto.png"
                    
                }else{
                    urlPhoto=r.foto
                }
                              plantilla += `
                <tr>               
                <td>${r.id}</td>
                <td>${r.nombre}</td>
                <td>${r.codigo}</td>
                <td>${r.rol}</td>
                <td> <img src="${urlPhoto}" height="60px"; width="60px" alt=""></td>
              </tr> `;

            });
            $("#tablaUsuarios").html(plantilla);

        },
    });
}
function llenarcomboHorario(fecha) {

    var datos = {
        fecha:fecha
   }
 
    $.post('../php/listarHorario.php', datos, function (response) {
        let plantilla = "";
        
        const roles = JSON.parse(response);
        plantilla=' <option value="Seleccione" disabled selected>Seleccione Hora</option>'
        roles.forEach((r) => {
          
            plantilla += `
              <option idcita=${r.id}>${r.horas}</option>    `;

        });
        $("#selectHorario").html(plantilla);
        
     })


  
}
function consultaCodigo() {
    $("#btnConsultaCodigo").on('click', function (e) {
        e.preventDefault()
 var datos = {
        codigo:$("#txtShearch").val()
   }
 
    $.post('../php/listarDatosDeUsuario.php', datos, function (response) {
       
        const persona = JSON.parse(response);
        
          $("#nombre").html(persona[0].nombre+" - "+persona[0].codigo);
          $("#idUsuario").val(persona[0].id);
          $("#bloqueAsignarCita").show()
       
        
     })

    })
   


  
}

function crearUsuario() {
 let rol = ""
        $("#selectRol").on("change", function (e) {
            rol = $("#selectRol")
                .find(":selected")
                .attr("idRol");

        })
    $("#guardarUsuario").on('click', function (e) {
        e.preventDefault()
              
        if (rol == "") {
            alert("Defina el rol")
        } else {
            var dato = new FormData($("#formulario")[0]);
            $.ajax({
                url: '../php/crearUsuario.php',
                type: 'POST',
                data: dato,
                contentType: false,
                processData: false,
                success: function (response) {
                    //  const roles = JSON.parse(response);
               
                    if (response=="Guardado") {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Usuario creado correctamente',
                            showConfirmButton: false,
                            timer: 1500
                          })
                        $("#formulario").trigger("reset");
                        document.querySelector("#previsualizar").src=""
                        $("#previsualizar").hide()
                    }else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'No se pudo crear el usuario!',
                            
                            
                          })
                    }
                 
                    // $("#formulario").trigger("reset");
                    // const datos = {
                    //     actualizarRol: rol
                    // }
                    // $.post('./php/crearRol.php', datos, function (response) {
                    //     console.log(response)
                    // })
                }

            });
        }


    })
}
function asignarCitabyUser() {
    let hora=""
    //getFecha
    var fecha=""
    $("#fecha").on("change", function (e) {    
           fecha = $("#fecha").val()
           restriccionesParaCitas(fecha)
     
 
        
 
 })
     $("#selectHorario").on("change", function (e) {
         hora = $("#selectHorario")
             .find(":selected")
             .attr("idcita");           
 
     })
     $("#guardarCitaUser").click(function (e) {
         e.preventDefault()
         var datos = {
              idUsuario :$("#idUsuario").val(),
              fechaDeCita : $("#fecha").val(),
              Estado : "1",
              horas : hora
         }     
                  var exist = {
            idUsuario:$("#idUsuario").val()        
       }
         
       $.post('../php/ConsultaSiExisteCitaAsig.php', exist, function (response) {
        if (response=="Asignada") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Parece que ya tiene una cita asignada!',
                
                
              })
        
    }else{

        $.post('../php/crearCita.php', datos, function (response) {
             let plantilla=' <option value="Seleccione" disabled selected>Seleccione Hora</option>'
             Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Cita asignada',
                showConfirmButton: false,
                timer: 1500
              })
            $("#formCitas").trigger("reset");
            $("#selectHorario").empty()
            $("#selectHorario").html(plantilla)
         }) 
    
    }
})

        
     })
 }
function EditarUsuario() {
   
       $("#guardarUsuarioEdit").on('click', function (e) {
           e.preventDefault()
           
               var dato = new FormData($("#formulario")[0]);
               $.ajax({
                   url: '../php/editarUser.php',
                   type: 'POST',
                   data: dato,
                   contentType: false,
                   processData: false,
                   success: function (response) {
          
                       
                    
                   }
   
               });
           
   
   
       })
   }
function previsualizarFoto(){
    $("#imagen").on('change',function(e){
       var imagenPrevisualizacion = document.querySelector("#previsualizar");
var foto=this.files

if (!foto || !foto.length) {
    $("#previsualizar").hide()
    imagenPrevisualizacion.src = "";
    return;
  }
  const primerArchivo = foto[0];
 
  const objectURL = URL.createObjectURL(primerArchivo);
  $("#previsualizar").show()
  imagenPrevisualizacion.src = objectURL;
 
    }) 
 

}
function restriccionesParaCitas(fecha){
    const fechaComoCadena = fecha; 
const dias = [
  'lunes',
  'martes',
  'miercoles',
  'jueves',
  'viernes',
  'sabado',
  'domingo',
];
const numeroDia = new Date(fechaComoCadena).getDay();
const nombreDia = dias[numeroDia];
getDiaAbierto(nombreDia,fecha)

}
function getDiaAbierto(dia,fecha){
    var datos={
        dias:dia
    }
   
$.post('../php/consultarDiasLaboral.php',datos,function(response){
   
    const dias = JSON.parse(response);
    dias.forEach(r=>{
      
    if(r.estado=="cerrado"){
               Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'No laboramos los dias '+r.nombreDia+"!",
            footer: '<a href="">Por que veo este mensaje?</a>'
          }) 
     }else{
         consultarRestriccion(fecha)
      
     }
    })
})


}
function consultarRestriccion(fecha){
    let datos={
        fecha:fecha
    }
    $.post('../php/listarRestricciones.php',datos,function(response){
        var bandera=true
        const fechas=JSON.parse(response)
        fechas.forEach(r=>{
            if (fecha==r.fecha) {
                bandera=false
            }
        })
        if (bandera) {
           console.log("llenando combo")
    llenarcomboHorario(fecha)   
        }else{
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No laboramos en la fecha '+fecha+"!",
                footer: '<a href="">Por que veo este mensaje?</a>'
              })  
        }
      
    })
    
}
function getDiaAll(){
    let datos={
        todo:" "
    }
       $.ajax({
        url: '../php/listarDiasLaboral.php',
        type: 'POST', 
        data:datos,       
        contentType: false,
        processData: false,
        success: function (response) {
            console.log(response)
let plantilla=``
let visibles=""
const dias = JSON.parse(response);
dias.forEach(r=>{

    
if (r.nombreDia=="lunes") {
    if (r.estado=="abierto") {
        $("#lunes").prop("checked", true)
       
    }else{
        $("#lunes").prop("checked", false)
    }
}
if (r.nombreDia=="martes") {
    if (r.estado=="abierto") {
        $("#martes").prop("checked", true)
    }else{
        $("#martes").prop("checked", false)
    }
}
if (r.nombreDia=="miercoles") {
    if (r.estado=="abierto") {
        $("#miercoles").prop("checked", true)
    }else{
        $("#miercoles").prop("checked", false)
    }
}
if (r.nombreDia=="jueves") {
    if (r.estado=="abierto") {
        $("#jueves").prop("checked", true)
    }else{
        $("#jueves").prop("checked", false)
    }
}
if (r.nombreDia=="viernes") {
    if (r.estado=="abierto") {
        $("#viernes").prop("checked", true)
    }else{
        $("#viernes").prop("checked", false)
    }
}
if (r.nombreDia=="sabado") {
    if (r.estado=="abierto") {
        $("#sabado").prop("checked", true)
    }else{
        $("#sabado").prop("checked", false)
    }
}
if (r.nombreDia=="domingo") {
    if (r.estado=="abierto") {
        $("#domingo").prop("checked", true)
    }else{
        $("#domingo").prop("checked", false)
    }
}
 
})

         
        }

    });
}

function actualizarDiasHabiles(){
   $( "#contenedorDias" ).on( 'click', '#lunes', function(){
     var estado=""
     var dia="1"
    if( $( this ).is( ':checked' ) ){
        estado="abierto"
        guardarDias(dia,estado)
      }else{
        estado="cerrado" 
        guardarDias(dia,estado)
        }
    })
    $( "#contenedorDias" ).on( 'click', '#martes', function(){
        var estado=""
        var dia="2"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
       $( "#contenedorDias" ).on( 'click', '#miercoles', function(){
        var estado=""
        var dia="3"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
       $( "#contenedorDias" ).on( 'click', '#jueves', function(){
        var estado=""
        var dia="4"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
       $( "#contenedorDias" ).on( 'click', '#viernes', function(){
        var estado=""
        var dia="5"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
       $( "#contenedorDias" ).on( 'click', '#sabado', function(){
        var estado=""
        var dia="6"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
       $( "#contenedorDias" ).on( 'click', '#domingo', function(){
        var estado=""
        var dia="7"
       if( $( this ).is( ':checked' ) ){
           estado="abierto"
           guardarDias(dia,estado)
         }else{
           estado="cerrado" 
           guardarDias(dia,estado)
           }
       })
}
function guardarDias(dia,estado){
    let datos={
dia:dia,
estado:estado
    }
    console.log(datos)
    const url="../php/ActualizaDias.php  "
   
    $.ajax({
        url: url,
        type: 'POST',
        data: datos,
        success: function (response) {
            const dias=JSON.stringify(response)
            console.log(dias.nombreDia)
            getDiaAll()
        }
    })
}
function crearFechaRestriccion(){
  
    $("#guardarRestriccion").click(function (e) { 
        e.preventDefault()
        fecha = $("#fechaRestriccion").val()
        console.log("clic")
let datos={
    fecha:fecha
}
 console.log(datos)

$.post('../php/crearFechaRestriccion.php',datos,function(response){
listarRestricciones()
})
})
}
function listarRestricciones(){
    let datos={
        nada:""
    }  
    $.post('../php/listarRestricciones.php',datos,function(response){
        console.log(response)
        var plantilla=""
        const fechas=JSON.parse(response)
        fechas.forEach(r=>{
            plantilla+=  `
            <tr>               
            <td>${r.fecha}</td>
            <td><button class="btn btn-danger eliminarRestriccion"><i class="fa fa-close"></i> Eliminar</button></td>
              </tr>`
        })
        $("#tablaFechasRestricciones").html(plantilla)
                
        
    })
// $.ajax({
//     url: '../php/listarRestricciones.php',
//         type: 'POST',        
//         processData: false,
//         success: function (response) {
//             console.log(response)
// var plantilla=""
// const fechas=JSON.parse(response)
// fechas.forEach(r=>{
//     plantilla+=  `
//     <tr>               
//     <td>${r.fecha}</td>
//     <td><button class="btn btn-danger eliminarRestriccion"><i class="fa fa-close"></i> Eliminar</button></td>
//       </tr>`
// })
// $("#tablaFechasRestricciones").html(plantilla)
//         }

// })
}
function eliminarRestriccion(){
    $("#tablaFechasRestricciones").on('click','.eliminarRestriccion',function (e) {
        var fecha = $(this).closest('tr').find('td:eq(0)').text();
       
        var datos={
            fecha:fecha
        }
        console.log(fecha)
        $.post('../php/eliminarRestriccion.php',datos,function(response){
           
            console.log(response)
             listarRestricciones()
            })
    })
}
