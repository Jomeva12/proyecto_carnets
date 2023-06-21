$(function () {
   
    
    actualizarDiasHabiles()
    getDiaAll()

    

})

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
