<div class="pageheader">
    <h2><i class="fa fa-table"></i> Criterios Candidatos</h2> 
    </div>
    <div class="contentpanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a id="crear-registro" class="btn btn-primary"> <i class="fa fa-plus"></i>
                    Agregar Criterio Candidato
                </a>
            </div>
            <div class="panel-body">
                <div  class="table-responsive ">
                    <table id="tabla-registros" class="table mb30">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Candidato</th>
                                <th>Criterio</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $contador = 0; ?>
                        @foreach (CriteriosCandidatos::with('candidato','criterio')->get() as $registro)
                        <tr>
                            <td>{{ ++$contador }}</td>
                            <td>{{ $registro->candidato->nombres." ".$registro->candidato->apellidos }}</td>
                            <td>{{ $registro->criterio->titulo }}</td>
                            <td >
                                <a href="#" idreg="{{$registro->id}}" class="editar-registro">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" idreg="{{$registro->id}}"  class="eliminar-registro">
                                    <i style="color: red;" class="fa fa-trash-o"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Modal de crear registro --}}
<div id="modal-crear-registro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form-crear" role="form"   method="post" >
            <div class="modal-content  panel panel-primary">
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a class="panel-close" data-dismiss="modal" aria-hidden="true">×</a>
                    </div>              
                    <h4 class="panel-title">Crear Criterio Candidato</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!-- Inputs -->

                         <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Candidato <span class="asterisk">*</span></label>
                                {{Form::select('idcandidato',array('0'=>'Elija un Candidato') + Candidatos::select('id', DB::raw('CONCAT(nombres, " ", apellidos) AS full_name'))->lists('full_name','id'), null, array('id'=>'idcandidato', 'class'=>'form-control chosen-select input-lg'))}}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Criterio <span class="asterisk">*</span></label>
                                {{Form::select('idcriterio',array('0'=>'Elija un Criterio') + Criterios::all()->lists('titulo','id'), null, array('id'=>'idcriterio', 'class'=>'form-control chosen-select input-lg'))}}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Descripcion<span class="asterisk">*</span></label>
                                <input type="text" name="descripcion" class="form-control" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button id="btn-crear"class="btn btn-primary">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal de editar registro --}}
<div id="modal-editar-registro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="form-editar" role="form"   method="post" >
            <div class="modal-content panel panel-info">
                <div class="panel-heading">
                    <div class="panel-btns">
                        <a class="panel-close" data-dismiss="modal" aria-hidden="true">×</a>
                    </div>              
                    <h4 class="panel-title">Editar Criterio Candidato</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <!-- Inputs -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Candidato <span class="asterisk">*</span></label>
                                {{Form::select('idcandidato',array('0'=>'Elija un Candidato') + Candidatos::select('id', DB::raw('CONCAT(nombres, " ", apellidos) AS full_name'))->lists('full_name','id'), null, array('id'=>'idcandidato', 'class'=>'form-control chosen-select input-lg'))}}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label"> Criterio <span class="asterisk">*</span></label>
                                {{Form::select('idcriterio',array('0'=>'Elija un Criterio') + Criterios::all()->lists('titulo','id'), null, array('id'=>'idcriterio', 'class'=>'form-control chosen-select input-lg'))}}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label">Descripcion<span class="asterisk">*</span></label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" required/>
                            </div>
                        </div>
                        <!-- /Inputs -->
                    </div>
                </div>
                <div class="panel-footer">
                    <button id="btn-editar"class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Modal de eliminar registro --}}
<div id="modal-eliminar-registro" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content panel panel-danger">
            <div class="panel-heading">
                <div class="panel-btns">
                    <a class="panel-close" data-dismiss="modal" aria-hidden="true">×</a>
                </div>              
                <h4 class="panel-title">Eliminar Criterio Candidato</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <input type="hidden" name="ideliminar" id="ideliminar" class="form-control" required/>
                    <h4>¿Desea eliminar el registro?</h4>
                </div> 
            </div>
            <div class="panel-footer">
                <button id="btn-seguro-eliminar"class="btn btn-danger">Eliminar</button>
            </div>
        </div>
    </div>
</div>

