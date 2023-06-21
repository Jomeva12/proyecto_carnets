$(function () {
       
   
    tablaCitasUser()    
    tablaCitasAdmin()
    tablaCitasAdminBuscar()
    consultaCodigo()  
    $("#bloqueAsignarCita").hide()
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


