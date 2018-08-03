
<center> <h1>Factura</h1></center>
      <table style="width:100%">
         <tr>
              <th> 

              <div align="left">
                    <div class="form-group">
                      Villanueva Zacatecas
                    </div>  
               </div>
               <div align="left">
                    <div class="form-group">
                      Barrio del Guadalupe Calle  concepcion 33 
                    </div>
              </div>
               <div align="left">
                    <div class="form-group">
                       498923456
                    </div>
              </div>
               <div align="left">
                    <div class="form-group">
                       PE34DR43<br>
                       Regimen  de personas  fisicas  con actividades empresariales y profesionales
                    </div>
              </div>

            

            
              <th>
              <div align="right">
                    <div class="form-group">
                        <label for="tipo_comprobante">Tipo de comprobante: </label>
                        {{$venta->tipo_comprobante}}&nbsp;
                    </div>  
               </div>
               <div align="right">
                    <div class="form-group">
                        <label for="serie_comprobante">Serie  de comprobante:</label>
                        {{$venta->serie_comprobante}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
              </div>
               <div align="right">
                    <div class="form-group">
                        <label for="num_comprobante">Numero de comprobante:</label>
                        {{$venta->num_comprobante}}&nbsp; &nbsp;
                    </div>
              </div>
                 <div align="right">
                    <div class="form-group">
                        <label for="provedor">Cliente: </label>
                        {{$venta->nombre}}&nbsp;
                    </div>  
                </div>
              </th> 
         </tr>
</table>
    <center>
                    
                            <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                <thead style="background-color:#A9D0F5">
                                    <th>Articulo</th>
                                    <th>Cantidad</th>
                                    <th>Precio Venta</th>
                                    <th>Descuento</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tfoot>
                            
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tfoot>
                                <tbody>
                                    <tr></tr>
                                    @foreach($detalles  as $det)
                                    <tr>
                                        <td>{{$det->articulo}}</td>
                                        <td>{{$det->cantidad}}</td>
                                        <td>{{$det->precio_venta}}</td>
                                        <td>{{$det->descuento}}</td>
                                        <td>{{$det->cantidad*$det->precio_venta-$det->descuento}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <h4 id="total">Total: {{$venta->total_venta}}</h4>
                     

                </center>

     <table style="width:100%">
         <tr>
              <th>Serie  del  certififcado  del  emisor
              </th>
              <th>
             00111223
              </th> 
         </tr>
          <tr>
              <th> 
              Folio  del fiscal
              </th>
              <th>
              09876232
              </th> 
         </tr>

          <tr>
              <th> 
              No. de serie del Certificado del SAT:
              </th>
              <th>
                 00001000000202864883 
              </th> 
         </tr>
</table>

     <table style="width:100%">
         <tr>
             <th align="right">
             Sello digital  del CFDI
             </th>
         </tr>
          <tr>
             <th align="right">
            
              </th>
         </tr>

          <tr>
           <thalign="right">
             Sello del SAT
             </th>
         </tr>

          <tr>
          <th align="right">
         
          </th>
         </tr>
</table>

                   
               

              
    