{{-- Scripts --}}
<script type="text/javascript">
 
    $(document).ready(function($)
    {    
        $("#crear-registro").on("click",mostrarModalCrear);
        $("#form-crear").on("submit", crearRegistro);
        $(".editar-registro").on("click", mostrarModalEditar);
        $("#form-editar").on("submit", editarRegistro);
        $(".eliminar-registro").on("click", mostrarModalEliminar);
        $("#btn-seguro-eliminar").on("click", eliminarRegistro);

        /****************** MOSTRAR MODAL CREAR *******************/
        function mostrarModalCrear( e )
        {
            $('#form-crear')[0].reset();
            //$('#div-modal').html($('#modal-crear-registro'));
            $('#modal-crear-registro').modal('show', {backdrop: 'static'});

            if( e != null)
                e.preventDefault();

        }

        function crearRegistro( e )
        {           
            $.ajax(
            {
                type: "POST",
                url: "/ws/criterioscandidatos",
                dataType: "json",
                data: $("#form-crear").serialize() ,
                success:function( data )
                {
                    if(data.resultado)
                    {
                        $("#modal-crear-registro").modal("hide")
                        $.gritter.add({title:'Exito',text:data.mensaje,class_name:'growl-success'});
                        setTimeout(function(){ratPack.refresh();},500);
                    }
                    else
                    {
                        $.gritter.add({title:'Error',text:data.mensaje,class_name:'growl-danger'});
                    }
                },
                error: function(error)
                {
                    $.gritter.add({title:'Error',text:'Error al acceder al servicio',class_name:'growl-danger'});
                    console.error(error);
                }
            });
            

            if( e != null)
                e.preventDefault();
        }

        function mostrarModalEditar( e )
        {
            e.preventDefault();
            var idregistro= $(e.target).closest('a').attr('idreg');
            $.ajax(
            {
                type: "GET",
                url: "/ws/criterioscandidatos/"+idregistro,
                dataType: "json",
                data: {},
                success:function( data )
                {
                    if(data.resultado)
                    {
                        $("#modal-editar-registro #form-editar #idactualizar").val(data.registros.id);
                        $("#modal-editar-registro #form-editar #descripcion").val(data.registros.descripcion);
                        $("#modal-editar-registro #form-editar #inicio").val(data.registros.inicio);
                        $("#modal-editar-registro #form-editar #fin").val(data.registros.fin);

                        $("#modal-editar-registro #form-editar #idcandidato").val(data.registros.idcandidato);
                        $("#modal-editar-registro #form-editar #idcandidato").trigger("chosen:updated");
                        $("#modal-editar-registro").modal("show")
                    }
                    else
                    {
                        $.gritter.add({title:'Error',text:data.mensaje,class_name:'growl-danger'});
                    }
                },
                error: function(error)
                {
                    $.gritter.add({title:'Error',text:'Ocurrio un Error',class_name:'growl-danger'});
                    console.error(error);
                }
            });
        }

        function editarRegistro( e )
        {
            var idregistro = $("#modal-editar-registro #form-editar #idactualizar").val();
            $.ajax(
            {
                type: "PUT",
                url: "/ws/criterioscandidatos/"+idregistro,
                dataType: "json",
                data: $("#form-editar").serialize() ,
                success:function( data )
                {
                    if(data.resultado)
                    {
                        $("#modal-editar-registro").modal("hide")
                        $.gritter.add({title:'Exito',text:data.mensaje,class_name:'growl-success'});
                        setTimeout(function(){ratPack.refresh();},500);
                    }
                    else
                    {
                        $.gritter.add({title:'Error',text:data.mensaje,class_name:'growl-danger'});
                    }
                },
                error: function(error)
                {
                    $.gritter.add({title:'Error',text:'Error al acceder al servicio',class_name:'growl-danger'});
                    console.error(error);
                }
            });
            
            if( e != null)
                e.preventDefault();
        }

        function mostrarModalEliminar( e )
        {
            var idregistro= $(e.target).closest('a').attr('idreg');
            $("#modal-eliminar-registro #ideliminar").val(idregistro);
            $("#modal-eliminar-registro").modal("show");
            
            if( e != null)
                e.preventDefault();
        }

        function eliminarRegistro( e )
        {
            var idregistro = $("#modal-eliminar-registro #ideliminar").val();
            $.ajax(
            {
                type: "DELETE",
                url: "/ws/criterioscandidatos/"+idregistro,
                dataType: "json",
                data: {},
                success:function( data )
                {
                    if(data.resultado)
                    {
                        $("#modal-eliminar-registro").modal("hide")
                        $.gritter.add({title:'Exito',text:data.mensaje,class_name:'growl-success'});
                        setTimeout(function(){ratPack.refresh();},500);
                    }
                    else
                    {
                        $.gritter.add({title:'Error',text:data.mensaje,class_name:'growl-danger'});
                    }
                },
                error: function(error)
                {
                    $.gritter.add({title:'Error',text:'Error al acceder al servicio',class_name:'growl-danger'});
                    console.error(error);
                }
            });
            
            if( e != null)
                e.preventDefault();
        }


        /****** MOSTRAR SELECT ********/
        $(function() {
            $('.chosen-select').chosen({'width':'100%','white-space':'nowrap'});
        });

        /****** CONFIGURACION DE LA TABLA ***********/
        window.tabla= $('#tabla-registros').dataTable(
            {
                "oLanguage": {
                        "sLengthMenu": "Mostrando _MENU_ filas",
                        "sSearch": "",
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    }
                }
            });
        });
</script>